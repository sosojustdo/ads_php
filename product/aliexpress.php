<?php
	
	require_once("../util.php");
        require_once("../gi.php");
        require_once("../PinYin.php");
        require_once("./mysql.php");

        $referer = $_SERVER["HTTP_REFERER"];
        $agent = $_SERVER["HTTP_USER_AGENT"];
        $uri = $_SERVER["REQUEST_URI"];
        $request_params = $_SERVER["QUERY_STRING"];
        
        $url = $_REQUEST["url"];
        $other_url = "";
        $p1 = stripos($url, "http://");
        $p2 = stripos($url, "https://");
        if((isset($p1) && $p1 !== false) || (isset($p2) && $p2 !== false)){
           $other_url = $url;
        }else{
           $other_url = "http://".$url;
        }

        
        $ip = getIp();
	$country = getCountry($ip);
        
        error_log(date("[Y-m-d H:i:s]")." -IP:".$ip." -Country:".$country."\n"."-Referer:".$referer."\n"."-Agent:".$agent."\n"."-Uri:".$uri."\n"."-Request_params:".$request_params."\n"."-Url:".$url."\n", 3, "./error_log");

        try{
           $pinyin = new PinYin();
           $log = new RequestLog($ip, $pinyin->encode($country, "all"), $referer, $agent, basename(__FILE__,".php"), $request_params);
           record_request_log($log);
        }catch(Exception $e){
           error_log(date("[Y-m-d H:i:s]")."MYSQL_RECORD_LOG_ERROR:".$e->getMessage(), 3, "./mysql_error_log");
        }

        $isGiIp= isGiIp($ip);
        if((isset($isGiIp) && $isGiIp!== false)){
           header("Location:".Ali_LandingPage);
        }   

	$target_country_array = array("印度"=>"http://click.union.ucweb.com/index.php?service=RedirectService&pub=luli@joemediabuys2s&offer_id=aliexpress.iosgp",
"波兰"=>"http://click.union.ucweb.com/index.php?service=RedirectService&pub=luli@joemediabuys2s&offer_id=aliexpress.iosgp",
"土耳其"=>"http://click.union.ucweb.com/index.php?service=RedirectService&pub=luli@joemediabuys2s&offer_id=aliexpress.iosgp");
	
	
	if(array_key_exists($country, $target_country_array)){
              $target_url = $target_country_array[$country];
	      header("Location:".$target_url);
	}else{
	      header("Location:".$other_url);
	}

?>