<?php
    session_start();
    require_once('dbconnect.php');
    if (!isset($_SESSION['user']))
    {
        header("Location: index.php");
    }

    $userData = $db->users->findOne(array('_id' => $_SESSION['user']));

    function get_recent_tweets($db)
    {
        $result = $db->following->find( array( 'follower' => $_SESSION['user']));
        $result = iterator_to_array($result);
        $users_following = array();
        foreach ($result as $entry)
        {
            $users_following[] = $entry['user'];
        }
        $result = $db->tweets->find( array('authorId' => array('$in' => $users_following)));
        $recent_tweets = iterator_to_array($result);
        return $recent_tweets;
    }
?>

<html>
<head>
    <title>Twitter Clone</title>
</head>
<body>
    <?php include('header.php'); ?>
    <form method="post" action="create_tweet.php">
        <fieldset>
            <label for="tweet">What's happening?</label><br>
            <textarea name="body" id="tweet" cols="50" rows="4" maxlength="140"></textarea><br>
            <input type="submit" value="Tweet">
        </fieldset>
    </form>
</body>
</html>