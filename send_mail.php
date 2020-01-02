<?php 
require_once 'mailer/class.phpmailer.php'; 
//echo "welcome";
$mail = new PHPMailer(true);
//print_r($mail);
//exit;
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];
    $message='<table width="800" border="1" cellpadding="0" cellspacing="0" bordercolor="#2B2D6A">

  <tr>

    <td width="371" style="padding:5px"><table width="835" border="0" cellspacing="5" cellpadding="5" bgcolor="#F5F5F5">

        <tr>

          <td colspan="2" style="color:#263C78;font-size: 18px;font-weight: normal;margin-bottom: 3px;">New Request from Contact Us Form</td>

        </tr>

		<tr>

          <td width="210" align="left">Name: </td>

          <td width="625" height="30">'.$name.'</td>

        </tr>

        <tr>

          <td width="210" align="left">Email: </td>

          <td width="625" height="30">'.$email.'</td>

        </tr>


		<tr>

          <td align="left">Comment: </td>

          <td height="30">'.$message.'</td>

        </tr>		

        <tr>

          <td align="left">&nbsp;</td>

          <td height="30">&nbsp;</td>

        </tr>

        <tr>

          <td height="30"><p>Regards,</p>

            <p>Travel mates</p></td>

          <td height="30">&nbsp;</td>

        </tr>

      </table></td>

  </tr>

</table>';
   
 try
   {
        $mail->IsSMTP();
        $mail->isHTML(true);
        $mail->Mailer = "smtp"; 
        $mail->SMTPDebug=0;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure="ssl";
        $mail->Host="smtp.gmail.com";
        $mail->Port='465';
        $mail->AddAddress($email);
        $mail->Username ="nagatimuz@gmail.com";
        $mail->Password="timuz@1221";
        $mail->SetFrom('nagatimuz@gmail.com','travelmates');
        $mail->AddReplyTo("nagatimuz@gmail.com","travelmates");
        $mail->Body=$message;   
        $mail->Subject    = $subject;
     
       if($mail->Send())
    {
     
     $msg = "Hi, Your mail successfully sent to".$email." ";
     alert($msg);
     
    }
     
   }
   catch(phpmailerException $ex)
   {
    
   }
    }
   

?>