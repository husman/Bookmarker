<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookmarks</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php if($error) { ?>
    <div class="error">You have entered an incorrect username or password.</div>
    <?php } ?>
    <form class="form-signin" method="POST" action="/?c=login&a=login">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="email" class="sr-only">Email address</label>
        <input type="email" id="email" class="form-control" placeholder="Email Address" required autofocus>
        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

</div>
<!-- /container -->
</body>
</html>