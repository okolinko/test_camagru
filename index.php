<?php

//	require_once (ROOT .'components/db.php');

session_start();
//общие настройки

//if (!isset($_SESSION['login']) || $_SESSION['login'] == "")
//{
//    if (isset($_COOKIE['login']) && isset($_COOKIE['email']) && $_COOKIE['user_id'])
//        $_SESSION['login'] = $_COOKIE['login'];
//    $_SESSION['email'] = $_COOKIE['email'];
//    $_SESSION['user_id'] = $_COOKIE['user_id'];
//}

//Отображение ошибок (на время разработки)
ini_set('display_errors', 1);
error_reporting(E_ALL);


/*
* Создаем константу корневой директории.
*/

/*
* Подключаем файл базовой инициализации приложения.
*/
define('ROOT', dirname(__FILE__));
//print_r(ROOT);
require_once(ROOT. '/components/Router.php');
require_once(ROOT . '/controlers/UserController.php');
require_once (ROOT. '/components/Autoload.php');

//Соединение с БД

require_once (ROOT .'/config/setup.php');

/*
* Создаем объкт маршрутизации и вызываем главный метод.
*/
$router = new Router();
$router->run();
