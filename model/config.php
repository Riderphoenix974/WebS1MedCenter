<?php

define('DSN', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'MedCenter');

/**
 * Base URL used for redirects. Adjust this value when the application is
 * hosted inside a subdirectory.
 */
if (!defined('BASE_URL')) {
    define('BASE_URL', '/');
}


global $bdd;
$bdd = mysqli_connect('localhost','root','root','MedCenter');

