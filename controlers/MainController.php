<?php

class MainController
{
    public function actionIndex()
    {
        require_once(ROOT . '/views/index.php');
        return true;
    }

    public function actionMy404(){
        require_once(ROOT . '/views/404.php');
        return true;
    }

}