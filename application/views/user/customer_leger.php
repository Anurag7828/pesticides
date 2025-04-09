<!DOCTYPE html>
<html lang="en">


<head>
   
    <?php include "includes2/header-links.php" ?>
 
</head>
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
                                    action="<?= base_url('admin_Dashboard/customer_leger/' . encryptId($user['0']['id'])) ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-5 p-4">
                                        <div class="row">
                                     
<div class="sm:w-1/2 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Select Customer</label>
    <select name="customer_name" id="customer-name" class="  choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
        <option value="all">All Sales Report</option> <!-- Default 'All Sales Report' option -->
        <?php foreach ($customer_list as $customer_info) { ?>
            <option value="<?= $customer_info['id']; ?>" <?= ($customer_info['name'] == $customer['0']['name']) ? 'selected' : ''; ?>>
                <?= $customer_info['name']; ?> - <?= $customer_info['contact']; ?> - <?= $customer_info['address']; ?>
            </option>
        <?php } ?>
    </select>

    <input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $user['0']['id'] ?>">
</div>


                                            <div class="xl:w-1/4 sm:w-1/2 w-full " style="margin-top: 28px;">
                                                <button
                                                    class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-white bg-primary leading-5 inline-block border border-primary btn-primary light hover:bg-primary btn-primary"
                                                    title="Click here to Search" type="submit"><i
                                                        class="fa-sharp fa-solid fa-filter mr-1"></i>Filter</button>
                                                <a
                                                    href="<?= base_url('Admin_Dashboard/sales/' . encryptId($user['0']['id'])) ?>"><button
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
								<h4 class="text-base">Customer Leger</h4>
                              
							
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
                                                        class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">
                                                        S No.</th>
                                                    <th
                                                        class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">
                                                        Date</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Invoice No.</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Customer Name</th>
                                                   
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Grand Total<br>Amount</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Paid Amount</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Due Amount</th>
                                                        <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Intrest Amount</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Status</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Add by</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $serial = 1;
                                                  $totalAmount = 0; 
                                                  $totalPaid = 0; 
                                                  $totalDue = 0;
                                                  $totalintrest = 0;

                                                if (!empty($invoice)) {
                                                    // Keep track of previously shown combinations of invoice_no and customer_name
                                                    $displayedInvoices = [];

                                                    foreach ($invoice as $customer_info) {
                                                        $totalAmount += $customer_info['final_total'];
                                                        $totalintrest += $customer_info['interest_amount'];

                                                        $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                        $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'paid');
                                                        $totalPaid += $paymentsum[0]['total_sum'];
                                                        $totalDue += $payment[0]['due'];
                                                        // Combine invoice_no and customer_name as a unique key
                                                        $uniqueKey = $customer_info['invoice_no'] . '-' . $customer_info['customer_name'];

                                                        // Check if this unique combination has been shown already
                                                        if (!in_array($uniqueKey, $displayedInvoices)) {
                                                            // If not shown, display the row and add to the displayed list
                                                            $displayedInvoices[] = $uniqueKey;
                                                ?>
                                                            <tr>
                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    <?= $serial++ ?></td>

                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap ">
                                                                    <?= date('d-m-Y', strtotime($customer_info['bill_date'])) ?></td>

                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?>
                                                                </td>

                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color address-wrap">
                                                                    <?= $customer_info['customer_name'] ?></td>
                                                               
                                                                <td
                                                                    class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    ₹ <?= number_format($customer_info['final_total'] , 2) ?></td>
                                                                <?php
                                                                $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'paid');

                                                                $final_total_with_interest = $customer_info['final_total'] ;
                                                                $total_paid = (float) $paymentsum[0]['total_sum'];
                                                                $due_amount = max(0, $final_total_with_interest - $total_paid); // Ensure no negative values
                                                                ?>

                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    ₹ <?= number_format($total_paid, 2) ?>
                                                                </td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    ₹ <?= number_format($due_amount, 2) ?>
                                                                </td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                    <?php
                                                                if (!empty($customer_info['include_interest']) && $customer_info['include_interest'] == 1 && $customer_info['days_late'] > 0) { ?>
                                                                         ₹<?= number_format($customer_info['interest_amount'], 2) ?>
                                                                       <?php } else{
                                                                        ?>
                                                                        No Intrest
                                                                      <?php } ?>
                                                               
                                                                </td>
                                                                <?php if ($paymentsum[0]['total_sum'] < $payment[0]['total'] && $paymentsum[0]['total_sum'] != 0) { ?>
                                                                    <td
                                                                        class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                        <span
                                                                            class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">partial</span>
                                                                    </td>
                                                                <?php } elseif ($paymentsum[0]['total_sum'] = $payment[0]['total']  && $paymentsum[0]['total_sum'] != 0) { ?>
                                                                    <td
                                                                        class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                                                                        <span
                                                                            class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Complete</span>
                                                                    </td>
                                                                <?php } elseif ($paymentsum[0]['total_sum'] > $payment[0]['total']  && $paymentsum[0]['total_sum'] != 0) { ?>
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
                                                                if ($customer_info['branch'] != 0) {
                                                                    $branch = $this->CommonModal->getRowByMultitpleId('branch', 'id', $customer_info['branch'], 'user_id', $user[0]['id']); ?>
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
                                                                    class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
                                                                    <div class="dropdown">
                                                                        <button type="button"
                                                                            class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp"
                                                                            data-dz-dropdown="dropdown-<?= $customer_info['invoice_no'] ?>">
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
                                                                            id="dropdown-<?= $customer_info['invoice_no'] ?>">
                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="<?= base_url('Admin_Dashboard/print_invoice/' . encryptId($user['0']['id']) . '/' . $customer_info['invoice_no']); ?>">View
                                                                                Invoice</a>

                                                                            <?php if ($customer_info['branch'] != 0) { ?>
                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                    href="<?= base_url('Admin_Dashboard/edit_invoice?user_id=' . $user['0']['id'] . '&branch_id=' . $customer_info['branch'] . '&invoice_no=' . $customer_info['invoice_no']); ?>">Edit</a>
                                                                            <?php } else { ?>
                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                    href="<?= base_url('Admin_Dashboard/edit_invoice?user_id=' . $user['0']['id'] . '&branch_id=0&invoice_no=' . $customer_info['invoice_no']); ?>">Edit</a>
                                                                            <?php } ?>

                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="javascript:void(0);"
                                                                                onclick="openModal('<?= $customer_info['invoice_no'] ?>')">View
                                                                                Payment</a>
                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="javascript:void(0);"
                                                                                onclick="interestModal('<?= $customer_info['invoice_no'] ?>')">View
                                                                                Interest Details</a>

                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="javascript:void(0);"
                                                                                onclick="dueModal('<?= $customer_info['invoice_no'] ?>')">Pay
                                                                                Due Payment</a>


                                                                            <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                href="<?= base_url('Admin_Dashboard/invoice/' . encryptId($user[0]['id']) . '?id=' . $customer_info['invoice_no']); ?>"
                                                                                onclick="return confirm('Are you sure you want to delete this invoice?')">Delete</a>

                                                                            <?php if ($customer_info['branch'] != 0) { ?>

                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                    href="<?= base_url('Admin_Dashboard/return_invoice?user_id=' . $user['0']['id']  . '&branch_id=' . $customer_info['branch'] . '&invoice_no=' . $customer_info['invoice_no']); ?>"
                                                                                    onclick="return confirm('Are you sure you want to Return This Invoice?')">Return
                                                                                    Sales</a>
                                                                            <?php } else { ?>

                                                                                <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]"
                                                                                    href="<?= base_url('Admin_Dashboard/return_invoice?user_id=' . $user['0']['id']  . '&branch_id=0&invoice_no=' . $customer_info['invoice_no']); ?>"
                                                                                    onclick="return confirm('Are you sure you want to Return This Invoice?')">Return
                                                                                    Sales</a>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </div>

                                                                </td>


                                                            </tr>

                                                <?php
                                                        }
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                            <tbody>
        <tr>
            <td colspan="4" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total :-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount ?> /-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalPaid ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalDue ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalintrest ?>/-</td>

            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>

        </tr>
    </tbody>
                                        </table>
                                        <?php
                                        if (!empty($invoice)) {
                                            // Keep track of previously shown combinations of invoice_no and customer_name
                                            $displayedInvoices = [];

                                            foreach ($invoice as $customer_info) {
                                                // Combine invoice_no and customer_name as a unique key
                                                $uniqueKey = $customer_info['invoice_no'] . '-' . $customer_info['customer_name'];

                                                // Check if this unique combination has been shown already
                                                if (!in_array($uniqueKey, $displayedInvoices)) {
                                                    // If not shown, display the row and add to the displayed list
                                                    $displayedInvoices[] = $uniqueKey;
                                        ?>



                                                    <div id="payModal<?= $customer_info['invoice_no'] ?>" class="custom-modal">
                                                        <div class="custom-modal-content">
                                                            <span class="custom-modal-close"
                                                                onclick="closeM('<?= $customer_info['invoice_no'] ?>')">&times;</span>
                                                            <h2 id="payModalLabel">Pay Due Payment</h2>
                                                            <div class="modal-body">
                                                                <div class="row mb-12">

                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                        <?php
                                                                        $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $customer_info['c_id'], 'user_id', $user['0']['id']);
                                                                        ?>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Customer Name:</strong>
                                                                            <?= $customer[0]['name'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Customer No:</strong>
                                                                            <?= $customer[0]['contact'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Invoice No.:</strong>
                                                                            <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Date:</strong>
                                                                            <?= $customer_info['bill_date'] ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                        <?php
                                                                        $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                        $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'paid');
                                                                        $final_total = floatval($payment[0]['total']);
                                                                        $due_total = floatval($payment[0]['due']);

                                                                        $show_interest = false; // Default: Do not show interest

                                                                        if (!empty($customer_info['include_interest']) && $customer_info['include_interest'] == 1 && $customer_info['days_late'] > 0) {
                                                                            $final_total += floatval($customer_info['interest_amount']);
                                                                            $due_total += floatval($customer_info['interest_amount']);

                                                                            $show_interest = true; // Enable interest display
                                                                        }
                                                                        ?>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Total Amount:</strong> ₹
                                                                            <?= $payment[0]['total'] ?>/-
                                                                        </div>
                                                                        <?php if ($show_interest): ?>
                                                                            <div class="text-body-color sm:text-sm text-xs">
                                                                                <strong>Interest Amount:</strong> ₹<?= number_format($customer_info['interest_amount'], 2) ?>/-
                                                                            </div>
                                                                            <div class="text-body-color sm:text-sm text-xs">
                                                                                <strong>Total With Interest:</strong> ₹<?= number_format($final_total, 2) ?>/-
                                                                            </div>
                                                                            <div class="text-body-color sm:text-sm text-xs">
                                                                                <strong>Roundoff Total With Interest:</strong> ₹<?= number_format(round($final_total), 2) ?>/-
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <div class="text-body-color sm:text-sm text-xs"><strong>Paid
                                                                                Amount:</strong> ₹
                                                                            <?= $paymentsum[0]['total_sum'] ?>/-</div>
                                                                        <div class="text-body-color sm:text-sm text-xs"><strong>Due
                                                                                Amount:</strong>₹<?= number_format($due_total, 2) ?>/-</div>
                                                                                <div class="text-body-color sm:text-sm text-xs"><strong>Roundoff Due
                                                                                Amount:</strong>₹<?= number_format(round($due_total, 2)) ?>/-</div>
                                                                    </div>
                                                                    <form class="profile-form" id="paymentForm<?= $customer_info['invoice_no'] ?>"
                                                                        action="<?= base_url('admin_Dashboard/add_payment/' . encryptId($user['0']['id'])) ?>"
                                                                        method="post" enctype="multipart/form-data" onsubmit="sendWhatsAppMessage(event, '<?= $customer_info['invoice_no'] ?>', '<?= $customer[0]['name'] ?>','<?= $customer[0]['contact']?>','<?= $payment[0]['total'] ?>','<?= $payment[0]['due'] ?>','<?= $paymentsum[0]['total_sum'] ?>')">

                                                                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">

                                                                            <div class="row">
                                                                                <div class="sm:w-1/2 w-full mb-[30px]">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                                                                    <input type="date"
                                                                                        id="paymentDate<?= $customer_info['invoice_no'] ?>"
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
                                                                                        value="<?= number_format(round($due_total, 2)) ?>" max="<?= number_format(round($due_total, 2)) ?>"
                                                                                        id="paidAmount<?= $customer_info['invoice_no'] ?>"
                                                                                        oninput="validatePaidAmount('<?= $customer_info['invoice_no'] ?>')">
                                                                                    <input type="hidden" name="due"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value="<?= $payment[0]['due'] ?>">
                                                                                        <input type="hidden" name="intrest"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value="<?= number_format(round($customer_info['interest_amount'], 2)) ?>">
                                                                                    <input type="hidden" name="invoice_no"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value="<?= $customer_info['invoice_no'] ?>">
                                                                                    <input type="hidden" name="user_id"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value="<?= $user['0']['id'] ?>">
                                                                                    <input type="hidden" name="total"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value=" <?= $payment[0]['total'] ?>">
                                                                                    <input type="hidden" name="customer_id"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="paid amount"
                                                                                        value="<?= $customer_info['c_id'] ?>">
                                                                                </div>
                                                                                <div class="sm:w-1/2 w-full mb-[30px]">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Payment
                                                                                        Mode</label>
                                                                                    <select name="mode"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                        id="paymentMode<?= $customer_info['invoice_no'] ?>"
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
                                                                                    id="bankDetails<?= $customer_info['invoice_no'] ?>"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Account</label>
                                                                                    <select name="bank"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                        id="bankAccount<?= $customer_info['invoice_no'] ?>">
                                                                                        <option value="">--SELECT--</option>
                                                                                        <?php
                                                                                        // Fetch bank accounts from the database
                                                                                        $account = $this->CommonModal->getRowById('account', 'user_id', $user['0']['id']);
                                                                                        foreach ($account as $account_info) { ?>
                                                                                            <option value="<?= htmlspecialchars($account_info['id']) ?>">
                                                                                                <?= htmlspecialchars($account_info['bank_name']) ?> - <?= htmlspecialchars($account_info['account_no']) ?>
                                                                                            </option>
                                                                                        <?php } ?>
                                                                                    </select>
                                                                                </div>
                                                                                <div class="sm:w-1/2 w-full mb-[30px]"
                                                                                    id="chequeDetails<?= $customer_info['invoice_no'] ?>"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Cheque Number</label>
                                                                                    <input type="text" name="cheque_no"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="Cheque Number"
                                                                                        id="cheque<?= $customer_info['invoice_no'] ?>">
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
                                                                    document.getElementById('paymentMode<?= $customer_info['invoice_no'] ?>').addEventListener('change', function() {
                                                                        var bankDetails = document.getElementById('bankDetails<?= $customer_info['invoice_no'] ?>');
                                                                        var selectDetails = document.getElementById('bankAccount<?= $customer_info['invoice_no'] ?>');
                                                                        if (this.value === 'Bank') {
                                                                            bankDetails.style.display = 'block';
                                                                            selectDetails.setAttribute('required', 'required')
                                                                        } else {
                                                                            bankDetails.style.display = 'none';
                                                                            selectDetails.removeAttribute('required');
                                                                        }
                                                                    });
                                                                    document.addEventListener("DOMContentLoaded", function() {
                                                                        var today = new Date();
                                                                        var year = today.getFullYear();
                                                                        var month = (today.getMonth() + 1).toString().padStart(2, '0');
                                                                        var day = today.getDate().toString().padStart(2, '0');
                                                                        var currentDate = `${year}-${month}-${day}`;
                                                                        document.getElementById('paymentDate<?= $customer_info['invoice_no'] ?>').value = currentDate;
                                                                    });
                                                                    document.getElementById('paymentMode<?= $customer_info['invoice_no'] ?>').addEventListener('change', function() {
                                                                        var chequeDetails = document.getElementById('chequeDetails<?= $customer_info['invoice_no'] ?>');
                                                                        var selectDetails = document.getElementById('cheque<?= $customer_info['invoice_no'] ?>');
                                                                        if (this.value === 'Cheque') {
                                                                            chequeDetails.style.display = 'block';
                                                                            selectDetails.setAttribute('required', 'required')
                                                                        } else {
                                                                            chequeDetails.style.display = 'none';
                                                                            selectDetails.removeAttribute('required');
                                                                        }
                                                                    });
                                                                </script>
                                    

                                                               <?php
$shopName = isset($user[0]['shop']) ? addslashes($user[0]['shop']) : "Shop Name";
$invoiceDate = isset($customer_info['bill_date']) ? date('d M Y', strtotime($customer_info['bill_date'])) : "N/A";
$invoiceUrl = $invoiceUrl ?? "#";
$prefix = isset($user[0]['prefix']) ? $user[0]['prefix'] : "";
?>

<script>
function sendWhatsAppMessage(event, invoiceNo, customer_name, customer_contact, total, due, previousPaid) {
    event.preventDefault(); 

    let customerName = customer_name;
    let contactNumber = customer_contact; 
    let totalAmount = parseFloat(total) || 0;
    let currentDueAmount = parseFloat(due) || 0;
    let previousPaidAmount = parseFloat(previousPaid) || 0;

    let shopName = "<?= $shopName ?>"; 
    let invoiceDate = "<?= $invoiceDate ?>"; 
    let invoiceUrl = "<?= $invoiceUrl ?>"; 
    let prefix = "<?= $prefix ?>";

    // Form Data Fetch
    let paidAmount = parseFloat(document.querySelector(`#paidAmount${invoiceNo}`).value) || 0;
    let paymentMode = document.querySelector(`#paymentMode${invoiceNo}`).value;

    console.log("Total Amount:", totalAmount);
    console.log("Previous Paid Amount:", previousPaidAmount);
    console.log("Current Due Amount:", currentDueAmount);
    console.log("Paid Amount:", paidAmount);
    console.log("Customer Contact:", contactNumber);

    // Calculate New Due Amount
    let newDueAmount = currentDueAmount - paidAmount;
    if (newDueAmount < 0) {
        alert("Paid amount cannot be greater than due amount!");
        return;
    }

    console.log("Updated Due Amount:", newDueAmount);

    if (!contactNumber || contactNumber.trim() === '') {
        alert("Customer WhatsApp number is missing!");
        return;
    }

    // WhatsApp Message Encoding
    let message = `Hey ${customerName},\n\n`
        + `Thank you for choosing *${shopName}*!\n\n`
        + `Your payment has been received.\n\n`
        + `*Invoice Number:* ${prefix}-${invoiceNo}\n`
        + `*Invoice Date:* ${invoiceDate}\n`
        + `*Total Amount:* ₹ ${totalAmount}\n`
        + `*Previous Paid:* ₹ ${previousPaidAmount}\n`
        + `*Current Paid:* ₹ ${paidAmount}\n`
        + `*Remaining Due:* ₹ ${newDueAmount}\n`
        + `*Payment Mode:* ${paymentMode}\n\n`
        + `View your invoice here:\n${invoiceUrl}\n\n`
        + `Thank you for your payment!`;

    let whatsappUrl = `https://wa.me/${contactNumber}?text=${encodeURIComponent(message)}`;

    // Pehle WhatsApp Open karega, phir Form Submit karega
    window.open(whatsappUrl, '_blank');

    setTimeout(() => {
        document.querySelector(`#paymentForm${invoiceNo}`).submit();
    }, 3000); // 3 sec delay
}
</script>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="paymentModal<?= $customer_info['invoice_no'] ?>" class="custom-modal">
                                                        <div class="custom-modal-content">
                                                            <span class="custom-modal-close"
                                                                onclick="closeModal('<?= $customer_info['invoice_no'] ?>')">&times;</span>
                                                            <h2 id="paymentModalLabel">Payment Details</h2>
                                                            <div class="modal-body">
                                                                <div class="row mb-12">

                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                        <?php
                                                                        $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $customer_info['c_id'], 'user_id', $user['0']['id']);
                                                                        ?>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Customer Name:</strong>
                                                                            <?= $customer[0]['name'] ?>
                                                                        </div>

                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Invoice No.:</strong>
                                                                            <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Date:</strong>
                                                                            <?= $customer_info['bill_date'] ?>
                                                                        </div>

                                                                    </div>
                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                                                        <?php
                                                                        $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                        $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'paid');
                                                                        ?>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Total Amount:</strong> ₹
                                                                            <?= $payment[0]['total'] ?>/-
                                                                        </div>

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
                                                                            $paymentall = $this->CommonModal->getRowByMultitpleId('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id']);
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
                                                                                        <?php } elseif ($row['cheque_no']) {
                                                                                        ?>
                                                                                            <td
                                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                                <?= $row['cheque_no'] ?></td>
                                                                                        <?php } else {
                                                                                        ?>
                                                                                            <td
                                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                                <?= $row['mode'] ?></td>
                                                                                        <?php }
                                                                                        if ($row['branch_id']) {
                                                                                            $branch = $this->CommonModal->getRowByMultitpleId('branch', 'id', $row['branch_id'], 'user_id', $user[0]['id']); ?>
                                                                                            <td
                                                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                                                <?= $branch[0]['name'] ?></td>

                                                                                        <?php } else { ?>
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

                                                    <div id="interestModal<?= $customer_info['invoice_no'] ?>" class="custom-modal">
                                                        <div class="custom-modal-content">
                                                            <span class="custom-modal-close" onclick="closeinterestModal('<?= $customer_info['invoice_no'] ?>')">&times;</span>
                                                            <h2 id="interestModalLabel">Interest Details</h2>
                                                            <div class="modal-body">
                                                                <div class="row mb-12">
                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <?php
                                                                        $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $customer_info['c_id'], 'user_id', $user['0']['id']);
                                                                        ?>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Customer Name:</strong> <?= $customer[0]['name'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Invoice No.:</strong> <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?>
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Date:</strong> <?= $customer_info['bill_date'] ?>
                                                                        </div>
                                                                    </div>

                                                                    <div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
                                                                        <?php
                                                                        // Fetch Payment Data
                                                                        $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                                                        $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $customer_info['invoice_no'], 'user_id', $user['0']['id'], 'paid');

                                                                        // Calculate Final Total (Including Interest if applicable)
                                                                        $final_total = floatval($payment[0]['total']);
                                                                        $show_interest = false; // Default: Do not show interest

                                                                        if (!empty($customer_info['include_interest']) && $customer_info['include_interest'] == 1 && $customer_info['days_late'] > 0) {
                                                                            $final_total += floatval($customer_info['interest_amount']);
                                                                            $show_interest = true; // Enable interest display
                                                                        }

                                                                        // Updated Paid & Due Amount
                                                                        $paid_amount = floatval($paymentsum[0]['total_sum']);
                                                                        $due_amount = max(0, $final_total - $paid_amount);
                                                                        ?>

                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Total Amount:</strong> ₹<?= number_format($payment[0]['total'], 2) ?>/-
                                                                        </div>

                                                                        <?php if ($show_interest): ?>
                                                                            <div class="text-body-color sm:text-sm text-xs">
                                                                                <strong>Interest Amount:</strong> ₹<?= number_format($customer_info['interest_amount'], 2) ?>/-
                                                                            </div>
                                                                            <div class="text-body-color sm:text-sm text-xs">
                                                                                <strong>Total With Interest:</strong> ₹<?= number_format($final_total, 2) ?>/-
                                                                            </div>
                                                                        <?php endif; ?>

                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Paid Amount:</strong> ₹<?= number_format($paid_amount, 2) ?>/-
                                                                        </div>
                                                                        <div class="text-body-color sm:text-sm text-xs">
                                                                            <strong>Due Amount:</strong> <span class="text-red-500">₹<?= number_format($due_amount, 2) ?>/-</span>
                                                                        </div>
                                                                    </div>

                                                                    <!-- New Interest Section with Condition -->
                                                                    <div class="w-full mt-6">
                                                                        <h3 class="text-lg font-bold">Interest Details</h3>

                                                                        <?php if ($customer_info['include_interest'] == 1 && $customer_info['days_late'] > 0) { ?>
                                                                            <table class="w-full border-collapse border border-gray-300 mt-2 text-center">
                                                                                <thead>
                                                                                    <tr class="bg-gray-200">
                                                                                        <th class="border border-gray-300 px-3 py-2">Interest Rate</th>
                                                                                        <th class="border border-gray-300 px-3 py-2">Last Due Date</th>
                                                                                        <th class="border border-gray-300 px-3 py-2">Interest Days</th>
                                                                                        <th class="border border-gray-300 px-3 py-2">Days Overdue</th>
                                                                                        <th class="border border-gray-300 px-3 py-2">Interest Amount</th>
                                                                                        <th class="border border-gray-300 px-3 py-2">Total with Interest</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td class="border border-gray-300 px-3 py-2"><?= $customer_info['interest_rate'] ?>% per year</td>
                                                                                        <td class="border border-gray-300 px-3 py-2"><?= $customer_info['last_due_date'] ?></td>
                                                                                        <td class="border border-gray-300 px-3 py-2"><?= $customer_info['interest_days'] ?> days</td>
                                                                                        <td class="border border-gray-300 px-3 py-2"><?= $customer_info['days_late'] ?> days</td>
                                                                                        <td class="border border-gray-300 px-3 py-2">₹<?= number_format($customer_info['interest_amount'], 2) ?>/-</td>
                                                                                        <td class="border border-gray-300 px-3 py-2">₹<?= number_format($customer_info['grand_total_with_interest'], 2) ?>/-</td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        <?php } else { ?>
                                                                            <p class="text-red-500 text-sm mt-2">This customer does not have any interest applied.</p>
                                                                        <?php } ?>
                                                                    </div>

                                                                    <!-- End Interest Section -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                    </div>
                        <?php
                                                }
                                            }
                                        } else {
                                            echo "<tr><td colspan='9'>No data found</td></tr>";
                                        }
                        ?>
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
    window.onclick = function(event) {
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
    window.onclick = function(event) {
        var modal = document.getElementById(`payModal${invoice_no}`);
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



    function interestModal(invoice_no) {
        var modal = document.getElementById(`interestModal${invoice_no}`);
        var modalLabel = document.getElementById("interestModalLabel");
        var modalBody = document.querySelector(".modal-body");

        // Display the modal
        modal.style.display = "block";


    }

    // Function to close modal
    function closeinterestModal(invoice_no) {
        var modal = document.getElementById(`interestModal${invoice_no}`);
        modal.style.display = "none";
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        var modal = document.getElementById("interestModal");
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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Customer Leger");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "customer_leger.xlsx");
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
        pdf.save('customer_leger.pdf');
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

</html>