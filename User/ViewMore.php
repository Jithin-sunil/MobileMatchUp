<?php
include("../Assets/Connection/Connection.php");
include('Header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table cellpadding="10" align="center" cellspacing="60" id="result">
  <tr>
  <?php
   $se="select * from tbl_mobile m inner join tbl_mobiledetails d on m.mobile_id=d.mobile_id where m.mobile_id='".$_GET['mid']."' ";
  
  $data=$con->query($se);
  $rows=$data->fetch_assoc()
  
  ?>
  <td>

    
  <img src="../Assets/Files/MobileDocs/<?php echo $rows['mobiledetails_photo'] ?>" width="150" height="150" alt=""><br>
  Name:<?php echo $rows["mobile_name"]?><br />
  Price:<?php echo $rows["mobile_price"]?><br />
  Model:<?php echo $rows["mobile_model"]?><br />
  Color:<?php echo $rows['mobiledetails_color'] ?><br>
  Ram:<?php echo $rows['mobiledetails_ram'] ?><br>
  Storage:<?php echo $rows['mobiledetails_storage'] ?><br>
  Processor:<?php echo $rows['mobiledetails_processor'] ?><br
  Disply:<?php echo $rows['mobiledetails_display'] ?><br>
  Front Cam:<?php echo $rows['mobiledetails_frontcam'] ?><br>
  Back Cam:<?php echo $rows['mobiledetails_rearcam'] ?><br>
  <a href="#" onclick="addCart(<?php echo $rows['mobile_id']?>)">Add to cart</a>

  
  </td>
  
  </table>
</body>
</html>
<?php
include('Footer.php');
?>