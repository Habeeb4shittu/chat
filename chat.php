<?php
require_once __DIR__ . '/src/chatController.php';

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
        <div class="main">
            <aside>
                <div class="sidebar">
                    <div class="top">
                        <span class="logo">
                            <i class="fas fa-comments logo-ico" aria-hidden="true"></i>
                            REAL CHAT
                        </span>
                        <span class="close">
                            <i class="fa fa-times times" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="users">
                        <div class="btn active">
                            <img src="./assets/female.jpeg" alt="">
                            <button class="link" type="button">Cassy Lang</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/male.jpeg" alt="">
                            <button class="link" type="button">Habeeb Shittu</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/female.jpeg" alt="">
                            <button class="link" type="button">Cassy Lang</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/male.jpeg" alt="">
                            <button class="link" type="button">Habeeb Shittu</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/female.jpeg" alt="">
                            <button class="link" type="button">Cassy Lang</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/male.jpeg" alt="">
                            <button class="link" type="button">Habeeb Shittu</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/female.jpeg" alt="">
                            <button class="link" type="button">Cassy Lang</button>
                        </div>
                        <div class="btn">
                            <img src="./assets/male.jpeg" alt="">
                            <button class="link" type="button">Habeeb Shittu</button>
                        </div>
                    </div>
                    <div class="side-footer">
                        <div class="avatar">
                            <div class="image">
                                <img src="./assets/<?=$result['image']?>.jpeg" alt="">
                            </div>
                            <span class="side-username">
                                <?php echo $result['firstname'] . ' ' . $result['lastname'] ?>

                            </span>
                        </div>
                        <button class="opt">
                            <p>Settings</p>
                            <i class="fas fa-wrench log-ico"></i>
                        </button>
                        <button class="opt add">
                            <p>Add a friend</p>
                            <i class="fas fa-user-plus log-ico"></i>
                        </button>
                        <button class="opt logout">
                            <p>Logout</p>
                            <i class="fas fa-arrow-right-from-bracket log-ico out"></i>
                        </button>
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
        </div>
        <div class="logout-modal">
            <i class="fa fa-exclamation-triangle ico" aria-hidden="true"></i>
            <p>Are you sure you want to logout?</p>
            <div class="confirm">
                <button class="butn no">No</button>
                <button class="butn out">Log Out</button>
            </div>
        </div>
        <div class="overlay"></div>
        <script src="http://localhost:10/bootstrap.min.js
"></script>
        <script src="http://localhost:10/fontawesome6/js/all.min.js
"></script>
        <script src="http://localhost:10/jquery.js
"></script>
        <script src="./js/main.js" type="module"></script>
    </body>

</html>