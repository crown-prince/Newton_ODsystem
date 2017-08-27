# Newton_ODsystem
牛顿信息安全攻防展示系统：Newton Offensive and defensive system <br>
功能概述：攻击端一键完成攻击演示，展示端通过更直接的方式展现黑客攻击威胁，可自主增加相应漏洞 <br>
>关于牛顿，我想说的一些话（非干货，可略过）：在长亭陈宇森大牛的一篇见闻分享里，我记下了这样的一句话：未来的安全发展，要让不懂安全的人，快速搞清楚负责安全的人做了什么。由此，牛顿项目诞生了，定名为牛顿，是因为众所周知，牛顿是近代物理学的奠基人，因为他对万有引力和三大运动定律的描述，物理学走向了普及，世界加快了发展。希望牛顿项目，也能够继承这份责任，但牛顿项目只是一个小小的凸起点，期待和更多同志们，一起努力，安全任重道远，白帽子的名字，我们来定义。

<br>环境：php 7 + mysql + windows
<br>
### 1.牛顿应用场景：

- 企业安全部门成员向企业内其他部门成员、领导，展示黑客攻击的威胁，演示漏洞的危害，更好的促进企业安全发展
- 信息安全专业人员，向非相关专业小伙伴展示漏洞的危害，进行信息安全知识科普
- 安全产品销售人员更好的解读“安全”<br>

### 2.牛顿界面初览：

>攻击端（科技感风格）：
![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%89%9B%E9%A1%BF1.PNG)


>展示端提示页面
![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%89%9B%E9%A1%BF2.PNG)

>展示端（偏向企业官方风格）：
![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%89%9B%E9%A1%BF3.PNG)
![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%89%9B%E9%A1%BF4.PNG)

----   

### 3.牛顿的功能解析：

展示端：以合适的可视化效果，展现黑客攻击的后果 <br>
*  数据库存储信息、服务器信息统一展示在展示端首页，便于展示端了解相关信息 <br>
*  邀请码生成系统（通过邀请码，连接众多独立展示系统与唯一的攻击端系统） <br> 
*  各自独立的存在漏洞的展示端页面  <br>
<br>
攻击端：集成式一键模拟黑客攻击 <br>
*  sql注入演示 <br>
*  存储型XSS演示<br>
*  环境配置（实现一个攻击端可以为展示端的多个独立系统，进行展示）<br>
*  自定义功能（可自主增加新的漏洞演示环境于系统中）<br>
 
![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/OD%E8%BF%9E%E6%8E%A5.PNG)       <br><br>  


### 4.牛顿的安装与配置：
**展示端**： <br>
为便于叙述，以下假定展示端IP地址为192.168.183.131, 数据库初始用户名、密码为root <br>
1.将【展示端文件夹】下全部文件复制到php环境根目录中 <br>
2.在数据库中创建test和adminpanel两个数据库，并分别导入test.sql（建立漏洞环境）、adminpanel.sql（生成攻击端与展示端邀请码），之后删除两个数据文件 <br>
3.在Adminpanel/conn.php文件中配置数据库信息，在af89c2ab0ebed7db/conn.php文件中配置数据库信息 （样例如下）<br> 
       
       <<?php
       //数据库链接文件
              @session_start();
              $host = 'localhost';//数据库服务器
              $user = 'root';//数据库用户名
              $password = 'root';//数据库密码
              $database = 'adminpanel';//数据库名
              $conn = mysqli_connect($host, $user, $password, $database) or die('数据库连接失败！');
       ?>    
4.进入http://192.168.183.131/adminpanel/admin.php 管理系统，生成邀请码，初始用户为admin admin登陆码root <br>
以后可以在管理系统中修改用户信息、多次生成邀请码 <br>
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/管理系统.PNG)
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/邀请码.PNG)
<br>
5.点击生成邀请码，将在展示端网站目录下生成独立的一套漏洞展示文件，假设当前邀请码为xa4yma2DI08gr5ldfK8fhLlAfLe4NI，展示端配置完成 <br>

**攻击端**： <br>
为便于叙述，以下假定展示端IP地址为192.168.0.103 <br>
1.将【攻击端文件夹】下全部文件复制到php环境根目录中 <br>
2.点击Start、点选环境配置，输入展示端域名/IP地址，以及展示端生成的邀请码之一 <br>
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E6%94%BB%E5%87%BB%E7%AB%AF%E8%BF%9E%E6%8E%A5.PNG)
3.出现配置成功字样，则以成功使攻击端、展示端建立了连接，可以开始相关演示了<br>
<br>

### 5.牛顿的使用方式讲解：
以集成的SQL注入攻击为例：
展示端的(edit.php）编辑页面，需要登录才可以进编辑，但因为如下代码：

     <?php  
		//包含数据库连接文件  
		require_once('conn.php');
		if(!isset($_POST['submit'])){  
		    echo "<br><br><br><br><br><br>";
			exit('非法访问!');  
		} 
              $code = $_POST['code'];		
		$username = $_POST['user'];   //制造SQL注入条件
		$password = $_POST['password'];  //制造SQL注入条件
		
		//检测用户名及密码是否正确  
		$sql = "select * from sqltest where name ='$username' and password ='$password'"; //制造SQL注入条件
		$result = mysqli_query($conn, $sql);

导致了SQL注入漏洞的存在，攻击端通过(put.php)集成了完成注入、篡改网站页面的漏洞利用代码，通过点击攻击端【突破权限，修改页面】 <br>
按钮将直接完成攻击，通过点击【查看修改效果】按钮可以看到是否攻击成功，展示端（hack.php）页面可以看到已经留下了黑客攻击的信息 <br>

![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%82%B9%E9%80%89%E5%8A%A8%E6%80%81.gif)
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E5%B1%95%E7%A4%BA%E7%AB%AF%E5%B1%95%E7%A4%BA%E8%A2%AB%E9%BB%91%E6%95%88%E6%9E%9C.PNG) <br><br><br>
### License

The MIT License. <br><br>

Copyright (c) 2017 繁星科技_Wind Punish安全实验室<br>
