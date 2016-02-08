<?php


/*
 * Start the session
 */
session_start();

require_once 'helper.php';

if(!isset($_SESSION['email'])){
    ob_start();
    header("Location: login.php");
    exit;
}