<?php
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    
    if(isset ($_GET)){

        /*$items = $database->select("tb_destinations","",[
            "destination_lname[~]" => $_GET["keyword"]
        ]);*/
        //["destination_state"] ["destination_category"]

        $dishes = $database->select("tb_dish","*",[
            "AND" =>[
                "id_number_of_people" => $_GET["number_people"],
                "id_category" => $_GET["dish_category"]
            ]
            
        ]);

        $people = $database->select("tb_number_of_people","*",[
            "id_number_of_people" => $_GET["number_people"]
        ]);

        $category = $database->select("tb_categories","*",[
            "id_category" => $_GET["dish_category"]
        ]);

    }else{
        echo "not found";
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camping Website</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    
    <main>

    <header>
        <nav class="top-nav">

            <a class="logo" href="./Homepage.html"><img src="./imgs/imgsMenu/Logo Kimchis 1imgs2.png" alt="Kimchis logo"><span>KIMCHIS</span> </a>

            <ul class="nav-list">
                <li><a class="nav-list-link" href="./Homepage.php">Homepage</a></li>
                <li><a class="nav-list-link" href="./Menu.php">Menu</a></li>
                <li><a class="nav-list-link" href="./forms.php">Login</a></li>
            </ul>

        </nav>
        <section class="landing-page">

                <img class="img-container" src="./imgs/imgsMenu/ComidaInicio.jpg" alt="Menú"><span class="txt-container">김치</span>
                <div class="rectangle">
                    <h1>SEARCH</h1>
                </div>
        </section>
    </header>
        
        <section class="search-container">
            <img  class="img-search" src="./imgs/imgsproyect/search-img.png" alt="Explore Our Menu">
            <h2 class="destinations-title">Explore Our Menu</h2>
            <?php 
                if(count($dishes) > 0){
                    echo "<p class='result-text'>We found: <span class= 'result-title'>".count($dishes)." </span> dish(es) in <span class= 'result-title'>".$category[0]["name_category"]." </span> </p>";
                }
            ?>
            <div class="dishes-container">
          
                <?php
                    if(count($dishes) > 0){

                        foreach($dishes as $dish){
                            echo "<section class='dish-principal'>";
                                echo "<div class='dish-thumb'>";
                                    echo "<img class='result-image' src='./imgs/".$dish["dish_image"]."' alt='".$dish["dish_name"]."'>";
                                echo "</div>";
                                echo "<h3 class='result-title'>".$dish["dish_name"]."</h3>";
                                echo "<p class='result-text'>".substr($dish["dish_description"], 0, 70)."...</p>";
                                echo "<a class='btn-result' href='./Dish.php?id=".$dish["id_dish"]."'></a>";
                            echo "</section>";
                        }
                        
                    }else{
                        echo "<h3 class='result-title'>No results for ".$category[0]["name_category"]."</h3>";
                    }
                    
                ?>
                
            </div>

            <!-- view all -->
            <div class="cta-container">
                <a href="search.php" class="btn view-all-btn">Search more dishes</a>
            </div>
            <!-- view all -->

        </section>
    </main>
    <?php 
        include "./parts/footer-homepage.php";
    ?>
</body>
</html>