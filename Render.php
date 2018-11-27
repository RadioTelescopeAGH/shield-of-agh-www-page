<?php

class Render{

    public static function mkPage($template, $content = '', $title = ''){
        $html = file_get_contents('src/template/'.$template.'.html');
        $html = str_replace('{{title}}', $title, $html);
        $html = str_replace('{{content}}', $content, $html);
        $html = str_replace('{{menu}}', Menu::getMenu(), $html);
        echo $html;
    }

}