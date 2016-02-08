<?php

session_start();

require_once '../includes/helper.php';

response(array('code'=>200,'items' => count($_SESSION['cart'])));