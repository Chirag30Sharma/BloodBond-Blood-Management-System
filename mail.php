<?php
require 'vendor/autoload.php';

function SendMail($subject,$body,$receipent)
{
    require 'vendor/autoload.php';
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    try {
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'vidhivk18@gmail.com';                   
        $mail->Password   = 'oehysortkafmkcot';                              
        $mail->SMTPSecure = 'tls';          
        $mail->Port       = 587;                                    

        $mail->setFrom('vidhivk18@gmail.com', 'BloodBond');
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