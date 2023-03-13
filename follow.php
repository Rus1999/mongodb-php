<?php
    session_start();
    require_once('dbconnect.php');

    if (!isset($_GET['id']))
    {
        exit;
    }

    $user_id = $_GET['id'];
    $follwer_id = $_SESSION['user'];

    $db->following->insertOne( array(
        'user' => new MongoDB\BSON\ObjectID("$user_id"),
        'follwer' => new MongoDB\BSON\ObjectID("$follwer_id"),
    ));

    header("Location: userlist.php");
?>