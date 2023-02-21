<?php include_once "base.php";
//訂單編號不重覆
// $no = date("Ymd").rand(100000,999999);
// $chk = $Ord->count(['no'=>$no]);
// while($chk>0){
//     $no = date("Ymd").rand(100000,999999);
//     $chk = $Ord->count(['no'=>$no]);

// }
$_POST['on'] = date("Ymd").rand(100000,999999);
$_POST['acc'] = $_SESSION['mem'];
$_POST['cart'] = serialize($_SESSION['cart']);
$Ord->save($_POST);