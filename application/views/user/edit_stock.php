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
							<div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Transfer Stock</h6>
							</div>
                    	<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_stock') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row"> 
								<div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Vender Name</label>
                                              <?php foreach ($vender as $vender_info) { 
                                              if($vender_info['id']==$stock[0]['vender_name']){?>
                                          							<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $vender_info['vender_name']?>" readonly>
                                          							<input type="hidden" name="vender_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $vender_info['id']?>" readonly>
                                          							<?php } }?>
                                        </div>
									<div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Select Stock Place Name</label>
                                            <select name="stock_place_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
                                                <option value="">Select Stock Place</option>
                                                <?php foreach ($stock_place as $stock_place_info) { ?>
                                                    <option value="<?= $stock_place_info['id']; ?>">
                                                        <?= $stock_place_info['place_name']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        	<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Transfer code</label>
											<input type="text"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Purchase Code" value="<?= $user[0]['purchase_code'] ?>-<?= $product[0]['purchase_code'] ?>"readonly>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
                                           <label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                     <input type="date" name="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                              placeholder="Purchase Date" >
                                              </div>

											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">

									
										<hr>
										<div class="container-fluid">
											<div class="row">
												<div class="xl:w-6/4 lg:w-4/3">
													<div class="card flex flex-col max-sm:mb-[30px] profile-card">
												
														<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Product Name</label>
																	
																			<?php foreach ($product_list as $product_info) { 
																			    if($product_info['id'] == $stock[0]['product_name']){?>
						<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $product_info['product_name']; ?>" readonly>
												<input type="hidden" name="product_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $product_info['id']; ?>" readonly>
																<?php } } ?>
																	</div>


																	<!-- Net Quantity Field with Unit Dropdown -->
																	<div class="flex items-center sm:w-1/3 w-full mb-[30px]">
																		<!-- Net Quantity Input -->
																		<div class="sm:w-2/3 w-full">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Net Quantity</label>
																			<input type="text" name="packing" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $stock[0]['packing'] ?>">
																		</div>
																		<!-- Unit Dropdown -->
																		<div class="sm:w-1/3 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                                                                           						<input type="text" name="unit" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $stock[0]['unit'] ?>" readonly>
																		</div>
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
																			<input type="hidden" name="product"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  value="<?= $stock[0]['p_id'] ?>">
																		<input type="hidden" name="transfer_code"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  value="<?= $stock[0]['purchase_code'] ?>">
																		<input type="hidden"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity"  id="available" value="<?= $stock[0]['availabile_quantity'] ?>">
																		<input type="text" name="quantity" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $stock[0]['availabile_quantity'] ?>">
																	
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
																		<input type="text" name="unit_rate" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Unit Rate" id="unit-rate" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $stock[0]['unit_rate'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax(IN %)</label>
																		<input type="text" name="gst_percent" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax" id="tax" oninput="calculateTotalPrice(this.closest('.row'))"  value="<?= $stock[0]['gst_percent'] ?>">
																	</div>
																		<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
  						<input type="text" name="tax_type" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $stock[0]['tax_type'] ?>" readonly>
</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
																		<input type="text" name="gst_tax" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax Amount" id="tax-amount" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $stock[0]['gst_tax'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Unit Price</label>
																		<input type="text" name="p_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="total Unit Amount" id="total-unit-price" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $stock[0]['p_price'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">mrp</label>
																		<input type="text" name="MRP" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="MRP Price" id="mrp" oninput="calculateTotalPrice(this.closest('.row'))"value="<?= $stock[0]['MRP'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Selling Price</label>
																		<input type="text" name="selling_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Selling Price" id="selling-price" oninput="calculateTotalPrice(this.closest('.row'))"value="<?= $stock[0]['selling_price'] ?>">
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
																		<input type="text" name="total_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" value="<?= $stock[0]['total_price'] ?>">
																	</div>
																		<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">expire date</label>
																		<input type="date" name="exp_date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Date"  value="<?= $stock[0]['exp_date'] ?>">
                                                                    </div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
																		<input type="text" name="HSN_code" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="HSN Code" value="<?= $stock[0]['HSN_code'] ?>">
																	</div>
																		</div>
																		
																</div>
															</div>
														
															<!--<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">-->
															<!--	<button type="button" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add More Product</button>-->
															<!--</div>-->
															<hr>
													    	<div class="container-fluid">
															<div class="row">
																<!-- Total Quantity Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Total Quantity</label>
																	<input type="text" id="total-quantity" name="total_quantity" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="total quantity" value="">
																</div>

																<!-- Subtotal Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Sub Total</label>
																	<input type="text" id="sub-total" name="sub_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="subtotal" value="">
																</div>

																<!-- Discount Type Dropdown -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Type</label>
																	<select id="discount-type" name="discount_type"class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
																		<option value="0" >Select Discount type</option>
																		<option value="percent" >Discount in Percentage</option>
																		<option value="rupee">Discount in Rupee</option>
																	</select>
																</div>

																<!-- Discount Value Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Value</label>
																	<input type="text" id="discount-value" name="discount_value" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="enter discount value" >
																</div>

																<!-- Grand Total Field -->
																<div class="sm:w-1 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Grand Total</label>
																	<input type="text" id="grand-total" name="grand_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="grand total">
																</div>
															</div>

					
					</div>
				</div>
		</div>
	</div>
</div>
																			
									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary" type="submit" >Transfer</button>
									</div>
							</form>
                           
						</div>
					</div>
				</div>
            </div>
        </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function calculateTotalPrice(row) {
    // Retrieve relevant input values
    const quantityInput = row.querySelector('input[name="quantity"]');
    const unitRateInput = row.querySelector('input[name="unit_rate"]');
    const taxInput = row.querySelector('input[name="gst_percent"]');
    const totalUnitPriceInput = row.querySelector('input[name="p_price"]');
    const taxAmountInput = row.querySelector('input[name="gst_tax"]');
    const totalPriceInput = row.querySelector('input[name="total_price"]');

    // Parse values as floats
    const quantity = parseFloat(quantityInput.value) || 0;
    const unitRate = parseFloat(unitRateInput.value) || 0;
    const tax = parseFloat(taxInput.value) || 0;

    // Calculate total unit price
    const totalUnitPrice = quantity * unitRate;
    totalUnitPriceInput.value = totalUnitPrice.toFixed(2);

    // Calculate tax amount
    const taxAmount = (totalUnitPrice * tax) / 100;
    taxAmountInput.value = taxAmount.toFixed(2);

    // Calculate final total price
    const totalPrice = totalUnitPrice + taxAmount;
    totalPriceInput.value = totalPrice.toFixed(2);
    updateSubTotal();
    updateGrandTotal();
}


function updateSubTotal() {
    const totalPriceInputs = document.querySelectorAll('input[name="total_price"]');
    const quantityInputs = document.querySelectorAll('input[name="quantity"]');
    
    let subTotal = 0;
    let totalQuantity = 0;

    totalPriceInputs.forEach(input => {
        subTotal += parseFloat(input.value) || 0;
    });

    quantityInputs.forEach(input => {
        totalQuantity += parseFloat(input.value) || 0;
    });

    document.getElementById('sub-total').value = subTotal.toFixed(2);
    document.getElementById('total-quantity').value = totalQuantity; // Update the total quantity
}

function updateGrandTotal() {
    const subTotal = parseFloat(document.getElementById('sub-total').value) || 0;
    const discountType = document.getElementById('discount-type').value;
    const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;

    let grandTotal = subTotal;

    if (discountType === 'percent') {
        grandTotal -= (subTotal * discountValue) / 100;
    } else if (discountType === 'rupee') {
        grandTotal -= discountValue;
    }

    document.getElementById('grand-total').value = grandTotal.toFixed(2);
}


// Event listeners for changes in discount
document.getElementById('discount-type').addEventListener('change', updateGrandTotal);
document.getElementById('discount-value').addEventListener('input', updateGrandTotal);

// Ensure jQuery is loaded and handle the button event




</script>
<script>

    $(document).on('input', 'input[name="quantity"]', function() {
        checkAvailablePaid($(this));
    });

    function checkAvailablePaid(element) {
        var grandTotal = parseFloat($('#available').val()) || 0;
        var paid = parseFloat(element.val()) || 0;

        if (paid > grandTotal) {
            alert("Available Quantity Is " + grandTotal);
            element.val(''); // Reset the input field
        }
    }
</script>
<?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>

</body>
</html>
