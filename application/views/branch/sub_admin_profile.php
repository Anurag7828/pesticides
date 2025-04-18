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
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="w-full">
                        <div class="profile card card-body p-4 pb-0">
                            <div class="profile-head">
                               
                                <div class="sm:flex block sm:py-[0.9375rem] sm:px-5 max-sm:pb-5">
                                <div class="profile-photo sm:w-[6.65rem] w-[5rem] relative sm:mr-2.5 max-sm:mb-[1.25rem] max-sm:mx-auto ">
										<img src="<?= base_url() ?>uploads/users/<?= $u['0']['image'] ?>" class="max-w-full h-auto" alt="">
									</div>
									<div class="sm:flex block w-full max-sm:text-center">
										<div class="profile-name px-4 pt-2">
											<h4 class="text-primary text-lg"><?= $u['0']['name']?></h4>
											<p class="mb-4"><?= $u['0']['shop']?></p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-[#464a53] text-lg"><?= $u['0']['email']?></h4>
											<p class="mb-4">Email</p>
										</div>
										
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
               
                    <div class="xl:w-6/3 w-full">
                        <div class="card flex flex-col h-auto">
                            <div class="card-body sm:p-5 p-4">
                                <div class="profile-tab">
                                    <div class="dz-tab-area">
                                        <ul class="nav nav-tabs flex flex-wrap border-b border-b-color">    
                                            <li class="nav-item"><a href="#about-me" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn active show" data-tab="tab-two">About Me</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn" data-tab="tab-three">Update Profile</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content-area">    
                                            <div id="tab-two" class="tab-content active show">
                                                
                                               
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary text-lg mb-6">Personal Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Branch Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['name']?></span>
                                                        </div>
                                                    </div>
                                                    <!--<div class="row mb-2">-->
                                                    <!--    <div class="sm:w-1/4 w-5/12">-->
                                                    <!--        <h5 class="font-medium mb-2"> Shop Name <span class="pull-end">:</span>-->
                                                    <!--        </h5>-->
                                                    <!--    </div>-->
                                                    <!--    <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['shop']?></span>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <!--<div class="row mb-2">-->
                                                    <!--    <div class="sm:w-1/4 w-5/12">-->
                                                    <!--        <h5 class="font-medium mb-2">Email <span class="pull-end">:</span>-->
                                                    <!--        </h5>-->
                                                    <!--    </div>-->
                                                    <!--    <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['email']?></span>-->
                                                    <!--    </div>-->
                                                    <!--</div>-->
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Contact No. <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['contact']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Username <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['username']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Password <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['password']?></span>
                                                        </div>
                                                    </div>
                                                       <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Maneger Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['m_name']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Maneger Contact No. <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['m_contact']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['address']?> <?= $user['0']['city']?> <?= $user['0']['state']?> <?= $user['0']['pincode']?></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div id="tab-three" class="tab-content">
                                                <div class="pt-4">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary text-lg mb-2">Update profile</h4>
                                                        <form  action="../update_sub_admin/<?= encryptId($user['0']['id']); ?>" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Name</label>
                                                                    <input type="text" placeholder="Name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" name="name" value="<?= $user['0']['name']?>">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Contact</label>
                                                                    <input type="text" placeholder="Contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['contact']?>" name="contact">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <!--<div class="mb-4 md:w-1/2 w-full">-->
                                                                <!--    <label class="form-label text-dark">Email</label>-->
                                                                <!--    <input type="email" placeholder="Email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['email']?>" name="email">-->
                                                                <!--</div>-->
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Username</label>
                                                                    <input type="text" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['username']?>" name="username">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Password</label>
                                                                    <input type="text" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['password']?>" name="password">
                                                                </div>
                                                            
                                                            <!--<div class="mb-4 md:w-1/2 w-full">-->
                                                            <!--    <label class="form-label text-dark">Shop Name</label>-->
                                                            <!--    <input type="text" placeholder="1234 Main St" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['shop']?>" name="shop">-->
                                                            <!--</div>-->
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label text-dark">Address</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['address']?>" name="address">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">PinCode</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['pincode']?>" name="pincode">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">City</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['city']?>" name="city">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">State</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['state']?>" name="state">
                                                                </div>
                                                                   <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">Maneger Name</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['m_name']?>" name="m_name">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">Maneger Contact No.</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['m_contact']?>" name="m_contact">
                                                                </div>
                                                                <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Profile photo</label>
                                            <input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['image'] ?>">
                                            <?php if ($tag == 'sub_admin') { ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $user['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" width="100px"  alt="">



                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $user['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" width="100px"  alt="">





                                            <?php } ?>
                                            
                                        </div>
                                                            </div>
                                                            <button class="btn py-[0.719rem] max-xl:py-2.5 text-[15px] max-xl:text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block duration-500 hover:bg-primary mb-1 px-[1.563rem] max-xl:px-4 btn-primary" type="submit">submit
                                                                </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<!-- Modal -->
									<div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close" id="replyModal">
										<div class="modal-dialog modal-dialog-centered" role="document">
											<div class="modal-content mx-2.5 flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
												<div class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
													<h5 class="modal-title">Post Reply</h5>
													<button type="button" class="btn-close p-4 text-xs"></button>
												</div>
												<div class="modal-body relative p-[1.875rem]">
													<form>
														<textarea class="form-control relative text-[13px] border border-b-color block rounded-md p-3 duration-500  outline-none w-full h-auto resize-y text-body-color" rows="4">Message</textarea>
													</form>
												</div>
												<div class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap">
													<button type="button" class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-[13px] font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:text-white mb-1 mr-1 close-btn">Close</button>
													<button type="button" class="btn btn-primary py-[0.719rem] max-xl:px-4 px-[1.563rem] max-xl:py-2.5 text-[15px] max-xl:text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary mb-1 mr-1 save-btn">Reply</button>
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

<?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>
</body>
</html>
