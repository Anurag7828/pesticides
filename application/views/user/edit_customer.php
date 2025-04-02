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
								<h6 class="text-[15px] font-medium text-body-color title relative">Update Your customer</h6>
							</div>

							<form class="profile-form" action="<?= base_url('Admin_Dashboard/edit_customer') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Customer Name</label>
											<input type="text" name="name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Customer Name" value="<?= $customer[0]['name'] ?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $customer['0']['id'] ?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">
											<input type="hidden" name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $customer['0']['branch_id'] ?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
											<input type="text" name="contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Number" value="<?= $customer['0']['contact'] ?>">
										</div>


										<hr>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
											<input type="text" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="email" value="<?= $customer['0']['email'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
											<input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address" value="<?= $customer['0']['address'] ?>">
										</div>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">interest rate</label>
											<input type="text" name="interest_rate" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="interest rate" value="<?= $customer['0']['interest_rate'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">interest days</label>
											<input type="text" name="interest_days" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="interest days" value="<?= $customer['0']['interest_days'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Price Type</label>
											<select name="price" class="form-control text-[13px] text-body-color border border-b-color rounded-md py-1.5 px-3 w-full" required>
												<option value="">Select Price Type</option>
												<option value="1" <?= ($customer['0']['price'] == '1') ? 'selected' : '' ?>>A (Sales Price 1)</option>
												<option value="2" <?= ($customer['0']['price'] == '2') ? 'selected' : '' ?>>B (Sales Price 2)</option>
												<option value="3" <?= ($customer['0']['price'] == '3') ? 'selected' : '' ?>>C (Sales Price 3)</option>
											</select>
										</div>

									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary" type="submit">Update customer</button>
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