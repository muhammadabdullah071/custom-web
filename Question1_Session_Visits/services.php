<?php
session_start();
if (!isset($_SESSION['services_visits'])) {
    $_SESSION['services_visits'] = 0;
}
$_SESSION['services_visits']++;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Session Visit Counter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-body text-center">
                <h1 class="card-title">Services Page</h1>
                <p class="fs-4">Visits to Services Page: <strong><?= $_SESSION['services_visits'] ?></strong></p>
                <p class="fs-4">Visits to Home Page: <strong><?= $_SESSION['home_visits'] ?? 0 ?></strong></p>
                <p class="fs-4">Visits to Contact Page: <strong><?= $_SESSION['contact_visits'] ?? 0 ?></strong></p>
                <div class="mt-4">
                    <a href="index.php" class="btn btn-primary me-2">Go to Home</a>
                    <a href="contact.php" class="btn btn-success">Go to Contact</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
