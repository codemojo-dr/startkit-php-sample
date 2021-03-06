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
use CodeMojo\Client\Services\DataSyncService;
use CodeMojo\Client\Services\GamificationService;
use CodeMojo\Client\Services\LoyaltyService;
use CodeMojo\Client\Services\ReferralService;
use CodeMojo\Client\Services\RewardsService;
use CodeMojo\Client\Services\WalletService;

require_once __DIR__ . '/../config/codemojo.php';
require_once 'helper.php';

// Codemojo autoloader
require_once __DIR__ . '/../../sdk/src/autoload.php';

/*
 * Initialize the core services
 */
$authenticationService = new AuthenticationService(CLIENT_ID, CLIENT_SECRET, Endpoints::ENV_PRODUCTION, function($type, $error){
   // Log the error / Show the the appropriate error messages for DEBUG purposes
    echo("Error: " . $type . ": " . $error);
});

$loyaltyService = new LoyaltyService($authenticationService);

$walletService = new WalletService($authenticationService);

$referralService = new ReferralService($authenticationService);

$dataSync = new DataSyncService($authenticationService);

$gamificationService = new GamificationService($authenticationService);

$rewardsService = new RewardsService($authenticationService, "a673fca0-91f9-11e6-a2dd-1b943448738e");






