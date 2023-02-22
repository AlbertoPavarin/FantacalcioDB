<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/footballPlayer.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->id) || empty($data->team)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$footballPlayer = new FootballPlayer($conn);

if ($footballPlayer->setFootballPlayerTeam($data->id, $data->team)) {
    echo json_encode(["message" => "Football player team changed", "response" => true]);
} else {
    echo json_encode(["message" => "Change failed or already changed", "response" => false]);
}
?>