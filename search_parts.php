<?php include "includes\head.php"; ?>


<h1 class="mt-4">Part Search</h1>
<form method="GET" action="search_parts.php">
    <div class="form-group">
        <label for="searchTerm"><strong>Search Term:</strong></label>
        <input type="text" class="form-control" name="searchTerm" id="searchTerm" placeholder="Enter search term">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Search</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["searchTerm"])) {
    // Include your database connection code here
    include 'includes/connect.php';

    $searchTerm = $_GET["searchTerm"];
    
    // SQL query using the LIKE operator for partial search
    $searchQuery = "SELECT p.*, s.SupplierName
                    FROM Parts p
                    INNER JOIN Suppliers s ON p.SupplierID = s.SupplierID
                    WHERE p.PartName LIKE '%$searchTerm%' OR PartNumber LIKE '%$searchTerm%'";
    

    $result = mysqli_query($conn, $searchQuery);

    if ($result) {
        // Display search results as needed
        echo '<h2 class="mt-4">Part Details</h2>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="card mt-2">';
            echo '<div class="card-body">';

            echo "<p class='card-text'><strong>Part ID: </strong>" . $row['PartID'] . "</p>";
            echo "<p class='card-text'><strong>Part Name: </strong>" . $row['PartName'] . "</p>";
            echo "<p class='card-text'><strong>Supplier Name: </strong>" . $row['SupplierName'] . "</p>";
            echo "<p class='card-text'><strong>Part Number: </strong>" . $row['PartNumber'] . "</p>";
            echo "<p class='card-text'><strong>Old Part Number: </strong>" . $row['PartNumberOld'] . "</p>";
            echo "<p class='card-text'><strong>Description: </strong>" . $row['Description'] . "</p>";
            echo "<p class='card-text'><strong>Location: </strong>" . $row['Location'] . "</p>";
            echo "<p class='card-text'><strong>Stock Qauntity: </strong>" . $row['StockQuantity'] . "</p>";
            echo "<p class='card-text'><strong>Unit Price: </strong>" . $row['UnitPrice'] . "</p>";
            echo "<p class='card-text'><strong>Last Restock Date: </strong>" . $row['LastRestockDate'] . "</p>";
            // Display other details as needed
            echo "<br>";
            echo '</div>'; // Close card-body
            echo '</div>'; // Close card
            $partID = $row['PartID'];
            echo '<a href="includes\update_parts.php?PartID=' . $partID . '" class="btn btn-primary">Edit</a>';
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include "includes\bottom.php"; ?>