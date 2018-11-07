<?php
require_once "vendor/autoload.php";
    //require_once "config/db.php";
    require_once "includes/devTools.php";
    require_once "config/twig.php";

    session_start();

    if(!isset($_GET['page'])){
        $_GET['page'] = '';
    }

    switch($_GET['page']){
      case 'history':{
        echo $twig->render('history.twig');
      }break;
      case 'crew':{
        echo $twig->render('crew.twig');
      }break;
      case 'team1':{
        echo $twig->render('team1.twig');
      }break;
      case 'mail':{
        echo $twig->render('kontakt.twig');
      }break;
      default:{
        echo $twig->render('index.twig');
      }break;
    }
?>