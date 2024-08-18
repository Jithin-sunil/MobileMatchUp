<?php
include('SessionValidation.php');
ob_start();

	include("../Assets/Connection/Connection.php");
    session_start();
	if(isset($_POST["btn_pay"]))
	{
		
				 $a = "update tbl_booking set  booking_date=curdate(),booking_status='2' where booking_id='".$_SESSION["bid"]."'";
                
				if($con->query($a))
				{
					
                                ?>
                    <script>
                    // alert('Payment Completed');
                        window.location="Loader.php?id=<?php echo $_SESSION['bid']?>";
                        </script>
                    <?php
                            }
                            else
                            {
                                echo "<script>alert('Failed')</script>";
                            }
			
	}
	
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
    /* body{
        background-color: gray;
    } */

    .pay-card {
        background-color: white;
        padding: 20px;
        border-radius: 18px;
        color: blue;
        box-shadow: 0 0 35px black;
    }

    .pay-card:hover {
        box-shadow: 0 0 35px;
    }

    .text-box {
        width: 185px;
        border: 1px blue solid;
        padding: 10px;
        border-radius: 11px;
    }

    .button-pay {
        background-color: transparent;
        padding: 17px 103px;
        border: none;
    }

    .button-pay:hover {
        background-color: #0000ffb8;
        transition: 0.3s;
        padding: 17px 103px;
        border-radius: 15px;
        border-color: blue;
    }
</style>
<body>
    <form action="" method="post">

        <table align="center" style="margin-top: 100px;">
            <tr>
                <td>
                    <div class="pay-card">
                    <table>
                        <tr>
                           <td align="center">
                            <i class="fa fa-credit-card" style="font-size:36px"></i>
                           <b style="font-size: 50px;color: red;">Pay</b>
                           <b style="font-size: 50px;color: blue;">ment</b>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div style="padding-top: 40px;">
                                <div style="border:1px solid red;margin:22px;">
                                <table cellspacing="20">
                                    <tr>
                                        <td>Card NO:</td>
                                        <td colspan="3">
                                            <input type="text" style="width: 185px;" id="credit-card" required="required" autocomplete="off" placeholder="XXXX XXXX XXXX XXXX"    title="Enter Correct Card Number"  maxlength="19" name="txtacno" id="" class="text-box">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td colspan="3"><input type="text" name="txtname" required="required" autocomplete="off" pattern="[a-zA-z ]{3,15}" title="Enter Correct Name" minlength="3" placeholder="Name" style="width: 185px;" class="text-box"></td>
                                    </tr>
                                    <tr>
                                        <td>Exp Date</td>
                                        <td><input style="width: 50px;" id="credit-card-exp" type="text" name="txtexpdate" required="required" autocomplete="off" placeholder="XX/XX" pattern="[0-9/]{5,5}" title="Enter Correct Date" minlength="5" maxlength="5" class="text-box"></td>
                                        <td>CCV</td>
                                        <td><input type="text" style="width: 50px;" id="credit-card-ccv" name="txtccv"  required="required" autocomplete="off" placeholder="XXX" pattern="[0-9]{3,3}" title="Enter Correct CCV" minlength="3" maxlength="3" class="text-box"></td>
                                    </tr> 
                                    <!-- <tr>
                                        <td>Total</td>
                                        <td>{{total}}</td>
                                    </tr> -->
                                    <tr><td colspan="4" align="center"><input type="submit" name="btn_pay" value="Make Payment" class="button-pay"></td></tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="center">
                                <i class="fa fa-cc-visa" style="font-size:48px;color:black"></i>
                                <i class="fa fa-cc-paypal" style="font-size:48px;color:red"></i>
                                <i class="fa fa-cc-mastercard" style="font-size:48px;color:rgb(56, 13, 249)"></i>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script>
<!-- ... Your existing HTML code ... -->

<script>
    document.addEventListener("DOMContentLoaded", function() {
      const creditCardInput = document.getElementById("credit-card");
      const creditCardExp = document.getElementById("credit-card-exp");
      const creditCardCcv = document.getElementById("credit-card-ccv");
  
      creditCardInput.addEventListener("input", function() {
        const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
        const formattedValue = formatCreditCard(inputValue);
        this.value = formattedValue;
      });
  
      creditCardExp.addEventListener("input", function() {
        const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
        const formattedValue = formatExpirationDate(inputValue);
        this.value = formattedValue;
      });
  
      creditCardCcv.addEventListener("input", function() {
        const inputValue = this.value.replace(/\D/g, ''); // Remove all non-digits
        const formattedValue = formatCVV(inputValue);
        this.value = formattedValue;
      });
    });
  
    function formatCreditCard(value) {
      const groups = value.match(/(\d{1,4})/g) || [];
      return groups.join(' ');
    }
  
    function formatExpirationDate(value) {
      const groups = value.match(/(\d{1,2})/g) || [];
      return groups.join('/').slice(0, 5);
    }
  
    function formatCVV(value) {
      return value.slice(0, 3);
    }

      function Redirect()
      {
          window.setTimeout(function() {
          window.location = "Loader.php";
        }, 5000);
      }

  </script>
