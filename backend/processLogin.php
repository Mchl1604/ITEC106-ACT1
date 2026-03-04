<?php 
include ("database.php");
$message = "";

if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $fetchEmailQuery = "SELECT fullname, email, password FROM tbl_users WHERE email = '$email'";
  $result = $conn ->query($fetchEmailQuery);

  if($result->num_rows === 1){
      $row = $result->fetch_assoc();
       $hashedPasswordFromDB = $row['password'];

      if (password_verify($password, $hashedPasswordFromDB)){
        $_SESSION['user'] = $row['fullname'];
        header("Location: ../pages/dashboard.php");
      }
      else{
        $message = "Incorrect Password";
      }
    }

  else{
    $message = "Account does not Exist";
  }
}
?>