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
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Your vender</h6>
							</div>
                   
                    	<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_vender') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row"> 
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Vender Name</label>
											<input type="text" name="vender_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="vender_name" value="<?= $vender[0]['vender_name']?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $vender['0']['id']?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">
											<input type="hidden" name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $vender['0']['branch_id']?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
											<input type="text" name="mobile" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Number" value="<?= $vender['0']['mobile']?>" >
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
											<input type="text" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Number" value="<?= $vender['0']['email']?>" >
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">GST No.</label>
											<input type="text" name="gst_no" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Gst No." value="<?= $vender['0']['gst_no']?>" required>
										</div>
                                        <div class="sm:w-1 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
											<input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address" value="<?= $vender['0']['address']?>" >
										</div>
                                        
										
                                        <hr>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact Person Name</label>
											<input type="text" name="contact_person" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Person Name" value="<?= $vender['0']['contact_person']?>" >
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact No. of Person</label>
											<input type="text" name="person_contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact number of person" value="<?= $vender['0']['person_contact']?>" >
										</div>
										
									
										
									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary" type="submit" >Update vender</button>
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
