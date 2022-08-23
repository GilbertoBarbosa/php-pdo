<?php 

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();

$statement = $pdo->query('SELECT * FROM students');
//var_dump($statement->fetchColumn(1)); exit();

$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$student = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'],  
                                 $studentData['name'],
                                 new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);

/*$studentList2 = $statement->fetchAll(PDO::FETCH_CLASS, Student::class);
var_dump($studentList2);*/

