<?php

require_once (ROOT .'/config/setup.php');

class User{

    public static function register($name, $email, $password){

        $db = Db::getConnection();
        $admin = 0;
        $act_email = 0;
        $hash_email = hash('whirlpool', $name);
        $password = hash('whirlpool', $password);

        $sql = 'INSERT INTO register (user_name, password, admin, act_email, email, hash_email) '
            . 'VALUES (:user_name, :password, :admin, :act_email, :email, :hash_email)';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':admin', $admin, PDO::PARAM_STR);
        $result->bindParam(':act_email', $act_email, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':hash_email', $hash_email, PDO::PARAM_STR);

       mail($email, "Your activation key for internet shop.", 'For activation your account '.$name.' 
				follow this link http://localhost:8080/user/reg/'.$hash_email);

           return $result->execute();

    }

    public static function checkName($name){
        if (strlen($name) >= 5 && strlen($name) <= 10) {
            if (preg_match("#^[a-zA-Z0-9_\-]+$#", $name))
                return (true);
        }
        return (false);
    }

    public static function checkPassword($password){
        if (strlen($password) >= 6 && strlen($password) <= 16){
         if (preg_match("#^[a-zA-Z0-9_\-]+$#", $password))
             return (true);
        }
        return (false);
    }

    public static function checkEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)){
            if (preg_match('/^([a-zA-Z0-9_-]+\.)*[a-zA-Z0-9_-]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)*\.[a-zA-Z]{2,6}$/', $email))
            return (true);
        }
        return (false);
    }

   public static function checkPassword_Password2($password, $password2){
       if ($password === $password2)
           return (true);
       return (false);
   }

   public static function checkEmailExists($email){

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM register WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return (true);
        return (false);
   }

    public static function checkNameExists($name){

        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM register WHERE user_name = :user_name';

        $result = $db->prepare($sql);
        $result->bindParam(':user_name', $name, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn())
            return (true);
        return (false);
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM register WHERE email = :email AND password = :password LIMIT 1';

        $password = hash('whirlpool', $password);
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return $user;
        }

        return false;
    }
        public static function checkAktiv($email)
    {
        $db = Db::getConnection();
        $act_email = 1;

        $sql = 'SELECT * FROM register WHERE email = :email AND act_email = :act_email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':act_email', $act_email, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();
        if ($user) {
            return (true);
        }
        return (false);
    }

    public static function checkLogged()
    {
        // Если сессия есть, вернем идентификатор пользователя
        if (isset($_SESSION['user_name'])) {
            return $_SESSION['user_name'];
        }
        else
            header("Location: /user/login");
    }

    public static function reg($hash_email)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE register SET act_email = 1 WHERE hash_email = :hash_email';

        $result = $db->prepare($sql);
        $result->bindParam(':hash_email', $hash_email, PDO::PARAM_STR);

        $result->execute();
    }

    public static function auth($userId)
    {
        session_start();
        $_SESSION['user_name'] = $userId;
    }


    public static function logout()
    {
        session_start();
        unset($_SESSION["user_name"]);
    }

    public static function isGuest(){

        if (isset($_SESSION['user_name'])){
            return (false);
        }
        return (true);
    }

    public static function getUserById($id){

        if ($id){

            $db = Db::getConnection();
            $sql = 'SELECT * FROM register WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_STR);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return ($result->fetch());
        }
    }

    public static function delete($id)
    {
        $id = intval($id);
        echo " id = $id";
        $db = Db::getConnection();
        $sql = 'DELETE FROM register WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        var_dump( $result);
        return ($result->fetch());
    }

    public static function edit($id, $name, $password)
    {
        $db = Db::getConnection();
        $password = hash ( 'whirlpool' , $password );
        $sql = "UPDATE register SET  password = :password 
            WHERE id = :id";

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

}

