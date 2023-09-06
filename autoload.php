<?php
    spl_autoload_register(function ($class) {
        // Convert the class name to a file path.
        $classFilePath = 'classes/' . str_replace('\\', '/', $class) . '.php';

        // Check if the file exists and require it if it does.
        if (file_exists($classFilePath)) {
            require_once $classFilePath;
        }
    });