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

require 'Routing.php';

$path = parse_url($_SERVER['REQUEST_URI']);

findView($path);
