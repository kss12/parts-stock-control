    <?php
    include 'head2.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include your database connection code here

        include 'connect.php';

        $supplierName = $_POST["supplierName"];
        $contactName = $_POST["contactName"];
        $contactEmail = $_POST["contactEmail"];
        $contactPhone = $_POST["contactPhone"];
        $address = $_POST["address"];

        // Perform database insert query
        $sql = "INSERT INTO Suppliers (SupplierName, ContactName, ContactEmail, ContactPhone, Address)
                VALUES ('$supplierName', '$contactName', '$contactEmail', '$contactPhone', '$address')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo '<div class="container mt-4 alert alert-success">Supplier added successfully.</div> </br> <a href="..\suppliers.php" class="mt-4 btn btn-primary">Suppliers</a> ';
        } else {
            echo '<div class="container mt-4 alert alert-danger">Error: ' . mysqli_error($conn) . '</div>';
        }
    }
    ?>

