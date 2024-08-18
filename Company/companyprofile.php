<?php
include('../Assets/Connection/Connection.php');

include('Header.php');

$selquery="select * from tbl_company u inner join tbl_place p on u.place_id=p.place_id inner join tbl_district d on p.district_id=d.district_id	 where company_id='".$_SESSION['company_id']."'";
$row=$con->query($selquery);
$data=$row->fetch_assoc()



?>






<s></s>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Company</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff; /* White background */
        color: #ff0000; /* Red text color */
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        min-height: 100vh; /* Full viewport height */
    }
    header {
        background-color: #ffffff; /* white background for header */
        color: #111111; /* red text color */
        padding: 15px;
        text-align: center;
        font-size: 37px;
        font-weight: bold;
    }
    footer {
        background-color: #ff0000; /* Red background for footer */
        color: #ffffff; /* White text color */
        padding: 15px;
        text-align: center;
        font-size: 14px;
    }
    .container {
        flex: 1; /* Fills available space between header and footer */
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
    }
    table {
        width: 100%;
        max-width: 600px;
        border-collapse: collapse;
        background-color: #ffffff; /* White background for the table */
        border: 2px solid #ff0000; /* Red border */
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ff0000; /* Red border for rows */
        color: #ff0000; /* Red text color */
    }
    td img {
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    td:first-child {
        font-weight: bold;
        color: #ff0000; /* Red text for labels */
    }
    a {
        color: #ff0000; /* Red links */
        text-decoration: none;
        font-weight: bold;
    }
    a:hover {
        text-decoration: underline;
    }
    .actions {
        text-align: center;
        padding: 20px 0;
        background-color: #ffffff; /* White background for actions row */
        border-top: 2px solid #ff0000; /* Red border on top */
        color: #ff0000; /* Red text for actions */
    }
</style>

</head>
<body>
<header>
    Company Profile
</header>

<div class="container">
    <form id="form1" name="form1" method="post" action="">
      <table>
        <tr>
          <td colspan="2" style="text-align: center;">
            <img src="../Assets/Files/CompanyDocs/<?php echo $data["company_photo"] ?>" width="90" height="50" alt="Company Logo" />
          </td>
        </tr>
        <tr>
          <td>Name</td>
          <td><?php echo $data["company_name"] ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $data["company_email"] ?></td>
        </tr>
        <tr>
          <td>Contact</td>
          <td><?php echo $data["company_contact"] ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $data["company_address"] ?></td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo $data["district_name"] ?></td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo $data["place_name"] ?></td>
        </tr>
        <tr class="actions">
          <td colspan="2">
            <a href="Editprofile.php">Edit Profile</a>&nbsp;&nbsp;<a href="Changepassword.php">Change Password</a>
          </td>
        </tr>
      </table>
    </form>
</div>

<footer>
    &copy; 2024 Company Name. All rights reserved.
</footer>
</body>
</html>




</html>
<?php
include('Footer.php');
?>