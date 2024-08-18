<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

$selquery="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc();

if(isset($_POST["btnedit"]))
{
$Name=$_POST["txtname"];
$Email=$_POST["txtemail"];
$Contact=$_POST["txtcontact"];
$Address=$_POST["txtaddress"];
$Update="update tbl_user set user_name='$Name',user_email='$Email',user_contact='$Contact',user_address='$Address' where user_id='".$_SESSION['uid']."'";
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
















<form id="form1" name="form1" method="post" action="">
  <table width="233" height="210" border="1">
    <tr>
      <td width="89" height="42" scope="col">Name</td>
      <td width="128" scope="col"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name']?>" required/></td>
    </tr>
    <tr>
      <td height="46">Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" value="<?php echo $data['user_email']?>" /></td> 
    </tr>
    <tr>
      <td height="46">Contact</td>
      <td><label for="txtcontact"></label>
        <label for="txtcontact"></label>
      <input type="text" name="txtcontact" id="txtcontact"  value="<?php echo $data['user_contact']?>" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtaddress"></label>
       <textarea name="txtaddress" id="txtaddress" cols="45" rows="5" value="" ><?php echo $data['user_address']?></textarea></td>
    </tr>
    <tr>
      <td height="109" colspan="2" align="center"><input type="submit" name="btnedit" id="btnedit" value="Edit" /></td>
    </tr>
  </table>
</form>


<?php
include('Footer.php');
?>
