<?php

    // Load config.
    require_once 'config/config.php';

    // Load helpers.
    require_once 'helpers/url-redirect.php';
    require_once 'helpers/session.php';

    // Autoload Core Libraries.
    spl_autoload_register(function($className) {
        
        // Require in the lib.
        require_once('lib/' .$className . '.php');
    })
?>