<?php include_once "base.php";
$row = $Goods->find($_POST['id']);

// switch($_POST['type']){
//     case 'up':
//         $row['sh'] = 1;
//         break;
//     case 'down':
//         $row['sh'] = 0;
//         break;
// }
$row['sh'] = ($_POST['type']=="up")?1:0;
$Goods->save($row);