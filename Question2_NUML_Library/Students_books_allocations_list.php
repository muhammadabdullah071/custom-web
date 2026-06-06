<?php
session_start();
// Requirement (b) expects this file to be the destination after login.
// Requirement (d) expects Display_allocated_books.php to show the table.
// We redirect to the display page.
header('Location: Display_allocated_books.php');
exit;
?>
