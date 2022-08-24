<?php

$dataBasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $dataBasePath);

echo 'Conectei';

$pdo->exec('
        CREATE TABLE IF NOT EXISTS students (
            id INTEGER PRIMARY KEY,
            name TEXT, 
            birth_date TEXT
        );
        
        CREATE TABLE IF NOT EXISTS phones (
            id INTEGER PRIMARY KEY,
            area_code TEXT,
            number TEXT,
            student_id INTEGER,
            FOREIGN KEY(student_id) REFERENCES students(id)
        );
');

$pdo->exec("INSERT INTO phones (area_code, number, student_id)
                VALUES ('24', '99999999', 1), ('11', '55555555', 1)");

