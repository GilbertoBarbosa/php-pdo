<?php 

require_once 'vendor/autoload.php';

$dataBasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);

$sqlDelete = 'DELETE FROM students WHERE id = ?;';
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 4, PDO::PARAM_INT);
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT);

var_dump($preparedStatement->execute());
