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
			<!-- row -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">

					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div
								class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Your product
								</h6>
							</div>

							<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_product_name') ?>"
								method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Product
												Name</label>
											<input type="text" name="product_name"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="product name"
												value="<?= $product_name[0]['product_name'] ?>">
											<input type="hidden" name="id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $product_name['0']['id'] ?>">
											<input type="hidden" name="user_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $user['0']['id'] ?>">
											<input type="hidden" name="branch_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $product_name['0']['branch_id'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Technical
                                                Name</label>
                                            <input type="text" name="teach_name"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                placeholder="Technical Name" value="<?= $product_name[0]['teach_name'] ?>">
                                        </div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Company
												Name</label>
											<input type="text" name="company_name"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Company name"
												value="<?= $product_name[0]['company_name'] ?>">
											<input type="hidden" name="id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $product_name['0']['id'] ?>">
											<input type="hidden" name="user_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $user['0']['id'] ?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
											<input type="text" name="HSN"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="HSN Code" value="<?= $product_name['0']['HSN'] ?>">
										</div>
										<div class="flex  sm:w-1/2 w-full mb-[30px]">

											<div class="sm:w-2/6 w-full">
												<label class="text-dark dark:text-white text-[13px] mb-2">Packing
													Quantity</label>
												<input type="number" name="packing"
													class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
													placeholder="Quantity"
													oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));"
													onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
													required value="<?= $product_name['0']['packing'] ?>">
											</div>

											<div class="sm:w-2/6 w-full pl-3">
												<label class="text-dark dark:text-white text-[13px] mb-2">Net
													Unit</label>
												<select name="net_unit"
													class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
													required>
													<option value="Gram" <?= ($product_name[0]['net_unit'] == 'Gram') ? 'selected' : '' ?>>Gram</option>
													<option value="Liter" <?= ($product_name[0]['net_unit'] == 'Liter') ? 'selected' : '' ?>>Liter</option>
													<option value="Kilograms"
														<?= ($product_name[0]['net_unit'] == 'Kilogram') ? 'selected' : '' ?>>Kilogram</option>
												</select>

											</div>
										</div>
										<div class="sm:w-1/3 w-full pl-3">
											<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
											<select name="unit"  id="unitdetail"
												class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
												required>
												<option value="Single" <?= ($product_name[0]['unit'] == 'Single') ? 'selected' : '' ?>>Single</option>
												<option value="Box" <?= ($product_name[0]['unit'] == 'Box') ? 'selected' : '' ?>>Box</option>

											</select>
										</div>
									
											<div  id="perunitDetails"
                                            style="display:contents;">
											<div class="sm:w-1/3 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2 ">Per Box
													Quantity</label>
												<input type="text" name="box_per_unit"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Per Box Quantity"
													value="<?= $product_name[0]['box_per_unit'] ?>">
											</div>
											<div class="sm:w-1/4 w-full mb-[30px] ml-4 ">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Purchase
													Price</label>
												<input type="text" name="box_per_unit_price"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Purchase Price"
													value="<?= $product_name['0']['box_per_unit_price'] ?>">
											</div>
											<div class="sm:w-1/3 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Tax(In %)</label>
												<input type="text" name="per_tax"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Tax(In %)" value="<?= $product_name['0']['per_tax'] ?>">
											</div>
											<div class="sm:w-1/4 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Tax Type</label>
												<select name="per_tax_type"
													class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
													required>
													<option value="Inclusive" <?= ($product_name[0]['per_tax_type'] == 'Inclusive') ? 'selected' : '' ?>>Inclusive</option>
													<option value="Exclusive" <?= ($product_name[0]['per_tax_type'] == 'Exclusive') ? 'selected' : '' ?>>Exclusive</option>

												</select>
											</div>
											<div class="sm:w-1/3 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Tax Amount</label>
												<input type="text" name="per_tax_amount"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Tax Amount" value="<?= $product_name['0']['per_tax_amount'] ?>">
											</div>
											<div class="sm:w-1/3 w-full mb-[30px] mr-4 ml-4" >
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Purchase Price
													With Tax</label>
												<input type="text" name="per_total_purchase_price"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Purchase Price With Tax"
													value="<?= $product_name['0']['per_total_purchase_price'] ?>">
											</div>
											<div class="sm:w-1/6 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity MRP</label>
												<input type="text" name="per_mrp"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="MRP" value="<?= $product_name['0']['per_mrp'] ?>">
											</div>
											<div class="sm:w-1/4 w-full mb-[30px] mr-4 ml-4">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Profit Margin (In
													%)</label>
												<input type="text" name="per_profit_margin"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Profit Margin"
													value="<?= $product_name['0']['per_profit_margin'] ?>">
											</div>
											<div class="sm:w-1/6 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Sales
													Price</label>
												<input type="text" name="box_per_unit_sales_price"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Seles Price"
													value="<?= $product_name['0']['box_per_unit_sales_price'] ?>">
											</div>
											<div class="sm:w-1/6 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Sales
													Price B</label>
												<input type="text" name="box_per_unit_sales_priceB"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Seles Price"
													value="<?= $product_name['0']['box_per_unit_sales_priceB'] ?>">
											</div>
											<div class="sm:w-1/6 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2">Per Quantity Sales 
													Price C</label>
												<input type="text" name="box_per_unit_sales_priceC"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
													placeholder="Seles Price"
													value="<?= $product_name['0']['box_per_unit_sales_priceC'] ?>">
											</div>
											</div>
											<h4 class="sm:w-1 w-full mb-[30px]"id="boxheading"
											style="display:none;">Box Detail</h4>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase
												Price</label>
											<input type="text" name="purchase_price"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Purchase Price"
												value="<?= $product_name['0']['purchase_price'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Tax(In %)</label>
											<input type="text" name="tax"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Tax(In %)" value="<?= $product_name['0']['tax'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
											<select name="tax_type"
												class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
												required>
												<option value="Inclusive" <?= ($product_name[0]['tax_type'] == 'Inclusive') ? 'selected' : '' ?>>Inclusive</option>
												<option value="Exclusive" <?= ($product_name[0]['tax_type'] == 'Exclusive') ? 'selected' : '' ?>>Exclusive</option>

											</select>
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
											<input type="text" name="tax_amount"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Tax Amount" value="<?= $product_name['0']['tax_amount'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price
												With Tax</label>
											<input type="text" name="total_purchase_price"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Purchase Price With Tax"
												value="<?= $product_name['0']['total_purchase_price'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">MRP</label>
											<input type="text" name="mrp"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="MRP" value="<?= $product_name['0']['mrp'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Profit Margin (In
												%)</label>
											<input type="text" name="profit_margin"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Profit Margin"
												value="<?= $product_name['0']['profit_margin'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Sales
												Price</label>
											<input type="text" name="selling_price"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Seles Price"
												value="<?= $product_name['0']['selling_price'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Sales
												Price B</label>
											<input type="text" name="selling_priceB"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Seles Price"
												value="<?= $product_name['0']['selling_priceB'] ?>">
										</div>
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Sales
												Price C</label>
											<input type="text" name="selling_priceC"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Seles Price"
												value="<?= $product_name['0']['selling_priceC'] ?>">
										</div>
									</div>

								</div>
								<div
									class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button
										class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary"
										type="submit">Update Product</button>
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
	document.addEventListener('DOMContentLoaded', function () {
    const perDetails = document.getElementById('perunitDetails');
    const boxDetails = document.getElementById('boxheading');
    const unitSelect = document.getElementById('unitdetail');

    function toggleDetails() {
        if (unitSelect.value === 'Single') {
            perDetails.style.display = 'none';
            boxDetails.style.display = 'none';
        } else {
            perDetails.style.display = 'contents';
            boxDetails.style.display = 'block';
        }
    }

    // Check on page load
    toggleDetails();

    // Event listener for unit change
    unitSelect.addEventListener('change', toggleDetails);
});
document.getElementById('unitdetail').addEventListener('change', function () {
            var perDetails = document.getElementById('perunitDetails');
          
            var boxDetails = document.getElementById('boxheading');
            var boxDetails2 = document.getElementById('boxheading2');

            if (this.value === 'Single') { // Corrected from 'Unit' to 'Box'
                perDetails.style.display = 'none';
               
                boxDetails.style.display = 'none';
            

            } else {
                perDetails.style.display = 'contents';
             
                boxDetails.style.display = 'block';
               

            }
        });


		document.addEventListener('DOMContentLoaded', function () {
    const purchasePriceInput = document.querySelector('input[name="purchase_price"]');
    const taxInput = document.querySelector('input[name="tax"]');
    const taxAmountInput = document.querySelector('input[name="tax_amount"]');
    const totalPurchasePriceInput = document.querySelector('input[name="total_purchase_price"]');
    const profitMarginInput = document.querySelector('input[name="profit_margin"]');
    const sellingPriceInput = document.querySelector('input[name="selling_price"]');
	const sellingPriceInputB = document.querySelector('input[name="selling_priceB"]');
	const sellingPriceInputC = document.querySelector('input[name="selling_priceC"]');
    const taxTypeSelect = document.querySelector('select[name="tax_type"]');

    const perpurchasePriceInput = document.querySelector('input[name="box_per_unit_price"]');
    const pertaxInput = document.querySelector('input[name="per_tax"]');
    const pertaxAmountInput = document.querySelector('input[name="per_tax_amount"]');
    const pertotalPurchasePriceInput = document.querySelector('input[name="per_total_purchase_price"]');
    const perprofitMarginInput = document.querySelector('input[name="per_profit_margin"]');
    const persellingPriceInput = document.querySelector('input[name="box_per_unit_sales_price"]');
	const persellingPriceInputB = document.querySelector('input[name="box_per_unit_sales_priceB"]');
	const persellingPriceInputC = document.querySelector('input[name="box_per_unit_sales_priceC"]');
    const pertaxTypeSelect = document.querySelector('select[name="per_tax_type"]');

    function calculateTaxAndTotal(isPer = false) {
        const priceInput = isPer ? perpurchasePriceInput : purchasePriceInput;
        const taxInputField = isPer ? pertaxInput : taxInput;
        const taxAmountInputField = isPer ? pertaxAmountInput : taxAmountInput;
        const totalPurchasePriceInputField = isPer ? pertotalPurchasePriceInput : totalPurchasePriceInput;
        const taxTypeSelectField = isPer ? pertaxTypeSelect : taxTypeSelect;

        const purchasePrice = parseFloat(priceInput.value) || 0;
        const taxPercentage = parseFloat(taxInputField.value) || 0;
        const taxType = taxTypeSelectField.value;

        let taxAmount = 0;
        let totalPurchasePrice = purchasePrice;

        if (taxType === 'Inclusive') {
            taxAmount = purchasePrice - (purchasePrice / (1 + taxPercentage / 100));
        } else {
            taxAmount = purchasePrice * (taxPercentage / 100);
            totalPurchasePrice += taxAmount;
        }

        taxAmountInputField.value = taxAmount.toFixed(2);
        totalPurchasePriceInputField.value = totalPurchasePrice.toFixed(2);
        calculateSellingPrice(isPer);
    }

    function calculateSellingPrice(isPer = false) {
        const totalPurchasePriceInputField = isPer ? pertotalPurchasePriceInput : totalPurchasePriceInput;
        const profitMarginInputField = isPer ? perprofitMarginInput : profitMarginInput;
        const sellingPriceInputField = isPer ? persellingPriceInput : sellingPriceInput;
		const sellingPriceInputFieldB = isPer ? persellingPriceInputB : sellingPriceInputB;
		const sellingPriceInputFieldC = isPer ? persellingPriceInputC: sellingPriceInputB;

        const totalPurchasePrice = parseFloat(totalPurchasePriceInputField.value) || 0;
        const profitMargin = parseFloat(profitMarginInputField.value) || 0;

        const sellingPrice = totalPurchasePrice + (totalPurchasePrice * profitMargin / 100);
		const sellingPriceB = totalPurchasePrice + (totalPurchasePrice * profitMargin / 100);
		const sellingPriceC = totalPurchasePrice + (totalPurchasePrice * profitMargin / 100);
        sellingPriceInputField.value = sellingPrice.toFixed(2);
		sellingPriceInputFieldB.value = sellingPriceB.toFixed(2);
		sellingPriceInputFieldC.value = sellingPriceC.toFixed(2);
    }

    // Event Listeners for Normal
    purchasePriceInput.addEventListener('input', () => calculateTaxAndTotal(false));
    taxInput.addEventListener('input', () => calculateTaxAndTotal(false));
    taxTypeSelect.addEventListener('change', () => calculateTaxAndTotal(false));
    profitMarginInput.addEventListener('input', () => calculateSellingPrice(false));

    // Event Listeners for Per Unit
    perpurchasePriceInput.addEventListener('input', () => calculateTaxAndTotal(true));
    pertaxInput.addEventListener('input', () => calculateTaxAndTotal(true));
    pertaxTypeSelect.addEventListener('change', () => calculateTaxAndTotal(true));
    perprofitMarginInput.addEventListener('input', () => calculateSellingPrice(true));
});

	</script>
</body>

</html>