<?php include "includes\head.php"; ?>

        <div class="container mt-4">
        <?php
        if (isset($error)) {
            echo '<div class="alert alert-danger" role="alert">' . $error . '</div>';
        }
        ?>
            <h1 class="mb-4">Add New Parts</h1>
            <form method="POST" action="includes\insert_part.php" class="mt-4">
                <div class="mb-3">
                    <label for="partName" class="form-label">Part Name:</label>
                    <input type="text" class="form-control" name="partName" required>
                </div>
        
                <div class="mb-3">
                    <label for="partNumber" class="form-label">Part Number:</label>
                    <input type="text" class="form-control" name="partNumber" required>
                </div>
        
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
                    <select class="form-select" name="supplierID" required>
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
                    <input type="number" class="form-control" name="stockQuantity" required>
                </div>
        
                <div class="mb-3">
                    <label for="reorderLevel" class="form-label">Reorder Level:</label>
                    <input type="number" class="form-control" name="reorderLevel" required>
                </div>
                
                <div class="mb-3">
                    <label for="location" class="form-label">Location:</label>
                    <input type="text" class="form-control" name="location">
                </div>

                <div class="mb-3">
                    <label for="unitPrice" class="form-label">Unit Price:</label>
                    <input type="number" class="form-control" name="unitPrice" step="0.01" required>
                </div>
        
                <div class="mb-3">
                    <label for="lastRestockDate" class="form-label">Last Restock Date:</label>
                    <input type="date" class="form-control" name="lastRestockDate" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Part</button>
            </form>
        </div>
        
    
<?php include "includes\bottom.php"; ?>