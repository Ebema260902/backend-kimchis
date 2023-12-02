<?php
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    
    $categories = $database->select("tb_categories","*");
   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menú</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&family=Open+Sans:ital,wght@0,400;0,500;1,400;1,700&family=Raleway:wght@200;300;400;500;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="./css/main.css">

</head>

<body>

    <?php 
            include "./parts/header-menu.php";
        ?>

    <section class="content">
    <?php 
                foreach($categories as $category){
                    
    
                    echo "<h3 class='word-category'>".$category["name_category"]."</h3>";
                    echo "<img class='category-container' src='imgs/imgsMenu/ImgMenu.png' alt='Imagen encabezado' >";
                    
                    
                        //select destinations with the same category id/name
                        $dishes = $database->select("tb_dish", [
                            "[>]tb_categories" => ["id_category" => "id_category"]
                        ], [
                            "tb_dish.id_dish",
                            "tb_dish.dish_name",
                            "tb_dish.dish_description",
                            "tb_dish.dish_image",
                            "tb_dish.dish_price",
                            "tb_dish.featured_dish",
                            "tb_categories.id_category",
                            "tb_categories.name_category" 
                        ],[
                            "tb_dish.id_category" => $category["id_category"]
                        ]);
                        
                        echo "<div class='cards'>";
                        foreach($dishes as $index => $dish){
                            echo "<section class='card'>";
                                echo "<h3 class='title'>".$dish["dish_name"]."</h3>";
                                echo "<p class='description'>".substr($dish["dish_description"], 0, 150)."...</p>";
                            echo "<div>";
                                echo "<span class='price'>$".$dish["dish_price"]."</span>";
                                echo "<a class='button-info' href='./Dish.php?id=".$dish["id_dish"]."'></a>";
                            echo "</div>";
                            echo "</section>";
                        }

                    echo "</div>";
                    echo "</section>";
                }
            ?>

     
    
        <?php 
            include "./parts/footer-homepage.php";
        ?>

</body>
</html>