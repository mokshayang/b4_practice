<h2 class="ct">會員管理</h2>
    
<table class="all ct">
    <tr class="tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    //echo $do; //ucfirst(首字大寫) //lcfirst(首自小寫)
    $rows = $Mem->all();
    foreach ($rows as $row) {
    ?>
        <tr class="pp">
            <td><?= $row['name'] ?></td>
            <td><?= $row['acc'] ?></td>
            <td><?= $row['reg_date']?></td>
            <td>
                <?php
                if ($row['acc'] != 'admin') {
                ?>
                    <button onclick="location.href='?do=mem_detail&id=<?= $row['id'] ?>'">修改</button>
                    <button onclick="del('admin',<?= $row['id'] ?>)">刪除</button>
                <?php } else {
                    echo "此帳號為最高權限";
                }
                ?>
            </td>
        </tr>
    <?php } ?>
</table>