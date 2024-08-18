<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnadd"]))
{
	$Brandname=$_POST["txtname"];
	$Category=$_POST["selcategory"];
	
	$insQry="insert into tbl_brand(brand_name,category_id) values('$Brandname','$Category')";
    if($con -> query($insQry))
	{
		echo"inserted";
	}
}


	if(isset($_GET["delID"]))
{
	$brandId=$_GET["delID"];
	$delQry="delete from tbl_brand where brand_id=$brandId";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:Brand.php");
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
  <table width="200" border="1">
    <tr>
      <td width="86" scope="col">Name</td>
      <td width="98" scope="col"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Category</td>
       <td>
   <select name="selcategory">
   <option value="-----select-----">---select----</option>
   
   <?php
$selquery="select * from  tbl_category";
$result=$con->query($selquery);

while($data = $result -> fetch_assoc())
{

	?>
<option value="<?php echo $data["category_id"]?>"><?php echo $data["category_name"] ?></option>

<?php
}
?>
</select>
</tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Submit" /></td>
    </tr>
  </table>
</form>
 <table width="386" height="140" border="1">
  <tr>
    <td>SLNO</td>
      <td> Name</td>
      <td>Category</td>
   <td>Action</td>
  </tr>
<?php
$selquery="select * from  tbl_brand b inner join tbl_category c on b.category_id=c.category_id";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
        <td><?php echo $i?></td>
	    <td><?php echo $data ["brand_name"] ?></td>
        <td><?php echo $data ["category_name"] ?></td>
    
        <td><a href="Brand.php?delID=<?php echo $data["brand_id"]?>">DELETE</a></td>
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