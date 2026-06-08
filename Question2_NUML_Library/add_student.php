<?php
session_start();
require_once 'includes/db.config.php';
require_once 'includes/User.php';

$user = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        ':student_name' => trim($_POST['student_name'] ?? ''),
        ':father_name'  => trim($_POST['father_name'] ?? ''),
        ':cnic'         => trim($_POST['cnic'] ?? ''),
        ':email'        => trim($_POST['email'] ?? ''),
        ':password'     => $_POST['password'] ?? '',
        ':address'      => trim($_POST['address'] ?? ''),
        ':age'          => intval($_POST['age'] ?? 0),
        ':bs_program'   => $_POST['bs_program'] ?? '',
        ':book_title'   => trim($_POST['book_title'] ?? ''),
        ':isbn'         => trim($_POST['isbn'] ?? ''),
        ':borrow_date'  => $_POST['borrow_date'] ?? '',
        ':return_date'  => $_POST['return_date'] ?: null,
    ];

    $errors = [];
    if (empty($data[':student_name'])) $errors[] = 'Student name is required.';
    if (empty($data[':father_name'])) $errors[] = 'Father name is required.';
    if (empty($data[':cnic']) || !preg_match('/^\d{5}-\d{7}-\d{1}$/', $data[':cnic'])) $errors[] = 'Valid CNIC (XXXXX-XXXXXXX-X) is required.';
    if (empty($data[':email']) || !filter_var($data[':email'], FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
    if (strlen($data[':password']) < 6) $errors[] = 'Password must be at least 6 characters.';
    if (empty($data[':address'])) $errors[] = 'Address is required.';
    if ($data[':age'] < 16 || $data[':age'] > 100) $errors[] = 'Age must be between 16 and 100.';
    if (empty($data[':bs_program'])) $errors[] = 'BS Program is required.';
    if (empty($data[':book_title'])) $errors[] = 'Book title is required.';
    if (empty($data[':isbn'])) $errors[] = 'ISBN is required.';
    if (empty($data[':borrow_date'])) $errors[] = 'Borrow date is required.';

    if (empty($errors)) {
        try {
            if ($user->register($data)) {
                header('Location: Display_allocated_books.php');
                exit;
            }
        } catch (PDOException $e) {
            $errors[] = 'Registration failed. Email or CNIC may already exist.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student - NUML Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h3>Add New Student Record</h3>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $err): ?>
                                        <li><?= htmlspecialchars($err) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="student_name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?= htmlspecialchars($_POST['student_name'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?= htmlspecialchars($_POST['father_name'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" class="form-control" id="cnic" name="cnic" pattern="\d{5}-\d{7}-\d{1}" placeholder="XXXXX-XXXXXXX-X" value="<?= htmlspecialchars($_POST['cnic'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" min="16" max="100" value="<?= htmlspecialchars($_POST['age'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="bs_program" class="form-label">BS Program</label>
                                    <select class="form-select" id="bs_program" name="bs_program" required>
                                        <option value="">Select Program</option>
                                        <option value="BS Computer Science" <?= ($_POST['bs_program'] ?? '') === 'BS Computer Science' ? 'selected' : '' ?>>BS Computer Science</option>
                                        <option value="BS Software Engineering" <?= ($_POST['bs_program'] ?? '') === 'BS Software Engineering' ? 'selected' : '' ?>>BS Software Engineering</option>
                                        <option value="BS Data Science" <?= ($_POST['bs_program'] ?? '') === 'BS Data Science' ? 'selected' : '' ?>>BS Data Science</option>
                                        <option value="BS Artificial Intelligence" <?= ($_POST['bs_program'] ?? '') === 'BS Artificial Intelligence' ? 'selected' : '' ?>>BS Artificial Intelligence</option>
                                        <option value="BS Information Technology" <?= ($_POST['bs_program'] ?? '') === 'BS Information Technology' ? 'selected' : '' ?>>BS Information Technology</option>
                                        <option value="BS Business Administration" <?= ($_POST['bs_program'] ?? '') === 'BS Business Administration' ? 'selected' : '' ?>>BS Business Administration</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" name="address" rows="2" required><?= htmlspecialchars($_POST['address'] ?? '') ?></textarea>
                                </div>
                            </div>
                            <hr>
                            <h5>Book Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="book_title" class="form-label">Book Title</label>
                                    <input type="text" class="form-control" id="book_title" name="book_title" value="<?= htmlspecialchars($_POST['book_title'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?= htmlspecialchars($_POST['isbn'] ?? '') ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="borrow_date" class="form-label">Borrow Date</label>
                                    <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="<?= htmlspecialchars($_POST['borrow_date'] ?? date('Y-m-d')) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="return_date" class="form-label">Return Date</label>
                                    <input type="date" class="form-control" id="return_date" name="return_date" value="<?= htmlspecialchars($_POST['return_date'] ?? '') ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Register Student</button>
                            <a href="Display_allocated_books.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
