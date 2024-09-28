<?php
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_POST["btnlogin"]))
{
	$email=$_POST["txtemail"];
	$password=$_POST["txtpassword"];
	$SelUser="select * from tbl_user where user_email='$email' and user_password='$password'";
	$user=$con->query($SelUser);
	
	$SELAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$admin=$con->query($SELAdmin);
	
	$company="select * from tbl_company where company_email='$email' and company_password='$password' ";
	$companydata=$con->query($company);
	
	$SELservicecenter="select * from tbl_servicecenter where servicecenter_email='$email' and servicecenter_password='$password' ";
	$servicecenter=$con->query($SELservicecenter);
	
	
	

	if ($datauser = $user->fetch_assoc())
	{
		$_SESSION["uid"]=$datauser["user_id"];
		$_SESSION["uname"]=$datauser["user_name"];		
		header('Location:../User/Homepage.php');
	}
	else if($dataadmin=$admin->fetch_assoc())
	{
		$_SESSION["aid"]=$dataadmin["admin_id"];
		$_SESSION["admin_name"]=$dataadmin["admin_name"];		
		header('Location:../Admin/Homepage.php');
	}
	else if($datacompany=$companydata->fetch_assoc())
	{
    if($datacompany['company_status']==1)
    {
      $_SESSION["company_id"]=$datacompany["company_id"];
		$_SESSION["company_name"]=$datacompany["company_name"];		
		header('Location:../Company/Homepage.php');
    }
    elseif($datacompany['company_status']==2)
    {
      ?>
      <script>
          alert("Your Request has been Rejected");
          </script>
      <?php
    }
    else{
      ?>
      <script>
          alert("Your Request is Pending")
          </script>
      <?php
    }
		
	}
	else if($dataservicecenter=$servicecenter->fetch_assoc()) 
	{
		if($dataservicecenter['center_status']==1)
		{
			$_SESSION["sid"]=$dataservicecenter["servicecenter_id"];
		$_SESSION["servicecenter_name"]=$dataservicecenter["servicecenter_name"];		
		header('Location:../ServiceCenter/Homepage.php');
		}
		elseif($dataservicecenter['center_status']==2)
		{
			?>
            <script>
            alert("Your Request has been Rejected by the Admin")
            </script>
            <?php
		}
		elseif($dataservicecenter['center_status']==0	){
			?>
            <script>
            alert("Your Request is Pending")
            </script>
            <?php
		}
		
	}
	
	else
	{
		?>
        <script>
		alert("Invalid Details")
		</script>
        <?php
	}
}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>MobileMatchup</title>
<!-- <form id="form1" name="form1" method="post" action="">
  <table width="276" height="120" border="1">
    <tr>
      <td>Email</td>
      <td><label for="txtemail"></label>
      <input type="text" name="txtemail" id="txtemail" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txtpassword"></label>
      <input type="text" name="txtpassword" id="txtpassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align=""><input type="submit" name="btnlogin" id="btnlogin" value="Submit" /></td>
    </tr>
  </table>
</form> -->
<!-- Section: Design Block -->
<!-- Section: Design Block -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #080710;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form id="form1" name="form1" method="post" action="">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" name="txtemail" id="txtemail" />

        <label for="password">Password</label>
        <input type="password" name="txtpassword" id="txtpassword" />

        <!-- <button>Log In</button> -->
		<input type="submit" name="btnlogin" id="btnlogin" value="Login" />
        <!-- <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div> -->
    </form>
</body>
</html>