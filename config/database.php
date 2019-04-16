<?php
	$wow = mysqli_connect("localhost", "akolinko", "kgdskk");
	$val = mysqli_query($wow, "show databases like 'camagru'");
	$res = mysqli_num_rows($val);
	if (!$res) {

        $query = mysqli_query($wow, "CREATE DATABASE IF NOT EXISTS `camagru`");
        $wow = mysqli_connect("localhost", "akolinko", "kgdskk", "camagru");

        $queryBase = file_get_contents(ROOT.'/camagru.sql');
        $query = mysqli_multi_query($wow, $queryBase);
    }
?>

