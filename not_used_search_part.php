<?php include "includes\head.php"; ?>

        <h1 class="mt-4">Part Search</h1>
        <form method="POST" action="search_part.php">
            <div class="form-group">
                <label for="partName">Enter Part Name:</label>
                <input type="text" class="form-control" name="partName" id="partName">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        
        <!-- Display Search Results -->
        <?php
        // Include your database connection code
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["searchTerm"])) {
            // Include your database connection code here
            include 'connect.php';
        
            $searchTerm = $_GET["searchTerm"];
            
            // SQL query using the LIKE operator for partial search
            $searchQuery = "SELECT * FROM Parts WHERE PartName LIKE '%$searchTerm%' OR PartNumber LIKE '%$searchTerm%'";
        
            $result = mysqli_query($conn, $searchQuery);
        
            if ($result) {
                // Display search results as needed
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "Part Name: " . $row["PartName"] . "<br>";
                    echo "Part Number: " . $row["PartNumber"] . "<br>";
                    // Display other details as needed
                    echo "<br>";
                }
        
                // Close the database connection
                mysqli_close($conn);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $partName = $_POST["partName"];

            // SQL query to retrieve part details based on PartName
            $sql = "SELECT p.*, s.SupplierName
                    FROM Parts p
                    INNER JOIN Suppliers s ON p.SupplierID = s.SupplierID
                    WHERE p.PartName = ?";

            // Prepare and execute the query
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $partName);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if any rows were found
            if ($result->num_rows > 0) {
                echo '<h2 class="mt-4">Part Details</h2>';
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card mt-2">';
                    echo '<div class="card-body">';
                    
                    // Output the details, including the supplier name
                    echo "<p class='card-text'><strong>Part ID: </strong>" . $row['PartID'] . "</p>";
                    echo "<p class='card-text'><strong>Part Name: </strong>" . $row['PartName'] . "</p>";
                    echo "<p class='card-text'><strong>Supplier Name: </strong>" . $row['SupplierName'] . "</p>";
                    echo "<p class='card-text'><strong>Part Number: </strong>" . $row['PartNumber'] . "</p>";
                    echo "<p class='card-text'><strong>Old Part Number: </strong>" . $row['PartNumberOld'] . "</p>";
                    echo "<p class='card-text'><strong>Description: </strong>" . $row['Description'] . "</p>";
                    echo "<p class='card-text'><strong>Stock Qauntity: </strong>" . $row['StockQuantity'] . "</p>";
                    echo "<p class='card-text'><strong>Unit Price: </strong>" . $row['UnitPrice'] . "</p>";
                    // Output other details as needed

                    echo '</div>'; // Close card-body
                    echo '</div>'; // Close card
                    $partID = $row['PartID'];
                    echo '<a href="edit_part.php?partID=' . $partID . '" class="btn btn-primary">Edit</a>';
                }
            } else {
                echo '<p class="mt-2">No results found for part: ' . $partName . '</p>';
            }

            // Close the database connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
    <?php include "includes\bottom.php"; ?>
