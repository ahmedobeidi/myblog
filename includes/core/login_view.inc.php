<?php

function checkForErrors()
{
    if (isset($_SESSION['errors_login']))
    {
        $errors = $_SESSION['errors_login'];

        echo "<br>";

        if (isset($errors['empty_filed']))
        {
            printLoginError($errors['empty_filed']);
        }
        else if (isset($errors['invalid_email']))
        {
            printLoginError($errors['invalid_email']);
        }
        else if (isset($errors['email_not_exist']))
        {
            printLoginError($errors['email_not_exist']);
        }
        else if (isset($errors['password_not_match']))
        {
            printLoginError($errors['password_not_match']);
        }
        
        unset($_SESSION['errors_login']);
    }
}

function printLoginError(string $error)
{
    echo '<div class="alert alert-danger">' . $error. '</div>';
}