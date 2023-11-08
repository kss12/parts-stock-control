<?php
include 'head2.php';
// Include your database connection code
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barcode = $_POST["barcode"];
    $restockQuantity = $_POST["restockQuantity"];

    // Look up the part using the scanned barcode and update the stock quantity
    $sql = "UPDATE Parts SET StockQuantity = StockQuantity + ? WHERE Barcode = ?"; // Replace "Barcode" with your actual column name

    // Prepare and execute the query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $restockQuantity, $barcode);

    if ($stmt->execute()) {
        echo "Restocked $restockQuantity units of part with barcode $barcode successfully. </br>";
    } else {
        echo "Error: " . $stmt->error ."</br>";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
}

// Add "Return to Restock" and "Return to Index" buttons
echo '<a href="..\restocking.php" class="mt-4 btn btn-primary">Return to Restock</a> </br>';
echo '<a href="..\index.php" class="mt-4 btn btn-primary">Return Home</a>';
?>
