<?php
session_start();

if(isset($_SESSION['customer_id'])) {
    unset($_SESSION['customer_id']);

}
ob_start();


header("Location: login.php");
?>
