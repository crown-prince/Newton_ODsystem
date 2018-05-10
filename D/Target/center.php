<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<title>牛顿D端</title>
<meta name="keywords" content="牛顿攻防展示系统：D端" />
<meta name="description" content="牛顿攻防展示系统：D端" />
</head>
<script type="text/javascript">
function SetWinHeight(obj){ 
	var win=obj; 
	if (document.getElementById){ 
		if (win && !window.opera){ 
			if (win.contentDocument && win.contentDocument.body.offsetHeight) 
			win.height = win.contentDocument.body.offsetHeight+40; 
			else if(win.Document && win.Document.body.scrollHeight) 
			win.height = win.Document.body.scrollHeight+40; 
		} 
	} 
}
</script>
<frameset rows="100,*" cols="*" scrolling="No" framespacing="0" frameborder="no" border="0">
	<frame src="inc/head.html" name="headmenu" id="mainFrame" title="mainFrame"><!-- 引用头部 -->
	<!-- 引用左边和主体部分 --> 
	<frameset rows="100*" cols="220,*" scrolling="No" framespacing="0" frameborder="no" border="0">
		<frame src="inc/left.html" name="leftmenu" id="mainFrame" title="mainFrame">
		<frame src="main.html" name="main" scrolling="yes" noresize="noresize" id="rightFrame" title="rightFrame">	
	</frameset>
</frameset>
</html>
