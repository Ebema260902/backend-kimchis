
<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    // tb_dishes and tb_categories JOIN
    $dishes = $database->select("tb_dish", [
        "[>]tb_categories" => ["id_category" => "id_category"]
    ], [
        // 
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
                </ul>

                <ul class="nav-list-login-btn">
                    <li><a class="btn-login nav-list-link" href="#">Login</a></li>
                    <li><a class="btn-sign-up nav-list-link" href="#">Sign Up</a></li>
                </ul>
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
                <div class="dishes-container">
                    <!--Kimchi-->
                    
                    <section class="dish">
                        <h3 class="dish-title">Kimchi</h3> 
                        <div class="dish-thumb">
                            <img class="dish-image" src="./imgs/imgsproyect/Kimchi 1imgs.jpg" alt="">
                            <span class="dish-price">$6</span>
                        </div>
                    
                        <p class="dish-text">Spicy and fermented cabbage <br> dish, seasoned with a blend of <br> red pepper flakes, garlic, ginger,<br>and other seasonings</p>
                        <div>
                            <a class="btn-cart" href="#"></a>
                            <a class="btn-info" href="./Dish.php"></a>
                        </div>
                    </section>
                

                    <!--Bibimbap-->
                    <section class="dish">
                        <h3 class="dish-title">Bibimbap</h3>
                        <div class="dish-thumb">
                            <img class="dish-image" src="./imgs/imgsproyect/Bibimbapimgs.jpg" alt="">
                            <span class="dish-price">$10</span>
                        </div>
                        <p class="dish-text">Vegetables, protein (beef or <br>tofu), fried egg, steamed rice.<br>Include gochujang sauce and garnished with sesame seeds.</p>
                        <div class="featured-dishes-buttons">
                            <a class="btn-cart" href="#"></a>
                            <a class="btn-info" href="#"></a>
                        </div>
                    </section>

                    <!--Korean barbecue-->
                    <section class="dish">
                        <h3 class="dish-title">Korean barbecue</h3>
                        <div class="dish-thumb">
                            <img class="dish-image" src="./imgs/imgsproyect/Krean Barbecueimgs.jpg" alt="">
                            <span class="dish-price">$25</span>
                        </div>
                        <p class="dish-text">Marinated meat. Served with<br>sauces and accompanied by<br>lettuce leaves and other<br>condiments.</p>
                        <div class="featured-dishes-buttons">
                            <a class="btn-cart" href="#"></a>
                            <a class="btn-info" href="#"></a>
                        </div>
                    </section>

                    <!--Galbitang-->
                    <section class="dish">
                        <h3 class="dish-title">Galbitang</h3>
                        <div class="dish-thumb">
                            <img class="dish-image" src="./imgs/imgsproyect/Golbitangimgs.jpg" alt="">
                            <span class="dish-price">$8</span>
                        </div>
                        <p class="dish-text">Beef ribs with spices, ginger,<br>and garlic. Served with rice<br>noodles, crisp vegetables, and<br>a touch of egg.</p>
                        <div class="featured-dishes-buttons">
                            <a class="btn-cart" href="#"></a>
                            <a class="btn-info" href="#"></a>
                        </div>
                    </section>
                </div>
                <!-- Row 1 FINISHES -->


                <!--Row 2 STARTS-->
                <div class="dishes-container">
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
                 <!-- Row 2 FINISHES -->


                <!-- Row 3 STARTS -->
                <div class="dishes-container">
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

                    
                        <!--Empty Container 1-->
                    <section class="dish">
                    </section>
                    
                    <!--Empty Container 1-->
                    <section class="dish">
                    </section>
                
                </div>
                <!-- Row 3 FINISHES -->




            <div class="bowl-container">
                <img class="bowl-img" src="../Proyecto-Comida-Coreana/imgs/imgsproyect/Bowl Imágenimgs2.png" alt="Decorative Bowl">
            </div>
            </section>
            <!--row 3-->

        </main>

        <?php 
            include "./parts/footer-homepage.php";
        ?>
        
    
</body>

</html>