<?php
    require_once '..\vendor\autoload.php';

    $client = new MongoDB\Client('mongodb://localhost:27017');

    $collections = $client->db63410154ecommerce;

    echo "<h3>Products</h3>";

    $products = $collections->products;
    $prod_docs = $products->find(array(), array('projection'=>array('_id'=>false)));
    $prod_data = iterator_to_array($prod_docs);
    echo '<pre>';
    var_dump($prod_data);
    echo '</pre>';

    echo "<hr><h3>Categories</h3>";

    $categories = $collections->categories;
    $cat_docs = $categories->find(array(), array('projection'=>array('_id'=>false)));
    $cat_data = iterator_to_array($cat_docs);
    echo '<pre>';
    var_dump($cat_data);
    echo '</pre>';

    echo "<hr><h3>Reviews</h3>";

    $reviews = $collections->reviews;
    $rev_docs = $reviews->find(array(), array('projection'=>array('_id'=>false)));
    $rev_data = iterator_to_array($rev_docs);

    echo '<pre>';
    var_dump($rev_data);
    echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <!-- products data -->
        <thead>
            <th colspan="13" bgcolor="grey">
                Products data
            </th>
        </thead>
        <thead>
            <?php foreach ($prod_data[0] as $key=>$value): ?>
                <th>
                    <?php echo $key; ?>
                </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
                <?php 
                    foreach ($prod_data as $entry) :
                        echo "<tr>";
                        foreach ($entry as $key=>$value) :
                            echo "<td>";
                            if (count((array)$value)>1) :
                                foreach ($value as $detail) :
                                    if (count((array)$detail)>1) :
                                        foreach($detail as $pr_hit) :
                                            echo $pr_hit."<br>";
                                        endforeach;
                                    else:
                                        echo "$detail";
                                    endif;
                                endforeach;
                            else:
                                echo $value;
                            endif;
                            echo "</td>";
                        endforeach;
                        echo "</tr>";
                    endforeach;
                ?>
        </tbody>

        <!-- Categories data -->
        <thead>
            <th colspan="5" bgcolor="grey">
                Categories data
            </th>
        </thead>
        <thead>
            <?php foreach ($cat_data[0] as $key=>$value): ?>
                <th>
                    <?php echo $key; ?>
                </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
                <?php 
                    foreach ($cat_data as $entry) :
                        echo "<tr>";
                        foreach ($entry as $key=>$value) :
                            echo "<td>";
                            if (count((array)$value)>1) :
                                foreach ($value as $detail) :
                                    if (count((array)$detail)>1) :
                                        foreach($detail as $pr_hit) :
                                            echo $pr_hit."<br>";
                                        endforeach;
                                    else:
                                        echo "$detail";
                                    endif;
                                endforeach;
                            else:
                                echo $value;
                            endif;
                            echo "</td>";
                        endforeach;
                        echo "</tr>";
                    endforeach;
                ?>
        </tbody>

        <!-- Reviews data -->
        <thead>
            <th colspan="9" bgcolor="grey">
                Reviews data
            </th>
        </thead>
        <thead>
            <?php foreach ($rev_data[0] as $key=>$value): ?>
                <th>
                    <?php echo $key; ?>
                </th>
            <?php endforeach; ?>
        </thead>
        <tbody>
                <?php 
                    foreach ($rev_data as $entry) :
                        echo "<tr>";
                        foreach ($entry as $key=>$value) :
                            echo "<td>";
                            if (count((array)$value)>1) :
                                foreach ($value as $detail) :
                                    if (count((array)$detail)>1) :
                                        foreach($detail as $pr_hit) :
                                            echo $pr_hit."<br>";
                                        endforeach;
                                    else:
                                        echo "$detail";
                                    endif;
                                endforeach;
                            else:
                                echo $value;
                            endif;
                            echo "</td>";
                        endforeach;
                        echo "</tr>";
                    endforeach;
                ?>
        </tbody>
    </table>
</body>
</html>