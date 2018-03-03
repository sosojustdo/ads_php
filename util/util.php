<?php
	
        define("LandingPage","https://play.google.com/store/apps/details?id=com.contextlogic.wish");
        define("Ali_LandingPage","https://www.aliexpress.com/maintain.html");
        define("Nflshirt_LandingPage","http://www.nflshop.com");

        define("db","my_adwords_160_153_16_24");
        define("db_host","160.153.16.24");
        define("db_username","daipeng1");
        define("db_password","daipeng?456");


	//获取请求地址
	function getIP()
	{
	    static $realip;
	    if (isset($_SERVER)){
	        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
	            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
	            $realip = $_SERVER["HTTP_CLIENT_IP"];
	        } else {
	            $realip = $_SERVER["REMOTE_ADDR"];
	        }
	    } else {
	        if (getenv("HTTP_X_FORWARDED_FOR")){
	            $realip = getenv("HTTP_X_FORWARDED_FOR");
	        } else if (getenv("HTTP_CLIENT_IP")) {
	            $realip = getenv("HTTP_CLIENT_IP");
	        } else {
	            $realip = getenv("REMOTE_ADDR");
	        }
	    }
	    return $realip;
	}
	
	#更加请求ip地址获取城市
	function getCountry($ip){
	        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip=".$ip;
		$result=json_decode(file_get_contents($url));
		return $result->country; 
	}

?>