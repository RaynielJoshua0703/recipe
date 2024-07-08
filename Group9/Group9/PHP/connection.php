<?php
    define('DB_HOST', 'database-2.cp40g6m2ixdz.ap-southeast-2.rds.amazonaws.com');
    define('DB_USER', 'admin');
    define('DB_PASS', 'hatdogka123');
    define('DB_NAME', 'recipe_repository');

    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    if(!$connect) {
        die("Could not connect.");
    }
