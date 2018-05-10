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
		<form action="liuyan.php" method="post">  
				<h3>留言内容:</h3>
				<textarea id='uid' name="desc" rows="15" cols="80"></textarea>  
				<br>  
				<br>  
				您的名字:<br>
				<input type="text" name="user"/> &nbsp;&nbsp;&nbsp;
				<input type="submit" value="提交" style="width:100px" onclick='loction="liuyan.php"'/>  
		</form>
		
		<?php  
				#header("Content-type: text/html; charset=utf-8");
				if(isset($_POST['user'])&&isset($_POST['desc']))
				{  
					$log=fopen("words.txt","a");  
					fwrite($log,$_POST['user']."\r\n");  
					fwrite($log,$_POST['desc']."\r\n");  
					fclose($log);  
				}  
				if(file_exists("words.txt"))  
				{  
					$read= fopen("words.txt",'r');  
					while(!feof($read))  
					{  
						echo fgets($read)."</br>";  
					}  
					fclose($read);  
				}  
		?>  		

	<div id="footer">
	<p>　　</p>
	</div>

	</div>
</body>
</html>