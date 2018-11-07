<?php
session_start();
if(!isset($_SESSION['visit']) || $_SESSION['visit'] < time() - 60){
    $_SESSION['visit'] = time();

    $ip = '';
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }

    $db = ORM::forTable('www_counter')->create();
    $db->ip = $ip;
    $db->save();
}