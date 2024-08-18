<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_POST["btnsubmit"]))
{
	$category=$_POST["txtcategory"];
	$insQry="insert into tbl_category(category_name) values('$category')";
    if($con -> query($insQry))
	{
		?>
    <script>
       alert('Category added successfully');
       window.location = 'Category.php';
    </script>
    <?php
	}
}


	if(isset($_GET["delID"]))
{
	$categoryid=$_GET["delID"];
	$delQry="delete from tbl_category where category_id=$categoryid";
    if($con -> query($delQry))
	{
		?>
    <script>
       alert('Category deleted successfully');
       window.location = 'Category.php';
    </script>
    <?php
	}
}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Category</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<form name="form" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td width="43">Category</td>
      <td width="141"><label for="txtcategory"></label>
      <input type="text" name="txtcategory" id="txtcategoryt" /></td>
    </tr>
    <tr>
      <td colspan="2"  align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"></td>
    </tr>
  </table>
  <table width="246" height="79" border="1">
    <tr>
      <td width="75">SLNO</td>
      <td width="75">Category</td>
      <td width="74">Action</td>
    </tr>
  
<?php
$selquery="select * from  tbl_category";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
        <td><?php echo $i?></td>
	    <td><?php echo $data ["category_name"] ?></td>
        <td><a href="Category.php?delID=<?php echo $data["category_id"]?>">DELETE</a></td>
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