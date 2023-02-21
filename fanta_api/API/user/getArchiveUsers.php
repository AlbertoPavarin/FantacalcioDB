<?php
require("../../COMMON/connect.php");
require("../../MODEL/user.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$user = new User($conn);

$result = $user->getArchiveUsers();
if ($result->num_rows > 0)
{
    $users = array();
    while($record = $result->fetch_assoc())
    {
        $users[] = $record;
    }

    http_response_code(200);
    echo json_encode($users);
}
else
{
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}

die();