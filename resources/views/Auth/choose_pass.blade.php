<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Set New Password | LMS</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background: #f4f6fb;
    }

    .login-card {
      background: #fff;
      padding: 2.5rem 3rem;
      border-radius: 14px;
      box-shadow: 0 15px 40px rgba(0,0,0,0.12);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }

    .login-card img {
      width: 90px;
      margin-bottom: 1rem;
    }

    .login-card h2 {
      font-size: 1.2rem;
      margin-bottom: 1.8rem;
      color: #333;
      font-weight: 600;
    }

    /* Input container */
    .input-container {
      position: relative;
      margin-bottom: 1.4rem;
      text-align: left;
    }

    .input-container label {
      display: block;
      margin-bottom: 0.4rem;
      font-size: 0.8rem;
      color: #555;
    }

    .input-container .icon-left {
      position: absolute;
      left: 12px;
      top: 62%;
      transform: translateY(-50%);
      color: #888;
      font-size: 0.9rem;
    }

    .input-container .toggle-password {
      position: absolute;
      right: 12px;
      top: 62%;
      transform: translateY(-50%);
      color: #888;
      cursor: pointer;
      font-size: 0.9rem;
    }

    .input-container input {
      width: 100%;
      padding: 0.75rem 2.6rem;
      border-radius: 6px;
      border: 1px solid #ccc;
      font-size: 0.95rem;
      transition: 0.3s;
    }

    .input-container input:focus {
      border-color: #4a67ff;
      box-shadow: 0 0 0 0.2rem rgba(74,103,255,0.2);
      outline: none;
    }

    /* Button */
    .login-card button {
      width: 100%;
      padding: 0.8rem;
      border: none;
      border-radius: 8px;
      background: #4a67ff;
      color: #fff;
      font-size: 1rem;
      cursor: pointer;
      font-weight: 600;
      transition: 0.3s;
    }

    .login-card button:hover {
      background: #344ce0;
      transform: translateY(-1px);
    }

    /* Back to login */
    .back-login {
      margin-top: 1rem;
      font-size: 0.85rem;
    }

    .back-login a {
      color: #4a67ff;
      text-decoration: none;
      font-weight: 500;
    }

    .back-login a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-card">

    <img src="backend/dist/img/logo.png" alt="LMS Logo">

    <h2>Choose New Password</h2>

    <form action="#" method="POST">

      <!-- New Password -->
      <div class="input-container">
        <label>New Password</label>
        <i class="fa-solid fa-lock icon-left"></i>
        <input type="password" id="newPassword" name="password" placeholder="Enter new password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('newPassword', this)"></i>
      </div>

      <!-- Confirm Password -->
      <div class="input-container">
        <label>Confirm Password</label>
        <i class="fa-solid fa-lock icon-left"></i>
        <input type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm new password" required>
        <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('confirmPassword', this)"></i>
      </div>

      <button type="submit">Reset Password</button>

    </form>

    <div class="back-login">
      <a href="/login"><i class="fa-solid fa-arrow-left"></i> Back to Login</a>
    </div>

  </div>

  <script>
    function togglePassword(id, icon) {
      const input = document.getElementById(id);
      if (input.type === "password") {
        input.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        input.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
      }
    }
  </script>

</body>
</html>
