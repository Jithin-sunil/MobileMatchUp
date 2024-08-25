<?php

include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST['btnsubmit'])!=null)
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$contact=$_POST['txtcontact'];
	$address=$_POST['txtaddress'];
	
	$place=$_POST['sel_place'];
	
	$photo=$_FILES['photo']['name'];
	$temp=$_FILES['photo']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/CompanyDocs/'.$photo);
	
	
	$proof=$_FILES['proof']['name'];
	$temp=$_FILES['proof']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/CompanyDocs/'.$proof);
	
  $u="select * from tbl_user where user_email = '".$email."'";
  $r=$con->query($u);
  $c="select * from tbl_company where company_email = '".$email."'";
  $re=$con->query($c);
	$s="select * from tbl_servicecenter where servicecenter_email = '".$email."'";
  $res=$con->query($s);
  $a="select * from tbl_admin where admin_email = '".$email."'";
  $row=$con->query($a);
  if($r->num_rows>0 || $re->num_rows>0 || $res->num_rows>0 || $row->num_rows>0)
  {
    ?>
    <script>
      alert('Email already exists');
    </script>
    <?php
  }
  else
  {
    $insQry="insert into tbl_company(company_name,company_email,company_password,company_proof,company_photo,company_address,place_id,company_contact)
    values('$name','$email','$password','$proof','$photo','$address','$place','$contact')";
    
    if($con->query($insQry))
    {
      ?>
    <script>
    alert('Registered');
    window.location='Login.php';
    </script>
    <?php
    }
    
}
  }
	


?>

	
	









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
/* General styling for the body */
body {
    background-image: url('image.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Styling for the form container */
form {
    width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 2px solid #b30000; /* Red border */
    background-color: rgba(255, 255, 255, 0.9); /* White background with transparency */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Styling for the table within the form */
table {
    width: 100%;
    border-collapse: collapse;
}

/* Styling for the table cells */
td {
    padding: 10px;
    vertical-align: middle;
    font-size: 14px;
}

/* Styling for input fields */
input[type="text"], input[type="password"], textarea, select {
    width: calc(100% - 22px);
    padding: 8px;
    border: 1px solid #b30000;
    border-radius: 4px;
    background-color: #fff5f5;
    color: #333;
}

/* Styling for radio buttons */
input[type="radio"] {
    margin-right: 5px;
}

/* Styling for file inputs */
input[type="file"] {
    padding: 5px;
    border: 1px solid #b30000;
    background-color: #fff5f5;
    border-radius: 4px;
}

/* Styling for the buttons */
input[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    background-color: #b30000; /* Red background */
    color: #fff;
    cursor: pointer;
    margin: 5px;
}

input[type="submit"]:hover {
    background-color: #990000; /* Darker red on hover */
}

/* Centering the table and the content */
table {
    margin: 0 auto;
}

td[colspan="2"] {
    text-align: center;
}

/* Additional styling for labels */
label {
    font-weight: bold;
    color: #b30000; /* Red text color */
}

</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="256" border="1">
    <tr>
      <td width="164" scope="col">Name</td>
      <td><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
     <tr>
      <td>Contact</td>
      <td><label for="contact"></label>
        <label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact" /><label for="contact"></label></td>
    </tr>
    <tr>
    <tr>
    
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="password" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="proof"></label>
      <input type="file" name="proof" id="proof" />  <label for="fileproof"></label></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="proof"></label>
      <input type="file" name="photo" id="photo" />  </td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="address"></label>
      <textarea name="txtaddress" cols="10" rows="5"></textarea> </td>
    </tr>
      <td>District</td>
   
   <td>
   <select name="selDistrict" onchange="getPlace(this.value)">
   <option value="-----select-----">---select----</option>
   
   <?php
$selquery="select * from  tbl_district";
$result=$con->query($selquery);

while($data = $result -> fetch_assoc())
{

	?>
<option value="<?php echo $data["district_id"]?>"><?php echo $data["district_name"] ?></option>

<?php
}
?>
</select>
</tr>
  <tr>
   <td>Place</td>
   
   <td>
   <select name="sel_place" id="sel_place">
   <option value="-----select-----">---select----</option>
   
   
</select>
</tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<?php
include('Footer.php');
?>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/Ajax/AjaxPlace.php?did=" + did,
      success: function (result) {

        $("#sel_place").html(result);
      }
    });
  }
  document.getElementById('form1').onsubmit = function() {
    var name = document.getElementById('txtname').value;
    var email = document.getElementById('txtemail').value;
    var contact = document.getElementById('txtcontact').value;
    var password = document.getElementById('txtpassword').value;
    var confirmPassword = document.getElementById('txtconfirmpassword').value;

    // Name validation (only letters and spaces allowed)
    var namePattern = /^[a-zA-Z\s]+$/;
    if (!namePattern.test(name)) {
        alert('Please enter a valid name (only letters and spaces are allowed).');
        return false;
    }

    // Email validation
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert('Please enter a valid email address.');
        return false;
    }

    // Contact validation (10-digit number)
    var contactPattern = /^[0-9]{10}$/;
    if (!contactPattern.test(contact)) {
        alert('Please enter a valid 10-digit contact number.');
        return false;
    }

    // Password validation (at least 6 characters, with at least one digit, one uppercase letter, and one lowercase letter)
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    if (!passwordPattern.test(password)) {
        alert('Password must be at least 6 characters long and include at least one digit, one uppercase letter, and one lowercase letter.');
        return false;
    }

    // Confirm Password validation
    if (password !== confirmPassword) {
        alert('Passwords do not match.');
        return false;
    }

    // Check if all required fields are filled
    var requiredFields = ['txtname', 'gender', 'txtcontact', 'txtemail', 'txtpassword', 'txtconfirmpassword', 'selDistrict', 'sel_place', 'txtaddress', 'filephoto', 'fileproof'];
    for (var i = 0; i < requiredFields.length; i++) {
        if (document.getElementById(requiredFields[i]).value === '') {
            alert('Please fill out all required fields.');
            return false;
        }
    }

    return true;
};
</script>