<?php
require_once __DIR__ . '/src/regRequest.php';
// phpinfo();
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
        <title>Sign Up</title>
    </head>

    <body>
        <form action="" class="sign_up" method="post">
            <?php if (isset($error["exists"])) {?>
            <div class="error-big">
                <p class="text-danger"><?=$error["exists"]?></p>
            </div>
            <?php }?>
            <div>
                <div class="inputs">
                    <i class="fa fa-user ico" aria-hidden="true"></i>
                    <input type="text" name="firstname" placeholder="Enter your firstname..."
                        value="<?=$details["firstname"] ?? ""?>">
                </div>
                <?php if (isset($error["firstname"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["firstname"]?></p>
                </div>
                <?php }?>
            </div>
            <div>
                <div class="inputs">
                    <i class="fa fa-user ico" aria-hidden="true"></i>
                    <input type="text" name="lastname" placeholder="Enter your Lastname..."
                        value="<?=$details["lastname"] ?? ""?>">
                </div>
                <?php if (isset($error["lastname"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["lastname"]?></p>
                </div>
                <?php }?>
            </div>
            <div>
                <div class="inputs">
                    <i class="fa fa-envelope ico" aria-hidden="true"></i>
                    <input type="email" name="email" placeholder="Enter your email..."
                        value="<?=$details["email"] ?? ""?>">
                </div>
                <?php if (isset($error["email"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["email"]?></p>
                </div>
                <?php }?>
            </div>
            <div class="gender inputs">
                <div class="male">
                    <label for="male">
                        Male
                    </label>
                    <input type="radio" name="gender" value="male" id="male" checked>
                </div>
                <div class="female">
                    <label for="female">
                        Female
                    </label>
                    <input type="radio" name="gender" value="female" id="female">
                </div>
            </div>
            <div>
                <div class="inputs">
                    <i class="fa fa-lock ico" aria-hidden="true"></i>
                    <input type="password" class="password" name="password" placeholder="Enter your Password...">
                    <span class="eye">
                        <i class="fa fa-eye ico " aria-hidden="true"></i>
                    </span>
                </div>
                <?php if (isset($error["password"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["password"]?></p>
                </div>
                <?php }?>
                <?php if (isset($error["length"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["length"]?></p>
                </div>
                <?php }?>
            </div>
            <div>
                <div class="inputs">
                    <i class="fa fa-lock ico" aria-hidden="true"></i>
                    <input type="password" name="conpassword" placeholder="Confirm your password..." class="password">
                    <span class="eye">
                        <i class="fa fa-eye ico " aria-hidden="true"></i>
                    </span>
                </div>
                <?php if (isset($error["conpassword"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["conpassword"]?></p>
                </div>
                <?php }?>
                <?php if (isset($error["mismatch"])) {?>
                <div class="error">
                    <p class="text-danger"><?=$error["mismatch"]?></p>
                </div>
                <?php }?>
            </div>
            <div class="foot">

                <button type="submit" name="submit" class="sign">Sign Up</button>
                <p>Already a user? Log in <a href="/">here</a></p>
            </div>
        </form>
        <script src="http://localhost:10/bootstrap.min.js
"></script>
        <script src="http://localhost:10/fontawesome6/js/all.min.js
"></script>
        <script src="http://localhost:10/jquery.js
"></script>
        <script src="./js/main.js" type="module"></script>
    </body>

</html>