<?php $bigs = $Type->all(['parent' => 0]); ?>
<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="b" id="b"> <!-- 這邊選擇 大分類的項目  -->
        <?php
        foreach ($bigs as $big) {
            echo "<option value='{$big['id']}'>{$big['name']}</option>";
        }
        ?>
    </select>
    <!-- -----  ---- ---- ---- ---- ---- 下方是註解 -----  ---- ---- ---- ---- ----  -->
    <script>
        // function addType(type) :
        // let parent = (type == 'big') ? 0 : $('#b').val();//$('#b').val()===$big['id']
        // let name = (type == 'big') ? $('#big').val() : $('#mid').val();
    </script>
    <!-- -----  ---- ---- ---- ---- ---- 上方是註解 -----  ---- ---- ---- ---- ----  -->
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>




<!-- 顯示區 -->
<table class="all">
    <!-- 撈出大分類 -->
    <?php
    foreach ($bigs as $big) {
    ?>
        <tr class="tt">
            <td><?= $big['name'] ?></td>
            <td class="ct">
                <button data-id="<?= $big['id'] ?>" onclick="editType(this)">修改</button>
                <button onclick="del('type',<?= $big['id'] ?>)">刪除</button>
            </td>
        </tr>
        <?php
        if ($Type->count(['parent' => $big['id']]) > 0) {
            $mids = $Type->all(['parent' => $big['id']]);
            foreach ($mids as $mid) {
        ?>
                <!-- 連動中分類 -->
                <tr class="pp ct">

                    <td><?= $mid['name'] ?></td>
                    <td class="tt">
                        <button data-id="<?= $mid['id'] ?>" onclick="editType(this)">修改</button>
                        <button onclick="del('type',<?= $mid['id'] ?>)">刪除</button>
                    </td>
                </tr>

    <?php }
        }
    } ?>
    
</table>


<script>
    function addType(type) {
        let parent = (type == 'big') ? 0 : $('#b').val();
        let name = (type == 'big') ? $('#big').val() : $('#mid').val();
        $.post("./api/add_type.php", {
            parent,
            name
        }, () => {
            location.reload();
        })
    }

    function editType(dom) {
        let id = $(dom).data('id')
        let name = prompt('請輸入你要修改的分類名稱', $(dom).parent().prev().text());
        if (name) { //(name!=null)
            $.post("./api/add_type.php", {
                id,
                name
            }, () => {
                location.reload();
            })
        }
    }
</script>

<!-- DB : goods 相關 -->
<!-- no  name  price spec stock img intro big mid sh -->
<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="location.href='?do=add_goods'">新增商品</button>
</div>
<table class="all">
    <tr class="tt ct">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows = $Goods->all();
    foreach ($rows as $row) {
    ?>
        <tr class="pp ct">
            <td><?= $row['no'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['stock'] ?></td>
            <td><?= ($row['sh'] == 1) ? '販售中' : '已下架'; ?></td>
            <td>
                <button onclick="location.href='?do=edit_goods&id=<?= $row['id'] ?>'">修改</button>
                <button onclick="del('goods',<?= $row['id'] ?>)">刪除</button>
                <button onclick="sh('up',<?= $row['id'] ?>,this)">上架</button>
                <button onclick="sh('down',<?= $row['id'] ?>,this)">下架</button>
            </td>
        </tr>

    <?php } ?>
</table>
<script>
    //goods 的上下架
    function sh(type, id, dom) {
        let sh =$(dom).parent().prev();
        
        $.post("./api/sh.php", {
            type,
            id
        }, (res) => {
            console.log(res);
            sh.text((type == "up")?'販售中':'已下架');
        })
    }
</script>