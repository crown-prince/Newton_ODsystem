<?php
//数据库链接文件
    @session_start();
	$host = 'localhost';//数据库服务器
	$user = 'root';//数据库用户名
	$password = 'root';//数据库密码
	$database = 'test';//数据库名
	$conn = mysqli_connect($host, $user, $password, $database) or die('数据库连接失败！');
?>