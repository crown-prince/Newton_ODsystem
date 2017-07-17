# Newton_ODsystem

功能概述：攻击端一键完成攻击演示，展示端通过更直接的方式展现黑客攻击威胁，可自主增加相应漏洞

### 1.牛顿应用场景：

- 企业安全部门成员向企业内其他部门成员、领导，展示黑客攻击的威胁，演示漏洞的危害，更好的促进企业安全发展
- 信息安全专业人员，向非相关专业小伙伴展示漏洞的危害，进行信息安全知识科普

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
           *  邀请码生成系统（通过邀请码，连接众多独立展示系统与唯一的攻击端系统） <br> 
           *  各自独立的存在漏洞的展示端页面  <br>
<br>
攻击端：集成式一键模拟黑客攻击 <br>
           * sql注入演示 <br>
           * 存储型XSS演示<br>
           * 环境配置（实现一个攻击端，可以为多个展示端的独立系统，进行展示）<br>
           * 自定义功能（可自主增加新的漏洞演示环境于系统中）<br>

![](https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/OD%E8%BF%9E%E6%8E%A5.PNG)         


### 4.牛顿的安装与配置：
**展示端**： <br>
为便于叙述，以下假定展示端IP地址为192.168.183.131, 数据库初始用户名、密码为root <br>
1.将【展示端文件夹】下全部文件复制到php环境根目录中 <br>
2.在数据库中创建test和adminpanel两个数据库，并分别导入test.sql（建立漏洞环境）、adminpanel.sql（生成攻击端与展示端邀请码），之后删除两个数据文件 <br>
3.在Adminpanel/conn.php文件中配置数据库信息，在afnalnfawnaj/conn.php文件中配置数据库信息 （样例如下）<br> 
           <?php
                //数据库链接文件
                @session_start();
                $host='localhost';//数据库服务器
                $user='root';//数据库用户名
                $password='root';//数据库密码
                $database='adminpanel';//数据库名
                $conn=@mysql_connect($host,$user,$password) or die('数据库连接失败！');
                @mysql_select_db($database) or die('没有找到数据库！');
                mysql_query("set names 'utf-8'");
          ?>           
4.进入http://192.168.183.131/adminpanel/admin.php 管理系统，生成邀请码 <br>
初始用户为admin admin登陆码123456 <br>
以后可以在管理系统中修改用户信息、多次生成邀请码 <br>
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E7%94%9F%E6%88%90%E9%82%80%E8%AF%B7%E7%A0%81.PNG)

5.点击生成邀请码，将在展示端网站目录下生成独立的一套漏洞展示文件 <br>
假设当前邀请码为xa4yma2DI08gr5ldfK8fhLlAfLe4NI <br>
展示端配置完成 <br>

**攻击端**： <br>
为便于叙述，以下假定展示端IP地址为192.168.0.103 <br>
1.将【攻击端文件夹】下全部文件复制到php环境根目录中 <br>
2.点击Start、点选环境配置，输入展示端域名/IP地址，以及展示端生成的邀请码之一 <br>
![](
https://github.com/crown-prince/Newton_ODsystem/blob/master/MD_pic/%E6%94%BB%E5%87%BB%E7%AB%AF%E8%BF%9E%E6%8E%A5.PNG)
3.出现配置成功字样，则以成功使攻击端、展示端建立了连接，可以开始相关演示了<br>




