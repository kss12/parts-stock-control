<?php
include 'head2.php';
// Include your database connection code
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $partNumbers = $_POST["partNumber"];
    $restockQuantities = $_POST["restockQuantity"];

    // Loop through submitted data and update the database for each part
    for ($i = 0; $i < count($partNumbers); $i++) {
        $partNumber = $partNumbers[$i];
        $restockQuantity = $restockQuantities[$i];

        // SQL query to update the stock quantity for the specified part
        $sql = "UPDATE Parts SET StockQuantity = StockQuantity + ? WHERE PartNumber = ?";

        // Prepare and execute the query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $restockQuantity, $partNumber);

        if ($stmt->execute()) {
            echo "Restocked $restockQuantity units of $partNumber successfully.<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
        
        // Close the prepared statement for the current part
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
}

// Add "Return to Restock" and "Return to Index" buttons
echo '<a href="..\restocking.php" class="mt-4 btn btn-primary">Return to Restock</a> </br>';
echo '<a href="..\index.php" class="mt-4 btn btn-primary">Return Home</a>';
?>