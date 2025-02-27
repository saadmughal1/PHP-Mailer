<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$senderMail = '';
$senderPassword = '';
$receiverMail = '';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    // $mail->Host = 'smtp.gmail.com';
    // $mail->Port = 465; //port for gmail

    $mail->Host = 'smtp-mail.outlook.com';
    $mail->Port = 587; //port for outlook

    $mail->SMTPAuth = true;
    $mail->Username = $senderMail;
    $mail->Password = $senderPassword;
    $mail->SMTPSecure = 'tls'; // outlook
    //$mail->SMTPSecure = 'ssl'; // gmail

    $mail->setFrom($senderMail, 'Your Name');
    $mail->addAddress($receiverMail);

    $mail->isHTML(true);
    $mail->Subject = 'This is a test email subject';
    $mail->Body = 'Hello world';

    $mail->send();
    echo "Mail sent successfully";
} catch (Exception $e) {
    echo "Mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
