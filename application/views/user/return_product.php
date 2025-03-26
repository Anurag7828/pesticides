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
							<div
								class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Add return your
									product</h6>
								<a href="<?= base_url('Admin_Dashboard/product/' . encryptId($user[0]['id'])) ?>"
									class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
									Purchase Product List</a><br>
							</div>
							<form class="profile-form"
								action="<?= base_url('Admin_Dashboard/return_product?user_id=' . $user[0]['id'] . '&purchase_code=' . $product[0]['purchase_code']) ?>"
								method="post" enctype="multipart/form-data">


								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Vender
												Name</label>

											<?php foreach ($vender as $vender_info):
												if ($product[0]['vender_name'] == $vender_info['id']) { ?>
													<input type="text"
														class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
														placeholder="Vender Name" value=" <?= $vender_info['vender_name']; ?>"
														readonly>
													<input type="hidden" name="vender_name"
														class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
														placeholder="Vender Name" value=" <?= $vender_info['id']; ?>" readonly>
												<?php }endforeach; ?>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2"
												for="stock_place_name">Stock Place Name</label>

											<?php foreach ($stock as $stock_info):
												if ($product[0]['stock_place_name'] == $stock_info['id']) { ?>
													<input type="text"
														class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
														placeholder="Stock Place"
														value="  <?= htmlspecialchars($stock_info['place_name']); ?>" readonly>
													<input type="hidden" name="stock_place_name" id="stock_place_name"
														class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
														placeholder="Stock Place" value="  <?= $stock_info['id']; ?>" readonly>
												<?php }endforeach; ?>

										</div>
										<input type="hidden" name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $branchi?>">

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase
												code</label>
											<input type="text"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Purchase Code"
												value="<?= $user[0]['purchase_code'] ?>-<?= $product[0]['purchase_code'] ?>"
												readonly>
											<input type="hidden" name="purchase_code"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Purchase Code" value="<?= $product[0]['purchase_code'] ?>"
												readonly>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
											<input type="date" name="purchase_date"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
												placeholder="Purchase Date" value="" required>
										</div>

										<hr>
										<div class="container-fluid">
											<div class="row">
												<div class="xl:w-6/4 lg:w-4/3">
													<div class="card flex flex-col max-sm:mb-[30px] profile-card">
														<?php $p_produc = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $product[0]['purchase_code'], 'user_id', $user[0]['id']); ?>
														<?php foreach ($p_produc as $p_info):
															if ($p_info['availabile_quantity'] > 0) { ?>
																<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
																	<div id="product-container">
																		<!-- Product fields that will be cloned -->
																		<div class="row product-row">
																			<!-- Product Dropdown in the Row -->
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Select
																					Product</label>

																				<?php foreach ($product_list as $product_info):
																					if ($p_info['product_name'] == $product_info['id']) { ?>
																						<input type="text"
																							class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
																							placeholder="Product Name"
																							value="<?= $product_info['product_name']; ?>"
																							readonly>
																						<input type="hidden" name="p_name[]"
																							id="category-select"
																							onchange="fetchProductDetails(this)"
																							class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
																							placeholder="Product Name"
																							value="<?= $product_info['id']; ?>"
																							readonly>
																					<?php }endforeach; ?>
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">HSN
																					Code</label>
																				<input type="text" name="HSN_code[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="HSN Code"
																					value="<?= $p_info['HSN_code'] ?>" readonly>
																			</div>

																			<!-- Net Quantity Field with Unit Dropdown -->
																			<div
																				class="flex items-center sm:w-1/3 w-full mb-[30px]">
																				<!-- Net Quantity Input -->
																				<div class="sm:w-2/3 w-full">
																					<label
																						class="text-dark dark:text-white text-[13px] mb-2">Packing
																						Quantity</label>
																					<input type="number" name="packing[]"
																						class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																						placeholder="Quantity"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																						value="<?= $p_info['packing'] ?>"
																						readonly>
																				</div>
																				<!-- Unit Dropdown -->
																				<div class="sm:w-1/3 w-full pl-3">
																					<label
																						class="text-dark dark:text-white text-[13px] mb-2">Unit</label>

																					<input type="float" name="unit[]"
																						class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																						placeholder="Unit"
													oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 									value="<?= $p_info['unit'] ?>" readonly>
																				</div>
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Return
																					Quantity</label>
																				<input type="hidden" name="available_quantity[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					id="available<?= $p_info['p_id'] ?>"
																					value="<?= $p_info['availabile_quantity'] ?>"
																					required readonly>
																				<input type="hidden" name="t_quantity[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					value="<?= $p_info['quantity'] ?>" required
																					readonly>
																				<input type="float" name="quantity[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Quantity"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 						value="<?= $p_info['availabile_quantity'] ?>">
																				<input type="hidden" name="p_id[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					value="<?= $p_info['p_id'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Unit
																					Rate</label>
																				<input type="float" name="unit_rate[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Unit Rate" id="unit-rate"
																					oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['unit_rate'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Tax(IN
																					%)</label>
																				<input type="float" name="tax[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Tax" id="tax"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['gst_percent'] ?>" readonly>
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
																				<input type="text" name="tax_type[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Tax" id="tax_type"
																				
																					value="<?= $p_info['tax_type'] ?>" readonly>
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Tax
																					Amount</label>
																				<input type="float" name="tax_amount[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Tax Amount" id="tax-amount"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['gst_tax'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Total
																					Unit Price</label>
																				<input type="float" name="p_price[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="total Unit Amount"
																					id="total-unit-price"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['p_price'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">mrp</label>
																				<input type="float" name="mrp[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="MRP Price" id="mrp"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['MRP'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Selling
																					Price</label>
																				<input type="float" name="selling_price[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					placeholder="Selling Price"
																					id="selling-price"
																				oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																					value="<?= $p_info['selling_price'] ?>">
																			</div>

																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">Total
																					Price</label>
																				<input type="float" name="total_price[]"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
										oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 											placeholder="Total Price"
																					value="<?= $p_info['total_price'] ?>">
																			</div>
																			<div class="sm:w-1/6 w-full mb-[30px]">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2">expire
																					date</label>
																				<input type="date" name="exp_date"
																					class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																					
																					value="<?= $p_info['exp_date'] ?>">
																			</div>


																			<div class="sm:w-1/6 w-full mb-[30px] ">
																				<label
																					class="text-dark dark:text-white text-[13px] mb-2"></label>
																				<button type="button" class="btn btn-danger"
																					onclick="deleteProductForm(this)">
																					<i class="fas fa-trash-alt"></i>
																				</button>
																			</div>
																		</div>
																	</div>
																</div>
															<?php } else { ?>
																<p> 0 Product Is available</p>
															<?php }
														endforeach; ?>
														<!--<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">-->
														<!--	<button type="button" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add More Product</button>-->
														<!--</div>-->
														<hr>
														<div class="container-fluid">
															<div class="row">
																<!-- Total Quantity Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Total
																		Quantity</label>
																	<input type="number" id="total-quantity"
																		name="total_quantity"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		placeholder="total quantity"
																		value="<?= $product[0]['total_quantity'] ?>">
																</div>

																<!-- Subtotal Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Sub
																		Total</label>
																	<input type="float" id="sub-total" name="sub_total"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
														oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 				placeholder="subtotal"
																		value="<?= $product[0]['sub_total'] ?>">
																</div>

																<!-- Discount Type Dropdown -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Discount
																		Type</label>
																	<select id="discount-type" name="discount_type"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																		<option value="percent">Select Discount type</option>
																		<option value="percent"
																			<?= strpos($p_info['discount_type'], 'percent') !== false ? 'selected' : '' ?> >
																			Discount in Percentage</option>
																		<option value="rupee"
																			<?= strpos($p_info['discount_type'], 'rupee') !== false ? 'selected' : '' ?>>Discount in
																			Rupee</option>
																	</select>
																</div>

																<!-- Discount Value Field -->
																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Discount
																		Value</label>
																	<input type="float" id="discount-value"
																		name="discount_value"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"  required
																		placeholder="enter discount value"
																		value="<?= $product[0]['discount_value'] ?>">
																</div>

																<!-- Grand Total Field -->
																<div class="sm:w-1 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Grand
																		Total</label>
																	<input type="float" id="grand-total"
																		name="grand_total"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
																		placeholder="grand total"
																		value="<?= $product[0]['grand_total'] ?>">
																</div>
															</div>
															<div class="row">
																<div class="sm:w-1/3 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Payment
																		Mode</label>
																	<select name="mode"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
																		id="paymentMode" required>
																		<option value="">--SELECT--</option>
																		<option value="Cash">CASH</option>
																		<option value="Upi">UPI</option>
																		<option value="Card">CREADIT/DEBIT CARD</option>
																		<option value="Bank">Bank Transfer</option>
																		 <option value="Cheque">Cheque</option>
																		<option value="None">None</option>
																	</select>
																</div>
																<div class="sm:w-1/3 w-full mb-[30px]" id="bankDetails"
																	style="display:none;">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																	<select name="bank"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
																		id="bankAccount">
																		<option value="">--SELECT--</option>
																		<?php

																		foreach ($account as $account_info) { ?>
																			<option value="<?= $account_info['id'] ?>"
																				<?= strpos($purchase_payment[0]['bank'], $account_info['id']) !== false ? 'selected' : '' ?>>
																				<?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
																			</option>
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
                                                                                       id="cheque" >
                                                                                </div>
																<div class="sm:w-1/3 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Paid
																		Amount</label>

																	<input type="float" name="paid"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																		placeholder="paid amount"oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"  value="">

																</div>


																<div
																	class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
																	<button type="submit"
																		class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Return
																		Product</button>
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
			<div class="sm:w-1/6 w-full mb-[40px]">
				<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
				<select name="p_name[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full category-select" data-index="${rowIndex}">
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
				<input type="text" name="tax[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Tax" oninput="calculateTotalPrice(this.closest('.row'))">
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
				const quantity = row.querySelector('input[name="quantity[]"]').value || 0;
				const unitRate = row.querySelector('input[name="unit_rate[]"]').value || 0;
				const taxPercentage = parseFloat(row.querySelector('input[name="tax[]"]').value) || 0;

				// Correct DOM element references for taxAmount and totalUnitPrice
				const taxAmountInput = row.querySelector('input[name="tax_amount[]"]');
				const totalUnitPriceInput = row.querySelector('input[name="p_price[]"]');
				const totalPriceInput = row.querySelector('input[name="total_price[]"]');

				// Calculate tax amount and total unit price
				const taxAmount = (unitRate * taxPercentage) / 100;
				taxAmountInput.value = taxAmount.toFixed(2); // Ensure proper formatting

				const totalUnitPrice = parseFloat(unitRate) + parseFloat(taxAmount);
				totalUnitPriceInput.value = totalUnitPrice.toFixed(2);

				// Calculate total price for the row
				const totalPrice = parseFloat(quantity) * totalUnitPrice;
				totalPriceInput.value = totalPrice.toFixed(2);

				// Update the subtotal and grand total
				updateSubTotal();
				updateGrandTotal();
			}
			function deleteProductForm(button) {
				const productRow = button.closest('.product-row');
				productRow.remove();
				updateSubTotal();
				updateGrandTotal() // Update subtotal after deleting a row
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
			document.getElementById('paymentMode').addEventListener('change', function () {
				var paidInput = document.querySelector('input[name="paid"]');

				if (this.value === 'None') {
					paidInput.value = '0';  // Set the value to 0 if 'None' is selected
				} else {
					paidInput.value = '';   // Clear the value for other option
				}
			});
			$(document).on('input', 'input[name="quantity[]"]', function () {
				var row = $(this).closest('.product-row');
				var p_id = row.find('input[name="p_id[]"]').val(); // Get p_id from the hidden input field in the row
				checkAvailableQuantity(row, p_id);
			});

			function checkAvailableQuantity(row, p_id) {
				// Use p_id to access the specific available quantity input
				var availableQuantity = parseFloat($(`#available${p_id}`).val()) || 0;
				var enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

				if (enteredQuantity > availableQuantity) {
					alert("Product quantity is not available. Maximum available: " + availableQuantity);
					row.find('input[name="quantity[]"]').val('');
				}
			}


		</script>
		<script>

			$(document).on('input', 'input[name="paid"]', function () {
				checkAvailablePaid($(this));
			});

			function checkAvailablePaid(element) {
				var grandTotal = parseFloat($('#grand-total').val()) || 0;
				var paid = parseFloat(element.val()) || 0;

				if (paid > grandTotal) {
					alert("Paid amount exceeds the Grand Total of " + grandTotal);
					element.val(''); // Reset the input field
				}
			}
		</script>

		<?php include "includes2/footer-links.php" ?>
	</div>
	<?php include "includes2/footer.php" ?>
</body>

</html>