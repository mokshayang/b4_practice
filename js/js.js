// JavaScript Document
function lof(x)
{
	location.href=x
}

function del(table,id){
	let chk = confirm("你確定要刪除嗎");
	if(chk){
	$.get("api/del.php",{table,id},()=>{
		location.reload();
	})
}
}