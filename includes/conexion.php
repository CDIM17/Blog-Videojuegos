<?php

//Conexion
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'blog_master';

$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf-8'");


if(!isset($_SESSION))
{
    session_start();
}


 ?>
