

<?php 
    require_once '../database.php';

    $specifications = [];
    
    if($_POST){
        $data = json_decode($_COOKIE['dishes'], true);
        $specifications = is_array($data) ? $data : [];

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
                //var_dump($data);
            ?>
           
                <table class="specifications-for-cart">
                    <tr class='dish-specification-title'>
                        <td>Dish</td>
                        <td>Date</td>
                        <td>Amount</td>
                        <td>Price</td>
                    </tr>
                <?php
            
                    foreach ($specifications as $index=>$specific){
                        $subtotal_dish = ($specific["amount"] * $specific["price"]);
                        $data = $database->select("tb_dish","*",["id_destination" => $booking["id"]]);
                        echo "<tr><td></td></tr>";
                        echo "<tr>"
                                ."<td class='activity-title'>".$data[0]["dish_name"]."</td>"
                                ."<td>".$specific["amount"]."</td>"
                                ."<td>".$specific["price"]."</td>"
                                ."<td> $".$subtotal_dish."</td>"
                            ."</tr>";
                            
                        }
                ?>
                </table> 
           


            <div>
                <div><a class="order-now" href='cart.php'>I'm ready for booking</a></div>
            </div>

        </section>

    </main>
           
 </header>

        <?php 
            include "./parts/footer-homepage.php";
        ?>
</body>
</html>