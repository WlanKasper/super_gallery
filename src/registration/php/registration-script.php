<?php
require('../../common/php/connection-db.php');

$connMySQL = new ConnectionMySQL();
$pdo = $connMySQL->getConnection();

$json = file_get_contents('php://input');
$data = json_decode($json);

$email = $data->email;
$password = $data->password;

$result = null;

try {
    $stmt = $pdo->prepare("INSERT INTO tutenti (user, email, pass, nome, cognome) VALUES('toSet', :email, :password, 'toSet', 'toSet');");
    $stmt->execute(['email' => $email, 'password' => $password]);

    $result = array(
        'data' => null,
        'status' => 200,
    );
} catch (PDOException $e) {
    $result = array(
        'data' => $e,
        'status' => 417,
    );
}

echo json_encode($result);
?>