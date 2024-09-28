<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_GET['bookID']))
{
  $ins="insert into tbl_buyusedphone (buyer_id,usedphone_id,buydate) values('".$_SESSION['uid']."','".$_GET['bookID']."',curdate())";
  if($con->query($ins))
  {
    ?>
    <script>
      alert('Booked')
      window.location="ViewUsedPhone.php";
    </script>
    <?php
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
<table width="386" height="140" border="1">
  <tr>
    <th>SLNO</th>
      <th>Mobile Name</th>
       <th>Details</th>
       <th>Price</th>
       <th>Mobile booking</th>
<?php
$selquery="select * from tbl_usedphone where user_id!=".$_SESSION['uid'];
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
    <td><img src="../Assets/Files/UsedPhones/<?php echo $data["usedphone_photo"] ?>" width="150" height="150" alt=""></td>
	<td><?php echo $data["usedphone_name"] ?></td>
    <td><?php echo $data["usedphone_details"] ?></td>
    <td><?php echo $data["usedphone_price"] ?></td>
    <td><a href="ViewUsedPhone.php?bookID=<?php echo $data["usedphone_id"]?>">BOOK</a></td>

    </tr> 
   
    <?php
}
?>
</table>
</form>

</body>
</html>
<?php
include('Footer.php');
?>