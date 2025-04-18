<?php
header("Content-Type: application/json");
include "../db.php";

$method = $_SERVER["REQUEST_METHOD"];
$input = json_decode(file_get_contents("php://input"), true);

switch ($method) {
    case "DELETE":
        Delete($pdo, $input);
        break;
    default:
        echo json_encode(array(["message" => "Invalid request method"]));
        break;
}

function Delete($pdo, $input)
{
    $sql = "DELETE FROM profile WHERE email = :email and password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $input["email"]);
    $stmt->bindParam(":password", $input["password"]);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo json_encode(["success" => true, "message" => "Profile deleted successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Deletion failed"]);
    }
}
