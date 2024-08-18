<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$district=$_POST["txtdistrict"];
	$insQry="insert into tbl_district(district_name) values('$district')";
    if($con -> query($insQry))
	{
		?>
      <script>
      alert("District Inserted Successfully");
      window.location="District.php";
      </script>
      <?php
	}
}


	if(isset($_GET["delID"]))
{
	$districtId=$_GET["delID"];
	$delQry="delete from tbl_district where district_id=$districtId";
    if($con -> query($delQry))
	{
		?>
    <script>
      alert("District Deleted Successfully");
      window.location="District.php";
      </script>
  
    <?php
	}
}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<form name="form" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="43">District</td>
      <td width="141"><label for="txtdistrict"></label>
      <input type="text" name="txtdistrict" id="txtdistrict" /></td>
    </tr>
    <tr>
      <td colspan="2"  align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"></td>
    </tr>
  </table>
  <table width="246" height="79" border="1">
    <tr>
      <td width="75">SLNO</td>
      <td width="75">District</td>
      <td width="74">Action</td>
    </tr>
  
<?php
$selquery="select * from  tbl_district";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
        <td><?php echo $i?></td>
	    <td><?php echo $data ["district_name"] ?></td>
        <td><a href="District.php?delID=<?php echo $data["district_id"]?>">DELETE</a></td>
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