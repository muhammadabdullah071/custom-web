<?php
session_start();
require_once 'includes/db.config.php';
require_once 'includes/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = new User($pdo);
    $data = [
        ':student_name' => $_POST['student_name'],
        ':father_name'  => $_POST['father_name'],
        ':cnic'         => $_POST['cnic'],
        ':email'        => $_POST['email'],
        ':password'     => $_POST['password'],
        ':address'      => $_POST['address'],
        ':age'          => $_POST['age'],
        ':bs_program'   => $_POST['bs_program'],
        ':book_title'   => $_POST['book_title'],
        ':isbn'         => $_POST['isbn'],
        ':borrow_date'  => $_POST['borrow_date'],
        ':return_date'  => $_POST['return_date'] ?: null,
    ];
    try {
        if ($user->register($data)) {
            header('Location: login.php');
            exit;
        }
    } catch (PDOException $e) {
        $error = 'Registration failed. Email or CNIC may already exist.';
    }
    echo "<div class='alert alert-danger'>" . ($error ?? 'Registration failed. Please try again.') . "</div>";
    echo "<a href='Students_books.html' class='btn btn-primary'>Go Back</a>";
} else {
    header('Location: Students_books.html');
    exit;
}
?>
