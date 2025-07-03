<?php
    // Start the session if it hasn't been started already.
    // This is necessary for features like flash messages (`Flasher.php`).
    if(!session_id()) 
    {
        session_start();
    }

    // Load the main application bootstrap file.
    // This file loads all core classes, helpers, and configurations.
    require_once '../app/init.php';

    // Instantiate the main App class to begin the routing process.
    // The App class constructor will handle the URL and dispatch the request.
    $app = New App;