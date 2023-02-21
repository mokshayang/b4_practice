<?php include_once "base.php";
//front/reg.php and back/edit_mem.php 用 :
if (!isset($_POST['id'])) {// 新增時候 :
    $_POST['reg_date'] = date("Y-m-d");
}
$Mem->save($_POST);
to("../back.php?do=mem");//給編輯用 //新增=>ajax
