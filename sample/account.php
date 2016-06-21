<?php

require_once 'includes/login-check.php';
require_once 'includes/codemojo.php';

/*
 * Validate referral
 */

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $code = $_POST['referral'];
    if($referralService->useReferralCode(getUserID(), $code)){
        header("Location: transactions.php");
        exit;
    } else {
        // Invalid
    }
}
/*
 * Get a brief snapshot about the user's loyalty status
 */
$loyalty_details = $loyaltyService->getUserBrief(getUserID());

$walletBalance = $walletService->getBalance(getUserID());
/*
 * Get the referral code of the user
 */
$referralCode = strtoupper($referralService->getReferralCode(getUserID()));
$gamificationService->captureAction(getUserID(), 'viewed-account-page');

$gamerStatus = $gamificationService->getUserStatus(getUserID());

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Codemojo | Sample project</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">

</head>

<body>

<?php require_once 'includes/header.php'; ?>

<div class="container">

    <div class="starter-template">

        <h1>My Account</h1>

        <div class="row container">
            <h3>Hello <?php echo getUserID() ?>, </h3>
            <p>First name: Name</p>
            <p>Phone: +91 999 999 99</p>
            <p>Your Tier: <?php echo @$loyalty_details['tier'] ?></p>
            <p>Points/CB received so far: <?php echo @$loyalty_details['accumulated'] ?> pts</p>
            <p>Your Wallet Balance is $<?php echo round(@$walletBalance['total']); ?></p>
            <p>Your Badge is : <?php echo @$gamerStatus['badge'] ?></p>
            <p><img width="28" src="/images/gold.png"> <?php echo round(@$walletBalance['slot2']['raw']); ?> pts <img src="/images/blue.png"> <?php echo round(@$walletBalance['slot3']['raw']); ?> pts</p>
            <br/>
            <iframe style="width: 500px; height: 200px;" src="includes/embed.php?id=<?php echo getUserID() ?>" frameborder="0"></iframe>
            <br/>
            <form method="post">
                <p>Have a referral code? Enter here</p>
                <input type="text" placeholder="Referral code" name="referral" />
                <input type="submit" value="Go" />
            </form><br/>

        </div>

    </div>

</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>
<script src="js/libs/micro-templating.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
<script>updateCartData()</script>
</body>
</html>

