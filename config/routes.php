<?php
 return array(
     'main' => 'main/index',

//     'gallery/([0-9]+)' 		=> 'gallery/view',
     'gallery/page-([0-9]+)' => 'gallery/list/$1',
     'gallery/addlike'           => 'gallery/addlike',
     'gallery/dellike'           => 'gallery/dellike',
     'gallery/getlike'           => 'gallery/getlike',
     '/gallery/comment/'         => '/gallery/comment/',
     '/gallery/collike'          => '/gallery/collike',
     'gallery'				=> 'gallery/list',

     'foto/add' => 'foto/add',

     'foto' => 'foto/camagru',


     'user/login' => 'user/login',

     'user/reg/([0-9a-z]+)' => 'user/reg/$1',

     'user/register' => 'user/register',

     'user/logout'           => 'user/logout',

     'account/edit'          => 'account/edit',

     'account/delete'        => 'account/delete',

     'account'         		=> 'account/index',

 );