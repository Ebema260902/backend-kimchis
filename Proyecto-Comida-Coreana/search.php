<?php
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    $dishes = $database->select("tb_dish","*");



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
    <?php 
        include "./parts/header-homepage.php";
    ?>
    <main>
        <section>
            <img  class="search-img" src="./imgs/imgsproyect/search-img.png" alt="Explore Our Menu">
            <h2 class="destinations-title">Explore Our Menu</h2>
            


        </section>

    </main>
    <?php 
        include "./parts/footer-homepage.php";
    ?>
</body>
</html>
