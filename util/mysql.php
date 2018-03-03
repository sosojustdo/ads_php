<?php

    require_once("../util.php");
    require_once("./RequestLog.php");
    
    function record_request_log($log){
       $con = mysqli_connect(db_host, db_username, db_password, db);
       if (!$con)
       {
          throw new Exception("Could not get mysql connection:".mysql_error());
       }else{
          /*
          $log = new RequestLog("192.168.0.1", "中国", "http://www.baidu.com", "123", "template", "request_params");
          
          echo $log->ip_address."</br>";
          echo $log->country."</br>";
          echo $log->referer."</br>";
          echo $log->agent."</br>";
          echo $log->request_params."</br>";
          echo $log->product."</br>";
    	  echo "connection mysql successed!";
          */
          
          $sql = "INSERT INTO request_log_record(ip_address, country, referer, agent, product, request_params) 
          VALUES ('$log->ip_address', '$log->country', '$log->referer', '$log->agent', '$log->product', '$log->request_params')";
          mysqli_query($con, $sql);
       }
       mysqli_close($con);
    }

?>