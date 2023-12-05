<?php 
    
    require_once '../../database.php';

    $categories = $database->select("tb_categories","*");
    $number_of_people = $database->select("tb_number_of_people", "*");   

    $message = "";

    if($_GET){
        $dish = $database->select("tb_dish","*",[
            "id_dish" => $_GET["id"],
        ]);
         var_dump($dish);   
    }

    if($_POST){

        $data = $database->select("tb_dish","*",[
            "id_dish"=>$_POST["id"]
        ]);

        if(isset($_FILES["dish_image"]) && $_FILES["dish_image"]["name"] != ""){

            $errors = [];
            $file_name = $_FILES["dish_image"]["name"];
            $file_size = $_FILES["dish_image"]["size"];
            $file_tmp = $_FILES["dish_image"]["tmp_name"];
            $file_type = $_FILES["dish_image"]["type"];
            $file_ext_arr = explode(".", $_FILES["dish_image"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = ["jpeg", "png", "jpg", "webp"];

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not valid";
                $message = "File type is not valid";
            }

            if(empty($errors)){
                $filename = strtolower($_POST["dish_name"]);
                $filename = str_replace(',', '', $filename);
                $filename = str_replace('.', '', $filename);
                $filename = str_replace(' ', '-', $filename);
                $img = "plate-".$filename.".".$file_ext;
                move_uploaded_file($file_tmp, "../imgs/".$img);
            }
        }else{
            $img = $data[0]["dish_image"];
        }

        $database->update("tb_dish",[
            
            "id_category"=>$_POST["dish_category"], 
            "dish_name"=>$_POST["dish_name"],
            "dish_name_ko"=>$_POST["dish_name_ko"],
            "featured_dish"=>$_POST["featured_dish"],
            "id_number_of_people"=>$_POST["dish_people"],
            "dish_description"=>$_POST["dish_description"],
            "dish_description_ko"=>$_POST["dish_description_ko"],
            "dish_image"=> $img,
            "dish_price"=>$_POST["dish_price"]
        ],[
            "id_dish" => $_POST["id"]
        ]);
        
        header("location: list-dishes.php");            
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Edit Dish</h2>
        <?php 
            echo $message;
        ?>
        <form method="post" action="edit-dish.php" enctype="multipart/form-data">
            <div class="form-items">
                <label for="dish_name">Dish Name</label>
                <input id="dish_name" class="textfield" name="dish_name" type="text" value="<?php echo $dish[0]["dish_name"] ?>">
            </div>
            <div class="form-items">
                <label for="dish_name_ko">Dish Name KO</label>
                <input id="dish_name_ko" class="textfield" name="dish_name_ko" type="text" value="<?php echo $dish[0]["dish_name_ko"] ?>">
            </div>
            <div class="form-items">
                <label for="dish_category">Dish Category</label>
                <select name="dish_category" id="dish_category">
                    <?php 
                        foreach($categories as $category){
                            if($dish[0]["id_category"] == $category["id_category"]){
                                echo "<option value='".$category["id_category"]."' selected>".$category["name_category"]."</option>";
                            }else{
                                echo "<option value='".$category["id_category"]."'>".$category["name_category"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="form-items">
                <label for="dish_people">Group Size</label>
                <select name="dish_people" id="dish_people">
                <?php 
                    foreach($number_of_people as $group_size){
                        if($dish[0]["id_number_of_people"] == $group_size["id_number_of_people"]){
                            echo "<option value='".$group_size["id_number_of_people"]."' selected>".$group_size["name_group_size"]."</option>";
                        }else{
                            echo "<option value='".$group_size["id_number_of_people"]."'>".$group_size["name_group_size"]."</option>";
                        }
                    }
                    ?>
                </select>
            </div>

            
            <div class="form-items">
                <label for="featured_dish">Featured Dish</label>
                <select name="featured_dish" id="featured_dish">
                    <option value="1" <?php echo ($dish[0]["featured_dish"] == 1) ? 'selected' : ''; ?>>Yes</option>
                    <option value="0" <?php echo ($dish[0]["featured_dish"] == 0) ? 'selected' : ''; ?>>No</option>
                </select>
            </div>

            
            <div class="form-items">
                <label for="dish_description">Dish Description</label>
                <textarea id="dish_description" name="dish_description" id="" cols="30" rows="10"><?php echo $dish[0]["dish_description"]; ?></textarea>
            </div>
            <div class="form-items">
                <label for="dish_description_ko">Dish Description KO</label>
                <textarea id="dish_description_ko" name="dish_description_ko" id="" cols="30" rows="10"><?php echo $dish[0]["dish_description_ko"]; ?></textarea>
            </div>

            
            <div class="form-items">
                <label for="dish_image">Dish Image</label>
                <img id="preview" src="../imgs/<?php echo $dish[0]["dish_image"]; ?>" alt="Preview">
                <input id="dish_image" type="file" name="dish_image" onchange="readURL(this)">
            </div>
            <div class="form-items">
                <label for="dish_price">Dish Price</label>
                <input id="dish_price" class="textfield" name="dish_price" type="text" value="<?php echo $dish[0]["dish_price"] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $dish[0]["id_dish"]; ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Update Dish">
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