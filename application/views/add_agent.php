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
            <!-- row -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">

                    <div class="xl:w-6/4 lg:w-4/3">
                        <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                            <div
                                class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                <?php if($tag=="edit"){?>
                                    <h6 class="text-[15px] font-medium text-body-color title relative">Edit Agent</h6>

                                <?php } else { ?>
                                
                                <h6 class="text-[15px] font-medium text-body-color title relative">Add Agent</h6>
                                <?php } ?>
                            </div>
                            <form class="profile-form" action="" method="post" enctype="multipart/form-data">
                                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                    <div class="row">
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Name</label>
                                            <input type="text" name="name" placeholder="Name" 
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?=($tag == 'edit' && isset($agent[0]['name'])) ? htmlspecialchars($agent[0]['name']) : ''?>" required>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
                                            <input type="text" name="contact" placeholder="Contact" 
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?=($tag == 'edit' && isset($agent[0]['contact'])) ? htmlspecialchars($agent[0]['contact']) : ''?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Email</label>
                                            <input type="email" name="email" placeholder="Email" 
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?=($tag == 'edit' && isset($agent[0]['email'])) ? htmlspecialchars($agent[0]['email']) : ''?>">
                                        </div>

                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2"
                                                name="gender">Gender</label>
                                            <select
                                                class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]"
                                                id="validationCustom05" name="gender">
                                                <option data-display="Please select">Select Gender</option>
<option value="Male" <?=($tag == 'edit' && isset($agent[0]['gender']) && $agent[0]['gender'] == "Male") ? 'selected' : ''?>>Male</option>
<option value="female" <?=($tag == 'edit' && isset($agent[0]['gender']) && $agent[0]['gender'] == "female") ? 'selected' : ''?>>Female</option>
<option value="other" <?=($tag == 'edit' && isset($agent[0]['gender']) && $agent[0]['gender'] == "other") ? 'selected' : ''?>>Other</option>

                                            </select>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Pin Code</label>
                                            <input type="text" name="pincode"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="Pin Code" value="<?=($tag == 'edit' && isset($agent[0]['pincode'])) ? htmlspecialchars($agent[0]['pincode']) : ''?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Address</label>
                                            <input type="text" name="address"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="address" value="<?=($tag == 'edit' && isset($agent[0]['address'])) ? htmlspecialchars($agent[0]['address']) : ''?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">City</label>
                                            <input type="text" name="city"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="city" value="<?=($tag == 'edit' && isset($agent[0]['city'])) ? htmlspecialchars($agent[0]['city']) : ''?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">State</label>
                                            <input type="text" name="state"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="state" value="<?=($tag == 'edit' && isset($agent[0]['state'])) ? htmlspecialchars($agent[0]['state']) : ''?>">
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2"
                                                name="country">Country</label>
                                            <select
                                                class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]"
                                                name="country" id="validationCustom01">
                                                <option data-display="Please select">Please select</option>
<option value="russia" <?=($tag == 'edit' && isset($agent[0]['country']) && $agent[0]['country'] == "russia") ? 'selected' : ''?>>Russia</option>
<option value="canada" <?=($tag == 'edit' && isset($agent[0]['country']) && $agent[0]['country'] == "canada") ? 'selected' : ''?>>Canada</option>
<option value="china" <?=($tag == 'edit' && isset($agent[0]['country']) && $agent[0]['country'] == "china") ? 'selected' : ''?>>China</option>
<option value="india" <?=($tag == 'edit' && isset($agent[0]['country']) && $agent[0]['country'] == "india") ? 'selected' : ''?>>India</option>

                                            </select>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Agent Area</label>
                                            <input type="text" name="area"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="area" value="<?=($tag == 'edit' && isset($agent[0]['area'])) ? htmlspecialchars($agent[0]['area']) : ''?>" required>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Commission Rupees</label>
                                            <input type="text" name="commission"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="Commission" value="<?=($tag == 'edit' && isset($agent[0]['commission'])) ? htmlspecialchars($agent[0]['commission']) : ''?>" required>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Profile photo</label>
											<input type="file" name="image" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?=($tag == 'edit' && isset($agent[0]['image'])) ? htmlspecialchars($agent[0]['image']) : ''?>">
                                          
                                                        <?php if ($tag == 'edit') { ?>
                                                          
                                                            <img src="<?= base_url() ?>uploads/users/<?= $agent['0']['image'] ?>" style="height:50px">
                                                        <?php    }  ?>
										</div>
                                        <?php if($tag=="edit"){?>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2" name="status">
                                                Status</label>
                                            <select
                                                class="nice-select style-1 py-3 px-5 bg-transparent text-[13px] font-normal outline-none relative  duration-500 border border-b-color text-[#a5a5a5] h-[2.813rem] leading-[1.213rem]"
                                                id="validationCustom01" name="status">
                                                <option data-display="Please select">Please select</option>
<option value="0" <?= ($tag == 'edit' && isset($agent[0]['status']) && $agent[0]['status'] == "0") ? 'selected' : '' ?>>Active</option>
<option value="1" <?= ($tag == 'edit' && isset($agent[0]['status']) && $agent[0]['status'] == "1") ? 'selected' : '' ?>>Deactive</option>


                                            </select>
                                        </div>
                                        <?php }  ?>

                                        <!-- <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Username</label>
                                            <input type="text" name="username" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="username">
                                        </div>
                                         <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Password</label>
                                            <input type="text" name="password" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="password">
                                        </div> -->
                                    </div>
                                </div>
                                <div
                                    class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                    <?php if($tag=="edit"){?>
                                    <button
                                        class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Edit
                                        Agent</button>
                                        <?php } else { ?>
                                            <button
                                        class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
                                        Agent</button>
                                            <?php } ?>
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