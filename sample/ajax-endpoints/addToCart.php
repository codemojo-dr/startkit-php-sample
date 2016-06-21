<?php

session_start();

require_once '../includes/helper.php';
require_once '../includes/codemojo.php';

$gamificationService->addAchievements(getUserID(), 'reader');
addToCart($_POST['title'], $_POST['price']);

response(array("code"=>200));