<?php
header("Content-Type: application/json");
include "idsDB.php";
$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "GET":
        handleGet($pdo);
        break;
    case "POST":
        handlePost($pdo, $input);
        break;
    case "PUT":
        handlePut($pdo, $input);
        break;
    case "DELETE":
        handleDelete($pdo, $input);
        break;
    default:
        echo json_encode(["message" => "Invalid request method"]);
        break;
}

function handleGet($pdo)
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

function handlePost($pdo, $input)
{
    try {
        $sql = "SELECT * FROM profile WHERE token = :userToken";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":userToken", $input["userToken"]);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $sql = "INSERT INTO post (email, img, title, description) VALUES (:email, :img, :title, :description)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":email", $result["email"]);
            $stmt->bindParam(":img", $input["img"]);
            $stmt->bindParam(":title", $input["title"]);
            $stmt->bindParam(":description", $input["description"]);
            $stmt->execute();
            echo json_encode(["success" => true, "message" => "Post created successfully"]);
        } else {
            echo json_encode(["success" => false, "message" => "User not found"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Database error: " . $e->getMessage()]);
    }
}

function handlePut($pdo, $input)
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

function handleDelete($pdo, $input)
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
