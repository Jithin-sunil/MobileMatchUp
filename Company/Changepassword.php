<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnchangepassword"]))
{
$Currentpassword=$_POST["txtoldPassword"];
$NewPassword=$_POST["txtnewPassword"];
$ReTypePassword=$_POST["txtreTypePassword"];
$selquery="select * from tbl_company where company_id='".$_SESSION['company_id']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc();
$oldPassword=$data["company_password"];
if($oldPassword==$Currentpassword)
{
	if($NewPassword==$ReTypePassword)
	{
		$Update="update tbl_user set company_password='$NewPassword' where company_id='".$_SESSION['company_id']."'";
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
	 else
{
	?>
	<script>
	alert("incorrect password")
    </script>
     <?php
	
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