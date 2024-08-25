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
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Send Request</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5; /* Light grey background */
        color: #333;
    }
    #tab {
        background-color: #fff; /* White background for form container */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 40px auto;
        width: 60%;
        max-width: 600px;
    }
    h2 {
        color: #c62828; /* Red color for the heading */
        text-align: center;
        margin-bottom: 20px;
    }
    table {
        width: 100%;
        border-spacing: 0;
    }
    td {
        padding: 10px;
        vertical-align: top;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type="submit"] {
        background-color: #c62828; /* Red color for submit button */
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        display: block;
        margin: 10px auto; /* Center align using margin */
    }
    input[type="submit"]:hover {
        background-color: #b71c1c; /* Darker red on hover */
    }
    input[type="submit"]:focus {
        outline: none;
    }
</style>
</head>
<body>
<div id="tab" align="center">
    <h2>Request</h2>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_name" required autocomplete="off" pattern="[a-zA-Z ]{4,15}" title="Enter a valid name" id=""></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_mail" autocomplete="off" required pattern="^[a-zA-Z0-9.!#$%&*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" id=""></td>
            </tr>
            <tr>
                <td>Message</td>
                <td><textarea name="txt_msg" required autocomplete="off" id=""></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"> <!-- Center align the submit button -->
                    <input type="submit" value="Send" name="btn_send">
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
