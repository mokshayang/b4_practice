<?php include_once "base.php";
$chk = $Mem->count(['acc'=>$_GET['acc']]); //1 or 0
if($chk>0){
    echo 1;
}else{
    echo 0;
}