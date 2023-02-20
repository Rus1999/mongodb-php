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
        $result = $db->users->findOne(array('username'=>$username, 'password'=>$password));
        if (!$result)
        {

        }
        else
        {
            $_SESSION['user'] =  $result->_id;
            header('Location: home.php');
        }
    }
?>

<html>
    <head>
        <title>Twitter Clone</title>
    </head>
    <body>
        <form method="post" action="index.php">
            <fieldset>
                <label for="username">Username: </label><input type="text" name="username" id="username"><br>
                <label for="password">Password: </label><input type="password" name="password" id="password"><br>
                <input type="submit" value="Login">
            </fieldset>
        </form>
        <a href="registor.php">No account? Registor here.</a>
    </body>
</html>