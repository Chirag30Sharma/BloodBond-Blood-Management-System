<?php
require 'vendor/autoload.php';

function Subscription($subject,$body,$receipent)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bloodbond37@gmail.com';                   
        $mail->Password   = 'ebqnsejofsrraxod';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('bloodbond37@gmail.com', 'BloodBond');
        $mail->addAddress($receipent);   

        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        
        $mail->send();
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

function registering($subject,$body,$receipent)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bloodbond37@gmail.com';                   
        $mail->Password   = 'ebqnsejofsrraxod';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('bloodbond37@gmail.com', 'BloodBond');
        $mail->addAddress($receipent);   

        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        
        $mail->send();
        echo 'Message has been sent';
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

function forgot($subject,$body,$receipent)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bloodbond37@gmail.com';                   
        $mail->Password   = 'ebqnsejofsrraxod';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('bloodbond37@gmail.com', 'BloodBond');
        $mail->addAddress($receipent);   

        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        
        $mail->send();
        echo 'Message has been sent';
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

function contact($subject,$body)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bloodbond37@gmail.com';                   
        $mail->Password   = 'ebqnsejofsrraxod';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('bloodbond37@gmail.com', 'BloodBond');
        $mail->addAddress('bloodbond37@gmail.com');   

        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        
        $mail->send();
        echo 'Message has been sent';
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}

function donate($subject,$body,$receipent)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'bloodbond37@gmail.com';                   
        $mail->Password   = 'ebqnsejofsrraxod';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('bloodbond37@gmail.com', 'BloodBond');
        $mail->addAddress($receipent);   

        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body    = $body;
        
        $mail->send();
        echo 'Message has been sent';
    } catch (\PHPMailer\PHPMailer\Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

}
