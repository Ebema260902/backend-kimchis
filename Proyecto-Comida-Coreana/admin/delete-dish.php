<?php 

     require_once '../../database.php';

     session_start();


     if (!isset($_SESSION["isLoggedIn"])) {
        header("Location: ../forms.php"); 
        exit();
     }


     if (!isset($_SESSION["admin"]) || $_SESSION["admin"] !== 1) {
        header("Location: ../Homepage.php"); 
        exit();
     }

     if($_GET){
        $dish = $database->select("tb_dish","*",[
            "id_dish" => $_GET["id"],
        ]);
     }

     if($_POST){

       $data = $database->delete("tb_dish",[
            "id_dish"=> $_POST["id"]
        ]);

        header("Location: list-dishes.php");
     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete-dish</title>
    <link rel="stylesheet" href="../css/themes/admin.css">
</head>
<body>
    <div class="container">
        <h2>Confirm</h2>
        <form form method="post" action="delete-dish.php"  enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $dish[0]["id_dish"]; ?>">
            <div class="form-items">
                <input class="submit-btn" type="submit" value="Delete">
            </div>
        </form>
        <div class="form-items">
            <a class="admin-btn" href="./list-dishes.php">Cancel</a>
        </div>
    </div>
</body>
</html>