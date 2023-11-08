<?php
include 'head2.php';
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    for ($i = 1; $i <= 5; $i++) { // Change to the number of parts you have
        $barcode = $_POST["barcode" . $i];
        $logoutQuantity = $_POST["logoutQuantity" . $i];

        $sql = "UPDATE Parts SET StockQuantity = StockQuantity - ? WHERE Barcode = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $logoutQuantity, $barcode);

        if ($stmt->execute()) {
            $logMessages[] = "Logged out $logoutQuantity units of part $i with barcode $barcode successfully.";
        } else {
            $logMessages[] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();

    // Output log messages as an HTML list
    echo "<ul>";
    foreach ($logMessages as $message) {
        echo "<li>" . $message . "</li>";
    }
    echo "</ul>";

    // Add a "Return Home" button
    echo '<a href="../index.php" class="btn btn-primary">Return Home</a>';
}
?>