<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Supplier</title>
    <!-- Include Bootstrap CSS (adjust the path as needed) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>   
    <div class="container-md">
        <div class="navbarNav">
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="..\images\mechanic-tools-logo.jpg" alt="" width="90" height="72"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link"href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="addparts.php">Add Parts</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active"  aria-current="page"  href="suppliers.php">Suppliers</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="reorder.php">Reorder</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="partslogout.php">Log Out Parts</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        </div>
        <h1 class="mt-4">Add a New Supplier</h1>
        <form method="POST" action="insert_supplier.php" class="mt-4">
            <div class="form-group">
                <label for="supplierName">Supplier Name:</label>
                <input type="text" class="form-control" name="supplierName" required>
            </div>
            <div class="form-group">
                <label for="contactName">Contact Name:</label>
                <input type="text" class="form-control" name="contactName" required>
            </div>
            <div class="form-group">
                <label for="contactEmail">Contact Email:</label>
                <input type="email" class="form-control" name="contactEmail" required>
            </div>
            <div class="form-group">
                <label for="contactPhone">Contact Phone:</label>
                <input type="text" class="form-control" name="contactPhone" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" name="address" rows="4"></textarea>
            </div>
        </br>
            <button type="submit" class="btn btn-primary">Add Supplier</button>
        </form>
    </div>

    
    <!-- Include Bootstrap JS (adjust the path as needed) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>