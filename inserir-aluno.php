<?php 

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$dataBasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);

$student = new Student(null, 'Gilberto Barbosa', new \DateTimeImmutable('1981-02-05'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES
                ('{$student->name()}', '{$student->birthDate()->format('Y-m-d')}')";

var_dump($pdo->exec($sqlInsert));

