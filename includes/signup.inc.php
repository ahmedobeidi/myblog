<?php

// ini_set('display_errors', 1);
// error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $retypePassword = $_POST['retype_password'];

    try 
    {
        require_once 'core/dbh.inc.php';
        require_once 'core/signup_model.inc.php';
        require_once 'core/signup_controller.inc.php';

        // Error Handlers
        $errors = [];

        if (isInputEmpty($username, $email, $pwd, $retypePassword))
        {
            $errors['empty_filed'] = 'All fields are required!';
        }
        if (isNotValidEmail($email))
        {
            $errors['invalid_email'] = 'Invalid Email!';
        }
        if (isEmailExist($connection, $email))
        {
            $errors['email_taken'] = 'Email alerady registered!';
        }
        if (isPasswordNotMatch($pwd, $retypePassword))
        {
            $errors['password_not_match'] = 'Password not match!';
        }

        require_once 'core/config_session.inc.php';

        if ($errors)
        {
            $_SESSION['errors_signup'] = $errors;
            header('Location: ../public/signup.php');
            die();
        }

        createUser($connection, $username, $email, $pwd);
        $_SESSION['userID'] = getUserID($connection, $email);
        header('Location: ../public/home.php?signup=success');
        mysqli_close($connection);
        die();
    }
    catch (Exception $e)
    {
        die("Query failed, $e");
    }
    
}
else 
{
    header('Location: ../public/index.php');
    die();
}

/* 
require_once 'dbh.inc.php';

    $query = "INSERT INTO users (username, email, pwd) VALUES ('$username', '$email', '$pwd');";

    if (mysqli_query($connection, $query))
    {
        echo 'User created successfuly';
        header('Location: ../home.php');
    }
    else 
    {
        if (!$connection)
        {
            echo "Error: $connection_message";
        }
        else 
        {
            echo 'Error: ' . mysqli_error( $connection );
        }
    }
    mysqli_close($connection);
    echo "Connection closed";

*/