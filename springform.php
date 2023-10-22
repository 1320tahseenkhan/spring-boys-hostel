<?php

    error_reporting(NULL);
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // check if request is POST method and Email is provided by user
    if( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_POST[ 'Email' ] ) ) {
        
        // extract data from $_POST variable
        extract($_POST);
        
        // sanitize to prevent SQLi Attack
        $name = stripslashes($Name);
        $email = stripslashes($Email);
        $tel = stripslashes($tel);
        $message = stripslashes($Message);
        $recepient_email = '217dayanjihuzefa@gmail.com';
        $recepient_name = 'Spring Boys Hostel';
         $txt = "Name= ". $name . "<br/>Email= " . $email ."<br/>Mobile Number= " . $tel . "<br/> Message =" . $message;
        
         // check if email is valid or not
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script> window.alert('Please enter valid email.'); window.location.href = 'contact.html'; </script>";
        }
        
        require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer-master/src/Exception.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer-master/src/PHPMailer.php';
        require $_SERVER['DOCUMENT_ROOT'] . '/mail/PHPMailer-master/src/SMTP.php';
        
        $mail = new PHPMailer;
        $mail->isSMTP(); 
        $mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 587; // TLS only
        $mail->SMTPSecure = 'tls'; // ssl is deprecated
        $mail->SMTPAuth = true;
        $mail->Username = '217dayanjihuzefa@gmail.com'; // email
        $mail->Password = 'xdhshdhsjdhdhdhdh'; // password
        $mail->setFrom($recepient_email, $recepient_name); // From email and name
        $mail->addAddress('tahseenk2003@gmail.com', $recepient_name); // to email and name
        $mail->Subject = 'Mail From springboyshostel';
        $mail->msgHTML($txt); //$mail->msgHTML(file_get_contents('contents.html'), _DIR_); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        $mail->SMTPOptions = array(
                            'ssl' => array(
                                'verify_peer' => false,
                                'verify_peer_name' => false,
                                'allow_self_signed' => true
                            )
                        );
        
        if($mail->send()){
            echo "<script>window.location='thankyou.html';</script>";
        }
    }
    
    exit;
?>
