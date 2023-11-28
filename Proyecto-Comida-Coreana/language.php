<?php
require_once '../database.php';

$dishArray = [];


if (isset($_SERVER["CONTENT_TYPE"])) {
    $contentType = $_SERVER["CONTENT_TYPE"];

    if ($contentType == "application/json") {
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);

        if ($decoded["language"] == "en") {
            $dish = $database->select("tb_dish", [
                "tb_dish.dish_name",
                "tb_dish.dish_description"
            ],[
                "id_dish" => $decoded["id_dish"]
            ]);
            $dishArray["name"] = $dish[0]["dish_name"];
            $dishArray["description"] = $dish[0]["dish_description"];
        } else {
            $dish = $database->select("tb_dish", [
                "tb_dish.dish_name_ko",
                "tb_dish.dish_description_ko"
            ],
                [
                "id_dish" => $decoded["id_dish"]
            ]);
            $dishArray["name"] = $dish[0]["dish_name_ko"];
            $dishArray["description"] = $dish[0]["dish_description_ko"];
        }

        echo json_encode($dishArray);
    }
}
?>