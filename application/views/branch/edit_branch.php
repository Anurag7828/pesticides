<!DOCTYPE html>
<html lang="en">


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
								<h6 class="text-[15px] font-medium text-body-color title relative">Add Your Branches</h6>
							</div>

							<form class="profile-form" action="<?= base_url('Branch_Dashboard/edit_branch') ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
									<div class="row">
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Name</label>
											<input type="text" name="name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Name" value="<?= $branch[0]['name'] ?>">
											<input type="hidden" name="id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $branch[0]['id'] ?>">
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $branch[0]['user_id'] ?>">


										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
											<input type="text" name="contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Contact Number" value="<?= $branch[0]['contact'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
											<input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address" value="<?= $branch[0]['address'] ?>">
										</div>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">City</label>
											<input type="text" name="city" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="city" value="<?= $branch[0]['city'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">State</label>
											<input type="text" name="state" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state" value="<?= $branch[0]['state'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Pin Code</label>
											<input type="text" name="pincode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Pin Code" value="<?= $branch[0]['pincode'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Country</label>
											<input type="text" name="country" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Pin Code" value="<?= $branch[0]['country'] ?>">
										</div>

										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Shop photo</label>
											<input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state" value="<?= $branch[0]['state'] ?>">
											
										</div>
										<hr>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Maneger Name</label>
											<input type="text" name="m_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Maneger Name" value="<?= $branch[0]['m_name'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Maneger Contact No.</label>
											<input type="text" name="m_contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Manerger Contact number"value="<?= $branch[0]['m_contact'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">User Name</label>
											<input type="text" name="username" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Username" value="<?= $branch[0]['username'] ?>">
										</div>
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Password</label>
											<input type="text" name="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="password" value="<?= $branch[0]['password'] ?>">
										</div>
									</div>
								</div>
								<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
									<button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary" type="submit">Update Branch</button>
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