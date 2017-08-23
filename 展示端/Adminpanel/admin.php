<?php
require_once ("conn.php");
if(isset($_SESSION['username']))
	{
 	echo '<!doctype html>
<head>
<meta charset="utf-8" />
<meta http-equiv="Refresh" content="5; url=make.php" />
<title>请勿重复登录！</title>
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body> <br><br>
<div id="logo"><img src="img/logo.png" alt="牛顿信息安全攻防展示系统-展示端" /></div> <br><br><br>
<div class="box">
<p>您已登录，请勿重复登录！<a href="make.php">邀请码管理</a></p>  
<span class="copyright">Copyright &copy; 2017.环宇繁星科技有限公司Wind Punish安全实验室 All rights reserved.</span>
</div>
<script type="text/javascript">
function windowclose() {
    var browserName = navigator.appName;
    if (browserName=="Netscape") {
        window.open("", "_self", "");
        window.close();
    }
    else {
        if (browserName == "Microsoft Internet Explorer"){
            window.opener = "whocares";
            window.opener = null;
            window.open("", "_self");
            window.close();
        }
    }
}
</script>
</body>
</html>';
exit();
}
?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>管理系统</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/unicorn.login.css" />
<link rel="stylesheet" href="css/animate.css">
</head>
<body>
<div id="logo"><img src="img/logo.png" alt="管理系统" /></div>
<div id="adminloginbox">
<form id="login" name="login" method="post" action="">
<?php
    require_once ("conn.php");
	if(isset($_POST['submit']) && $_POST['submit']) 
	{
		$admin = $_POST["username"];
		$pwd = md5(sha1($_POST["password"]));
		$dlm = $_POST["dengluma"];
		
		$admin = mysqli_real_escape_string($conn, $admin);
		$dlm = mysqli_real_escape_string($conn, $dlm);
		
		$sql ="select * from admin where username='$admin' and password='$pwd' and dengluma='$dlm'";
		$rs = @mysqli_query($conn, $sql);
		if(@mysqli_num_rows($rs) == 1){
		$_SESSION['username'] = $admin;
			echo'<meta http-equiv="Refresh" content="5; url=make.php" /> 
			<style>.control-group,.form-actions{display:none !important;}#adminloginbox{height:60px !important;}</style>
		<p>登录成功！<a href="make.php">点击马上跳转</a>！</p>';	
		}
		else{
		    echo'<p class="shake">用户名或密码或登录码输入错误</p>';		
		}
	}
	else{
	    echo'<p>请先登录</p>';
	}
?>
	<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-user"></i></span>
					<input type="text" name="username" placeholder="帐号" maxlength="30" required/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" name="password" maxlength="30" placeholder="密码" required/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-ok"></i></span>
					<input type="text" name="dengluma" maxlength="30" placeholder="登录码" required/>
				</div>
			</div>
		</div>
		<div class="form-actions"> <span class="pull-left"></span> <span class="pull-right">
			<input type="submit" class="btn btn-inverse" name="submit" value="登录"/>
			</span> </div>
	</form>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/unicorn.login.js"></script>
</body>
</html>