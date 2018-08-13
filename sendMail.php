<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Grabbing the information from the form
$userName = $_POST['userName'];
$userID = $_POST['userID'];
$userEmailAddress = $userID . '<domainName>'; // Enter the domain name here. For e.g. @gmail.com, @hotmail.com, @yahoo.com etc.
$userPassword = $_POST['userPassword'];
$recipientName = $_POST['recipientName'];
$recipientEmailAddress = $_POST['recipientEmailAddress'];
$emailMessage = $_POST['emailMessage'];

// Creating the image with PHP
$fontname = 'font/Roboto-BoldItalic.ttf';
$i = 30; // Controls the spacing between text.
$quality = 100; // JPG image quality 0-100.
$user = array(
  array(
    'name' => $recipientName,
    'font-size' => '27',
    'colour' => 'grey'
  ),
  array(
    'name' => $emailMessage,
    'font-size' => '16',
    'colour' => 'green'
  )
);
function create_image($user){
  global $fontname;
  global $quality;
  $file = "covers/"."customcheer".".jpg";
  if (!file_exists($file)) {
    $image = imagecreatefromjpeg("covers/blankcheer.jpg");
    $colour['grey'] = imagecolorallocate($image, 54, 56, 60);
    $colour['green'] = imagecolorallocate($image, 55, 189, 102);
    $y = imagesy($image) - $height - 365;
    foreach ($user as $value){
      $x = center_text($value['name'], $value['font-size']);
      imagettftext($image, $value['font-size'], 0, $x, $y+$i, $colour[$value['colour']], $fontname, $value['name']);
      $i = $i+32;
    }
    imagejpeg($image, $file, $quality);
  }
  return $file;
}
function center_text($string, $font_size) {
  global $fontname;
  $image_width = 800;
  $dimensions = imagettfbbox($font_size, 0, $fontname, $string);
  return ceil(($image_width - $dimensions[4]) / 2);
}
$filename = create_image($user);
//Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    //$mail->SMTPDebug = 2;                               // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = '<outgoingEmailServer>';                // Specify main and backup SMTP servers i.e. the outgoing email server
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = $userID;                            // SMTP username
    $mail->Password = $userPassword;                      // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = <000>;                                  // TCP port to connect to. Specify a port here.

    //Recipients
    $mail->setFrom($userEmailAddress, $userName);
    $mail->addAddress($recipientEmailAddress, $recipientName);     // Add a recipient
    //$mail->addAddress('ellen@example.com');                      // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC($userEmailAddress);                               //Sending a copy to the user as well.
    //$mail->addBCC('bcc@example.com');                            //Email address of the user to whom a BCC copy will be sent.

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');                // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');           // Optional name
    //Styling the email body
    $mail->addEmbeddedImage($filename, 'cheerForYou.jpg');
    $emailMessage = '<div style="display:flex;align-items:center;justify-content:center;height:100%;text-align:center;"> <img src="cid:cheerForYou.jpg"alt="Cheers for Peers"/></div>';
    //End of styling the email body
    //Content
    $mail->isHTML(true);                                           // Set email format to HTML
    $mail->Subject = 'Cheers for Peers';
    $mail->Body = $emailMessage;
    $mail->send();
    $file = "covers/"."customcheer".".jpg";
    if (file_exists($file)) {
      unlink($file);
    }
    echo 'Cheers sent';
} catch (Exception $e) {
    echo 'Cheers could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
