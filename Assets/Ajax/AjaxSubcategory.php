<?php
include('../Connection/Connection.php');
?>
<select name="subcategory">
   <option value="-----select-----">---select----</option>
   
   <?php
$selquery="select * from tbl_subcategory where category_id='".$_GET["did"]."'";
$result=$con->query($selquery);

while($data = $result -> fetch_assoc())
{

	?>
<option value="<?php echo $data["subcategory_id"]?>"><?php echo $data["subcategory_name"] ?></option>

<?php
}
?>
</select>