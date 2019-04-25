<?php

include_once ROOT.'/models/Gallery.php';

class GalleryController{

    public function actionList($page = 1){
    if ($page == NULL)
        $page = "page-1";

    $gallerylist = array();
    $gallerylist = Gallery::getGalleryList($page);

    $total = Gallery::getTotalFoto();
//var_dump($_SESSION['user_name']);
//exit(1);
        $name = Gallery::name();
        if ($name == false)
        {
            $text = "Войдите в акканут чтобы открыть все функции";
        }
        else{
            $userId = $_SESSION['user_name'];
            $name_user = $_SESSION['lol'];
            $commentsList = array();
            $commentsList = Gallery::getComment($userId);
            $text = "";
        }


    $pagination = new Pagination($total, $page, Gallery::SHOW_BY_DEFAULT, 'page-');

    require_once(ROOT . '/views/gallery.php');

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
        $comment = json_decode($_POST['comment']);
        $comment = htmlentities($comment);
        $foto    = $_POST['foto'];
        $name = Gallery::name();
        if ($name == false)
            echo "false";
        else{
            Gallery::putComment($name, $foto, $comment);
            echo "true";
        }

//        $array = array("1","2","3");
//
//        print json_encode($array);

        return true;
    }

    public function actionArrcommit(){
        $id    = $_POST['idphoto'];
        $commentsList = array();
        $commentsList = Gallery::getComment($id);
        $comm = array();
        foreach ($commentsList as $comment)
        {
            array_push($comm, $comment);
        }
        print json_encode($comm);

        return true;
    }

}