<?php

namespace app\core;

# директория public
define('ROOT', 'http://localhost');

require 'DB.php';

spl_autoload_register(function ($class) {
    // project-specific namespace prefix
    $prefix = 'app\\';

    // base directory for the namespace prefix
    #$base_dir = __DIR__ . '/';
    $base_dir = "../app/";

    // does the class use the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // get the relative class name
    $relative_class = substr($class, $len);
    
    // replace the namespace prefix with the base directory, replace namespace
    // separators with directory separators in the relative class name, append
    // with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    #echo '<pre>Заход в автолоад:',var_dump($file), '</pre>';

    // if the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});