var buttons = document.querySelectorAll(".radmenu a");

var t = Math.random();  

function loadJS(script){  
    var src = script +'?r='+t ;  
    var script_dom = document.createElement('script');  
    script_dom.src = src;  
    script_dom.language = 'javascript';  
    script_dom.type = 'text/javascript';  
    var head = document.getElementsByTagName('head').item(0);  
    head.appendChild(script_dom);  
} 

buttons[0].onclick = setSelected_Start; //启动圈
buttons[1].onclick = setSelected1;
buttons[2].onclick = setSelected2;
buttons[3].onclick = setSelected3;
buttons[4].onclick = setSelected4;
buttons[5].onclick = setSelected5;

function setSelected1(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
      
	  window.open("put.php");
    }
    return false;
}

function setSelected2(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
	  loadJS("paths.js");
	  url = "http://";
	  url += host;
	  url += "/";
	  url += yaoqingma;
	  url += "/hack.php";
      window.open(url);
    }
    return false;
}

function setSelected3(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
      
	  window.open("put_liuyan.php");
    }
    return false;
}

function setSelected4(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
      
	  window.open("set.php");
    }
    return false;
}

function setSelected5(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
      
	  window.open("");
    }
    return false;
}

function setSelected_Start(e) {
    if(this.classList.contains("selected")) 
	{
      this.classList.remove("selected");
    } 
	else
	{
      this.classList.add("selected");
    }
    return false;
}