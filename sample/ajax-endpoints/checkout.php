<?php

require_once '../index.php';

$transactionValue = (float) $_GET['checkout_value'];
$platform = $_GET['platform'];

$expires_in_days = 30;

/*
 * Regular process of checkout
 */
$transaction_id = time();


if($loyaltyService->addLoyaltyPoints(getUserID(), $transactionValue,
    $platform, $expires_in_days, $transaction_id, "Credited for " .$transactionValue)){
    response(array("code"=> 200, "balance" => $balance));
} else {
    response(array("code" => -100));
}