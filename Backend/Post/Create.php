<?php
header("Content-Type: application/json");
include "../db.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "POST":
        Create($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Create($pdo, $input)
{
    try {
        $uploadDir = "../Uploads/";
        $imagePath = "";

        if (!empty($_FILES["image"]["name"])) {
            $imageName = time() . "_" . basename($_FILES["image"]["name"]);
            $imagePath = $uploadDir . $imageName;
            if (!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                echo json_encode(["success" => false, "message" => "Failed to upload image."]);
                return;
            }
        }

        $sql = "INSERT INTO post (profileID, profileName, title, description, image) VALUES (:ProfileID, :profileName, :title, :description, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":ProfileID", $input["ProfileID"]);
        $stmt->bindParam(":profileName", $input["ProfileName"]);
        $stmt->bindParam(":title", $input["title"]);
        $stmt->bindParam(":description", $input["description"]);
        $stmt->bindParam(":image", $input["image"]);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            echo json_encode(["success" => true, "message" => "Post created successfully"] + $result);
        } else {
            echo json_encode(["success" => false, "message" => "Post creation failed"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}
