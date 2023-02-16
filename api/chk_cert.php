<?php include_once "base.php";

echo $_SESSION['cert'] == $_GET['cert'];
// echo true; 會被轉成 1 傳出去
// echo false; 會被轉成 0 傳出去


//或者下面也可以

// if($_SESSION['cert']==$_GET['cert']){
//     echo 1;
// }else{
//     echo 0;
// }