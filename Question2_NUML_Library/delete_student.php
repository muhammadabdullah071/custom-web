<?php
session_start();
require_once 'includes/db.config.php';
require_once 'includes/User.php';

$user = new User($pdo);
if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$id = $_GET['id'] ?? null;
if ($id) {
    $user->deleteStudent($id);
}
header('Location: Display_allocated_books.php');
exit;
?>
