<?php

session_start();

require_once '../includes/helper.php';
require_once '../includes/codemojo.php';

$gamificationService->captureAction(getUserID(), 'product-added-to-cart');
addToCart($_POST['title'], $_POST['price']);

response(array("code"=>200));