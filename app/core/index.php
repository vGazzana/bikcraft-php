<?php

    require_once __DIR__ . '/dotenv.php';
    require_once __DIR__ . '/database.php';

    if(class_exists('Database')) {
        $db = new Database();
    } else {
        die('Database class not found.');
    }