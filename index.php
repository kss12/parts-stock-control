<?php
include "includes\head.php";
?>
      
        <h1 class="mt-4">Parts List</h1>
      

        <?php
        // Include your database connection code here
        $sql = "SELECT p.PartName, p.PartNumber, p.PartNumberOld, p.Description, s.SupplierName, p.StockQuantity, p.ReorderLevel, p.UnitPrice, p.LastRestockDate
        FROM Parts p
        LEFT JOIN Suppliers s ON p.SupplierID = s.SupplierID";

        // Execute the query
        $result = $conn->query($sql);
        // Perform database select query
        //$sql = "SELECT * FROM Parts";
        //$result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped table-bordered mt-4 table-hover">';
            echo '<thead class="thead-dark">
                    <tr>
                        <th>Part Name</th>
                        <th>Part Number</th>
                        <th>Old P/N</th>
                        <th>Description</th>
                        <th>Supplier Name</th>
                        <th>Stock Quantity</th>
                        <th>Last Restock Date</th>
                    </tr>
                  </thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["PartName"] . "</td>";
                echo "<td>" . $row["PartNumber"] . "</td>";
                echo "<td>" . $row["PartNumberOld"] . "</td>";
                echo "<td>" . $row["Description"] . "</td>";
                echo "<td>" . $row["SupplierName"] . "</td>";
                echo "<td>" . $row["StockQuantity"] . "</td>";
                echo "<td>" . $row["LastRestockDate"] . "</td>";
                echo "</tr>";
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "<p>No parts found.</p>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </div>
    
<?php
include "includes\bottom.php";
?>