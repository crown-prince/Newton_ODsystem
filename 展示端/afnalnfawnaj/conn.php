<?php
    //连接想要连接的数据库，localhost是本地服务器
    $con = mysql_connect("localhost","root","root");
    //设置字符集，将字符集设置为utf8 的格式，这是大多数的中文都识别的
    mysql_query("SET NAMES 'utf8'");
    mysql_query("SET CHARACTER SET utf8");
    if(!$con){
        die(mysql_error());
    }
    //连接数据库test
    mysql_select_db("test",$con);
?>