 <?php

include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_POST['ADD']))
{
	$STOCK=$_POST['txtstock'];
	$Mobile=$_GET['mid'];
	
$insQry="insert into tbl_stock(stock_quantity,mobile_id,stock_date)values('$STOCK','$Mobile',curdate())";
	if($con->query($insQry))
	{
		echo"inserted";
	}
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
    body {
        background-color: #000ff; /* Light pink background to complement the red and white theme */
        font-family: Arial, sans-serif;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    form {
        background-color: #ffffff; /* White background for the form */
        border: 2px solid #ff4d4d; /* Soft red border */
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    td {
        padding: 10px;
        color: #333; /* Dark gray text color */
        font-size: 16px;
        text-align: center;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ff4d4d; /* Red border for inputs */
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        color: #333;
    }

    input[type="submit"] {
        background-color: #ff4d4d; /* Red background for the submit button */
        color: #fff; /* White text for the button */
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #ff1a1a; /* Darker red on hover */
    }

    label {
        font-weight: bold;
        color: #ff4d4d; /* Red color for labels */
    }
    </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align="center">
    <tr>
      <td width="74" scope="col">Stock</td>
      <td width="110" scope="col"><label for="txtstock"></label>
      <input type="text" name="txtstock" id="txtstock" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="ADD" id="ADD" value="ADD" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Footer.php');
?>