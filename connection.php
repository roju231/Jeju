<?php

$db_conn = mysqli_connect("localhost", "root", "", "ft007");
// Check connection
if($db_conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
error_reporting(E_ALL);
ini_set('display_errors','Off');

?>