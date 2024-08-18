<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$subcategory=$_POST["txtsubcategory"];
	
	$category=$_POST["selCategory"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id) values('$subcategory','$category')";
    if($con -> query($insQry))
	{
		echo"inserted";
	}
}


	if(isset($_GET["delID"]))
{
	$subcategory=$_GET["delID"];
	$delQry="delete from tbl_subcategory where subcategory_id=$subcategoryid";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:SubCategory.php");
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
   <td>Category</td>
   
   <td>
   <select name="selCategory">
   <option value="-----select-----">---select----</option>
   
   <?php
$selquery="select * from  tbl_Category";
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
</td>

  
    <tr>
      <td align="center">Subcategory name</td>
      <td align="center"><label for="txtsubcategory"></label>
      <input type="text" name="txtsubcategory" id="txtsubcategory"/></td>
    </tr>
 
  
    
     <tr>
      <td colspan="2"  align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"></td>
    </tr>
    </table>
    <table width="386" height="140" border="1">
  <tr>
    <td>SLNO</td>
      <td>Subcategory name</td>
      
   <td>Category</
  <td>Action</td>
  </tr>
<?php
$selquery="select * from  tbl_subcategory p inner join tbl_category d on p.category_id=d.category_id";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
        <td><?php echo $i?></td>
	    <td><?php echo $data ["subcategory_name"] ?></td>
       
        <td><?php echo $data ["category_name"] ?></td>
        <td><a href="SubCategory.php?delID=<?php echo $data["subcategory_id"]?>">DELETE</a></td>
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