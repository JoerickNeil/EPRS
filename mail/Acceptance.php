<?php
    if (isset($_POST['add']))
    {
    $mailto = $_POST['mail_to'];
    /*$mailSub = $_POST['mail_sub'];
    $mailMsg = $_POST['mail_msg'];
*/

   require 'PHPMailer/PHPMailerAutoload.php';
   $mail = new PHPMailer();
   $mail ->IsSMTP();
   $mail ->SMTPDebug = 0;
   $mail ->SMTPAuth = true;
   $mail ->SMTPSecure = 'ssl'; // or ssl
   $mail ->Host = "smtp.gmail.com";
   $mail ->Port = 465; // or 465
   $mail ->IsHTML(true);
   $mail ->Username = "sample.test.php@gmail.com";
   $mail ->Password = "screwthis";
   $mail ->SetFrom("sample.test.php@gmail.com");
   /*$mail ->Subject = $mailSub;
   $mail ->Body = $mailMsg;*/
   $mail ->AddAddress($mailto);
   $mail ->Subject = "Sample";
   $mail ->Body = "
        <strong style='color:#0000FF;'>Acceptance Letter</strong>
        
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
            <p>On behalf of the Management team, it is a pleasure to inform you that you had been accepted in the position of (Position) following your application and interview.</p>
            </br>
            <p>Kindly report to (Company’s HR) on (Date) at (Time) in order to complete the employment process. You are expected to complete your Medical Examination and to bring all the credentials and documents on that day.</p>
            </br>
            <p>Thank you.</p>
            </br>
            </br>
            </br>
            <p>Very truly yours,</p>
            <p>(Company Representative Name)</p>
            <p>(Position)</p>
            <p>Human Resources</p>
        </body>
   ";
   /*$mail ->AddAddress($mail_to);*/

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



   

