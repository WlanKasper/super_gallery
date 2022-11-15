<?php
require_once('../../common/php/connection-db.php');

$connMySQL = new ConnectionMySQL();
$pdo = $connMySQL->getConnection();

$json = file_get_contents('php://input');
$data = json_decode($json);

$idPainting = $data->idPainting;
$idUser = $data->idUser;
$date = date('Y-m-d');

$result = null;

$stmt = $pdo->prepare("INSERT INTO tprenotazioni (idOpera, idUtente, dataPren) VALUES (:idPainting, :idUser, :date);");
$stmt->execute(['idPainting' => $idPainting, 'idUser' => $idUser, 'date' => $date]);
$resp = $stmt->fetch();

$stmt = $pdo->prepare("UPDATE topere SET prenotato='s' WHERE id=:idPainting;");
$stmt->execute(['idPainting' => $idPainting]);
$resp2 = $stmt->fetch();

$result = array(
    'data' => null,
    'status' => 200,
);


echo json_encode($result);
?>