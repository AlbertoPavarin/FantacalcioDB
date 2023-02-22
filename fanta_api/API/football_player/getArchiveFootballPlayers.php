<?php
require("../../COMMON/connect.php");
require("../../MODEL/footballPlayer.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$footballPlayer = new FootballPlayer($conn);

$result = $footballPlayer->getArchiveFooballPlayers();
if ($result->num_rows > 0)
{
    $footballPlayers = array();
    while($record = $result->fetch_assoc())
    {
        $footballPlayers[] = $record;
    }

    http_response_code(200);
    echo json_encode($footballPlayers, JSON_PRETTY_PRINT);
}
else
{
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}

die();