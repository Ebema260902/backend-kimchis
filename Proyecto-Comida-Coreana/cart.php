
<?php 
    require_once '../database.php';

    $specifications = [];

    if($_POST){ 
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
            "id_dish"=>$_POST["id-dish"]
        ]);
        
    }
    
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
                    <a class="logo-image" href="#"><img src="./imgs/imgsproyect/Logo Kimchis 1imgs2.png" alt="Kimchis logo"></a>
                </div>
                    <a class="name-kimchis" href="./Homepage.php">KIMCHIS</a>
                
                <ul class="nav-list">
                    <li><a class="nav-list-link" href="./Menu.php">Menu</a></li>
                    <li><a class="nav-list-link" href="./Menu.php">Reservations</a></li>
                    <li><a class="nav-list-link" href="./forms.php">Login</a></li>
                    <li><a class="nav-list-link" href="#">Sign Up</a></li>
                </ul>
            </nav>

        <main>

        <h2 class="dishes-title-cart">Review your cart</h2>
        
        <section class="dishes-container-cart">
            
        <?php 
            $data = json_decode($_COOKIE['dishes'], true);
        
            $specifications = $data;
            var_dump($specifications);
        ?>

           <?php
        //    var_dump($specifications);
           if (!empty($specifications)) {
                echo "<table>2";
                    echo "<tr class='specifications-for-cart'>";
                        echo "<td class='dish-specification-title'>Dish</td>";
                        echo "<td class='dish-specification-title'>Amount</td>";
                        echo "<td class='dish-specification-title'>Price</td>";
                        echo "<td class='dish-specification-title'>Totalprice</td>";
                    echo "</tr>";                
            
                    
                    foreach ($specifications as $index=>$specific){

                            // $data = $database->select("tb_dish","*",["id_dish" => $specific["id-dish"]]);
                            // var_dump($specific);
                            // $dish_total_cost = ($specifications["confirmation-amount"] * $dish[0]["dish_price"]);
                            echo "<tr><td></td></tr>";
                            echo "<tr class='specifications-for-cart'>"
                                    ."<td class='dish-specification-title'>".$specific["dish_name"]."</td>"
                                    ."<td class='dish-specification-title'>".$specific["dish_price"]."</td>"
                                    ."<td class='dish-specification-title'>".$specific["dish_price"]."</td>"
                                    ."<td class='dish-specification-title'> $".$specific["dish_price"]."</td>"
                                ."</tr>";    
                    }
                    echo "</table>"; 
                }else{
                    echo "<p class='empty-cart'>Your cart is empty.</p>";

                }
                ?>

            <div>
                <div><a class="btn-finish" href='cart.php'>Finish order</a></div>
            </div>

        </section>

    </main>
           
 </header>

        <?php 
            include "./parts/footer-homepage.php";
        ?>
</body>
</html>