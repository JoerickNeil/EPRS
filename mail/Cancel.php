<?php
    if (isset($_POST['cancel']))
    {
    $mailto = $_POST['mail_to'];
    /*$mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
*/

   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSmtp();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'tls'; // or ssl
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 587; // or 465
   $mail ->IsHTML(true);
   $mail ->Username = "sample.test.php@gmail.com";
   $mail ->Password = "screwthis";
   $mail ->SetFrom("sample.test.php@gmail.com");
   /*$mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;
   $mail ->AddAddress($mailto);*/
   $mail ->Subject = "Sample";
   $mail ->Body = "
        <strong style='color:#0000FF;'>Cancellation Letter</strong>
        
        <header>
            <p>From:</p>
            <p>(Employer)</p>
            <p>(Company Name)</p>
            <p>(Address)</p>
            <p>(City, State, Zip)</p>
            </br>
            <p>To:</p>
            <p>(Applicant’s Name)</p>
            <p>(Address)</p>
            <p>(City, State, Zip)</p>
            </br>
            <p>(Date)</p>
        </header>
        <body style='text-align:left; color:#000000; margin-right: 650px;'>
            <p>Dear (Applicant’s Name)</p>
            </br>
            <p>Please be informed that you failed to come for an interview last (date) at (time) in (location) for the position of (Applied Position).  </p>
            </br>
            <p>In line with this, we regret to inform you that your application for the position has been cancelled.</p>
            </br>
            <p>Should you wish to reapply, we will be happy to assist you.</p>
            </br>
            </br>
            </br>
            <p>Very truly yours,</p>
            <p>(Company Representative Name)</p>
            <p>(Position)</p>
            <p>Human Resources</p>
        </body>
   ";
   $mail ->AddAddress("joerick_aragon@yahoo.com");

   if(!$mail->Send())
   {
       echo 'Message could not be sent.';
        echo 'Mailer Error';
   }
   else
   {
       echo "Mail Sent";
   }
    }
?>




   

