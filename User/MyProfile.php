<?php
include('../Assets/Connection/Connection.php');
include('Header.php');
$selquery = "SELECT * FROM tbl_user u 
              INNER JOIN tbl_place p ON u.place_id = p.place_id 
              INNER JOIN tbl_district d ON p.district_id = d.district_id 
              WHERE user_id = '" . $_SESSION['uid'] . "'";
$row = $con->query($selquery);
$data = $row->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .profile {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #ff0000; /* Red color for the header */
            margin-bottom: 20px;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-header img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 2px solid #ff0000; /* Red border for the image */
        }

        .profile-info {
            margin: 20px 0;
            padding: 10px;
            border: 1px solid #ffcccc; /* Light red border */
            border-radius: 8px;
            background-color: #fff5f5; /* Light red background */
        }

        .profile-info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .profile-info label {
            font-weight: bold;
            color: #ff0000; /* Red color for labels */
        }

        .button-group {
            text-align: center;
            margin-top: 20px;
        }

        .button-group a {
            background-color: #ff0000; /* Red background for buttons */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .button-group a:hover {
            background-color: #cc0000; /* Darker red on hover */
        }
    </style>
</head>

<body>
<div class="profile">
    <h2>User Profile</h2>
    <div class="profile-header">
        <img src="../Assets/Files/UserDocs/<?php echo $data["user_photo"]; ?>" alt="Profile Photo">
    </div>
    <div class="profile-info">
        <p><label>Name:</label> <?php echo $data["user_name"]; ?></p>
        <p><label>Email:</label> <?php echo $data["user_email"]; ?></p>
        <p><label>Contact:</label> <?php echo $data["user_contact"]; ?></p>
        <p><label>Address:</label> <?php echo $data["user_address"]; ?></p>
        <p><label>District:</label> <?php echo $data["district_name"]; ?></p>
        <p><label>Place:</label> <?php echo $data["place_name"]; ?></p>
    </div>
    <div class="button-group">
        <a href="Editprofile.php">Edit Profile</a>
        <a href="Changepassword.php">Change Password</a>
    </div>
</div>
</body>
</html>
<?php
include('Footer.php');
?>
