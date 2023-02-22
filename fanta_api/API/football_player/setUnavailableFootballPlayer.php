<?php
require("../../COMMON/connect.php");
require("../../MODEL/footballPlayer.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$player = new footballPlayer($conn);

if ($player->deleteUser($id))
{
    http_response_code(200);
    echo json_encode(["response" => true, "message" => "User deleted"]);
}
else
{
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}

die();
?>