<?php

require_once(ROOT . '/controlers/UserController.php');
class AccountController
{

    //выводим страничку юзера
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);


        require_once(ROOT . '/views/accaunt.php');
        return (true);
    }

    public function actionEdit(){

        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);

        $name = $user['user_name'];
        $password = $user['password'];

        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['text'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            $errors = false;

            if (!User::checkNameExists($name)){
                $errors[] = 'Неправильное имя пользователя';
            }

            if (!User::checkPassword($password)) {
                $errors['password'] = 'Неправильная длина пароля или его формат';
            }
            if (!User::checkPassword_Password2($password, $password2)) {
                $errors[] = 'Пароли не совпадают';
            }

            if ($errors == false) {
                $result = User::edit($userId, $name, $password);
            }
        }
        require_once(ROOT.'/views/edit.php');
        return (true);
    }
    public function actionDelete()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['admin'] != 1) {
            //удаляем юзера
            $res = User::delete($userId);
            print_r($res);

            // удаляем сессию
            User::logout();

            header("Location: /");
            return (true);
        }
        else
            echo "Админа удалить нельзя";
    }
}