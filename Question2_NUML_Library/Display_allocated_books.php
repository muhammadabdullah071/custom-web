<?php
session_start();
require_once 'includes/db.config.php';
require_once 'includes/User.php';

$user = new User($pdo);
if (!$user->isLoggedIn()) {
    header('Location: login.php');
    exit;
}

$students = $user->getAllStudents();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allocated Books - NUML Library</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Borrowed Books List</h2>
            <div>
                <a href="Students_books.html" class="btn btn-success me-2">+ Add New</a>
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Father Name</th>
                                <th>CNIC</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>BS Program</th>
                                <th>Book Title</th>
                                <th>ISBN</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($students)): ?>
                                <tr>
                                    <td colspan="13" class="text-center">No records found.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($students as $s): ?>
                                    <tr>
                                        <td><?= $s['student_id'] ?></td>
                                        <td><?= htmlspecialchars($s['student_name']) ?></td>
                                        <td><?= htmlspecialchars($s['father_name']) ?></td>
                                        <td><?= htmlspecialchars($s['cnic']) ?></td>
                                        <td><?= htmlspecialchars($s['email']) ?></td>
                                        <td><?= htmlspecialchars($s['address']) ?></td>
                                        <td><?= $s['age'] ?></td>
                                        <td><?= htmlspecialchars($s['bs_program']) ?></td>
                                        <td><?= htmlspecialchars($s['book_title']) ?></td>
                                        <td><?= htmlspecialchars($s['isbn']) ?></td>
                                        <td><?= $s['borrow_date'] ?></td>
                                        <td><?= $s['return_date'] ?? 'Not returned' ?></td>
                                        <td>
                                            <a href="edit_student.php?id=<?= $s['student_id'] ?>" class="btn btn-warning btn-sm">Update</a>
                                            <a href="delete_student.php?id=<?= $s['student_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
