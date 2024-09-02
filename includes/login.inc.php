<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $email = $_POST['email'];
    $pwd = $_POST['password'];

    try {
        require_once 'core/dbh.inc.php';
        require_once 'core/login_model.inc.php';
        require_once 'core/login_controller.inc.php';
        require_once 'core/login_view.inc.php';

        // Error Handlers
        $loginErrors = [];

        if (isInputEmptyLogin($email, $pwd))
        {
            $loginErrors['empty_filed'] = 'All fields are required!';
        }
        if (isNotValidEmailLogin($email))
        {
            $loginErrors['invalid_email'] = 'Invalid Email!';
        }
        if (isEmailNotExistLogin($connection, $email))
        {
            $loginErrors['email_not_exist'] = 'Email not found!';
        }
        if (isPasswordNotMatchLogin($connection, $email, $pwd))
        {
            $loginErrors['password_not_match'] = 'Invalid password';
        }

        require_once 'core/config_session.inc.php';

        if ($loginErrors)
        {
            $_SESSION['errors_login'] = $loginErrors;
            header('Location: ../public/login.php');
            die();
        }

        $_SESSION['userID'] = getLoginUserID($connection, $email);

        header("Location: ../public/home.php?login=success&id=" . $_SESSION['userID']);
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