<?php
header("Content-Type: application/json");
include "idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "GET":
        Get($pdo);
        break;
    case "POST":
        Login($pdo, $input);
        break;
    case "PUT":
        Update($pdo, $input);
        break;
    case "DELETE":
        Delete($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function Get($pdo)
{
    $sql = "SELECT * FROM profile";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(array("success" => true, "item" => $result));
    } else {
        echo json_encode(array("success" => false, "message" => "No data found."));
    }
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

function Update($pdo, $input)
{
    $sql = "UPDATE profile SET name = :name, password = :password WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":name", $input["name"]);
    $stmt->bindParam(":email", $input["email"]);
    $stmt->bindParam(":password", $input["password"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "Profile updated successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Profile not found"]);
    }
}

function Delete($pdo, $input)
{
    $sql = "DELETE FROM profile WHERE email = :email AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $input["email"]);
    $stmt->bindParam(":password", $input["password"]);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode(["success" => true, "message" => "Profile deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid email or password"]);
    }
}
