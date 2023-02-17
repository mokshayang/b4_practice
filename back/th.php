<?php $bigs = $Type->all(['parent' => 0]); ?>
<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="b" id="b"> <!-- 這邊選擇 大分類的子分類  -->
        <?php
        foreach ($bigs as $big) {
            echo "<option value='{$big['id']}'>{$big['name']}</option>";
        }
        ?>
    </select>
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
                <button data-id="<?= $big['id'] ?>"  onclick="editType(this)">修改</button>
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
    function editType(dom){
        let id = $(dom).data('id')
        // let name = $(dom).parent().prev().text()//要上層前一個(兄)文字
        let name = prompt('請輸入你要修改的分類名稱',$(dom).parent().prev().text());
        if(name){
            $.post("./api/add_type.php",{id,name},()=>{
                location.reload();
            })
        }
        console.log(id,name);
    }
</script>