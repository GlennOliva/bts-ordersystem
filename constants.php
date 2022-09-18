<?php

//Start session
session_start();

// create constants store here
define('SITEURL', 'http://localhost/bts-order/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'product-order');
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn, 'bts-order') or die(mysqli_error());



?>