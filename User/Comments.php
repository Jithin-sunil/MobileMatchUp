<?php

include('../Assets/Connection/Connection.php');
include('Header.php');

if(isset($_POST['submit']))
{
	$Comment=$_POST['txtcomment'];
	$user=$_SESSION['uid'];
	$Mobile=$_GET['mid'];
	
    $insQry = "insert into tbl_comment(comment_comment,mobile_id,user_id,comment_date)
   values('$Comment','$Mobile','$user',curdate())";
	if($con -> query($insQry))
	{
		echo"inserted";
	}
}

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <th width="84" scope="col">Comment</th>
      <th width="100" scope="col"><label for="txtcomment"></label>
      <input type="text" name="txtcomment" id="txtcomment" /></th>
    </tr>
    <tr>
      <td colspan="2"  align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
include('Footer.php');
?>