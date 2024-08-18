<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
if(isset($_GET["cid"]))

	{
		$upQry="update tbl_cart set cart_status='".$_GET["sts"]."' where cart_id='".$_GET["cid"]."' ";
		if($con->query($upQry))
		{
			?>
			<script>
			
			</script>
			<?php
		}
	}
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Details</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        color: #333;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid #e60018a1; /* Red border */
    }
    th, td {
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #e60018a1; /* Red background */
        color: white; /* White text */
    }
    tr:nth-child(even) {
        background-color: #f9f9f9; /* Light gray background for even rows */
    }
    tr:nth-child(odd) {
        background-color: white; /* White background for odd rows */
    }
    a {
        color: #e60000; /* Red link color */
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
    }
</style>
</head>
<body>
<table>
    <tr>
        <th>SLNO</th>
        <th>UserName</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Mobile</th>
        <th>Price</th>
        <th>Status</th>
    </tr>
    <?php
    // Ensure $con is a valid database connection and session is started
    $selquery = "SELECT * FROM tbl_booking b 
                 INNER JOIN tbl_cart c ON b.booking_id = c.booking_id 
                 INNER JOIN tbl_mobile mo ON c.mobile_id = mo.mobile_id 
                 INNER JOIN tbl_mobiledetails m ON mo.mobile_id = m.mobile_id 
                 INNER JOIN tbl_user u ON b.user_id = u.user_id 
                 WHERE mo.company_id = ?";
    $stmt = $con->prepare($selquery);
    $stmt->bind_param('i', $_SESSION['company_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $i = 0;
    while($data = $result->fetch_assoc()) { 
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo htmlspecialchars($data["user_name"]); ?></td>
        <td><?php echo htmlspecialchars($data["user_contact"]); ?></td>
        <td><?php echo htmlspecialchars($data["user_address"]); ?></td>
        <td><?php echo htmlspecialchars($data["mobiledetails_name"]); ?></td>
        <td><?php echo htmlspecialchars($data["mobiledetails_price"]); ?></td>
        <td>
            <?php 
            switch($data["booking_status"]) {
                case 1:
                    echo ($data["cart_status"] == 1) ? "Payment pending...." : '';
                    break;
                case 2:
                    switch($data["cart_status"]) {
                        case 2:
                            echo 'Payment completed / <a href="Viewuserbooking.php?cid=' . urlencode($data["cart_id"]) . '&sts=3">Pack product</a>';
                            break;
                        case 3:
                            echo 'Product packed / <a href="Viewuserbooking.php?cid=' . urlencode($data["cart_id"]) . '&sts=4">Ship Product</a>';
                            break;
                        case 4:
                            echo 'Product shipped / <a href="Viewuserbooking.php?cid=' . urlencode($data["cart_id"]) . '&sts=5">Product Delivered</a>';
                            break;
                        case 5:
                            echo 'Order Completed';
                            break;
                    }
                    break;
            }
            ?>
        </td>
    </tr>
    <?php
    }
    $stmt->close();
    ?>
</table>
</body>
</html>

</html>
<?php
include('Footer.php');
?>



