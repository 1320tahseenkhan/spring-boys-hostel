<?php
//getting data from php form
$name = $POST['name'];
$email= $POST['email'];
$tel = $POST['tel'];

$message= $_POST['message'];
$to = "tahseenk2003@gmail.com";
$subject = "Mail From springboyshostel";
$txt ="name". $name . "\r\nEmail= " . $email ."\r\Mobile Number= " . $tel . "\r\n Message =" . $message;
$headers = "From: noreply@springboyshostel@gmail.com" . "\r\n" .
"CC: somebodyelse@example.com";
if($email!=NULL){
mail($to,$subject,$txt,$headers);
}
//redirect to thank you page
header("Location:thankyou.html");
?>
