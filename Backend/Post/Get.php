<?php
header("Content-Type: application/json");
include "idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "GET":
        Get($pdo);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Get($pdo)
{
    $sql = "SELECT * FROM post";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(array("success" => true, "item" => $result));
    } else {
        echo json_encode(array("success" => false, "message" => "No data found."));
    }
}
