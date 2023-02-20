<?php include_once "base.php";
// echo $chk = $Mem->count(['acc'=>$_GET['acc']]); //1 or 0
echo  $Mem->count($_GET['acc']); //1 or 0 //這邊聳過來的是 mem { }
// if($chk){
//     echo 1;
// }else{
//     echo 0;
// }