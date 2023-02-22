<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/footballPlayer.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->name) || empty($data->surname) || empty($data->team) || empty($data->role)|| empty($data->status)|| empty($data->date_birth)|| empty($data->value)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$footballPlayer = new FootballPlayer($conn);

if ($footballPlayer->AddFootballPlayer($data->name, $data->surname, $data->team, $data->role, $data->status, $data->date_birth, $data->value)) {
    echo json_encode(["message" => "Football player added", "response" => true]);
} else {
    echo json_encode(["message" => "Registration failed ", "response" => false]);
}
?>