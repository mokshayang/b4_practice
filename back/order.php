<h2 class="ct">訂單管理</h2>
<table class="all">
    <tr class="ct tt">
        <td>訂單標號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php
    $orders = $Ord->all();
    foreach($orders as $order){
    ?>
    <tr class="ct pp">
    <td><a href='?do=ord_detail&id=<?=$order['id'];?>'><?=$order['no'];?></a></td>
        <td><?=$order['total']?></td>
        <td><?=$order['acc']?></td>
        <td><?=$order['name']?></td>
        <td><?=date("Y/m/d", strtotime($order['ord_date']))?></td>
        <td>
            <button onclick="del('ord',<?=$order['id']?>)">刪除</button>
        </td>
    </tr>
    <?php } ?>
</table>