<?php include 'includes\head.php'; ?>
    <div class="container">
        <h1 class="mt-4">Restock Parts with Barcode Scanner</h1>
        <form method="POST" action="includes\scannerRestock.php">
            <div class="form-group">
                <label for="barcode">Scan Barcode:</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="barcode" id="barcode" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary" id="scanButton">Scan</button>
                    </div>
                </div>
            </div>

            <!-- Restock Quantity input -->
            <div class="form-group">
                <label for="restockQuantity">Restock Quantity:</label>
                <input type="number" class="form-control" name="restockQuantity" id="restockQuantity" required>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Restock</button>
        </form>
    </div>

    <!-- Include jQuery and JavaScript for barcode scanning functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // Input field for scanned barcode
        var barcodeInput = $("#barcode");

        // Add an input event listener to the barcode input field
        barcodeInput.on("input", function (event) {
            // Retrieve the scanned barcode value
            var scannedBarcode = event.target.value;

            // You can perform further actions with the scanned barcode here
            barcodeInput.val(scannedBarcode);
        });
    });
</script>

<?php include 'includes\bottom.php';?>