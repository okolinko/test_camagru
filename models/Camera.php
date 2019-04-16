<?php
class Camera{

    //узнаем идентификатор пользователя
    public static function name()
    {
        if (isset($_SESSION['user_name'])) {
            return $_SESSION['user_name'];
        }
        else
            return false;
    }

    public static function putCount()
    {

        $db 	= DB::getConnection();
        $result	= $db->query('SELECT id FROM foto');
        $i = 1;
        while($row = $result->fetch())
            $i++;
        return ($i);
    }

    //записывает фотку в бд
    public static function putImage($img, $user_id, $name,  $image)
    {
        $user_id = intval($user_id);

        $db 	= DB::getConnection();
        $sql 	= 'INSERT INTO `foto` (`name`, `user_id`, `img`) VALUES (:name, :user_id, :img)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':img', $img, PDO::PARAM_STR);
        $result->execute();

        if (file_put_contents(ROOT.'/resurses/gallery/'.$img, $image))
        {
            return ("сохранилось");
        }
        else
            return("не сохранилось");
    }


    public static function like_tab_foto($user_id, $name){

        $status = 0;
        $db 	= DB::getConnection();

        $sql2 = 'SELECT `id` FROM `foto` WHERE `name` = :name AND `user_id` =  :user_id';
        $result2 = $db->prepare($sql2);

        $result2->bindParam(':name', $name, PDO::PARAM_STR);
        $result2->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result2->execute();

        $r = $result2->fetch();

        return ($r);

    }

    public static function helpTab($user_id, $foto_id){

        $status = 0;

        $db 	= DB::getConnection();

        $sql 	= 'INSERT INTO `like_photo` ( `user_id`, `foto_id`, `status`) VALUES (:user_id, :foto_id, :status)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        $result->execute();
    }
}
?>

