<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

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
            <!-- row -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">

                    <div class="xl:w-6/4 lg:w-3/3">
                        <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                            <div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                <h6 class="text-[15px] font-medium text-body-color title relative">Update Users Account</h6>
                            </div>
                            <form class="profile-form" action="" method="post" enctype="multipart/form-data">
                                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                    <div class="row">
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Name</label>
                                            <input type="text" name="name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['name'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
                                            <input type="text" name="contact" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['contact'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
                                            <input type="email" name="email" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['email'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Shop Name</label>
                                            <input type="text" name="shop" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['shop'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2" >Agent</label>
											<select class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]" id="validationCustom05" name="agent_id">
												<option  data-display="Please select">Select Agent</option>
                                                <?php foreach ($agent as $Agent_info) { ?>
    <option value="<?= $Agent_info['id'] ?>" <?= ($Agent_info['id'] == $users[0]['agent_id']) ? 'selected' : '' ?>>
        <?= $Agent_info['name'] ?>
    </option>
<?php } ?>
											</select>
										</div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Pin Code</label>
                                            <input type="text" name="pincode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Pin Code" value="<?= $users['0']['pincode'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
                                            <input type="text" name="address" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="address" value="<?= $users['0']['address'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">City</label>
                                            <input type="text" name="city" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="city" value="<?= $users['0']['city'] ?>">
                                        </div>
                                         <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">District</label>
                                            <input type="text" name="district" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="district" value="<?= $users['0']['district'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">State</label>
                                            <input type="text" name="state" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state" value="<?= $users['0']['state'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2" name="country">Country</label>
                                            <select class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]" name="country" id="validationCustom01">
                                                <option data-display="Please select">Please select</option>
                                                <option value='russia'<?=  (( $users['0']['country'] == 'russia') ? 'selected' : '') ?>>Russia</option>
                                                <option value='canada'<?=  (( $users['0']['country'] == 'canada') ? 'selected' : '') ?>>Canada</option>
                                                <option value='china'<?=  (( $users['0']['country'] == 'china') ? 'selected' : '') ?>>China</option>
                                                <option value='india'<?=  (( $users['0']['country'] == 'india') ? 'selected' : '') ?>>India</option>
                                            </select>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2" name="status">Add Status</label>
                                            <select class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]" id="validationCustom01" name="status">
                                                <option data-display="Please select">Please select</option>
                                                <option value='1'<?=  (( $users['0']['status'] == 1) ? 'selected' : '') ?>>Active</option>
                                                <option value='0'<?=  (( $users['0']['status'] == 0) ? 'selected' : '') ?>>Inactive</option>

                                            </select>
                                        </div>
                                        <!-- <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Profile photo</label>
                                            <input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="state">
                                            <?php if ($tag == 'user') { ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $users['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $users['0']['image'] ?>" width="100px"  alt="">



                                            <?php

                                            } else {

                                            ?>

                                                <input type="hidden" name="image"
                                                    value="<?= $users['0']['image'] ?>">

                                                    <img src="<?= base_url() ?>uploads/users/<?= $users['0']['image'] ?>" width="100px"  alt="">





                                            <?php } ?>
                                            
                                        </div> -->
                                         <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Username</label>
                                            <input type="email" name="username" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['username'] ?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Password</label>
                                            <input type="text" name="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $users['0']['password'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                    <button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update User</button>
                                </div>

                            </form>
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