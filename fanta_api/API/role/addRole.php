<?php
require("../../COMMON/connect.php");
require("../../MODEL/role.php");

header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->description))
{
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$role = new Role($conn);

if ($role->addRole($data->description))
{
    echo json_encode(["message" => "Role added", "response" => true]);
} else {
    echo json_encode(["message" => "Addition Failed", "response" => false]);
}

?>