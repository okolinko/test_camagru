<?php

class FotoController
{

    public function actionCamagru()
    {
        require_once(ROOT . '/views/foto.php');
        return true;
    }

    public function actionAdd()
    {
        $string = preg_replace('~data:image/png;base64,~', '', $_POST['image']);
        $image = base64_decode($string);
        if (file_exists(ROOT . '/resurses/gallery') == false)
            mkdir(ROOT . '/resurses/gallery', 0777);
        $i = Camera::putCount();

        $user_id = Camera::name();
        if ($user_id == false)
            echo "ввойдите в систему";
        else {
            $name = 'foto_'.$i;

            $img = $user_id . '-foto_' . $i . '.jpg';

            $res = Camera::putImage($img, $user_id, $name, $image);

            $r = Camera::like_tab_foto($user_id, $name);
            $foto_id = intval($r['id']);
            $s = Camera::helpTab($user_id, $foto_id);

            echo $res;

         }
        return (true);
    }
}