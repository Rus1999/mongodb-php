<?php
    require '../vendor/autoload.php';

    // echo "Autoload is working...";

    $client = new MongoDB\Client('mongodb://localhost:27017');
    $db = $client->twitterdb154;

    // echo "<br>Connected";

?>