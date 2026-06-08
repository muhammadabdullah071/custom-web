<?php
session_start();

$fontSize = intval($_SESSION['font_size'] ?? 16);
$fontColor = $_SESSION['font_color'] ?? '#000000';
if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $fontColor)) {
    $fontColor = '#000000';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Font Settings Applied</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-size: <?= htmlspecialchars($fontSize) ?>px !important;
            color: <?= htmlspecialchars($fontColor) ?> !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3>Contact Page</h3>
            </div>
            <div class="card-body">
                <p>Your font settings have been applied on this page.</p>
                <p>Current Font Size: <strong><?= htmlspecialchars($fontSize) ?>px</strong></p>
                <p>Current Font Color: <strong><?= htmlspecialchars($fontColor) ?></strong></p>
                <a href="index.php" class="btn btn-primary">Back to Settings</a>
            </div>
        </div>
    </div>
</body>
</html>
