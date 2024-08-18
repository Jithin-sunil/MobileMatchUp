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


<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>

<body>
    <a href="Homepage.php">Home</a>
    <table width="666" height="161" border="1">
        <tr>

            <td width="33">Product Name</td>
            <td width="55">Price</td>
            <td width="55">Buyer Name</td>
            <td width="44">Photo</td>
            <td width="44">Status</td>

        </tr>
        <tr>
            <?php
		  $selqurey="select * from tbl_buyusedphone b inner join tbl_usedphone u on b.usedphone_id=u.usedphone_id inner join tbl_user r on b.buyer_id=r.user_id where u.user_id=".$_SESSION['uid'];
		 $result=$con->query($selqurey);
        $i=0;
        while($data=$result->fetch_assoc())
		{
            $i++;
            ?>
        <tr>

            <td>
                <?php echo $data["usedphone_name"] ?>
            </td>
            <td>
                <?php echo $data["usedphone_price"]?>
            </td>
            <td>
                <?php echo $data["user_name"]?>
            </td>
            <td>
                <img src="../Assets/Files/UsedPhones/<?php echo $data["usedphone_photo"]?>" width="150" height="150" alt="">
            </td>

            <td>
                <?php 
                        
                         if($data['buy_status']==0)
                        {
                            echo "No response";
                        }
                        else if($data['buy_status']==1)
                        {
                            ?>
                            <a href="Chat.php?id=<?php echo $data['user_id']?>">Chat</a> |
                            <a href="MyPhone_sell.php?id=<?php echo $data['buyphone_id']?>">Sold</a>
                            <?php

                        }
                        else 
                        {
                            echo "Sold";
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