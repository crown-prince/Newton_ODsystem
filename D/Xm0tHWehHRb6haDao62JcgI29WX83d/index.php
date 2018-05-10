
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
	    <!--服务器相关参数-->
		<table width="100%" cellpadding="5" cellspacing="5">
		<br><br>
		  <tr><th colspan="4">服务器参数</th></tr>
		  <tr>
			<td>服务器域名/IP地址</td>
			<td colspan="3"><?php echo $_SERVER['SERVER_NAME'];?>(<?php if('/'==DIRECTORY_SEPARATOR){echo $_SERVER['SERVER_ADDR'];}else{echo @gethostbyname($_SERVER['SERVER_NAME']);} ?>)</td>
		  </tr>
		  <tr>
			<td width="13%">服务器操作系统</td>
			<td width="37%"><?php $os = explode(" ", php_uname()); echo $os[0];?> &nbsp;内核版本：<?php if('/'==DIRECTORY_SEPARATOR){echo $os[2];}else{echo $os[1];} ?></td>
			<td width="13%">服务器解译引擎</td>
			<td width="37%"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
		  </tr>
		  <tr>
			<td>服务器语言</td>
			<td><?php echo getenv("HTTP_ACCEPT_LANGUAGE");?></td>
			<td>服务器端口</td>
			<td><?php echo $_SERVER['SERVER_PORT'];?></td>
		  </tr>
		  <tr>
			  <td>服务器主机名</td>
			  <td><?php if('/'==DIRECTORY_SEPARATOR ){echo $os[1];}else{echo $os[2];} ?></td>
			  <td>绝对路径</td>
			  <td><?php echo $_SERVER['DOCUMENT_ROOT']?str_replace('\\','/',$_SERVER['DOCUMENT_ROOT']):str_replace('\\','/',dirname(__FILE__));?></td>
			</tr>
		 
		</table>



	<table width="100%" cellpadding="0" cellspacing="0" align="left">
	  <tr>
		<th colspan="10">数据库存储的客户信息</th>
	  </tr>
	  <tr>
		<table width="100%" style="text-align:left" border='2'>
			 <tr><th>id</th><th>Name</th><th>Age</th><th>Sex</th><th>password</th><th>phone</th><th>money</th></tr>
		<?php
		//引用conn.php文件
			require_once ("conn.php");
			//查询数据表中的数据
			 $sql = mysqli_query($conn, "select * from sqltest");
			 $datarow = mysqli_num_rows($sql); //长度
				//循环遍历出数据表中的数据
				for($i=0;$i<$datarow;$i++){
					$sql_arr = mysqli_fetch_assoc($sql);
					$id = $sql_arr['id'];
					$name = $sql_arr['name'];
					$age = $sql_arr['age'];
					$sex = $sql_arr['sex'];
					$password = $sql_arr['password'];
					$phone = $sql_arr['phone'];
					$money = $sql_arr['money'];
					echo "<tr><td>$id</td><td>$name</td><td>$age</td><td>$sex</td><td>$password</td><td>$phone</td><td>$money</td></tr>";
				}
		?>
		</table>
	  </tr>
	  
	</table>

	<div id="footer">
	<p>　　</p>
	</div>

	</div>
</body>
</html>