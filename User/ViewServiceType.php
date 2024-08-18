<?php

include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_GET['rid']))
{
	 $insqry="insert into tbl_request(servicetype_id,user_id,request_date)values('".$_GET['rid']."','".$_SESSION['uid']."',curdate())";
	$con->query($insqry)
	?>
    <script>
	alert("request");
	window.location="ViewServiceCenter.php";
	</script>
    <?php

}

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
<td>Service</td>
<td>Details</td>
<td>Rate</td>
<td>request</td>

</tr>
<?php
$selquery="select * from tbl_servicetype where servicecenter_id='".$_GET['SID']."'";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
	<td><?php echo $data["servicetype_type"] ?></td>
    <td><?php echo $data["servicetype_details"] ?></td>
    <td><?php echo $data["servicetype_rate"] ?></td>
    <td> <a href ="ViewServiceType.php?rid=<?php echo $data["servicetype_id"]?>">request</a></td>
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
