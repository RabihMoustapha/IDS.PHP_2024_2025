<?php
header("Content-Type: application/json");
include "../db.php";
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
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            echo json_encode(["success" => true, "message" => "Profile created successfully"] + $result);
        } else {
            echo json_encode(["success" => false, "message" => "Profile creation failed"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}
