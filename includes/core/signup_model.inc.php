<?php

function isEmailExist(object $connection, string $email)
{
    $query = "SELECT email FROM users WHERE email = '$email'";
    $results = mysqli_query($connection, $query);

    $isExist = false;

    while ($result = mysqli_fetch_assoc($results))
    {
        if ($result['email'] == $email)
        {
            $isExist = true;
            break;
        }
    }
    
    return $isExist;
}

function createUser(object $connection, string $username, string $email, string $pwd)
{
    
    // Encrypt password
    $options = ['cost' => 12];
    $hashedPassword = password_hash($pwd, PASSWORD_BCRYPT, $options);

    // Add the user to database
    $query = "INSERT INTO users (username, email, pwd) VALUES ('$username', '$email', '$hashedPassword');";
    mysqli_query($connection, $query);  
}

function getUserID(object $connection, string $email)
{
    $query = "SELECT id FROM users WHERE email = '$email'";
    $results = mysqli_query($connection, $query);

    $result = mysqli_fetch_assoc($results);

    return $result['id'];
}