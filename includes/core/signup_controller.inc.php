<?php

function isInputEmpty(string $username, string $email, string $pwd, string $retypePassword)
{
    if (empty($username) || empty($email) || empty($pwd) || empty($retypePassword))
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function isNotValidEmail(string $email)
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

function isPasswordNotMatch(string $pwd, string $retyppPassword)
{
    if ($pwd != $retyppPassword)
    {
        return true;
    }
    else
    {
        return false;
    }
}