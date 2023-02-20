<?php
    session_start();
    require_once('dbconnect.php');

    if (isset($_SESSION['user']))
    {
        header('Location: home.php');
    }

    if (isset($_POST['username']) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $result = $db->users->insertOne(array('username'=>$username, 'password'=>$password));

        header('Location: index.php');
    }
?>

<html>
    <head>
        <title>Twitter Clone</title>
    </head>
    <body>
        <form method="post" action="register.php">
            <fieldset>
                <label for="username">Username: </label><input type="text" name="username" id="username"><br>
                <label for="password">Password: </label><input type="password" name="password" id="password"><br>
                <input type="submit" value="Sign Up">
            </fieldset>
        </form>
        <a href="index.php">Already have an account? Login here.</a>
    </body>
</html>