<?php

include_once ROOT.'/models/Gallery.php';

class GalleryController{

    public function actionList($page = 1){
    if ($page == NULL)
        $page = "page-1";

    $gallerylist = array();
    $gallerylist = Gallery::getGalleryList($page);

    $total = Gallery::getTotalFoto();
//        if(!empty($_POST['foto_id'])){
//            $this->id = $_POST['foto_id'];
//        }
//    echo true;
    $id = 1;

    $commentsList = array();
    $commentsList = Gallery::getComment($id);
//    var_dump($commentsList["comment"]);
//    exit(1);

    $user_name = User::getUserById($_SESSION['user_name']);
    $name_user = $user_name['user_name'];
//    var_dump($user_name['user_name']);
//    exit(1);

    $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');

    require_once(ROOT . '/views/gallery.php');

        return true;
    }

    public function actionAddlike(){
        print_r($_POST['comment']);
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
        $comment = json_decode($_POST['comment']);
        $comment = htmlentities($comment);
        $foto    = $_POST['foto'];
        $name = Gallery::name();
        if ($name == false)
            echo false;
        else{
            Gallery::putComment($name, $foto, $comment);

        }

//        $array = array("1","2","3");
//
//        print json_encode($array);

        return true;
    }

}