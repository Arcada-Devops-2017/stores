<?php

include_once('AutoLoader.php');
// Register the directory to your include files
AutoLoader::registerDirectory('../api');
AutoLoader::registerDirectory('../');

// function loader($class)
// {
//     $file = $class . '.php';
//     if (file_exists($file)) {
//         require $file;
//     }
// }

// spl_autoload_register('loader');
