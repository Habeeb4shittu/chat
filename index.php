<?php
require_once __DIR__ . '/src/loginRequest.php';
// mail('habeeb4shittu.@gmail.com', 'reset password', "Your link to reset your password is this <a href=''>Reset Password</a>")
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost:10/fontawesome6/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="http://localhost:10/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
            integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <a href="">Forgotten password?</a>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js"
            integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="http://localhost:10/fontawesome6/js/all.min.js
"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js"
            integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="http://localhost:10/jquery.js
"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.js"
            integrity="sha512-nO7wgHUoWPYGCNriyGzcFwPSF+bPDOR+NvtOYy2wMcWkrnCNPKBcFEkU80XIN14UVja0Gdnff9EmydyLlOL7mQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="./js/main.js" type="module"></script>
    </body>

</html>