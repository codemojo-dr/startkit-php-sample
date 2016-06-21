<?php

require_once 'login-check.php';
require_once 'codemojo.php';

/*
 * Get the referral code of the user
 */
$referralCode = strtoupper($referralService->getReferralCode($_GET['id']));

?><html>
<head>
    <title> Join the best company in the world! </title>
    <meta property="og:title" content="Try Codemojo now" />
    <meta property="og:title" content="Try Codemojo now" />
    <meta property="og:description" content="Hey, you have to try Codemojo. They have production ready customer engagement components for instant deployment" />
    <meta property="og:site_name" content="Codemojo" />

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <style>
        .referral{
            border: dotted #adadad 1px;
            padding: 10px;
            text-align: center;
            background: #eaeaea;
        }
    </style>
</head>
<body>
<p style="text-align: center; margin-bottom: 0">my referral code</p>
<h2 class="referral">
    <a target="_blank" href="http://lh-sample:8888/signup/?code=<?php echo $referralCode ?>"><?php echo $referralCode ?></a>
</h2>

<h3>Refer &amp; Earn</h3>
<span class='st_facebook_large' displayText='Facebook'></span>
<span class='st_twitter_large' displayText='Tweet'></span>
<span class='st_linkedin_large' displayText='LinkedIn'></span>
<span class='st_email_large' displayText='Email'></span>

<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "ba6c3317-7491-4afe-b90a-db9c2b91bb7f", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
</body>
</html>
