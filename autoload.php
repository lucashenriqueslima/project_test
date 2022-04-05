<?php
    
    spl_autoload_register(
        function($class){
            $class = str_replace("Source\\", "/", $class);
            require_once __DIR__."/source/{$class}.php";
        }
    );