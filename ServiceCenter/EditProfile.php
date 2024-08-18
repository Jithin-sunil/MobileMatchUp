<?php
include('../Assets/Connection/Connection.php');
session_start();
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
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="423" height="437" border="1">
   <tr>
  
   </tr>
   <tr>
      <td width="89" height="42" scope="col">Name</td>
      <td width="128" scope="col"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['servicecenter_name']?>" required/></td>
    </tr>
    <tr>
      <td height="46">Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data['servicecenter_email']?>" /></td> 
    </tr>
     <tr>
      <td height="46">Contact</td>
      <td><label for="txtcontact"></label>
        <label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact"  value="<?php echo $data['servicecenter_contact']?>" /></td>
    </tr>
   <tr>
      <td height="60">Address</td>
      <td><label for="txtaddress"></label>
      <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" value="" ><?php echo $data['servicecenter_address']?></textarea></td>
    </tr>
    <tr> 
        <td colspan="2" align="center">
        <input type="submit" name="btnedit" id="btnedit" value="Edit" />
      </tr>
  </table>
</body>
</html>
<?php
include('Footer.php');
?>