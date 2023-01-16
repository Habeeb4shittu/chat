<?php
require_once __DIR__ . '/src/loginRequest.php';
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost:10/fontawesome6/css/all.min.css">
        <link rel="stylesheet" href="http://localhost:10/bootstrap.min.css">
        <link rel="stylesheet" href="./styles/css/style.css">
        <title>Login</title>
    </head>

    <body>
        <form action="" method="post">
            <?php if (isset($error["exists"])) {?>
            <div class="error-big">
                <p class="text-danger"><?=$error["exists"]?></p>
            </div>
            <?php }?>
            <div>
                <div class="inputs">
                    <i class="fa fa-envelope ico" aria-hidden="true"></i>
                    <input type="email" name="email" placeholder="Enter your email..."
                        value="<?=$logins["email"] ?? ""?>">
                </div>
                <?php if (isset($error["email"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["email"]?></p>
                </div>
                <?php }?>
            </div>
            <div>
                <div class="inputs">
                    <i class="fa fa-lock ico" aria-hidden="true"></i>
                    <input type="password" name="password" placeholder="Enter your password..." class="password">
                    <span class="eye">
                        <i class="fa fa-eye ico " aria-hidden="true"></i>
                    </span>
                </div>
                <?php if (isset($error["password"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["password"]?></p>
                </div>
                <?php }?>
            </div>
            <div class="foot">
                <button type="submit" name="login">Login</button>
                <p>Not a user? Sign Up <a href="./signup.php">here</a></p>
            </div>
        </form>
        <script src="http://localhost:10/bootstrap.min.js
"></script>
        <script src="http://localhost:10/fontawesome6/js/all.min.js
"></script>
        <script src="http://localhost:10/jquery.js
"></script>
        <script src="./js/main.js"></script>
    </body>

</html>