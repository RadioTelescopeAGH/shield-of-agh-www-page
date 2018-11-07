<?php
include 'vendor/autoload.php';
include 'config.php';
include 'counter.php';
include 'Validator.php';
include 'Render.php';

$baseUrl = '/shield/www';
$urlOrigin = $_SERVER['REQUEST_URI'];
$url = str_replace($baseUrl, '', $urlOrigin);

$secUrl = Validator::secInput($url, ['filtr' => 0]);
if(!$secUrl['ok']){
    Render::mkPage('404');
    exit;
}

$page = ORM::forTable('pages')
    ->where(['url' => $secUrl['var'], 'active' => 1])
    ->findOne();

if(isset($page->id)){
    Render::mkPage($page->template, $page->content, $page->title);
} else {
    Render::mkPage('404');
}
