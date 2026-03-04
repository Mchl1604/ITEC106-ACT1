<?php 
include("database.php");
  $message = "";

if(isset($_POST['register'])){
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirmPassword'];



  $checkEmailQuery = "SELECT id FROM tbl_users WHERE email = '$email' LIMIT 1";
  if($conn ->query($checkEmailQuery) ->num_rows > 0){
    $message = "Email Already Exist";

  }
  else{
    if($password === $confirmPassword){
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      $query = "INSERT INTO tbl_users(fullname, email, password) VALUES ('$fullName', '$email', '$hashedPassword')";

      if($conn ->query($query)){
        header("Location: ../pages/login.php");
      }
      else{
        echo "Error: " . $conn->error;
      }

    }
    else{
      $message = "Password does not match";

    }
  }

  
}

?>