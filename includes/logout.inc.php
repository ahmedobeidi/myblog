<?php

if ($_SERVER['REQUEST_METHOD'] === 'GET')
{
    header('Location: ../public/index.php');
    die();
}

session_start();
session_unset();
session_destroy();

header('Location: ../public/index.php');
die();