<?php

$servername = 'localhost';
$serverUsername = 'root';
$serverPassword = '';
$databaseName = 'myblog';

try 
{
    $connection = mysqli_connect($servername, $serverUsername, $serverPassword, $databaseName);
}
catch (Exception $e)
{
    die("Connection failed, $e");
}

