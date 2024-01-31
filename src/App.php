<?php

spl_autoload_register(function ($class_name) {
    // replace namespace separators with directory separators in the relative
    // class name, append with .php
    $class_path = str_replace('PHP_Example\\', '', $class_name);

    $file =  __DIR__ . '\\' . $class_path . '.php';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

use PHP_Example\View;
//
$t = new View();
$t->friends = array(
    'Rachel', 'Monica', 'Phoebe', 'Chandler', 'Joey', 'Ross'
);
$t->render('index.phtml');
