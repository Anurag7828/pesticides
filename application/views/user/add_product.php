<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>

	<?php include "includes2/header-links.php" ?>
	<!-- Choices.js CSS -->

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
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Purchase Product
								</h6>
								<button type="button"
									class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn "
									data-dz-modal="exampleModalCenterstock">Add Stock Place</button>
								<button type="button"
									class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn "
									data-dz-modal="exampleModalCentercustomer">Add Vender</button>
								<button type="button"
									class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn "
									data-dz-modal="exampleModalCentername">Add Product Name</button>
							</div>
							<form class="profile-form"
								action="<?= base_url('Admin_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
								method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Vender
												Name</label>
											<select name="vender_name" id="vender_name"
												class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] 
												   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select vender</option>
												<?php foreach ($vender as $vender_info) { ?>
													<option value="<?= $vender_info['id']; ?>">
														<?= $vender_info['vender_name']; ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Stock Place
												Name</label>
											<select name="stock_place_name" id="stock_place_name"
												class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] 
												   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select Stock Place</option>
												<?php foreach ($stock as $stock_info) { ?>
													<option value="<?= $stock_info['id']; ?>">
														<?= $stock_info['place_name']; ?>
													</option>
												<?php } ?>
											</select>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Purchase
												code</label>
											<input type="text"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Purchase Code" value="<?= $user['0']['purchase_code'] ?>"
												readonly>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
											<input type="date" name="purchase_date"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Purchase Date " required>
										</div>
										<hr>
										<div class="container-fluid">
											<!-- Other HTML code -->
											<div class="row">
												<div class="xl:w-6/4 lg:w-4/3">
													<div class="card flex flex-col max-sm:mb-[30px] profile-card">

														<div class=" pb-0">
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/3 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Select
																			Product</label>

																		<select name="p_name[]" id="product-name"
																			class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
																			id="category-select"
																			onchange="fetchProductDetails(this)"
																			required>
																			<option>Select Product</option>
																			<?php foreach ($product_list as $product_info) { ?>
																				<option value="<?= $product_info['id']; ?>">
																				<?= $product_info['product_id']; ?>-<?= $product_info['product_name']; ?>-<?= $product_info['unit']; ?>
																				</option>
																			<?php } ?>
																		</select>

																	</div>

																	<input type="hidden" id="uuid" name="user_id"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
																		value="<?= $user['0']['id'] ?>" required>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">HSN
																			Code</label>
																		<input type="text" name="HSN_code[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="HSN Code" required>
																	</div>
																	<!-- Net Quantity Field with Unit Dropdown -->
																	<div class="flex  sm:w-1/6 w-full mb-[30px]">

																		<div class="sm:w-2/6 w-full">
																			<label
																				class="text-dark dark:text-white text-[13px] mb-2">Packing
																				Quantity</label>
																			<input type="text" name="packing[]"
																				class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																				placeholder="Quantity"
																				
																				required>
																		</div>


																	</div>
																	<div class="sm:w-1/6 w-full">
																			<label
																				class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
																			<input type="text" name="unit_box[]"
																				class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																				placeholder="unit"
																				
																				required>
																		</div>
																	<div class="md:w-1/6  mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
																		<input type="number" name="quantity[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="Quantity"
																			oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));"
																			onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
																			required>
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Purchase
																			Price</label>
																		<input type="number" name="unit_rate[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="Unit Rate" id="unit-rate"
																			oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));"
																			onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Tax(IN
																			%)</label>
																		<input type="number" name="tax[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="Tax" id="tax"
																			oninput="calculateTotalPrice(this.closest('.row'))">
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Tax
																			Amount</label>
																		<input type="text" name="tax_amount[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="Tax Amount" id="tax-amount"
																			oninput="calculateTotalPrice(this.closest('.row'))"
																			required>
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">
																			Unit Price</label>
																		<input type="number" name="p_price[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="total Unit Amount"
																			id="total-unit-price"
																			oninput="calculateTotalPrice(this.closest('.row'))">
																	</div>


																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">Total
																			Price</label>
																		<input type="number" name="total_price[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="Total Price">
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label
																			class="text-dark dark:text-white text-[13px] mb-2">expire
																			date</label>
																		<input type="date" name="exp_date[]"
																			class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
																			placeholder="expired date" required>
																	</div>
																</div>

															</div>
														</div>
														<div
															class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
															<button type="button" id="add-product-btn"
																class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
																More Product</button>
														</div>
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
																		placeholder="total quantity">
																</div>

																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Sub
																		Total</label>
																	<input type="number" id="sub-total" name="sub_total"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		placeholder="subtotal">
																</div>

																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Discount
																		Type</label>
																	<select id="discount-type" name="discount_type"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		required>
																		<option value="percent" Selected>Select Discount
																			type</option>
																		<option value="percent">Discount in Percentage
																		</option>
																		<option value="rupee">Discount in Rupee</option>
																	</select>
																</div>

																<div class="sm:w-1/4 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Discount
																		Value</label>
																	<input type="number" id="discount-value"
																		name="discount_value"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		value="0" placeholder="enter discount value"
																		required>
																</div>

																<div class="sm:w-1 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Grand
																		Total</label>
																	<input type="number" id="grand-total"
																		name="grand_total"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		placeholder="grand total">
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
																			<option value="<?= $account_info['id'] ?>">
																				<?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
																			</option>
																		<?php } ?>
																	</select>
																</div>
																<div class="sm:w-1/3 w-full mb-[30px]"
																	id="chequeDetails" style="display:none;">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Cheque
																		Number</label>
																	<input type="number" name="cheque_no"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
																		placeholder="Cheque Number" id="cheque">
																</div>
																<div class="sm:w-1/3 w-full mb-[30px]">
																	<label
																		class="text-dark dark:text-white text-[13px] mb-2">Paid
																		Amount</label>
																	<input type="number" name="paid"
																		class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
																		placeholder="paid amount">
																</div>

																<div
																	class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
																	<button type="submit"
																		class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Purchase</button>
																</div>
															</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close"
			id="exampleModalCenterstock">
			<div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
				<div
					class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
					<div
						class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
						<h5 class="modal-title">Add Stock Place</h5>
						<button type="button" class="btn-close p-4 text-xs">
						</button>
					</div>
					<div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
						<div class="xl:w-6/4 lg:w-4/3">
							<div class="card flex flex-col max-sm:mb-[30px] profile-card">
								<div
									class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
									<h6 class="text-[15px] font-medium text-body-color title relative">Add Your stocks
									</h6>
									<a href="<?= base_url('Admin_Dashboard/stock_place/' . encryptId($user[0]['id'])) ?>"
										class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
										stocks Place</a><br>
								</div>
								<form class="profile-form"
									action="<?= base_url('admin_Dashboard/add_stock_place/' . encryptId($user['0']['id']) . '/1') ?>"
									method="post" enctype="multipart/form-data">
									<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
										<div class="row">
											<div class="sm:w-1/2 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2">Stock Place
													Name</label>
												<input type="text" name="place_name"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
													placeholder="Stock Place Name">

												<input type="hidden" name="user_id"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
													value="<?= $user['0']['id'] ?>">

											</div>
											<div class="sm:w-1/2 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2"> Address
												</label>
												<input type="text" name="address"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
													placeholder="address">
											</div>
											<div class="sm:w-1/2 w-full mb-[30px]">
												<label
													class="text-dark dark:text-white text-[13px] mb-2">capacity</label>
												<input type="text" name="capacity"
													class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
													placeholder="Capacity">
											</div>

										</div>
									</div>
									<div
										class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
										<button
											class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
											stock</button>
									</div>
								</form>
							</div>
						</div>

					</div>
					<div
						class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap border-t border-b-color">
						<button type="button"
							class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:border-danger-light hover:text-white m-1 close-btn">Close</button>

					</div>
				</div>
			</div>
		</div>

		<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close"
			id="exampleModalCentercustomer">
			<div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
				<div
					class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
					<div
						class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
						<h5 class="modal-title">Add Vender</h5>
						<button type="button" class="btn-close p-4 text-xs">
						</button>
					</div>
					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div
								class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Venders</h6>
								<a href="<?= base_url('Admin_Dashboard/vender/' . encryptId($user[0]['id'])) ?>"
									class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
									Venders</a><br>
							</div>
							<form class="profile-form"
								action="<?= base_url('admin_Dashboard/add_vender/' . encryptId($user['0']['id']) . '/1') ?>"
								method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Vender
												Name</label>
											<input type="text" name="vender_name"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Name" value="">

											<input type="hidden" name="user_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $user['0']['id'] ?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
											<input type="text" name="mobile"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Contact Number">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
											<input type="text" name="address"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="address">
										</div>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">email</label>
											<input type="text" name="email"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="email">
										</div>


										<hr>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact Person
												Name</label>
											<input type="text" name="contact_person"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Contact Name">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact person
												No.</label>
											<input type="text" name="person_contact"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Contact person number">
										</div>

									</div>
								</div>
								<div
									class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button
										class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
										Vender</button>
								</div>
							</form>
						</div>
					</div>
					<div
						class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap border-t border-b-color">
						<button type="button"
							class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:border-danger-light hover:text-white m-1 close-btn">Close</button>

					</div>
				</div>
			</div>
		</div>

		<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close"
			id="exampleModalCentername">
			<div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
				<div
					class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
					<div
						class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
						<h5 class="modal-title">Add Product Name</h5>
						<button type="button" class="btn-close p-4 text-xs">
						</button>
					</div>
					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div
								class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Product Name
								</h6>
								<a href="<?= base_url('Admin_Dashboard/product_name/' . encryptId($user[0]['id'])) ?>"
									class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
									Product Names</a><br>
							</div>
							<form class="profile-form"
								action="<?= base_url('admin_Dashboard/add_product_name/' . encryptId($user['0']['id']) . '/1') ?>"
								method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Product
												Name</label>
											<input type="text" name="product_name"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Product Name" value="">
											<input type="hidden" name="id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $product_name['0']['id'] ?>">
											<input type="hidden" name="user_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $user['0']['id'] ?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Company
												Name</label>
											<input type="text" name="company_name"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												placeholder="Company Name" value="">
											<input type="hidden" name="id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $product_name['0']['id'] ?>">
											<input type="hidden" name="user_id"
												class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
												value="<?= $user['0']['id'] ?>">

										</div>
									</div>
								</div>
								<div
									class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button
										class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
										product_name</button>
								</div>
							</form>
						</div>
					</div>
					<div
						class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap border-t border-b-color">
						<button type="button"
							class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:border-danger-light hover:text-white m-1 close-btn">Close</button>
					</div>
				</div>
			</div>
		</div>
		<!-- Content body end -->
		<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
				
			// Function to add a new product row
			document.addEventListener("DOMContentLoaded", function () {
				initializeChoices();
			});

			function initializeChoices() {
				document.querySelectorAll("select.choicees").forEach(select => {
					if (!select.classList.contains("choices-initialized")) { // Prevent duplicate initialization
						new Choices(select, {
							searchEnabled: true,
							itemSelectText: "",
							shouldSort: false,
							removeItemButton: false
						});
						select.classList.add("choices-initialized");
					}
				});
			}
			function addProductForm() {
				const productContainer = document.getElementById('product-container');
				const newProductRow = document.createElement('div');
				const rowIndex = document.querySelectorAll('.product-row').length; // Index to keep track of each row

				newProductRow.classList.add('row', 'product-row');

				newProductRow.innerHTML = `
		<div class="row product-row">
				 <div class="sm:w-1/3 w-full mb-[30px]">
												<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
								
																	<select name="p_name[]"  class=" choicees form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full pns " id="category-select" onchange="fetchProductDetails(this)">
																			<option selected>Select Product</option>
																			<?php foreach ($product_list as $product_info) { ?>
																				<option value="<?= $product_info['id']; ?>"><?= $product_info['product_id']; ?>-<?= $product_info['product_name']; ?>-<?= $product_info['unit']; ?></option>
																			<?php } ?>
																		</select>
															  
																	</div>
			  <div class="sm:w-1/6 w-full mb-[30px]">
	<label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
	<input type="text" name="HSN_code[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="HSN Code">
</div>
			<div class="flex sm:w-1/6 w-full mb-[30px]">
				<!-- Net Quantity Input -->
				<div class="sm:w-2/6 w-full">
					<label class="text-dark dark:text-white text-[13px] mb-2">Packing Quantity</label>
					<input type="text" name="packing[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))">
				</div>
			
			</div>
			<div class="sm:w-1/6 w-full">
																			<label
																				class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
																			<input type="text" name="unit_box[]"
																				class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																				placeholder="unit"
																				
																				required>
																		</div>
			<div class="sm:w-1/6 w-full mb-[30px]">
				<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
				<input type="text" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.product-row'))">
			</div>
			<div class="sm:w-1/6 w-full mb-[30px]">
				<label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
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
				<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
				<input type="text" name="p_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Unit Price" readonly>
			</div>
				

			<div class="sm:w-1/6 w-full mb-[30px]">
				<label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
				<input type="text" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Price" readonly>
			</div>
			
		   <div class="sm:w-1/6 w-full mb-[30px]">
	<label class="text-dark dark:text-white text-[13px] mb-2">Expire Date</label>
	<input type="date" name="exp_date[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="expired date" required>
</div>
   
		 

			<div class="sm:w-1/6 w-full mb-[30px]    d-flex align-items-center "  style="margin-top: 30px;">
				<button type="button" class="btn btn-danger border border-b-color block rounded-md py-1.5 px-3 outline-none" onclick="deleteProductForm(this)">
					<i class="fas fa-trash-alt" style="color:red;"></i>
				</button>
			</div>
		</div>
	`;

				productContainer.appendChild(newProductRow);
				initializeChoices();
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
					paidInput.value = '';   // Clear the value for other options
				}
			});
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