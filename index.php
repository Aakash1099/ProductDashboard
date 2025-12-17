<?php
require_once 'config/db.php';
// pagination
$limit = 10;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);

$offset = ($page - 1) * $limit;


//add product
if(isset($_POST['add_product'])){
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("INSERT INTO products (name, price, category, quantity) VALUES (:name, :price, :category, :quantity)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();

    header("Location: index.php");
}

// UPDATE PRODUCT
if(isset($_POST['update_product'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];

    $stmt = $pdo->prepare("UPDATE products SET name=:name, price=:price, category=:category, quantity=:quantity WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();

    header("Location: index.php");
}

// FETCHDATA
$stmt = $pdo->prepare("SELECT * FROM products ORDER BY id DESC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();

$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

$editRow = null;
if(isset($_GET['edit_id'])){
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id=:id");
    $stmt->bindParam(':id', $_GET['edit_id']);
    $editRow = $stmt->execute() ? $stmt->fetch(PDO::FETCH_ASSOC) : null;
}

$totalRecords = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$totalPages = ceil($totalRecords / $limit);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<h2 class="mb-3">Product dashboard</h2>
<div class="card-body mb-4">
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $editRow ? $editRow['id'] : ''; ?>">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="name" class="form-control" placeholder="Product Name" value="<?php echo $editRow ? $editRow['name'] : ''; ?>" required>
            </div>
            <div class="col-md-3">
                <input type="number" step="0.01" name="price" class="form-control" placeholder="Price" value="<?php echo $editRow ? $editRow['price'] : ''; ?>" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="category" class="form-control" placeholder="Category" value="<?php echo $editRow ? $editRow['category'] : ''; ?>" required>
            </div>
            <div class="col-md-3">
            <input type="number" name="quantity" class="form-control" placeholder="Quantity" min="1"value="<?php echo $editRow['quantity'] ?? 1 ?>" required>
            </div>
            <div class="col-md-3 mt-3">
                <?php if($editRow): ?>
                    <button type="submit" name="update_product" class="btn btn-primary">Update Product</button>
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                <?php else: ?>
                    <button type="submit" name="add_product" class="btn btn-success">Add Product</button>
                <?php endif; ?>
            </div>
        </div>
    </form>
</div>
<!-- Import csv -->
<div class="card mb-4">
    <div class="card-header">Import CSV</div>
    <div class="card-body">
        <form method="POST" action="import.php" enctype="multipart/form-data">
            <input type="file" name="file" required>
            <button class="btn btn-primary">Import</button>
        </form>
    </div>
</div>
<!-- chart -->
<div class="card mb-4">
    <div class="card-header">
        <h4>Product Chart</h4>
    </div>
    <div class="card-body" style="height:350px">
        <canvas id="categoryChart"></canvas>
    </div>
</div>

<!-- DataTable -->
 <div class="mb-4">
<table class="table table-bordered ">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product): ?>
        <tr>
            <td><?php echo htmlspecialchars($product['id']); ?></td>
            <td><?php echo htmlspecialchars($product['name']); ?></td>
            <td><?php echo htmlspecialchars($product['price']); ?></td>
            <td><?php echo htmlspecialchars($product['category']); ?></td>
            <td><?php echo htmlspecialchars($product['quantity']); ?></td>
            <td>
                <a href="index.php?edit_id=<?php echo $product['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<!-- Pagination -->
 <nav>
    <ul class="pagination justify-content-center">

        <!-- Previous -->
        <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page - 1 ?>">Previous</a>
        </li>

        <!-- Page Numbers -->
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next -->
        <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page + 1 ?>">Next</a>
        </li>

    </ul>
</nav>

</div>
</body>
<script>
async function loadChartData() {
    const response = await fetch('api/chart_data.php');
    const data = await response.json();

    const labels = data.map(item => item.category);
    const counts = data.map(item => item.count);

    const ctx = document.getElementById('categoryChart').getContext('2d');

    // Destroy old chart if exists
    if (window.categoryChart instanceof Chart) {
        window.categoryChart.destroy();
    }

    window.categoryChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Products',
                data: counts,
                barthickness:40,
                borderWidth: 1
            }]
        },
        options: {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
        y: {
            beginAtZero: true,
            ticks: {
                stepSize: 10,
                precision: 0
            }
        }
    },
    plugins: {
        legend: {
            display: true
        }
    }
}
    });
}

loadChartData();
</script>
</html>