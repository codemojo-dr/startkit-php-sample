<?php

require_once '../includes/codemojo.php';

$balance = (int) $_POST['balance'];

if($loyaltyService->getWalletService()->addBalance(getUserID(), $balance)){
    response(array("code"=> 200, "balance" => $balance));
} else{
    response(array("code" => -100));
}

