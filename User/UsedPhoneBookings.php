<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_GET['bid']))
{
    $upqry="update tbl_buyusedphone set buy_status='1' where buyphone_id=".$_GET['bid'];
    if($con->query($upqry))
    {
        ?>
        <script>
            alert('Booked');
            window.location="UsedPhoneBookings.php";
            </script>
        <?php
    }
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Used Phones Listing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* White background for the whole page */
            margin: 0;
            padding: 20px;
        }

        a {
            color: #ff4d4d; /* Red color for links */
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }

        table {
            width: 100%;
            border-collapse: collapse; /* Collapse borders for a clean look */
            margin-top: 20px; /* Space above the table */
        }

        th, td {
            padding: 15px; /* Padding inside table cells */
            border: 1px solid #ddd; /* Light grey border */
            text-align: center; /* Centered text */
        }

        th {
            background-color: #ff4d4d; /* Red background for table header */
            color: white; /* White text for table header */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light grey for even rows */
        }

        tr:hover {
            background-color: #ffe6e6; /* Light red on row hover */
        }

        img {
            max-width: 150px; /* Max width for images */
            height: auto; /* Maintain aspect ratio */
            border-radius: 8px; /* Rounded corners for images */
        }

        .status {
            font-weight: bold; /* Bold text for status */
        }

        .status a {
            background-color: #ff4d4d; /* Red background for buttons */
            color: white; /* White text for buttons */
            padding: 5px 10px; /* Padding for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
            text-decoration: none; /* Remove underline */
        }

        .status a:hover {
            background-color: #e63939; /* Darker red on hover */
        }
    </style>
</head>

<body>
    <a href="Homepage.php">Home</a>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Seller Name</th>
            <th>Photo</th>
            <th>Status</th>
        </tr>
        <?php
        $selqurey = "SELECT * FROM tbl_buyusedphone b 
                      INNER JOIN tbl_usedphone u ON b.usedphone_id = u.usedphone_id 
                      INNER JOIN tbl_user r ON u.user_id = r.user_id 
                      WHERE b.buyer_id = ".$_SESSION['uid'];
        $result = $con->query($selqurey);
        $i = 0;
        while($data = $result->fetch_assoc()) {
            $i++;
        ?>
        <tr>
            <td><?php echo $data["usedphone_name"]; ?></td>
            <td><?php echo $data["usedphone_price"]; ?></td>
            <td><?php echo $data["user_name"]; ?></td>
            <td>
                <img src="../Assets/Files/UsedPhones/<?php echo $data["usedphone_photo"]; ?>" alt="">
            </td>
            <td class="status">
                <?php 
                if($data['buy_status'] == 0) {
                    ?>
                    <a href="UsedPhoneBookings.php?bid=<?php echo $data['buyphone_id']; ?>">Book</a>
                    <?php
                } else if($data['buy_status'] == 1) {
                    echo "Booked";
                    ?>
                    <a href="Chat.php?id=<?php echo $data['user_id']; ?>">Chat</a>
                    <?php
                } else if($data['buy_status'] == 2) {
                    echo "Sold Out";
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

</html>