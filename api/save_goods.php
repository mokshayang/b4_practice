<?php include_once "base.php";

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
    $_POST['img'] = $_FILES['img']['name'];
}
$_POST['no'] = rand(100000,999999);
$_POST['sh'] = 1;
dd($_POST);
$Goods->save($_POST);