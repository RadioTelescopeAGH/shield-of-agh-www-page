<?php
include "vendor/autoload.php";

ORM::configure('mysql:host=localhost;dbname=shield');
ORM::configure('username', 'root');
ORM::configure('password', '');

$show24 = ORM::forTable('www_counter')
    ->rawQuery('
    select count(*) as cnt 
    from www_counter 
    where add_at > "'.date('Y-m-d H:i:s', strtotime('-24 hours')).'"
    group by ip')
    ->findArray();

$showAll = ORM::forTable('www_counter')
    ->rawQuery('
    select count(*) as cnt 
    from www_counter 
    group by ip')
    ->findArray();

echo "W ciągu ostatnich 24 godzin: ".$show24[0]['cnt'];
echo "<br>";
echo "Wszystkich: ".$showAll[0]['cnt'];

