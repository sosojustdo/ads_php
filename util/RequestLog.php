<?php

class RequestLog{
       var $ip_address;
       var $country;
       var $referer;
       var $agent;
       var $request_params;
       var $product;

       function __construct($ip_address, $country, $referer, $agent, $product, $request_params){
       		$this->ip_address = $ip_address;
       		$this->country = $country;
       		$this->referer = $referer;
       		$this->agent = $agent;
                $this->product= $product;
       		$this->request_params = $request_params;
       }
}

?>