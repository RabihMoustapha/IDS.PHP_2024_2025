<?php
header("Content-Type: application/json");
include "../idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];

switch ($method) {
    case "POST":
        Create($pdo);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Create($pdo)
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

        $ProfileID = $_POST["ProfileID"];
        $profileName = $_POST["profileName"];
        $title = $_POST["title"];
        $description = $_POST["description"];

        $sql = "INSERT INTO post (ProfileID, profileName, title, description, image) VALUES (:ProfileID, :profileName, :title, :description, :image)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":ProfileID", $ProfileID);
        $stmt->bindParam(":profileName", $profileName);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":description", $description);
        $stmt->bindParam(":image", $imagePath);
        $stmt->execute();

        echo json_encode(["success" => true, "message" => "Post created successfully"]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}
