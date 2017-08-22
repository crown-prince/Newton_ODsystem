<?php   
require_once ("conn.php");
if(!isset($_SESSION['username']))
	{
 	echo '<!doctype html>
<head>
<meta charset="utf-8" />
<title>修改密码请先登录！</title>
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body> <br><br>
<div id="logo"><img src="img/logo.png" alt="管理系统" /> </div> <br><br><br>
<div class="box">
<p>若要修改密码，请先<a href="admin.php">登录</a>！</p>  
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
} ?>
<!doctype html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>管理系统</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/unicorn.login.css" />
<link rel="stylesheet" href="css/animate.css">
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script language="javascript">    
function CheckForm(login){
	var user=login.iusername;
	var pwd1=login.ipassword1;
	var pwd2=login.ipassword2;
	var dlm=login.idengluma;
	if(user.value==""){
		user.setCustomValidity("请填写帐号！"); 
	}else{
		user.setCustomValidity(""); 
	}
	if(pwd1.value==""){
		pwd1.setCustomValidity("请填写密码！"); 
	}else{
		pwd1.setCustomValidity(""); 
	}
	if(pwd2.value==""){
		pwd2.setCustomValidity("请填写确认密码！"); 
	}else{
		pwd2.setCustomValidity(""); 
	}
	if(dlm.value==""){
		dlm.setCustomValidity("请填写登录码！"); 
	}else{
		dlm.setCustomValidity(""); 
	}
}
</script> 
</head>
<body>
<div id="logo"><img src="img/logo.png" alt="管理系统" /></div>
<div id="admineditbox">
<form id="login" name="login" method="post" action="">
<?php
	require_once ("conn.php");
	if(isset($_POST['submit']) && $_POST['submit'])
	{
		$iadmin=$_POST["iusername"];
		$ipwd1=md5(sha1($_POST["ipassword1"]));
		$ipwd2=md5(sha1($_POST["ipassword2"]));
		$idlm= $_POST["idengluma"];
			if ($iadmin == "" || $ipwd1 == "" || $ipwd2 == "" || $idlm == "") {
			echo'<p class="shake">请不要填写空值！</p>';	
			}
			else{
				if ($ipwd1==$ipwd2) {
				$isql="update admin set username='$iadmin',password='$ipwd1',dengluma='$idlm' where id='1'";
					if(mysqli_query($conn, $isql)){
							session_destroy();
								echo'<meta http-equiv="Refresh" content="5; url=admin.php" /> 
								<style>.control-group,.form-actions{display:none !important;}#admineditbox{height:60px !important;}</style>
								<p>修改成功！请<a href="admin.php">重新登录</a>！</p>';	
					}
					else{
					    echo'<p class="shake">数据修改失败！</p>';		
					}
				}
				else{
				   echo'<p class="shake">两次密码输入不一致！</p>';
				}
			}
	}

	
?>
<br><br>
	<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-user"></i></span>
					<input type="text" name="iusername" placeholder="新帐号" maxlength="30" required/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" name="ipassword1" maxlength="30" placeholder="新密码" required/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-lock"></i></span>
					<input type="password" name="ipassword2" maxlength="30" placeholder="确认新密码" required/>
				</div>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<div class="input-prepend"> <span class="add-on"><i class="icon-ok"></i></span>
					<input type="text" name="idengluma" maxlength="30" placeholder="新登录码" required/>
				</div>
			</div>
		</div>
		<div class="form-actions"> <span class="pull-left"></span> <span class="pull-right">
			<input type="submit" class="btn btn-inverse" name="submit" value="修改" onClick="CheckForm(this.form)"/>
			</span> </div>
	</form>
</div>
<script src="js/jquery.min.js"></script> 
<script src="js/unicorn.login.js"></script>
</body>
</html>