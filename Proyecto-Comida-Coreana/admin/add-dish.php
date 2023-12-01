<?php 

     require_once '../../database.php';

     
     // Reference: https://medoo.in/api/select
     $categories = $database->select("tb_categories","*");
     $number_of_people = $database->select("tb_number_of_people","*");
     

     

     if($_POST){
        // var_dump($_POST);
        // Reference: https://medoo.in/api/insert
        $database->insert("tb_dish",[
            "id_category"=>$_POST["dish_category"],
            "dish_name"=>$_POST["dish_name"],
            "dish_name_ko"=>$_POST["dish_name_ko"],
            "featured_dish"=>$_POST["featured_dish"],
            "id_number_of_people"=>$_POST["dish_people"],
            "dish_description"=>$_POST["dish_description"],
            "dish_description_ko"=>$_POST["dish_description_ko"],
            "dish_image"=> "dish-placeholder.jpg",
            "dish_price"=>$_POST["dish_price"]

            
        ]);       
        
     }
     var_dump($_POST["featured_dish"]);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Add New Dish</h2>
        <form method="post" action="add-dish.php">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text">
            </div>

            <div class="form-items">
                <label for="dish_name_ko">Dish Name KO</label>
                <input id="dish_name_ko" class="textfield" name="dish_name_ko" type="text">
            </div>

            <div class="form-items">
                <label for="dish_people">Group Size</label>
                <select name="dish_people" id="dish_people">
                    <?php 
                        foreach($number_of_people as $group_size){
                            echo "<option value='".$group_size["id_number_of_people"]."'>".$group_size["name_group_size"]."</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class="form-items">
                <label for="featured_dish">Featured Dish</label>
                <select name="featured_dish" id="featured_dish">
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
            

            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category">
                    <?php 
                        foreach($categories as $category){
                            echo "<option value='".$category["id_category"]."'>".$category["name_category"]."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="form-items">
                <label for="dish_description">Dish Description</label>
                <textarea id="dish_description" name="dish_description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-items">
                <label for="dish_description_ko">Dish Description KO</label>
                <textarea id="dish_description_ko" name="dish_description_ko" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-items">
                <label for="dish_image">Dish Image</label>
                <img id="preview" src="../imgs/dish-placeholder.jpg" alt="Preview">
                <input id="dish_image" type="file" name="dish_image" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="dish_price">Dish Price</label>
                <input id="dish_price" classsubmit"textfield" name="dish_price" type="text">
            </div>
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Add New Dish">
            </div>
        </form>
    </div>

    <script>
        function readURL(input) {
            if(input.files && input.files[0]){
                let reader = new FileReader();

                reader.onload = function(e) {
                    let preview = document.getElementById('preview').setAttribute('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        } 
    </script>
    
</body>
</html>