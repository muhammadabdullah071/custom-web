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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->product->create([
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
            ]);
            $this->redirect('index.php');
        }
    }

    public function show($id) {
        $product = $this->product->findById($id);
        if (!$product) {
            die("Product not found.");
        }
        $this->view('products/show', ['product' => $product]);
    }
}
?>
