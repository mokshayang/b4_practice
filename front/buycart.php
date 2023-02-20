<?php
if(isset($_GET['id'])){
    //當不從上方的購物車進入
    //購物車陣列 id 當作key值 = 數量
    //購物車的 $_SESSION['cart'] 為陣列 ['ID'=>qt]
    //不用判斷式，當有幾萬個人，很耗效能


    //這邊如果直接點誤購車  會無ID 與Qt 會報錯
    $_SESSION['cart'][$_GET['id']]=$_GET['qt'];

    //下方會一值存陣列，效能會太多
    // $_SESSION['cart'][]=['id'=>$_GET['id'],'qt'=>$_GET['qt']];

    //cart = [ id => $get['id'],'qt'=>$get['qt'] .....]

}
// dd($_SESSION['cart']);
// if(isset($_SESSION['mem'])){
// //顯示內容
// }else{
//     to("?do=login");
// }

//改成為
if(!isset($_SESSION['mem'])){
    to("?do=login");
}
// dd($_SESSION['cart']);
?>
<?php
// foreach($_SESSION['cart'] as $k => $qt){
// $good = $Goods->find($_SESSION['cart'][$k]);
// dd($_SESSION['cart']);

?>

<h2 class="ct"><?=$_SESSION['mem']?>的購物車</h2>

<?php //要判短cart isset
      //可以不用寫 但使用手法 要先點購買 別值點
// if(!isset($_SESSION['cart'])){
//         echo "<h2 class=''ct> 目前購物車無商品</h2>";
//         exit();//不會往下執行
// }else{

?>

<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小記</td>
        <td>刪除</td>
    </tr>
    <?php //要判短cart isset

    foreach($_SESSION['cart'] as $id => $qt){
        $row = $Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td><?=$qt?></td>
        <td><?=$row['stock']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['price'] * $qt ?></td>
        <td>
            <!-- 下方還數所代表的 this 是原生碼  代表的是DOM -->
            <img src="icon/0415.jpg" alt="" onclick="removeItem(<?=$row['id']?>,this)">
        </td>
    </tr>
    <?php } ?>
</table>
<div class="ct">
    <img src="icon/0411.jpg" alt="" onclick="location.href='?do=index'">
    <img src="icon/0412.jpg" alt="" onclick="">
</div>
<?php //} ?>
<script>
    function removeItem(id,dom){
       $.post("api/remove_item.php",{id},(res)=>{
        // location.reload() 畫面種整時，上方的URL : id與qt 還是存在 !! 所以改用下面 的
        // location.href='?do=buycart';
        $(dom).parents('tr').remove()//parents 往上找到 ....為止 !!
        history.pushState(null,null,'?do=buycart')//要放三個參數 ， 第三個放相對路徑 改URL
       })
    }
</script>