<?php
header("Content-Type: application/json");
include "../idsDB.php";
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
        $sql = "INSERT INTO profile (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $input["name"]);
        $stmt->bindParam(":email", $input["email"]);
        $stmt->bindParam(":password", $input["password"]);
        $stmt->execute();
        echo json_encode(array(["success" => true, "message" => "Profile created successfully"]));
    } catch (PDOException $e) {
        echo json_encode(array(["success" => false, "message" => "Database error: " . $e->getMessage()]));
    }
}
