<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Bookmarks</title>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="static/assets/css/login.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php if($error) { ?>
    <div class="error">You have entered an incorrect username or password.</div>
    <?php } ?>
    <form class="login-form" method="POST" action="/src/?c=login&a=login">
        <h2>Please sign in</h2>
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
        <br />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <br />

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>

    <br /><br /><br /><br />
    <?php if(isset($_SESSION['register_error'])) { ?>
        <div class="errors">
            <?php echo $_SESSION['register_error_message']; ?>
        </div>
    <?php
        unset($_SESSION['register_error']);
        unset($_SESSION['register_error_message']);
        }
    ?>
    <form class="register-form" method="POST" action="/src/?c=register">
        <h2>Or create a new account</h2>
        <label for="email">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>
        <br />

        <label for="password">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
        <br />
        <label for="repeat_password">Repeat Password</label>
        <input type="password" id="repeat_password" name="repeat_password" class="form-control" placeholder="Repeat Password" required>
        <br />

        <button class="btn btn-lg btn-warning btn-block" type="submit">Register</button>
    </form>

</div>
<!-- /container -->
</body>
</html>