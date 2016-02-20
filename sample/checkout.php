<?php

require_once 'includes/login-check.php';
require_once 'includes/helper.php';
require_once 'includes/codemojo.php';

$cartItems = getCart();

/*
 * ===================================================================================
 *                  CodeMojo Integration
 * ===================================================================================
 */


/*
 * Getting the maximum value that can be redeemed for this transaction
 */
$maximumRedemption = $loyaltyService->maximumRedemption(getUserID(), calculateCartPrice());

/*
 * Get the Balance in the users wallet
 */
$balance = $loyaltyService->getBalance(getUserID());

/*
 * Calculate how much points will the user be getting for this transaction
 */
$reward_points = $loyaltyService->calculateLoyaltyPoints(getUserID(), calculateCartPrice());

/*
 * Handling the checkout
 * In actual case you will be doing this in an Controller
 */
if(count($_POST) > 0){
    $redeem = (int) $_POST['redeem'];
    $checkout_price = calculateCartPrice();

    /*
     * In this specific scenario, we will allow the user to either get cashback or redeem; But not both
     */
    if($redeem > 0) {
        if ($redeem > $maximumRedemption) {
            die('You cannot redeem more than ' . $maximumRedemption);
        }

        /*
         * Redemption
         */

        // You can associate a actual Transaction ID. We are using a random one here
        $transaction_id = time();

        try {
            $loyaltyService->redeem(getUserID(), $redeem, calculateCartPrice(), null, "Redeemed for Order ID #" . $transaction_id);
        } catch (\CodeMojo\Client\Exceptions\BalanceExhaustedException $e) {
            die('Not enough balance! Balance has been exhausted');
        }

        /*
         * Discounted price
         */
        $discounted_price = $checkout_price - $redeem;

        unset($_SESSION['cart']);

        die("Success! Redeemed $ {$redeem} from wallet. You will be doing the payment stuffs here for $ {$discounted_price} instead of $" . $checkout_price . " ...");
    }else{
        /*
         * User has choosen not to redeem, so lets add cashback
         */

        // You can associate a actual Transaction ID. We are using a random one here
        $transaction_id = time();

        $loyaltyService->addLoyaltyPoints(getUserID(), $checkout_price, null, 30, $transaction_id, "Cashback for Order ID #" . $transaction_id);

        unset($_SESSION['cart']);

        die("Success! Added cashback to wallet. You will be doing the payment stuffs here for $ {$checkout_price}");
    }

/*
 * ===================================================================================
 *                 End of CodeMojo Integration
 * ===================================================================================
 */


}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Codemojo | Sample project</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/starter-template.css" rel="stylesheet">
</head>

<body>

<?php require_once 'includes/header.php'; ?>

<div class="container">

    <div class="starter-template">

        <h1>Checkout</h1>

        <?php if(!empty($cartItems)): ?>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td></td>
                            <td><?php echo $item['title'] ?></td>
                            <td>x1</td>
                            <td><?php echo $item['price'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td></td>
                        <td><h4 class="text-primary">Grand total</h4></td>
                        <td>Total Items: <?php echo count($cartItems) ?></td>
                        <td><?php echo calculateCartPrice() ?> $</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-8 text-right pull-right">
                <form method="post">
                    <input name="redeem" type="text" class="form-control" max="<?php echo $maximumRedemption ?>" placeholder="Redeem from wallet" />
                    <p class="alert alert-success alert-dismissable col-md-6">You will get a cashback of <?php echo $reward_points['award'] ?> $</p>
                    <?php if($balance > 0): ?>
                        <p class="alert alert-danger alert-dismissable col-md-6">You can redeem maximum of <?php echo $balance > $maximumRedemption ? $maximumRedemption : $balance ?> $</p>
                    <?php else: ?>
                        <p>You do not have any balance in your wallet yet!</p>
                    <?php endif; ?>
                    <input type="submit" class="btn btn-success" value="Checkout" />
                </form>
            </div>
        <?php else: ?>
            <p>No items in cart!</p>
        <?php endif; ?>

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

