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

//        if ($this->routes[$uri] == null)
//            $uri = 'main/my404';

//        for ($i = 0; $i < 18; $i++){
//            if ($uri == $this->routes[$i]);
//            {
//                $flag = 1;
//                break;
//            }
//        }
//        if ($flag != 1){
//            $uri = 'main/my404';
//        }

//        if ($uri != $this->routes[$i])
//        {
//            $uri = 'main/my404';
//        }
//        var_dump("uri  ".$uri."   ////       ");
//        print_r($this->routes);
//        exit(1);

        //   Проверка наличия запроса
        foreach ($this->routes as $uriPatten => $path) {

            //Сравнивание $uriPatten и $uri


            if (preg_match("~$uriPatten~", $uri)) {

                //получение внутреннего пути из внешнего согласно правила
                $internalRoute = preg_replace("~$uriPatten~", $path, $uri);

//                var_dump($internalRoute);
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

//        echo "404";

    }
}
