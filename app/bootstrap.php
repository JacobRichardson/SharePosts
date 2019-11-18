<?php

    // Load config.
    require_once 'config/config.php';

    // Autoload Core Libraries.
    spl_autoload_register(function($className) {
        
        // Require in the lib.
        require_once('lib/' .$className . '.php');
    })
?>