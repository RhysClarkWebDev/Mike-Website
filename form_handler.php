<?php
  $email_error = $name_error = $subject_error = $message_error = "";
  $email = $name = $subject = $message = $success = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
      $email_error = "Email is required";
    }
    else {
      $email = test_input($_POST["email"]);
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format";
      }
    }


    if (empty($_POST["name"])) {
      $name_error = "Name is required";
    }
    else {
      $name = test_input($_POST["name"]);
      }



    if (empty($_POST["message"])) {
      $message = "";
    }
    else {
      $message = test_input($_POST["message"]);
    }


    if($email_error == "" and $name_error == "") {
      $message_body = "";
      unset ($_POST['submit']);
      foreach ($_POST as $key => $value){
        $message_body .= "$key: $value\n";
      }



      $to = 'Contact@mikerobinsbuilder.co.uk';
      $subject = test_input($_POST["name"]);

      $headers = "From: $email" . "\r\n";
      $headers .= "MIME-Version: 1.0\r\n";
      $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
      $headers .= "CC: mikerobins1664@hotmaiil.co.uk\r\n";

      if (mail($to, $subject, $message, $headers)){
        $success = "Message Sent";
        $email = $name = $subject = $message = '';
      }

    }
  }





function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
