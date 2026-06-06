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
    if ($user->register($data)) {
        header('Location: login.php');
        exit;
    } else {
        echo "<div class='alert alert-danger'>Registration failed. Email or CNIC may already exist.</div>";
    }
} else {
    header('Location: Students_books.html');
    exit;
}
?>
