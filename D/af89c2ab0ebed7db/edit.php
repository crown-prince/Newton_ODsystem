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
	    <form action = "makepage.php" method="post">
           <h3>新建页面:</h3>
		   <textarea type = "text" name = "code" rows="15" cols="100"> </textarea>
		   <br><br>
		   <input type="text" name="user" size="30" placeholder="帐号"/>
		   <input type="password" name="password" size="30" placeholder="密码" />
		   <input type="submit" name="submit" value="提交" style="width:100px" />
          </form>		   
	</div>

	<div id="footer">
	<p>　　</p>
	</div>

	</div>
</body>
</html>