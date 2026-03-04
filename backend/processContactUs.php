<?php 
include ("database.php");
$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST['sendMessage'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if(isset($name) && isset($email) && isset($message)){
      $insertMessageQuery = "INSERT INTO tbl_messages (name, email, message) VALUES ('$name', '$email', '$message')";
      if($conn ->query($insertMessageQuery)){
        $message = "Message sent successfully! Thank you for the feedback";
      }
      else{
        $message = "Database Error Try again";
      }
    }
    else{
      $message = "Please fill all the required fields";
    }
  }
}


?>