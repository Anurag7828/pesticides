<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->
<head>	
   
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>

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
										<img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" class="max-w-full h-auto" alt="">
									</div>
									<div class="sm:flex block w-full max-sm:text-center">
										<div class="profile-name px-4 pt-2">
											<h4 class="text-primary text-lg"><?= $user['0']['name']?></h4>
											<p class="mb-4"><?= $user['0']['shop']?></p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-[#464a53] text-lg"><?= $user['0']['email']?></h4>
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
                                            <li class="nav-item"><a href="#about-me" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn active show" data-tab="tab-two">Personal Info</a>
                                            </li>
                                            <li class="nav-item"><a href="#about" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn" data-tab="tab-one">General Info</a>
                                            </li>
                                            <li class="nav-item"><a href="#profile-settings" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn" data-tab="tab-three">Update Profile</a>
                                            </li>
                                            <li class="nav-item"><a href="#sales-invoice" class="nav-link px-4 py-2 sm:mr-[1.875rem] mr-0 block text-[#828690] sm:text-base text-sm font-medium border-b-[0.0125rem] duration-500 hover:text-primary border-transparent tab-btn" data-tab="tab-four"> Invoice Formate</a>
                                            </li>

                                        </ul>
                                        <div class="tab-content-area">    
                                            <div id="tab-two" class="tab-content active show">
                                                
                                               
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary text-lg mb-6">Personal Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2"> Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['name']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2"> Shop Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['shop']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Email <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['email']?></span>
                                                        </div>
                                                    </div>
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
                                                            <h5 class="font-medium mb-2">Location <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['address']?> <?= $user['0']['city']?> ,<?= $user['0']['district']?> ,<?= $user['0']['state']?> <?= $user['0']['pincode']?></span>
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                             
                                            </div>
                                            <div id="tab-one" class="tab-content">
                                                
                                               
                                              
                                                <div class="profile-personal-info">
                                                    <h4 class="text-primary text-lg mb-6">General Information</h4>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Sales Prefix <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['prefix']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2"> Purchase Prefix<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['purchase_code']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Return Prefix <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['returne_code']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">GST Number <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['gst_no']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">GST Percentage <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['tax']?></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">LIC NO<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['lic_no']?></span>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">CIN NO<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><span class="text-body-color sm:text-sm text-xs"><?= $user['0']['cin_no']?></span>
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
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Email</label>
                                                                    <input type="email" placeholder="Email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['email']?>" name="email">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Username</label>
                                                                    <input type="text" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['username']?>" name="username">
                                                                </div>
                                                                <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">Password</label>
                                                                    <input type="text" placeholder="Password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['password']?>" name="password">
                                                                </div>
                                                            
                                                            <div class="mb-4 md:w-1/2 w-full">
                                                                <label class="form-label text-dark">Shop Name</label>
                                                                <input type="text" placeholder="1234 Main St" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['shop']?>" name="shop">
                                                            </div>
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
                                                                    <label class="form-label text-dark">District</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['district']?>" name="district">
                                                                </div>
                                                                <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">State</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['state']?>" name="state">
                                                                </div>
                                                                    <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">Invoice Prefix</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['prefix']?>" name="prefix">
                                                                </div>   
                                                                                                                                    <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">Purchase Code Prefix</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['purchase_code']?>" name="purchase_code">
                                                                </div>    
                                                                                                                                    <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">Returne_code Prefix</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['returne_code']?>" name="returne_code">
                                                                </div>    <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">GST No</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['gst_no']?>" name="gst_no">
                                                                </div>
                                                                  <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">GST Tax Percentage</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['tax']?>" name="tax">
                                                                </div>
                                                                 <div class="mb-4 md:w-1/6 w-full">
                                                                    <label class="form-label text-dark">LIC No</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['lic_no']?>" name="lic_no">
                                                                </div>
                                                                  <div class="mb-4 md:w-1/2 w-full">
                                                                    <label class="form-label text-dark">CIN No</label>
                                                                    <input type="text" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['cin_no']?>" name="cin_no">
                                                                </div>
                                                                <div class="sm:w-1/6 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Profile photo</label>
                                            <input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['image'] ?>">
                                            <?php if ($tag == 'sub_admin') { ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $user['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" width="100px"  alt="" style="height:100px">
 


                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $user['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" width="100px"  alt="" style="height:100px">
 




                                            <?php } ?>
                                            
                                        </div>
                                           <div class="sm:w-1/6 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Sign photo</label>
                                            <input type="file" name="signimage" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['signimage'] ?>">
                                            <?php if ($tag == 'sub_admin') { ?>

                                                <input type="hidden" name="signimage"
                                                    value="<?= $user['0']['signimage'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['signimage'] ?>" width="100px"  alt="" style="height:100px">
  <a href="../deletessimage/<?= encryptId($user[0]['id']) ?>?image=<?= $user['0']['signimage'] ?>&tagimage=sign"><i class="fas fa-trash-alt"></i></a>


                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="signimage"
                                                    value="<?= $user['0']['signimage'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['signimage'] ?>" width="100px"  alt="" style="height:100px">
  <a href="../deletessimage/<?= encryptId($user[0]['id']) ?>?image=<?= $user['0']['signimage'] ?>&tagimage=sign"><i class="fas fa-trash-alt"></i></a>




                                            <?php } ?>
                                            
                                        </div>
                                           <div class="sm:w-1/6 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Seal photo</label>
                                            <input type="file" name="sealimage" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['sealimage'] ?>">
                                            <?php if ($tag == 'sub_admin') { ?>

                                                <input type="hidden" name="sealimage"
                                                    value="<?= $user['0']['sealimage'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['sealimage'] ?>" width="100px"  alt="" style="height:100px">
  <a href="../deletessimage/<?= encryptId($user[0]['id']) ?>?image=<?= $user['0']['sealimage'] ?>&tagimage=seal"><i class="fas fa-trash-alt"></i></a>


                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="sealimage"
                                                    value="<?= $user['0']['sealimage'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['sealimage'] ?>" width="100px"  alt="" style="height:100px">
  <a href="../deletessimage/<?= encryptId($user[0]['id']) ?>?image=<?= $user['0']['sealimage'] ?>&tagimage=seal"><i class="fas fa-trash-alt"></i></a>




                                            <?php } ?>
                                            
                                        </div>
                                

<div class="mb-4 md:w-1 w-full">
    <label class="form-label text-dark">Term And Condition</label>
    <textarea name="term" id="termEditor" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
        <?= $user['0']['term'] ?>
    </textarea>
</div>


                                                            </div>
                                                            <button class="btn py-[0.719rem] max-xl:py-2.5 text-[15px] max-xl:text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block duration-500 hover:bg-primary mb-1 px-[1.563rem] max-xl:px-4 btn-primary" type="submit">submit
                                                                </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="tab-four" class="tab-content">
                                                
                                               
                                              
                                                <div class="profile-personal-info">
                                                <form  action="../update_sales_invoice/<?= encryptId($user['0']['id']); ?>" method="post" enctype="multipart/form-data">
                                                    <div class="row mt-20 ">
                                                    <h4 class="text-primary text-lg mb-6">Customize your sales & return sales invoice according to your  requirement</h4>
                                                    <div class="sm:w-1/2 w-5/12">
                                                    <h4 class="text-primary text-lg mb-6">Shop Info</h4>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Shop Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"> 
                                                        <input type="hidden" name="s_name" value="0">
                                                         <input type="checkbox" class="form-check-input"  name="s_name" value="1" <?= ($sales['0']['s_name'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Contact No.<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_contact_no" value="0"><input type="checkbox" class="form-check-input"  name="s_contact_no" value="1" <?= ($sales['0']['s_contact_no'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Address<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_address" value="0"><input type="checkbox" class="form-check-input"  name="s_address" value="1" <?= ($sales['0']['s_address'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Email Id <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_email" value="0"><input type="checkbox" class="form-check-input"  name="s_email" value="1" <?= ($sales['0']['s_email'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">GST No <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_gst" value="0"><input type="checkbox" class="form-check-input"  name="s_gst" value="1" <?= ($sales['0']['s_gst'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">LIC No<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_lic" value="0"><input type="checkbox" class="form-check-input"  name="s_lic" value="1" <?= ($sales['0']['s_lic'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">CIN No<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_cin" value="0"><input type="checkbox" class="form-check-input"  name="s_cin" value="1" <?= ($sales['0']['s_cin'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Logo<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="s_logo" value="0"><input type="checkbox" class="form-check-input"  name="s_logo" value="1" <?= ($sales['0']['s_logo'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Send Invoice Link in Wathapp<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="whatsapp" value="0"><input type="checkbox" class="form-check-input"  name="whatsapp" value="1" <?= ($sales['0']['whatsapp'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="sm:w-1/2 w-5/12">
                                                        <h4 class="text-primary text-lg mb-6">Iteam Info</h4>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Item Name <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">  
                                                        <input type="hidden" name="i_name" value="0"><input type="checkbox" class="form-check-input"  name="i_name" value="1" <?= ($sales['0']['i_name'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Unit(single/Box)<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="i_unit" value="0"><input name="i_unit" type="checkbox" class="form-check-input"  value="1" <?= ($sales['0']['i_unit'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">HSN Code<span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="i_hsn" value="0"><input type="checkbox" class="form-check-input"  name="i_hsn" value="1" <?= ($sales['0']['i_hsn'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Packing Quantity <span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="i_packing_quantity" value="0"><input type="checkbox" class="form-check-input" name="i_packing_quantity" value="1" <?= ($sales['0']['i_packing_quantity'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Paid Amount <span class="pull-end">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="paid" value="0"><input type="checkbox" class="form-check-input"  name="paid"  value="1" <?= ($sales['0']['paid'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Due Amount<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><input type="hidden" name="due" value="0"><input type="checkbox" class="form-check-input"  name="due"  value="1" <?= ($sales['0']['due'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                     <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Term And Condition<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12">
                                                        <input type="hidden" name="term_condition" value="0"><input type="checkbox" class="form-check-input"  name="term_condition"  value="1" <?= ($sales['0']['term_condition'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Sign<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><input type="hidden" name="sign" value="0"><input type="checkbox" class="form-check-input"  name="sign"  value="1" <?= ($sales['0']['sign'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="sm:w-1/4 w-5/12">
                                                            <h5 class="font-medium mb-2">Seal<span class="pull-end">:</span></h5>
                                                        </div>
                                                        <div class="sm:w-9/12 w-7/12"><input type="hidden" name="seal" value="0"><input type="checkbox" class="form-check-input"  name="seal" value="1" <?= ($sales['0']['seal'] == '1') ? 'checked' : '' ?>>
                                                        </div>
                                                    </div>
                                                    </div>
                                                   
                                                    </div>
                                                    <button class="btn py-[0.719rem] max-xl:py-2.5 text-[15px] max-xl:text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block duration-500 hover:bg-primary mb-1 px-[1.563rem] max-xl:px-4 btn-primary" type="submit">Update
                                                    </button>
                                                    </form>
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
<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('termEditor');
</script>
<?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>
</body>
</html>
