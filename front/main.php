<?php

if (isset($_GET['type']) && $_GET['type'] != 0) {
    //某分類的商品 (大類 或小分類)
    // echo "某分類的商品 (大分類 或小分類)";
    $type = $Type->find($_GET['type']); //去資料庫撈出分類
    //導覽頁的顯示 :
    //如果是大分類 : 即左邊的選單

    if ($type['parent'] == 0) {
        $nav = $type['name'];
        $rows = $Goods->all(['sh' => 1, 'big' => $type['id']]); //撈出所有大分類
    } else { //不是大分類(paremt !=0 這時 $type['name'] 就是小分類)
        //如果是中分類 : 則導覽要呈現 大分類 > 小分類
        $type_big = $Type->find($type['parent']); //找出中分類的 parent 即就是大分類的id
        //在$type['parent']!=0 的狀況下 $type_big=$Type->find($type['parent'])就是 中分類的大分類ID(parent)
        //$type['parent'] 一值表示大分類
        $nav = $type_big['name'] . ' > ' . $type['name'];
        $rows = $Goods->all(['sh' => 1, 'mid' => $type['id']]); //撈出所有中分類
    }
} else {
    //全部商品
    // echo "all";
    $nav = '全部商品';
    $rows = $Goods->all(['sh' => 1]);
}
?>

<h1><?= $nav ?></h1>

<style>
    .item{
        display: grid;
        grid-template-columns: 2fr 5fr;
    }
    .goods{
        display: grid;
        grid-template-rows: 2fr 2fr 2fr 5fr;
        grid-gap: 1px;
    }
    /* .goods>div{
        background:#EFCA85;
    } */

</style>
<div class="hall ">
    <?php

    foreach ($rows as $row) {
    ?>
        <div class="item">
            <div>
                <img src="upload/<?=$row['img']?>" style="width:200px;height:140px" onclick="location.href='?do=edtail&id=<?=$row['id']?>'">
            </div>
            <div class="goods">
                <div class="tt ct"><?= $row['name'] ?></div>
                <div class="pp">價錢 : <?= $row['price'] ?>
                <a href="?do=edtail&id=<?=$row['id']?>">
                    <img src="icon/0402.jpg" style="float:right">
                </a>
                </div>
                <div class="pp">規格 : <?= $row['spec'] ?></div>
                <div class="pp">簡介 : <?= $row['intro'] ?></div>
            </div>
        </div>
        <br>
        <?php } ?>
</div>