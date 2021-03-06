<?php
//index.php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
 $string = trim($string);
 $string = stripslashes($string);
 $string = htmlspecialchars($string);
 return $string;
}

if(isset($_POST["submit"]))
{
 if(empty($_POST["name"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Name</label></p>';
 }
 else
 {
  $name = clean_text($_POST["name"]);
  if(!preg_match("/^[a-zA-Z ]*$/",$name))
  {
   $error .= '<p><label class="text-danger">Only letters and white space allowed</label></p>';
  }
 }
 if(empty($_POST["email"]))
 {
  $error .= '<p><label class="text-danger">Please Enter your Email</label></p>';
 }
 else
 {
  $email = clean_text($_POST["email"]);
  if(!filter_var($email, FILTER_VALIDATE_EMAIL))
  {
   $error .= '<p><label class="text-danger">Invalid email format</label></p>';
  }
 }
 if(empty($_POST["subject"]))
 {
  $error .= '<p><label class="text-danger">Subject is required</label></p>';
 }
 else
 {
  $subject = clean_text($_POST["subject"]);
 }
 if(empty($_POST["message"]))
 {
  $error .= '<p><label class="text-danger">Message is required</label></p>';
 }
 else
 {
  $message = clean_text($_POST["message"]);
 }
 if($error == '')
 {
  require 'phpmailer/PHPMailerAutoload.php';
$a12="from : ";
  $final = $a12.$_POST["email"]."\r\n".$_POST["message"];
  	
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
$mail->AddCC($_POST["email"], $_POST["name"]);
$mail->Subject= $_POST["subject"]; 
$mail->Body=$final;
$mail->AddAddress("ankushshetty95@gmail.com");








/*
  $mail = new PHPMailer;
  $mail->IsSMTP();        //Sets Mailer to send message using SMTP
  $mail->Host = 'smtp.gmail.com';  //Sets the SMTP hosts
  $mail->Port = '465';        //Sets the default SMTP server port
  $mail->SMTPAuth = true;       //Sets SMTP authentication. Utilizes the Username and Password variables
  $mail->Username = 'crisron81782@gmail.com';     //Sets SMTP username
  $mail->Password = '25322589';     //Sets SMTP password
  $mail->SMTPSecure = '';       //Sets connection prefix. Options are "", "ssl" or "tls"
  //$mail->From = $_POST["email"];    //Sets the From email address for the message
  //$mail->FromName = $_POST["name"];    //Sets the From name of the message
  $mail->AddAddress('ankushshetty95@gmail.com');//Adds a "To" address
  //$mail->AddCC($_POST["email"], $_POST["name"]); //Adds a "Cc" address
  $mail->WordWrap = 50;       //Sets word wrapping on the body of the message to a given number of characters
  $mail->IsHTML(true);       //Sets message type to HTML    
  $mail->Subject =   //Sets the Subject of the message
  $mail->Body =     //An HTML or plain text message body */
  if($mail->Send())        //Send an Email. Return true on success or false on error
  {
   $error = '<label class="text-success">Thank you for contacting us</label>';
  }
  else
  {
   $error = '<label class="text-danger">There is an Error</label>';
  }
  $name = '';
  $email = '';
  $subject = '';
  $message = '';
 }
}

?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Blog Template ?? Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/blog/">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-th">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      .rotateimg180 {
  -webkit-transform:rotate(270deg);
  -moz-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  -o-transform: rotate(270deg);
  transform: rotate(270deg);
}
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="blog.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
  <div class="container">
        <div class="row">
          <div class="col-sm text-center">
            <h1>Pinnacle Group Of Developers</h1>
</div>
</div>
          </div>
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="../Home/index.html">Pinnacle Group Of Developers</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="../Home/index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Projects
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="#">Hill View Apartment</a>
                      <a class="dropdown-item" href="#">Pinnacle Residency</a>
                      <a class="dropdown-item" href="#">Pinnacle Blossom</a>
                      <a class="dropdown-item" href="#">Sai Krupa</a>
                      <a class="dropdown-item" href="../pinnaclefinal/SaiSiddhi.html">Sai Siddhi</a>
                      <a class="dropdown-item" href="#">Sai Shruti</a>
                      <a class="dropdown-item" href="#">Om Niwas</a>
                      <a class="dropdown-item" href="#">Morya Apartment</a>
                      <a class="dropdown-item" href="../pinnaclefinal/pro.html">Sai Darshan</a>
                      <a class="dropdown-item" href="../pinnaclefinal/SaiAangan.html">Sai Aangan</a>
                    
                     
                    </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">News Room</a>
                </li>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">About Us</a>
            </li>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../project/contactUs.php">Contact Us</a>
        </li>
              </ul>
           
            </div>
          </nav>
</div>

<div class="container">
    <div class="row">
    <div class="col-lg-5">
        <h1>CONTACT PINNACLE</h1>
        <p>
                Hercon Construction
                <br>
                2600 Forum Boulevard, Suite C
                <br>
                Columbia, MO 65203
                <br>
                573.256.2865
                <br>
                jeff@herconconstructioninc.com

        </p>
    </div>
    <div class="col-lg-7">
        
        <div class="container">
         <div class="row">
            <div class="col-md-8" style="margin:0 auto; float:none;">
           <h3 align="center">Send an Email</h3>
           <br />
           <?php echo $error; ?>


           <form method="post">
               <div class="row">

              <div class="col-md-6">
            <div class="form-group">
             <label>Enter Name</label>
             <input type="text" name="name" placeholder="Enter Name" class="form-control" value="<?php echo $name; ?>" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
             <label>Enter Email</label>
             <input type="text" name="email" class="form-control" placeholder="Enter Email" value="<?php echo $email; ?>" />
            </div>
</div>

        </div>


            <div class="form-group">
             <label>Enter Subject</label>
             <input type="text" name="subject" class="form-control" placeholder="Enter Subject" value="<?php echo $subject; ?>" />
            </div>
            <div class="form-group">
             <label>Enter Message</label>
             <textarea name="message" class="form-control" placeholder="Enter Message"><?php echo $message; ?></textarea>
            </div>
            <div class="form-group" align="center">
             <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            </div>
           </form>




          </div>
         </div>
        </div>












    </div>
</div>
</div>

</body>
</html>
