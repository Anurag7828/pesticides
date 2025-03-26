<!DOCTYPE html>
<html lang="en">

<head>	
    
   <?php include "includes/header-links.php" ?>
	
</head>
<body class="selection:text-white selection:bg-primary">

<!-- Main wrapper start -->
<div id="main-wrapper" class="relative">
<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>
	<!-- Content body start -->
    <div class="content-body">
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="w-full">
                        <div class="profile card card-body p-4 pb-0">
                            <div class="profile-head">
                                <div class="photo-content relative">
                                    <div class="cover-photo rounded"></div>
                                </div>
                                <div class="sm:flex block sm:py-[0.9375rem] sm:px-5 max-sm:pb-5">
									<div class="profile-photo sm:w-[6.65rem] w-[5rem] relative sm:mr-2.5 max-sm:mb-[1.25rem] max-sm:mx-auto mt-[-4.5rem] z-[1]">
										<img src="<?= base_url() ?>uploads/admin/<?= $admin['0']['image'] ?>" class="max-w-full h-auto rounded-full" alt="">
									</div>
									<div class="sm:flex block w-full max-sm:text-center">
										<div class="profile-name px-4 pt-2">
											<h4 class="text-primary text-lg"><?= $admin['0']['name']?></h4>
											<p class="mb-4"><?= $admin['0']['company_name']?></p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-[#464a53] text-lg"><?= $admin['0']['email']?></h4>
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
                                                            <h5 class="font-medium mb-2">Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['name']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2"> Company Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['company_name']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Email <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['email']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Contact No. <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['contact']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Username <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['username']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Password <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['password']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $admin['0']['address']?> <?= $admin['0']['city']?> <?= $admin['0']['state']?> <?= $admin['0']['pincode']?></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                            <div id="tab-three" class="tab-content">
                                                <div class="pt-4">
                                                    <div class="settings-form">
                                                        <h4 class="text-primary text-lg mb-2">Update profile</h4>
                                                        <form  action="Home/update_profile/<?= $admin['0']['admin_id']; ?>" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Name</label>
                                                                    <input type="text" placeholder="Name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" name="name" value="<?= $admin['0']['name']?>">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Contact</label>
                                                                    <input type="text" placeholder="Contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['contact']?>" name="contact">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['email']?>" name="email">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Username</label>
                                                                    <input type="email" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['username']?>" name="username">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Password</label>
                                                                    <input type="text" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['password']?>" name="password">
                                                                </div>
                                                            
                                                            <div class="mb-4 md:w-1/2 w-full">
                                                                <label class="form-label text-dark">Company Name</label>
                                                                <input type="text" placeholder="1234 Main St" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['company_name']?>" name="company_name">
                                                            </div>
                                                            </div>
                                                            <div class="mb-4">
                                                                <label class="form-label text-dark">Address</label>
                                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['address']?>" name="address">
                                                            </div>
                                                            <div class="row">
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">PinCode</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['pincode']?>" name="pincode">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">City</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['city']?>" name="city">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">State</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $admin['0']['state']?>" name="state">
                                                                </div>
                                                                <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Profile photo</label>
                                            <input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state">
                                            <?php if ($tag == 'admin') { ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $admin['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/admin/<?= $admin['0']['image'] ?>" width="100px"  alt="">



                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $admin['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/admin/<?= $admin['0']['image'] ?>" width="100px"  alt="">





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
<?php include "includes/footer-links.php" ?>
</div>
<?php include "includes/footer.php" ?>
</body>
</html>
