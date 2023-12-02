
<?php
    require_once '../database.php';

    $amount = 1;
    

    if($_GET){
       
        
        // Reference: https://medoo.in/api/select
        $dish = $database->select("tb_dish",[
            "[>]tb_categories"=>["id_category" => "id_category"],
            "[>]tb_number_of_people"=>["id_number_of_people" => "id_number_of_people"]
        ],[
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
        ],[
            "id_dish"=>$_GET["id"]
        ]);



        

        if ($_GET && !isset($_COOKIE['dishes']))  {

            $dish = $database->select("tb_dish",[
                "[>]tb_categories"=>["id_category" => "id_category"],
                "[>]tb_number_of_people"=>["id_number_of_people" => "id_number_of_people"]
            ],[
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
            ],[
                "id_dish"=>$_GET["id"]
            ]);
     
        
            $dishPrice = $dish[0]['dish_price'];
            $dishName = $dish[0]['dish_name']; 
             

            $dishInfo = [
                "id" => $dish[0]["id_dish"],
                "name" => $dish[0]["dish_name"],
                "price" => $dish[0]["dish_price"],
            ];
            $currentDishes = isset($_COOKIE['dishes']) ? json_decode($_COOKIE['dishes'], true) : [];

            $currentDishes[] = $dishInfo;

            setcookie('dishes', json_encode([$dishInfo]), time() + 3600, '/');

            setcookie('dish_price', $dishPrice, time() + 3600, '/');
            setcookie('dish_name', $dishName, time() + 3600, '/');
            setcookie('amount', 0, time() + 3600, '/');
            setcookie('total_price', 0, time() + 3600, '/');


            if (isset($_COOKIE['dishes'])) {
                header('Location: cart.php');
                exit();
            }
        }
 

        // Reference: https://medoo.in/api/select
    
    }
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

        <?php 
            // include "./parts/header-homepage.php";
        ?>


        
        <main class="main-container-dish">
            
            <!-- INFORMATAION CONTAINER -->
            <div class="container-wrapper">
                <div class="container-dish-elements">

                <?php 
                    echo "<div >";
                        echo "<img class='dish-image-space' src='./imgs/".$dish[0]["dish_image"]."' alt='".$dish[0]["dish_name"]."'>";
                    echo "</div>";
                    echo "<div class='individual-dish-logos-specifications'>";
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
                    echo "<div class='features-text-specifications'>";
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

                    echo "<a class='order-now' href='./specifications.php?id=".$dish[0]["id_dish"]."'>ORDER NOW</a>";

                    echo "</div>";

                    echo "<h1 class='element-dish-name'>".$dish[0]["dish_name"]."</h1>";
                    echo "<h2 class='element-price'>$".$dish[0]["dish_price"]."</h2>";
                    echo "<p class='description-dish'>".$dish[0]["dish_description"]."</p>";
                echo "</div>";

                ?>
            


                <!-- SEPECIFICATIONS -->
                <div class="overlay" id="overlay" style="display: none;"></div>
                    <div id="containerSpecifications" class="container-specifications">

                        <div>
                            <h1 class="text-specifications">Specifications</h1>
                        </div>

                        <?php 
                            echo "<section>";

                                echo "<div class='order-items-specifications'>";
                                    echo "<div>";
                                        echo "<label class='label-amount' step='1' for='order'>Amount</label>";
                                    echo "</div>";
                                    echo "<div>";
                                        echo "<input class='input-amount' name='order' type='number' oninput='updateSubtotal(this)' step='1' value='0' min='0' max='50'>";
                                    echo "</div>";
                                    echo "<div>";
                                        echo "<p type='number' id='amount-subtotal' value='0' min='0' max='50'>$0</p>";  
                                    echo "</div>";
                                echo "</div>";


                                echo "<div class='order-items-specifications'>";
                                    echo "<div>";
                                        echo "<label class='label-suace' step='1' for='sauce'>Date:</label>";
                                    echo "</div>";
                                    echo "<div>";
                                    echo "<label class='label-suace' step='1' for='sauce'>27/11/2013</label>";
                                    echo "</div>";
                                echo "</div>";

                            echo "</section>";

                            // LINE DIV
                            echo "<div>";
                                echo "<img class='line-div' src='../Proyecto-Comida-Coreana/imgs/imgsproyect/line-div.png' alt=''>";
                            echo "</div>";


                            echo "<section>";
                                echo "<div>";
                                    echo "<h1 class='text-subtitles'>Total:</h2>";
                                    echo "<h2 id='confirmation-total-price' class='total-price'>0$</h2>";
                                echo "</div>";
                            echo "</section>";
                            
                        ?>


                        <div class="btn-container">
                            <a id="nextButton" class="btn-add-to-cart" href="#" onclick="next()">Next</a>
                        </div>

                    </div>
                </div>

            </div>


            <!-- YOUR DISH -->

            <div id="containerIllustrative" class="container-illustrative" style="display: none;">
                <div>
                    <h1 class="text-your-dish">Your dish</h1>
                </div>
                

                <?php 
                // LINE DIV
                echo "<div>";
                    echo "<img class='line-div' src='../Proyecto-Comida-Coreana/imgs/imgsproyect/line-div.png' alt=''>";
                echo "</div>";

                    echo "<section class='containier-items-confirmation'>";
                        echo "<p>Dish</p>";
                        echo "<p>Amount</p>";
                        echo "<p>Total price</p>";
                    echo "</section>";
                    

                // LINE DIV
                echo "<div>";
                    echo "<img class='line-div' src='../Proyecto-Comida-Coreana/imgs/imgsproyect/line-div.png' alt=''>";
                echo "</div>";

                    echo "<section class='containier-items-confirmation'>";
                        echo "<p class='text-last-order'>".$dish[0]['dish_name']."</p>";
                        echo "<p id='confirmation-amount'>0</p>";
                        echo "<p id='confirmation-total-price-last'>0$</p>";
                    echo "</section>";
                ?>

                <div class="btn-container-confirm">
                    <a id="confirmButton" class="btn-confirm-2" href="./cart.php?id=<?php echo $dish[0]["id_dish"]; ?>" style="pointer-events: none;">Confirm</a>
                    <a id="addDishesButton" class="btn-add-dishes" href="./Menu.php?id=<?php echo $dish[0]["id_dish"]; ?>" style="pointer-events: none;">Add more dishes</a> 
                </div>

            </div>

            <div class="bowl-container">
                <img class="bowl-img" src="../Proyecto-Comida-Coreana/imgs/imgsproyect/Bowl Imágenimgs2.png" alt="Decorative Bowl">
            </div>
            </section>
         

            <!-- footer -->
            <?php 
                include "./parts/footer-homepage.php";
            ?>
            <!--footer-->

        </main>
    </div>

    

    <script>

        var nextButtonClicked = false;

        function updateSubtotal(input) {
            console.log('Input value:', input.value);
            var amount = input.value;
            var dishPrice = <?php echo $dishPrice; ?>;
            var subtotal = amount * dishPrice;

            document.getElementById('amount-subtotal').textContent = '$' + subtotal;
            document.getElementById('confirmation-amount').textContent = amount;

            var totalPrice = amount * dishPrice;
            document.getElementById('confirmation-total-price').textContent = '$' + totalPrice;
            document.getElementById('confirmation-total-price-last').textContent = '$' + totalPrice;

            // COOKIES
            document.cookie = 'amount=' + amount + '; path=/';
            document.cookie = 'total_price=' + totalPrice + '; path=/';
            
        }

        function next() {
      
        if (!nextButtonClicked) {
            nextButtonClicked = true;

          
            document.getElementById('confirmButton').style.pointerEvents = 'auto';
            document.getElementById('addDishesButton').style.pointerEvents = 'auto';

            // document.getElementById('mainContainer').classList.add('disabled-container');

            document.getElementById('containerIllustrative').style.display = 'block';
        }

        
    }

    </script>


    
</body>

</html>