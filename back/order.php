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
    $rows = $Ord->all();
    foreach($rows as $row){
    ?>
    <tr class="ct pp">
    <td><a href='?do=ord_detail&id=<?=$row['id'];?>'><?=$row['no'];?></a></td>
        <td><?=$row['total']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['name']?></td>
        <td><?=date("Y/m/d", strtotime($row['date']))?></td>
        <td>
            <button onclick="del('ord',<?=$row['id']?>)">刪除</button>
        </td>
    </tr>
    <?php } ?>
</table>