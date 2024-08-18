<?php
 $result="";
 if (isset($_POST ['btnplus'])!=null)
 {
	 $number1=$_POST['txtnumber1'];
	 $number2=$_POST['txtnumber2'];
	 $sum=$number1+$number2;
	 $result="sum= " .$sum;
 }
 if(isset($_POST['btnminus'])!=null)
	  {
	  $number1=$_POST['txtnumber1'];
	 $number2=$_POST['txtnumber2'];
	 $difference=$number1-$number2;
	 $result=" difference" .$difference;
	  }
	 if(isset($_POST['btndivison'])!=null)
	  {
	  $number1=$_POST['txtnumber1'];
	 $number2=$_POST['txtnumber2'];
	 $divide=$number1/$number2;
	 $result="divide" .$divide;
	  }
	 if(isset($_POST['btnmultiply'])!=null)
	  {
	  $number1=$_POST['txtnumber1'];
	 $number2=$_POST['txtnumber2'];
	 $multiply=$number1*$number2;
	 $result="multiply" .$multiply;
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
  <table width="243" border="1">
    <tr>
      <td width="76">Number1</td>
      <td width="151">
      <input type="text" name="txtnumber1" id="txtnumber1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td>
      <input type="text" name="txtnumber2" id="txtnumber2" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="btnplus" id="btnplus" value="+" />
      <input type="submit" name="btnminus" id="btnminus" value="-" />
      <input type="submit" name="btndivison" id="btndivison" value="/" />
      <input type="submit" name="btnmultiplication" id="btnmultiplication" value="*" /></td>
    </tr>
    <tr>
      <td><p>Result</p></td>
      <td><?php echo $result ?> </td>
    </tr>
  </table>
</form>
</body>
</html>