
<?php include "includes\head.php"; ?>
<?php
if (isset($_GET["partID"])) {
    // Include your database connection code here
    include "includes\connect.php";

    $partID = $_GET["partID"];

    // SQL query to retrieve part details based on Part Number
    $selectQuery = "SELECT * FROM Parts WHERE PartID = '$partID'";
    $result = mysqli_query($conn, $selectQuery);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        // Retrieve part details
        $partName = $row["PartName"];
        $partNumber = $row["PartNumber"];
        $oldPartNumber = $row["PartNumberOld"];
        $description = $row["Description"];
        $supplierID = $row["SupplierID"];
        $location = $row["Location"];
        $stockQuantity = $row["StockQuantity"];
        $unitPrice = $row["UnitPrice"];
        $lastRestockDate = $_POST["lastRestockDate"];
      
        // Retrieve other details
        echo '<form>';
        echo    '<div class="mb3"';
        echo        '<label for="partName" class="form-label"> Part Name: </label>';
        echo        '<input type="text" class="form-control" id="partName" aria-describedby="" value="'. $partName .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="partNumber" class="form-label"> Part Number: </label>';
        echo        '<input type="text" class="form-control" id="partNumber" aria-describedby="" value="'. $partNumber .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="oldPartNumber" class="form-label"> Old Part Number: </label>';
        echo        '<input type="text" class="form-control" id="oldPartNumber" aria-describedby="" value="'. $oldPartNumber .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="description" class="form-label"> Description: </label>';
        echo        '<input type="text" class="form-control" id="description" aria-describedby="" value="'. $description .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="supplierID" class="form-label"> Supplier ID: </label>';
        echo        '<input type="number" class="form-control" id="supplierID" aria-describedby="" value="'. $supplierID .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="location" class="form-label"> Location: </label>';
        echo        '<input type="text" class="form-control" id="location" aria-describedby="" value="'. $location .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="stockQuantity" class="form-label"> Stock Quantity: </label>';
        echo        '<input type="number" class="form-control" id="stockQuantity" aria-describedby="" value="'. $stockQuantity .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="unitPrice" class="form-label"> Unit Price: </label>';
        echo        '<input type="" class="form-control" id="unitPice" aria-describedby="" value="'. $unitPrice .'">';
        echo    '</div>';
        echo    '<div class="mb3"';
        echo        '<label for="lastRestockDate" class="form-label"> Last Restock Date: </label>';
        echo        '<input type="" class="form-control" id="lastRestockDate" aria-describedby="" value="'. $lastRestockDate .'">';
        echo    '</div>';

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
