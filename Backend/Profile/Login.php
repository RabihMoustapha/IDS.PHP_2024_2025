<?php
header("Content-Type: application/json");
include "../idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "POST":
        Login($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Login($pdo, $input)
{
    $sql = "SELECT * FROM profile WHERE email = :email and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $input["email"]);
    $stmt->bindParam(":password", $input["password"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "Login successful", "item" => $result]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }
}
