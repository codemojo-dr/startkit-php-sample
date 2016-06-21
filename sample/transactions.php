<?php

require_once 'includes/login-check.php';
require_once 'includes/helper.php';
require_once 'includes/codemojo.php';

/*
 * Get the transaction history
 */
$history = $loyaltyService->getWalletService()->getTransactionDetailsForUser(getUserID(),10, null, (int) @$_GET['page']);

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<?php require_once 'includes/header.php'; ?>

<div class="container">

    <div class="starter-template">

        <h3>Transaction history for <?php echo getUserID()?></h3>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Time</th>
                    <th>Expires in</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($history->results() as $item): ?>
                    <tr>
                        <td></td>
                        <td><?php echo $item['meta'] ?></td>
                        <td><?php echo $item['value'] > 0 ? ($item['transaction_type'] == 3 ? "Engagement points": "Cashback added") : "Redeemed" ?></td>
                        <td><?php echo abs($item['value']) . ($item['transaction_type'] == 2 || $item['transaction_type'] == -2 ? ' Gold points': ' Blue points' )?> </td>
                        <td><?php echo date("d-M-Y g:i a",strtotime($item['timestamp'])) ?></td>
                        <td><?php echo isset($item['expiry'])?date("d-M-Y g:i a",strtotime($item['expiry'])):'' ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="6">
                    <?php for($i = 1; $i <= $history->totalPages(); $i++): ?>
                        <a href="?page=<?php echo $i ?>"><?php echo $i ?></a> &nbsp;| &nbsp;
                    <?php endfor; ?>
                    </td>
                </tr>
                </tbody>
            </table>
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
<script>
    getCheckoutItems()
</script>
</body>
</html>

