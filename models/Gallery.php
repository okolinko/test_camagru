<?php

require_once(ROOT . '/config/db_params.php');
require_once (ROOT .'/config/setup.php');

class Gallery
{
    const SHOW_BY_DEFAULT = 4;
            public static function getGalleryList($page = 1)
        {

            //запрос в БД
            $page = intval($page);
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();

            $fotoList = array();

            $result = $db->query("SELECT f.name, f.id, f.user_id, f.img, l.foto_id, l.status, COUNT(l.foto_id) FROM foto as f LEFT JOIN like_photo AS l ON l.foto_id = f.id and l.status = 1 GROUP BY f.id ORDER by f.name ASC LIMIT ".self::SHOW_BY_DEFAULT." OFFSET ".$offset );
            $i = 0;

            try {
                while ($row = $result->fetch()) {

                    $fotoList[$i]['id'] = $row['id'];
                    $fotoList[$i]['count_like'] = $row['COUNT(l.foto_id)'];
                    $fotoList[$i]['name'] = $row['name'];
                    $fotoList[$i]['user_id'] = $row['user_id'];
                    $fotoList[$i]['img'] = $row['img'];
                    $fotoList[$i]['autor'] = User::getUserById($fotoList[$i]['user_id'])['user_name'];
                    $fotoList[$i]['status'] = $row['status'];
                    $fotoList[$i]['foto_id'] = $row['foto_id'];
                    $i++;

                }
            }
            catch (Error $error){
//                var_dump($fotoList);
//                exit(0);
            }

            return $fotoList;
        }

        public static function getComment($foto_id){
            $foto_id = intval($foto_id);
            $db     = DB::getConnection();
            $sql    = 'SELECT * FROM comment WHERE  foto_id = :foto_id';
            $result = $db->prepare($sql);
            $result->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();
            $com_arr  = array();
            $i = 0;
            while($row = $result->fetch())
            {
                $com_arr[$i]['id'] = $row['id'];
                $com_arr[$i]['user_id'] = $row['user_id'];
                $com_arr[$i]['autor'] = User::getUserById($com_arr[$i]['user_id'])['user_name'];
                $com_arr[$i]['foto_id'] = $row['foto_id'];
                $com_arr[$i]['comment'] = '<code>'.$row['comment'].'</code>';
                $i++;
            }
            return ($com_arr);

        }


    public static function getTotalFoto()
    {
        $db = DB::getConnection();

        $result = $db->query('SELECT COUNT(id) AS count FROM foto');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return ($row['count']);
    }

    public static function name()
    {
        if (isset($_SESSION['user_name'])) {
            return $_SESSION['user_name'];
        }
        else
            return false;
    }

    public static function putLike($id, $foto_id)
    {
        $user_id = intval($id);
        $foto_id = intval($foto_id);

        $db = DB::getConnection();

        $status = 'SELECT `status` FROM `like_photo` WHERE `user_id` = :user_id AND `foto_id` = :foto_id';

        $result2 = $db->prepare($status);

        $result2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result2->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
        $result2->execute();

        $r = $result2->fetch();

        if (($r) != null){

            $sql = 'UPDATE like_photo SET status = 1 WHERE user_id = :user_id AND foto_id = :foto_id';
            $result = $db->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
            $result->execute();
        }
        else{
            $sql = 'INSERT INTO `like_photo` ( `user_id`, `foto_id`, `status`) VALUES (:user_id, :foto_id, 1)';
            $result = $db->prepare($sql);
            $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $result->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
            $result->execute();
        }
    }

    public static function delLike($id, $foto_id){

        $user_id = intval($id);
        $foto_id = intval($foto_id);

        $db     = DB::getConnection();

        $sql 	= 'UPDATE like_photo SET status = 0 WHERE user_id = :user_id AND foto_id = :foto_id';

        $result = $db->prepare($sql);

        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':foto_id', $foto_id, PDO::PARAM_STR);
        $result->execute();

    }

    public static function getLike($id, $foto_id){

        $user_id = intval($id);
        $foto_id = intval($foto_id);

        $db = DB::getConnection();

        $status = 'SELECT `status` FROM `like_photo` WHERE `user_id` = :user_id AND `foto_id` = :foto_id';

        $result2 = $db->prepare($status);

        $result2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result2->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
        $result2->execute();

        $r = $result2->fetch();
        return $r['status'];
    }


    public static function putComment($name, $foto, $comment)
    {
        $user_id = intval($name);
        $foto_id = intval($foto);
        $comment = strval($comment);

        $db     = DB::getConnection();
        $sql 	= 'INSERT INTO comment (user_id, foto_id, comment) VALUES (:user_id, :foto_id, :comment)';
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $result->bindParam(':foto_id', $foto_id, PDO::PARAM_INT);
        $result->bindParam(':comment', $comment, PDO::PARAM_STR);
        $result->execute();
    }

}

//INSERT INTO `comment` (`user_id`, `foto_id`, `comment`) VALUES (1, 1, 2) - добавление комита