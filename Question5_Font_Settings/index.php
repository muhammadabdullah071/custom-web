<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $size = intval($_POST['font_size'] ?? 16);
    if ($size < 10 || $size > 72) {
        $size = 16;
    }

    $color = $_POST['font_color'] ?? '#000000';
    if (!preg_match('/^#[0-9A-Fa-f]{6}$/', $color)) {
        $color = '#000000';
    }

    $_SESSION['font_size'] = $size;
    $_SESSION['font_color'] = $color;
}

$currentSize = intval($_SESSION['font_size'] ?? 16);
$currentColor = $_SESSION['font_color'] ?? '#000000';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Font Settings - Main Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3>Customize Font Settings</h3>
                    </div>
                    <div class="card-body">
                        <p style="font-size: <?= htmlspecialchars($currentSize) ?>px; color: <?= htmlspecialchars($currentColor) ?>;">
                            Preview: This is how your text will look.
                        </p>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="font_size" class="form-label">Font Size (px)</label>
                                <input type="number" class="form-control" id="font_size" name="font_size" min="10" max="72" value="<?= htmlspecialchars($currentSize) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="font_color" class="form-label">Font Color</label>
                                <input type="color" class="form-control form-control-color" id="font_color" name="font_color" value="<?= htmlspecialchars($currentColor) ?>" style="width: 100px; height: 50px;">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save Settings</button>
                        </form>
                        <div class="mt-3 text-center">
                            <a href="contact.php" class="btn btn-success">Go to Contact Page</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
