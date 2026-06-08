<?php
$libDbFile = __DIR__ . '/Question2_NUML_Library/database.sqlite';
$productDbFile = __DIR__ . '/Question4_Product_MVC/product_database.sqlite';
$success = [];
$errors = [];

try {
    $libPdo = new PDO('sqlite:' . $libDbFile);
    $libPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $libPdo->exec(
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
    $success[] = 'NUML Library database initialized (Books_borrowed table created)';
} catch (PDOException $e) {
    $errors[] = 'NUML Library setup failed: ' . htmlspecialchars($e->getMessage());
}

try {
    $prodPdo = new PDO('sqlite:' . $productDbFile);
    $prodPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $prodPdo->exec(
        'CREATE TABLE IF NOT EXISTS products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            description TEXT,
            price REAL NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP
        )'
    );
    $success[] = 'Product MVC database initialized (products table created)';
} catch (PDOException $e) {
    $errors[] = 'Product MVC setup failed: ' . htmlspecialchars($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Setup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (!empty($success)): ?>
                    <div style="font-family: monospace; background: #d4edda; padding: 20px; border-radius: 5px;">
                        <h2 style="color: #155724;">Database Setup Complete!</h2>
                        <ul>
                            <?php foreach ($success as $msg): ?>
                                <li><?= $msg ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="index.php" style="display: inline-block; margin-top: 10px; padding: 10px 20px; background: #28a745; color: white; text-decoration: none; border-radius: 3px;">Go to Home</a>
                    </div>
                <?php endif; ?>
                <?php if (!empty($errors)): ?>
                    <div style="font-family: monospace; background: #f8d7da; padding: 20px; border-radius: 5px; margin-top: 10px;">
                        <h2 style="color: #721c24;">Setup Errors</h2>
                        <?php foreach ($errors as $err): ?>
                            <p><?= $err ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
