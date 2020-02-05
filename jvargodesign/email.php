<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  
  if (empty($_POST["name"])) {
    echo "Please enter your name.";
  }
  else if (empty($_POST["email"])) {
    echo "Please enter an email address.";
  }
  else if (empty($_POST["message"])) {
    echo "Please enter a message.";
  }
  else if (!empty($_POST["name"]) and !empty($_POST["email"]) and !empty($_POST["message"])) {
    if (strpos($email,"@") === false or strpos($email,"@") !== strrpos($email,"@")) {
      echo "Not a valid email address.";
    }
    else {
      $subject = "Website Message from " . $name . "!";
      $header = "From: <" . $email . ">";
      $mail = mail("jvargeaux@gmail.com",$subject,$message,$header);
      if ($mail) {
        echo "Message sent. I'll get back to you ASAP!";
      }
      else {
        echo "Message failed to send.";
      }
    }
  }
}