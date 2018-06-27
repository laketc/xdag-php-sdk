<?php

namespace Xdag;

class Rpc {
	private $gatewayIP;
	private $gatewayPort;

	public function __construct ($ip, $port)
	{
		$this->gatewayIP      = $ip;
		$this->gatewayPort = $port;
	}

	public function post($args)
	{
		$response = $this->curl("http://$this->gatewayIP:$this->gatewayPort", $args);
		return json_decode($response, TRUE);
	}

	private function curl ($url, $args) 
	{
		$data = json_encode($args);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
		 
		if ($data != "") {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			    'Content-Type: application/json',
			    'Content-Length: ' . strlen($data)
			));
		}
		$output = curl_exec($ch);
		if ($output == FALSE) {
			//todo: when xdag doesn't answer
		}		 
		curl_close($ch);
 
		return '{'.$output;
	}
}
