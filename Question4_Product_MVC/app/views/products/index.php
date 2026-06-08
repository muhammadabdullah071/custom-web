<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Product List</h2>
            <a href="index.php/create" class="btn btn-primary">+ Create Product</a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($products)): ?>
                            <tr><td colspan="5" class="text-center">No products found.</td></tr>
                        <?php else: ?>
                            <?php foreach ($products as $p): ?>
                                <tr>
                                     <td><?= htmlspecialchars($p['id']) ?></td>
                                    <td><?= htmlspecialchars($p['name']) ?></td>
                                    <td><?= htmlspecialchars($p['description']) ?></td>
                                    <td>$<?= number_format($p['price'], 2) ?></td>
                                    <td>
                                         <a href="index.php/show/<?= $p['id'] ?>" class="btn btn-info btn-sm">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
