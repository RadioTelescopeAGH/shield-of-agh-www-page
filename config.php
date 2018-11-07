<?php
ORM::configure('mysql:host=localhost;dbname=shield');
ORM::configure('username', 'root');
ORM::configure('password', '');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));