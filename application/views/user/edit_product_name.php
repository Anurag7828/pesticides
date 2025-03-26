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
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Your product</h6>
							</div>
                   
                    	<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_product_name') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row"> 
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Product Name</label>
											<input type="text" name="product_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="product name" value="<?= $product_name[0]['product_name']?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $product_name['0']['id']?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">
									<input type="hidden" name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $product_name['0']['branch_id']?>">
										</div>	
											<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Company Name</label>
											<input type="text" name="company_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Company name" value="<?= $product_name[0]['company_name']?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $product_name['0']['id']?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">

										</div>	
										<div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">HSN Code</label>
                                        <input type="text" name="HSN" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="HSN Code" value="<?= $product_name['0']['HSN']?>">
                                    </div>
                                    <div class="flex  sm:w-1/3 w-full mb-[30px]">
																
																		<div class="sm:w-2/6 w-full">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Packing Quantity</label>
																			<input type="number" name="packing" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" required value="<?= $product_name['0']['packing']?>">
																		</div>
															
																		<div class="sm:w-2/6 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Net Unit</label>
																			<select name="net_unit" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
    <option value="Gram" <?= ($product_name[0]['net_unit'] == 'Gram') ? 'selected' : '' ?>>Gram</option>
    <option value="Liter" <?= ($product_name[0]['net_unit'] == 'Liter') ? 'selected' : '' ?>>Liter</option>
    <option value="Kilograms" <?= ($product_name[0]['net_unit'] == 'Kilogram') ? 'selected' : '' ?>>Kilogram</option>
</select>

																		</div>
																	</div>
                                                                    <div class="sm:w-1/6 w-full pl-3">
																			<label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
																			<select name="unit" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																				<option value="Single" <?= ($product_name[0]['unit'] == 'Single') ? 'selected' : '' ?>>Single</option>
																				<option value="Box" <?= ($product_name[0]['unit'] == 'Box') ? 'selected' : '' ?>>Box</option>
																			
																			</select>
																		</div> <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
                                        <input type="text" name="purchase_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Price" value="<?= $product_name['0']['purchase_price']?>">
                                    </div> 
                                   <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax(In %)</label>
                                        <input type="text" name="tax" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax(In %)" value="<?= $product_name['0']['tax']?>">
                                    </div> <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax Type</label>
                                        <select name="tax_type" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
																				<option value="Inclusive" <?= ($product_name[0]['tax_type'] == 'Inclusive') ? 'selected' : '' ?>>Inclusive</option>
																				<option value="Exclusive" <?= ($product_name[0]['tax_type'] == 'Exclusive') ? 'selected' : '' ?>>Exclusive</option>
																			
																			</select>
                                    </div>
                                    <div class="sm:w-1/4 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
                                        <input type="text" name="tax_amount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Tax Amount" value="<?= $product_name['0']['tax_amount']?>">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price With Tax</label>
                                        <input type="text" name="total_purchase_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Purchase Price With Tax" value="<?= $product_name['0']['total_purchase_price']?>">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">MRP</label>
                                        <input type="text" name="mrp" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="MRP" value="<?= $product_name['0']['mrp']?>">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Profit Margin (In %)</label>
                                        <input type="text" name="profit_margin" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Profit Margin" value="<?= $product_name['0']['profit_margin']?>">
                                    </div>
                                    <div class="sm:w-1/2 w-full mb-[30px]">
                                        <label class="text-dark dark:text-white text-[13px] mb-2">Seles Price</label>
                                        <input type="text" name="selling_price" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Seles Price" value="<?= $product_name['0']['selling_price']?>">
                                    </div>
									</div>
									
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary" type="submit" >Update Product</button>
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
</body>
</html>
