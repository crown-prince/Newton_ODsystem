<?php   
require_once ("conn.php");
if(!isset($_SESSION['username']))
	{
 	echo '<!doctype html>
<head>
<meta charset="utf-8" />
<title>生成邀请码请先登录！</title>
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body><br><br>
<div id="logo"><img src="img/logo.png" alt="生成D端邀请码" /></div> <br><br><br>
<div class="box">  
<p>若要生成邀请码，请先<a href="admin.php">登录</a>！</p>  
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
mt_srand((double) microtime() * 1000000);   
function gen_random_password($password_length = 30, $generated_password = ""){ //password_length 随机密码长度，默认10位   
 $valid_characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";   
 $chars_length = strlen($valid_characters) - 1;   
 for($i = $password_length; $i--; ) {   
  //$generated_password .= $valid_characters[mt_rand(0, $chars_length)];   
  
  $generated_password .= substr($valid_characters, (mt_rand()%(strlen($valid_characters))), 1);   
 }   
 return $generated_password;   
}   

$invite = gen_random_password();
$thetime = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
$sql = "insert into invite(code,time) values('$invite','$thetime')";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>生成D端邀请码</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body>
<div class="yaoqingmacont">
<div id="logo"><img src="img/logo.png" alt="管理系统" /></div>
	<?php
		require_once ("conn.php");
		if(isset($_POST['submit']) && $_POST['submit'])
		{
			 if(mysqli_query($conn, $sql))
			 {
				 echo "生成成功！";
				 if (!file_exists("../$invite"))
				 { 
				   mkdir ("../$invite");
				   copy("../af89c2ab0ebed7db/index.php", "../$invite/index.php");
				   copy("../af89c2ab0ebed7db/conn.php", "../$invite/conn.php");
				   copy("../af89c2ab0ebed7db/edit.php", "../$invite/edit.php");
				   copy("../af89c2ab0ebed7db/makepage.php", "../$invite/makepage.php");
				   copy("../af89c2ab0ebed7db/liuyan.php", "../$invite/liuyan.php");
				   copy("../af89c2ab0ebed7db/style.css", "../$invite/style.css");
				 }
			 }
			 else
			 {
				echo "生成失败，请重试";
			 }
	}?>
<br><br>
 <form action="" method="post">
<input type="submit" name="submit" class="btn btn-inverse" value="生成邀请码"/>
</form>
	<ol style="padding:0 20px;">
<?php
    require_once ("conn.php");
	$sql_l="select * from invite where status=0 order by id desc";
	$rrss=mysqli_query($conn, $sql_l);
	while($rows = mysqli_fetch_assoc($rrss))
	{ ?>
	<li><?php echo $rows["code"]; ?></li>
	<?php } ?>
	</ol>
	<ol style="padding:0 20px;">
<?php
	$sql_l = "select * from invite where status=1 order by id desc";
	$rrss = mysqli_query($conn, $sql_l);
	while($rows=mysqli_fetch_assoc($rrss))
	{ ?>
	<li style="text-decoration:line-through; color: #C36"><?php echo $rows["code"]; ?></li>
	<?php } ?>
	</ol>
	<input type="button" class="btn btn-inverse" onClick="javascript:window.location.href='changepwd.php'" value="修改密码"/>
	<input type="button" class="btn btn-info" onClick="javascript:window.location.href='loginout.php'" value="退出登录"/>
	</div>
</body>
</html>