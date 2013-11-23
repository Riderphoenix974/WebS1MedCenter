<?php

define('DSN', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'MedCenter');


global $bdd;
$bdd = mysqli_connect('localhost','root','root','MedCenter');

