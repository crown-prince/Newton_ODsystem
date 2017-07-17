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
<body>
<div id="logo"><img src="img/logo.png" alt="生成展示系统邀请码" /></div>
<div class="box">
  <div id="title">温馨提示<span id="close"><a href="###" onclick="windowclose()">X</a></span></div> 
  <div id="content">
<p>若要生成邀请码，请先<a href="admin.php">登录</a>！</p>  
</div>
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

$yaoqingma = gen_random_password();
$thetime = gmdate('Y-m-d H:i:s', time() + 3600 * 8);
$sql = "insert into yaoqingma(yaoqingma,time) values('$yaoqingma','$thetime')";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>生成展示系统邀请码</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body>
<div class="yaoqingmacont">
<?php
	if(isset($_POST['submit']) && $_POST['submit'])
	{
		 if(mysql_query($sql,$conn))
		 {
			 echo "生成成功！";
			 if (!file_exists("../$yaoqingma"))
			 { 
		       mkdir ("../$yaoqingma");
			   copy("../afnalnfawnaj/index.php", "../$yaoqingma/index.php");
			   copy("../afnalnfawnaj/conn.php", "../$yaoqingma/conn.php");
			   copy("../afnalnfawnaj/edit.php", "../$yaoqingma/edit.php");
			   copy("../afnalnfawnaj/makepage.php", "../$yaoqingma/makepage.php");
			   copy("../afnalnfawnaj/liuyan.php", "../$yaoqingma/liuyan.php");
		     }
		 }
		 else
		 {
			echo "生成失败！";
		 }
}?>
 <form action="" method="post">
<input type="submit" name="submit" class="btn btn-primary" value="生成邀请码"/>
</form>
	<ol style="padding:0 20px;">
<?php
	$sqll="select * from yaoqingma where status=0 order by id desc";
	$rrss=mysql_query($sqll);
	while($rows=mysql_fetch_assoc($rrss))
	{ ?>
	<li><?php echo $rows["yaoqingma"]; ?></li>
	<?php } ?>
	</ol>
		<ol style="padding:0 20px;">
<?php
	$sqll="select * from yaoqingma where status=1 order by id desc";
	$rrss=mysql_query($sqll);
	while($rows=mysql_fetch_assoc($rrss))
	{ ?>
	<li style="text-decoration:line-through; color: #C36"><?php echo $rows["yaoqingma"]; ?></li>
	<?php } ?>
	</ol>
	<input type="button" class="btn btn-danger" onClick="javascript:window.location.href='changepwd.php'" value="修改密码"/>
	<input type="button" class="btn btn-info" onClick="javascript:window.location.href='loginout.php'" value="退出登录"/>
	</div>
</body>
</html>