<?php
header("Content-Type: application/json");
include "../idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "POST":
        Search($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Search($pdo, $input)
{
    try {
        $search = "%" . $input["searchQuery"] . "%";
        $sql = "SELECT * FROM post WHERE title LIKE :search OR description LIKE :search";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":search", $search);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if($result) {
            echo json_encode(["success" => true, "message" => "Post searched successfully", "item" => $result]);
        } else {
            echo json_encode(["success" => false, "message" => "No post found"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}
