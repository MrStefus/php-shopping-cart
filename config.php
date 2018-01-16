<?php
$currency = 'RSD; '; //Currency Character or code

$db_username = 'root';
$db_password = 'root';
$db_name = 'php_shoping_cart';
$db_host = 'localhost';

$shipping_cost    = 580.00; //shipping cost
$taxes              = array( //List your Taxes percent here.
                            'PDV' => 18, 
                            'Taksa' => 1
                            );						
//connect to MySql						
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($mysqli->connect_error) {
    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
}

// Initiate charset UTF-8.
$mysqli->set_charset("utf8");
?>
