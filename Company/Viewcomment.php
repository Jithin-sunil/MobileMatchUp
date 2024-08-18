<?php

include('../Assets/Connection/Connection.php');
include('Header.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile Details</title>
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
<table border="1" align="center">
<tr>
<th>Mobile</th>
<th>UserName</th>
<th>Email</th>
<th>Date</th>
<th>Comment</th>
</tr>

<?php
$selquery="select * from  tbl_comment c inner join tbl_user u on c.user_id=u.user_id inner join tbl_mobile m on c.mobile_id=m.mobile_id";
$result=$con->query($selquery);

while($data = $result -> fetch_assoc())
{

?>
<tr>
<td><?php echo $data["mobile_name"] ?></td>
<td><?php echo $data["user_name"] ?></td>
<td><?php echo $data["user_email"] ?></td>
<td><?php echo $data["comment_date"] ?></td>
<td><?php echo $data["comment_comment"] ?></td>
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



