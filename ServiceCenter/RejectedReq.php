<?php
include('../Assets/Connection/Connection.php');
session_start();
include('Header.php');
if(isset($_GET["acpID"]))
{
	$requestid=$_GET["acpID"];
	$acpqry= "update tbl_request set request_status='1' where request_id=$requestid";
	if($con->query($acpqry))
	{ 
	?>
	<script>
		alert("Accepted");
		window.location="AcceptedReq.php";
	</script>
	<?php
	
	}
}

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Request</title>
</head>

<body>

<table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Service Center Name</td>
<td>Service Type</td>
<td>User Name</td>
<td>User Email</td>
<td>User Contact</td>
<td>Action</td>
</tr>
<?php
$selquery="select * from  tbl_request r inner join tbl_user u on r.user_id=u.user_id inner join tbl_servicetype t on r.servicetype_id=t.servicetype_id   inner join tbl_servicecenter s on t.servicecenter_id=s.servicecenter_id where request_status='2'";
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
    <td><?php echo $data["user_name"] ?></td>
    <td><?php echo $data["user_email"] ?></td>
    <td><?php echo $data["user_contact"] ?></td>


   <td><a href="ViewRequests.php?acpID=<?php echo $data["request_id"]?>">Accept</a>
   
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