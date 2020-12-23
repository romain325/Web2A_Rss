<?php

//chargement config

require_once(__DIR__ . '/Config/Config.php');

//autoloader conforme norme PSR-0
require_once(__DIR__ . '/Config/SplClassLoader.php');
$myLibLoader = new SplClassLoader('Web2A\Controller', '../');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\Config', '../');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\Model', '../');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\DAL', '../');
$myLibLoader->register();
$myLibLoader = new SplClassLoader('Web2A\Parser', '../');
$myLibLoader->register();

$control = \Web2A\Controller\Controller::getInstance();
