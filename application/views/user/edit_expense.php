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
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Expense</h6>
								<a href="<?= base_url('Admin_Dashboard/expense/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View expense</a><br></div>
							<form class="profile-form" action="<?= base_url('admin_Dashboard/edit_expense') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
											<input type="date" name="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="" value="<?= $expense['0']['date']?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $expense['0']['id']?>">

											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">

										</div>
										
                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Category</label>
																		<select name="category_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " required>
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                        
                                                                        
                                                        foreach ($category as $category_info) { ?>
                                        <option value="<?= $category_info['id']?>"<?= ($category_info['id'] == $expense['0']['category_id'])  ? 'selected' : ''; ?>><?= $category_info['name']?></option>
                                        <?php } ?>

    </select>
															</div>
                                                            <div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Expense For</label>
											<input type="text" name="expense" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Expense For" value="<?= $expense['0']['expense']?>">
										</div>
                                        
										
                                        
                                        <hr>
                                        <div class="row">
                                                                  <div class="sm:w-1/3 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Payment Mode</label>
																		<select name="payment_type" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                                                    <option value="Cash"<?= strpos($expense[0]['payment_type'] , 'Cash') !== false ? 'selected' : '' ?>>CASH</option>
                                                        <option value="Upi"<?= strpos($expense[0]['payment_type'] , 'Upi') !== false ? 'selected' : '' ?>>UPI</option>
                                                        <option value="Card"<?= strpos($expense[0]['payment_type'] , 'Card') !== false ? 'selected' : '' ?>>CREADIT/DEBIT</option>
                                                        <option value="Bank"<?= strpos($expense[0]['payment_type'] , 'Bank') !== false ? 'selected' : '' ?>>Bank Transfer</option>
                                                         

    </select>
															</div>
                                                            <div class="sm:w-1/3 w-full mb-[30px]"  id="bankDetails" style="display:none;">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																		<select name="account" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="bankAccount" >
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                        
                                                                        
                                                                        foreach ($account as $account_info) { ?>
                                                        <option value="<?= $account_info['id']?>"<?= strpos($expense[0]['account'] , $account_info['id']) !== false ? 'selected' : '' ?>><?= $account_info['bank_name']?>-<?= $account_info['account_no']?></option>
                                                        <?php } ?>
                                                      

    </select>
															</div>
															<div class="sm:w-1/3 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2"> Amount</label>
																<input type="text"  name="amount" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $expense['0']['amount']?>">
															</div>
                                                          
                                                            </div>
                                         <div class="sm:w-1 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Note</label>
                                            <textarea name="note" class="relative text-[13px] h-auto min-h-auto border border-b-color block rounded-md p-3 duration-500  outline-none w-full resize-y" rows="8" id="comment"><?= $expense['0']['note']?></textarea>
										</div>
									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update expense</button>
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
    function toggleBankDetails() {
        var paymentMode = document.getElementById('paymentMode');
        var bankDetails = document.getElementById('bankDetails');
        if (paymentMode.value === 'Bank') {
            bankDetails.style.display = 'block';
        } else {
            bankDetails.style.display = 'none';
        }
    }

    // Call the function on page load
    window.onload = toggleBankDetails;

    // Add event listener for change
    document.getElementById('paymentMode').addEventListener('change', toggleBankDetails);
</script>
</body>
</html>