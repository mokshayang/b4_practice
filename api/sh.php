<?php include_once "base.php";
$row = $Goods->find($_POST['id']);
$row['sh'] = ($_POST['type']=="up")?1:0;
// dd($_POST);
$Goods->save($row);