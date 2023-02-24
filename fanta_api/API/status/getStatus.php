<?php
require("../../COMMON/connect.php");
require("../../MODEL/status.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id']))
{
    http_response_code(400);
    echo json_encode(["Message" => "Id required"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$status = new Status($conn);

$result = $status->getStatus($id);

if ($result->num_rows > 0)
{
    http_response_code(200);
    echo json_encode($result->fetch_assoc(), JSON_PRETTY_PRINT);
}
else {
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}
?>