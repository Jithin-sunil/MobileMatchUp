<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_POST["btnadd"]))
{
	
	$mobilename=$_POST["txtmobile"];

	$photo=$_FILES['file_photo']['name'];
	$temp=$_FILES['file_photo']['tmp_name'];
	move_uploaded_file($temp,'../Assets/Files/UsedPhones/'.$photo);

	$details=$_POST["txtdetails"];
	$details=$_POST["txtdetails"];
	$price=$_POST["txtprice"];
	$insQry="insert into tbl_usedphone(usedphone_name,usedphone_photo,usedphone_details,usedphone_price,user_id) values('$mobilename',
	'$photo','$details','$price','".$_SESSION['uid']."')";
    if($con -> query($insQry))
	{
		echo"inserted";
	}
}


	if(isset($_GET["delID"]))
{
	$usedphoneId=$_GET["delID"];
	$delQry="delete from tbl_usedphone where usedphone_id=$usedphoneId";
    if($con -> query($delQry))
	{
		echo"deleted";
		header("location:UsedPhone.php");
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
        background-color: #000ff; 
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
    }

    input[type="text"], textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ff4d4d; /* Red border for inputs */
        border-radius: 5px;
        box-sizing: border-box;
        font-size: 14px;
        color: #333;
    }

    input[type="file"] {
        border: none;
        color: #ff4d4d;
        font-size: 14px;
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
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
  <table width="200" border="1">
    <tr>
      <td width="96" scope="col">Mobile Name</td>
      <td width="88" scope="col"><label for="txtmobile"></label>
      <input type="text" name="txtmobile" id="txtmobile" /></td>
    </tr>
    <tr>
      <td>Details</td>
      <td><label for="txtdetails"></label>
      <textarea name="txtdetails" id=""></textarea></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><input type="file" name="file_photo" id=""></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txtprice"></label>
      <input type="text" name="txtprice" id="txtprice" /></td>
    </tr>
    
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnadd" id="btnadd" value="Add" /></td>
    </tr>
  </table>
</form>
</br>

<!-- <table width="386" height="140" border="1">
  <tr>
    <td>SLNO</td>
      <td>Mobile Name</td>
       <td>Details</td>
       <td>Photo</td>
       <td>Price</td>
       </tr>
<?php
$selquery="select * from tbl_usedphone";
$result=$con->query($selquery);
$i=0;
while($data = $result -> fetch_assoc())
{
	$i++;
	?>
    <tr>
    <td><?php echo $i?></td>
	<td><?php echo $data["usedphone_name"] ?></td>
    <td><?php echo $data["usedphone_details"] ?></td>
    <td><a href="../Assets/Files/UsedPhones/<?php echo $data['usedphone_photo']  ?>"><img src="../Assets/Files/UsedPhones/<?php echo $data['usedphone_photo']  ?>" width="150" height="150" alt=""></a></td>
    <td><?php echo $data["usedphone_price"] ?></td>

    <td><a href="UsedPhone.php?delID=<?php echo $data["usedphone_id"]?>">DELETE</a></td>
    </tr> 
   
    <?php
}
?>
</table> -->
</form>
</body>

</html>
<?php
include('Footer.php');
?>
