@extends('admin.layouts.master')

@section('title', 'LMS Quiz Builder')

@push('styles')
<style>
    .required { color: red; font-weight: bold; }
    .question-card { border-left: 5px solid #4a67ff; background: #fff; border-radius: 8px; margin-bottom: 20px; }
    .option-row { margin-bottom: 8px; transition: all 0.3s; }
    .correct-selected { background-color: #d4edda !important; border: 1px solid #28a745 !important; border-radius: 4px; }
    .points-input { width: 80px; font-weight: bold; color: #4a67ff; text-align: center; }
</style>
@endpush

@section('content')
<div class="container-fluid mt-4">
    <form action="" method="POST" id="quiz-form">
        @csrf

        {{-- Quiz Header --}}
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div class="flex-grow-1 mr-3">
                    <label class="fw-bold">Quiz Title <span class="required">*</span></label>
                    <input type="text" name="quiz_title" class="form-control" placeholder="e.g. Mid-Term Network Exam" required>
                </div>
                <button type="submit" class="btn btn-success btn-lg px-5 shadow">Save Quiz</button>
            </div>
        </div>

        {{-- Questions Wrapper --}}
        <div id="questions-wrapper">
            <div class="card shadow-sm question-card border-0" data-index="0">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary">Question #1</h5>
                    <button type="button" class="btn btn-sm btn-outline-danger remove-question"><i class="fas fa-trash"></i></button>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label>Question Title</label>
                            <input type="text" name="questions[0][title]" class="form-control" placeholder="What is...?" required>
                        </div>
                        <div class="col-md-3">
                            <label>Type</label>
                            <select name="questions[0][type]" class="form-control type-selector">
                                <option value="radio">Single Choice</option>
                                <option value="checkbox">Multiple Choice</option>
                                <option value="boolean">True / False</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Points</label>
                            <input type="number" name="questions[0][points]" class="form-control points-input" value="1" min="1">
                        </div>
                    </div>

                    <div class="options-area p-3 bg-light rounded">
                        <label class="small text-muted">Answers (Check the correct one)</label>
                        <div class="option-list">
                            <div class="option-row input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white">
                                        <input type="radio" name="questions[0][correct][]" value="0" class="answer-control">
                                    </span>
                                </div>
                                <input type="text" name="questions[0][options][]" class="form-control" placeholder="Option 1" required>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-link add-option-btn mt-2"><i class="fas fa-plus"></i> Add Option</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-question-btn" class="btn btn-primary mb-5"><i class="fas fa-plus-circle"></i> Add New Question</button>
    </form>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    let qIndex = 1;

    // 1. Add New Question Card
    $('#add-question-btn').on('click', function() {
        let html = `
        <div class="card shadow-sm question-card border-0" data-index="${qIndex}">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-primary">Question #${qIndex + 1}</h5>
                <button type="button" class="btn btn-sm btn-outline-danger remove-question"><i class="fas fa-trash"></i></button>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6"><label>Question Title</label><input type="text" name="questions[${qIndex}][title]" class="form-control" required></div>
                    <div class="col-md-3"><label>Type</label><select name="questions[${qIndex}][type]" class="form-control type-selector"><option value="radio">Single Choice</option><option value="checkbox">Multiple Choice</option><option value="boolean">True / False</option></select></div>
                    <div class="col-md-3"><label>Points</label><input type="number" name="questions[${qIndex}][points]" class="form-control points-input" value="1" min="1"></div>
                </div>
                <div class="options-area p-3 bg-light rounded">
                    <div class="option-list">
                        <div class="option-row input-group">
                            <div class="input-group-prepend"><span class="input-group-text bg-white"><input type="radio" name="questions[${qIndex}][correct][]" value="0" class="answer-control"></span></div>
                            <input type="text" name="questions[${qIndex}][options][]" class="form-control" placeholder="Option 1" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-sm btn-link add-option-btn mt-2"><i class="fas fa-plus"></i> Add Option</button>
                </div>
            </div>
        </div>`;
        $('#questions-wrapper').append(html);
        qIndex++;
    });

    // 2. Add Option to specific question
    $(document).on('click', '.add-option-btn', function() {
        let parent = $(this).closest('.question-card');
        let idx = parent.data('index');
        let type = parent.find('.type-selector').val() === 'checkbox' ? 'checkbox' : 'radio';
        let optIdx = parent.find('.option-row').length;

        let optHtml = `
        <div class="option-row input-group mt-2">
            <div class="input-group-prepend"><span class="input-group-text bg-white"><input type="${type}" name="questions[${idx}][correct][]" value="${optIdx}" class="answer-control"></span></div>
            <input type="text" name="questions[${idx}][options][]" class="form-control" required>
            <div class="input-group-append"><button type="button" class="btn btn-danger remove-option">×</button></div>
        </div>`;
        parent.find('.option-list').append(optHtml);
    });

    // 3. Toggle Radio / Checkbox / Boolean
    $(document).on('change', '.type-selector', function() {
        let type = $(this).val();
        let parent = $(this).closest('.question-card');
        let idx = parent.data('index');

        if(type === 'boolean') {
            parent.find('.option-list').html(`
                <div class="option-row input-group"><div class="input-group-prepend"><span class="input-group-text bg-white"><input type="radio" name="questions[${idx}][correct][]" value="0" class="answer-control"></span></div><input type="text" name="questions[${idx}][options][]" class="form-control" value="True" readonly></div>
                <div class="option-row input-group mt-2"><div class="input-group-prepend"><span class="input-group-text bg-white"><input type="radio" name="questions[${idx}][correct][]" value="1" class="answer-control"></span></div><input type="text" name="questions[${idx}][options][]" class="form-control" value="False" readonly></div>
            `);
            parent.find('.add-option-btn').hide();
        } else {
            parent.find('.answer-control').attr('type', type);
            parent.find('.add-option-btn').show();
        }
    });

    // 4. Highlight Correct Answer & Alert
    $(document).on('click', '.answer-control', function() {
        let row = $(this).closest('.option-row');
        if($(this).attr('type') === 'radio') {
            $(this).closest('.option-list').find('.option-row').removeClass('correct-selected');
        }
        if($(this).is(':checked')) {
            row.addClass('correct-selected');
            alert("Correct answer set!");
        } else {
            row.removeClass('correct-selected');
        }
    });

    $(document).on('click', '.remove-question', function() { $(this).closest('.question-card').remove(); });
    $(document).on('click', '.remove-option', function() { $(this).closest('.option-row').remove(); });
});
</script>
@endpush
