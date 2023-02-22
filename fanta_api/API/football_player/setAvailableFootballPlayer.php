<?php
require("../../COMMON/connect.php");
require("../../MODEL/footballPlayer.php");

header("Content-type: application/json; charset=UTF-8");

if (!isset($_GET['id']) || empty($id = $_GET['id']))
{
    http_response_code(400);
    echo json_encode(["Message" => "Id required"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$player = new footballPlayer($conn);

if ($player->setAvailableFootballPlayer($id))
{
    http_response_code(200);
    echo json_encode(["response" => true, "message" => "Football player set to available"]);
}
else
{
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "No record or already setted to unavailable"]);
}

die();
?>