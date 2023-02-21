<?php
require __DIR__ . '/../../COMMON/connect.php';
require __DIR__ . '/../../MODEL/user.php';
header("Content-type: application/json; charset=UTF-8");

$data = json_decode(file_get_contents("php://input"));

if (empty($data->email) || empty($data->password) || empty($data->username)) {
    http_response_code(400);
    echo json_encode(["message" => "Fill every field"]);
    die();
}

$db = new Database();
$conn = $db->connect();
$user = new User($conn);

if ($user->createUser($data->email, $data->password, $data->username)) {
    $userID = $user->login($data->email, $data->password);
    echo json_encode(["message" => "Registration completed", "userID" => $userID->fetch_assoc()['id'], "response" => true]);
} else {
    echo json_encode(["message" => "Registration failed successfully ", "response" => false]);
}
?>