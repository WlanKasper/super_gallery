<?php
require_once('../../common/php/connection-db.php');

$connMySQL = new ConnectionMySQL();
$pdo = $connMySQL->getConnection();

$json = file_get_contents('php://input');
$data = json_decode($json);

$countryId = $data->countryId;
$private = $data->private;

$result = null;

$stmt  = null;
if ($countryId != '0') {
    $stmt = $pdo->query("SELECT topere.id, topere.titolo, tautori.autore, topere.descrizione, topere.prenotato, topere.path 
    FROM topere 
    INNER JOIN tautori 
    INNER JOIN tnazionalita 
    ON topere.idAutore = tautori.id AND tautori.idNazionalita = tnazionalita.id AND tautori.idNazionalita = $countryId
    WHERE topere.privata = 's'
    ORDER BY tnazionalita.nazionalita;");
} else {
    $stmt = $pdo->query("SELECT topere.id, topere.titolo, tautori.autore, topere.descrizione, topere.prenotato, topere.path 
    FROM topere 
    INNER JOIN tautori 
    INNER JOIN tnazionalita 
    ON topere.idAutore = tautori.id AND tautori.idNazionalita = tnazionalita.id
    WHERE topere.privata = 's'
    ORDER BY tnazionalita.nazionalita;");
}

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