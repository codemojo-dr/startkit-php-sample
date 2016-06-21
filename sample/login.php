<?php

session_start();

// Login process section
if(count($_POST) > 0) {
    $_SESSION['email'] = $_POST['email'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Signin | Codemojo sample</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>

<body>

<div class="container">

    <form id="loginForm" class="form-signin" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

    <p class="text-center alert alert-warning col-md-6 col-md-offset-3">
        Use any email &amp; password to login<br/>
        NOTE: Please update the config/codemojo.php with your App keys
    </p>
</div> <!-- /container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery.min.js"><\/script>')</script>

<script>
    $(function(){
        $('#loginForm').submit(function(e){
            e.preventDefault();
            $.post('ajax-endpoints/login.php', {email: $('#inputEmail').val()}, function(data){
                if(data.code == 200){
                    location.href = "index.php";
                }else{
                    alert("Not able to login")
                }
            })
            return false;
        });
    });
</script>

</body>
</html>

