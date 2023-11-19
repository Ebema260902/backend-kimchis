<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    // tb_dishes and tb_categories JOIN
    $dish = $database->select("tb_dish", [
        "[>]tb_categories" => ["id_category" => "id_category"],
        "[>]tb_number_of_people" => ["id_number_of_people" => "id_number_of_people"]
    ], [
        "tb_dish.id_dish",
        "tb_dish.dish_name",
        "tb_dish.dish_description",
        "tb_dish.dish_image",
        "tb_dish.dish_price",
        "tb_dish.featured_dish",
        "tb_categories.id_category",
        "tb_categories.name_category",
        "tb_number_of_people.id_number_of_people",
        "tb_number_of_people.name_group_size"
    ], [
        "id_dish"=>$_GET["id"]
    ]);

    $url_params = "?id=".$dish[0]["id_dish"];
    // var_dump($dish);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish</title>
    <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" crossorigin>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@900&family=Roboto:wght@400;500&family=Inter:wght@400;800&display=swap" rel="stylesheet">
    <!-- google fonts -->
    <link rel="stylesheet" href="./css/main.css">
</head>

<body>
    <!-- <div class="main-container-dish"> -->
        <header class="hero-container">
            
            <nav class="top-nav">
                <div>
                    <a class="logo-image" href="./Homepage.php"><img src="./imgs/imgsproyect/Logo Kimchis 1imgs2.png" alt="kimchis logo"></a>
                </div>
                <a class="name-kimchis" href="./Homepage.php">KIMCHIS</a>
                <section class="checkbox-container">
                    <span class="en">English</span>
                    <input type="checkbox" class="check">
                    <span class="co">Korean</span>
                    <script src="js/01.js"></script>
                </section>  
            </nav>
        
            
            <header class="hero-container-dish">

            <div class="dish-container">
            <?php 
                // echo "<div class='dish-container'>";
                        
                    echo "<h1 class='name-dish'>".$dish[0]["dish_name"]."</h1>";
                    echo "<div class='dish-container-space'>";
                        echo "<img class='dish-image-space' src='./imgs/".$dish[0]["dish_image"]."' alt='".$dish[0]["dish_name"]."'>";
                    echo "</div>";
                    echo "<span class='individual-dish-price'>$".$dish[0]["dish_price"]."</span>";
                    echo "<p class='text-individual-dish'>".$dish[0]["dish_description"]."</p>";
                    echo "<div class='individual-dish-logos'>";
                    if ($dish[0]["id_number_of_people"] == 1) {
                        echo "<img src='./imgs/imgsproyect/familiar-logo.png' alt='familiar-logo'>";
                    } elseif ($dish[0]["id_number_of_people"] == 2) {
                        echo "<img src='./imgs/imgsproyect/individual-logo.png' alt='individual-logo'>";
                    } elseif ($dish[0]["id_number_of_people"]== 3) {
                        echo "<img src='./imgs/imgsproyect/couple-logo.png' alt='couple-logo'>";
                    } else {
                        echo "Tipo de imágen desconocido";
                    }
                        echo "<img src='./imgs/imgsproyect/tray-logo.png' alt='dish-space'>";
                        echo "<img src='./imgs/imgsproyect/heart-logo.png' alt='dish-space'>";
                        echo "</div>";
                        echo "<a href='./Homepage.php''><img class='arrow-back' src='./imgs/imgsproyect/arrowback.png' alt='arrowback'></a>";
                    echo "<div  class='features-text'>";
                    if ($dish[0]["id_number_of_people"] == 1) {
                        echo "<h2>Familiar</h2>";
                    } elseif ($dish[0]["id_number_of_people"] == 2) {
                        echo "<h2>Individual</h2>";
                    } elseif ($dish[0]["id_number_of_people"]== 3) {
                        echo "<h2>Couple</h2>";
                    } else {
                        echo "...";
                    }
                    echo "<h2>Main Course</h2>";
                    echo "<h2>Featured</h2>";
                    echo "</div>";

                echo "</div>";
            ?>
    
            </header>

            <!--RELATED DISHES-->
            <h2 class="related-dishes-title">Related dishes</h2>

                <div class="green-circle"></div>

            <div>
                <section class="featured-dishes-container">
                    <div class="dishes-container-related">
                        <!--Haemulpajeon-->
                        <section class="dish">
                            <h3 class="dish-title">Haemulpajeon</h3>
                            <div class="dish-thumb">
                                <img class="dish-image" src="./imgs/imgsproyect/Haemulpajeonimgs.jpg" alt="">
                                <span class="dish-price">$6</span>
                            </div>
                            <p class="dish-text">Seafood and vegetable<br>pancake, crispy on the outside<br>and tender inside. Served with<br>dipping sauce.</p>
                            <div class="featured-dishes-buttons">
                                <a class="btn-cart" href="#"></a>
                                <a class="btn-info" href="#"></a>
                            </div>
                        </section>

                        <!--Bulgogi-->
                        <section class="dish">
                            <h3 class="dish-title">Bulgogi</h3>
                            <div class="dish-thumb">
                                <img class="dish-image" src="./imgs/imgsproyect/Bulgogiimgs.jpg" alt="">
                                <span class="dish-price">$12</span>
                            </div>
                            <p class="dish-text">Marinated beef, grilled to<br>perfection. With hints of soy<br>sauce, garlic, and sugar in the<br>marinade.</p>
                            <div class="featured-dishes-buttons">
                                <a class="btn-cart" href="#"></a>
                                <a class="btn-info" href="#"></a>
                            </div>
                        </section>

                        <!--Tteokbokki-->
                        <section class="dish">
                            <h3 class="dish-title">Tteokbokki</h3>
                            <div class="dish-thumb">
                                <img class="dish-image" src="./imgs/imgsproyect/Tteokbokki.png" alt="">
                                <span class="dish-price">$8</span>
                            </div>
                            <p class="dish-text">Chewy rice cakes cooked in<br>gochujang sauce,<br>accompanied by fish cakes<br>and scallions.</p>
                            <div class="featured-dishes-buttons">
                                <a class="btn-cart read-btn" href="#"></a>
                                <a class="btn-info read-btn" href="#"></a>
                            </div>
                        </section>

                        <!--Kimbap-->
                        <section class="dish">
                            <h3 class="dish-title">Kimbap</h3>
                            <div class="dish-thumb">
                                <img class="dish-image" src="./imgs/imgsproyect/Kimbapimgs.jpg" alt="">
                                <span class="dish-price">$15</span>
                            </div>
                            <p class="dish-text">Rice roll wrapped and filled<br>with vegetables, pickled<br>radish, cooked egg and meat.</p>
                            <div class="featured-dishes-buttons">
                                <a class="btn-cart read-btn" href="#"></a>
                                <a class="btn-info read-btn" href="#"></a>
                            </div>
                        </section>
                    </div>
                </section>
            </div>



            <!-- footer -->
            <footer class="footer-container">
                <div class="footer-content">
                    <section>
                        <h3 class="footer-title">Discover the Essence of<br>Korean Cuisine</h3>
                        <p class="footer-text">At Kimchis, we have an array of delightful dishes that 
                            capture <br> the essence of Korean cuisine. 
                            Our mission is to share the <br> richness of Korean 
                            flavors and traditions.</p>
                    </section>
                    <div class="footer-links">

                        <!--Get to Know Us-->
                        <section>
                            <h3>Get to Know Us</h3>
                            <ul class="nav-footer-list">
                                <li> <a class="nav-footer-link" href="#">About Us</a> </li>
                                <li> <a class="nav-footer-link" href="#">Policies</a> </li>
                                <li> <a class="nav-footer-link" href="#">Accessibility</a> </li>
                                <li> <a class="nav-footer-link" href="#">Address</a> </li>
                                <li> <a class="nav-footer-link" href="#">Reservations</a> </li>
                            </ul>
                        </section>


                        <!--Let Us Help You-->
                        <section>
                            <h3>Let Us Help You</h3>
                            <ul class="nav-footer-list">
                                <li> <a class="nav-footer-link" href="#">Your Account</a> </li>
                                <li> <a class="nav-footer-link" href="#">Complains</a> </li>
                                <li> <a class="nav-footer-link" href="#">Contact Us</a> </li>
                                <li> <a class="nav-footer-link" href="#">Help Center</a> </li>
                                <li> <a class="nav-footer-link" href="#">Submit Feedback</a> </li>
                            </ul>
                        </section>
                    </div>
                </div>
                <section class="download-app">
                    <h3>Get the App</h3>
                    <div class="cta-app-container">
                        <a href="#"><img src="./imgs/apple.png" alt="Our app from App Store"></a>
                        <a href="#"><img src="./imgs/googleplay.png" alt="Our app from Google play"></a>
                    </div>
                </section>
                <p class="footer-legal" >&copy; 2023. All rights reserved.</p>
            </footer>
            <!--footer-->
        <!-- </div> End main-container -->
        
</body>
</html>