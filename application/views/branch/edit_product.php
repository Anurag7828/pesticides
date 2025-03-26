<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>

	<?php include "includes2/header-links.php" ?>
</head>
<body class="selection:text-white selection:bg-primary">

	<!-- Main wrapper start -->
	<div id="main-wrapper" class="relative">
		<?php include "includes2/header.php" ?>
		<?php include "includes2/sidebar.php" ?>

		
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Venders</h6>
								<a href="<?= base_url('Branch_Dashboard/product/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Purchase Product List</a><br>
							</div>
							<form class="profile-form" action="<?= base_url('Branch_Dashboard/edit_product?user_id=' . $user[0]['id'] . '&purchase_code=' . $product[0]['purchase_code']) ?>" method="post" enctype="multipart/form-data">


								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Vender Name</label>
											<select name="vender_name" class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                <option value="">Select Vendor</option> 
                                                <?php foreach ($vender as $vender_info) : ?>
                                                    <option value="<?= $vender_info['id']; ?>"<?= (($product[0]['vender_name'] == $vender_info['id']) ? 'selected' : '' )?>>
                                                        <?= $vender_info['vender_name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                              </select>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
                                     <label class="text-dark dark:text-white text-[13px] mb-2" for="stock_place_name">Stock Place Name</label>
                                               <select name="stock_place_name" id="stock_place_name"
                                                 class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                 <option value="">Select Stock Place</option>
                                                <?php foreach ($stock as $stock_info) { ?>
                                          <option value="<?= $stock_info['id']; ?>" <?= ($product[0]['stock_place_name'] == $stock_info['id']) ? 'selected' : ''; ?>>
                                               <?= htmlspecialchars($stock_info['place_name']); ?>
                                             </option>
                                         <?php } ?>
                                      </select>
                                       </div>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase code</label>
											<input type="text"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Purchase Code" value="<?= $user[0]['purchase_code'] ?>-<?= $product[0]['purchase_code'] ?>"readonly>
											<input type="hidden" name="uid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['user_id'] ?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
                                           <label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                     <input type="date" name="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                              placeholder="Purchase Date" value="<?= $product[0]['date'] ?>">
                                              </div>

										<hr>
										<div class="container-fluid">
											<div class="row">
												<div class="xl:w-6/4 lg:w-4/3">
													<div class="card flex flex-col max-sm:mb-[30px] profile-card">
													<?php  $p_produc = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $product[0]['purchase_code'] ,'branch_id',$user[0]['id'],'user_id',$user[0]['user_id']); ?>
														<?php foreach ($p_produc as $p_info) : ?>
														<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/3 w-full mb-[30px]">
											            	<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
											             
																	<select name="p_name[]" id="product-name" class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="category-select" onchange="fetchProductDetails(this)">
																			<option selected>Select Product</option>
																			<?php foreach ($product_list as $product_info) { ?>
																				<option value="<?= $product_info['id']; ?>"<?= (($p_info['product_name'] == $product_info['id']) ? 'selected' : '' )?>><?= $product_info['product_name']; ?></option>
																			<?php } ?>
																		</select>
																	</div>

	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
																		<input type="text" name="HSN_code[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="HSN Code" value="<?= $p_info['HSN_code'] ?>">
																	</div>
																	<!-- Net Quantity Field with Unit Dropdown -->
																	<div class="flex  sm:w-1/3 w-full mb-[30px]">
																		<!-- Net Quantity Input -->
																		<div class="sm:w-2/4 w-full">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Net Qty</label>
																			<input type="number" name="packing[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['packing'] ?>">
																		</div>
																		<!-- Unit Dropdown -->
																		<div class="sm:w-1/2 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                                                                            <select name="unit[]" class="ml-2 form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none">
                                                                               <option value="grams" <?= strpos($p_info['unit'], 'grams') !== false ? 'selected' : '' ?>>Grams</option>
                                                                               <option value="kg" <?= strpos($p_info['unit'], 'kg') !== false ? 'selected' : '' ?>>Kgs</option>
                                                                               <option value="liters" <?= strpos($p_info['unit'], 'liters') !== false ? 'selected' : '' ?>>Liters</option>
                                                                               <option value="ml" <?= strpos($p_info['unit'], 'ml') !== false ? 'selected' : '' ?>>ML</option>
                                                                         <!-- Add more units as needed -->
                                                                         </select>
																		</div>
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
																		<input type="number" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['quantity'] ?>">
																	<input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  value="<?= $p_info['p_id'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
																		<input type="number" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Unit Rate" id="unit-rate" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['unit_rate'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax(IN %)</label>
																		<input type="number" name="tax[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax" id="tax" oninput="calculateTotalPrice(this.closest('.row'))"  value="<?= $product[0]['gst_percent'] ?>">
																	</div>
																		<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
    <select name="tax_type[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" id="tax-type" onchange="calculateTotalPrice(this.closest('.row'))">
        <option value="inclusive" <?= strpos($p_info['tax_type'], 'inclusive') !== false ? 'selected' : '' ?>>Inclusive</option>
        <option value="exclusive" <?= strpos($p_info['tax_type'], 'exclusive') !== false ? 'selected' : '' ?>>Exclusive</option>
    </select>
</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
																		<input type="number" name="tax_amount[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax Amount" id="tax-amount" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['gst_tax'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Unit Price</label>
																		<input type="number" name="p_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="total Unit Amount" id="total-unit-price" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['p_price'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">mrp</label>
																		<input type="number" name="mrp[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="MRP Price" id="mrp" oninput="calculateTotalPrice(this.closest('.row'))"value="<?= $p_info['MRP'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Selling Price</label>
																		<input type="number" name="selling_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Selling Price" id="selling-price" oninput="calculateTotalPrice(this.closest('.row'))"value="<?= $p_info['selling_price'] ?>">
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
																		<input type="number" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" value="<?= $p_info['total_price'] ?>">
																	</div>
																		<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">expire date</label>
																		<input type="date" name="exp_date[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Date"  value="<?= $p_info['exp_date'] ?>">
                                                                    </div>
																		</div>
																	
																</div>
															</div>
															<?php endforeach; ?>
															<!--<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">-->
															<!--	<button type="button" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add More Product</button>-->
															<!--</div>-->
															<hr>
													    	<div class="container-fluid">
															<div class="row">
																<!-- Total Quantity Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Total Quantity</label>
																	<input type="text" id="total-quantity" name="total_quantity" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="total quantity" value="<?= $product[0]['total_quantity'] ?>">
																</div>

																<!-- Subtotal Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Sub Total</label>
																	<input type="text" id="sub-total" name="sub_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="subtotal" value="<?= $product[0]['sub_total'] ?>">
																</div>

																<!-- Discount Type Dropdown -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Type</label>
																	<select id="discount-type" name="discount_type"class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
																		<option value="0" >Select Discount type</option>
																		<option value="percent" <?= strpos($p_info['discount_type'], 'percent') !== false ? 'selected' : '' ?> >Discount in Percentage</option>
																		<option value="rupee" <?= strpos($p_info['discount_type'], 'rupee') !== false ? 'selected' : '' ?>>Discount in Rupee</option>
																	</select>
																</div>

																<!-- Discount Value Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Value</label>
																	<input type="number" id="discount-value" name="discount_value" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="enter discount value" value="<?= $product[0]['discount_value'] ?>">
																</div>

																<!-- Grand Total Field -->
																<div class="sm:w-1 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Grand Total</label>
																	<input type="text" id="grand-total" name="grand_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="grand total" value="<?= $product[0]['grand_total'] ?>">
																</div>
															</div>
                                                         <div class="row">
                                                             <?php
                                                                   $purchase_payment =$this->CommonModal->getRowByIdOrderByLimit3('purchase_payment', 'purchase_code',  $product[0]['purchase_code'],'branch_id',$user[0]['id'],'user_id',$user[0]['user_id'],'id','ASC','1');
                                                                   ?>
                                                                   
                                                            <div class="sm:w-1/3 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Payment Mode</label>
																		<select name="mode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                        <option value="Cash"<?= strpos($purchase_payment[0]['mode'] , 'Cash') !== false ? 'selected' : '' ?> >CASH</option>
                                                                        <option value="Upi"<?= strpos($purchase_payment[0]['mode'] , 'Upi') !== false ? 'selected' : '' ?> >UPI</option>
                                                                        <option value="Card"<?= strpos($purchase_payment[0]['mode'] , 'Card') !== false ? 'selected' : '' ?> >CREADIT/DEBIT</option>
                                                                        <option value="Bank"<?= strpos($purchase_payment[0]['mode'] , 'Bank') !== false ? 'selected' : '' ?> >Bank Transfer</option>
                                                                            <option value="Cheque"<?= strpos($purchase_payment[0]['mode'] , 'Cheque') !== false ? 'selected' : '' ?> >Cheque</option>
                                                                           <option value="None"<?= strpos($purchase_payment[0]['mode'] , 'None') !== false ? 'selected' : '' ?> >None</option>
                                                              </select>
															</div>
                                                            <div class="sm:w-1/3 w-full mb-[30px]"  id="bankDetails" style="display:none;">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																		<select name="bank" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="bankAccount" >
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                                        
                                                                        foreach ($account as $account_info) { ?>
                                                                        <option value="<?= $account_info['id']?>"<?= strpos($purchase_payment[0]['bank'] , $account_info['id']) !== false ? 'selected' : '' ?>><?= $account_info['bank_name']?>-<?= $account_info['account_no']?></option>
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
                                                                                       id="cheque" value="<?= $purchase_payment[0]['cheque_no']?>">
                                                                                </div>
														 <div class="sm:w-1/3 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Paid Amount</label>
   
    <input type="number" name="paid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['paid'] ?>">
     <input type="hidden" name="p_p_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['id'] ?>">
</div>

													<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
															<button type="submit" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update Product</button>
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
function addProductForm() {
    const productContainer = document.getElementById('product-container');
    const newProductRow = document.createElement('div');
    const rowIndex = document.querySelectorAll('.product-row').length; // Index to keep track of each row

    newProductRow.classList.add('row', 'product-row');

    newProductRow.innerHTML = `
        <div class="row product-row">
       	<div class="sm:w-1/6 w-full mb-[30px]">
				<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
				<input type="text"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full pn" placeholder="Search Product By Name"  >
						<select name="p_name[]"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full pns " id="category-select" onchange="fetchProductDetails(this)">
						<option selected>Select Product</option>
                    <?php foreach ($product_list as $product_info) { ?>
                        <option value="<?= $product_info['id']; ?>"><?= $product_info['product_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="flex items-center sm:w-1/3 w-full mb-[30px]">
                <!-- Net Quantity Input -->
                <div class="sm:w-2/3 w-full">
                    <label class="text-dark dark:text-white text-[13px] mb-2">Net Quantity</label>
                    <input type="text" name="packing[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))">
                </div>
                <!-- Unit Dropdown -->
                <div class="sm:w-1/3 w-full pl-3">
                    <label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                    <select name="unit[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
                        <option value="grams">Grams</option>
                        <option value="liters">Liters</option>
                        <option value="kilograms">Kilograms</option>
                    </select>
                </div>
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
                <input type="text" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.product-row'))">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
                <input type="text" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Unit Rate" oninput="calculateTotalPrice(this.closest('.row'))">
            </div>
           	<div class="sm:w-1/6 w-full mb-[30px]">
						<label class="text-dark dark:text-white text-[13px] mb-2">Tax(IN %)</label>
						<input type="text" name="tax[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax" id="tax" oninput="calculateTotalPrice(this.closest('.row'))">
					</div>
						<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
    <select name="tax_type[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" id="tax-type" onchange="calculateTotalPrice(this.closest('.row'))">
        <option value="inclusive">Inclusive</option>
        <option value="exclusive">Exclusive</option>
    </select>
</div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
                <input type="text" name="tax_amount[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Tax Amount" readonly>
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Total Unit Price</label>
                <input type="text" name="p_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Unit Price" readonly>
            </div>
												<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">mrp</label>
																		<input type="text" name="mrp[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="MRP Price" id="mrp" oninput="calculateTotalPrice(this.closest('.row'))">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Selling Price</label>
																		<input type="text" name="selling_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Selling Price" id="selling-price" oninput="calculateTotalPrice(this.closest('.row'))">
																	</div>

            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
                <input type="text" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Price" readonly>
            </div>
            
           <div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Expire Date</label>
    <input type="date" name="exp_date[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="expired date">
</div>
   
           <div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
    <input type="text" name="HSN_code[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="HSN Code">
</div>

            <div class="sm:w-1/6 w-full mb-[30px] d-flex align-items-center">
                <button type="button" class="btn btn-danger" onclick="deleteProductForm(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        </div>
    `;

    productContainer.appendChild(newProductRow);
}

// Function to delete a product row
function deleteProductForm(button) {
    const productRow = button.closest('.product-row');
    productRow.remove();
    updateSubTotal(); // Update subtotal after deleting a row
}
function calculateTotalPrice(row) {
    const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
    const unitRate = parseFloat(row.querySelector('input[name="unit_rate[]"]').value) || 0;
    const taxPercentage = parseFloat(row.querySelector('input[name="tax[]"]').value) || 0;
    const taxType = row.querySelector('select[name="tax_type[]"]').value; // Get tax type (inclusive/exclusive)

    // Correct DOM element references for taxAmount and totalUnitPrice
    const taxAmountInput = row.querySelector('input[name="tax_amount[]"]');
    const totalUnitPriceInput = row.querySelector('input[name="p_price[]"]');
    const totalPriceInput = row.querySelector('input[name="total_price[]"]');

    let taxAmount = 0;
    let totalUnitPrice = unitRate;

    if (taxType === "exclusive") {
        // Calculate tax amount and add it to unit rate for exclusive tax
        taxAmount = (unitRate * taxPercentage) / 100;
        totalUnitPrice = unitRate + taxAmount; // Final price for exclusive tax
    } else if (taxType === "inclusive") {
        // Calculate base amount by removing tax from unit rate for inclusive tax
        const baseAmount = unitRate / (1 + taxPercentage / 100);
        taxAmount = unitRate - baseAmount;
        totalUnitPrice = unitRate; // Keep total unit price as the original unit rate
    }

    // Update the tax amount input with the calculated tax
    taxAmountInput.value = taxAmount.toFixed(2);
    totalUnitPriceInput.value = totalUnitPrice.toFixed(2);

    // Calculate total price for the row based on quantity and total unit price
    const totalPrice = (quantity * totalUnitPrice).toFixed(2);
    totalPriceInput.value = totalPrice;

    // Update the subtotal and grand total
    updateSubTotal();
    updateGrandTotal();
}


function updateSubTotal() {
    const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
    const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');
    
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

$(document).ready(function() {
    // Event for each '.pn' input field
    $(document).on('input', '.pn', function() {
        var searchQuery = $(this).val();
        var nameSelect = $(this).closest('.product-row').find('.pns'); // Target specific dropdown

        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Product</option>');

        // Fetch product names via AJAX based on the search query
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_product/") ?>' + (searchQuery ? searchQuery : 'all'),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, product) {
                    // Append product options to the dropdown
                    nameSelect.append('<option value="' + product.id + '">' + product.product_name + '</option>');
                });
            },
            error: function() {
                console.error('Failed to fetch product names.');
            }
        });
    });
});
// Ensure jQuery is loaded and handle the button event
$(document).ready(function () {
    $('#add-product-btn').on('click', function () {
        addProductForm();
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

</script>

<script>
$(document).ready(function() {
    $('#contact').on('input', function() {
        var searchQuery = $(this).val();
        var nameSelect = $('#product-name');
        
        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Product</option>');

        // Fetch product names via AJAX based on the search query
        $.ajax({
            url: '<?= base_url("Branch_Dashboard/get_product/") ?>' + (searchQuery ? searchQuery : 'all'),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                $.each(data, function(index, product) {
                    // Append product options to the dropdown
                    nameSelect.append('<option value="' + product.id + '">' + product.product_name + '</option>');
                });
            },
            error: function() {
                console.error('Failed to fetch product names.');
            }
        });
    });
});
</script>
<script>
    $(document).on('click', '#add-product-bt', function(event) {
        var paidInput = $('input[name="paid"]'); // Corrected selector to target input with name "paid"
        if (!checkAvailablePaid(paidInput)) {
            event.preventDefault(); // Prevent the button's default action
        }
    });

    function checkAvailablePaid(inputElement) {
        var grandTotal = parseFloat($('#grand_total').val()) || 0;
        var paid = parseFloat(inputElement.val()) || 0;

        if (paid > grandTotal) {
            alert("Paid amount exceeds the Grand Total of " + grandTotal);
            inputElement.val(''); // Reset the input field
            return false; // Indicate that the check failed
        }

        return true; // Indicate that the check passed
    }
</script>
		<?php include "includes2/footer-links.php" ?>
	</div>
	<?php include "includes2/footer.php" ?>
</body>

</html>