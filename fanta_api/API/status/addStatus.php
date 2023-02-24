<?php
require("../../COMMON/connect.php");
require("../../MODEL/status.php");

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
$status = new Status($conn);

if ($status->addStatus($data->description))
{
    echo json_encode(["message" => "Status added", "response" => true]);
} else {
    echo json_encode(["message" => "Addition Failed", "response" => false]);
}

?>