<?php

require_once 'config_session.inc.php';

if ($_SESSION['REQUST_METHOD'] === "GET")
{
    header('Location: ../index.php');
    die();
}
