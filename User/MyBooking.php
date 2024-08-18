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
<style>
    body {
        background-color: #000ff; /* Light pink background */
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
<a href="Homepage.php">Home</a>
<table>
<tr>
    <th>Product Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Booking Date</th>
    <th>Status</th>
</tr>
<tr>
<?php
$selqurey="select * from tbl_cart r  inner join tbl_mobile m on r.mobile_id=m.mobile_id inner join tbl_mobiledetails  c on m.mobile_id=c.mobile_id inner join tbl_booking o on r.booking_id=o.booking_id where user_id='".$_SESSION['uid']."' " ;
$result=$con->query($selqurey);
$i=0;
while($data=$result->fetch_assoc())
{
    $i++;
?>
<tr>
    <td><?php echo $data["mobiledetails_name"]?></td>
    <td><?php echo $data["mobiledetails_price"]?></td>
    <td><?php echo $data["cart_quantity"]?></td>
    <td><?php echo $data["booking_date"]?></td>
    <td>
    <?php 
    if($data["booking_status"]==1 && $data["cart_status"]==1)
    {
        echo "Payment Pending"; 
    }
    else if($data["booking_status"]==2 && $data["cart_status"]==1)
    {
        echo "Payment Completed";
        ?>
        <a href="Bill.php?id=<?php echo $data['cart_id']?>">Bill</a>
        <?php 
    }
    else if($data["booking_status"]==2 && $data["cart_status"]==3)
    {
        ?>
        Product Packed
        <?php 
    }
    else if($data["booking_status"]==2 && $data["cart_status"]==4)
    {
        ?>
        Product Shipped
        <?php 
    }
    else if($data["booking_status"]==2 && $data["cart_status"]==5)
    {
        ?>
        Order Completed /
        <a href="Rating.php?pid=<?php echo $data["mobile_id"]; ?>">Review</a>/
        <?php 
    }
    ?>
    </td>
</tr>
<?php
} 
?> 
</table>
</body>
</html>
