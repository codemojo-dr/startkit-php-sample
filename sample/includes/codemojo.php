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
use CodeMojo\Client\Services\LoyaltyService;
use CodeMojo\Client\Services\ReferralService;
use CodeMojo\Client\Services\WalletService;

require_once __DIR__ . '/../config/codemojo.php';
require_once 'helper.php';

// Codemojo autoloader
require_once __DIR__ . '/../../sdk/src/autoload.php';

/*
 * Initialize the core services
 */
$authenticationService = new AuthenticationService(CLIENT_ID, CLIENT_SECRET, Endpoints::ENV_SANDBOX, function($type, $error){
   // Log the error / Show the the appropriate error messages for DEBUG purposes
    die("Error: " . $type . ": " . $error);
});

$loyaltyService = new LoyaltyService($authenticationService);

$walletService = new WalletService($authenticationService);

$referralService = new ReferralService($authenticationService);







