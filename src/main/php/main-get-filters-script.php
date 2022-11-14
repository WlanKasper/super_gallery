<?php
require_once('../../common/php/connection-db.php');

$connMySQL = new ConnectionMySQL();
$pdo = $connMySQL->getConnection();

$json = file_get_contents('php://input');
$data = json_decode($json);

$result = null;

$stmt = $pdo->query("SELECT * FROM tnazionalita;");
$resp = $stmt->fetchAll();

if ($resp != null) {
    $result = array(
        'data' => json_encode($resp),
        'status' => 200,
    );
} else {
    $result = array(
        'data' => null,
        'status' => 417,
    );
}

echo json_encode($result);
?>