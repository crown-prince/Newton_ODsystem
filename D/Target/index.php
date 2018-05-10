<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="css/public.css" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/public.js"></script>

</head>
<body>

	<!-- 登录body -->
	<form id="login" name="login" method="post">
<?php
    require_once ("inc/conn.php");
	if(isset($_POST['submit'])) 
	{
		$admin = $_POST["username"];
		$pwd = md5(sha1($_POST["password"]));
		
		$admin = mysqli_real_escape_string($conn, $admin);
		
		$sql ="select * from admin where username='$admin' and password='$pwd'";
		$rs = @mysqli_query($conn, $sql);
		if(@mysqli_num_rows($rs) == 1){
		    $_SESSION['username'] = $admin;
			header("Location: center.php");
		}
		else{
			echo "<script>alert('Wrong!');</script>";
		}
	}
?>
		<div class="logDiv">
			<img class="logBanner" src="img/logBanner.png" />
			<div class="logGet">
				<!-- 头部提示信息 -->
				<div class="logD logDtip">
					<p class="p1">登录</p>
				</div>
				<!-- 输入框 -->
				<div class="lgD">
					<img class="img1" src="img/logName.png" />
					<input name="username" type="text" placeholder="输入用户名" />
				</div>
				<div class="lgD">
					<img class="img1" src="img/logPwd.png" />
					<input type="text" name="password" placeholder="输入用户密码" />
				</div>
				
				<div class="logC" name="submit">
					<button type="submit" name="submit">登 录</button> 
				</div>
			</div>
		</div>
	</form>
	<!-- 登录body  end -->

	<!-- 登录页面底部 -->
	<div class="logFoot">
		<p class="p1">Copyright &copy; 2018.Wind Punish安全实验室 All rights reserved.</p>
	</div>
	<!-- 登录页面底部end -->
</body>
</html>
