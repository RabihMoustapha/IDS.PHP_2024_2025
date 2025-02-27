<?php
header("Content-Type: application/json");
include "idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "DELETE":
        Delete($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Delete($pdo, $input)
{
    $sql = "DELETE FROM post WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $input["id"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "Post deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid id"]);
    }
}
