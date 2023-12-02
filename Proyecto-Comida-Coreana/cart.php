

<?php 
    require_once '../database.php';

    $specifications = [];
    
    var_dump($_COOKIE);
// Era por post
    if(isset($_COOKIE['dishes']) && $_COOKIE['dishes'] !== null) {
        $data = json_decode($_COOKIE['dishes'], true);
        $specifications = is_array($data) ? $data : [];
    }

    $dishPrice = isset($_COOKIE['dish_price']) ? $_COOKIE['dish_price'] : 0;
    $dishName = isset($_COOKIE['dish_name']) ? $_COOKIE['dish_name'] : '';
    $amount = isset($_COOKIE['amount']) ? $_COOKIE['amount'] : 0;
    $totalPrice = isset($_COOKIE['total_price']) ? $_COOKIE['total_price'] : 0;  
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
        //    var_dump($specifications);
           if (!empty($specifications)) {
                echo "<table>2";
                    echo "<tr class='specifications-for-cart'>";
                        echo "<td class='dish-specification-title'>Dish</td>";
                        echo "<td class='dish-specification-title'>Date</td>";
                        echo "<td class='dish-specification-title'>Amount</td>";
                        echo "<td class='dish-specification-title'>Price</td>";
                    echo "</tr>";                
            
                    foreach ($specifications as $index=>$specific){
                        $amount = isset($specific["amount"]) ? $specific["amount"] : 0;
                            $subtotal_dish = ($specific["amount"] * $specific["price"]);
                            $data = $database->select("tb_dish","*",["id_dish" => $specific["id"]]);
                            echo "<tr><td></td></tr>";
                            echo "<tr class='specifications-for-cart'>"
                                    ."<td >".$data[0]["dish_name"]."</td>"
                                    ."<td>".$specific["amount"]."</td>"
                                    ."<td>".$specific["price"]."</td>"
                                    ."<td> $".$subtotal_dish."</td>"
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