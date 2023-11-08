<?php include "includes\head.php";?>
        <h1 class="mt-4">Reorder List</h1>

        <?php
        // Include your database connection code here

        // Query the database for parts with stock quantity less than or equal to reorder level
        $sql = "SELECT p.PartName, p.PartNumber, p.StockQuantity, p.ReorderLevel, s.SupplierName
        FROM Parts p
        INNER JOIN Suppliers s ON p.SupplierID = s.SupplierID
        WHERE p.StockQuantity <= p.ReorderLevel";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<ul class="list-group mt-4">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li class="list-group-item">
                        <strong>' . $row["PartName"] . ', </br> Part Number: ' . $row["PartNumber"] . ',  </br> Supplier: ' . $row["SupplierName"] . '</strong>,</br> 
                        (Stock Quantity: ' . $row["StockQuantity"] . ', Reorder Level: ' . $row["ReorderLevel"] . ')
                      </li>';
            }
            echo '</ul>';
        } else {
            echo "<p class='mt-4'>No parts require reorder.</p>";
        }
        ?>
    </div>

<?php include "includes\bottom.php"; ?>
