<?php
    $loader = new Twig_Loader_Filesystem('templates');
    $config = [];
    if(false){
        $config['cache'] = $this->config->pathToTemplateCache;
    }
    $twig = new Twig_Environment($loader, $config);
