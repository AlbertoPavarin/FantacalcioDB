<?php
require("../../COMMON/connect.php");
require("../../MODEL/role.php");

header("Content-type: application/json; charset=UTF-8");

$db = new Database();
$conn = $db->connect();
$role = new Role($conn);

$result = $role->getArchiveRoles();

if ($result->num_rows > 0)
{
    $roles = array();
    while ($record = $result->fetch_assoc())
    {
        $roles[] = $record;
    }

    http_response_code(200);
    echo json_encode($roles, JSON_PRETTY_PRINT);
}
else {
    http_response_code(400);
    echo json_encode(["response" => false, "message" => "no record"]);
}
?>