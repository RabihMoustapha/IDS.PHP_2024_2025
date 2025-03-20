<?php
header("Content-Type: application/json");
include "../idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "PUT":
        UpdateName($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function UpdateName($pdo, $input)
{
    $sql = "UPDATE profile SET name = :name WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $input["name"]);
    $stmt->bindParam(":id", $input["id"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "Profile updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Profile not found"]);
    }
}
