<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["aid"]))
{
	$viewId=$_GET["aid"];
	$delQry="update  tbl_company set company_status='1' where company_id  =$viewId";
    if($con -> query($delQry))
	{
		?>
        <script>
		alert('Accepted');
		window.location="NewCompany.php";
		</script>
        <?php
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

<table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Name</td>
<td>Email</td>
<td>Conatct</td>
<td>Address</td>
<td>Photo</td>
<td>Proof</td>
<td>District</td>
<td>Place</td>
<td>Action</td>
</tr>
<?php
$selquery="select * from  tbl_company s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where company_status='2' ";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
	<td><?php echo $data["company_name"] ?></td>
    <td><?php echo $data["company_email"] ?></td>
    <td><?php echo $data["company_contact"] ?></td>
    <td><?php echo $data["company_address"] ?></td>
    <td><?php echo $data["company_photo"] ?></td>
    <td><?php echo $data["company_proof"] ?></td>
    <td><?php echo $data["district_name"] ?></td>
    <td><?php echo $data["place_name"] ?></td>
 <td><a href="NewCompany.php?aid=<?php echo $data["company_id"]?>">Accept</a></td>

    </tr> 
   
    <?php
}
?>
</table>
</body>
</html>
<?php
include('Footer.php');
?>