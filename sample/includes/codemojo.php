<?php

/*
 * SAMPLE PROJECT
 * This is sample project & intended & not to be used as-is for production purposes.
 * Security checks are not enforced & corners have been cut for the sake of simplicity :)
 */



/*
 * Include the required files
 */
use CodeMojo\Client\Endpoints;
use CodeMojo\Client\Services\AuthenticationService;

require_once __DIR__ . '/../../sdk/autoload.php';
require_once 'helper.php';
require_once __DIR__ . '/../config/codemojo.php';

/*
 * Initialize the core services
 */
$authenticationService = new AuthenticationService(CLIENT_ID, CLIENT_SECRET, Endpoints::LOCAL, function($type, $error){
   // Log the error / Show the the appropriate error messages for DEBUG purposes
    die("Error: " . $type . ": " . $error);
});

$loyaltyService = new \CodeMojo\Client\Services\LoyaltyService($authenticationService);







