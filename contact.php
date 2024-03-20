<?php
require 'vendor/autoload.php';
require("config.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['NAME'],$_POST["EMAIL"], $_POST["PHONE"], $_POST["SUBJECT"], $_POST["MESSAGE"])) {
    $name = $_POST['NAME'];
    $email = $_POST["EMAIL"];
    $phone = $_POST["PHONE"];
    $subject = $_POST["SUBJECT"];
    $message = $_POST["MESSAGE"];
    $mail_message = "<p>NAME: {$name}</p><p>EMAIL: {$email}</p><p>PHONE: {$message}</p><p>SUBJECT: {$subject}</p><p>MESSAGE: {$message}</p>";

    
    
    
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->SMTPDebug = 0; // Set to 0 for production, or 2 for debugging
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;

        $mailer->Port = 587;
        $mailer->Username = 'rr1150650@gmail.com'; // Your Gmail email address
        $mailer->Password = 'ikmc ofpl qbks zepq';
        $mailer->SMTPSecure = 'tls';
        $mailer->setFrom('akshitkamboj595@gmail.com', 'Server');
        $mailer->addAddress('farmingfield575@gmail.com');
        $mailer->Subject = $subject;
        $mailer->addCustomHeader("Content-Type: text/html; charset=UTF-8\r\n");
        $mailer->Body = $mail_message;

        
        
        try {
            $mailer->send();
            echo "Email sent successfully.";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: " . $mailer->ErrorInfo;
        }
        }
        $home_header_bg ="contact-header-bg";
        require("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
         body{
           
        
            background: linear-gradient(45deg, green, orange,black,transparent);
        }

        .col1{
            margin : 20px;
            
        }

        .col2{
            margin: 20px;
        }


        .d input{
            height: 45px;
            width: 300px;
            border: 1px solid grey;
            box-shadow: 2px 2px 3px rgb(0,0,0,0.9);
            color: grey;
            margin-left: 40px;
        } 

         .col3{
            margin: 20px; 
        }

        form{
            width: 800px;
            margin: 0 auto;
        }

        textarea{
            width: 653px;
            margin-left: 44px;
            height: 100px;
            border: 1px solid grey;
            box-shadow: 2px 2px 3px rgb(0,0,0,0.9);
            color: grey;
        }
        @media only screen and (max-width:1200px) {
            .form{
               width:auto;
               padding:0;
               margin: 0;   
            }
            textarea{
              width: auto;
            }
            .btn{
                width:auto;
            }
         
        }
</style>
    </head>
    <body>
              <div style=" background: linear-gradient(45deg, #357523, #d5a6a6); margin-top:-152px;">
                    <h1 style="text-align: center;">Contact Us</h1>
             
             <div class="row box-gutter img-radius-box home-boxes border-raddius contactinfo">
                <div class="col-3">
                    <h2 style="text-align:justify;">By Phone</h2>
                   <p style="text-align:justify;"><span>6396376753</span></p>
                    
                </div>
                <div class="col-3">
                   <h2  style="text-align:justify;">E-mail</h2>
                    <h3 style="text-align:justify;" >rr1150650@gmail.com</h3>
                </div>
                <div class="col-3">
                    <h2  style="text-align:justify;">Chat with us</h2>
                    <h3 style="text-align:justify;">6396376753</h3>
                </div>
             </div>
             </div>
          <h2 class="heading" style="padding-right:-70px ; padding-top:17px">
              GET IN TOUCH NOW
          </h2>
      
          <form class="form" method="POST">
            <div class="d">
                <div class="row1">
                    <div class="col1">
                        <input type="text" name="NAME" placeholder="Name" style=" border-radius:10px;"/>
                        <input type="text" name="EMAIL" placeholder="Email" style=" border-radius:10px;"/>
                    </div>
                </div>

                <div class="row2">
                    <div class="col2">
                        <input type="text" name="PHONE" placeholder="Phone" style=" border-radius:10px;"/>
                        <input type="text" name="SUBJECT" placeholder="Subject" style=" border-radius:10px;"/>
                    </div>
                </div>
              

                <div class="row3">
                    <div class="col3">
                        <textarea name="MESSAGE" placeholder="Message" style="margin-left:35px;  border-radius:10px;"></textarea>
                    </div>
                </div>

                <div class="tr">
                    <div class="cell"></div>
                    <div class="cell center"><input type="submit" value="Submit" class="btn" style="margin-left:-23px; border-radius:10px;"/></div>
                </div>
            </div>
        </form>
    </body>
    </html>
        <?php require("footer.php"); ?>

