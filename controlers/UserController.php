<?php

//include_once ROOT.'/views/header.php';

class UserController{

    public function actionRegister()
    {

        $name = '';
        $email = '';
        $password = '';
        $password2 = '';
        $this->result = false;
        $this->errors = false;


        if (isset($_POST['submit'])) {
            $name = $_POST['text'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            $errors = false;

            if (!User::checkName($name)) {
                $errors[] = 'Неправильное длина или формат имени';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Неправильная длина пароля или его формат';
            }

            if (!User::checkPassword_Password2($password, $password2)) {
                $errors[] = 'Пароли не совпадают';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный формат email';
            }

            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if (User::checkNameExists($name)){
                $errors[] = 'Ткое имя уже используется';
            }

            if ($errors == false){
                $this->result = User::register($name, $email, $password);
                echo "<div style=\"background-color: green; text-align:center;\"> Аккаунт зарегистрирован. Код активации отправлен на почту $email</div>";
            }
            $this->errors = $errors;
        }
        require_once(ROOT . '/views/register.php');

        return true;
    }


    public function actionLogin(){

        $email = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->errors = false;
            // Валидация полей
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);

            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                if (!User::checkAktiv($email)) {
                    $errors[] = 'подтвердите регистрацию на почте ' . $email;
                }
                else {
                    $_SESSION['lol'] = $userId['user_name'];
                    User::auth($userId['id']);

//                 Перенаправляем пользователя в закрытую часть - кабинет
                header("Location: /account/");
            }
            }

        }

        require_once(ROOT . '/views/login.php');

        return true;
    }
    public function actionReg($id)
    {
        User::reg($id);
        header("Location: /main/");
        return true;
    }
    public function actionLogout()
    {
        User::Logout();
        header("Location: /main/");
    }
    public function actionInde()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();
        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
    }
}
