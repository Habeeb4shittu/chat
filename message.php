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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="http://localhost:10/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
            integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="./styles/css/chat.css">
        <title><?php echo $result['firstname'] . ' ' . $result['lastname'] ?></title>
    </head>

    <body>
        <div class="hidden"><?=$result['theme']?></div>
        <div class="main">
            <aside>
                <div class="sidebar" data-id="<?=$result['id']?>">
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
                        <!-- <div class="btn active">
                            <img src="./assets/female.jpeg" alt="">
                            <button class="link" type="button">Cassy Lang</button>
                        </div> -->
                    </div>
                    <div class="side-footer">
                        <div class="avatar">
                            <div class="image">
                                <img src="./assets/<?=$result['image']?>" alt="" class="avata">
                            </div>
                            <span class="side-username">
                                <?php echo $result['firstname'] . ' ' . $result['lastname'] ?>

                            </span>
                        </div>
                        <button class="opt settings">
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
                        <i class="fa fa-bars info bar ico" aria-hidden="true"></i>
                    </span>
                    <div class="nav-details"></div>
                    <span>
                        <i class="fa fa-info-circle info ico" aria-hidden="true"></i>
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
        <script src="/js/main.js" type="module"></script>
    </body>

</html>