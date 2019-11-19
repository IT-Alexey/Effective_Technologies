<?php

\spl_autoload_register(function ($class) {
    $classpath = $_SERVER['DOCUMENT_ROOT'] . '/classes/';

    require_once $classpath . $class . '.php';
});
