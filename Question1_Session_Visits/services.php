<?php
session_start();
if (!isset($_SESSION['services_visits'])) {
    $_SESSION['services_visits'] = 0;
}
$_SESSION['services_visits']++;
$currentPage = 'services';
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <span class="navbar-brand fw-bold">Session Visit Counter</span>
            <div class="navbar-nav">
                <a class="nav-link <?= $currentPage === 'home' ? 'active fw-bold' : '' ?>" href="index.php">Home</a>
                <a class="nav-link <?= $currentPage === 'contact' ? 'active fw-bold' : '' ?>" href="contact.php">Contact</a>
                <a class="nav-link <?= $currentPage === 'services' ? 'active fw-bold' : '' ?>" href="services.php">Services</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow border-warning">
                    <div class="card-header bg-warning text-dark text-center py-3">
                        <h3 class="mb-0">Services Page</h3>
                    </div>
                    <div class="card-body text-center py-5">
                        <p class="text-muted mb-4">Track how many times you have visited each page in this session.</p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="card border-primary">
                                    <div class="card-body text-center">
                                        <h6 class="text-primary">Home</h6>
                                        <span class="display-6 fw-bold text-primary"><?= $_SESSION['home_visits'] ?? 0 ?></span>
                                        <p class="text-muted small mt-1">visits</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-success">
                                    <div class="card-body text-center">
                                        <h6 class="text-success">Contact</h6>
                                        <span class="display-6 fw-bold text-success"><?= $_SESSION['contact_visits'] ?? 0 ?></span>
                                        <p class="text-muted small mt-1">visits</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card border-warning">
                                    <div class="card-body text-center">
                                        <h6 class="text-warning">Services</h6>
                                        <span class="display-6 fw-bold text-warning"><?= $_SESSION['services_visits'] ?></span>
                                        <p class="text-muted small mt-1">visits</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 d-flex justify-content-center gap-2">
                            <a href="index.php" class="btn btn-primary px-4">Go to Home</a>
                            <a href="contact.php" class="btn btn-success px-4">Go to Contact</a>
                        </div>
                        <div class="mt-4">
                            <a href="index.php" class="btn btn-outline-secondary btn-sm">&larr; Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
