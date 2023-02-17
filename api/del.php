<?php include_once 'base.php';
$db = new DB($_GET['table']);
$db ->del($_GET['id']);

//$$ 可變變數 :
//$db = "Men" ;
//$$db 可視為  $($db)  ->  $Men
//$($aaa) $aaa 會視為字串
//${$_POST['table']}
//只能解釋到 $$_POST ['table]
//所以要+{} =>  ${$_POST}