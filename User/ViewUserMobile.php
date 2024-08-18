<?php

include('../Assets/Connection/Connection.php');

include('Header.php');
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Details</title>
</head>
<style>
            .custom-alert-box{
				z-index:1;
                width: 20%;
                height: 10%;
                position: fixed;
                bottom: 0;
                right: 0;
                left: auto;
            }

            .success {
                color: #3c763d;
                background-color: #dff0d8;
                border-color: #d6e9c6;
                display: none;
            }

            .failure {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                display: none;
            }

            .warning {
                color: #8a6d3b;
                background-color: #fcf8e3;
                border-color: #faebcc;
                display: none;
            }
        </style>



<body>
<div class="custom-alert-box">
            <div class="alert-box success">Successful Added to Cart !!!</div>
            <div class="alert-box failure">Failed to Add Cart !!!</div>
            <div class="alert-box warning">Already Added to Cart !!!</div>
        </div>
<form id="form1" name="form1" method="post" action="">
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
<td>Booking</td>
<td>Comment</td>
</tr>
<?php
$selquery="select * from tbl_mobiledetails";
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
    <td><?php echo $data["mobiledetails_price"] ?></td>
    <td><a href="#" onclick="addCart(<?php echo $data['mobiledetails_id']?>)">Add to cart</a></td>
<td><a href="Comments.php?mid=<?php echo $data["mobile_id"]?>">Feedback</a></td>    </tr> 
   
    <?php
}
?>
</table>
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
 function addCart(id)
            {
                $.ajax({
                    url: "../Assets/Ajax/AjaxAddCart.php?id=" + id,
					
                    success: function(response) {
                        console.log(response);
						
                        if (response.trim() === "Added to Cart")
                        {
                            $("div.success").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else if (response.trim() === "Already Added to Cart")
                        {
                            $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
                        }
                        else
                        {
                            $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
                        }
                    }
                });
            }
</script>
<?php
include('Footer.php');
?>

