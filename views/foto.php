<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CAMAGRU</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
<!--    <script type="text/javascript" src="/js/my.js"></script>-->
    <script src="/js/foto.js"></script>
</head>
<body>
<header>
    <div class="flex-top">
        <img class="top-elem" src="/resurses/epos4am8qj4o.png" alt="">
        <?php if (isset($_SESSION['user_name'])): ?>
            <div><span class="com"> Приветствуем вас,</span> <span style="color: darkred; margin-left: 3%; margin-left: 2% "> <?php echo ' '.$_SESSION['lol'].'!';?></span></div>
        <?php else: ?>
            <div><span class="com">Приветствуем вас,</span> <span class="user">Гость</span>!</div>
        <?php endif; ?>
    </div>
    <br>
    <nav class="">
        <div class="openMenu" id="openMenu">MENU</div>
        <ul id="menu">
            <li><a href="/main/">Главная</a></li>
            <li><a href="/gallery/">Галерея</a></li>
            <li><a href="/foto/">Фоторедактор</a></li>
            <li><a href="/user/register/">Регистрация</a></li>
            <?php if (User::isGuest()): ?>)
                <li><a href="/user/login/">Вход</a></li>
            <?php else: ?>
                <li><a href="/user/logout/">Выход</a></li>
                <li><a href="/account/">Кабинет</a> </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>
<div class="foto_flex">
        <div  id="el_1">
            <button type="button" id="button" name="button"><img  width=50px src="/resurses/zat.png" width=100% ></button>

            <button style="margin-top: 5%; padding: 1em;" type="button" id="button8" name="button8">Download</button>
<!--            <input id = "im"; style="display: block; width: 100px;margin-top: 30%" type="file" name="image" onchange="previewFile()" multiple accept="image/*,image/jpeg">-->
        </div>
        <div class="elem_foto_cam" id="el_2"><video id="video" width="800" height="600" autoplay="autoplay"></video></div>
    <div id="el_3"> <canvas id="canvas" width="800" height="600"></canvas></div>
    <div id="el_4">
        <div class="conteiner">
            <button type="button" id="button1" name="button1">Sepia</button>
            <button type="button" id="button3" name="button3">HDR</button>
            <button type="button" id="button4" name="button4">Gray</button>
            <button type="button" id="button5" name="button5">Noise</button>
            <button type="button" id="button6" name="button6">Invert</button>
            <button type="button" id="button7" name="button7">More</button>
            <button type="button" id="button2" name="button2"><img  width="50px" src="/template/img/w.png"></button>
            <button type="button" id="frame" name="frame"><img  height="50px" src="/template/img/r1.png"></button>
            <button type="button" id="frame2" name="frame"><img  height="50px" src="/template/img/r4.png"></button>
            <button type="button" id="frame3" name="frame"><img  width="50px" src="/template/img/r5.png"></button>
            <button type="button" id="reset" name="frame">Reset</button>
            <button type="button" id="save" name="save">Save</button>
        </div>
    </div>
</div>
<section class="wrap">
    <div id="output"></div>
</section>
<?php include ROOT.'/views/footer.php';?>
<!--<script src="/js/foto.js"></script>-->
</body>
</html>