 <?php

 include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_POST['txtsubmit']))
{
	$name=$_POST['txtname'];
	$model=$_POST['txtmobile'];
	$price=$_POST['price'];

    $select="select * from tbl_mobile where mobile_name='".$name."'";
  $m=$con->query($select);
  if($d=$m->fetch_assoc())
  {
    ?>
    <script>
      alert('Already Exist')
      
    </script>
    <?php
  }
  else
  {
    
	$insQry="insert into tbl_mobile(mobile_name,mobile_model,mobile_price,company_id)values('$name','$model','$price','".$_SESSION['company_id']."')";
	if($con->query($insQry))
	{
		?>
    <script>
      alert('Added')
      
    </script>
    <?php
	}
  }

}
if(isset($_GET["delID"]))
{
	$mobileId=$_GET["delID"];
	$delQry="delete from tbl_mobile where mobile_id=$mobileId";
    if($con -> query($delQry))
	{
		// echo"deleted";
		// header("location:Mobile.php");
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Details Form</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5; /* Light gray background for contrast */
            color: #333; /* Dark text color for readability */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-container {
            width: 400px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff; /* White background */
            border: 2px solid #dc3545; /* Blood red border */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            color: #dc3545; /* Blood red text */
            margin-bottom: 20px;
        }
        .form-container table {
            width: 100%;
        }
        .form-container td {
            padding: 10px;
        }
        .form-container input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #dc3545; /* Blood red border */
            border-radius: 4px;
            background-color: #ffffff; /* White background */
            color: #dc3545; /* Blood red text */
        }
        .form-container input[type="submit"], .form-container input[type="reset"] {
            width: 48%;
            padding: 10px;
            margin: 5px 1%;
            border: 2px solid #dc3545; /* Blood red border */
            border-radius: 4px;
            cursor: pointer;
            background-color: #ffffff; /* White background */
            color: #dc3545; /* Blood red text */
            font-weight: bold;
        }
        .form-container input[type="submit"]:hover, .form-container input[type="reset"]:hover {
            background-color: #dc3545; /* Blood red background on hover */
            color: #ffffff; /* White text on hover */
        }
        .data-table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* White background */
            color: #333; /* Dark text color */
            border: 2px solid #dc3545; /* Blood red border */
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .data-table th, .data-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #dc3545; /* white border */
        }
        .data-table th {
            background-color: #dc3545; /* Blood red background */
            color: #ffffff; /* Blood red text */
        }
        .data-table tr:nth-child(even) {
            background-color: #f9f9f9; /* white for alternating rows */
        }
        .data-table a {
            color: #dc3545; /* Blood red links */
            text-decoration: none;
        }
        .data-table a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Mobile Details Form</h2>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="txtname" id="txtname" /></td>
            </tr>
            <tr>
                <td>Model</td>
                <td><input type="text" name="txtmobile" id="txtmobile" /></td>
            </tr>
            <tr>
                <td>Price</td>
                <td><input type="text" name="price" id="price" minlength="4" maxlength="7" pattern="^\d+$" title="Please enter a valid price (e.g., 100)" required/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="txtsubmit" id="txtsubmit" value="Submit" />
                    <input type="reset" name="btncancel" id="btncancel" value="Cancel" />
                </td>
            </tr>
        </table>
    </form>
</div>

<table class="data-table">
    <tr>
        <th>SLNO</th>
        <th>Name</th>
        <th>Model</th>
        <th>Price</th>
        <th>Company</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    $selquery="select * from tbl_mobile m inner join tbl_company c on m.company_id=c.company_id where c.company_id=".$_SESSION['company_id'];
    $result=$con->query($selquery);
    $i=0;
    while($data = $result -> fetch_assoc()) {
        $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $data["mobile_name"] ?></td>
            <td><?php echo $data["mobile_model"] ?></td>
            <td><?php echo $data["mobile_price"] ?></td>
            <td><?php echo $data["company_name"] ?></td>
            <td><a href="Mobile.php?delID=<?php echo $data["mobile_id"]?>">DELETE</a></td>
            <td><a href="MobileDetails.php?mID=<?php echo $data["mobile_id"]?>">View More</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>





</html>
<?php
include('Footer.php');
?>


