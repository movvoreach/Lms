<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LMS Login</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Khmer Font (Optional but recommended) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@300;400;700&display=swap" rel="stylesheet">

  <style>
    *{ box-sizing:border-box; margin:0; padding:0; }
    body{
      min-height:100vh;
      display:flex;
      justify-content:center;
      align-items:center;
      font-family:'Battambang',"Segoe UI",Tahoma,Geneva,Verdana,sans-serif;
      background:
        radial-gradient(1000px 600px at 15% 20%, rgba(74,103,255,.18), transparent 55%),
        radial-gradient(800px 500px at 90% 20%, rgba(52,76,224,.14), transparent 55%),
        radial-gradient(900px 600px at 50% 90%, rgba(15,185,129,.10), transparent 55%),
        linear-gradient(180deg, #f7f9ff 0%, #eef2ff 100%);
      padding:24px;
    }

    /* Decorative blobs */
    .bg-blob{
      position:fixed;
      inset:auto;
      border-radius:999px;
      filter: blur(40px);
      opacity:.35;
      z-index:-1;
      pointer-events:none;
    }
    .blob-1{ width:320px; height:320px; left:40px; top:60px; background:#4a67ff; }
    .blob-2{ width:260px; height:260px; right:60px; top:80px; background:#0fb981; }
    .blob-3{ width:300px; height:300px; right:120px; bottom:70px; background:#344ce0; }

    .login-card{
      width:100%;
      max-width:460px;
      border-radius:18px;
      background: rgba(255,255,255,.82);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(255,255,255,.55);
      box-shadow: 0 18px 60px rgba(25, 30, 60, .15);
      padding: 28px 30px;
      position:relative;
      overflow:hidden;
    }

    /* Top accent bar */
    .login-card::before{
      content:"";
      position:absolute;
      top:0; left:0; right:0;
      height:6px;
      background: linear-gradient(90deg, #4a67ff, #344ce0, #0fb981);
    }

    .brand{
      display:flex;
      align-items:center;
      gap:12px;
      justify-content:center;
      margin-top:6px;
      margin-bottom:8px;
    }

    .brand img{
      width:62px;
      height:auto;
      filter: drop-shadow(0 8px 18px rgba(0,0,0,.12));
    }

    .brand-title{
      text-align:left;
      line-height:1.2;
    }
    .brand-title .name{
      font-size:18px;
      font-weight:700;
      color:#1f2a44;
    }
    .brand-title .tagline{
      font-size:12px;
      color:#5a647a;
      margin-top:2px;
    }

    h2{
      text-align:center;
      margin: 14px 0 20px;
      font-size: 16px;
      color:#23304a;
      font-weight:600;
    }

    .alert{
      background: rgba(231,76,60,0.08);
      border: 1px solid rgba(231,76,60,0.25);
      color: #c0392b;
      padding: 12px 14px;
      border-radius: 12px;
      font-size: 13px;
      margin-bottom: 14px;
      text-align: left;
    }

    .input-container{ margin-bottom:14px; }
    .input-container label{
      display:block;
      margin-bottom:6px;
      font-size:13px;
      color:#4a5568;
      font-weight:600;
    }

    .field{
      position:relative;
    }

    .field i{
      position:absolute;
      left:12px;
      top:50%;
      transform: translateY(-50%);
      color:#7b859a;
      font-size:14px;
      pointer-events:none;
    }

    input[type="email"],
    input[type="password"]{
      width:100%;
      padding: 12px 12px 12px 40px;
      border-radius: 5px;
      border: 1px solid rgba(35,48,74,.15);
      background: rgba(255,255,255,.75);
      outline:none;
      font-size: 14px;
      color:#1f2a44;
      transition: .25s ease;
    }

    input::placeholder{ color:#98a1b3; }

    input:focus{
      border-color:#4a67ff;
      box-shadow: 0 0 0 4px rgba(74,103,255,0.18);
      background:#fff;
    }

    .error{
      font-size: 12px;
      color: #e74c3c;
      margin-top: 6px;
    }

    .login-options{
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin: 6px 0 16px;
      gap:10px;
      flex-wrap:wrap;
      font-size: 13px;
    }

    .remember-me{
      display:flex;
      align-items:center;
      gap:8px;
      color:#4a5568;
      cursor:pointer;
      user-select:none;
    }
    .remember-me input{
      width:16px;
      height:16px;
      accent-color:#4a67ff;
      cursor:pointer;
    }

    .forgot-password{
      color:#4a67ff;
      text-decoration:none;
      font-weight:700;
    }
    .forgot-password:hover{ text-decoration:underline; }

    button{
      width:100%;
      padding: 12px 14px;
      border:none;
      border-radius: 12px;
      background: linear-gradient(90deg, #4a67ff, #344ce0);
      color:#fff;
      font-size: 15px;
      cursor:pointer;
      font-weight:800;
      letter-spacing:.2px;
      transition: .25s ease;
      box-shadow: 0 14px 30px rgba(74,103,255,.25);
    }

    button:hover{
      transform: translateY(-1px);
      box-shadow: 0 18px 35px rgba(74,103,255,.30);
    }

    button:active{ transform: translateY(0); }

    .footer-note{
      text-align:center;
      margin-top: 14px;
      font-size: 12px;
      color:#6b7280;
    }

    /* Responsive */
    @media (max-width:480px){
      .login-card{ padding: 22px 18px; }
      .brand-title .name{ font-size:16px; }
    }
  </style>
</head>

<body>
  <div class="bg-blob blob-1"></div>
  <div class="bg-blob blob-2"></div>
  <div class="bg-blob blob-3"></div>

  <div class="login-card">

    <div class="brand">
      {{-- ✅ Use asset() --}}
      <img src="{{ asset('backend/dist/img/spilogo.png') }}" alt="LMS Logo">
      <div class="brand-title">
        <div class="name">SAINT PAUL LMS</div>
        <div class="tagline">University Learning Management System</div>
      </div>
    </div>

    <h2>សូមបញ្ចូលព័ត៌មានអ្នកប្រើប្រាស់សម្រាប់ចូល</h2>

    {{-- ✅ Show general error (wrong credentials) --}}
    @if ($errors->has('email'))
      <div class="alert">
        <i class="fa-solid fa-triangle-exclamation"></i>
        &nbsp;{{ $errors->first('email') }}
      </div>
    @endif

    {{-- ✅ FIXED: post to login.submit --}}
    <form action="{{ route('login.submit') }}" method="POST">
      @csrf

      <!-- Email -->
      <div class="input-container">
        <label>Gmail</label>
        <div class="field">
          <i class="fa-solid fa-envelope"></i>
          <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your Gmail" required>
        </div>

        @error('email')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="input-container">
        <label>Password</label>
        <div class="field">
          <i class="fa-solid fa-lock"></i>
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>

        @error('password')
          <div class="error">{{ $message }}</div>
        @enderror
      </div>

      <!-- Remember & Forgot -->
      <div class="login-options">
        <label class="remember-me">
          <input type="checkbox" name="remember" value="1">
          Remember me
        </label>

        {{-- ✅ FIXED route --}}
        <a href="{{ route('password.reset') }}" class="forgot-password">Forgot Password?</a>
      </div>

      <!-- Submit -->
      <button type="submit">
        <i class="fa-solid fa-right-to-bracket"></i>
        &nbsp;Login
      </button>

      <div class="footer-note">
        © {{ date('Y') }} Saint Paul Institute — All rights reserved.
      </div>
    </form>
  </div>

</body>
</html>
