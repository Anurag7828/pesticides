<!DOCTYPE html>
<html lang="en">

<head>	
 
    <?php include "includes2/header-links.php" ?>
</head>

<body class="selection:text-white selection:bg-primary">
<!-- Main wrapper start -->
<div id="main-wrapper" class="relative">
    <?php include "includes2/header.php" ?>
    <?php include "includes2/sidebar.php" ?>	

    <!-- Content body start -->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="xl:w-6/4 lg:w-4/3">
                    <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                        <div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                            <h6 class="text-[15px] font-medium text-body-color title relative">Upload CSV File Fromate</h6>
                            <a href="<?= base_url('Admin_Dashboard/download_sample_csv') ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">Download sample</a><br>
                        </div>

                        <form class="profile-form" action="<?= base_url('Admin_Dashboard/upload_product_csv/' . encryptId($user['0']['id'])) ?>"
                        method="post" enctype="multipart/form-data">
                            <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                <div class="row">
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Upload CSV Format </label>
                                        <input type="file" name="csv_file" accept=".csv" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  required>
                                
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                <button type="submit" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content body end -->

    <?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>

<script>
    // Listen for input event on the product_name field
    document.getElementById('product_name').addEventListener('input', function() {
        var productName = this.value;

        // Reset the error message
        document.getElementById('product_name_error').innerHTML = '';

        // If input is empty, do not proceed
        if (productName.trim() === '') {
            return;
        }

        // Perform AJAX request to check for existing product name
        fetch('<?= base_url('admin_Dashboard/check_product_name') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ product_name: productName })
        })
        .then(response => response.json())
        .then(data => {
            if (data.exists) {
                // If product name exists, show an error message below the input
                document.getElementById('product_name_error').innerHTML = 'Product Name already exists!';
                document.getElementById('product_name').classList.add('border-red-500'); // Add red border for error
                document.getElementById('product_name_error').style.backgroundColor = "#f8d7da"; // Light red background
                document.getElementById('product_name_error').style.padding = "5px"; // Add padding for better visibility
                document.getElementById('product_name_error').style.borderRadius = "5px"; // Rounded corners
            } else {
                // If product name is available, remove any error message
                document.getElementById('product_name_error').innerHTML = '';
                document.getElementById('product_name').classList.remove('border-red-500');
                document.getElementById('product_name_error').style.backgroundColor = "transparent"; // Reset background
            }
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
    const purchasePriceInput = document.querySelector('input[name="purchase_price"]');
    const taxInput = document.querySelector('input[name="tax"]');
    const taxAmountInput = document.querySelector('input[name="tax_amount"]');
    const totalPurchasePriceInput = document.querySelector('input[name="total_purchase_price"]');
    const profitMarginInput = document.querySelector('input[name="profit_margin"]');
    const sellingPriceInput = document.querySelector('input[name="selling_price"]');
    const taxTypeSelect = document.querySelector('select[name="tax_type"]');

    function calculateTaxAndTotal() {
        const purchasePrice = parseFloat(purchasePriceInput.value) || 0;
        const taxPercentage = parseFloat(taxInput.value) || 0;
        const taxType = taxTypeSelect.value;

        let taxAmount = 0;
        let totalPurchasePrice = purchasePrice;

        if (taxType === 'Inclusive') {
            taxAmount = purchasePrice - (purchasePrice / (1 + taxPercentage / 100));
        } else {
            taxAmount = purchasePrice * (taxPercentage / 100);
            totalPurchasePrice += taxAmount;
        }

        taxAmountInput.value = taxAmount.toFixed(2);
        totalPurchasePriceInput.value = totalPurchasePrice.toFixed(2);

        calculateSellingPrice(); // Update selling price after tax calculation
    }

    function calculateSellingPrice() {
        const totalPurchasePrice = parseFloat(totalPurchasePriceInput.value) || 0;
        const profitMargin = parseFloat(profitMarginInput.value) || 0;

        const sellingPrice = totalPurchasePrice + (totalPurchasePrice * profitMargin / 100);
        sellingPriceInput.value = sellingPrice.toFixed(2);
    }

    // Event Listeners
    purchasePriceInput.addEventListener('input', calculateTaxAndTotal);
    taxInput.addEventListener('input', calculateTaxAndTotal);
    taxTypeSelect.addEventListener('change', calculateTaxAndTotal);
    profitMarginInput.addEventListener('input', calculateSellingPrice);
});

</script>
</body>
</html>
