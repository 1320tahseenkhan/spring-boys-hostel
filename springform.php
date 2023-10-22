<?php

// hide error from getting displayed
error_reporting(NULL);

    // check if request is POST method and Email is provided by user
    if( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' && isset( $_POST[ 'Email' ] )) {
        
        // extract data from $_POST variable
        extract($_POST);
        
        // sanitize to prevent SQLi Attack
        $name = stripslashes($Name);
        $email= stripslashes($Email);
        $tel = stripslashes($tel);
        $message= stripslashes($Message);
        
        // check if email is valid or not
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script> window.alert('Please enter valid email.'); window.location.href = 'contact.html'; </script>";
        }
        
        // set recepient emai;
        $to = "tahseenk2003@gmail.com";
        
        // set subject
        $subject = "Mail From springboyshostel";
        
        // set email body
        $txt ="name". $name . "\r\nEmail= " . $email ."\r\Mobile Number= " . $tel . "\r\n Message =" . $message;
        
        // set email headers
        $headers = "From: noreply@springboyshostel-pi.vercel.app" . "\r\n" .
        "CC: somebodyelse@springboyshostel-pi.vercel.app";
        
        if(mail($to,$subject,$txt,$headers)){
            // if email is sent, redirect to thank you page
            // header("Location: thankyou.html"); -> this will cause an error
            echo "<script> document.location='thankyou.html'; </script>";
        } else {
            // error while sending mail
            echo "Error occured.";
        }
        
    }
    
    // Exit ('_')
    exit;
?>
