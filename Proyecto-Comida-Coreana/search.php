<?php
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    $dishes = $database->select("tb_dish","*");

    // Reference: https://medoo.in/api/select
    $peoples = $database->select("tb_number_of_people","*");

    // Reference: https://medoo.in/api/select
    $categories = $database->select("tb_categories","*");
    
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
        <section>
            <img  class="search-img" src="./imgs/imgsproyect/search-img.png" alt="Explore Our Menu">
            <h2 class="search-title">Explore Our Menu</h2>
            <section class="search-container">
            
            <div class="container-dish">
          
                <form method = "get" action="results.php">
          
                    <select name="number_people" id="number_people" class="filter">
                    <?php 
                        foreach($peoples as $people){
                            echo "<option value='".$people["id_number_of_people"]."'>".$people["name_group_size"]."</option>";
                        }
                    ?>
                    </select>

                    <select name="dish_category" id="dish_category" class="filter">
                    <?php 
                        foreach($categories as $category){
                            echo "<option value='".$category["id_category"]."'>".$category["name_category"]."</option>";
                        }
                    ?>
                    </select>

                    <input type="submit" class="btnn btn-search" value="SEARCH DISH">
                </form>
                
            </div>


        </section>


        </section>

    </main>
    <?php 
        include "./parts/footer-homepage.php";
    ?>
</body>
</html>
