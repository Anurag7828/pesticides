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
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Branches</h6>
							</div>
							<form class="profile-form" action="<?= base_url('admin_Dashboard/add_branch/'.encryptId($user['0']['id'])) ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Name</label>
											<input type="text" name="name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Name" value="" required>
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
											<input type="text" name="contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Number" required>
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
											<input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address">
										</div>
                                        
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">City</label>
											<input type="text" name="city" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="city">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">State</label>
											<input type="text" name="state" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state">
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Pin Code</label>
											<input type="text" name="pincode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Pin Code">
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2" name="country">Country</label>
											<select class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]"  name="country" id="validationCustom01">
												<option  data-display="Please select">Please select</option>
												<option value="russia">Russia</option>
												<option value="canada">Canada</option>
												<option value="china">China</option>
												<option value="india">India</option>
											</select>
										</div>
                                        
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Shop photo</label>
											<input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state">
										</div>
                                        <hr>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Maneger Name</label>
											<input type="text" name="m_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Maneger Name" required>
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Maneger Contact No.</label>
											<input type="text" name="m_contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Manerger Contact number" required>
										</div><div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">User Name</label>
											<input type="text" name="username" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Username" required>
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Password</label>
											<input type="text" name="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="password" required>
										</div>
										<label class="text-dark dark:text-white text-[13px] mb-2">Role</label>
										<div class="mb-4">
										
                                            <div class="leading-normal inline-block min-h-[1.3125rem] pl-[1.5em] mb-0.5 custom-checkbox mr-4 form-check-inline">
												<input type="radio" class="form-check-input" id="customRadioBox7" name="main_role" value="1">
												<label class="mt-[5px] text-body-color ml-[0.3125rem]" for="customRadioBox7">Invoice</label>
											</div>
											<div class="leading-normal inline-block min-h-[1.3125rem] pl-[1.5em] mb-0.5 custom-checkbox mr-4 form-check-inline checkbox-success">
												<input type="radio" class="form-check-input" id="customRadioBox8" name="main_role" value="2">
												<label class="mt-[5px] text-body-color ml-[0.3125rem]" for="customRadioBox8">Purchase</label>
											</div>
											<div class="leading-normal inline-block min-h-[1.3125rem] pl-[1.5em] mb-0.5 custom-checkbox mr-4 form-check-inline checkbox-warning">
												<input type="radio" class="form-check-input" id="customRadioBox9" name="main_role" value="3">
												<label class="mt-[5px] text-body-color ml-[0.3125rem]" for="customRadioBox9">Both</label>
											</div>
                                        </div>
										
									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add Branch</button>
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
