<?php
include('../Assets/Connection/Connection.php');

include('Header.php');

$selquery="select * from tbl_servicecenter where servicecenter_id='".$_SESSION['sid']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
$Name=$_POST["txtname"];
$Email=$_POST["txtemail"];
$Contact=$_POST["txtcontact"];
$Address=$_POST["txtaddress"];
$Update = "update tbl_servicecenter set servicecenter_name = '$Name', servicecenter_email = '$Email',servicecenter_contact = '$Contact',servicecenter_address	= '$Address' where servicecenter_id  = '".$_SESSION['sid']."'";
if ($con->query($Update))
{
	?>
  <script>
	alert('updated')
  window.location='EditProfile.php'
	 </script>
  <?php
}
else
{
	?>
	<script>
	alert("Error")
    </script>
     <?php
}
}
?>

























<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Service Center</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        color: #333;
    }

    form {
        width: 450px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ffcccc;
        background-color: #ffffff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
    }

    td {
        padding: 10px;
    }

    input[type="text"],
    textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ff6666;
        border-radius: 4px;
        background-color: #ffcccc;
        color: #333;
    }

    input[type="text"]:focus,
    textarea:focus {
        border-color: #ff6666;
        outline: none;
        background-color: #ffe5e5;
    }

    input[type="submit"] {
        background-color: #ff6666;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #ff9999;
    }

    h2 {
        text-align: center;
        color: #ff6666;
    }
</style>
</head>

<body>
    <h2>Service Center</h2>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txtname" id="txtname" value="<?php echo $data['servicecenter_name']?>" required/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $data['servicecenter_email']?>" /></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['servicecenter_contact']?>" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txtaddress" id="txtaddress" cols="45" rows="5"><?php echo $data['servicecenter_address']?></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btnedit" id="btnedit" value="Edit" />
                </td>
            </tr>
        </table>
    </form>

    <script>
        // Form validation function
        function validateForm() {
            // Validate name
            var name = document.getElementById("txtname").value;
            if (name.trim() === "") {
                alert("Name is required");
                return false;
            }

            // Validate email
            var email = document.getElementById("txtemail").value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Invalid email format");
                return false;
            }

            // Validate contact
            var contact = document.getElementById("txtcontact").value;
            var contactPattern = /^[0-9]{10}$/;
            if (!contactPattern.test(contact)) {
                alert("Contact number must be exactly 10 digits");
                return false;
            }

            // Validate address
            var address = document.getElementById("txtaddress").value;
            if (address.trim() === "") {
                alert("Address is required");
                return false;
            }

            return true; // If all validation passes
        }
    </script>

    <?php include('Footer.php'); ?>   
</body>
</html>
