<?php

session_start();

require_once '../includes/helper.php';

addToCart($_POST['title'], $_POST['price']);

response(array("code"=>200));