<?php include_once "base.php";
// echo $Mem->count(['acc'=>$_GET['acc'],'pw'=>$_GET['pw']]);
// dd($_GET);
// echo $Mem->count($_GET);
$db = new DB($_GET['table']);

$table = $_GET['table'];
unset($_GET['table']);

if($db->count($_GET)){
    $_SESSION[$table]=$_GET['acc'];
    echo 1;
}else{
    echo 0;
}

// switch($table){
//     case 'mem':
//         if($Mem->count($_GET)){
//             $_SESSION['mem']=$_GET['acc'];
//             echo 1;
//         }else{
//             echo 0;
//         };
//         break;
//     case 'admin':
//         if($Admin->count($_GET)){
//             $_SESSION['admin']=$_GET['acc'];
//             echo 1;
//         }else{
//             echo 0;
//         };
//         break;
// }
