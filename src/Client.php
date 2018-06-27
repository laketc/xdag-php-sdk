<?php

namespace Xdag;

use Xdag\Rpc;

class Client extends Rpc
{
	public function __construct ($ip = "127.0.0.1", $port = "7677")
	{
		parent::__construct($ip, $port);
	}

	public function version()
	{
		$args = [
						'method' => 'xdag_version',
						'params' =>[],
						'id' => 1
					];
		return self::post($args);
	}

	public function account($num = 20)
	{
		$args = [
						'method' => 'xdag_get_account',
						'params' =>[$num],
						'id' => 1
					];
		return self::post($args);
	}

	public function balance($address)
	{
		$args = [
						'method' => 'xdag_get_balance',
						'params' =>[$address],
						'id' => 1
					];
		return self::post($args);
	}

	public function state()
	{
		$args = [
						'method' => 'xdag_state',
						'params' =>[],
						'id' => 1
					];
		return self::post($args);
	}

	public function stats()
	{
		$args = [
						'method' => 'xdag_stats',
						'params' =>[],
						'id' => 1
					];
		return self::post($args);
	}

	public function transactions($address, $page = 0, $pagesize = 50)
	{
		$args = [
						'method' => 'xdag_get_transactions',
						'params' =>[
												'address' => $address,
												'page' => $page,
												'pagesize' => $pagesize,
											],
						'id' => 1
					];
		return $this->curl($args);
	}
}
