<h2 class="ct">填寫資料</h2>
<?php
$user = $Mem->find(['acc'=>$_SESSION['mem']]);
?>
<style>
    .all{
        margin: 0 auto;
    }
</style>

<table class="all">
    <tr>
        <td class="tt ct">登入帳號</td>
        <td class="pp">
        <?=$user['acc']?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?=$user['name']?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email"  id="email" value="<?=$user['email']?>">
       </td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp">
            <input type="text" name="addr"  id="addr" value="<?=$user['addr']?>">
        </td>
    </tr>
    <tr>
        <td class="tt ct">連絡電話</td>
        <td class="pp">
            <input type="text" name="tel"  id="tel" value="<?=$user['tel']?>">
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
 
    foreach($_SESSION['cart'] as $id => $qt){
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
    <button onclick="checkout()">確定送出</button>
    <button onclick="history.go(-1)">返回修改訂單</button>

</div>
<script>
    function checkout(){

        $.post("api/checkout.php",
        {
            'name':$('#name').val(),
            'email':$('#email').val(),
            'addr':$('#addr').val(),
            'tel':$('#tel').val(),
            'total':<?=$sum?>,
        },
        (res)=>{
            console.log(res);
            alert("訂購成功，感謝您的選購")
        })
    }
</script>

