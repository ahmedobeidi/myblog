<?php

function isInputEmptyLogin(string $email, string $pwd)
{
    if (empty($email) || empty($pwd))
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function isNotValidEmailLogin(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    else 
    {
        return false;
    }
}