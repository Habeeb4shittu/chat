<?php
require_once __DIR__ . '/src/chatController.php'
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="http://localhost:10/fontawesome6/css/all.min.css">
        <link rel="stylesheet" href="http://localhost:10/bootstrap.min.css">
        <link rel="stylesheet" href="./styles/css/chat.css">
        <title><?php echo $result['firstname'] . ' ' . $result['lastname'] ?></title>
    </head>

    <body>
        <aside>
            <div class="sidebar">
                <div class="top">
                    <span class="logo">
                        <i class="fas fa-comments logo-ico" aria-hidden="true"></i>
                    </span>
                    <span class="close">
                        <i class="fa fa-times times" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="links">
                    <div class="btn active">
                        <i class="fa fa-comment ico" aria-hidden="true"></i>
                        <button class="link" type="button">Chats</button>
                    </div>
                    <div class="btn">
                        <i class="fa fa-users ico" aria-hidden="true"></i>
                        <button class="link" type="button">Add A friend</button>
                    </div>
                    <div class="btn">
                        <i class="fa fa-wrench ico" aria-hidden="true"></i>
                        <button class="link" type="button">Settings</button>
                    </div>
                </div>
                <div class="side-footer">
                    <div class="avatar">
                        <div class="image">
                            <img src="./assets/<?=$result['image']?>.jpeg" alt="">
                        </div>
                        <span>
                            <?php echo $result['firstname'] . ' ' . $result['lastname'] ?>

                        </span>
                    </div>
                    <span class="logout">
                        <i class="fas fa-arrow-right-from-bracket log-ico"></i>
                    </span>
                </div>
            </div>
        </aside>
        <main>
            <header>
                <span class="bars">
                    <i class="fa fa-bars bars info bar" aria-hidden="true"></i>
                </span>
                <span>
                    <i class="fa fa-info-circle info" aria-hidden="true"></i>
                </span>
            </header>
            <section class="content"></section>
        </main>
        <script src="http://localhost:10/bootstrap.min.js
"></script>
        <script src="http://localhost:10/fontawesome6/js/all.min.js
"></script>
        <script src="http://localhost:10/jquery.js
"></script>
        <script src="./js/main.js" type="module"></script>
    </body>

</html>