
<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    // tb_dishes and tb_categories JOIN
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
    //], [
        //where to show featured dishes only
        //"tb_dishes.featured" => 1 
    ]);

    // var_dump($dishes);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Korean cuisine</title>
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&family=Inter:wght@400;800&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <div class="main-container">

        <!--HEADER -->
        <header class="hero-container">
            <nav class="top-nav">
                <div>
                    <a class="logo-image" href="#"><img src="./imgs/imgsproyect/Logo Kimchis 1imgs2.png" alt="Kimchis logo"></a>
                </div>
                    <a class="name-kimchis" href="./Homepage.php">KIMCHIS</a>
                
                <ul class="nav-list">
                    <li><a class="nav-list-link" href="./Menu.php">Menu</a></li>
                    <li><a class="nav-list-link" href="./Menu.php">Reservations</a></li>
                    <?php 
                        session_start();
                        if(isset($_SESSION["isLoggedIn"])){
                            echo "<li><a class='nav-list-link' href='profile.php'>".$_SESSION["fullname"]."</a></li>";
                            echo "<li><a class='nav-list-link' href='logout.php'>Logout</a></li>";
                        }else{
                            echo "<li><a class='nav-list-link' href='./forms.php'>Login</a></li>";
                        }
                     ?>
                </ul>

                <!-- <ul class="nav-list-login-btn">
                    <li><a class="btn-login nav-list-link" href="#">Login</a></li>
                    <li><a class="btn-sign-up nav-list-link" href="#">Sign Up</a></li>
                </ul> -->
            </nav>
            
            <Section>
                <h1 class="hero-title-homepage">Experience <br> Korean <br> Cuisine</h1>
                <div>
                    <p class="hero-text-homepage">Indulge in the vibrant and flavorful world of Korean gastronomy, where each dish is a masterpiece.</p>
                </div>

                <div class="btn-container">
                    <a class="btn-get-started-homepage" href="#">GET STARTED</a>
                </div>
                <div>
                    <img class="image-header-homepage" src="./imgs/imgsproyect/image-main33.jpg" alt="Image-Header-Homepage">
                </div>
            </Section>
        </header>
        <!--HEADER -->


      
        <main>
            <!--Featured dishes-->
            <section class="featured-dishes-container">
                <h2 class="featured-dishes-title">Featured dishes</h2>

                <div class="green-circle"></div>
                
                <!--row 1-->
                <!--  -->

                <?php 
                echo "<div class='dishes-container-php'>";
                $dishesCount = count($dishes);
                $numberContainers = 12;

                for ($i = 0; $i < $numberContainers; $i++) {
                
                    if ($i < $dishesCount) {
                        $dish = $dishes[$i]; 
                            echo "<section class='dish'>";
                                echo "<h3 class='dish-title-php'>".$dish["dish_name"]."</h3>";
                                echo "<div class='dish-thumb'>";
                                    echo "<img class='dish-image' src='./imgs/".$dish["dish_image"]."'alt='".$dish["dish_name"]."'>";
                                echo "</div>";
                                echo "<p class='dish-text-php'>".substr($dish["dish_description"], 0, 90)."...</p>";
                                echo "<div>";
                                    echo "<a class='btn-cart' href='#'></a>";
                                    echo "<a class='btn-info' href='./Dish.php?id=".$dish["id_dish"]."'></a>";
                                echo "</div>";
                            echo "</section>";          
                    }else{
                        echo "<section class='dish empty-dish'>";
                            echo "<p class='empty-message'>Oops! There are no dishes here at the moment.</p>";
                        echo "</section>";
                    }
                }

                ?>

                

        </main>

        <?php 
            include "./parts/footer-homepage.php";
        ?>
        
    
</body>

</html>