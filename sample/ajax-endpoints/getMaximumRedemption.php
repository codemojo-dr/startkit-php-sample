<?php

require_once '../index.php';

$transactionValue = (float) $_GET['transaction'];
$platform = $_GET['platform'];

$balance = $loyaltyService->maximumRedemption(getUserID(), $transactionValue, $platform);

response(array("code"=> 200, "balance" => $balance));