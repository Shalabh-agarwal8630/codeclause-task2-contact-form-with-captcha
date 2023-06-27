<?php
$captcha = $_POST["captcha"];
$secret = "6LdsGbQmAAAAAK_IIlNP5RfgZ1X6KmAsVYW3AfOe";

$verify = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha), true);

$success = $verify["success"];

$name = stripslashes($_POST["name"]);
$email = stripslashes($_POST["email"]);
$subject = stripslashes($_POST["subject"]);
$message = stripslashes($_POST["message"]);

$headers = "From: " . $email . "\r\n" .
    "Reply-To: " . $email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";

$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

if ($success == false) {
  echo "Recaptcha Verification Failed";
} else if ($success == true) {
    if (mail("agarwalshalabh@gmail.com", $subject, $Body, $headers)){
      echo "Recaptcha Success, Mail Sent Successfully";
    } else {
        echo "Mailing Failed";
      }
}
?>
