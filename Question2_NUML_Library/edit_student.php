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
if (!$id) {
    header('Location: Display_allocated_books.php');
    exit;
}

$student = $user->getStudentById($id);
if (!$student) {
    header('Location: Display_allocated_books.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        ':student_name' => $_POST['student_name'],
        ':father_name'  => $_POST['father_name'],
        ':cnic'         => $_POST['cnic'],
        ':email'        => $_POST['email'],
        ':address'      => $_POST['address'],
        ':age'          => $_POST['age'],
        ':bs_program'   => $_POST['bs_program'],
        ':book_title'   => $_POST['book_title'],
        ':isbn'         => $_POST['isbn'],
        ':borrow_date'  => $_POST['borrow_date'],
        ':return_date'  => $_POST['return_date'] ?: null,
    ];
    if ($user->updateStudent($id, $data)) {
        header('Location: Display_allocated_books.php');
        exit;
    } else {
        $error = 'Update failed.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - NUML Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow">
                    <div class="card-header bg-warning">
                        <h3>Edit Student Record</h3>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                        <?php endif; ?>
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="student_name" class="form-label">Student Name</label>
                                    <input type="text" class="form-control" id="student_name" name="student_name" value="<?= htmlspecialchars($student['student_name']) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="father_name" class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" id="father_name" name="father_name" value="<?= htmlspecialchars($student['father_name']) ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="cnic" class="form-label">CNIC</label>
                                    <input type="text" class="form-control" id="cnic" name="cnic" value="<?= htmlspecialchars($student['cnic']) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($student['email']) ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label">Age</label>
                                     <input type="number" class="form-control" id="age" name="age" value="<?= htmlspecialchars($student['age']) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="bs_program" class="form-label">BS Program</label>
                                    <select class="form-select" id="bs_program" name="bs_program" required>
                                        <option value="BS Computer Science" <?= $student['bs_program'] == 'BS Computer Science' ? 'selected' : '' ?>>BS Computer Science</option>
                                        <option value="BS Software Engineering" <?= $student['bs_program'] == 'BS Software Engineering' ? 'selected' : '' ?>>BS Software Engineering</option>
                                        <option value="BS Data Science" <?= $student['bs_program'] == 'BS Data Science' ? 'selected' : '' ?>>BS Data Science</option>
                                        <option value="BS Artificial Intelligence" <?= $student['bs_program'] == 'BS Artificial Intelligence' ? 'selected' : '' ?>>BS Artificial Intelligence</option>
                                        <option value="BS Information Technology" <?= $student['bs_program'] == 'BS Information Technology' ? 'selected' : '' ?>>BS Information Technology</option>
                                        <option value="BS Business Administration" <?= $student['bs_program'] == 'BS Business Administration' ? 'selected' : '' ?>>BS Business Administration</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="2" required><?= htmlspecialchars($student['address']) ?></textarea>
                            </div>
                            <hr>
                            <h5>Book Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="book_title" class="form-label">Book Title</label>
                                    <input type="text" class="form-control" id="book_title" name="book_title" value="<?= htmlspecialchars($student['book_title']) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="isbn" class="form-label">ISBN</label>
                                    <input type="text" class="form-control" id="isbn" name="isbn" value="<?= htmlspecialchars($student['isbn']) ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="borrow_date" class="form-label">Borrow Date</label>
                                     <input type="date" class="form-control" id="borrow_date" name="borrow_date" value="<?= htmlspecialchars($student['borrow_date']) ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="return_date" class="form-label">Return Date</label>
                                    <input type="date" class="form-control" id="return_date" name="return_date" value="<?= htmlspecialchars($student['return_date'] ?? '') ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning w-100">Update Record</button>
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
