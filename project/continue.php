<?php
require'phpmailer/PHPMailerAutoload.php';
	
	
$mail= new PHPMailer();
        $mail->SMTPDebug = 1;
                       
$mail->isSMTP();
$mail->SMTPAuth=true;
$mail->SMTPSecure='ssl';
$mail->Host='ssl://smtp.gmail.com';
$mail->Port=465 ;
$mail->isHTML();
$mail->Username='crisron81782@gmail.com';
$mail->Password='25322589';

$mail->Subject='the list of colleges will be shortly sent';
$mail->Body='test mail';
$mail->AddAddress($_POST['eml']);
if($mail->Send())
{
echo'done';

}
else
{
echo'not done'. $mail->ErrorInfo;
}
?>