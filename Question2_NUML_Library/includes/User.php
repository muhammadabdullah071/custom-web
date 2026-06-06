<?php
require_once 'db.config.php';

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM Books_borrowed WHERE email = :email LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['student_id'];
            $_SESSION['user_name'] = $user['student_name'];
            $_SESSION['user_email'] = $user['email'];
            return true;
        }
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_unset();
        session_destroy();
    }

    public function register($data) {
        $sql = "INSERT INTO Books_borrowed (student_name, father_name, cnic, email, password, address, age, bs_program, book_title, isbn, borrow_date, return_date)
                VALUES (:student_name, :father_name, :cnic, :email, :password, :address, :age, :bs_program, :book_title, :isbn, :borrow_date, :return_date)";
        $stmt = $this->pdo->prepare($sql);
        $data[':password'] = password_hash($data[':password'], PASSWORD_DEFAULT);
        return $stmt->execute($data);
    }

    public function getAllStudents() {
        $sql = "SELECT * FROM Books_borrowed ORDER BY created_at DESC";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function getStudentById($id) {
        $sql = "SELECT * FROM Books_borrowed WHERE student_id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function updateStudent($id, $data) {
        $sql = "UPDATE Books_borrowed SET
                    student_name = :student_name,
                    father_name = :father_name,
                    cnic = :cnic,
                    email = :email,
                    address = :address,
                    age = :age,
                    bs_program = :bs_program,
                    book_title = :book_title,
                    isbn = :isbn,
                    borrow_date = :borrow_date,
                    return_date = :return_date
                WHERE student_id = :student_id";
        $data[':student_id'] = $id;
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }

    public function deleteStudent($id) {
        $sql = "DELETE FROM Books_borrowed WHERE student_id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
?>
