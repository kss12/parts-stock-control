<?php include "includes\head.php"; ?>

        <h1 class="mb-4">Suppliers List</h1>
        <!-- Fetch and display supplier data from the database -->
        <?php
        // Include your database connection code here

        $sql = "SELECT * FROM Suppliers";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Supplier ID</th>';
            echo '<th>Supplier Name</th>';
            echo '<th>Contact Person</th>';
            echo '<th>Email</th>';
            echo '<th>Phone</th>';
            echo '<th>Address</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row["SupplierID"] . '</td>';
                echo '<td>' . $row["SupplierName"] . '</td>';
                echo '<td>' . $row["ContactName"] . '</td>';
                echo '<td>' . $row["ContactEmail"] . '</td>';
                echo '<td>' . $row["ContactPhone"] . '</td>';
                echo '<td>' . $row["Address"] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo "No suppliers found.";
        }
        ?>
        <a href='includes\new_supplier.php' class='mt-4 btn btn-primary'>Add Suppliers</a>
        
    </div>

<?php include "includes\bottom.php"; ?>