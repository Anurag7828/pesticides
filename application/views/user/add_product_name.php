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
                            <h6 class="text-[15px] font-medium text-body-color title relative">Add Your Product </h6>
                            <a href="<?= base_url('Admin_Dashboard/product_name/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Product</a><br>
                        </div>

                        <form class="profile-form" action="<?= base_url('admin_Dashboard/add_product_name/'.encryptId($user['0']['id']).'/0') ?>" method="post" enctype="multipart/form-data">
                            <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                <div class="row">
                                    <div class="sm:w-1/3 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Product Name</label>
                                        <input type="text" name="product_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Product Name" value="" id="product_name" required>
                                        <!-- <div id="product_name_error" class="error-message text-[12px] mt-2"></div> -->
                                        
                                        <input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $user['0']['id']?>">
                                    </div>
                                    <div class="sm:w-1/3 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Technical Name</label>
                                        <input type="text" name="teach_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Technical Name" value="">
                                    </div>
                                    <div class="sm:w-1/3 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Company Name</label>
                                        <input type="text" name="company_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Company Name" value="">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
                                        <input type="text" name="HSN" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="HSN Code" value="">
                                    </div>
                                    <div class="flex  sm:w-1/3 w-full mb-[30px]">
																
																		<div class="sm:w-2/6 w-full">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Packing Quantity</label>
																			<input type="number" name="packing" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" required>
																		</div>
															
																		<div class="sm:w-2/6 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Net Unit</label>
																			<select name="net_unit" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																				<option value="grams">Grams</option>
																				<option value="liters">Liters</option>
																				<option value="kilograms">Kilograms</option>
																			</select>
																		</div>
																	</div>
                                                                    <div class="sm:w-1/6 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
																			<select name="unit" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																				<option value="Single">Single</option>
																				<option value="Box">Box</option>
																			
																			</select>
																		</div>
                                                                        <script>
                                                                            document.addEventListener('DOMContentLoaded', function() {
    const unitSelects = document.querySelectorAll('select[name="unit"]');

    unitSelects.forEach(unitSelect => {
        unitSelect.addEventListener('change', function() {
            const row = this.closest('.product-row');
            const perQuantityContainer = row.querySelector('.per-quantity-container');

            if (this.value === 'Box') {
                if (!perQuantityContainer) {
                    const newFields = document.createElement('div');
                    newFields.classList.add('per-quantity-container', 'flex', 'gap-4', 'mt-2');
                    newFields.innerHTML = `
                        <div class="w-1/2">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Per Box Quantity</label>
                            <input type="number" name="box_quantity[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Box Quantity" required>
                        </div>
                        <div class="w-1/2">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Price</label>
                            <input type="number" name="per_quantity_price[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Per Quantity Price" required>
                        </div>
                    `;
                    row.appendChild(newFields);
                }
            } else {
                if (perQuantityContainer) {
                    perQuantityContainer.remove();
                }
            }
        });
    });
});

                                                                        </script> <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
                                        <input type="text" name="purchase_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Price" value="">
                                    </div> 
                                   <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax(In %)</label>
                                        <input type="text" name="tax" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax(In %)" value="">
                                    </div> <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
                                        <select name="tax_type" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																				<option value="Inclusive">Inclusive</option>
																				<option value="Exclusive">Exclusive</option>
																			
																			</select>
                                    </div>
                                    <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
                                        <input type="text" name="tax_amount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax Amount" value="">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price With Tax</label>
                                        <input type="text" name="total_purchase_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Price With Tax" value="">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">MRP</label>
                                        <input type="text" name="mrp" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="MRP" value="">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Profit Margin (In %)</label>
                                        <input type="text" name="profit_margin" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Profit Margin" value="">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Seles Price</label>
                                        <input type="text" name="selling_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Seles Price" value="">
                                    </div>
                                  
                                </div>
                            </div>
                            <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                <button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add Product</button>
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
