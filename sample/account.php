<?php

require_once 'includes/login-check.php';
require_once 'includes/codemojo.php';

/*
 * Get a brief snapshot about the user's loyalty status
 */
$loyalty_details = $loyaltyService->getUserBrief(getUserID());

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
            <p>Your Tier: <?php echo $loyalty_details['tier'] ?></p>
            <p>Cashback received so far: $<?php echo $loyalty_details['accumulated'] ?></p>
            <p>Your Wallet Balance is $<?php echo round($loyalty_details['balance']); ?></p>
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

