<!DOCTYPE html>
<html>
<head>
    <title>Update Part Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Update Part Details</h1>
        <form method="POST" action="update_part.php">
            <div class="form-group">
                <div class="mb-3">
                <label for="partNumber">Part Number:</label>
                <input type="text" class="form-control" name="partNumber" id="partNumber" required>
                </div>

            <!-- Add more form fields for the details you want to update -->
            <div class="mb-3">
                    <label for="partNumberOld" class="form-label">Old Part Number:</label>
                    <input type="text" class="form-control" name="partNumberOld">
                </div>

                <div class="mb-3">
                    <label for="barcode" class="form-label">Barcode Number:</label>
                    <input type="text" class="form-control" name="barcode">
                </div>
        
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
        
                <div class="mb-3">
                    <label for="supplierID" class="form-label">Supplier:</label>
                    <select class="form-select" name="supplierID" >
                        <option value="">Select a Supplier</option>
                        <?php
                        // Include your database connection code here
                        include 'connect.php';
                        $sql = "SELECT SupplierID, SupplierName FROM Suppliers";
                        $result = mysqli_query($conn, $sql);
    
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row["SupplierID"] . '">' . $row["SupplierName"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
        
                <div class="mb-3">
                    <label for="stockQuantity" class="form-label">Stock Quantity:</label>
                    <input type="number" class="form-control" name="stockQuantity" >
                </div>
        
                <div class="mb-3">
                    <label for="reorderLevel" class="form-label">Reorder Level:</label>
                    <input type="number" class="form-control" name="reorderLevel" >
                </div>
                
                <div class="mb-3">
                    <label for="location" class="form-label">Location:</label>
                    <input type="text" class="form-control" name="location">
                </div>

                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price:</label>
                    <input type="number" class="form-control" name="unitPrice" step="0.01">
                </div>
        
                </div>
            
            <button type="submit" class="btn btn-primary">Update Part</button>
        </form>
    </div>
</body>
</html>
