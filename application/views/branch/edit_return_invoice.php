<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<meta name="keywords"
		content="YashAdmin, sales Admin Dashboard, Tailwind CSS Template, Web Application, sales Management, Responsive Design, User Experience, Customizable, Modern UI, Dashboard Template, Admin Panel, Tailwind CSS, HTML5, CSS3, JavaScript, Analytics, Products, Admin Template, UI Kit, CRM, Analytics, Responsive Dashboard, responsive admin dashboard, sales dashboard, ui kit, web app, Admin Dashboard, Template, Admin, CMS pages, Authentication, FrontEnd Integration, Web Application UI, Tailwind CSS Framework, User Interface Kit, Financial Dashboard, Customizable Template, Product Management, HTML5/CSS3, CRM Dashboard, Analytics Dashboard, Admin Dashboard UI, Mobile-Friendly Design, UI Components, Dashboard Widgets, Dashboard Framework, Data Visualization, User Experience (UX), Dashboard Widgets, Real-time Analytics, Cross-Browser Compatibility, Interactive Charts, Product Processing, Performance Optimization, Multi-Purpose Template, Efficient Admin Tools, Task Management, Modern Web Technologies, Product Tracking, Responsive Tables, Dashboard Widgets, Invoice Management, Access Control, Modular Design, Product History, Trend Analysis, User-Friendly Interface">

	<meta name="description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">

	<meta property="og:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
	<meta property="og:description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
	<meta property="og:image" content="../social-image.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
	<meta name="twitter:description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
	<meta name="twitter:image" content="../social-image.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
								<h6 class="text-[15px] font-medium text-body-color title relative">Return Invoice</h6>
								<!--<a href="<?= base_url('Branch_Dashboard/vender/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Venders</a><br>-->
							</div>
							<form class="profile-form" action="<?= base_url('Branch_Dashboard/edit_return_invoice?user_id=' . $user[0]['id'] . '&return_invoice_no=' . $invoice[0]['return_invoice_no']) ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
									    	<div class="sm:w-1/4 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select Stock</label>
										
											<?php foreach ($stock_list as $stock_info) { 
												if($invoice[0]['stock_place'] == $stock_info['id'] ) { ?>
										<input type="hidden" name="stock_place" id="stock_place" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $stock_info['id']; ?>"   >
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $stock_info['place_name']; ?>"  readonly >
												<?php } } ?>
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $invoice['0']['id'] ?>">
										<input type="hidden" name="uid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['user_id'] ?>">
										</div>
                               
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select Customer</label>
										
											<?php foreach ($customer_list as $customer_info) { 
												if($customer_info['id']==$invoice[0]['customer_name']) { ?>
										<input type="hidden"  name="customer_name" id="customer-name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $customer_info['id']; ?>"   >
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $customer_info['name']; ?>-<?= $customer_info['contact']; ?>"  readonly >
												<?php } } ?>
											<input type="hidden" name="invoice_no" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $invoice['0']['invoice_no'] ?>">

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
														    	<?php  $p_produc = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $invoice[0]['return_invoice_no'] ,'branch_id',$user[0]['id'],'user_id',$user[0]['user_id'] ); ?>
														<?php foreach ($p_produc as $p_info) : ?>
															<div id="product-container">
																<!-- Product fields that will be cloned -->
																<div class="row product-row">
																	<!-- Product Dropdown in the Row -->
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
																	
																						<?php foreach ($product_list as $product_info){ 
												if($p_info['p_name']==$product_info['id']) { ?>
										<input type="hidden"  name="p_name[]"  id="category-select" onchange="fetchProductDetails(this)" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $product_info['id']; ?>"   >
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $product_info['product_name']; ?>"  readonly >
												<?php } } ?>
																	</div>

																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Net Quantity</label>
				
    	<?php  $pp_produc = $this->CommonModal->getRowById('purchase_product', 'p_id', $p_info['packing']  );
												if($p_info['packing']==$pp_produc[0]['p_id'] ) { ?>
										<input type="hidden"  name="packing[]"  class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="sub-category-select"value="<?= $p_info['packing'] ; ?>"   >
											<input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $pp_produc[0]['packing'] ; ?><?= $pp_produc[0]['unit'] ; ?>"  readonly >
												<?php  } ?>
    <input type="hidden" name="unit[]" id="unit" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  " data-index="${rowIndex}" placeholder="Unit " required value="<?= $p_info['unit']?> " >
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
														 			<input type="hidden" name="available_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="available"  required readonly value="<?= $pp_produc[0]['availabile_quantity']?> ">
														    		<input type="hidden" name="id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $p_info['id'] ?>">
														    		<input type="hidden" name="invoice_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $p_info['invoice_id'] ?>">
														 					<input type="hidden"  name="ava_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" id="availablee"  required readonly value="<?=$p_info['available_quantity'] ?> ">
														 				<input type="text" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.row'))" value="<?= $p_info['quantity'] ?> " >
		
																	</div>
																	<div class="sm:w-1/6 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
																				<!--<input type="hidden" name="invoice_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  id="p_id" value=" <?= $p_info['id']?> " required readonly>-->
																<input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  id="p_id" value=" <?= $p_info['packing']?> " required readonly>
																		<input type="text" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Unit Rate" id="unit-rate" oninput="calculateTotalPrice(this.closest('.row'))" required value="<?= $p_info['unit_rate']?> ">
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
                                                           <div class="row">
                                                             <?php
                                                                   $purchase_payment =$this->CommonModal->getRowByIdOrderByLimit3('return_invoice_payment', 'return_invoice_no',  $invoice[0]['return_invoice_no'],'branch_id',$user[0]['id'],'user_id',$user[0]['user_id'],'id','ASC','1');
                                                                   ?>
                                                                      <div class="sm:w-1/3 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Payment Mode</label>
																		<select name="mode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                        <option value="Cash"<?= strpos($purchase_payment[0]['mode'] , 'Cash') !== false ? 'selected' : '' ?> >CASH</option>
                                                                        <option value="Upi"<?= strpos($purchase_payment[0]['mode'] , 'Upi') !== false ? 'selected' : '' ?> >UPI</option>
                                                                        <option value="Card"<?= strpos($purchase_payment[0]['mode'] , 'Card') !== false ? 'selected' : '' ?> >CREADIT/DEBIT</option>
                                                                        <option value="Bank"<?= strpos($purchase_payment[0]['mode'] , 'Bank') !== false ? 'selected' : '' ?> >Bank Transfer</option>
                                                                           <option value="None"<?= strpos($purchase_payment[0]['mode'] , 'None') !== false ? 'selected' : '' ?> >None</option>
                                                              </select>
															</div>
                                                            <div class="sm:w-1/3 w-full mb-[30px]"  id="bankDetails" style="display:none;">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																		<select name="bank" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="bankAccount" >
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                                        
                                                                        foreach ($account as $account_info) { ?>
                                                                        <option value="<?= $account_info['id']?>"<?= strpos($purchase_payment[0]['bank'] , $account_info['id']) !== false ? 'selected' : '' ?>><?= $account_info['bank_name']?></option>
                                                                        <?php } ?>
                                                                          </select>
															</div>
														 <div class="sm:w-1/3 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Paid Amount</label>
   
    <input type="text" name="paid"  id="paid-amount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['paid'] ?>">
     <input type="hidden" name="p_p_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="paid amount" value="<?= $purchase_payment[0]['id'] ?>">
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
            url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
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
            url: '<?= base_url("Admin_Dashboard/get_subcategories/") ?>' + selectedProductId, // Adjust the URL to match your route
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
            url: '<?= base_url("Admin_Dashboard/get_unit_rate/") ?>' + selectedPacking, // Update with your actual route for unit rate
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
            url: '<?= base_url("Admin_Dashboard/get_unit/") ?>' + selectedPacking, // Update with your actual route for unit
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
$(document).ready(function() {
    $('#category-select').change(function() {
        var selectedCategory = $(this).val();
        var subCategorySelect = $('#sub-category-select');
        var unitRateField = $('#unit-rate');
          var availableQuantity = $('#available');
                    var pid = $('#p_id');
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
                url: '<?= base_url("Admin_Dashboard/get_subcategories/") ?>' + selectedCategory, // Update with your actual route
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
    $('#sub-category-select').change(function() {
        var selectedPacking = $(this).val();
        var unitRateField = $('#unit-rate');
          var availableQuantity = $('#available');
          var pid = $('#p_id');
        // Fetch the unit rate based on the selected packing
        if (selectedPacking) {
            $.ajax({
                url: '<?= base_url("Admin_Dashboard/get_unit_rate/") ?>' + selectedPacking, // Update with your actual route for unit rate
                type: 'GET',
                dataType: 'json',
                success: function(data) {
					// console.log('Subcategory:', data);

                    // Assuming the response contains the unit rate
                    if (data.unit_rate) {
                        unitRateField.val(data.unit_rate); // Set the unit rate
                         availableQuantity.val(data.availabile_quantity); 
                          pid.val(data.p_id); 
                    } else {
                        unitRateField.val(''); // Clear if no unit rate found
                         availableQuantity.val(' '); 
                          pid.val('');
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
    $('#sub-category-select').change(function() {
        var selectedPacking = $(this).val();
        var unit = $('#unit');

        // Fetch the unit rate based on the selected packing
        if (selectedPacking) {
            $.ajax({
                url: '<?= base_url("Admin_Dashboard/get_unit/") ?>' + selectedPacking, // Update with your actual route for unit rate
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
$(document).ready(function() {
    $('#contact').change(function() {
        var selectedContact = $(this).val();
        var nameSelect = $('#customer-name');
        // Clear previous options
        nameSelect.empty();
        nameSelect.append('<option selected>Select Customer</option>');

        // Fetch customer names via AJAX
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_name/") ?>' + (selectedContact ? selectedContact : 'all'), // If no contact, fetch all customers
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
        if (this.value === 'Bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
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
    function filterProducts() {
    var stockPlaceId = document.getElementById('stock_place').value;
    
    
    
    // Fetch products for the selected stock place
if (stockPlaceId) {
    $.ajax({
        url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
        type: 'POST',
        data: { stock_place_id: stockPlaceId },
        dataType: 'json',
        success: function(products) {
            // Clear existing options before appending new ones
            $('#category-select').empty().append('<option value="all">Select Product</option>');

            // Loop through the products and add them as options
            products.forEach(function(product) {
              // Logging the product name to check
                 $('#category-select').append('<option value="' + product.pro_id + '">' + product.product_name + '</option>');
            });
        }
    });
}

}
 // Listen for stock place change and update product lists accordingly
$(document).on('change', 'select[name="stock_place"]', function() {
    const stockPlaceId = $(this).val();
    updateProductOptionsForAllRows(stockPlaceId);
});

// Function to update product options for all rows based on stock place
function updateProductOptionsForAllRows(stockPlaceId) {
    if (stockPlaceId) {
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
            type: 'POST',
            data: { stock_place_id: stockPlaceId },
            dataType: 'json',
            success: function(products) {
                // For each product row, update the product options
                $('.category-select').each(function() {
                    const productSelect = $(this);
                    productSelect.html('<option value="">Select Product</option>');

                    // Append products to the dropdown
                    products.forEach(function(product) {
                        productSelect.append('<option value="' + product.pro_id + '">' + product.product_name + '</option>');
                    });
                });
            },
            error: function() {
                console.error('Failed to fetch products.');
            }
        });
    }
}
//   
$(document).on('input', 'input[name="quantity[]"]', function() {
    var row = $(this).closest('.product-row');
    checkAvailableQuantity(row);
});

function checkAvailableQuantity(row) {
      var availableQuantity = parseFloat($(`#availablee`).val()) || 0; 
    const enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

    if (enteredQuantity > availableQuantity) {
        alert("Not Return . Maximum Sale Is: " + availableQuantity);
        row.find('input[name="quantity[]"]').val('');
    }
}
</script>
<script>
    $(document).on('click', '#add-product-btn', function(event) {
        var paidInput = $('#paid-amount');
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
</script>


		<?php include "includes2/footer-links.php" ?>
	</div>
	<?php include "includes2/footer.php" ?>
</body>

</html>