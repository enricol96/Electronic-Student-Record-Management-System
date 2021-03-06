<?php

use PHPMailer\PHPMailer\PHPMailer;
require dirname(__FILE__) . '/../vendor/autoload.php';

function sendMail($email, $password){    

    $mail = new PHPMailer();
    //SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'studmanagementsystem@gmail.com';
    $mail->Password = 'this->password';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->SetFrom('no-reply@studmanagementsystem.org', 'Electronic-Student-Record-Management-System');
    $mail->Subject = 'Here your credentials';
    $msgBody = '<p> Use these credentials to login, for the first time, on the platform: <p>
                <p> Username: '.$email.' <p> 
                <p> Password: '.$password.' <p>';
    $mail->Body = $msgBody;

    //INSERT receiver's e-mail
    $mail->AddAddress($email);

    $mail->isHtml(true);

    if(!$mail->Send()){
        echo 'message not sent';
        echo 'Mailer Error: '.$mail->ErrorInfo;
    } else {
        echo 'message OK';
    }

}
?>