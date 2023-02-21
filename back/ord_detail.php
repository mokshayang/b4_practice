<?php
$order = $Ord->find($_GET['id']);
?>
<h2 class="ct">訂單標號
    <span style="color:red"><?=$order['no']?></span>詳細資料
</h2>
<style>
    .all{
        margin: 0 auto;
    }
    .b_ord input{
        border: 0;
        background-color: transparent;
    }
</style>

<table class="all b_ord">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
        <?=$order['acc']?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?=$order['name']?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email"  id="email" value="<?=$order['email']?>">
       </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <input type="text" name="addr"  id="addr" value="<?=$order['addr']?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp">
            <input type="text" name="tel"  id="tel" value="<?=$order['tel']?>">
        </td>
    </tr>
</table>

<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小記</td>
    </tr>
    <?php //要判短cart isset
    //計算總計 :
    $sum = 0;
// 要修改的地方
    $cart = unserialize($order['cart']);
 
    foreach($cart as $id => $qt){
        $row = $Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?=$row['name']?></td>
        <td><?=$row['no']?></td>
        <td><?=$qt?></td>

        <td><?=$row['price']?></td>
        <td><?=$row['price'] * $qt ?></td>
<!-- 小記 -->
    </tr>
    <?php 
$sum += $row['price']*$qt; 
} ?>
</table>

<table class="all ct">
    <tr class="tt">
        <td>總價 : <?=$sum?></td>
    </tr>
</table>

<div class="ct">
    <button onclick="history.go(-1)">返回</button>
</div>