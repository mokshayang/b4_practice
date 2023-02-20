<?php

if(isset($_GET['type']) && $_GET['type']!=0){
    //某分類的商品 (大類 或小分類)
    echo "某分類的商品 (大分類 或小分類)";

}else{
    //全部商品

    echo "all";
}