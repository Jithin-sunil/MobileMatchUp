<?php
$name="";
$gender="";
$grade="";
$per="";
$total="";
$Department="";

if(isset($_POST["submit"])!=null)
{
  $fname=$_POST['txtfname'];
  $lname=$_POST['txtlname'];
  $Gender=$_POST['gender'];
  $Department=$_POST['department'];
  $Mark1=$_POST['txtmark1'];
  $Mark2=$_POST['txtmark2'];
  $Mark3=$_POST['txtmark3'];
  if($Gender="male")
  {
	  $name="mr".$fname. " ".$lname;
  }
  if($gender="female")
  {
	$name="miss".$fname." ".$lname;
  }
  $total=$Mark1+$Mark2+$Mark3;
  $per=($total/300)*100;
  
  if($per>=90)
  {
	  $grade="A+";
  }
  else if
  ($per>+80)
  {
	  $grade="B+";
  }
   else if
($per>=70)
{
	$grade="C+";
}
else
{
	$grade="failed";
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
  <table width="360" height="214" border="1" align="center">
    <tr>
      <td width="106"><p>First Name</p></td>
       <td><label for="txtfname"></label>
        <input type="text" name="txtfname" id="txtfname" /></td>
    </tr>
    <tr>
      <td><p>Last Name</p></td>
      <td><label for="txtlname"></label>
        <input type="text" name="txtlname" id="txtlname" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="gender" id="male" value="male" />
        male
          <label for="male">
            <input type="radio" name="gender" id="female" value="female" />
          female</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><label for="department"></label>
        <select name="department" id="department">
         <option>-----Select -------</option>
          <option>Computer Department</option>
          <option>Commerce Department</option>
      </select></td>
    </tr>
    <tr>
      <td>Mark 1</td>
      <td><label for="txtmark1"></label>
      <input type="text" name="txtmark1" id="txtmark1" /></td>
    </tr>
    <tr>
      <td>Mark 2</td>
      <td><label for="txtmark2"></label>
      <input type="text" name="txtmark2" id="txtmark2" /></td>
    </tr>
    <tr>
      <td>Mark 3</td>
      <td><label for="txtmark3"></label>
      <input type="text" name="txtmark3" id="txtmark3" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="SUBMIT" />
      <input type="submit" name="CANCEL" id="CANCEL" value="CANCEL" /></td>
      
    </tr>
  </table>
  <table width="100" height="166" border="1" align="center">
    <tr>
      <td>Name</td>
      <td><?php echo $name ?></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td><?php echo $gender ?></td>
    </tr>
    <tr>
      <td>Department</td>
     <td><?php echo $Department ?></td>
    </tr>
    <tr>
      <td>Total</td>
      <td><?php echo $total ?></td>
    </tr>
    <tr>
      <td>Percentage</td>
     <td><?php echo $per ?></td>
    </tr>
    <tr>
      <td>Grade</td>
      <td><?php echo $grade ?></td>
   </tr>
  </table>
</form>
</body>
</html>