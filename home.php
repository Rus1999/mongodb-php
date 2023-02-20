<?php
    session_start();
    require_once('dbconnect.php');
    if (!isset($_SESSION['user']))
    {
        header("Location: index.php");

        $userData = $db->users->findOne(array('_id' => $_SESSION['user']));
    }
?>

<html>
<head>
    <title>Twitter Clone</title>
</head>
<body>
    <?php include('header.php'); ?>
</body>
</html>