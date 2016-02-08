<?php

require_once 'includes/login-check.php';
require_once 'includes/samples-generator.php';

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

        <h1>Welcome to Amazing Shopping Store</h1>

        <div class="row" id="items">
            <?php foreach($samples as $sample): ?>
                <div class="col-md-3 product">
                    <img src="http://placehold.it/250x150">
                    <div class="text-left">
                        <h3 class=""><?php echo $sample['title'] ?> <span class="">$<?php echo $sample['price'] ?></span> </h3>
                        <p><?php echo $sample['description'] ?></p>
                    </div>
                    <button class="btn btn-primary addtocart" data-title="<?php echo $sample['title'] ?>" data-price="<?php echo $sample['price'] ?>">Add to cart</button>
                    <br/><br/>
                </div>
            <?php endforeach; ?>
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
</body>
</html>

