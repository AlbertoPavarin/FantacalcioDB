<?php
require("../../COMMON/connect.php");
require("../../MODEL/status.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$status = new Status($conn);

$result = $status->getArchiveStates();

if ($result->num_rows > 0)
{
    $states = array();
    while ($record = $result->fetch_assoc())
    {
        $states[] = $record;
    }

    http_response_code(200);
    echo json_encode($states, JSON_PRETTY_PRINT);
}
else {
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}
?>