<?php
include("../backend/processRegistration.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <?php include("../includes/cssBootstrap.php"); ?>
  <style>
    body {
      font-family: Helvetica, Arial, sans-serif;
      background-image: url(../img/bg.jpg);
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      min-height: 100vh;
      margin: 0;
    }

    h1 {
      font-size: 28px;
      font-weight: bold;
      color: #00754A;
    }

    .card,
    .form-control,
    .form-check-input {
      border: 1px solid #e0e0e0;
    }

    a {
      color: #00754A;
      font-weight: bold;
      text-decoration: none;
    }

    .btn {
      background-color: #00754A;
      color: #FFFFFF;
      border-radius: 30px;
      font-weight: bold;
      transition: .3s;
    }

    .btn:hover {
      background-color: #00754A;
      color: #FFFFFF;
      opacity: .8;
    }

    .form-control:focus {
      background-color: #B8FFB8;
    }

    .form-control:focus+label {
      color: #00754A;
    }
  </style>
</head>

<body>
  <div class="d-flex justify-content-end mt-5 mx-5">
    <div class="card col-md-4 px-4 py-4 mx-5">
      <div class="d-flex justify-content-center mb-3">
        <img src="../img/logo.png" alt="" class="img-fluid" style="max-height: 60px; max-width: 40px;">
      </div>
      <h1 class="text-center">Create an Account</h1>
      <form method="POST" class="needs-validation" novalidate>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" name="fullName" id="floatingInput" placeholder="name" required>
          <label for="floatingInput">Username</label>
          <div class="invalid-feedback">
            Please input a username.
          </div>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" required>
          <label for="floatingInput">Email Address</label>
          <div class="invalid-feedback">
            Invalid Email Address.
          </div>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password" required>
          <label for="floatingPassword">Password</label>
          <div class="invalid-feedback">
            Please input a secure password.
          </div>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingPassword" name="confirmPassword" placeholder="Password" required>
          <label for="floatingPassword">Confirm Password</label>
          <div class="invalid-feedback">
            Please input a secure password.
          </div>
        </div>
        <div>
          <p class="text-danger mb-2"><?php
          if(isset($_POST['register'])){
            echo $message; 
          }
           ?></p>
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn" name="register">Finish</button>
          </div>
        </div>
      </form>

    </div>

  </div>
  <?php include("../includes/jsBootstrap.php"); ?>
  <script>
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
</body>

</html>