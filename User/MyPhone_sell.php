<?php
include('../Assets/Connection/Connection.php');
include('Header.php');


if(isset($_GET['id']))
{
    $upqry="update tbl_buyusedphone set buy_status=2 where buyphone_id=".$_GET['id'];
    if($con->query($upqry))
    {
        ?>
        <script>
            alert('Selled');
            window.location="MyPhone_sell.php";
            </script>
        <?php
    }
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Used Phones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        a {
            color: #ff6666;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            background-color: #ffffff;
        }

        table,
        th,
        td {
            border: 1px solid #ff6666;
        }

        th,
        td {
            padding: 12px 15px;
        }

        th {
            background-color: #ff6666;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #ffe5e5;
        }

        tr:hover {
            background-color: #ffcccc;
        }

        img {
            border: 1px solid #ff6666;
            border-radius: 8px;
        }

        .status a {
            background-color: #28a745; /* Green color */
            color: white; /* White text */
            padding: 8px 12px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .status a:hover {
            background-color: #218838; /* Darker green on hover */
        }
    </style>
</head>

<body>
    <a href="Homepage.php">Home</a>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Buyer Name</th>
                <th>Photo</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $selqurey = "select * from tbl_buyusedphone b inner join tbl_usedphone u on b.usedphone_id=u.usedphone_id inner join tbl_user r on b.buyer_id=r.user_id where u.user_id=" . $_SESSION['uid'];
            $result = $con->query($selqurey);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <tr>
                <td><?php echo $data["usedphone_name"] ?></td>
                <td><?php echo $data["usedphone_price"] ?></td>
                <td><?php echo $data["user_name"] ?></td>
                <td><img src="../Assets/Files/UsedPhones/<?php echo $data["usedphone_photo"] ?>" width="150" height="150"
                        alt=""></td>
                <td class="status">
                    <?php
                    if ($data['buy_status'] == 0) {
                        echo "No response";
                    } else if ($data['buy_status'] == 1) {
                    ?>
                    <a href="Chat.php?id=<?php echo $data['user_id'] ?>">Chat</a> |
                    <a href="MyPhone_sell.php?id=<?php echo $data['buyphone_id'] ?>">Sold</a>
                    <?php
                    } else {
                        echo "Sold";
                    }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

