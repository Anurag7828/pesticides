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
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your stocks</h6>
								<a href="<?= base_url('Admin_Dashboard/stock_place/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View stocks Place</a><br></div>
							<form class="profile-form" action="<?= base_url('admin_Dashboard/add_stock_place/'.encryptId($user['0']['id']).'/0') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Stock Place Name</label>
											<input type="text" name="place_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Stock Place Name" required>
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $stock['0']['id']?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  value="<?= $user['0']['id']?>">

										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2"> Address </label>
											<input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address" required>
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
									
											<input type="checkbox" name="default" value="1" class="form-control "> set Default
										</div>

									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add stock</button>
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