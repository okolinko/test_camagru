<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8"/>
    <title>CAMAGRU</title>
    <link rel="stylesheet" type="text/css" href="/template/css/style.css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Averia+Sans+Libre' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="/js/my.js"></script>
</head>
<body>
<header>
<div class="flex-top">
    <img class="top-elem" src="/resurses/epos4am8qj4o.png" alt="">
    <?php if (isset($_SESSION['user_name'])): ?>
        <div><span class="com"> Приветствуем вас,</span> <span style="color: darkred; margin-left: 5% "> <?php echo ' '.$_SESSION['lol'].'!';?></span></div>
    <?php else: ?>
        <div><span class="com">Приветствуем вас,</span> <span style="color: darkred">Гость</span>!</div>
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
