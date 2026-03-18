<aside class="main-sidebar sidebar-dark-primary sidebar-fixed"
       style="position: fixed; background-color:#2e306f;">

  <!-- Brand -->
  <a href="/dashboard" class="brand-link shadow-sm"
     style="color:white; display:flex; align-items:center;
            padding:0.6rem 1rem; border-bottom:2px solid rgba(255,255,255,0.9);">
    <img src="{{ asset('backend/dist/img/spilogo.png') }}"
         style="opacity:.85; width:35px; height:35px; margin-right:10px;">
    <span class="brand-text font-weight-light">Saint Paul Institute</span>
  </a>

  <div class="sidebar pt-3">
    <nav>
      <ul class="nav nav-pills nav-sidebar flex-column"
          data-widget="treeview" role="menu" data-accordion="false">

        <!-- Dashboard -->
        <li class="nav-item">
          <a href="/dashboard" class="nav-link text-white">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <!-- Announcements -->
        <li class="nav-item">
          <a href="/announcements" class="nav-link text-white">
            <i class="nav-icon fas fa-bullhorn"></i>
            <p>Announcements</p>
          </a>
        </li>

        <!-- Lecturers -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>
              Lecturers Management
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/teacher/create" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Create Lecturer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/teacher/list" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Lecturers List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/teacher/assign-courses" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Assign Courses</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/teacher/workload" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Workload</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Students -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>
              Student Management
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/student/create" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Create Student</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/student/list" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Student List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/student/profile" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Student Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/enrollments" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Enrollment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/attendance" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Attendance</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/student/records" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Academic Records</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Academic -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-university"></i>
            <p>
              Academic Management
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/departments" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Departments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/faculties" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Faculties</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/majors" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Majors / Programs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/academic-years" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Academic Year</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/semesters" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Semesters</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Courses -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Course Management
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/course/create" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Create Course</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/course/list" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Courses List</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/course/categories" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Course Categories</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/course/schedule" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Course Schedule</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Lesson / Content -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-layer-group"></i>
            <p>
              Lesson / Content
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/lessons/create" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Create Content</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lessons/list" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>List Content</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lessons/documents" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Documents / PDFs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lessons/assignments" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Assignments</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- LMS / E-Learning -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-laptop-house"></i>
            <p>
              E-Learning (LMS)
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/lms" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>LMS Portal</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lms/classes" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Virtual Classes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lms/recordings" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Recorded Sessions</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/lms/forum" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Discussion Forum</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Assessment -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-clipboard-check"></i>
            <p>
              Assessment
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/assessments" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>All Assessments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/assessments/quizzes" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Quizzes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/assessments/exams" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Exams</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/assessments/question-bank" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Question Bank</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Grades / Results -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-poll"></i>
            <p>
              Grades & Results
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/grades" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Grade Book</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/results/publish" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Publish Results</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/transcripts" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Transcripts</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Progress -->
        <li class="nav-item">
          <a href="/progress" class="nav-link text-white">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>Progress Tracking</p>
          </a>
        </li>

        <!-- Certificates -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-certificate"></i>
            <p>
              Certificates
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/certificates" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>All Certificates</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/certificates/generate" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Generate Certificate</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/certificates/verify" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Verify Certificate</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Finance (optional) -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-money-bill-wave"></i>
            <p>
              Finance
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/finance/fees" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Tuition Fees</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/finance/payments" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Payments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/finance/invoices" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Invoices</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/finance/scholarships" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Scholarships</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Communication -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Communication
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/notifications" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Notifications</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/messages" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Messages</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/email-broadcast" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Email Broadcast</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Roles -->
        <li class="nav-item">
          <a href="/roles" class="nav-link text-white">
            <i class="nav-icon fas fa-user-shield"></i>
            <p>Roles & Permissions</p>
          </a>
        </li>

        <!-- System Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link text-white">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              System Settings
              <i class="right fas fa-angle-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/settings/university" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>University Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/settings/theme" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Theme & Logo</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/settings/backup" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>Backup & Restore</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/settings/logs" class="nav-link text-white pl-4">
                <i class="fas fa-angle-right nav-icon"></i>
                <p>System Logs</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>
