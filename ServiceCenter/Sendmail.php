<?php
include("../Assets/Connection/Connection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';


if(isset($_POST["btn_send"]))
{
	
		$name=$_POST["txt_name"];
		$email=$_POST["txt_mail"];
		$message=$_POST["txt_msg"];
		
	 $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'mobilematchupoffical@gmail.com'; // Your gmail
    $mail->Password = 'ngtfiukpkcrjdopq'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('mobilematchupoffical@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
  
    $mail->Subject = "MobileMatchUp ";  //Your Subject goes here
    $mail->Body = "Service Updates"; //Mail Body goes here
  if($mail->send())
  {
    ?>
<script>
    alert("Email Send")
</script>
    <?php
  }
  else
  {
    ?>
<script>
    alert("Email Failed")
</script>
    <?php
  }
		
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Request</title>
</head>

<body>
<div id="tab" align="center">
<h2>Request</h2>
<form id="form1" name="form1" method="post"  action="">
  <table>
    <tr>
        <td>Name</td>
        <td><input type="text" name="txt_name" required autocomplete="off" pattern="[a-zA-Z ]{4,15}" title="Enter a valid name" id=""></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="email" name="txt_mail" autocomplete="off" required pattern="/^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/" id=""></td>
    </tr>
    <tr>
        <td>Message</td>
        <td><textarea name="txt_msg" required autocomplete="off" id=""></textarea></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Send" name="btn_send"></td>
    </tr>
  </table>
</form>
</body>
</html>