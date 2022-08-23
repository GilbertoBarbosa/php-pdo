<?php 

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, "Gilberto', ''); DROP TABLE students; -- Barbosa", new \DateTimeImmutable('1981-02-05'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date)";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));
$statement->execute();

//echo $sqlInsert; exit();
//var_dump($pdo->exec($sqlInsert));

if ($statement->execute()) {
    echo "Aluno incluido";
}

