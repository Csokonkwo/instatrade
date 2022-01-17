<?php

define("EMAIL", 'admin@instatradeinvestment.com');
define("PASSWORD", 'we@the@');

require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('instatradeinvestment.com', 465, 'ssl'))

  ->setUsername(EMAIL)
  ->setPassword(PASSWORD)
; 

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


function sendInterestEmail($userEmail, $username, $user_id, $plan, $amount){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Notification</title>
        
     <link href="https://fonts.googleapis.com/css2?family=Candal&family=Dosis:wght@700&family=Lora:ital@1&family=Noto+Sans&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet"> 

        
    </head>
    <body style="background: #e8e8e8; font-family: "Roboto condensed";">
    
    <div style="background: #182031; width: 95%; max-width: 600px; height: inherit; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px ; width: 90%; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 20px 10px 20px; width: 90%; margin: 0px; color: white;">
            
            <p>Dear '. $username . ',</p>
            <p>Your account has been credited</p> <br>
            
            <p>Transaction Summary</p>
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">
                A/c Number 
                <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">'. $user_id . '</span>
            </p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">A/c username <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">'. $username . '</span></p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Description <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">NEW ROI</span></p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Plan <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px"> '. $plan .' </span> </p>
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Amount <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">$'. $amount .'</span> </p>
            <br> <br>
            
            <p>Best regards, </p>
            <p>InstaTrade Investment. </p>
            
            
        </div>
    </div>
        
        
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('TRANSACTION ALERT'))
    ->setFrom('info@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


function sendEndPlan($userEmail, $username, $user_id, $plan, $amount){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Notification</title>
        
     <link href="https://fonts.googleapis.com/css2?family=Candal&family=Dosis:wght@700&family=Lora:ital@1&family=Noto+Sans&family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet"> 

        
    </head>
    <body style="background: #e8e8e8; font-family: "Roboto condensed";">
    
    <div style="background: #182031; width: 95%; max-width: 600px; height: inherit; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px ; width: 90%; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 20px 10px 20px; width: 90%; margin: 0px; color: white;">
            
            <p>Dear '. $username . ',</p>
            <p>Your account has been credited</p> <br>
            
            <p>Transaction Summary</p>
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">
                A/c Number 
                <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">'. $user_id . '</span>
            </p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">A/c username <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">'. $username . '</span></p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Description <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">Capital Return</span></p>
            
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Plan <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px"> '. $plan .' </span> </p>
            <p style="background: #232327; padding: 5px; font-size: 12px; margin: 5px 0px">Amount <span style="float: right; width: 50%; background: #131319; padding: 5px; display: block; margin: -5px">$'. $amount .'</span> </p>
            <br> <br>
            
            <p>Best regards, </p>
            <p>InstaTrade Investment. </p>
            
            
        </div>
    </div>
        
        
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Capital Return'))
    ->setFrom('info@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


?>