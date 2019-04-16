<?php

include_once ROOT.'/models/Gallery.php';

class GalleryController{

    public function actionList($page = 1){
try {
    if ($page == NULL)
        $page = "page-1";

    $gallerylist = array();
    $gallerylist = Gallery::getGalleryList($page);

    $total = Gallery::getTotalFoto();

    $commentsList = array();
    $commentsList = Gallery::getComment($page);

//    var_dump($commentsList);
//    exit(1);

    $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');

    require_once(ROOT . '/views/gallery.php');
}
catch (Error $error){
//    var_dump("fffff");
//    exit(0);
}
        return true;
    }

    public function actionAddlike(){

        $foto    = $_POST['gallery'];

        $name = Gallery::name();

        if ($name == false)
        {
            echo "false";
        }
        else{
            $res = Gallery::putLike($name, $foto);
            echo "true";
        }
        return true;
    }

    public function actionDellike(){

        $foto    = $_POST['gallery'];

        $name = Gallery::name();

        if ($name == false)
        {
            echo "false";
        }
        else{
            $res = Gallery::delLike($name, $foto);
            echo "true";
        }
        return true;

    }


    public function actionGetLike(){

        $res = Gallery::getLike($_SESSION['user_name'], $_POST['idPhoto']);
        if ($res == 0)
        {
            echo "false";
        }
        else
        {
            echo "true";
        }
        return true;
    }

    public function actionComment(){
        $comment = $_POST['comment'];
        $comment = htmlentities($comment);
        $foto    = $_POST['foto'];
        $name = Gallery::name();

        if ($name == false)
            echo "ввойдите в систему";
        else{
            Gallery::putComment($name, $foto, $comment);

        }
    }

}