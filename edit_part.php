<?php
if (isset($_GET["partID"])) {
    // Include your database connection code here
    include 'connect.php';

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
        
        // Retrieve other details

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
