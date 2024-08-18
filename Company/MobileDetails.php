<?php

include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_POST['btnsubmit']))
{
	$photo=$_FILES['filephoto']['name'];
	$temp=$_FILES['filephoto']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/MobileDocs/'.$photo);
	$Name=$_POST['txtname'];
	$Color=$_POST['txtclr'];
	$Storage=$_POST['storage'];
	$RAM=$_POST['ram'];
	$ROM=$_POST['rom'];
	$Processor=$_POST['processor'];
	$RearCamera=$_POST['rcam'];
	$FrontCamera=$_POST['fcam'];
	$Display=$_POST['txtdiplay'];
	$Battery=$_POST['txtbattery'];
	// $Price=$_POST['txtprice'];
	$Mobile=$_GET['mID'];
	
  $select="select * from tbl_mobiledetails where mobiledetails_name='".$Name."'";
  $m=$con->query($select);
  if($d=$m->fetch_assoc())
  {
    ?>
    <script>
      alert('Already Exist')
      
    </script>
    <?php
  }
  else
  {
    $insQry="insert into tbl_mobiledetails( mobiledetails_photo,mobiledetails_name,mobiledetails_color,mobiledetails_storage,	mobiledetails_ram,mobiledetails_rom,
    mobiledetails_processor,mobiledetails_rearcam,mobiledetails_frontcam,mobiledetails_display,mobiledetails_battery,mobile_id)
    values('$photo','$Name','$Color','$Storage','$RAM','$ROM','$Processor','$RearCamera','$FrontCamera','$Display',
    '$Battery',$Mobile)";
    
    
      if($con->query($insQry))
      {
        ?>
        <script>
          alert('inserted');
          window.location="MobileDetails.php";
        </script>
        <?php
      }
  }



}
if(isset($_GET["delID"]))
{
	$mobiledetailsId =$_GET["delID"];
	$delQry="delete from tbl_mobiledetails where mobiledetails_id =$mobiledetailsId";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:MobileDetails.php");
	}
}
?>














<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Details</title>
<style>
    body {
        background-color: 000ff; /* Light pink background */
        font-family: 'Arial', sans-serif;
        color: #333;
        margin: 0;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    a {
        color: #ff4d4d; /* Soft red for links */
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 20px;
        font-size: 18px;
    }

    a:hover {
        color: #ff1a1a; /* Darker red on hover */
    }

    table {
        width: 666px;
        border-collapse: collapse;
        background-color: #fff; /* White background */
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    table, th, td {
        border: 1px solid #ff4d4d; /* Soft red borders */
    }

    th, td {
        padding: 12px;
        text-align: center;
        font-size: 16px;
        color: #ff4d4d; /* Soft red text */
    }

    th {
        background-color: #ff4d4d; /* Soft red background for headers */
        color: #fff; /* White text for headers */
        font-size: 18px;
    }

    td {
        background-color: #fff;
        color: #333;
    }

    td a {
        color: #ff4d4d; /* Soft red links */
        font-weight: normal;
        text-decoration: underline;
    }

    td a:hover {
        color: #ff1a1a; /* Darker red on hover */
    }

    tr:nth-child(even) td {
        background-color: #ffe6e6; /* Light pink for alternate rows */
    }
    #tab th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #dc3545;
    color: white;
}
</style>
</head>

<body>
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
  <tr>
      <td>photo</td>
      <td><label for="filephoto"></label>
      <input type="file" name="filephoto" id="filephoto" />    
      

    <tr>
      <td width="109" scope="col">Name</td>
      <td width="75" scope="col"><label for="txtname"></label>
      <input type="text" name="txtname" id="txtname" /></td>
    </tr>
    <tr>
      <td>Color</td>
      <td><label for="txtclr"></label>
      <input type="text" name="txtclr" id="txtclr" /></td>
    </tr>
    <tr>
      <td>Storage</td>
      <td><label for="storage"></label>
      <input type="text" name="storage" id="storage" /></td>
    </tr>
    <tr>
      <td>RAM</td>
      <td><label for="ram"></label>
      <input type="text" name="ram" id="ram" /></td>
    </tr>
    <tr>
      <td>ROM</td>
      <td><label for="rom"></label>
      <input type="text" name="rom" id="rom" /></td>
    </tr>
    <tr>
      <td>Processor</td>
      <td><label for="processor"></label>
      <input type="text" name="processor" id="processor" /></td>
    </tr>
    <tr>
      <td>Rear Camera</td>
      <td><label for="rcam"></label>
      <input type="text" name="rcam" id="rcam" /></td>
    </tr>
    <tr>
      <td>Front Camera</td>
      <td><label for="fcam"></label>
      <input type="text" name="fcam" id="fcam" /></td>
    </tr>
    <tr>
      <td>Display</td>
      <td><label for="txtdiplay"></label>
      <input type="text" name="txtdiplay" id="txtdiplay" /></td>
    </tr>
    <tr>
      <td>Battery</td>
      <td><label for="txtbattery"></label>
      <input type="text" name="txtbattery" id="txtbattery" /></td>
    </tr>
      <!-- <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice" /></td>
    </tr> -->
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnsubmit" id="btnsubmit" value="Submit" />        <input type="submit" name="btncancel" id="btncancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
<br />
  <table border="1" align="center">
<tr>

<td>SLNO</td>
<td>Photo</td>
<td>Name</td>
<td>Color</td>
<td>Storage</td>
<td>RAM</td>
<td>ROM</td>
<td>Processor</td>
<td>Rear Camera</td>
<td>Front Camera</td>
<td>Display</td>
<td>Battery</td>
<td>Price</td>
<td>Action</td>


</tr>
<?php
$selquery="select * from tbl_mobiledetails where mobile_id='".$_GET['mID']."'";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><img src="../Assets/Files/MobileDocs/<?php echo $data["mobiledetails_photo"] ?>"  width="120" height="50"/></td>
	<td><?php echo $data["mobiledetails_name"] ?></td>
    <td><?php echo $data["mobiledetails_color"] ?></td>
    <td><?php echo $data["mobiledetails_storage"] ?></td>
    <td><?php echo $data["mobiledetails_ram"] ?></td>
    <td><?php echo $data["mobiledetails_rom"] ?></td>
    <td><?php echo $data["mobiledetails_processor"] ?></td>
    <td><?php echo $data["mobiledetails_rearcam"] ?></td>
    <td><?php echo $data["mobiledetails_frontcam"] ?></td>
    <td><?php echo $data["mobiledetails_display"] ?></td>
    <td><?php echo $data["mobiledetails_battery"] ?></td>
     <!-- <td><?php echo $data["mobiledetails_price"] ?></td> -->
    <td><a href="MobileDetails.php?delID=<?php echo $data["mobiledetails_id"]?>">DELETE</a>
    <a href="AddStock.php?mid=<?php echo $data["mobile_id"]?>">Add Stock</a></td>
    
    </tr> 
   
    <?php
}
?>
</table>
</form>
</body>

<?php
include('Footer.php');
?>
</html>



