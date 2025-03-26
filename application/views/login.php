<!DOCTYPE html>
<html lang="en">

<head>
	
	<!--Title-->
	<title>Login | Pastosoft</title>



	<?php include "includes/header-links.php" ?>
	
</head>
<body class="h-[100vh] selection:text-white selection:bg-primary" style="background-image:url('<?= base_url()?>assets/images/bg.png'); background-position:center;">
		<div class="authincation fix-wrapper bg-primary-light min-h-screen flex py-[30px] items-center">
			<div class="container h-full">
				<div class="row justify-center h-full items-center">
					<div class="md:w-1/2">
					<?php

if ($this->session->has_userdata('login_error')) {

	echo $this->session->userdata('login_error');

	$this->session->unset_userdata('login_error');

}

?>
						<div class="authincation-content bg-white dark:bg-[#182237] shadow-[0_0_2.1875rem_0_rgba(154,161,171,0.15)] rounded-md">
							<div class="row no-gutters">
								<div class="w-full">
									<div class="auth-form p-[3.125rem]">
										<div class="text-center mb-4">
											<a href="<?= base_url()?>"><img src="<?= base_url()?>assets/images/pastosoft.png" alt="" class="w-[160px] inline-block"></a>
										</div>
										<h4 class="text-center mb-6">Log In your account</h4>
										<form action="<?= base_url('Admin/adminlogin') ?>" method="POST">
											<div class="mb-4">
												<label class="mb-1 form-label">Username</label>
												<input  type="email" name="username" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="username">
											</div>
											
											<div class="mb-4 relative">
												<label class="form-label" for="dz-password">Password</label>
												<input type="password" name="password" required="" id="dz-password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="password" >
												<span class="show-pass eye absolute right-5 bottom-2.5 text-body-color text-sm">
													<i class="fa fa-eye-slash"></i>
													<i class="fa fa-eye"></i>
												</span>
											</div>
											
											<div class="text-center">
												<button type="submit" class="block w-full rounded font-bold h-[3.125rem] text-[15px] max-xl:text-xs leading-5 py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 border border-primary text-white bg-primary hover:bg-hover-primary hover:border-hover-primary duration-300">Log In</button>
											</div>
										</form>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	<!-- Required vendors -->
	<script src="<?= base_url()?>assets/vendor/global/global.min.js"></script>
	<script src="<?= base_url()?>assets/vendor/niceselect/js/jquery.nice-select.min.js"></script> <!-- nice-select -->
	<script src="<?= base_url()?>assets/js/custom.min.js"></script>
	<script src="<?= base_url()?>assets/js/deznav-init.js"></script>
	<script src="<?= base_url()?>assets/js/demo.js"></script>
	<script src="<?= base_url()?>assets/js/styleSwitcher.js"></script>
	
	
	
</body>

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:43:42 GMT -->
</html>