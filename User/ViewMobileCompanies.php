<?php
include('../Assets/Connection/Connection.php');
include('Header.php');


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<table width="386" height="140" border="1">
  <tr>
    <td>SLNO</td>
    <td>Photo</td>
      <td>Company Name</td>
       <td>Contact</td>
       <td>Email</td>
</tr>
<?php
$i=0;
$selquery="select * from tbl_company";
$result=$con->query($selquery);
while($data=$result->fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><img src="../Assets/Files/CompanyDocs/"<?php echo $data["company_photo"] ?> /></td>
	<td><?php echo $data["company_name"] ?></td>
    <td><?php echo $data["company_contact"] ?></td>
    <td><?php echo $data["company_email"] ?></td>
      <a href ="viewusermobile.php">MobileDetails</a>
    


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