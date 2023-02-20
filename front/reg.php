<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名 :</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt ct">帳號 :</td>
        <td class="pp">
            <input type="text" name="acc" id="acc">
        <button id="check" onclick="chk()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼 :</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt ct">電話 :</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt ct">住址 :</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱 :</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="">重置</button>
</div>

<script>
// $('#check').on('click',function(){
//     let acc = $('#acc').val();
//     $.get("api/chk_acc.php",{acc},(res)=>{
//         if((res)*1 || acc=='admin'){ //1 or 0
//             console.log(res);
//         //if(parseInt(res)){    
//         //題意 : 不得用admin
//             alert("此帳號已存在，請使用別的帳號")
//         }else{
//             alert("此帳號可使用")
//         }
//     })
// })
function chk(){
    let acc = $('#acc').val();
    $.get("api/chk_acc.php",{acc},(res)=>{
        if(res*1 || acc=='admin'){ //1 or 0
            console.log(res);
        //if(parseInt(res)){    
        //題意 : 不得用admin
            alert("此帳號已存在，請使用別的帳號")
        }else{
            alert("此帳號可使用")
        }
    })
}

//需要return true false，但是抓不到 ajax 在reg()內 ，根本不知道你的return 啥時會回來
//非同步處理特性 還在跑 不知道啥時候會回來 
//但程式還要擠續往下跑 ， 這時chk()預設是false
//所以再送一次 
function reg(){
    let mem = {name:$("#name").val(),
               acc:$("#acc").val(),
               pw:$("#pw").val(),
               tel:$("#tel").val(),
               addr:$("#addr").val(),
               email:$("#email").val(),
               }
    $.get("api/chk_acc.php",mem,(res)=>{
        if(res*1 || acc=='admin'){ //1 or 0
            console.log(res);
        //if(parseInt(res)){    
        //題意 : 不得用admin
            alert("此帳號已存在，請使用別的帳號")
        }else{
            $.post("./api/save_mem.php",mem,()=>{
                //比較機密，會改變資料表 一般用 post
                //如果只是查詢 用get就可以了
                
                location.href='?do=login'
            })
        }
    })
    
}
</script>