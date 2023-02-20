<?php

    session_start();
    require_once('dbconnect.php');

    if (!isset($_POST['body']))
    {
        exit;
    }

    $user_id = $_SESSION['user'];
    $userData = $db->users->findOne(array('_id' => $uesr_id));
    $body = substr($_POST['body'], 140);
    $date = date('Y-m-d H:i:s');

    $db->tweets->insertOne(array(
        'authorId' => $user_id,
        'authorNmae' => $userData['username'],
        'body' => $body,
        'created' => $date
    ));

    header('Location: home.php');
?>