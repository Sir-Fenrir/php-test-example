<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require 'Routing.php';

$path = parse_url($_SERVER['REQUEST_URI']);

findView($path);
