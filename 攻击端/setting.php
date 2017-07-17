 <!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>牛顿信息安全攻防展示系统-攻击端</title>
	<script type="text/javascript" charset="UTF-8" src="js/prefixfree.min.js"></script>
<style type="text/css">
body {
   background: url(css/background.jpg);
   }
.content {
    width:600px;
    height:350px;
    margin:50px auto 10px auto;
}
.login-form {
    width:400px;
    height:110px;
    margin:0px auto 0;
    padding-top:1px;
    position:relative;
    background-image:-*-linear-gradient(top,rgb(255,255,255),rgb(242,242,242));
    box-shadow:0 3px 3px rgba(21,62,78,0.8);
}

.login-form div {
    width:20px;
    height:20px;
    margin:20px auto;
    position:relative;
    line-height:28px;
    border:none;
}
.login-form .user-icon, 
.login-form .yaoqingma-icon {
    display:inline-block;
    font-family: 'loginform-icon';
    font-size:15px;
    text-align:center;
    line-height:28px;
    color:rgb(153,153,153);
    position:absolute;
    left:1px;
    top:1px;
    background-color:rgb(255,255,255);
    border:none;
    border-right:1px solid rgb(229,229,232);
    width:30px;
    height:28px;
    transition: all 300ms linear;
}
.login-form .host input, .login-form .yaoqingma input {
    height:100%;
    width:calc(100% - 40px);
    padding-left:40px;
    border-radius:2px;
    border:1px solid;
    border-color:rgb(229,229,232) rgb(220,220,221) rgb(213,213,213) rgb(220,220,221);
    display:block;
    transition: all 300ms linear;
}

.login-form .icon:before, .login-form .icon:after {
    content:"";
    position:absolute;
    top:10px;
    left:30px;
    width:0;
    height:0;
    border:4px solid transparent;
    border-left-color:rgb(255,255,255);
}
.login-form .icon:before {
    top:9px;
    border:5px solid transparent;
    border-left-color:rgb(229,229,232);
}
.login-form .host input:focus, .login-form .yaoqingma input:focus {
    border-color:rgb(69,153,228);
    box-shadow:0 0 2px 1px rgb(200,223,244);
}
.login-form .host input:focus + span, .login-form .yaoqingma input:focus + span {
    background:-*-linear-gradient(top,rgb(255,255,255),rgb(245,245,245));
    color:rgb(51,51,51);
}
.login-form .host input:focus + span:after, .login-form .yaoqingma input:focus + span:after {
    border-left-color:rgb(250,250,250);
}

.login-form .account-control label {
    margin-left:24px;
    font-size:12px;
    font-family: Arial, Helvetica, sans-serif;
    cursor:pointer;
}
.login-form button[type="submit"] {
    color:#fff;
    font-weight:bold;
    float:right;
    width:68px;
    height:30px;
    position:relative;
    background:-*-linear-gradient(top,rgb(74,162,241),rgb(52,119,182)) 1px 0 no-repeat,
               -*-linear-gradient(top,rgb(52,118,181),rgb(36,90,141)) left top no-repeat;
    background-size:66px 28px,68px 29px;
    border:none;
    border-top:1px solid rgb(52,118,181);
    border-radius:2px;
    box-shadow:inset 0 1px 0 rgb(86,174,251);
    text-shadow:0 1px 1px rgb(51,113,173);
    transition: all 200ms linear;
}
.login-form button[type="submit"]:hover {
    text-shadow:0 0 2px rgb(255,255,255);
    box-shadow:inset 0 1px 0 rgb(86,174,251),0 0 10px 3px rgba(74,162,241,0.5);
}
.login-form button[type="submit"]:active {
    background:-*-linear-gradient(top,rgb(52,119,182),rgb(74,162,241)) 1px 0 no-repeat,
               -*-linear-gradient(top,rgb(52,118,181),rgb(36,90,141)) left top no-repeat;
}

.login-form .account-control input {
    width:0px;
    height:0px;
}
.login-form label.check {
    position:absolute;
    left:0;
    top:50%;
    margin:-8px 0;
    display:inline-block;
    width:16px;
    height:16px;
    line-height: 16px;
    text-align:center;
    border-radius:2px;
    background:-*-linear-gradient(top,rgb(255,255,255),rgb(246,246,246)) 1px 1px no-repeat,
               -*-linear-gradient(top,rgb(227,227,230),rgb(165,165,165)) left top no-repeat;
    background-size:14px 14px,16px 16px;
}
.login-form .account-control input:checked + label.check:before {
    content:attr(data-on);
    font-family:loginform-icon;
}
@font-face {
  font-family: 'loginform-icon';
  src: url("font/loginform-icon.eot");
  src: url("font/loginform-icon.eot?#iefix") format('embedded-opentype'),
       url("font/loginform-icon.woff") format('woff'),
       url("font/loginform-icon.ttf") format('truetype'),
       url("font/loginform-icon.svg#loginform-icon") format('svg');
  font-weight: normal;
  font-style: normal;
}
</style>
</head>
<body>

	   <div class="content">
           <form class="login-form">
               <h1><p><center>配置完成</center></p></h1>
           </form>
		   <?php  
			$host = $_POST['host'];   //制造SQL注入条件
			$yaoqingma = $_POST['yaoqingma'];  //制造SQL注入条件
			$fp1 = fopen("js/paths.js", "w+");
			$First = "var host = '"."$host"."';";
			$Last = "var yaoqingma = '"."$yaoqingma"."';";
            $code = $First.$Last;
			fwrite($fp1, $code, strlen($code));
			$fp2 = fopen("store.php", "w+");
			$First = "<?php ".'$host = '."'"."$host"."';";
			$Last = '$yaoqingma = '."'"."$yaoqingma"."';"." ?>";
            $code = $First.$Last;
			fwrite($fp2, $code, strlen($code));
			?>  	  
		</div>

</body>
</html>
 
 
