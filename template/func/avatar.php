<?php
if (isset($_SESSION['user_name'])){
    $name = "avatar";
    $file = $name.$_SESSION['user_name'].'.png';
    if (file_exists('resurses/avatar/'.$file)) {
        $avatar = $file;
    }
    else{
        $avatar = 'avatar.png';
    }
}
else{
    $avatar = 'avatar.png';
}
?>