<?php

use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// Realizo processos de definição da turma

$connection->beginTransaction();

try {

    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1985-05-01')
    );
    
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1985-05-01')
    );

    $studentRepository->save($anotherStudent);

    // Grava no banco
    $connection->commit();

} catch (\RuntimeException $e) {

    echo $e->getMessage();
    $connection->rollBack();

}




