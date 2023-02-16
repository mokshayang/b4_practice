<?php include_once "base.php";

// $db = new DB($_GET['table']);
unset($_SESSION[$_GET['table']]);

// switch($_GET['table']){
//     case 'mem':
//         unset($_SESSION['men']);
//         break;
//         case 'admin':
//             unset($_SESSION['admin']);
//             break;
// }
to("../index.php");