<?php
header("Content-Type: application/json");
include "idsDB.php";
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
        $sql = "INSERT INTO post (profileID, profileName, title, description) VALUES (:profileID, :profileName, :title, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":profileID", $input["profileID"]);
        $stmt->bindParam(":profileName", $input["profileName"]);
        $stmt->bindParam(":title", $input["title"]);
        $stmt->bindParam(":description", $input["description"]);
        $stmt->execute();
        echo json_encode(["success" => true, "message" => "Post created successfully"]);
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}
