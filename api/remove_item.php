<?php include_once "base.php";
unset($_SESSION['cart'][$_POST['id']]);//只能刪除 id 無法刪除 'cart'
dd($_SESSION['cart']);
