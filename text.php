<?php

date_default_timezone_set("Asia/Taipei");
session_start();
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
function to($url){
    header("location:$url");
}
