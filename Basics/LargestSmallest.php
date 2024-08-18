<?php
$largest=" ";
$smallest=" ";

if(isset($_POST['btnfind'])!=null)
{
	$Number1=$_POST['txtnum1'];
	$Number2=$_POST['txtnum2'];
	$Number3=$_POST['txtnum3'];

		if($Number1>$Number2)
			{
					$largest=$Number1;
			}
		else
			{
				$largest=$Number2;
			}

		if ($largest>$Number3)
		{
				$largest=$largest;
		}
		else
		{
				$largest=$Number3;
		}
		if($Number1<$Number2)
			{
					$smallest=$Number1;
			}
		else
		{
				$smallest=$Number2;
		}
	if($smallest<$Number3)
	{
		$smallest= $smallest;
	}
	else{
		
		$smallest= $Number3;
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
  <table width="291" border="1">
    <tr>
      <td width="92">Number1</td>
      <td width="183"><label for="txtnum1"></label>
      <input type="text" name="txtnum1" id="txtnum1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txtnum2"></label>
        <input type="text" name="txtnum2" id="txtnum2" />
      </td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="txtnum3"></label>
        <input type="text" name="txtnum3" id="txtnum3" />
       </td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btnfind" id="btnfind" value="Find" /></td>
    </tr>
    <tr>
      <td>Largest</td>
      <td><?php echo $largest ?></td>
      
    </tr>
    <tr>
      <td>Smallest</td>
      <td><?php echo $smallest ?></td>
     
    </tr>
  </table>
</form>
</body>
</html>