<?php
include 'head2.php';
include 'connect.php';

// Check if PartID is provided in the URL
if (isset($_GET['PartID'])) {
    $partID = $_GET['PartID'];

    // Fetch existing part details based on PartID
    $sqlSelectPart = "SELECT * FROM Parts WHERE PartID = ?";
    $stmtSelectPart = $conn->prepare($sqlSelectPart);
    $stmtSelectPart->bind_param("i", $partID);

    if ($stmtSelectPart->execute()) {
        $result = $stmtSelectPart->get_result();

        if ($result->num_rows > 0) {
            $part = $result->fetch_assoc();
        } else {
            echo "Part not found.";
            exit();
        }
    } else {
        echo "Error fetching part details: " . $stmtSelectPart->error;
        exit();
    }

    $stmtSelectPart->close();

    // Check if the form is submitted for updating
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated part details from the form
        $updatedPartName = $_POST['partName'];
        $updatedPartNumber = $_POST['partNumber'];
        $updatedPartNumberOld = $_POST['partNumberOld'];
        $updatedDescription = $_POST['description'];
        $updatedLocation = $_POST['location'];
        $updatedSupplierID = $_POST['supplierID'];
        $updatedStockQuantity = $_POST['stockQuantity'];
        $updatedReorderLevel = $_POST['reorderLevel'];
        $updatedUnitPrice = $_POST['unitPrice'];
        $updatedLastRestockDate = $_POST['lastRestockDate'];

        // Update part details in the database
        $sqlUpdatePart = "UPDATE Parts
                          SET PartName = ?, PartNumber = ?, OldPartNumber = ?, Description = ?, Location = ?, SupplierID = ?,
                              StockQuantity = ?, ReorderLevel = ?, UnitPrice = ?, LastRestockDate = ?
                          WHERE PartID = ?";
        $stmtUpdatePart = $conn->prepare($sqlUpdatePart);
        $stmtUpdatePart->bind_param("sssssiiddsi",
            $updatedPartName, $updatedPartNumber, $updatedPartNumberOld, $updatedDescription, $updatedLocation, $updatedSupplierID,
            $updatedStockQuantity, $updatedReorderLevel, $updatedUnitPrice, $updatedLastRestockDate, $partID);

        if ($stmtUpdatePart->execute()) {
            echo "Part updated successfully. </br> <a href='index.php' class='mt-4 btn btn-primary'>Home</a> ";
        } else {
            echo "Error updating part details: " . $stmtUpdatePart->error;
        }

        $stmtUpdatePart->close();
    }
} else {
    echo "PartID not provided.";
}

$conn->close();
?>

<!-- HTML form for editing parts -->
<h1 class="mt-4">Edit Part</h1>
<form method="POST" action="update_parts.php" class="mt-4">
    <div class="form-group">
        <label for="PartName">Part Name:</label>
        <input type="text" name="PartName" value="<?php echo $part['PartName']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="PartNumber">Part Number:</label>
        <input type="text" name="PartNumber" value="<?php echo $part['PartNumber']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="PartNumberOld">Old Part Number:</label>
        <input type="text" name="PartNumberOld" value="<?php echo $part['PartNumberOld']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="Description">Description:</label>
        <input type="text" name="Description" value="<?php echo $part['Description']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="Location">Location:</label>
        <input type="text" name="Location" value="<?php echo $part['Location']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="supplierID">Supplier ID:</label>
        <input type="number" name="supplierID" value="<?php echo $part['SupplierID']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="stockQuantity">Stock Quantity:</label>
        <input type="number" name="stockQuantity" value="<?php echo $part['StockQuantity']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="reorderLevel">Reorder Level:</label>
        <input type="number" name="reorderLevel" value="<?php echo $part['ReorderLevel']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="unitPrice">Unit Price:</label>
        <input type="number" name="unitPrice" value="<?php echo $part['UnitPrice']; ?>"><br>
    </div>
    <div class="form-group">
        <label for="lastRestockDate">Last Restock Date:</label>
        <input type="date" name="lastRestockDate" value="<?php echo $part['LastRestockDate']; ?>"><br>
    </div>
    <br>
    <!-- Include other fields (PartNumber, Description, SupplierID, StockQuantity, ReorderLevel, UnitPrice, LastRestockDate) here -->

    <button type="submit" class="btn btn-primary">Update Part</button>
</form>
</div>
