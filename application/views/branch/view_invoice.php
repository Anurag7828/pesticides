<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="YashAdmin, sales Admin Dashboard, Tailwind CSS Template, Web Application, sales Management, Responsive Design, User Experience, Customizable, Modern UI, Dashboard Template, Admin Panel, Tailwind CSS, HTML5, CSS3, JavaScript, Analytics, Products, Admin Template, UI Kit, CRM, Analytics, Responsive Dashboard, responsive admin dashboard, sales dashboard, ui kit, web app, Admin Dashboard, Template, Admin, CMS pages, Authentication, FrontEnd Integration, Web Application UI, Tailwind CSS Framework, User Interface Kit, Financial Dashboard, Customizable Template, Product Management, HTML5/CSS3, CRM Dashboard, Analytics Dashboard, Admin Dashboard UI, Mobile-Friendly Design, UI Components, Dashboard Widgets, Dashboard Framework, Data Visualization, User Experience (UX), Dashboard Widgets, Real-time Analytics, Cross-Browser Compatibility, Interactive Charts, Product Processing, Performance Optimization, Multi-Purpose Template, Efficient Admin Tools, Task Management, Modern Web Technologies, Product Tracking, Responsive Tables, Dashboard Widgets, Invoice Management, Access Control, Modular Design, Product History, Trend Analysis, User-Friendly Interface">
    <meta name="description" content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">

    <meta property="og:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
    <meta property="og:description" content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
    <meta property="og:image" content="../social-image.png">

    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
    <meta name="twitter:description" content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
    <meta name="twitter:image" content="../social-image.png">
    <meta name="twitter:card" content="summary_large_image">

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "includes2/header-links.php" ?>
<!-- Bootstrap CSS -->

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
                <div class="row dz-tab-area">
                    <div class="flex justify-between items-center mb-5">
                        <a href="<?= base_url('Branch_Dashboard/add_invoice/' . encryptId($user['0']['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">+ add Invoice</a><br>
                        <a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
  PDF
</a>
                    </div>
                    <div class="flex items-center">
                        <h3 style="font-size: 25px; margin: 10px;color: #454592;">View Invoice list</h3>
                        <ul class="nav nav-pills mix-chart-tab user-m-tabe flex flex-wrap">
                            <li class="nav-item">
                                <button class="nav-link py-[3px] px-2 mx-1 rounded text-[13px] block tab-btn active" data-tab="pills-colm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24  24" version="1.1" class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z" fill="var(--dark)" />
                                            <path d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z" fill="var(--dark)" opacity="0.3" />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                        </ul>
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
                                                      <th class="bg-primary-light text-[13px] py-2.5 px-4 text-primary capitalize border-b border-b-color font-medium bg-none whitespace-nowrap text-left">S No.</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Invoice No.</th>            
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Customer Name</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Product<br>Quantity</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Grand Total<br>Amount</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Paid Amount</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Due Amount</th>
                                                 <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Status</th>
                                                    <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php  $serial = 1; 
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
                                                            <tr>
                                                                 <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $serial++ ?></td>
            
           
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $u[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?></td>
                                                                
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color address-wrap"><?= $customer_info['customer_name'] ?></td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $customer_info['product_count'] ?>
                                                                <br>
                                    <?php if($customer_info['stat']) { 
                                       $this->db->select_sum('return_quantity');
                                            $this->db->where('invoice_no',$customer_info['invoice_no']);
                                             $this->db->where('user_id',$user['0']['user_id']);
                                           $query = $this->db->get('invoice'); // Replace 'purchase_product' with the correct table name
    
    $total_return_quantity = ($query->num_rows() > 0) ? $query->row()->return_quantity : 0; ?>
                                                               <a href="<?= base_url('Branch_Dashboard/view_return_invoice/'.encryptId($user['0']['id'])) ?>"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light"><?= $total_return_quantity?> Return Product</span></a>
                                                                                  <?php } else { ?>
                                                                                  <?= "" ?>
                                                                                  <?php } ?></td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= number_format((float)$customer_info['final_total'], 2) ?></td>
                                                                     <?php
                              $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'id','DESC','1');
                                                          $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'paid');?>
                              <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= number_format((float)$paymentsum[0]['total_sum'], 2) ?></td>
                                                                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"> ₹ <?= number_format((float)$payment[0]['due'], 2) ?></td>
                                                                
                                                                <?php if($paymentsum[0]['total_sum']< $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0){ ?>
                                                                     <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-warning bg-warning-light">partial</span></td>
                                                                        <?php  } elseif($paymentsum[0]['total_sum'] = $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0){ ?>
                                                                        <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-success bg-success-light dark:text-white dark:bg-[#3a9b941a]">Complete</span></td>
                                                                        <?php } elseif($paymentsum[0]['total_sum'] > $payment[0]['total']  && $paymentsum[0]['total_sum'] !=0){?>
<td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-primary bg-primary-light light border border-primary-light-3 dark:border-transparent">Advance</span>
					</td>
                                                                      <?php  } else { ?>
                                                                      <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color"><span class="text-xs py-[5px] px-3 rounded leading-[1.5] inline-block text-danger bg-danger-light">pending</span></td>
                                                                      <?php } ?>
                                                            
                                                              <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-right text-body-color">
						<div class="dropdown">
							<button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp" data-dz-dropdown="dropdown-<?= $customer_info['invoice_no'] ?>">
								<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
							</button>
							<div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-<?= $customer_info['invoice_no'] ?>">
							    							<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Branch_Dashboard/print_invoice/'.encryptId($user['0']['id']) .'/' .$customer_info['invoice_no']); ?>">View Invoice</a>

								<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Branch_Dashboard/edit_invoice?user_id=' . $user['0']['id'] . '&invoice_no=' . $customer_info['invoice_no']); ?>">Edit</a>
<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);" onclick="openModal('<?= $customer_info['invoice_no'] ?>')">View Payment</a>

<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);" onclick="dueModal('<?= $customer_info['invoice_no'] ?>')">Pay Due Payment</a>


								<!--<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Branch_Dashboard/invoice/' . encryptId($user[0]['id']) . '?id=' . $customer_info['invoice_no']); ?>" onclick="return confirm('Are you sure you want to delete this invoice?')">Delete</a>-->
								<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Branch_Dashboard/return_invoice?user_id=' . $user['0']['id'] . '&invoice_no=' . $customer_info['invoice_no']); ?>" onclick="return confirm('Are you sure you want to Return This Invoice?')">Return Invoice</a>
							</div>
						</div>
						
					</td>
					    <!-- Modal -->

                                                            </tr>
                                                            
                                                <?php
                                                        }
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>No data found</td></tr>";
                                                }
                                                ?>
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
<div id="paymentModal<?= $customer_info['invoice_no'] ?>" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-modal-close" onclick="closeModal('<?= $customer_info['invoice_no'] ?>')">&times;</span>
    <h2 id="paymentModalLabel">Payment Details</h2>
    <div class="modal-body">
       <div class="row mb-12">
                              
									<div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
										<!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                        <?php
                            $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $customer_info['c_id'],'user_id',$user['0']['user_id']);
                          ?>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Customer Name:</strong> <?= $customer[0]['name'] ?></div>
                                       
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Invoice  No.:</strong> <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?></div>
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Date:</strong> <?= $customer_info['bill_date'] ?></div>
                                             
									</div>
                                 	<div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
										<!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                        <?php
                             $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'id','DESC','1');
                                                          $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'paid');
                          ?>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Total Amount:</strong> ₹ <?= $payment[0]['total'] ?>/-</div>
                                       
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Paid Amount:</strong> ₹ <?= $paymentsum[0]['total_sum'] ?>/-</div>
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Due Amount:</strong> ₹ <?= $payment[0]['due'] ?>/-</div>
                                             
									</div>
									     
                           
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">#</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Payment Date</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Paid Amount</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left right text-dark">Payment Mode</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">Bank/Cheque</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-right text-dark">Received by</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                            $paymentall = $this->CommonModal->getRowByMultitpleId('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'user_id',$user['0']['user_id']);
                            $i=0;
                            if (!empty($paymentall)) {  // Missing closing parenthesis fixed here
                                foreach ($paymentall as $row) { $i++;
                    ?>
                                            <tr>
                               
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $i ?></td>
                                               
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"><?= $row['date']?></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left">₹<?= $row['paid']?>/-</td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color right"><?= $row['mode']?> </td>
                                              <?php  if($row['bank']) {
                                                  $bank = $this->CommonModal->getRowByMultitpleId('account', 'id',  $row['bank'],'user_id',$user['0']['user_id']);?>
                                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $bank[0]['bank_name']?></td>
                                                                       <?php } elseif($row['cheque_no']) {
                                                                                            ?>
                                                                                             <td
                                                                                                class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center">
                                                                                                <?= $row['cheque_no'] ?></td>
                                             <?php }else{
                                              ?>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $row['mode']?></td>
                                                <?php }  if($row['branch_id']){?>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">By Own</td>
                                            <?php } else {?>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">By Admin</td>

                                                <?php } ?>
                                            </tr>
                                           <?php } } ?>
                                        
                                        </tbody>
                                    </table>

    </div>
  </div>
</div>
</div>
<div id="payModal<?= $customer_info['invoice_no'] ?>" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-modal-close" onclick="closeM('<?= $customer_info['invoice_no'] ?>')">&times;</span>
    <h2 id="payModalLabel">Pay Due Payment</h2>
    <div class="modal-body">
       <div class="row mb-12">
                              
									<div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
										<!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                        <?php
                            $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $customer_info['c_id'],'user_id',$user['0']['user_id']);
                          ?>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Customer Name:</strong> <?= $customer[0]['name'] ?></div>
                                       
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Invoice  No.:</strong> <?= $user[0]['prefix'] ?>-<?= $customer_info['invoice_no'] ?></div>
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Date:</strong> <?= $customer_info['bill_date'] ?></div>
                                             
									</div>
                                   	<div class="mt-6 lg:w-1/2 md:w-1/2 w-full detail">
										<!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                        <?php
                             $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'id','DESC','1');
                                                          $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no',  $customer_info['invoice_no'],'user_id',$user['0']['user_id'],'paid');
                          ?>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Total Amount:</strong> ₹ <?= $payment[0]['total'] ?>/-</div>
                                       
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Paid Amount:</strong> ₹ <?= $paymentsum[0]['total_sum'] ?>/-</div>
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Due Amount:</strong> ₹ <?= $payment[0]['due'] ?>/-</div>
                                             
									</div>
										<form class="profile-form" action="<?= base_url('Branch_Dashboard/add_payment/' . encryptId($user['0']['id'])) ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
								
                                                            <div class="row">
                                                                  <div class="sm:w-1/2 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
																		<input type="date"  id="paymentDate<?= $customer_info['invoice_no']?>" name="date" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"   >
																	</div>
															<div class="sm:w-1/2 w-full mb-[30px]">
																<label class="text-dark dark:text-white text-[13px] mb-2">Paid Amount</label>
																<input type="number"  name="paid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $payment[0]['due'] ?>"  max="<?= $payment[0]['due'] ?>"  id="paidAmount<?= $customer_info['invoice_no'] ?>" oninput="validatePaidAmount('<?= $customer_info['invoice_no'] ?>')">
																		<input type="hidden"  name="due" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $payment[0]['due'] ?>">
															<input type="hidden"  name="invoice_no" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $customer_info['invoice_no']?>">
																<input type="hidden"  name="branch_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $user['0']['id']?>">
																<input type="hidden"  name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $user['0']['user_id']?>">
																<input type="hidden"  name="total" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value=" <?= $payment[0]['total'] ?>">
																<input type="hidden"  name="customer_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="paid amount" value="<?= $customer_info['c_id']?>">
															</div>
                                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Payment Mode</label>
																		<select name="mode" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="paymentMode<?= $customer_info['invoice_no']?>" required>
                                                                        <option value="">--SELECT--</option> 
                                                        <option value="Cash">CASH</option>
                                                        <option value="Upi">UPI</option>
                                                        <option value="Card">CREADIT/DEBIT CARD</option>
                                                          <option value="Cheque">Cheque</option>
                                                        <option value="Bank">Bank Transfer</option>
                                                    

    </select>
															</div>
                                                            <div class="sm:w-1/2 w-full mb-[30px]"  id="bankDetails<?= $customer_info['invoice_no']?>" style="display:none;">
                                                            <label class="text-dark dark:text-white text-[13px] mb-2">Account</label>
																		<select name="bank" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " id="bankAccount<?= $customer_info['invoice_no']?>">
                                                                        <option value="">--SELECT--</option>
                                                                        <?php 
                                                        
                                                                              $account = $this->CommonModal->getRowByMultitpleId('account','user_id',$user['0']['user_id']);
                                                                        foreach ($account as $account_info) { ?>
                                                        <option value="<?= $account_info['id']?>"><?= $account_info['bank_name']?>-<?= $account_info['account_no']?></option>
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
                                                                                       id="cheque<?= $customer_info['invoice_no'] ?>" >
                                                                                </div>
                                                            </div>
														</div>
														<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
															<button type="submit" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Pay</button>
														</div>
													</div>
							</form>
							<script>
							                                                                    document.getElementById('paymentMode<?= $customer_info['invoice_no'] ?>').addEventListener('change', function () {
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
        document.addEventListener("DOMContentLoaded", function () {
        var today = new Date();
        var year = today.getFullYear();
        var month = (today.getMonth() + 1).toString().padStart(2, '0');
        var day = today.getDate().toString().padStart(2, '0');
        var currentDate = `${year}-${month}-${day}`;
        document.getElementById('paymentDate<?= $customer_info['invoice_no']?>').value = currentDate;
    });
     document.getElementById('paymentMode<?= $customer_info['invoice_no'] ?>').addEventListener('change', function () {
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
   


    <?php include "includes2/footer-links.php" ?>
    </div>
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

</script>
	<script>
function exportTableToExcel() {
    // Select the table element
    var table = document.querySelector("#user-tbl"); // Replace with your table's ID

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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Invoice list");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "Invoice_list.xlsx");
}

function exportTableAsPDF() {
    // Check if jsPDF is available
    const { jsPDF } = window.jspdf;
    if (!jsPDF) {
        console.error("jsPDF not loaded");
        return;
    }

    const pdf = new jsPDF('p', 'mm', 'a4');
    const table = document.getElementById('user-tbl');

    // Capture the table as an image
    html2canvas(table, { scale: 2 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        // Add the image to PDF and adjust size
        pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
        
        // Download the PDF
        pdf.save('Invoice_list.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}

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