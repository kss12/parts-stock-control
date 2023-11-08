<?php include "includes\head.php"; ?>

<div class="container">
    <h1 class="mt-4">Parts Log Out with Barcode Scanner</h1>
    <form method="POST" action="includes\log_parts_used.php">
        <!-- Part 1 -->
        <div class="form-group">
            <label for="barcode1">Part 1:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="barcode1" id="barcode1" required>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" id="scanButton1">Scan</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutQuantity1">Logout Quantity (Part 1):</label>
            <input type="number" class="form-control" name="logoutQuantity1" id="logoutQuantity1" required>
        </div>

        <!-- Part 2 -->
        <div class="form-group">
            <label for="barcode2">Part 2:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="barcode2" id="barcode2">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" id="scanButton2">Scan</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutQuantity2">Logout Quantity (Part 2):</label>
            <input type="number" class="form-control" name="logoutQuantity2" id="logoutQuantity2">
        </div>

        <!-- Part 3 -->
        <div class="form-group">
            <label for="barcode3">Part 3:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="barcode3" id="barcode3">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" id="scanButton3">Scan</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutQuantity3">Logout Quantity (Part 3):</label>
            <input type="number" class="form-control" name="logoutQuantity3" id="logoutQuantity3">
        </div>

        <!-- Part 4 -->
        <div class="form-group">
            <label for="barcode4">Part 4:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="barcode4" id="barcode4">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" id="scanButton4">Scan</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutQuantity4">Logout Quantity (Part 4):</label>
            <input type="number" class="form-control" name="logoutQuantity4" id="logoutQuantity4">
        </div>

        <!-- Part 5 -->
        <div class="form-group">
            <label for="barcode5">Part 5:</label>
            <div class="input-group">
                <input type="number" class="form-control" name="barcode5" id="barcode5">
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary" id="scanButton5">Scan</button>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="logoutQuantity5">Logout Quantity (Part 5):</label>
            <input type="number" class="form-control" name="logoutQuantity5" id="logoutQuantity5">
        </div>

        <!-- Add more parts as needed -->

        <button type="submit" class="btn btn-primary mt-4">Log Out</button>
    </form>
</div>
    <script>
    $(document).ready(function () {
        // Input fields for scanned barcodes
        var barcodeInputs = [$("#barcode1"), $("#barcode2"), $("#barcode3"), $("#barcode4"), $("#barcode5")]; // Add more as needed

        // Add an input event listener for each barcode input field
        barcodeInputs.forEach(function (barcodeInput, index) {
            barcodeInput.on("input", function (event) {
                var scannedBarcode = event.target.value;
                // You can perform further actions with the scanned barcode here, e.g., update associated quantity input field
                var quantityInput = $("#logoutQuantity" + (index + 1)); // Assuming your quantity input fields are named logoutQuantity1, logoutQuantity2, logoutQuantity3, and so on
                quantityInput.val(""); // Clear the quantity input field when a new barcode is scanned
            });
        });
    });
    </script>

<?php include "includes\bottom.php"; ?>