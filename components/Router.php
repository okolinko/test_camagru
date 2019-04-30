<?php


class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }


    // Метод возвращает строку

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //получаем строку запроса
        $uri = $this->getURI();
        if ($uri === '')
            $uri = 'main';

        //   Проверка наличия запроса
        $flag = false;
        foreach ($this->routes as $uriPatten => $path) {

            //Сравнивание $uriPatten и $uri
            if (!$flag) {
                if (preg_match("~^$uriPatten$~", $uri) == 1) {
                    $flag = true;
                }
            }
            if (preg_match("~^$uriPatten$~", $uri)) {
                //получение внутреннего пути из внешнего согласно правила
                $internalRoute = preg_replace("~^$uriPatten$~", $path, $uri);

                //Определение какой это контейнер

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);
                $actionName = 'action' . ucfirst(array_shift($segments));

                $parametrs = $segments;

                // Подключить файл класса-контроллера

                $controllerFile = ROOT . '/controlers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
 //               Создать объект, вызвать метод

                $controllerObject = new $controllerName;

                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);//посмотреть на правильность

                if ($result != null){
                    break;
                }
            }
        }
        if ($flag == false ){
            $uri = 'main/my404';
            $internalRoute = preg_replace("~^$uriPatten$~", $path, $uri);
            $segments = explode('/', $internalRoute);
            $controllerName = array_shift($segments) . 'Controller';
            $controllerName = ucfirst($controllerName);
            $actionName = 'action' . ucfirst(array_shift($segments));
            $parametrs = $segments;
            $controllerFile = ROOT . '/controlers/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                include_once($controllerFile);
            }
            $controllerObject = new $controllerName;
            call_user_func_array(array($controllerObject, $actionName), $parametrs);
        }
    }
}
