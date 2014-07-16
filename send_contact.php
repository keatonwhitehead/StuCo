<?php
//Contact subject
//$subject = $_POST['subject'];

//Details
//$message = $_POST['detail'];

//Enter your email adress
//$to = "laxplayar45@gmail.com";
//$send_contact = mail($to, $subject, $message);

//Check if message sent to your email
//display message "We've recieved your informaiton!"
//if ($send_contact){
//echo "We've recieved your informaiton!";
//}
//else {
//echo "Error";
//}
ini_set("SMTP","aspmx.l.google.com");
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: test@gmail.com" . "\r\n";
mail("laxplayar45@gmail.com","test subject","test body",$headers);
?>