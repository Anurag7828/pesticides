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

		
		<div class="content-body">
			<!-- row -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Venders</h6>
								<a href="<?= base_url('Admin_Dashboard/product/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Purchase Product List</a><br>
							</div>
							<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_product?user_id=' . $user[0]['id'] . '&purchase_code=' . $product[0]['purchase_code']) ?>" method="post" enctype="multipart/form-data">


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
											<input type="hidden" id="uuid" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">
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
							<input type="hidden" name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $branchi?>">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase code</label>
											<input type="text"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Purchase Code" value="<?= $user[0]['purchase_code'] ?>-<?= $product[0]['purchase_code'] ?>"readonly>
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
													<?php  $p_produc = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $product[0]['purchase_code'],'user_id',$user[0]['id'] ); ?>
														<?php foreach ($p_produc as $p_info) : ?>
														<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/3 w-full mb-[30px]">
											            	<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
											             
																	<select name="p_name[]" id="product-name" class="product-name<?= $p_info['p_id'] ?> choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="category-select" onchange="fetchProductDetails(this)">
																			<option selected>Select Product</option>
																			<?php foreach ($product_list as $product_info) { ?>
																				<option value="<?= $product_info['id']; ?>"<?= (($p_info['product_name'] == $product_info['id']) ? 'selected' : '' )?>><?= $product_info['product_id']; ?>-<?= $product_info['product_name']; ?>-<?= $product_info['unit']; ?></option>
																			<?php } ?>
																		</select>
																	</div>

	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
																		<input type="text" name="HSN_code[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="HSN Code" value="<?= $p_info['HSN_code'] ?>">
																	</div>
																	<!-- Net Quantity Field with Unit Dropdown -->
																	<div class="flex  sm:w-1/6 w-full mb-[30px]">
																		<!-- Net Quantity Input -->
																		<div class="sm:w-2/4 w-full">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Packing Qty</label>
																			<input type="text" name="packing[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['packing'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																		</div>
																		<!-- Unit Dropdown -->
																	
																	</div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
																		<input type="text" name="unit_box[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" 
                                               >
																	<input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="ppp_id" value="<?= $p_info['p_id'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
																		<input type="number" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['quantity'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																	<input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="ppp_id" value="<?= $p_info['p_id'] ?>">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
																		<input type="float" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Unit Rate" id="unit-rate" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['unit_rate'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax(IN %)</label>
																		<input type="float" name="tax[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax" id="tax" oninput="calculateTotalPrice(this.closest('.row'))"  value="<?= $product[0]['gst_percent'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																	</div>
													
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
																		<input type="float" name="tax_amount[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax Amount" id="tax-amount" oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['gst_tax'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																	</div>
																	
																
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit Price</label>
																		<input type="float" name="p_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" value="<?= $p_info['total_price'] ?>"
                                               >
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
																		<input type="float" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" value="<?= $p_info['total_price'] ?>"
                                               >
																	</div>
																		<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Expire date</label>
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
																	<input type="number" id="total-quantity" name="total_quantity" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="total quantity" value="<?= $product[0]['total_quantity'] ?>"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																</div>

																<!-- Subtotal Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Sub Total</label>
																	<input type="float" id="sub-total" name="sub_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="subtotal" value="<?= $product[0]['sub_total'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																</div>

																<!-- Discount Type Dropdown -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Type</label>
																	<select id="discount-type" name="discount_type"class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
																		<option value="percent"  >Select Discount type</option>
																		<option value="percent" <?= strpos($p_info['discount_type'], 'percent') !== false ? 'selected' : '' ?> >Discount in Percentage</option>
																		<option value="rupee" <?= strpos($p_info['discount_type'], 'rupee') !== false ? 'selected' : '' ?>>Discount in Rupee</option>
																	</select>
																</div>

																<!-- Discount Value Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Discount Value</label>
																	<input type="float" id="discount-value" name="discount_value" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="enter discount value" value="<?= $product[0]['discount_value'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																</div>

																<!-- Grand Total Field -->
																<div class="sm:w-1 w-full mb-[30px]">
																	<label class="text-dark dark:text-white text-[13px] mb-2">Grand Total</label>
																	<input type="float" id="grand-total" name="grand_total" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="grand total" value="<?= $product[0]['grand_total'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
																</div>
															</div>
                                                         <div class="row">
                                                             <?php
                                                                   $purchase_payment =$this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code',  $product[0]['purchase_code'],'user_id',$user[0]['id'],'id','ASC','1');
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
   
    <input type="float" name="paid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['paid'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
     <input type="hidden" name="p_p_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['id'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" >
</div>

													<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
															<button type="submit"  id="add-product-bt"class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update Product</button>
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
function fetchProductDetails(select) {
				var productId = select.value;
				var row = select.closest('.product-row');
				if (productId) {
					$.ajax({
						url: '<?= base_url("Admin_Dashboard/get_product_details/") ?>' + productId,
						type: 'GET',
						dataType: 'json',
						success: function (data) {
							if (!data.error) {
								row.querySelector('[name="HSN_code[]"]').value = data.HSN;
								row.querySelector('[name="packing[]"]').value = `${data.packing} ${data.net_unit}`;
								row.querySelector('[name="unit_box[]"]').value = data.unit;
								row.querySelector('[name="quantity[]"]').value = 1;

								row.querySelector('[name="unit_rate[]"]').value = data.purchase_price;
								row.querySelector('[name="tax[]"]').value = data.tax;
								row.querySelector('[name="tax_amount[]"]').value = data.tax_amount;
								row.querySelector('[name="p_price[]"]').value = data.total_purchase_price;

								// Make the fields readonly
								row.querySelector('[name="HSN_code[]"]').readOnly = true;
								row.querySelector('[name="packing[]"]').readOnly = true;
								row.querySelector('[name="unit_rate[]"]').readOnly = true;
								row.querySelector('[name="tax[]"]').readOnly = true;
								row.querySelector('[name="tax_amount[]"]').readOnly = true;
								row.querySelector('[name="p_price[]"]').readOnly = true;

								// Calculate Total Price
								calculateTotalPrice(row);
							} else {
								alert(data.error);
							}
						},
						error: function () {
							alert('Error fetching product details.');
						}
					});
				}
			}
		// Calculate Total Price
		function calculateTotalPrice(row) {
				var quantity = parseFloat(row.querySelector('[name="quantity[]"]').value) || 0;
				var unitRate = parseFloat(row.querySelector('[name="unit_rate[]"]').value) || 0;
				var taxRate = parseFloat(row.querySelector('[name="tax[]"]').value) || 0;

				var taxAmount = (unitRate * quantity * taxRate) / 100;
				var totalPrice = (unitRate * quantity) + taxAmount;

				row.querySelector('[name="tax_amount[]"]').value = taxAmount.toFixed(2);
				row.querySelector('[name="total_price[]"]').value = totalPrice.toFixed(2);
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
 var uid = $('#uuid').val();
        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Product</option>');

        // Fetch product names via AJAX based on the search query
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_product/") ?>' + (searchQuery ? searchQuery : 'all'),
            type: 'GET',
              data: {
              // Pass searchQuery, or 'all' if empty
                id: uid // Pass UID
            },
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
        const paymentMode = this.value;

        // References to the details sections and fields
        const bankDetails = document.getElementById('bankDetails');
        const chequeDetails = document.getElementById('chequeDetails');
        const bankAccount = document.getElementById('bankAccount');
        const chequeField = document.getElementById('cheque');

        // Hide all details by default
        bankDetails.style.display = 'none';
        chequeDetails.style.display = 'none';
        bankAccount.removeAttribute('required');
        chequeField.removeAttribute('required');

        // Display relevant fields based on the selected option
        if (paymentMode === 'Bank') {
            bankDetails.style.display = 'block';
            bankAccount.setAttribute('required', 'required');
        } else if (paymentMode === 'Cheque') {
            chequeDetails.style.display = 'block';
            chequeField.setAttribute('required', 'required');
        }
    });

    // Trigger change event on page load if a mode is pre-selected
    document.getElementById('paymentMode').dispatchEvent(new Event('change'));

</script>

<script>
$(document).ready(function() {
      var ppid = $('#ppp_id').val();
    $('.search-product'+ppid).on('input', function() {
        var searchQuery = $(this).val();
        var nameSelect = $('.product-name'+ppid);
         var uid = $('#uuid').val();
        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Product</option>');

        // Fetch product names via AJAX based on the search query
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_product/") ?>' + (searchQuery ? searchQuery : 'all'),
            type: 'GET',
            data: {
              // Pass searchQuery, or 'all' if empty
                id: uid // Pass UID
            },
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
        var grandTotal = parseFloat($('#grand-total').val()) || 0;
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