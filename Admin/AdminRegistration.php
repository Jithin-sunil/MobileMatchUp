<?php
include('Header.php');
include('../Assets/Connection/Connection.php');

if(isset($_POST['btnsubmit'])!=null)
{
	$name=$_POST['txtname'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$insQry="insert into tbl_admin(admin_name,admin_email,admin_password)values('$name','$email','$password')";
	if($con->query($insQry))
	{
		echo"inserted";
	}
}
?>










<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css">
</head>

<body>
<form id="form" name="form" method="post" action="">
  <table width="209" border="1" align="center">
    <tr>
      <td width="83">Name</td>
      <td width="110"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" />
      </td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="text" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" /></td>
    </tr>
  </table>
  
  <br />
  <table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Name</td>
<td>Email</td>
<td>Password</td>
</tr>
<?php
$selquery="select * from  tbl_admin";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
	<td><?php echo $data["admin_name"] ?></td>
    <td><?php echo $data["admin_email"] ?></td>
    <td><?php echo $data["admin_password"] ?></td>
    </tr> 
   
    <?php
}
?>
</table>
</form>
</body>
</html>

<?php
include('Footer.php');
?>