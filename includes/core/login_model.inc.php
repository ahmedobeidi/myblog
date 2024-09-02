<?php

function isEmailNotExistLogin(object $connection, string $email)
{
    $query = "SELECT email FROM users WHERE email = '$email'";
    $results = mysqli_query($connection, $query);

    $isExist = true;

    while ($result = mysqli_fetch_assoc($results))
    {
        if ($result['email'] == $email)
        {
            $isExist = false;
            break;
        }
    }

    return $isExist;
}

function isPasswordNotMatchLogin(object $connection, string $email, string $pwd)
{
    $query = "SELECT pwd FROM users WHERE email = '$email'";
    $results = mysqli_query($connection, $query);

    $isExist = true;

    while ($result = mysqli_fetch_assoc($results))
    {
        if (password_verify($pwd, $result['pwd']))
        {
            $isExist = false;
            break;
        }
    }
        
    return $isExist;
}

function getLoginUserID(object $connection, string $email)
{
    $query = "SELECT * FROM users WHERE email = '$email'";
    $results = mysqli_query($connection, $query);

    $result = mysqli_fetch_assoc($results);

    return $result['id'];
}