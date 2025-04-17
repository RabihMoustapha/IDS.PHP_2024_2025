<?php
header("Content-Type: application/json");
include "../db.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "POST":
        GetByID($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function GetById($pdo, $input)
{
    $sql = "SELECT * FROM profile WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $input["id"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true] + $result);
    } else {
        echo json_encode(array("success" => false, "message" => "Profile not found."));
    }
}