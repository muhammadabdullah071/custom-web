<?php
class Product {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $sql = "SELECT * FROM products ORDER BY created_at DESC";
        return $this->pdo->query($sql)->fetchAll();
    }

    public function findById($id) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $sql = "INSERT INTO products (name, description, price) VALUES (:name, :description, :price)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':name' => $data['name'],
            ':description' => $data['description'],
            ':price' => $data['price'],
        ]);
    }
}
?>
