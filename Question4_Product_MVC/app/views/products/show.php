<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h3>Product Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                 <td><?= htmlspecialchars($product['id']) ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?= htmlspecialchars($product['name']) ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?= htmlspecialchars($product['description']) ?></td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>$<?= number_format($product['price'], 2) ?></td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                 <td><?= htmlspecialchars($product['created_at']) ?></td>
                            </tr>
                        </table>
                        <a href="index.php" class="btn btn-secondary w-100">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
