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

<body>

<table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Name</td>
<td>Email</td>
<td>Proof</td>
<td>District</td>
<td>Place</td>
<td>Action</td>
</tr>
<?php
 $selquery="select * from  tbl_servicecenter s inner join tbl_place p on s.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id where center_status=1";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
	<td><?php echo $data["servicecenter_name"] ?></td>
    <td><?php echo $data["servicecenter_email"] ?></td>
    <td><?php echo $data["servicecenter_proof"] ?></td>
    <td><?php echo $data["district_name"] ?></td>
    <td><?php echo $data["place_name"] ?></td>
   <td><a href="ViewServiceType.php?SID=<?php echo $data["servicecenter_id"]?>">View Type</a></td>
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