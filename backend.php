<?php
header('Content-Type: application/json');

$servername = "ls-98a30098ced46e6606bb2e266b59a0e46f22e256.cunwjmew61zv.ap-southeast-1.rds.amazonaws.com";
$username = "dbmasteruser";
$password = ".jPN~iwNSK_0JNllBf=^|b.57V8(DqkR";
$dbname = "bci";

// Create connection

$searchInput = $_GET['search'] ?? '';
return  $searchInput;
$conn = new PDO('pgsql:host=' . $servername . ';dbname=' . $dbname, $username, $password);
$result = $conn->query('SELECT village, lg_address, x, y FROM "LGs" WHERE village LIKE \'%' . $searchInput . '%\'');

$data = [];

while ($row = $result->fetch())
{
    $data[] = [
        "village" => $row["village"],
        "lg_address" => $row["lg_address"],
        "y" => $row["x"],
        "x" => $row["y"]
    ];
}

echo json_encode($data);
exit;
?>
