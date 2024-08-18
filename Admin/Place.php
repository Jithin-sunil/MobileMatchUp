
<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$placename=$_POST["txtplace"];
	$pincode=$_POST["txtpincode"];
	$district=$_POST["selDistrict"];
	$insQry="insert into tbl_place(place_name,place_pincode,district_id) values('$placename','$pincode','$district')";
    if($con -> query($insQry))
	{
		echo"inserted";
	}
}


	if(isset($_GET["delID"]))
{
	$placeId=$_GET["delID"];
	$delQry="delete from tbl_place where place_id=$placeId";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:place.php");
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
<form id="form1" name="form1" method="post" action="">
  <table width="386" height="140" border="1">
    <tr>
   <td>District</td>
   
   <td>
   <select name="selDistrict">
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
</td>

  
    <tr>
      <td align="center">Place name</td>
      <td align="center"><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" /></td>
    </tr>
 
  <tr>
      
      <td width="76">Pincode</td>
      <td width="244"><label for="txtpincode"></label>
      <input type="text" name="txtpincode" id="txtpincode" /></td>
    </tr>
    
     <tr>
      <td colspan="2"  align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"></td>
    </tr>
    </table>
    <table width="386" height="140" border="1">
  <tr>
    <td>SLNO</td>
      <td>Placename</td>
      <td>Pincode</td>
   <td>District</td>
  <td>Action</td>
  </tr>
<?php
$selquery="select * from  tbl_place p inner join tbl_district d on p.district_id=d.district_id";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
        <td><?php echo $i?></td>
	    <td><?php echo $data ["place_name"] ?></td>
        <td><?php echo $data ["place_pincode"] ?></td>
        <td><?php echo $data ["district_name"] ?></td>
        <td><a href="place.php?delID=<?php echo $data["place_id"]?>">DELETE</a></td>
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