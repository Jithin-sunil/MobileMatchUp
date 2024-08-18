 <?php

include('../Assets/Connection/Connection.php');

include('Header.php');

if(isset($_POST['btnadd']))
{
	
	$Service=$_POST['txtservice'];
	$Details=$_POST['details'];
	$Rate=$_POST['rate'];
	
	$insQry="insert into tbl_servicetype(servicetype_type,servicetype_details,servicetype_rate,servicecenter_id)values('$Service','$Details','$Rate','".$_SESSION["sid"]."')";
	if($con->query($insQry))
	{
		echo"inserted";
	}
}
if(isset($_GET["delID"]))
{
	$ServiceId=$_GET["delID"];
	$delQry="delete from tbl_servicetype where servicetype_id =$ServiceId";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:ServiceType.php");
	}
}
?>

 
 
 
 
 
 
 
 
 
 
 
 
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
   
    <tr>
      <td width="113" scope="col">Service</td>
      <td width="71" scope="col"><label for="txtservice"></label>
      <input type="text" name="txtservice" id="txtservice" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="details"></label>
      <input type="text" name="details" id="details" /></td>
    </tr>
    <tr>
      <td>Rate</td>
      <td><label for="rate"></label>
      <input type="text" name="rate" id="rate" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
  </table>
</form>
 <br />
  <table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Name</td>
<td>Service</td>
<td>Details</td>
<td>Rate</td>
<td>Action</td>

</tr>
<?php
$selquery="select * from  tbl_servicetype p inner join tbl_servicecenter d on p.servicecenter_id=d.servicecenter_id";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
     <td><?php echo $data["servicecenter_name"] ?></td>
	<td><?php echo $data["servicetype_type"] ?></td>
    <td><?php echo $data["servicetype_details"] ?></td>
    <td><?php echo $data["servicetype_rate"] ?></td>

    <td><a href="ServiceType.php?delID=<?php echo $data["servicetype_id"]?>">DELETE</a></td>
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



