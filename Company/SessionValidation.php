<?php
session_start();
if($_SESSION['company_id']==""){
    header('location:../Guest/Login.php');
}
?>