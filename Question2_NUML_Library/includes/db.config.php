<?php
$sqliteFile = __DIR__ . '/../database.sqlite';

try {
    $pdo = new PDO('sqlite:' . $sqliteFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS Books_borrowed (
            student_id INTEGER PRIMARY KEY AUTOINCREMENT,
            student_name TEXT NOT NULL,
            father_name TEXT NOT NULL,
            cnic TEXT NOT NULL UNIQUE,
            email TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            address TEXT NOT NULL,
            age INTEGER NOT NULL,
            bs_program TEXT NOT NULL,
            book_title TEXT NOT NULL,
            isbn TEXT NOT NULL,
            borrow_date TEXT NOT NULL,
            return_date TEXT DEFAULT NULL,
            created_at TEXT DEFAULT CURRENT_TIMESTAMP
        )'
    );
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
?>
