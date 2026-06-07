<?php
$host = 'localhost';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS NUML_Library");
    $pdo->exec("USE NUML_Library");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS Books_borrowed (
            student_id INT AUTO_INCREMENT PRIMARY KEY,
            student_name VARCHAR(100) NOT NULL,
            father_name VARCHAR(100) NOT NULL,
            cnic VARCHAR(15) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            address TEXT NOT NULL,
            age INT NOT NULL,
            bs_program VARCHAR(100) NOT NULL,
            book_title VARCHAR(200) NOT NULL,
            isbn VARCHAR(20) NOT NULL,
            borrow_date DATE NOT NULL,
            return_date DATE DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    $pdo->exec("
        CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(200) NOT NULL,
            description TEXT,
            price DECIMAL(10, 2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    echo "<div style='font-family: monospace; background: #d4edda; padding: 20px; border-radius: 5px;'>";
    echo "<h2 style='color: #155724;'>Database Setup Complete!</h2>";
    echo "<ul>";
    echo "<li>Database 'NUML_Library' created (if not exists)</li>";
    echo "<li>Table 'Books_borrowed' created (if not exists)</li>";
    echo "<li>Table 'products' created (if not exists)</li>";
    echo "</ul>";
    echo "<a href='index.php' style='display: inline-block; margin-top: 10px; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 3px;'>Go to Home</a>";
    echo "</div>";
} catch (PDOException $e) {
    echo "<div style='font-family: monospace; background: #f8d7da; padding: 20px; border-radius: 5px;'>";
    echo "<h2 style='color: #721c24;'>Setup Failed</h2>";
    echo "<p>" . $e->getMessage() . "</p>";
    echo "</div>";
}
?>
