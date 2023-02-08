
<?php
include 'mailer-config.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require 'vendor/autoload.php';
//get data from form
$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$message = $_POST['message'];
// preparing mail content
$messagecontent ="Imię: ". $name . "<br>Email: " . $email . "<br>Telefon  " . $tel . "<br>Wiadomość: " . $message;
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail = new PHPMailer();
$mail->CharSet = "UTF-8";
try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = $hostMail;                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = $usernameMail;                     //SMTP username
    $mail->Password   = $passwordMail;                               //SMTP password
//    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('kontakt@warsztaat-tanca.com', 'Mailer');
    $mail->addAddress('mail@kyra.atthost24.pl', 'Warsztat Tańca');     //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');
    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
   // $mail->addAttachment('photo.jpeg', 'photo.jpeg');    //Optional name
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Wiadomość ze strony warsztat-tanca.com';
    $mail->Body    = $messagecontent;
    
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}