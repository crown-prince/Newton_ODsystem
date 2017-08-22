<?php 
require_once ("conn.php");
session_destroy();
echo '<!doctype html>
<head>
<meta charset="utf-8" />
<title>注销成功！</title>
<link rel="stylesheet" href="css/unicorn.login.css" />
</head>
<body> <br><br>
<div id="logo"><img src="img/logo.png" alt="牛顿信息安全攻防展示系统-展示端" /></div> <br><br><br>
<div class="box">
<p>注销成功！可以<a href="admin.php">重新登录</a>！</p>  
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
?>