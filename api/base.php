<?php
date_default_timezone_set("Asia/Taipei");
session_start();
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function q($sql){
    global $pdo;
    $dsn="mysql:host=localhost;charset=utf8;dbname=db15_4";//個人用
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchAll();
}
function to($location){
    header("location:$location");
}

class DB
{
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db15_4";//個人用
    protected $pdo;
    function __construct($table)
    {
        $this->pdo = new PDO($this->dsn,'root','');//個人用
        $this->table = $table;
    }
    private function arrayToSqlArray($array){
        foreach ($array as $key => $value) {
            $tmp[] = "`$key`='$value'";
        }
        return $tmp;
    }
    function mathSql($math,$col,...$arg){
        $sql = "select $math($col) from $this->table  ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrayToSqlArray($arg[0]);
                $sql .=" where" . join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        return $sql;
    }
    function all(...$arg){
        $sql = "select * from $this->table ";
        if(isset($arg[0])){
            if(is_array($arg[0])){
                $tmp = $this->arrayToSqlArray($arg[0]);
                $sql .= " where " .join(" && ",$tmp);
            }else{
                $sql .= $arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .= $arg[1];
        }
        // dd($sql);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    function find($id){
        $sql = "select * from $this->table ";
        if(is_array($id)){
            $tmp = $this->arrayToSqlArray($id);
            $sql .=" where ". join(" && ",$tmp);
        }else{
            $sql .= " where id=$id";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql = "delete from $this->table ";
        if(is_array($id)){
            $tmp = $this->arrayToSqlArray($id);
            $sql .=" where ". join(" && ",$tmp);
        }else{
            $sql .= " where id=$id";
        }
        return $this->pdo->exec($sql);
    }
    function save($array){
        if(isset($array['id'])){
            $id = $array['id'];
            unset($array['id']);
            $tmp = $this->arrayToSqlArray($array);
            $sql = "update $this->table set " ;
            $sql .=  join(",",$tmp);
            $sql .= " where `id`=$id" ;
        }else{
            $col = array_keys($array);
            $sql = "insert into $this->table (`" . join("`,`",$col)."`)
            values ('" . join("','",$array)."')";
        }
    //    dd($sql);
        return $this->pdo->exec($sql);
    }
    function count(...$arg){
        $sql = $this->mathSql("count","*",...$arg);
    //    dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function sum($col,...$arg){
         $sql = $this->mathSql("sum",$col,...$arg);
        //dd($sql);
        return $this->pdo->query($sql)->fetchColumn();       
    }
    function min($col,...$arg){
        $sql = $this->mathSql("min",$col,...$arg);
        //dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function max($col,...$arg){
        $sql = $this->mathSql("max",$col,...$arg);
        //dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
    function avg($col,...$arg){
        $sql = $this->mathSql("avg",$col,...$arg);
        //dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }
   
}

function is_image($type){//$type 為字串格式
    switch($type){
        case "image/gif";
        case "image/jpeg";
        case "image/png";
            return true;//表示這三個結果都是一樣的
        break;
        default:
        return false;
    }
}

function dummy_icon($type){
    switch($type){
        case "text/plain":
            return "file-txt.png";
        break;
        case "application/mspowerpoint":
        case "application/vnd.openxmlformats-officedocument.presentationml.pre":
            return "file-ppt.png";
        break;
        case "application/msword":
            return "file-doc.png";
        break;
        case "application/postscript":
            return "file-ai.png";
        break;
        default:
            return "file-regular.png";
    }
}
$Bottom = new DB("bottom");//頁尾版權
$Mem = new DB("mem");//會員
$Admin = new DB("admin");//管理者
$Type = new DB("type");//類別
$Goods = new DB("goods");//商品
$Ord = new DB("ord");//訂單
// $ = new DB("");//介紹片海報

