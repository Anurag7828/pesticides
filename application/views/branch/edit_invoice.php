<!DOCTYPE html>
<html lang="en">


<head>

	<?php include "includes2/header-links.php" ?>
<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
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
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Invoice</h6>
								<!--<a href="<?= base_url('Branch_Dashboard/vender/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Venders</a><br>-->
							</div>
							<form class="profile-form" action="<?= base_url('Branch_Dashboard/edit_invoice?user_id=' . $user[0]['id'] . '&invoice_no=' . $invoice[0]['invoice_no'])  ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
									    	<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select Stock</label>
											<select name="stock_place" id="stock_place" onchange="filterProducts()"  class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select Stock</option>
												<?php foreach ($stock_list as $stock_info) { ?>
													<option value="<?= $stock_info['id']; ?>"<?= ($invoice[0]['stock_place'] == $stock_info['id'] ) ? 'selected' : ''; ?>>
														<?= $stock_info['place_name']; ?>
													</option>
												<?php } ?>
												
											</select>
										
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">
                                            <input type="hidden" name="uid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['user_id'] ?>">

										</div>
                                 
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select Customer</label>
											<select name="customer_name" id="customer-name"class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select Customer</option>
												<?php foreach ($customer_list as $customer_info) { ?>
													<option value="<?= $customer_info['id']; ?>" <?= ($customer_info['name'] == $customer['0']['name'] || $customer_info['id']==$invoice[0]['customer_name']) ? 'selected' : ''; ?>>
														<?= $customer_info['name']; ?>-	<?= $customer_info['contact']; ?>
													</option>
												<?php } ?>
												
											</select>
										
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">

										</div>
                                        <div class="sm:w-1/4 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
																		<input type="date" name="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $invoice[0]['date']?>"   >
																	</div>
										<hr>
										<div class="container-fluid">
											<!-- Other HTML code -->
											<div class="row">
												<div class="xl:w-6/4 lg:w-4/3">
													<div class="card flex flex-col max-sm:mb-[30px] profile-card">

														<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
														    	<?php  
                                                                  $i=0;
                                                                  $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'],'branch_id',$user[0]['id'],'user_id',$user[0]['user_id']  ); ?>
														<?php foreach ($p_produc as $p_info) : $i++;?>
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/3 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
																	  <select name="p_name[]" class="category-select choices form-control"
        id="category-select<?= $i ?>" data-index="<?= $i ?>"
        data-selected="<?= $p_info['p_name'] ?>" required>
    <option value="">Select Product</option>
    <?php foreach ($product_list as $product_info) { ?>
        <option value="<?= $product_info['id']; ?>"
            <?= ($p_info['p_name'] == $product_info['id']) ? 'selected' : ''; ?>>
            <?= $product_info['product_name']; ?>
        </option>
    <?php } ?>
</select>
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Net Quantity</label>
																		<select name="packing[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="sub-category-select<?=$i?>" required>
        <option selected>Select Packing</option>
        <!-- Options will be populated dynamically -->
        	<?php  $pp_produc = $this->CommonModal->getRowById('purchase_product', 'p_id', $p_info['packing']  ); ?>
         <option value="<?= $p_info['packing'] ; ?>"<?= ($p_info['packing']==$pp_produc[0]['p_id'] ) ? 'selected' : ''; ?>><?= $pp_produc[0]['packing'] ; ?><?= $pp_produc[0]['unit'] ; ?></option>
    </select>
    <input type="hidden" name="unit[]" id="unit<?=$i?>" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  " data-index="${rowIndex}" placeholder="Unit " required value="<?= $p_info['unit']?> " >
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
														 			<input type="hidden" name="available_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="available<?=$i?>"  required readonly value="<?= $pp_produc[0]['availabile_quantity']?> ">
														 			<input type="hidden"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="availablee<?=$i?>"  required readonly value="<?= $pp_produc[0]['quantity']?>">
														 		
														 		<input type="text" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="blankquantity<?=$i?>" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['quantity']?> " >
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
																		<input type="hidden" name="invoice_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  id="p_id<?=$i?>" value=" <?= $p_info['id']?> " required readonly>
																<input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  id="p_id<?=$i?>" value=" <?= $p_info['packing']?> " required readonly>
																		<input type="text" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Unit Rate" id="unit-rate<?=$i?>" oninput="calculateTotalPrice(this.closest('.row'))" required value="<?= $p_info['unit_rate']?> ">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
																		<input type="text" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" required value="<?= $p_info['total_price']?> ">
																	</div>
																</div>
															</div>
																<?php endforeach; ?>
															<!--<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">-->
															<!--	<button type="button" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add Product</button>-->
															<!--</div>-->
															<hr>
                                                            <div class="row">
															<div class="sm:w-1/4 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"></label> Sub Total
																<input type="text" id="grand-total"name="grand_total[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="total price" value="<?= $invoice[0]['grand_total']?> ">
															</div>
                                                           <div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Type</label>
																	<select id="discount-type" name="discount_type" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
																		<option value="percent" >Select Discount type</option>
																		<option value="percent"<?= ( $invoice[0]['discount_type'] == 'percent' ) ? 'selected' : ''; ?>>Discount in Percentage</option>
																		<option value="rupee"<?= ( $invoice[0]['discount_type'] =='rupee' ) ? 'selected' : ''; ?>>Discount in Rupee</option>
																	</select>
																</div>

																<!-- Discount Value Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Value</label>
																	<input type="text" id="discount-value" name="discount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="enter discount value" value="<?= $invoice[0]['discount']?> ">
																</div>
                                                             <div class="sm:w-1/4 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"></label> Total Without Tax
																<input type="text" id="total-without" name="total_without_tax" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder=" Total Without Tax" value="<?= $invoice[0]['total_without_tax']?>">
															</div>
                                                            </div>
                                                               <div class="row">
															<div class="sm:w-1/4 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"></label> Tax Amount (GST <?= $u[0]['tax']?>%)
															<input type="hidden" id="tax" value="<?= $u[0]['tax']?>" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="total price">
																<input type="text" id="tax-amount" name="tax_amount" value="<?= $invoice[0]['tax_amount']?>" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="total price">
															</div>
                                                         
                                                            <div class="sm:w-1/4 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"></label>Final Total
																<input type="text" id="final-total" name="final_total" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Final Total" value="<?= $invoice[0]['final_total']?>">
															</div>
                                                            </div>
                                                            <hr>
                                                            <hr>
                                                             <?php
                                                                   $invoice_payment =$this->CommonModal->getRowByIdOrderByLimit3('payment', 'invoice_no',  $invoice[0]['invoice_no'],'branch_id',$user_id[0]['id'],'user_id',$user[0]['user_id'],'id','ASC','1');
                                                                   ?>
                                                            <div class="row">
														
                                                            <div class="sm:w-1/3 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Payment Mode</label>
																		<select name="mode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                        <option value="Cash"<?= strpos($invoice_payment[0]['mode'] , 'Cash') !== false ? 'selected' : '' ?>>CASH</option>
                                                        <option value="Upi"<?= strpos($invoice_payment[0]['mode'] , 'Upi') !== false ? 'selected' : '' ?>>UPI</option>
                                                        <option value="Card"<?= strpos($invoice_payment[0]['mode'] , 'Card') !== false ? 'selected' : '' ?>>CREADIT/DEBIT</option>
                                                        <option value="Bank"<?= strpos($invoice_payment[0]['mode'] , 'Bank') !== false ? 'selected' : '' ?>>Bank Transfer</option>
                                                        <option value="Cheque"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Cheque') !== false ? 'selected' : '' ?>>Cheque</option>
                                                          <option value="None"<?= strpos($invoice_payment[0]['mode'] , 'None') !== false ? 'selected' : '' ?>>None</option>

    </select>
															</div>
																<div class="sm:w-1/3 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"></label>Paid Amount
																<input type="text"  name="paid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount"  value="<?= $invoice_payment[0]['paid'] ?>">
																     <input type="hidden" name="p_p_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $invoice_payment[0]['id'] ?>">
															</div>
                                                            <div class="sm:w-1/3 w-full mb-[30px]"  id="bankDetails" style="display:none;">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																		<select name="bank" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="bankAccount" >
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                        
                                                                        
                                                                        foreach ($account as $account_info) { ?>
                                                        <option value="<?= $account_info['id']?>"<?= strpos($invoice_payment[0]['bank'] , $account_info['id']) !== false ? 'selected' : '' ?>><?= $account_info['bank_name']?>-<?= $account_info['account_no']?></option>
                                                        <?php } ?>
                                                      

    </select>
															</div>
															 <div class="sm:w-1/3 w-full mb-[30px]"
                                                                                    id="chequeDetails"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Cheque Number</label>
                                                            <input type="text" name="cheque_no"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="Cheque Number"
                                                                                       id="cheque" value="<?= $invoice_payment[0]['cheque_no']?>" >
                                                                                </div>
                                                            </div>
														</div>
														<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
															<button type="submit" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update Invoice</button>
														</div>
													</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Content body end -->
		 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
		<script>
// Function to add a new product row


  

    var stockPlaceId = document.querySelector('select[name="stock_place"]').value;
    var productSelect = newProductRow.querySelector(`.category-select[data-index="${rowIndex}"]`);

    if (stockPlaceId) {
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_products_by_stock_place") ?>',
            type: 'POST',
            data: { stock_place_id: stockPlaceId },
            dataType: 'json',
            success: function(products) {
                // Clear existing options before appending new ones
                productSelect.innerHTML = '<option value="">Select Product</option>';

                // Loop through the products and add them as options
                products.forEach(function(product) {
                    productSelect.innerHTML += '<option value="' + product.pro_id + '">' + product.product_name + '</option>';
                });
            },
            error: function() {
                console.error('Failed to fetch products.');
            }
        });
    }
}
// Function to delete a product row
function deleteProductForm(button) {
    const productRow = button.closest('.product-row');
    productRow.remove();
	updateGrandTotal(); 
}

// Function to calculate total price based on quantity and unit rate

function calculateTotalPrice(row) {
                const quantity = row.querySelector('input[name="quantity[]"]').value || 0;
                const unitRate = row.querySelector('input[name="unit_rate[]"]').value || 0;
                const totalPriceInput = row.querySelector('input[name="total_price[]"]');
                
                const totalPrice = (quantity * unitRate).toFixed(2);
                totalPriceInput.value = totalPrice;
                updateGrandTotal();
            }

            // Function to update the grand total
                    function updateGrandTotal() {
    const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
    let grandTotal = 0;

    // Calculate the grand total
    totalPriceInputs.forEach(input => {
        grandTotal += parseFloat(input.value) || 0;
    });

    // Get discount details
    const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;
    const discountType = document.getElementById('discount-type').value;
    let discountAmount = 0;

    // Calculate discount amount
    if (discountType === 'percent') {
        discountAmount = (grandTotal * discountValue) / 100;
    } else if (discountType === 'rupee') {
        discountAmount = discountValue;
    }

    // Calculate final total after discount
    const finalTotalWithoutTax = grandTotal - discountAmount;

    // Ensure final total does not go negative
    const adjustedFinalTotal = Math.max(finalTotalWithoutTax, 0);

    // Calculate tax
    const taxRate = parseFloat(document.getElementById('tax').value) || 0;
    const taxAmount = (adjustedFinalTotal * taxRate) / 100;

    // Calculate final total including tax
    const finalTotalWithTax = adjustedFinalTotal + taxAmount;

    // Update UI
    document.getElementById('grand-total').value = grandTotal.toFixed(2);
    document.getElementById('total-without').value = adjustedFinalTotal.toFixed(2);
    document.getElementById('tax-amount').value = taxAmount.toFixed(2);
    document.getElementById('final-total').value = finalTotalWithTax.toFixed(2);
}
// Use event delegation for dynamically added product rows
$(document).on('change', '.category-select', function() {
    fetchProductDetails(this);
});

// AJAX function to fetch packing and unit rate data
function fetchProductDetails(selectElement) {
    var selectedProductId = selectElement.value;
    var rowIndex = $(selectElement).data('index'); // Get the row index
    var subCategorySelect = $(`.sub-category-select[data-index="${rowIndex}"]`);
    var unitRateField = $(`.unit-rate-select[data-index="${rowIndex}"]`);
    var unitField = $(`.unit-select[data-index="${rowIndex}"]`);
        var pId = $(`.p-id-select[data-index="${rowIndex}"]`);
   var availableQuantity  = $(`.available-quantity[data-index="${rowIndex}"]`);
   
    // Clear previous options
    subCategorySelect.html('<option selected>Select Packing</option>');
    unitRateField.val(''); // Reset unit rate field
    unitField.val('');
    availableQuantity.val('');// Reset unit field
pId.val('');
    // Fetch packing options via AJAX based on product id
    if (selectedProductId) {
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_subcategories/") ?>' + selectedProductId, // Adjust the URL to match your route
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (Array.isArray(data)) {
                    $.each(data, function(index, subCategory) {
                        if (subCategory.p_id) {
                            subCategorySelect.append('<option value="' + subCategory.p_id + '">' + subCategory.packing + ' ' + subCategory.unit + '</option>');
                        }
                    });
                }
            },
            error: function() {
                console.error('Failed to fetch packing data.');
            }
        });
    }

    // Attach event handler for subcategory select change (handle both unit rate and unit in one event)
    subCategorySelect.off('change').on('change', function() {
        var selectedPacking = $(this).val();
        fetchPackingDetails(selectedPacking, unitRateField, unitField,availableQuantity,pId);
    });
}

// Function to fetch both unit rate and unit based on the selected packing
function fetchPackingDetails(selectedPacking, unitRateField, unitField,availableQuantity,pId) {
    if (selectedPacking) {
        // Fetch unit rate
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_unit_rate/") ?>' + selectedPacking, // Update with your actual route for unit rate
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.unit_rate) {
                    unitRateField.val(data.unit_rate);
                       availableQuantity.val(data.availabile_quantity); 
                      pId.val(data.p_id); 
                } else {
                    unitRateField.val('');
                    availableQuantity.val('');
                    pId.val('');
                }
            },
            error: function() {
                console.error('Failed to fetch unit rate.');
            }
        });

        // Fetch unit
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_unit/") ?>' + selectedPacking, // Update with your actual route for unit
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.unit) {
                    unitField.val(data.unit);
                } else {
                    unitField.val('');
                }
            },
            error: function() {
                console.error('Failed to fetch unit.');
            }
        });
    } else {
        unitRateField.val('');
        unitField.val('');
        availableQuantity.val('');
        pId.val('');
    }
}

// Add new product row on button click
$('#add-product-btn').on('click', function() {
    addProductForm();
});


    

</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
        <?php
                                                            $i=0;
                                                             $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'],'branch_id',$user[0]['id'],'user_id',$user[0]['user_id']); ?>
                                                            <?php foreach ($p_produc as $p_info): $i++;?>
$(document).ready(function() {
    $('#category-select<?=$i?>').change(function() {
        var selectedCategory = $(this).val();
        var subCategorySelect = $('#sub-category-select<?=$i?>');
        var unitRateField = $('#unit-rate<?=$i?>');
          var availableQuantity = $('#available<?=$i?>');
                    var pid = $('#p_id<?=$i?>');
        // Clear previous options
        subCategorySelect.empty();
        subCategorySelect.append('<option selected>Select Packing</option>');
        
        // Reset unit rate field
        unitRateField.val(''); // Reset the unit rate field
 availableQuantity.val('');
 pid.val('');
        // Fetch subcategories and unit rates via AJAX
        if (selectedCategory) {
            $.ajax({
                url: '<?= base_url("Branch_Dashboard/get_subcategories/") ?>' + selectedCategory, // Update with your actual route
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $.each(data, function(index, subCategory) {
                        // Append packing options to the dropdown
                        subCategorySelect.append('<option value="' + subCategory.p_id + '">' + subCategory.packing + ' ' +  subCategory.unit + '</option>');
                    });
                },
                error: function() {
                    console.error('Failed to fetch packing options.');
                }
            });
        }
    });

    // Handle change event on sub-category-select to update unit rate
    $('#sub-category-select<?=$i?>').change(function() {
        var selectedPacking = $(this).val();
        var unitRateField = $('#unit-rate<?=$i?>');
          var availableQuantity = $('#available<?=$i?>');
          var pid = $('#p_id<?=$i?>');
          var quantityField = $('#blankquantity<?=$i?>');
        // Fetch the unit rate based on the selected packing
        if (selectedPacking) {
            $.ajax({
                url: '<?= base_url("Branch_Dashboard/get_unit_rate/") ?>' + selectedPacking, // Update with your actual route for unit rate
                type: 'GET',
                dataType: 'json',
                success: function(data) {
					// console.log('Subcategory:', data);

                    // Assuming the response contains the unit rate
                    if (data.unit_rate) {
                        unitRateField.val(data.unit_rate); // Set the unit rate
                         availableQuantity.val(data.availabile_quantity); 
                          pid.val(data.p_id); 
                          quantityField.val(''); 
                    } else {
                        unitRateField.val(''); // Clear if no unit rate found
                         availableQuantity.val(' '); 
                          pid.val('');
                          quantityField.val(''); 
                    }
                },
                error: function() {
                    console.error('Failed to fetch unit rate.');
                }
            });
        } else {
            unitRateField.val(''); // Reset if no packing is selected
             availableQuantity.val('');
              pid.val('');
        }
    });
    $('#sub-category-select<?=$i?>').change(function() {
        var selectedPacking = $(this).val();
        var unit = $('#unit<?=$i?>');

        // Fetch the unit rate based on the selected packing
        if (selectedPacking) {
            $.ajax({
                url: '<?= base_url("Branch_Dashboard/get_unit/") ?>' + selectedPacking, // Update with your actual route for unit rate
                type: 'GET',
                dataType: 'json',
                success: function(data) {
					// console.log('Subcategory:', data);

                    // Assuming the response contains the unit rate
                    if (data.unit) {
                        unit.val(data.unit); // Set the unit rate
                    } else {
                        unit.val(''); // Clear if no unit rate found
                    }
                },
                error: function() {
                    console.error('Failed to fetch unit rate.');
                }
            });
        } else {
            unit.val(''); // Reset if no packing is selected
        }
    });
});
<?php endforeach; ?>
$(document).ready(function() {
    $('#contact').change(function() {
        var selectedContact = $(this).val();
        var nameSelect = $('#customer-name');
        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Customer</option>');

        // Fetch customer names via AJAX
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_name/") ?>' + (selectedContact ? selectedContact : 'all'), // If no contact, fetch all customers
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, cname) {
                    // Append customer options to the dropdown
                    nameSelect.append('<option value="' + cname.id + '">' + cname.name + '</option>');
                });
            },
            error: function() {
                console.error('Failed to fetch customer names.');
            }
        });
    });
});
 document.getElementById('paymentMode').addEventListener('change', function () {
                var bankDetails = document.getElementById('bankDetails');
                  var selectDetails = document.getElementById('bankAccount');
                if (this.value === 'Bank') {
                    bankDetails.style.display = 'block';
                    selectDetails.setAttribute('required', 'required')
                } else {
                    bankDetails.style.display = 'none';
                     selectDetails.removeAttribute('required'); 
                }
            });
               document.getElementById('paymentMode').addEventListener('change', function () {
                                                                        var chequeDetails = document.getElementById('chequeDetails');
                                                                          var selectDetails = document.getElementById('cheque');
                                                                        if (this.value === 'Cheque') {
                                                                            chequeDetails.style.display = 'block';
                                                                              selectDetails.setAttribute('required', 'required')
                                                                        } else {
                                                                            chequeDetails.style.display = 'none';
                                                                             selectDetails.removeAttribute('required'); 
                                                                        }
                                                                    });

function calculateTotalPrice(row) {
    const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
    const unitRate = parseFloat(row.querySelector('input[name="unit_rate[]"]').value) || 0;
    const totalPriceInput = row.querySelector('input[name="total_price[]"]');
    
    const totalPrice = (quantity * unitRate).toFixed(2);
    totalPriceInput.value = totalPrice;

    // Update grand total after calculating each row's total price
    updateGrandTotal();
}

function updateGrandTotal() {
    const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
    let grandTotal = 0;

    // Sum up all total prices
    totalPriceInputs.forEach(input => {
        grandTotal += parseFloat(input.value) || 0;
    });

    // Get discount value and type
    const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;
    const discountType = document.getElementById('discount-type').value;

    let discountAmount = 0; // Declare discountAmount here to ensure it's accessible

    // Apply the discount based on the selected discount type
    if (discountType === 'percent') {
        discountAmount = (grandTotal * discountValue) / 100;
    } else if (discountType === 'rupee') {
        discountAmount = discountValue;
    }

    // Ensure grand total does not become negative after applying discount
    const finalTotalWithoutTax = Math.max(grandTotal - discountAmount, 0);

    // Calculate tax
    const tax = parseFloat(document.getElementById('tax').value) || 0;
    const taxAmount = (finalTotalWithoutTax * tax) / 100;

    // Calculate final total including tax
    const finalTotalWithTax = finalTotalWithoutTax + taxAmount;

    // Update the input fields
    document.getElementById('grand-total').value = grandTotal.toFixed(2);
    document.getElementById('total-without').value = finalTotalWithoutTax.toFixed(2);
    document.getElementById('tax-amount').value = taxAmount.toFixed(2);
    document.getElementById('final-total').value = finalTotalWithTax.toFixed(2);
}

// Add event listener to the discount input to update totals when changed
document.getElementById('discount-value').addEventListener('input', updateGrandTotal);
document.getElementById('discount-type').addEventListener('change', updateGrandTotal); 
</script>
<script>
         <?php
                                                            $i=0;
                                                             $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'],'branch_id',$user[0]['id'],'user_id',$user[0]['user_id']); ?>
                                                            <?php foreach ($p_produc as $p_info): $i++;?>
  document.addEventListener("DOMContentLoaded", function () {
    let productSelects = {}; // Store Choices.js instances for each dropdown

    function initializeChoices() {
        document.querySelectorAll(".category-select").forEach((select) => {
            const index = select.dataset.index;
            if (!productSelects[index]) { 
                productSelects[index] = new Choices(select, {
                    searchEnabled: true,
                    itemSelectText: "",
                    shouldSort: false
                });
            }
        });

     
    }

    function updateProductOptionsForAllRows(stockPlaceId) {
        if (stockPlaceId) {
            $.ajax({
                url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                type: 'POST',
                data: { stock_place_id: stockPlaceId },
                dataType: 'json',
                success: function (products) {
                    document.querySelectorAll(".category-select").forEach((select) => {
                        const index = select.dataset.index;
                        const selectedValue = select.getAttribute('data-selected'); // Get previously selected product

                        if (productSelects[index]) {
                            let newChoices = [{
                                value: '',
                                label: 'Select Other Product',
                                disabled: true
                            }].concat(products.map(product => ({
                                value: product.id,
                                label: product.product_name,
                                selected: product.id == selectedValue // Retain selection
                            })));

                            productSelects[index].clearChoices();
                            productSelects[index].setChoices(newChoices, 'value', 'label', true);
                        }
                    });
                },
                error: function () {
                    console.error('Failed to fetch products.');
                }
            });
        }
    }

    // Set default stock place products on load
    const defaultStockPlaceId = document.getElementById('stock_place').value;
    if (defaultStockPlaceId) {
        updateProductOptionsForAllRows(defaultStockPlaceId);
    }

    // Stock place change event
    document.getElementById('stock_place').addEventListener('change', function () {
        document.querySelectorAll(".category-select").forEach((select) => {
            select.value = ''; // Clear selection
        });
        updateProductOptionsForAllRows(this.value);
    });

    initializeChoices();
});

//   
$(document).on('input', 'input[name="quantity[]"]', function() {
    var row = $(this).closest('.product-row');
     var id = row.find('input[name="invoice_id[]"]').val(); 
  
    checkAvailableQuantity(row,id);
});

function checkAvailableQuantity(row,id) {
    
      var availableQuantity = parseFloat($(`#availablee<?=$i?>`).val()) || 0; 
      
    const enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

    if (enteredQuantity > availableQuantity) {
        alert("Product quantity is not available. Maximum available: " + availableQuantity);
        row.find('input[name="quantity[]"]').val('');
    }
}
</script>
<script>
    $(document).on('click', '#add-product-btn', function(event) {
        var paidInput = $('input[name="paid"]'); // Corrected selector to target input with name "paid"
        if (!checkAvailablePaid(paidInput)) {
            event.preventDefault(); // Prevent the button's default action
        }
    });

    function checkAvailablePaid(inputElement) {
        var grandTotal = parseFloat($('#final-total').val()) || 0;
        var paid = parseFloat(inputElement.val()) || 0;

        if (paid > grandTotal) {
            alert("Paid amount exceeds the Grand Total of " + grandTotal);
            inputElement.val(''); // Reset the input field
            return false; // Indicate that the check failed
        }

        return true; // Indicate that the check passed
    }
    <?php endforeach; ?>

</script>
		<?php include "includes2/footer-links.php" ?>
	</div>
	<?php include "includes2/footer.php" ?>
</body>

</html>