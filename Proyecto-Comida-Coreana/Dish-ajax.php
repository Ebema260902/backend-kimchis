<?php 
    require_once '../database.php';
    // Reference: https://medoo.in/api/select
    // tb_dishes and tb_categories JOIN
    


    
    if($_GET){
        $dish = $database->select("tb_dish", [
            "[>]tb_categories" => ["id_category" => "id_category"],
            "[>]tb_number_of_people" => ["id_number_of_people" => "id_number_of_people"]
            
        ], [
            "tb_dish.id_dish",
            "tb_dish.dish_name",
            "tb_dish.dish_name_ko",
            "tb_dish.dish_description",
            "tb_dish.dish_description_ko",
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
    }

    // var_dump($dish);

    $url_params = "?id=".$dish[0]["id_dish"];

    // RELATED DISHES
    $currentCategory = $dish[0]["id_category"];

    $relatedDishes = $database->select("tb_dish", [
        "[>]tb_categories" => ["id_category" => "id_category"],
        "[>]tb_number_of_people" => ["id_number_of_people" => "id_number_of_people"],
        
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
        "tb_dish.id_category" => $currentCategory,
        "LIMIT" => 4,
        "tb_dish.id_dish[!]" => $_GET["id"],
    ]);

    // var_dump($currentCategory);
    

   
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
                <!-- <section class="checkbox-container">
                    <span class="en">English</span>
                    <input type="checkbox" class="check">
                    <span class="co">Korean</span>
                    <script src="js/01.js"></script>
                </section>   -->
            </nav>
        
            
            <header class="hero-container-dish">

            <div class="dish-container">
            <?php 
                    echo "<span id='lang' class='lang-btn' onclick='getTranslation(".$dish[0] ["id_dish"].")'>KO</span>";     
                    echo "<h1 id='dish-name' class='name-dish'>".$dish[0]["dish_name"]."</h1>";
                    echo "<div class='dish-container-space'>";
                        echo "<img class='dish-image-space' src='./imgs/".$dish[0]["dish_image"]."' alt='".$dish[0]["dish_name"]."'>";
                    echo "</div>";
                    echo "<span class='individual-dish-price'>$".$dish[0]["dish_price"]."</span>";
                    echo "<p id='dish-description' class='text-individual-dish'>".$dish[0]["dish_description"]."</p>";
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

                    if($dish[0]["id_category"] == 1){
                        echo "<h2>Main Course</h2>";
                    }elseif($dish[0]["id_category"] == 2){
                        echo "<h2>Appetizer</h2>";
                    }elseif($dish[0]["id_category"] == 3){
                        echo "<h2>Dessert</h2>";
                    }elseif($dish[0]["id_category"] == 4){
                        echo "<h2>Beverage</h2>";
                    }

                    if (!empty($dish) && is_array($dish) && isset($dish[0]["featured_dish"])) {
                        if($dish[0]["featured_dish"] === 1){
                            echo "<h2>Featured</h2>";
                        }elseif($dish[0]["featured_dish"] === 2){
                            echo "<h2>Not featured</h2>";
                        }else{
                            echo "<h2>Undefined</h2>";
                        }
                    }else{
                        echo "<h2>Not Founded</h2>";
                    }

                    echo "<a class='order-now' href='./specifications.php?id=".$dish[0]["id_dish"]."'>Order Now</a>";

                    echo "</div>";

                echo "</div>"; 
            ?>
    
            </header>

            <!--RELATED DISHES-->
            <h2 class="related-dishes-title">Related dishes</h2>

            <div class="green-circle"></div>


            <div>
                <div>
    <section class='featured-dishes-container'>
        <div class='dishes-container-related'>

        <?php 
            // Verify if there are at least 4 elements in $relatedDishes
            $relatedDishesCount = count($relatedDishes);
            $numberContainers = 4;

            for ($i = 0; $i < $numberContainers; $i++) {
             
                if ($i < $relatedDishesCount) {
                    $relatedDish = $relatedDishes[$i];
                    echo "<section class='dish'>";
                    
                        echo "<h3 class='dish-title'>" . $relatedDish["dish_name"] . "</h3>";
                        echo "<div class='dish-thumb'>";
                            echo "<img class='dish-image' src='./imgs/" . $relatedDish["dish_image"] . "' alt=''>";
                            echo "<span class='dish-price'>$" . $relatedDish["dish_price"] . "</span>";
                        echo "</div>";
                        echo "<p class='dish-text'>" . substr($relatedDish["dish_description"], 0, 90) . "</p>";                       
                        echo "<div class='featured-dishes-buttons'>";
                            echo "<a class='btn-cart' href='#'></a>";
                            echo "<a class='btn-info' href='./Dish.php?id=".$relatedDish["id_dish"]."'></a>";
                        echo "</div>";
                    echo "</section>";
                } else {
                    echo "<section class='dish empty-dish'>";
                        echo "<p class='empty-message'>Oops! There are no dishes here at the moment.</p>";
                    echo "</section>";
                }
            }
        ?>

                        </div>
                    </section>
                </div>

            </section>
        </div>



            <?php 
                include "./parts/footer-homepage.php";
            ?>
        <!-- </div> End main-container -->

        <script>

            let requestLang = "ko";

            function switchLang(){
                if(requestLang == "en") requestLang = "ko";
                else requestLang = "en";
                document.getElementById("lang").innerText = requestLang;
            }

            function getTranslation(id){
                console.log(id); 

                let info = {
                    id_dish: id,
                    language: requestLang 
                };

                //fetch
                fetch("http://localhost/backend-kimchis/Proyecto-Comida-Coreana/language.php", {
                    method: "POST",
                    mode: "same-origin",
                    credentials: "same-origin",
                    headers: {
                        'Accept': "application/json, text/plain, /",
                        'Content-Type': "application/json"
                    },
                    body: JSON.stringify(info)
                })
                .then(response => response.json())
                .then(data => {
                    //console.log(data);
                    switchLang();
                    document.getElementById("dish-name").innerHTML = data.name;
                    document.getElementById("dish-description").innerHTML = data.description;
                })
                .catch(err => console.log("error: " + err));
            }
    </script>
        
</body>
</html>