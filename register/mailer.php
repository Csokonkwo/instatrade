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

//THIS CODE SENDS THE PASSWORD RECOVERY LINK

function sendPasswordResetLink($userEmail, $token){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Password Recovery</title>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 300px; margin: 10px auto 50px auto">
        <div style="height: 60px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 20px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="120px"></h1>
        </div>
        
        <div style=" padding: 10px 20px; text-align: center; width: 90%; margin: auto;">
            <h2 style="font-weight: normal;">Password Recovery</h2>
            
            <p>Hello, This is to inform you that the password recovery process was initiated from your account, If you did not initiate this process please ignore, If you did, please click the link below, Thank you.</p>
            
            <a href="https://instatradeinvestment.com/register/signin.php?password-token=' . $token. '"style="color: white; background: #003b65; padding: 15px 20px; border-radius: 5px; text-decoration: none; display: block; margin-top: 25px;"> Change Password </a>
        
        </div>
    </div>
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Password Recovery'))
    //$from = array('admin@instatradeinvestment.com');
    ->setFrom('admin@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


function sendCashoutConfirm($userEmail, $username, $amount, $hash){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Withdrawal notification</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 220px; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="120px"></h1>
        </div>
        
        <div style=" padding: 20px 20px; text-align: center; width: 90%; margin: auto;">
            
            <p>Hello '. $username . ', this is to notify you that your Withdrawal of $' . $amount . ' has been paid to your wallet address. Thank you.</p>
            
            The Transaction ID is <br>
            
            ' . $hash . '
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 600px; margin: auto" src="https://instatradeinvestment.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Withdrawal Notification'))
    ->setFrom('admin@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}

function sendVerification($userEmail, $username, $token){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Member Registration</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 700px; height: max-content; margin: 0px auto; padding:0px 0px 10px 0px" >
        <div style="height: 30px;">
            <h1 style="margin: 0px\; width: 95%; text-align: left; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 0px 0px 0px; text-align: left; width: 90%; font-size: 1em; margin: auto;">
            
            <p>Hi '. $username . '! <br>
                My name is Charles and I am very happy to Welcome you on board with InstaTrade Investment. <br>
                You joined thousands of Investors who are already skyrocketing their Capital with InstaTrade Investment by Investing in our packages. <br> <br>
                There is just one more tiny step you need to take to achieve all these amazing things:
                <br>  please click the button below to verify that you own this email and start investing with us.
                <a href="https://instatradeinvestment.com/register/signin.php?token=' . $token. '" style="color: white; background: #003b65; padding: 15px 20px; border-radius: 5px; text-align: center;text-decoration: none; display: block; margin-top: 25px; font-family: lora, Merriweather">Start Verification</a>
                
                <br>
                <p>Yours Sincerely,</p> <br>
                <p>Charles Woodson</p>
                <p>Head, Media & Publicity</p>
                <p>InstaTrade Investment.</p>
            
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 700px; margin: auto" src="https://instatradeinvestment.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('Account Verification'))
    ->setFrom('admin@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


function emailUsers($userEmail, $username, $userMessage, $subject){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>InstaTrade Investment</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 700px; height: max-content; margin: 0px auto; padding:0px 0px 10px 0px" >
        <div style="height: 30px;">
            <h1 style="margin: 0px\; width: 95%; text-align: left; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="130px" style=" padding: 10px;"></h1>
        </div>
        
        <div style=" padding: 30px 0px 0px 0px; text-align: left; width: 90%; font-size: 1em; margin: auto;">
            
            <p>Hello '. $username . ', ' . $userMessage . '
                
                
            <br>
            <p>Yours Sincerely,</p> <br>
            <p>Charles Woodson</p>
            <p>Head, Media & Publicity</p>
            <p>InstaTrade Investment.</p>
            
            
        </div>
    </div>
        
        <img height="" style="display: block;  width: 95vw; max-width: 700px; margin: auto" src="https://instatradeinvestment.com/img/image1.jpg">
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Stay in touch</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message(" $subject "))
    ->setFrom('admin@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


function sendMessage($userEmail, $fullname, $email, $message){

    global $mailer;
    $body='<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Message notification</title>
        
    <link href="https://fonts.googleapis.com/css2?family=Charm&family=Dosis&family=Lora:ital@1&family=Merriweather:ital,wght@1,300&family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
        
    </head>
    <body style="background: #e8e8e8; font-family: "lora", "dosis", sans-serif;">
    
    <div style="background: white; width: 95vw; max-width: 600px; height: 220px; margin: 0px auto 0px auto">
        <div style="height: 30px;">
            <h1 style="margin: 0px auto; width: 90%; text-align: center; padding-top: 0px; color: white; "><img src="https://instatradeinvestment.com/img/logo.png" width="120px"></h1>
        </div>
        
        <div style=" padding: 0px 20px; text-align: center; width: 90%; margin: auto;">
            
            <p>Hello Admin, i am '. $fullname . ', and i can be contacted via '  . $email . '. <br> ' . $message. '
                
            </p>
            
        </div>
    </div>
    
    <div style=" width: 90vw; max-width: 600px; text-align: center; margin:0px auto">
        <h3 style="font-family: "Merriweather"">Sent from InstaTrade Investment</h3>
        
        <p style="padding-bottom: 20px; margin-bottom: 30px;">Copyright &copy; InstaTrade Investment, All rights reserved.</p>
    </div>
    
</body>
</html>';

    // Create a message
    $message = (new Swift_Message('New Message'))
    ->setFrom('admin@instatradeinvestment.com', 'InstaTrade Investment')
    ->setTo([$userEmail])
    ->setBody($body, 'text/html')
    ;

    // Send the message
    $result = $mailer->send($message);

}


?>