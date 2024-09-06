<?php
include('../Assets/Connection/Connection.php');
include('Header.php');

// Fetch user data
$selquery = "SELECT * FROM tbl_user WHERE user_id = '".$_SESSION['uid']."'";
$row = $con->query($selquery);
$data = $row->fetch_assoc();

// Handle form submission
if(isset($_POST["btnedit"])) {
    $Name = $_POST["txtname"];
    $Email = $_POST["txtemail"];
    $Contact = $_POST["txtcontact"];
    $Address = $_POST["txtaddress"];

    // Update query
    $Update = "UPDATE tbl_user SET user_name = '$Name', user_email = '$Email', user_contact = '$Contact', user_address = '$Address' WHERE user_id = '".$_SESSION['uid']."'";

    if ($con->query($Update)) {
        echo '<script>alert("Profile updated successfully"); window.location="MyProfile.php";</script>';
    } else {
        echo '<script>alert("Error updating profile");</script>';
    }
}
?>

<form id="form1" name="form1" method="post" action="" onsubmit="return validateForm();">
  <table width="233" height="210" border="1">
    <tr>
      <td width="89" height="42">Name</td>
      <td width="128"><input type="text" name="txtname" id="txtname" value="<?php echo $data['user_name']?>" required/></td>
    </tr>
    <tr>
      <td height="46">Email</td>
      <td><input type="text" name="txtemail" id="txtemail" value="<?php echo $data['user_email']?>" required/></td> 
    </tr>
    <tr>
      <td height="46">Contact</td>
      <td><input type="text" name="txtcontact" id="txtcontact" value="<?php echo $data['user_contact']?>" required/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><textarea name="txtaddress" id="txtaddress" cols="45" rows="5" required><?php echo $data['user_address']?></textarea></td>
    </tr>
    <tr>
      <td height="109" colspan="2" align="center"><input type="submit" name="btnedit" id="btnedit" value="Edit" /></td>
    </tr>
  </table>
</form>

<script>
// Form validation function
function validateForm() {
    // Validate name
    var name = document.getElementById("txtname").value;
    if (name.trim() === "") {
        alert("Name is required");
        return false;
    }

    // Validate email
    var email = document.getElementById("txtemail").value;
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        alert("Invalid email format");
        return false;
    }

    // Validate contact
    var contact = document.getElementById("txtcontact").value;
    var contactPattern = /^[0-9]{10}$/;
    if (!contactPattern.test(contact)) {
        alert("Contact number must be exactly 10 digits");
        return false;
    }

    // Validate address
    var address = document.getElementById("txtaddress").value;
    if (address.trim() === "") {
        alert("Address is required");
        return false;
    }

    return true; // If all validation passes
}
</script>

<?php
include('Footer.php');
?>
