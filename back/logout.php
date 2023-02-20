<?php
session_start();
unset($_SESSION['login']);
// unset($_SESSION['cart']);
// unset($_SESSION['mem']);
header("location:./index.php");
?>