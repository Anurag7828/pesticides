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
	<style>
	      .address-wrap {
    word-break: break-word; 
    overflow-wrap: break-word;
 
}
	</style>
	
</head>
<body class="selection:text-white selection:bg-primary">

<!-- Main wrapper start -->
<div id="main-wrapper" class="relative">
<?php include "includes2/header.php" ?>
<?php include "includes2/sidebar.php" ?>
<!-- Content body start -->
<!-- Content body start -->
<div class="content-body">
			<div class="container-fluid">
			    
		<div class="row">
		    <div class="xl:w-3/4 col-xxl-12">
						<div class="row">
							<div class="w-full">
								<div class="row">  
								<div class="xl:w-1/2">
										<div class="row">
    <div class="xl:w-1/2 sm:w-1/2 w-full">
        <div class="card">
            <div class="sm:p-5 p-4">
                <div class="flex items-center justify-between">
              
                       	<img src="<?= base_url() ?>uploads/users/<?= $u['0']['image'] ?>" class="avatar avatar-md mr-2.5 h-[2.813rem] w-[2.813rem] inline-block object-cover rounded-md items-center" alt="" >
											
                 
                    <a href="<?= base_url()?>">
                        <div class="total-projects ml-4 text-right">
                            <h3 class="text-primary count text-[18px] font-semibold"><?= $u[0]['name'] ?></h3>
                            <span class="text-[13px] text-body-color">Owner</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
     <div class="xl:w-1/2 sm:w-1/2 w-full">
        <div class="card">
            <div class="sm:p-5 p-4">
                <div class="flex items-center justify-between">
                    <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-primary-light rounded-full">
                          <i class="fa-solid fa-cart-shopping text-primary scale-[1.9]"></i>
                    </div>
                   <a href="<?= base_url('admin_Dashboard/product_name/'.encryptId($user['0']['id'])) ?>">
                        <div class="total-projects ml-4 text-right">
                            <h3 class="text-primary count text-[28px] font-semibold"><?= $product ?></h3>
                            <span class="text-[13px] text-body-color">Total Products</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--<div class="xl:w-1/4 sm:w-1/2">-->
    <!--    <div class="card duration-500 hover:shadow-[rgba(0,0,0,0.1)_0px_10px_15px_-3px,rgba(0,0,0,0.05)_0px_4px_6px_-2px]">-->
    <!--        <div class="sm:p-5 p-4">-->
    <!--            <div class="flex items-center">-->
    <!--                <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-primary-light rounded-md">-->
    <!--                    <i class="fa-solid fa-cart-shopping text-primary scale-[1.9]"></i>-->
    <!--                </div>-->
    <!--                <a href="<?= base_url('admin_Dashboard/return/'.encryptId($user['0']['id'])) ?>">-->
    <!--                    <div class="total-projects ms-3">-->
    <!--                        <h3 class="text-primary text-[28px] font-semibold count"><?= $return_purchase ?></h3>-->
    <!--                        <span class="text-xs text-body-color">Total Return Product</span>-->
    <!--                    </div>-->
    <!--                </a>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="xl:w-1/2 sm:w-1/2">
        <div class="card ">
            <div class="sm:p-5 p-4">
                <div class="flex items-center  justify-between">
                <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-primary-light rounded-full">
                        <i class="fa-solid fa-hand-holding-dollar text-danger scale-[1.9]"></i>
                    </div>
                    <a href="<?= base_url('admin_Dashboard/invoice/'.encryptId($user['0']['id'])) ?>">
                       <div class="total-projects ml-4 text-right">
                            <h3 class="text-danger text-[28px] font-semibold count"><?= $invoice ?></h3>
                            <span class="text-[13px] text-body-color">Total Invoice</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
	
    <div class="xl:w-1/2 sm:w-1/2">
        <div class="card ">
            <div class="sm:p-5 p-4">
                <div class="flex items-center  justify-between">
                         <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-primary-light rounded-full">
                        <i class="fa-solid fa-users text-warning scale-[1.9]"></i>
                    </div>
                    <a href="<?= base_url('admin_Dashboard/customer/'.encryptId($user['0']['id'])) ?>">
                        <div class="total-projects ml-4 text-right">
                            <h3 class="text-warning text-[28px] font-semibold count"><?= $customer ?></h3>
                            <span class="text-[13px] text-body-color">Total Customer</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="xl:w-1/2 sm:w-1/2 w-full">
        <div class="card">
            <div class="sm:p-5 p-4">
                <div class="flex items-center justify-between">
                    <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-[#bbe6e380] dark:bg-[#3a9b940d] rounded-full">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9715 29.3168C15.7197 29.3168 9.52686 30.4132 9.52686 34.8043C9.52686 39.1953 15.6804 40.331 22.9715 40.331C30.2233 40.331 36.4144 39.2328 36.4144 34.8435C36.4144 30.4543 30.2626 29.3168 22.9715 29.3168Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9714 23.0537C27.7304 23.0537 31.5875 19.1948 31.5875 14.4359C31.5875 9.67694 27.7304 5.81979 22.9714 5.81979C18.2125 5.81979 14.3536 9.67694 14.3536 14.4359C14.3375 19.1787 18.1696 23.0377 22.9107 23.0537H22.9714Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <a href="<?= base_url('admin_Dashboard/vender/'.encryptId($user['0']['id'])) ?>">
                        <div class="total-projects ml-4 text-right">
                            <h3 class="text-success count text-[28px] font-semibold"><?= $vender ?></h3>
                            <span class="text-[13px] text-body-color">Total Vender</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
     
    <div class="xl:w-1/2 sm:w-1/2 w-full">
        <div class="card">
            <div class="sm:p-5 p-4">
                <div class="flex items-center justify-between">
                    <div class="w-[4.375rem] h-[4.375rem] leading-[4.375rem] relative inline-block text-center bg-[#bbe6e380] dark:bg-[#3a9b940d] rounded-full">
                        <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9715 29.3168C15.7197 29.3168 9.52686 30.4132 9.52686 34.8043C9.52686 39.1953 15.6804 40.331 22.9715 40.331C30.2233 40.331 36.4144 39.2328 36.4144 34.8435C36.4144 30.4543 30.2626 29.3168 22.9715 29.3168Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.9714 23.0537C27.7304 23.0537 31.5875 19.1948 31.5875 14.4359C31.5875 9.67694 27.7304 5.81979 22.9714 5.81979C18.2125 5.81979 14.3536 9.67694 14.3536 14.4359C14.3375 19.1787 18.1696 23.0377 22.9107 23.0537H22.9714Z" stroke="#3AC977" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                    <a href="<?= base_url('admin_Dashboard/stovk_place/'.encryptId($user['0']['id'])) ?>">
                        <div class="total-projects ml-4 text-right">
                            <h3 class="text-success count text-[28px] font-semibold"><?= $stock_place ?></h3>
                            <span class="text-[13px] text-body-color">Total Stock Places</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
   </div>
    </div>
   
<div class="xl:w-1/4 sm:w-1/2 w-full">
										<div class="card bg-success rainbow-box relative z-[1] flex flex-col" style="background-image: url(<?= base_url() ?>assets/images/rainbow.gif);background-size: cover;background-blend-mode: luminosity;">
											<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
																						<img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" class="avatar avatar-md mr-2.5 h-[2.813rem] w-[2.813rem] inline-block object-cover rounded-md" alt="" >
											</div>
											<div class="sm:p-5 p-4 sm:pt-0 pt-0 flex-auto">
												<div class="finance"> 
													<h4 class="text-white max-xl:text-xl text-2xl mb-2 leading-[1.5]"><?= $user['0']['name']?></h4>
													<p class="text-white mb-4">
													Protecting crops from pests, enhancing growth naturally, ensuring healthy harvests. Your trusted partner for sustainable farming solutions and success!
													</p>
												</div>
												<div class="flex pt-4"> 
												
													<div class="ratting-data ml-5">
												<a href="<?= base_url('admin_Dashboard/add_invoice/'.encryptId($user['0']['id']))?>" class="inline-block rounded font-medium xl:text-[15px] text-xs leading-5 xl:py-[0.719rem] xl:px-[1.375rem] py-2.5 px-4 border border-secondary text-white bg-secondary">Create Invoice</a>
													</div>
												</div>
												
											</div>
										</div>
									</div>
	<div class="xl:w-1/4  sm:w-1/2 w-full">
						<div class="row">
							<div class="w-full">
								<div class="card flex flex-col bg-[#222B40]">
									<div class="card-body schedules-cal p-2" style="height: 340px;">
										<input type="text" class="form-control hidden" id="datetimepicker1">
										<div class="calendar-container"></div>
										
									</div>
								</div>
							</div>
						
						</div>
					</div>
					<div class="xl:w-1/2 col-xxl-12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Transaction</h4>
							</div>
							<div class="sm:pt-5 pt-4 flex-auto dz-tab-area">
								<ul class="nav nav-tabs nav-pills success-tab px-5 mb-5 flex flex-wrap" id="pills-tab" role="tablist">
								  <li class="nav-item" role="presentation">
									<button class="nav-link rounded-md px-[15px] py-[5px] text-[13px] block active tab-btn" data-tab="pills-social" type="button" role="tab"  aria-selected="true">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24"/>
												<path d="M16.5,4.5 C14.8905,4.5 13.00825,6.32463215 12,7.5 C10.99175,6.32463215 9.1095,4.5 7.5,4.5 C4.651,4.5 3,6.72217984 3,9.55040872 C3,12.6834696 6,16 12,19.5 C18,16 21,12.75 21,9.75 C21,6.92177112 19.349,4.5 16.5,4.5 Z" fill="#888888" fill-rule="nonzero" opacity="0.3"/>
												<path d="M12,19.5 C6,16 3,12.6834696 3,9.55040872 C3,6.72217984 4.651,4.5 7.5,4.5 C9.1095,4.5 10.99175,6.32463215 12,7.5 L12,19.5 Z" fill="#888888" fill-rule="nonzero"/>
											</g>
										</svg>
										<span class="dark-2">Purchase<br>Product</span>
									</button>
								  </li>
								  <li class="nav-item ml-[15px]" role="presentation">
									<button class="nav-link rounded-md px-[15px] py-[5px] text-[13px] block tab-btn" data-tab="pills-project" type="button" role="tab"  aria-selected="false">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#888888"/>
												<path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#888888" fill-rule="nonzero" opacity="0.3"/>
											</g>
										</svg>
										<span class="dark-2">Return<br>product</span>
									</button>
								  </li>
								  <li class="nav-item ml-[15px]" role="presentation">
									<button class="nav-link rounded-md px-[15px] py-[5px] text-[13px] block tab-btn" data-tab="pills-sale" type="button" role="tab"  aria-selected="false">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#888888" fill-rule="nonzero"/>
												<path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#888888" fill-rule="nonzero" opacity="0.3" transform="translate(14.000019, 10.749981) scale(1, -1) translate(-14.000019, -10.749981) "/>
											</g>
										</svg>
										<span class="dark-2">Sales</span></button>
								  </li>
								   
								  <li class="nav-item ml-[15px]" role="presentation">
									<button class="nav-link rounded-md px-[15px] py-[5px] text-[13px] block tab-btn" data-tab="pills-all1" type="button" role="tab" aria-selected="false">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="svg-main-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#888888" opacity="0.3"/>
												<path d="M14.35,10.5 C13.54525,10.5 12.604125,11.4123161 12.1,12 C11.595875,11.4123161 10.65475,10.5 9.85,10.5 C8.4255,10.5 7.6,11.6110899 7.6,13.0252044 C7.6,14.5917348 9.1,16.25 12.1,18 C15.1,16.25 16.6,14.625 16.6,13.125 C16.6,11.7108856 15.7745,10.5 14.35,10.5 Z" fill="#888888" fill-rule="nonzero" opacity="0.3"/>
											</g>
										</svg>
										<span class="dark-2">Return <br>Sales</span>
									</button>
								  </li>
								</ul>
								      <div class="tabular-nums tab-content-area" id="pills-tabContent">
									  <div class="tab-content show active" id="pills-social">
    <div class="overflow-x-auto">
        <table class="table mb-4 w-full card-table border-no success-tbl">
            <thead>
                <tr>
                    <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Purchase Code</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Vendor Name</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Date</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Paid Amount</th>
                    <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Due Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $serial = 1; 
                    $totalAmount = 0; // Initialize total amount
                    $totalPaid = 0; // Initialize total paid amount
                    $totalDue = 0; // Initialize total due amount
                    
                    foreach ($purchase_payment as $product): 
                        $totalAmount += $product['total']; // Add total amount
                        $totalPaid += $product['paid']; // Add paid amount
                        $totalDue += $product['due']; // Add due amount
                ?>
                    <tr>
                        <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
                        <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-dark dark:text-white text-xs font-medium"><?= $u[0]['purchase_code'] ?>-<?= $product['purchase_code'] ?></td>  
                        <td class="py-[0.7375rem] p-2.5address-wrap text-body-color dark:text-white text-[13px]"><?= $product['vender_name'] ?></td>
                        <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
                        <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['total'] ?></td>
                        <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹<?= $product['paid'] ?></td>
                        <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹<?= $product['due'] ?></td>
                    </tr>
                <?php endforeach; ?>
                <!-- Total row -->
                <tr>
                    <td colspan="4" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total Purchase Payment</td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount ?></td> 
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-colo">₹ <?= $totalPaid ?></td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalDue ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

									    <div class="tab-content" id="pills-project">
									<div class="overflow-x-auto">
   <table class="table mb-4 w-full card-table border-no success-tbl">
    <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Code</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Vendor Name</th>
                 <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Date</th>
                 <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Paid Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Due Amount</th>
         
        </tr>
    </thead>
    <tbody>
        <?php 
            $serial = 1; 
            $totalReturnAmount = 0; // Initialize total return amount
                    $totalPaid = 0; // Initialize total paid amount
                    $totalDue = 0; // Initialize total due amount
            foreach ($return_purchase as $product): 
                $totalReturnAmount += $product['total']; // Add each grand_total to totalReturnAmount

                        $totalPaid += $product['paid']; // Add paid amount
                        $totalDue += $product['due']; // Add due amount
                ?>
        
            <tr> 
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-2 cat-name">
                            <p class="text-dark dark:text-white text-xs font-medium"><?= $u[0]['returne_code']?>-<?= $product['return_code'] ?></p>  
                        </div>  
                    </div>
                </td>
                <td class="py-[0.7375rem] p-2.5 address-wrap text-body-color dark:text-white text-[13px]"><?= $product['vender_name'] ?></td>
                  <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['total'] ?></td>
              
                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['paid'] ?></td>
                  <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= $product['due'] ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Total Return Amount row -->
         <tr>
                    <td colspan="4" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total Purchase Return Payment</td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalReturnAmount ?></td> 
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalPaid ?></td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalDue ?></td>
                </tr>
    </tbody>
</table>

</div>
  </div>
								<div class="tab-content" id="pills-sale">
									<div class="overflow-x-auto">
   <table class="table mb-4 w-full card-table border-no success-tbl">
    <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Invoice No.</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Customer Name</th>
                        <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Date</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Paid</th>
                        <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Due</th>
          
        </tr>
    </thead>
    <tbody>
        <?php 
          
                $serial = 1; 
    $totalReturnAmount = 0; // Initialize total return amount for Sale table
    $totalPaid = 0; // Initialize total paid for Sale table
    $totalDue = 0; // Initialize total due for Sale table// Initialize total return amount
            foreach ($invoice_payment as $product): 
                $totalReturnAmount += $product['total']; // Add each grand_total to totalReturnAmount
                 $totalPaid += $product['paid']; // Add paid amount
                        $totalDue += $product['due']; // Add due amount
        ?>
            <tr> 
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-2 cat-name">
                            <p class="text-dark dark:text-white text-xs font-medium"><?= $u[0]['prefix']?>-<?= $product['invoice_no'] ?></p>  
                        </div>  
                    </div>
                </td>
                <td class="py-[0.7375rem] p-2.5 address-wrap text-body-color dark:text-white text-[13px]"><?= $product['name'] ?></td>

                 <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
                                 <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['total'] ?></td>
                                                 <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['paid'] ?></td>
                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['due'] ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Total Return Amount row -->
        <tr>
                    <td colspan="4" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total Purchase Return Payment</td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap  border-t border-t-color">₹ <?= $totalReturnAmount ?></td> 
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalPaid ?></td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap  border-t border-t-color">₹ <?= $totalDue ?></td>
                </tr>
    </tbody>
</table>

</div>


									  </div>
								 <div class="tab-content" id="pills-all1">
									<div class="overflow-x-auto">
   <table class="table mb-4 w-full card-table border-no success-tbl">
    <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Invoice No.</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Customer Name</th>

            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Date</th>
                        <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Paid</th>
                        <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Due</th>
        </tr>
    </thead>
    <tbody>
        <?php 
           $serial = 1; 
    $totalReturnAmount = 0; // Initialize total return amount for Sale table
    $totalPaid = 0; // Initialize total paid for Sale table
    $totalDue = 0; // Initialize total due for Sale table // Initialize total return amount
            foreach ($return_invoice_payment as $product): 
                $totalReturnAmount += $product['total']; // Add each grand_total to totalReturnAmount
                 $totalPaid += $product['paid']; // Add paid amount
                        $totalDue += $product['due']; // Add due amount
        ?>
            <tr> 
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
                <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="ml-2 cat-name">
                            <p class="text-dark dark:text-white text-xs font-medium"><?= $u[0]['returne_code']?>-<?= $product['return_invoice_no'] ?></p>  
                        </div>  
                    </div>
                </td>
                <td class="py-[0.7375rem] p-2.5 address-wrap text-body-color dark:text-white text-[13px]"><?= $product['customer_name'] ?></td>
                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['total'] ?></td>
                                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['paid'] ?></td>
                                                <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['due'] ?></td>
            </tr>
        <?php endforeach; ?>
        <!-- Total Return Amount row -->
        <tr>
                    <td colspan="4" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total Purchase Return Payment</td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap  border-t border-t-color">₹ <?= $totalReturnAmount?></td> 
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap  border-t border-t-color">₹ <?= $totalPaid ?></td>
                    <td class="py-[0.7375rem] p-2.5 whitespace-nowrap  border-t border-t-color">₹ <?= $totalDue ?></td>
                </tr>
    </tbody>
</table>

</div>


									  </div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="xl:w-1/2">
						<div class="card">
							<div class="card-body p-0">
								<div class="overflow-x-auto active-projects">
									<div class="sm:p-5 p-4">
										<h4 class="text-base">Stocks</h4>
									</div>
				<table id="projects-tbl" class="table">
    <thead>
        <tr>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Stock Place Name</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Product Name</th>
                        <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Available Quantity</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Total Quantity</th>

            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-right">Expire Date</th>
        </tr>
    </thead>
<tbody>
    <?php if (!empty($stock)) : ?>
        <?php foreach ($stock as $stock_info) : ?>
            <?php
            // Fetch the stock place name based on the stock_place_name ID
            $stock_place_name = 'Not Found';
            foreach ($s_place as $s_place_info) {
                if ($s_place_info['id'] == $stock_info['stock_place_name']) {
                    $stock_place_name = $s_place_info['place_name'];
                    break;
                }
            }

            // Fetch the product name based on the product_name ID
            $product_name = 'Not Found';
            foreach ($product_list as $product_list_info) {
                if ($product_list_info['id'] == $stock_info['product_name']) {
                    $product_name = $product_list_info['product_name'];
                    break;
                }
            }

            // Determine if row should use the danger class based on available quantity
            $row_class = ($stock_info['availabile_quantity'] <= 10) ? 'table-danger' : 'table-success';
            $quantity_class = ($stock_info['availabile_quantity'] <= 10) ? 'bg-danger text-white' : 'bg-success text-white';
            ?>
            <tr class="<?= $row_class; ?>">
                <td class="text-[13px] font-normal text-body-color py-2.5 pl-4 pr-0  border-b border-[#E6E6E6] dark:border-[#ffffff1a] address-wrap"><?= $stock_place_name; ?></td>
                <td class="text-[13px] font-normal py-2.5 px-4 address-wrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color <?= $row_class; ?>">
                    <div class="flex items-center">
                        <p class="ml-2 dark:text-white text-[13px]"><?= $product_name; ?></p>    
                    </div>
                </td>
              
                <td class="py-2.5 pl-4 pr-0 font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] <?= $row_class; ?>">
                    <!-- Apply background color based on available quantity -->
                    <span class="text-xs py-[5px] px-3 rounded leading-[1.5] <?= $quantity_class; ?>"><?= $stock_info['availabile_quantity']; ?></span>
                </td>
                  <td class="text-[13px] py-2.5 pl-4 pr-0 font-normal border-b border-[#E6E6E6] dark:border-[#ffffff1a] <?= $row_class; ?>">
                    <div class="flex items-center">   
                        <span class="text-primary"><?= $stock_info['quantity']; ?></span>
                    </div>
                </td>
                <td class="text-[13px] font-normal py-2.5 px-4 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color <?= $row_class; ?>">
                    <span><?= date('d-m-y', strtotime($stock_info['exp_date'])) ?></span>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr><td colspan="5">No data found</td></tr>
    <?php endif; ?>
</tbody>




</table>

								</div>
							</div>
						</div>
					</div>
					<div class="xl:w-1/2">
						<div class="card">
							<div class="card-body p-0">
								<div class="overflow-x-auto active-projects">
									<div class="sm:p-5 p-4">
                                        <h4 class="text-base">Invoice</h4>
									</div>
								<table id="empoloyees-tbl3" class="table w-full">
    <thead>
        <tr>
            
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Invoice No.</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Customer Name</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Total Products</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Total<br>Amount</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Paid<br>Amount</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Due<br>Amount</th>
            <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">Status</th>
          
        </tr>
    </thead>
   <tbody>
    <?php if (!empty($view_invoice)) : ?>
        <?php
        $displayedInvoices = []; // Track unique invoice-customer combinations
        foreach ($view_invoice as $customer_info) :
            $uniqueKey = $customer_info['invoice_no'] . '-' . $customer_info['customer_name'];
            if (!in_array($uniqueKey, $displayedInvoices)) :
                $displayedInvoices[] = $uniqueKey;

                // Fetch payment details
                $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user[0]['id'], 'id', 'DESC', '1');
                $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user[0]['id'], 'paid');

                // Calculate Paid and Due Amount
                $paidAmount = $paymentsum[0]['total_sum'] ?? 0;
                $totalAmount = $customer_info['final_total'];
                $dueAmount = $payment[0]['due'] ?? max($totalAmount - $paidAmount, 0);

                // Determine Status
                $statusClass = 'bg-warning';
                $status = 'Partial';
                if ($paidAmount >= $totalAmount) {
                    $status = $paidAmount > $totalAmount ? 'Advance' : 'Complete';
                    $statusClass = $paidAmount > $totalAmount ? 'bg-primary' : 'bg-success';
                } elseif ($paidAmount == 0) {
                    $status = 'Pending';
                    $statusClass = 'bg-danger';
                }
        ?>
                <tr>
                    <td class="text-[13px] font-normal text-body-color py-2.5 pl-4 pr-0 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a]">
                        <?= $u[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] text-body-color py-2.5 px-5 font-normal address-wrap">
                        <?= $customer_info['customer_name'] ?>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] text-body-color py-2.5 px-5 font-normal whitespace-nowrap">
                        <?= $customer_info['product_count'] ?>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] text-body-color py-2.5 px-5 font-normal whitespace-nowrap">
                        ₹ <?= $totalAmount ?>
                    </td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] text-body-color py-2.5 px-5 font-normal whitespace-nowrap">
                        ₹ <?= $paidAmount ?>
                    </td>
                   <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-[13px] text-body-color py-2.5 px-5 font-normal whitespace-nowrap">
    ₹ <?= number_format($payment[0]['due'] ?? ($totalAmount - $paidAmount), 2) ?>
</td>
                    <td class="border-b border-[#E6E6E6] dark:border-[#ffffff1a] py-2.5 px-5 whitespace-nowrap">
                        <span class="inline-block leading-[1.5] rounded text-xs py-[5px] px-3 text-white <?= $statusClass ?>">
                            <?= $status ?>
                        </span>
                    </td>
                </tr>
        <?php endif; endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="7" class="text-center">No data found</td>
        </tr>
    <?php endif; ?>
</tbody>

</table>

								</div>
							</div>
						</div>
					</div>
					
						<div class="xl:w-1/3">
								<div class="card">
									<div class="card-header flex justify-between sm:pt-6 pb-4 py-5 sm:px-5 px-4 items-center relative flex-wrap">
										<h4 class="text-base">Top Selling Products</h4>
									</div>
									<div class="card-body p-0">
										<div class="overflow-x-auto active-projects">
											<table id="projects-tbl4" class="table mb-4 w-full">
												<thead>
													<tr>
													    <th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-right">S.No</th>
														<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-left">PRDUCTS NAME</th>
														<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-right">PRICE</th>
														
													</tr>
												</thead>
												<tbody>
												   <?php  $serial = 1;
												   if (!empty($top_selling_products)) {
        foreach ($top_selling_products as $product) { ?>
													<tr>
													    	<td class="text-[13px] font-normal py-2.5 px-5 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color text-right"><?= $serial++; ?></td>
											
														<td class="text-[13px] font-normal py-2.5 pl-4 pr-0 address-wrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color">
														
																	<h6><a href="javascript:void(0)" class="text-dark"><?= $product['product_name']; ?></a></h6>
																
																</div>	
															</div>
														</td>	
														<td class="text-[13px] font-normal py-2.5 px-5 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color text-right">₹ <?= $product['unit_rate']; ?></td>
													</tr>
												  <?php }
                        } else { ?>
                            <tr>
                                <td colspan="3" class="text-center py-4 text-body-color">
                                    No top-selling products found.
                                </td>
                            </tr>
                        <?php } ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="xl:w-2/3">
								<div class="card">
									<div class="card-header flex justify-between sm:pt-6 pb-4 py-5 sm:px-5 px-4 items-center relative flex-wrap">
										<h4 class="text-base">Expired Products</h4>
									</div>
									<div class="card-body p-0">
										<div class="overflow-x-auto active-projects">
											<table id="projects-tbl2" class="table mb-4 w-full">
												<thead>
													<tr>
													    	<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-left">S.No</th>	
													<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-left">STOCK PLACE NAME</th>
														<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-left">PRDUCTS NAME</th>
														<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-left">EXPIRED DATE</th>
													
														<th class="bg-primary-light text-[13px] py-2.5 px-5 text-primary capitalize font-medium whitespace-nowrap text-right">AVAILABLE QUANTITY</th>
														
													</tr>
												</thead>
											<tbody>
											    
    <?php  $serial = 1;
    if (!empty($expired_products)) {
        foreach ($expired_products as $product) { ?>
            <tr>
                <!--<td class="text-[13px] font-normal py-2.5 pl-4 pr-0 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color">-->
                <!--    <div class="flex items-center">-->
                <!--        <div>-->
                <!--            <h6><a href="javascript:void(0)" class="text-dark"><?= $product['product_name']; ?></a></h6>-->
                <!--            <span class="text-xs text-body-color dark:text-white">₹ <?= $product['selling_price']; ?></span>	-->
                <!--        </div>	-->
                <!--    </div>-->
                <!--</td>-->
                 <td class="text-[13px] font-normal py-2.5 px-5 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color"><?= $serial++; ?></td>
                <td class="text-[13px] font-normal py-2.5 px-5 address-wrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color"><?= $product['stock_place_name']; ?></td>
                <td class="text-[13px] font-normal py-2.5 px-5 address-wrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color"><?= $product['product_name']; ?></td>
                <td class="text-[13px] font-normal py-2.5 px-5 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color"><?= date('d-m-y', strtotime($product['exp_date'])) ?></td>
                <td class="text-[13px] font-normal py-2.5 px-5 whitespace-nowrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] text-body-color text-right"><?= $product['availabile_quantity']; ?></td>
            </tr>
    <?php }
    } else { ?>
        <tr>
            <td colspan="4" class="text-center py-4 text-body-color">
                No expired products found.
            </td>
        </tr>
    <?php } ?>
</tbody>

											</table>
										</div>
									</div>
								</div>
							</div>
				</div>
			</div>
        </div>
        	</div>
											</div>
										</div>
									</div>
         <!-- Content body end -->
		 
         <!-- Content body end -->

<?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>
</body>
</html>
