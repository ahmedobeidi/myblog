<?php

function checkForErrors()
{
    if (isset($_SESSION['errors_signup']))
    {
        $errors = $_SESSION['errors_signup'];

        if (isset($errors['empty_filed']))
        {
            printError($errors['empty_filed']);
        }
        else if (isset($errors['invalid_email']))
        {
            printError($errors['invalid_email']);
        }
        else if (isset($errors['email_taken']))
        {
            printError($errors['email_taken']);
        }
        else if (isset($errors['password_not_match']))
        {
            printError($errors['password_not_match']);
        }

        unset($_SESSION['errors_signup']);
    }
}

function printError(string $error)
{
    echo '<div class="alert alert-danger">' . $error. '</div>';
}