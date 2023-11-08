<?php
include "includes\head.php";
?>
        <h1 class="mt-4">Restock Parts</h1>
        
        <div class="row g-1">
        <a class="btn btn-success" href="addparts.php">Add New Parts</a>
        </div>
</br>
        <div class="row g-1">
        <a class="btn btn-primary" href="scanner.php">Use Scanner</a>
        </div>

        <form method="POST" action="includes\restock.php">
            <div class="row g-1">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo '<div class="col-md-6">';
                   echo '<div class="form-group">';
                    echo '<label for="partNumber' . $i . '"> <strong>Part Number: ' . $i . '</strong></label>';
                    echo '<input type="text" class="form-control" name="partNumber[]" id="partNumber' . $i . '">';
                    echo '</div>';
                    echo '<div class="form-group">';
                    echo '<label for="restockQuantity' . $i . '">Restock Quantity: ' . $i . '</label>';
                    echo '<input type="number" class="form-control" name="restockQuantity[]" id="restockQuantity' . $i . '">';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Restock</button>
        </form>
    </div>        

<?php
include "includes\bottom.php";
?>