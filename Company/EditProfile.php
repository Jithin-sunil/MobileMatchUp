<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

$selquery="select * from tbl_company where company_id='".$_SESSION['company_id']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
$Name=$_POST["txtname"];
$Email=$_POST["txtemail"];
$Contact=$_POST["txtcontact"];
$Address=$_POST["txtaddress"];


$Update="update tbl_company set company_name='$Name',company_email='$Email',company_contact='$Contact',company_address='$Address' where company_id='".$_SESSION['company_id']."'";
if ($con->query($Update))
{
	?>
    <script>
	alert("updated")
	window.location="editprofile.php";
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
    <title>Company</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            color: #333;
        }

        table {
            width: 423px;
            height: 437px;
            border-collapse: collapse;
            background-color: #ffcccc;
            margin: 20px auto;
            border: 2px solid #ff6666;
            border-radius: 8px;
        }

        td {
            padding: 12px;
            font-size: 16px;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ff9999;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }

        tr:nth-child(odd) {
            background-color: #fff;
        }

        tr:nth-child(even) {
            background-color: #ffe5e5;
        }

        td {
            text-align: left;
        }

        td[colspan="2"] {
            text-align: center;
        }
    </style>
</head>

<body>
    <form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
        <table border="1">
            <tr>
                <td width="89" height="42" scope="col">Name</td>
                <td width="128" scope="col">
                    <input type="text" name="txtname" id="txtname" value="<?php echo $data['company_name']?>" required />
                </td>
            </tr>
            <tr>
                <td height="46">Email</td>
                <td>
                    <input type="text" name="txtemail" id="txtemail" value="<?php echo $data['company_email']?>" />
                </td>
            </tr>
            <tr>
                <td height="46">Contact</td>
                <td>
                    <input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['company_contact']?>" />
                </td>
            </tr>
            <tr>
                <td height="60">Address</td>
                <td>
                    <textarea name="txtaddress" id="txtaddress" cols="45" rows="5"><?php echo $data['company_address']?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="btnedit" id="btnedit" value="Edit" />
                </td>
            </tr>
        </table>
    </form>

    <script>
        function validateForm() {
            var name = document.getElementById("txtname").value;
            if (name.trim() === "") {
                alert("Name is required");
                return false;
            }

            var email = document.getElementById("txtemail").value;
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(email)) {
                alert("Invalid email format");
                return false;
            }

            var contact = document.getElementById("txtcontact").value;
            var contactPattern = /^[0-9]{10}$/;
            if (!contactPattern.test(contact)) {
                alert("Contact number must be exactly 10 digits");
                return false;
            }

            var address = document.getElementById("txtaddress").value;
            if (address.trim() === "") {
                alert("Address is required");
                return false;
            }

            return true;
        }
    </script>

    <?php
    include('Footer.php');
    ?>
</body>

</html>
