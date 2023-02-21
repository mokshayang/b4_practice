<?php

$goods = $Goods->find($_GET['id']);
$goods_type = $Type->find($goods['big'])['name'];
$goods_type .= " > ";
$goods_type .= $Type->find($goods['mid'])['name'];

?>
<style>
    .item {
        display: grid;
        grid-template-columns: 2fr 5fr;
    }

    .goods {
        display: grid;
        grid-template-rows: 2fr 2fr 2fr 5fr 2fr;
        grid-gap: 1px;
    }
</style>
<h2 class="ct"><?= $goods['name'] ?></h2>
<div class="hall">
    <div class="item ">
        <div>
            <img src="upload/<?= $goods['img'] ?>" style="width:200px;height:140px">
        </div>
        <div class="goods">
            <div class="tt ct">分類 : <?=$goods_type ?></div>
            <div class="pp">編號 : <?= $goods['price'] ?></div>
            <div class="pp">規格 : <?= $goods['spec'] ?></div>
            <div class="pp">詳細說明 : <?= $goods['intro'] ?></div>
            <div class="pp">庫存量 : <?= $goods['stock'] ?></div>
        </div>
    </div>
</div>


<div class="tt ct">
    我要購買
    <input type="number" name="qt" id="qt" value="1">
        <img src="icon/0402.jpg" alt="buy" onclick='buycart()' >  
</div>
<br>
<div class="ct">
    <button onclick="location.href='index.php'">返回</button>
</div>
<script>
    function buycart(){
        let qt =$('#qt').val();
        location.href=`?do=buycart&id=<?=$goods['id'];?>&qt=${qt}`
        // console.log("OK");
    }
</script>