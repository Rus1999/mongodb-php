<?php
    require_once '..\vendor\autoload.php';
    echo "require_once 'vendor\autoload.php' Complete.<br>";

    $conn = new MongoDB\Client("mongodb://localhost:27017");
    echo "Connection to databse is successfulyl<br>";

    $db = $conn->db63410154ecommerce;
    echo "Database db63410154ecommerce selected<br>";

    $collection = $db->products;
    echo "Collection  selected successfully<br><hr>";

    $cursor = $collection->find();
    foreach ($cursor as $document)
    {
        echo $document["_id"]."<br>";
        echo $document["slug"]."<br>";
        echo $document["sku"]."<br>";
        echo $document["name"]."<br>";
        echo $document["description"]."<br>";
        echo $document->details->weight."<br>";
        echo $document->details->weight_units."<br>";
        echo $document->details->model_num."<br>";
        echo $document->details->manufacturer."<br>";
        echo $document->details->color."<br>";
        echo $document["total_reviews"]."<br>";
        echo $document["average_review"]."<br>";
        echo $document->pricing->retail."<br>";
        echo $document->pricing->sale."<br>";
        echo $document->price_history[0]->retail."<br>";
        echo $document->price_history[0]->sale."<br>";
        echo $document->price_history[0]->start."<br>";
        echo $document->price_history[0]->end."<br>";
        echo $document->price_history[1]->retail."<br>";
        echo $document->price_history[1]->sale."<br>";
        echo $document->price_history[1]->start."<br>";
        echo $document->price_history[1]->end."<br>";
        echo $document["primary_category"]."<br>";
        echo $document->category_ids[0]."<br>";
        echo $document->category_ids[1]."<br>";
        echo $document["main_cat_id"]."<br>";
        echo $document->tags[0]."<br>";
        echo $document->tags[1]."<br>";
        echo $document->tags[2]."<br>";
    }
    //print_r($cursor);
?>