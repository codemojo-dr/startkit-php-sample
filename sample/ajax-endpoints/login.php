<?php

/*
 * You would have your typical login process.
 * For now we are going to accept any incoming email as valid login
 */
session_start();

require_once '../includes/helper.php';

$_SESSION['email'] = $_POST['email'];

response(array("code"=>200));
