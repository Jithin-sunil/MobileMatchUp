
<?php
include('../Assets/Connection/Connection.php');
include('header.php');

if(isset($_POST["btnchangepassword"]))
{
$Currentpassword=$_POST["txtoldPassword"];
$NewPassword=$_POST["txtnewPassword"];
$ReTypePassword=$_POST["txtreTypePassword"];
$selquery="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc();
$oldPassword=$data["user_password"];
if($oldPassword==$Currentpassword)
{
	if($NewPassword==$ReTypePassword)
	{
		$Update="update tbl_user set user_password='$NewPassword' where user_id='".$_SESSION['uid']."'";
		$con->query($Update);
		{
	?>
    <script>
	alert("update")
	window.location="Changepassword.php";
	 </script>
     <?php
		}
}
else
{
	?>
	<script>
	alert("Mismatch details")
    </script>
     <?php
	 }
}
}
?>
		







<form id="form1" name="form1" method="post" action="">
  <table width="301" border="1">
    <tr>
      <th width="175" scope="col">Old Password</th>
      <th width="110" scope="col"><label for="txtoldPassword"></label>
      <input type="text" name="txtoldPassword" id="txtoldPassword" /></th>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txtnewPassword"></label>
      <input type="text" name="txtnewPassword" id="txtnewPassword" /></td>
    </tr>
    <tr>
      <td height="36">Re-Type Password</td>
      <td><label for="txtreTypePassword"></label>
      <input type="text" name="txtreTypePassword" id="txtreTypePassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"ali><input name="btnchangepassword" type="submit" id="btnchangepassword" value="Change Password" />&nbsp;&nbsp;
      <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<?php
include('Footer.php');
?>
