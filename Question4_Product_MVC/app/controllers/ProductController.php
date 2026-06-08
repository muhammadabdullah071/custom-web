<?php
require_once __DIR__ . '/../core/Controller.php';
require_once __DIR__ . '/../core/Database.php';
require_once __DIR__ . '/../models/Product.php';

class ProductController extends Controller {
    private $product;

    public function __construct() {
        $db = Database::getInstance();
        $this->product = new Product($db->getConnection());
    }

    public function index() {
        $products = $this->product->getAll();
        $this->view('products/index', ['products' => $products]);
    }

    public function create() {
        $this->view('products/create');
    }

    public function store() {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price = floatval($_POST['price'] ?? 0);

        if (empty($name) || $price <= 0) {
            $this->view('products/create', ['error' => 'Name and valid price are required.']);
            return;
        }

        $this->product->create([
            'name' => $name,
            'description' => $description,
            'price' => $price,
        ]);
        $this->redirect('/');
    }

    public function show($id) {
        $product = $this->product->findById($id);
        if (!$product) {
            http_response_code(404);
            echo "<!DOCTYPE html><html><head><title>404 Not Found</title><link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css' rel='stylesheet'></head><body class='bg-light'><div class='container mt-5'><div class='alert alert-danger'><h4>Product not found</h4><p>The product you are looking for does not exist.</p><a href='index.php' class='btn btn-primary'>Back to List</a></div></div></body></html>";
            return;
        }
        $this->view('products/show', ['product' => $product]);
    }
}
?>
