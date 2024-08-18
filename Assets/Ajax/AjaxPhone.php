<?php

include('../Connection/Connection.php');
?>

<select name="sel_phone">
   <option value="-----select-----">---select----</option>
   
   


<?php
$selquery="select * from  tbl_mobile where company_id =".$_GET["did"];
$result=$con->query($selquery);

while($data = $result -> fetch_assoc())
{

	?>
<option value="<?php echo $data["mobile_id"]?>"><?php echo $data["mobile_name"] ?></option>

<?php
}
?>
</select>