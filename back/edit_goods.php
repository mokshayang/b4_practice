<h2 class="ct">修改商品</h2>
<form action="api/save_goods.php" method="post" enctype="multipart/form-data ">
    <?php $row = $Goods->find($_GET['id']); ?>
<table class="all">
    <tr>
        <td class="tt ct">所屬大分類</td>
        <td class="pp">
            <select name="big" id="big"></select>
        </td>
    </tr>
    <tr>
        <td class="tt ct">所屬中分類</td>
        <td class="pp">
            <select name="mid" id="mid"></select>
        </td>
    </tr>
    <tr>
        <td class="tt ct">商品編號</td>
        <td class="pp"><input type="text" name="no" value="<?=$row['no']?>"></td>
    </tr>
    <tr>
        <td class="tt ct">商品名稱</td>
        <td class="pp"><input type="text" name="name" value="<?=$row['name']?>"></td>
    </tr>
    <tr>
        <td class="tt ct">商品價格</td>
        <td class="pp"><input type="number" name="price" value="<?=$row['price']?>"></td>
    </tr>
    <tr>
        <td class="tt ct">規格</td>
        <td class="pp"><input type="text" name="spec" value="<?=$row['spec']?>"></td>
    </tr>
    <tr>
        <td class="tt ct">庫存量</td>
        <td class="pp"><input type="number" name="stock" value="<?=$row['stock']?>"></td>
    </tr>
    <tr>
        <td class="tt ct">商品圖片</td>
        <td class="pp"><input type="file" name="img" ></td>
    </tr>
    <tr>
        <td class="tt ct">商品介紹</td>
        <td class="pp"><textarea name="intro" id="" cols="60" rows="15"><?=$row['intro']?></textarea></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="<?=$row['id']?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回" onclick="location.href='?do=th'">
</div>
</form>
<script>
    getBigs();
        // $('#big').on('change',function(){
    //     getMids();
    // })
    // $('#big').load("./api/get_bigs.php",()=>{
    //     getMids();
    // }) //載入時，僅限於 一次

    // getBigs();
let goods = {big:<?=$row['big']?>,mid:<?=$row['mid']?>}

    function getBigs(){
        // $.get("api/get_bigs.php",(res)=>{
        //     $('#big').html(res);
        // })
        $('#big').load("./api/get_bigs.php",()=>{
            $(`#big option[value='${goods.big}']`).prop('selected',true);
            //$('#big option[value=16]`).prop('selected',true);

            let big = $('#big').val();//抓取選中的val()
            $('#mid').load("api/get_mids.php",{big},()=>{
            $(`#mid option[value='${goods.mid}']`).prop('selected',true);
            })

        })
    }

    //JQ 專用方式 $(' ').load("api/xxxx",{傳值}) //傳值 用post接 //沒有值 get
    function getMids(){
        let big = $('#big').val();
        console.log(big);
        $('#mid').load("api/get_mids.php",{big})
    }
</script>