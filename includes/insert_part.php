    <?php
    include 'head2.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Include your database connection code here
        include 'connect.php';
        
        $partName = $_POST["partName"];
        $partNumber = $_POST["partNumber"];
        $partNumberOld = $_POST["partNumberOld"];
        $description = $_POST["description"];
        $supplierID = $_POST["supplierID"];
        $stockQuantity = $_POST["stockQuantity"];
        $reorderLevel = $_POST["reorderLevel"];
        $location = $_POST["location"];
        $unitPrice = $_POST["unitPrice"];
        $lastRestockDate = $_POST["lastRestockDate"];
    

        $partNumber = $_POST["partNumber"];

        // Check for duplicates
        $duplicateQuery = "SELECT COUNT(*) FROM Parts WHERE PartNumber = '$partNumber'";
        $result = mysqli_query($conn, $duplicateQuery);

        if ($result) {
            $row = mysqli_fetch_array($result);
            $count = $row[0];

            if ($count > 0) {
                // Part already exists, show an error or redirect to a page with an error message
                echo "Error: Part with Part Number $partNumber already exists.";
            } else {
                // Part is not a duplicate, proceed with the insertion
                // Your insertion code here
                        // Perform database insert query
                $sql = "INSERT INTO Parts (PartName, PartNumber, PartNumberOld, Description, SupplierID, StockQuantity, ReorderLevel, Location, UnitPrice, LastRestockDate)
                VALUES ('$partName', '$partNumber', '$partNumberOld', '$description', $supplierID, $stockQuantity, $reorderLevel, '$location', $unitPrice, '$lastRestockDate')";

                // Execute the query
                if (mysqli_query($conn, $sql)) {
                    echo "Part added successfully.";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);           
        }
        echo " </br> <a href='..\index.php' class='mt-4 btn btn-light'>Home</a>  <a href='..\addparts.php' class='mt-4 btn btn-dark'>Add More Parts</a> ";
    }
    ?>
