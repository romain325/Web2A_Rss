<?php

//chargement config
require_once(__DIR__.'/Utils/Config.php');

//autoloader conforme norme PSR-0
require_once(__DIR__.'/Utils/SplClassLoader.php');
$myLibLoader = new SplClassLoader('Web2A\Controller', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\Utils', './');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\Model', './');
$myLibLoader->register();



