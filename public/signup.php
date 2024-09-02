<?php
require_once '../includes/core/config_session.inc.php';
require_once '../includes/core/signup_view.inc.php';

if (isset($_SESSION['userID']))
{
  header('Location: home.php');
  die();
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Signup - My Blog</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .form-floating {
            margin-bottom: 10px;
        }

        body {
            background-color: #e2e2e2;
        }

        h1,
        p {
            text-align: center;
        }

        a {
            text-decoration: none;
        }

        header {
            /* box-shadow: 0px 15px 10px -17px; */
            border-bottom: 2px solid gray;
        }

        .header-list {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif;
        }
    </style>

    <!-- Custom styles for this template -->
    <link href="assets/css/sign-in.css" rel="stylesheet">

</head>

<body class="d-flex align-items-center py-4">

    <!-- main -->
    <main class="form-signin w-100 m-auto">
        <form action="../includes/signup.inc.php" method="POST">
            <div class="text-center">
                <a href="index.php"><img class="mb-4" src="assets/images/logo.png" alt="" width="82" height="67"></a>
                <h1 class="h3 mb-3 fw-normal">Create an account</h1>
            </div>

            <?php checkForErrors();?>

            <div class="form-floating">
                <input name="username" type="text" class="form-control" id="floatingInput" placeholder="username">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating" id="password">
                <input name="password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input name="retype_password" type="password" class="form-control" id="floatingPassword"
                    placeholder="Retype Password">
                <label for="floatingPassword">Retype password</label>
            </div>

            <div class="my-2">Already have an account ? <a href="login.php">Login here</a></div>

            <div class="form-check text-start my-3">
                <input name="terms" class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Accept terms and conditions.
                </label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>

            <p class="mt-5 mb-3 text-body-secondary">&copy; My Blog - <?php echo (date("Y")); ?></p>
        </form>
    </main>
    <!-- end main -->

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>