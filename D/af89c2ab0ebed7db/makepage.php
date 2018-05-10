<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>牛顿信息安全攻防展示系统-展示端</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="style.css" />
</head>
<body>
    
	<ul id="nav"> 
	<li><a href="index.php">系统概况</a></li> 
	<li><a href="javascript:location.reload();">刷新网页</a></li> 
	<li><a href="edit.php">编辑页面</a></li> 
	<li><a href="liuyan.php">留言系统</a></li> 
	</ul> 
	
	<div id="page">
		<?php  
		//包含数据库连接文件  
		require_once('conn.php');
		if(!isset($_POST['submit'])){  
		    echo "<br><br><br><br><br><br>";
			exit('非法访问!');  
		} 
        $code = $_POST['code'];		
		$username = $_POST['user'];   //制造SQL注入条件
		$password = $_POST['password'];  //制造SQL注入条件
		
		//检测用户名及密码是否正确  
		$sql = "select * from sqltest where name ='$username' and password ='$password'"; //制造SQL注入条件
		$result = mysqli_query($conn, $sql);
		$rownum = mysqli_num_rows($result);
		if($rownum)
		{
            $fp = fopen("hack.php", "w");
			$First = "<?php echo '";
			$Last = "';?>";
            $code = $First.$code.$Last;
			fwrite($fp, $code, strlen($code));
			echo "<br><br><br><br><br><br>";
			echo "<center><h1><a href='hack.php'>Havk a look</a><h1></center>";
		}
		else
		{
			echo "<br><br><br><br><br><br>";
            exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');  
		}
		?>  	   
	</div>

	<div id="footer">
	<p>　　</p>
	</div>

	</div>
</body>
</html>