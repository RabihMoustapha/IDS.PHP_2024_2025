<?php
header("Content-Type: application/json");
include "db.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "PUT":
        Put($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
}

function Put($pdo, $input)
{
    $sql = "UPDATE post SET name = :name, password = :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $input["name"]);
    $stmt->bindParam(":email", $input["email"]);
    $stmt->bindParam(":password", $input["password"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "post updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "post not found"]);
    }
}
