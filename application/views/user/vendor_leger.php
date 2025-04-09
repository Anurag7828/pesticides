<!DOCTYPE html>
<html lang="en">

<head>
  
    <?php include "includes2/header-links.php" ?>
    <style>
    /* The Modal (background) */
    .custom-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0, 0, 0);
        background-color: rgba(0, 0, 0, 0.4);
        padding-top: 60px;
    }

    /* Modal Content */
    .custom-modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 680px;
        border-radius: 10px;
    }

    /* Close Button */
    .custom-modal-close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .custom-modal-close:hover,
    .custom-modal-close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
    .address-wrap {
    word-break: break-word; 
    overflow-wrap: break-word;
    /*white-space: pre-wrap;*/
}
</style>
</head>

<body class="selection:text-white selection:bg-primary">
    <!-- Main wrapper start -->
    <div id="main-wrapper" class="relative">
        <?php include "includes2/header.php" ?>
        <?php include "includes2/sidebar.php" ?>
        <!-- Content body start -->
        <div class="content-body">
            <div class="container-fluid">
                <!-- Row -->
                <div class="row">
                    <div class="w-full">
                        <div class="filter cm-content-box box-primary relative rounded mb-4 bg-white dark:bg-[#182237]">
                            <div
                                class="content-title flex justify-between items-center py-4 sm:px-6 px-[1.2rem] card-toggle-btn">
                                <div class="cpa text-dark dark:text-white text-base font-semibold">
                                    <i class="fa-sharp fa-solid fa-filter mr-2"></i>Filter
                                </div>
                                <div class="tools">
                                    <a href="javascript:void(0);" class="expand SlideToolHeader inline-block"><i
                                            class="fal fa-angle-down font-['Font_Awesome_6_Free'] font-semibold text-[#c2c2c2] text-xl arrow"></i></a>
                                </div>
                            </div>
                            <div class="content form excerpt border-t border-b-color dark:border-[#ffffff1a]">
                                <form class="profile-form"
                                    action="<?= base_url('admin_Dashboard/vendor_leger/' . encryptId($user['0']['id'])) ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-5 p-4">
                                        <div class="row">
                                      
										<div class="sm:w-1/2 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select vender</label>
											<select name="vender_name" id="vender-name"class="  choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select vender</option>
												<?php foreach ($vender_list as $vender_info) { ?>
													<option value="<?= $vender_info['id']; ?>" <?= ($vender_info['vender_name'] == $vender['0']['vender_name']) ? 'selected' : ''; ?>>
														<?= $vender_info['vender_name']; ?>-<?= $vender_info['mobile']; ?>
													</option>
												<?php } ?>
												
											</select>
										
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">

										</div>
                                           

                                            <div class="xl:w-1/4 sm:w-1/2 w-full " style="margin-top: 28px;">
                                                <button
                                                    class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-white bg-primary leading-5 inline-block border border-primary btn-primary light hover:bg-primary btn-primary"
                                                    title="Click here to Search" type="submit"><i
                                                        class="fa-sharp fa-solid fa-filter mr-1"></i>Filter</button>
                                                <a
                                                    href="<?= base_url('Admin_Dashboard/purchase/' . encryptId($user['0']['id'])) ?>"><button
                                                        class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger btn-danger light"
                                                        title="Click here to remove filter" type="button">Remove
                                                        Filter</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        </div>
                
                        <div class="xl:w-1/2 col-xxl-12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Purchase Report</h4>
                              
							
                            <div class="flex justify-right items-right mb-5">
                     
                        <a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
  PDF
</a>
                    </div>
                    </div>
                    <div class="w-full active-p">
                    <div class="tab-content-area">
                        <div class="tab-content show active" id="pills-colm">
                            <div class="card">
                                <div class="sm:py-5 py-4">
                                    <div class="overflow-x-auto active-projects user-tbl ItemsCheckboxSec dt-filter">
                                        <table id="user-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 pl-4 pr-0 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap style-1">
                                                        s No.
                                                    </th>
                                                    <th
                                                        class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">
                                                        Date</th>
                                                   
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Purchase <br>code</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Total Product</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Total<br>Quantity</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Sub<br>Total</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Discount</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Total <br>Price</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Paid</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Due</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Status</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Add By</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i = 0;
                                                $totalAmount = 0; 
                                                $totalPaid = 0; 
                                                $totalDue = 0;
                                                if (!empty($product)): ?>
                                                    <?php
                                                    // Create an array to store payment details indexed by purchase_code
                                                    $payment_details = [];

                                                    // Loop through the purchase_payment table to fill the payment_details array
                                                    foreach ($purchase_payment as $payment_info) {
                                                       
                                                        $purchase_code = $payment_info['purchase_code'];
                                                        $payment_details[$purchase_code] = [
                                                            'paid' => $payment_info['paid'],
                                                            'due' => $payment_info['due'],
                                                        ];
                                                    }

                                                    // Initialize an array to store the product count for each vendor and purchase code
                                                    $product_counts = [];

                                                    // Loop through products to calculate the count for each vendor + purchase_code combination
                                                    foreach ($product as $product_info) {
                                                       
                                                        $key = $product_info['vender_name'] . '_' . $product_info['purchase_code'];
                                                        if (!isset($product_counts[$key])) {
                                                            $product_counts[$key] = 0;
                                                        }
                                                        $product_counts[$key]++;
                                                    }

                                                    // Track already displayed purchase_code values
                                                    $displayed_purchase_codes = [];

                                                    // Now display the data
                                                    foreach ($product as $product_info):
                                                      
                                                        // Check if the purchase_code has already been displayed
                                                        if (in_array($product_info['purchase_code'], $displayed_purchase_codes)) {
                                                            
                                                            continue; // Skip this iteration if purchase_code has already been displayed
                                                        }
                                                        $i++;
                                                        // Fetch the vendor name based on the vender_id
                                                        $vender_name = '';
                                                        foreach ($vender as $vender_info) {
                                                            if ($vender_info['id'] == $product_info['vender_name']) {
                                                                $vender_name = $vender_info['vender_name'];
                                                                break;
                                                            }
                                                        }

                                                        // Get the count of products with the same vendor and purchase_code
                                                        $key = $product_info['vender_name'] . '_' . $product_info['purchase_code'];
                                                        $total_products = $product_counts[$key];

                                                        // // Get the pay and due values from the payment_details array
                                                        // $pay_value = isset($payment_details[$product_info['purchase_code']]) ? $payment_details[$product_info['purchase_code']]['paid'] : 0;
                                                        // $due_value = isset($payment_details[$product_info['purchase_code']]) ? $payment_details[$product_info['purchase_code']]['due'] : 0;
                                                
                                                        // Mark this purchase_code as displayed
                                                        $displayed_purchase_codes[] = $product_info['purchase_code'];
                                                        $totalAmount += $product_info['grand_total'];
                                                        $payment = $this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user[0]['id'], 'id', 'DESC', '1');
                                                        $paymentsum = $this->CommonModal->getRowByIdSum('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user[0]['id'], 'paid');
                                                        $totalPaid += $paymentsum[0]['total_sum'];
                                                        $totalDue += $payment[0]['due'];
                                                        ?>
                                                        <tr>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 pr-0 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $i ?>
                                                            </td>
                                                            
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= date('d-m-Y', strtotime($product_info['date'])) ?></td>
                                                            
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $user['0']['purchase_code']?>-<?= $product_info['purchase_code'] ?>
                                                            </td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $total_products ?> </td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $product_info['total_quantity'] ?><br>
                                                                <?php if ($product_info['status']) {
                                                                    $this->db->select_sum('return_quantity');
                                                                    $this->db->where('purchase_code', $product_info['purchase_code']);
                                                                    $query = $this->db->get('purchase_product'); // Replace 'purchase_product' with the correct table name
                                                        
                                                                    $total_return_quantity = ($query->num_rows() > 0) ? $query->row()->return_quantity : 0;
                                                                    ?>
                                                                    <a
                                                                        href="<?= base_url('admin_Dashboard/return/' . encryptId($user['0']['id'])) ?>">
                                                                        <span
                                                                            class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">
                                                                            <?= $total_return_quantity ?> Return Product
                                                                        </span>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <?= "" ?>
                                                                <?php } ?>
                                                            </td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                ₹ <?= $product_info['sub_total'] ?></td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
    <?php
    if ($product_info['discount_type'] == 'rupee') {
        echo '₹ ' . $product_info['discount_value'];
    } else {
        echo $product_info['discount_value'] . '%';
    }
    ?>
</td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                ₹ <?= $product_info['grand_total'] ?></td>
                                                            <?php
                                                            $payment = $this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                            $paymentsum = $this->CommonModal->getRowByIdSum('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'paid');
                                                            ?>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                ₹ <?= $paymentsum[0]['total_sum'] ?></td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                ₹ <?= number_format((float)$payment[0]['due'], 2) ?></td>
                                                            <?php if ($paymentsum[0]['total_sum'] < $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0) { ?>
                                                                <td
                                                                    class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                    <span
                                                                        class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">partial</span>
                                                                </td>
                                                            <?php } elseif ($paymentsum[0]['total_sum'] = $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0) { ?>
                                                                <td
                                                                    class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                    <span
                                                                        class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Complete</span>
                                                                </td>
                                                            <?php } elseif ($paymentsum[0]['total_sum'] > $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0) { ?>
                                                                <td
                                                                    class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                    <span
                                                                        class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-primary bg-primary-light light border border-primary-light-3 dark:border-transparent">Advance</span>
                                                                </td>
                                                            <?php } else { ?>
                                                                <td
                                                                    class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                    <span
                                                                        class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">pending</span>
                                                                </td>
                                                            <?php }
                                                            if ($product_info['branch_id'] != 0) {
                                                                $branch = $this->CommonModal->getRowByMultitpleId('branch', 'id', $product_info['branch_id'], 'user_id', $user[0]['id']); ?>
                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    <?= $branch[0]['name'] ?></td>
                                                            <?php } else {
                                                                ?>
                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    Admin</td>
                                                            <?php }
                                                            ?>
                                                            <td
                                                                class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                <div class="dropdown">
                                                                    <button type="button"
                                                                        class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp"
                                                                        data-dz-dropdown="dropdown-<?= $product_info['purchase_code'] ?>">
                                                                        <svg width="20px" height="20px" viewBox="0 0 24 24"
                                                                            version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none"
                                                                                fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24" />
                                                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                                                            </g>
                                                                        </svg>
                                                                    </button>
                                                                    <div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden"
                                                                        id="dropdown-<?= $product_info['purchase_code'] ?>">
                                                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="<?= base_url('Admin_Dashboard/print_purchase/' . encryptId($user[0]['id']) . '/' . $product_info['purchase_code']); ?>">
                                                                            View purchase
                                                                        </a>
                                                                      

                                                                        <?php if ($product_info['branch_id'] != 0) { ?>
                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="<?= base_url('Admin_Dashboard/edit_product?user_id=' . $user['0']['id'] . '&branch_id=' . $product_info['branch_id'] . '&purchase_code=' . $product_info['purchase_code']); ?>">Edit</a>
                                                                        <?php } else { ?>
                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="<?= base_url('Admin_Dashboard/edit_product?user_id=' . $user['0']['id'] . '&branch_id=0&purchase_code=' . $product_info['purchase_code']); ?>">Edit</a>
                                                                        <?php } ?>
                                                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="javascript:void(0);"
                                                                            onclick="openModal('<?= $product_info['purchase_code'] ?>')">View
                                                                            Payment</a>

                                                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="javascript:void(0);"
                                                                            onclick="dueModal('<?= $product_info['purchase_code'] ?>')">Pay
                                                                            Due Payment</a>
                                                                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="<?= base_url('Admin_Dashboard/product/' . encryptId($user[0]['id']) . '?purchase_code=' . $product_info['purchase_code']); ?>"
                                                                            onclick="return confirm('Are you sure you want to delete this Product Detail?')">Delete</a>


                                                                        
                                                                            <?php if ($product_info['branch_id'] != 0) { ?>

                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="<?= base_url('Admin_Dashboard/return_product?user_id=' . $user[0]['id'] . '&branch_id=' . $product_info['branch_id']. '&purchase_code=' . $product_info['purchase_code']); ?>"
                                                                            onclick="return confirm('Are you sure you want to Return this Purchas Detail?')">Return
                                                                            Purchase</a>
                                                                        <?php } else { ?>

                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                            href="<?= base_url('Admin_Dashboard/return_product?user_id=' . $user[0]['id'] . '&branch_id=0&purchase_code=' . $product_info['purchase_code']); ?>"
                                                                            onclick="return confirm('Are you sure you want to Return this Purchas Detail?')">Return
                                                                            Purchase</a>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <!-- <tr><td colspan="11">No data found</td></tr> -->
                                                <?php endif; ?>

                                            </tbody>

 <tbody>
        <tr>
            <td colspan="7" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total :-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount ?> /-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalPaid ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalDue ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>
        </tr>
    </tbody>


                                        </table>
                                        <?php if (!empty($product)): ?>
                                            <?php
                                            // Create an array to store payment details indexed by purchase_code
                                            $payment_details = [];

                                            // Loop through the purchase_payment table to fill the payment_details array
                                            foreach ($purchase_payment as $payment_info) {
                                                $purchase_code = $payment_info['purchase_code'];
                                                $payment_details[$purchase_code] = [
                                                    'paid' => $payment_info['paid'],
                                                    'due' => $payment_info['due'],
                                                ];
                                            }

                                            // Initialize an array to store the product count for each vendor and purchase code
                                            $product_counts = [];

                                            // Loop through products to calculate the count for each vendor + purchase_code combination
                                            foreach ($product as $product_info) {
                                                $key = $product_info['vender_name'] . '_' . $product_info['purchase_code'];
                                                if (!isset($product_counts[$key])) {
                                                    $product_counts[$key] = 0;
                                                }
                                                $product_counts[$key]++;
                                            }

                                            // Track already displayed purchase_code values
                                            $displayed_purchase_codes = [];

                                            // Now display the data
                                            foreach ($product as $product_info):
                                                // Check if the purchase_code has already been displayed
                                                if (in_array($product_info['purchase_code'], $displayed_purchase_codes)) {
                                                    continue; // Skip this iteration if purchase_code has already been displayed
                                                }

                                                // Fetch the vendor name based on the vender_id
                                                $vender_name = '';
                                                foreach ($vender as $vender_info) {
                                                    if ($vender_info['id'] == $product_info['vender_name']) {
                                                        $vender_name = $vender_info['vender_name'];
                                                        break;
                                                    }
                                                }

                                                // Get the count of products with the same vendor and purchase_code
                                                $key = $product_info['vender_name'] . '_' . $product_info['purchase_code'];
                                                $total_products = $product_counts[$key];

                                                // Get the pay and due values from the payment_details array
                                                $pay_value = isset($payment_details[$product_info['purchase_code']]) ? $payment_details[$product_info['purchase_code']]['paid'] : 0;
                                                $due_value = isset($payment_details[$product_info['purchase_code']]) ? $payment_details[$product_info['purchase_code']]['due'] : 0;

                                                // Mark this purchase_code as displayed
                                                $displayed_purchase_codes[] = $product_info['purchase_code'];
                                                ?>
                                                <div id="paymentModal<?= $product_info['purchase_code'] ?>"
                                                    class="custom-modal">
                                                    <div class="custom-modal-content">
                                                        <span class="custom-modal-close"
                                                            onclick="closeModal('<?= $product_info['purchase_code'] ?>')">&times;</span>
                                                        <h2 id="paymentModalLabel">Payment Details</h2>
                                                        <div class="modal-body">
                                                            <div class="row mb-12">

                                                                <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                    <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                    <?php
                                                                    $vender = $this->CommonModal->getRowByMultitpleId('vender', 'id', $product_info['vender_name'], 'user_id', $user['0']['id']);
                                                                    ?>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Vender Name:</strong>
                                                                        <?= $vender[0]['vender_name'] ?></div>

                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Invoice No.:</strong>
                                                                        <?= $user[0]['purchase_code'] ?>-<?= $product_info['purchase_code'] ?>
                                                                    </div>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Date:</strong> <?= $product_info['date'] ?>
                                                                    </div>

                                                                </div>
                                                                <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                    <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                    <?php
                                                                    $payment = $this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                    $paymentsum = $this->CommonModal->getRowByIdSum('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'paid');
                                                                    ?>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Total Amount:</strong> ₹
                                                                        <?= $payment[0]['total'] ?>/-</div>

                                                                    <div class="text-body-color sm:text-sm text-xs"><strong>Paid
                                                                            Amount:</strong> ₹
                                                                        <?= $paymentsum[0]['total_sum'] ?>/-</div>
                                                                    <div class="text-body-color sm:text-sm text-xs"><strong>Due
                                                                            Amount:</strong> ₹ <?= $payment[0]['due'] ?>/-</div>

                                                                </div>


                                                                <table>
                                                                    <thead>
                                                                        <tr>
                                                                            <th
                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">
                                                                                #</th>
                                                                            <th
                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">
                                                                                Payment Date</th>
                                                                            <th
                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">
                                                                                Paid Amount</th>
                                                                            <th
                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left right text-dark">
                                                                                Payment Mode</th>
                                                                            <th
                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">
                                                                                Bank/Cheque</th>
                                                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-right text-dark">Received by</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $paymentall = $this->CommonModal->getRowByMultitpleId('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id']);
                                                                        $i = 0;
                                                                        if (!empty($paymentall)) {  // Missing closing parenthesis fixed here
                                                                            foreach ($paymentall as $row) {
                                                                                $i++;
                                                                                ?>
                                                                                <tr>

                                                                                    <td
                                                                                        class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                        <?= $i ?></td>

                                                                                    <td
                                                                                        class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong">
                                                                                        <?= $row['date'] ?></td>
                                                                                    <td
                                                                                        class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left">
                                                                                        ₹<?= $row['paid'] ?>/-</td>
                                                                                    <td
                                                                                        class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color right">
                                                                                        <?= $row['mode'] ?> </td>
                                                                                    <?php if ($row['bank']) {
                                                                                        $bank = $this->CommonModal->getRowByMultitpleId('account', 'id', $row['bank'], 'user_id', $user['0']['id']); ?>
                                                                                        <td
                                                                                            class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                            <?= $bank[0]['bank_name'] ?></td>
                                                                                              <?php } elseif($row['cheque_no']) {
                                                                                            ?>
                                                                                             <td
                                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                                <?= $row['cheque_no'] ?></td>
                                                                                    <?php } else {
                                                                                        ?>
                                                                                        <td
                                                                                            class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                            <?= $row['mode'] ?></td>
                                                                                            <?php } if($row['branch_id']) {
                                                                                        $branch = $this->CommonModal->getRowByMultitpleId('branch', 'id', $row['branch_id'], 'user_id', $user[0]['id']); ?>
                                                                    <td
                                                                        class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                        <?= $branch[0]['name'] ?></td>

                                                                                        <?php } else {?>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">By Own</td>

                                                <?php } ?>
                                                                                </tr>
                                                                            <?php }
                                                                        } ?>

                                                                    </tbody>
                                                                </table>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="payModal<?= $product_info['purchase_code'] ?>" class="custom-modal">
                                                    <div class="custom-modal-content">
                                                        <span class="custom-modal-close"
                                                            onclick="closeM('<?= $product_info['purchase_code'] ?>')">&times;</span>
                                                        <h2 id="payModalLabel">Pay Due Payment</h2>
                                                        <div class="modal-body">
                                                            <div class="row mb-12">

                                                                <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                    <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                    <?php
                                                                    $vender = $this->CommonModal->getRowByMultitpleId('vender', 'id', $product_info['vender_name'], 'user_id', $user['0']['id']);
                                                                    ?>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Vender Name:</strong>
                                                                        <?= $vender[0]['vender_name'] ?></div>

                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Invoice No.:</strong>
                                                                        <?= $user[0]['purchase_code'] ?>-<?= $product_info['purchase_code'] ?>
                                                                    </div>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Date:</strong> <?= $product_info['date'] ?>
                                                                    </div>

                                                                </div>
                                                                <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                    <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                    <?php
                                                                    $payment = $this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                    $paymentsum = $this->CommonModal->getRowByIdSum('purchase_payment', 'purchase_code', $product_info['purchase_code'], 'user_id', $user['0']['id'], 'paid');
                                                                    ?>
                                                                    <div class="text-body-color sm:text-sm text-xs">
                                                                        <strong>Total Amount:</strong> ₹
                                                                        <?= $payment[0]['total'] ?>/-</div>

                                                                    <div class="text-body-color sm:text-sm text-xs"><strong>Paid
                                                                            Amount:</strong> ₹
                                                                        <?= $paymentsum[0]['total_sum'] ?>/-</div>
                                                                    <div class="text-body-color sm:text-sm text-xs"><strong>Due
                                                                            Amount:</strong> ₹ <?= $payment[0]['due'] ?>/-</div>

                                                                </div>
                                                                <form class="profile-form"
                                                                    action="<?= base_url('admin_Dashboard/add_purchase_payment/' . encryptId($user['0']['id'])) ?>"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">

                                                                        <div class="row">
                                                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                                                <label
                                                                                    class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                                                                <input type="date"
                                                                                    id="paymentDate<?= $product_info['purchase_code'] ?>"
                                                                                    name="date"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                                            </div>
                                                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                                                <label
                                                                                    class="text-dark dark:text-white text-[13px] mb-2">Paid
                                                                                    Amount</label>
                                                                                <input type="number" name="paid"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value="<?= $payment[0]['due'] ?>"  max="<?= $payment[0]['due'] ?>" 
    id="paidAmount<?= $product_info['purchase_code'] ?>" 
    oninput="validatePaidAmount('<?= $product_info['purchase_code'] ?>')">
                                                                                <input type="hidden" name="due"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value="<?= $payment[0]['due'] ?>">
                                                                                <input type="hidden" name="purchase_code"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value="<?= $product_info['purchase_code'] ?>">
                                                                                <input type="hidden" name="user_id"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value="<?= $user['0']['id'] ?>">
                                                                                <input type="hidden" name="total"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value=" <?= $payment[0]['total'] ?>">
                                                                                <input type="hidden" name="vender_id"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                    placeholder="paid amount"
                                                                                    value="<?= $product_info['vender_name'] ?>">
                                                                            </div>
                                                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                                                <label
                                                                                    class="text-dark dark:text-white text-[13px] mb-2">Payment
                                                                                    Mode</label>
                                                                                <select name="mode"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                    id="paymentMode<?= $product_info['purchase_code'] ?>"
                                                                                    required>
                                                                                    <option value="">--SELECT--</option>
                                                                                    <option value="Cash">CASH</option>
                                                                                    <option value="Upi">UPI</option>
                                                                                    <option value="Card">CREADIT/DEBIT CARD</option>
                                                                                  
                                                                                    <option value="Bank">Bank Transfer</option>
                                                                                    <option value="Cheque">Cheque</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="sm:w-1/2 w-full mb-[30px]"
                                                                                id="bankDetails<?= $product_info['purchase_code'] ?>"
                                                                                style="display:none;">
                                                                                <label
                                                                                    class="text-dark dark:text-white text-[13px] mb-2">Account</label>
                                                                                <select name="bank"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                    id="bankAccount<?= $product_info['purchase_code'] ?>" >
                                                                                    <option value="">--SELECT--</option>
                                                                                    <?php

                                                                                    $account = $this->CommonModal->getRowById('account', 'user_id', $user['0']['id']);
                                                                                    foreach ($account as $account_info) { ?>
                                                                                        <option value="<?= $account_info['id'] ?>">
                                                                                            <?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
                                                                                        </option>
                                                                                    <?php } ?>


                                                                                </select>
                                                                            </div>
                                                                             <div class="sm:w-1/2 w-full mb-[30px]"
                                                                                    id="chequeDetails<?= $product_info['purchase_code'] ?>"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Cheque Number</label>
                                                            <input type="text" name="cheque_no"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="Cheque Number"
                                                                                       id="cheque<?= $product_info['purchase_code'] ?>" >
                                                                                </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                        class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                                                        <button type="submit" id="add-product-btn"
                                                                            class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Pay</button>
                                                                    </div>
                                                            </div>
                                                            </form>
                                                            <script>
                                                                document.getElementById('paymentMode<?= $product_info['purchase_code'] ?>').addEventListener('change', function () {
                                                                    var bankDetails = document.getElementById('bankDetails<?= $product_info['purchase_code'] ?>');
                                                                     var selectDetails = document.getElementById('bankAccount<?= $product_info['purchase_code'] ?>');
                                                                    if (this.value === 'Bank') {
                                                                        bankDetails.style.display = 'block';
                                                                           selectDetails.setAttribute('required', 'required')
                                                                    } else {
                                                                        bankDetails.style.display = 'none';
                                                                         selectDetails.removeAttribute('required'); 
                                                                    }
                                                                });
                                                                document.addEventListener("DOMContentLoaded", function () {
                                                                    var today = new Date();
                                                                    var year = today.getFullYear();
                                                                    var month = (today.getMonth() + 1).toString().padStart(2, '0');
                                                                    var day = today.getDate().toString().padStart(2, '0');
                                                                    var currentDate = `${year}-${month}-${day}`;
                                                                    document.getElementById('paymentDate<?= $product_info['purchase_code'] ?>').value = currentDate;
                                                                });
                                                                 document.getElementById('paymentMode<?= $product_info['purchase_code'] ?>').addEventListener('change', function () {
                                                                        var chequeDetails = document.getElementById('chequeDetails<?= $product_info['purchase_code'] ?>');
                                                                          var selectDetails = document.getElementById('cheque<?= $product_info['purchase_code'] ?>');
                                                                        if (this.value === 'Cheque') {
                                                                            chequeDetails.style.display = 'block';
                                                                              selectDetails.setAttribute('required', 'required')
                                                                        } else {
                                                                            chequeDetails.style.display = 'none';
                                                                             selectDetails.removeAttribute('required'); 
                                                                        }
                                                                    });
                                                            </script>
                                      <script>
    function validatePaidAmount(purchaseCode) {
        const paidInput = document.getElementById('paidAmount' + purchaseCode);
        const maxValue = parseFloat(paidInput.max);

        // Parse the input value and check against the max value
        const currentValue = parseFloat(paidInput.value);

        if (currentValue > maxValue) {
            alert('Amount cannot exceed the due amount!');
            paidInput.value = maxValue; // Reset to the maximum allowed value
        } else if (currentValue < 0 || isNaN(currentValue)) {
            paidInput.value = ""; // Reset for invalid or negative inputs
        }
    }
</script>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <!-- <tr><td colspan="11">No data found</td></tr> -->
                                    <?php endif; ?>

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
        <?php include "includes2/footer-links.php" ?>
        <?php include "includes2/footer.php" ?>
</body>
<script>
    // Function to open modal and load content
    function openModal(invoice_no) {
        var modal = document.getElementById(`paymentModal${invoice_no}`);
        var modalLabel = document.getElementById("paymentModalLabel");
        var modalBody = document.querySelector(".modal-body");

        // Display the modal
        modal.style.display = "block";


    }

    // Function to close modal
    function closeModal(invoice_no) {
        var modal = document.getElementById(`paymentModal${invoice_no}`);
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        var modal = document.getElementById("paymentModal");
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    function dueModal(invoice_no) {
        var modal = document.getElementById(`payModal${invoice_no}`);
        var modalLabel = document.getElementById("payModalLabel");
        var modalBody = document.querySelector(".modal-body");

        // Display the modal
        modal.style.display = "block";


    }

    // Function to close modal
    function closeM(invoice_no) {
        var modal = document.getElementById(`payModal${invoice_no}`);
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function (event) {
        var modal = document.getElementById(`payModal${invoice_no}`);
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>
<script>
   
function exportTableToExcel() {
    // Select the table element
    var table = document.querySelector("#u-tbl"); // Replace with your table's ID

    // Initialize an empty array to hold table data
    var data = [];

    // Loop through each row of the table
    for (var i = 0, row; row = table.rows[i]; i++) {
        var rowData = [];
        // Loop through each cell in the row
        for (var j = 0, cell; cell = row.cells[j]; j++) {
            rowData.push(cell.innerText);
        }
        data.push(rowData);
    }

    // Convert array to worksheet
    var worksheet = XLSX.utils.aoa_to_sheet(data);

    // Create a new workbook and append the worksheet
    var workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, "Vender Report");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "vender_report.xlsx");
}

function exportTableAsPDF() {
    // Check if jsPDF is available
    const { jsPDF } = window.jspdf;
    if (!jsPDF) {
        console.error("jsPDF not loaded");
        return;
    }

    const pdf = new jsPDF('p', 'mm', 'a4');
    const table = document.getElementById('u-tbl');

    // Capture the table as an image
    html2canvas(table, { scale: 2 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        // Add the image to PDF and adjust size
        pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
        
        // Download the PDF
        pdf.save('vender_report.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}
</script>
<script>
    $(document).ready(function() {
        $('#u-tbl').DataTable({
            paging: true,           // Enable pagination
            searching: true,        // Enable search
            ordering: true,         // Enable column sorting
            pageLength: 10,         // Number of rows per page
            lengthMenu: [5, 10, 25, 50, 100], // Options for rows per page
            language: {
                paginate: {
                    previous: "&laquo;",
                    next: "&raquo;"
                },
                search: "Filter records:",
                lengthMenu: "Show _MENU_ entries per page",
                info: "Showing _START_ to _END_ of _TOTAL_ entries"
            }
        });
    });
</script>

</html>