<?php
require_once __DIR__ . '/vendor/autoload.php';  
use Xdag\Client;  
$client = new Client('127.0.0.1', '7677');
$account = $client->account();
echo '<pre>';
print_r($account);
exit;