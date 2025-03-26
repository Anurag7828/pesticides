<!DOCTYPE html>
<html lang="en">

<head>

	<?php include "includes2/header-links.php" ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
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
                                    action="<?= base_url('admin_Dashboard/sales_tax_report/' . encryptId($user['0']['id'])) ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-5 p-4">
                                        <div class="row">
                                       
										<div class="sm:w-1/4 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select Customer</label>
											<select name="customer_name" id="customer-name"class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select Customer</option>
												<?php foreach ($customer_list as $customer_info) { ?>
													<option value="<?= $customer_info['id']; ?>" <?= ($customer_info['name'] == $customer['0']['name']) ? 'selected' : ''; ?>>
														<?= $customer_info['name']; ?>-	<?= $customer_info['contact']; ?>
													</option>
												<?php } ?>
												
											</select>
										
											<input type="hidden" name="user_id" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['id'] ?>">

										</div>
                                            <div class="sm:w-1/4 w-full ">
                                                <label class="text-dark dark:text-white text-[13px] mb-2">From</label>
                                                <input type="date" name="from"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                    value="<?= $start ?>">
                                            </div>
                                            <div class="sm:w-1/4 w-full ">
                                                <label class="text-dark dark:text-white text-[13px] mb-2">TO</label>
                                                <input type="date" name="to"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                    value="<?= $end ?>">
                                            </div>

                                            <div class="xl:w-1/4 sm:w-1/2 w-full self-end">
                                                <button
                                                    class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-white bg-primary leading-5 inline-block border border-primary btn-primary light hover:bg-primary btn-primary"
                                                    title="Click here to Search" type="submit"><i
                                                        class="fa-sharp fa-solid fa-filter mr-1"></i>Filter</button>
                                                <a
                                                    href="<?= base_url('Admin_Dashboard/sales_tax_report/' . encryptId($user['0']['id'])) ?>"><button
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
				</div>
                <div class="xl:w-1 col-xxl-12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 pb-0 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Tax Report</h4>
                             
							</div>
							<div class="sm:pt-5 pt-4 flex-auto dz-tab-area">
								<ul class="nav nav-tabs nav-pills success-tab px-5 mb-5 flex flex-wrap" id="pills-tab" role="tablist">
								
								  <li class="nav-item" role="presentation">
									<button class="nav-link rounded-md px-[15px] py-[5px] text-[13px] active block tab-btn" data-tab="pills-sale" type="button" role="tab"  aria-selected="false">
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
									
								<div class="tab-content show active" id="pills-sale">
                                <div class="card-header flex justify-between sm:pt-0 pb-0 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Sales Tax Report</h4>
                             
							
                                      <div class="flex justify-right items-right mb-5">
                     
                     <a href="#" onclick="exportTableToExcel2()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
 Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF2()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
PDF
</a>
                 </div>
                 </div>
									<div class="overflow-x-auto">
   <table class="table mb-4 w-full card-table border-no success-tbl" id="u-tbl2">
   <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Stock place</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Invoice No</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Sales Date</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Customer name</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">No. of<br> Product</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Tax percentage</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Tax Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>

            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Add by</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $serial = 1; 
            $totalAmount = 0; 
            $totaltax = 0; 
            $totaltaxamount = 0;

            foreach ($invoice as $product): 
                $totalAmount += $product['final_total'];
                $place = $this->CommonModal->getRowByMultitpleId('stock_place', 'id', $product['stock_place'], 'user_id', $user[0]['id']);
                $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $product['customer_name'], 'user_id', $user[0]['id']);

                $totaltax += $user[0]['tax'];
                $totaltaxamount += $product['tax_amount'];
        ?>
        <tr>
            <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $place[0]['place_name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-dark dark:text-white text-xs font-medium"><?= $user[0]['prefix'] ?>-<?= $product['invoice_no'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $customer[0]['name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $product['p_name_count'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $user[0]['tax'] ?> %</td>

            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['tax_amount'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['final_total'] ?></td>

            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">
                <?= $product['branch_id'] != 0 
                    ? $this->CommonModal->getRowByMultitpleId('branch', 'id', $product['branch_id'], 'user_id', $user[0]['id'])[0]['name'] 
                    : 'Admin'; ?>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tbody>
        <tr>
            <td colspan="6" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total :-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"> <?= $totaltax ?> % /-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totaltaxamount ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount ?> /-</td>
       
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>
        </tr>
    </tbody>
</table>

</div>
</div>
								 <div class="tab-content" id="pills-all1">
                                 <div class="card-header flex justify-between sm:pt-0 pb-0 py-5 sm:px-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Return Sales Tax Report</h4>
                             
							
                                      <div class="flex justify-right items-right mb-5">
                     
                     <a href="#" onclick="exportTableToExcel3()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
 Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF3()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
PDF
</a>
                 </div>
                 </div>
									<div class="overflow-x-auto">
     <table class="table mb-4 w-full card-table border-no success-tbl" id="u-tbl3">
     <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Stock place</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Invoice No</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Date</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Customer name</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">No. of<br> Product</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Tax Percentage</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Tax Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>

            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Add by</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $serial = 1; 
            $totalAmount1 = 0; 
            $totaltax1 = 0; 
            $totaltaxamount2 = 0;

            foreach ($invoicess_r as $product): 
                $totalAmount1 += $product['final_total'];
                $place = $this->CommonModal->getRowByMultitpleId('stock_place', 'id', $product['stock_place'], 'user_id', $user[0]['id']);
                $customer = $this->CommonModal->getRowByMultitpleId('customer', 'id', $product['customer_name'], 'user_id', $user[0]['id']);
                $totaltax1 += $user[0]['tax'];
                $totaltaxamount2 += $product['tax_amount'];
        ?>
        <tr>
            <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $place[0]['place_name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-dark dark:text-white text-xs font-medium"><?= $user[0]['returne_code'] ?>-<?= $product['return_invoice_no'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $customer[0]['name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $product['p_name_count'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"> <?= $user[0]['tax'] ?> %</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['tax_amount']  ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['final_total'] ?></td>
          
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">
                <?= $product['branch_id'] != 0 
                    ? $this->CommonModal->getRowByMultitpleId('branch', 'id', $product['branch_id'], 'user_id', $user[0]['id'])[0]['name'] 
                    : 'Admin'; ?>
            </td>
           
        </tr>
        <?php endforeach; ?>
        </tbody>
        <tbody>
        <tr>
            <td colspan="6" class="py-[0.7375rem] p-2.5 whitespace-nowrap text-right font-medium uppercase text-[13px] text-primary border-t border-t-color">Total :-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"> <?= $totaltax1 ?> % /-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totaltaxamount2 ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount1 ?> /-</td>
       
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color"></td>
        </tr>
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
		<?php include "includes2/footer-links.php" ?>
	
	<?php include "includes2/footer.php" ?>
    <script>
    $(document).ready(function() {
        $('#us-tbl2').DataTable({
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
 
  
function exportTableAsPDF2() {
    // Check if jsPDF is available
    const { jsPDF } = window.jspdf;
    if (!jsPDF) {
        console.error("jsPDF not loaded");
        return;
    }

    const pdf = new jsPDF('p', 'mm', 'a4');
    const table = document.getElementById('u-tbl2');
    

    // Capture the table as an image
    html2canvas(table, { scale: 2 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        // Add the image to PDF and adjust size
        pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
        
        // Download the PDF
        pdf.save('sales_tax_report.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}
function exportTableToExcel2() {
    // Select the table element
    var  table = document.getElementById('u-tbl2'); // Replace with your table's ID

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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Expense Report");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "sales_tax_report.xlsx");
}
function exportTableAsPDF3() {
    // Check if jsPDF is available
    const { jsPDF } = window.jspdf;
    if (!jsPDF) {
        console.error("jsPDF not loaded");
        return;
    }

    const pdf = new jsPDF('p', 'mm', 'a4');
    const table = document.getElementById('u-tbl3');
    

    // Capture the table as an image
    html2canvas(table, { scale: 2 }).then((canvas) => {
        const imgData = canvas.toDataURL('image/png');
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

        // Add the image to PDF and adjust size
        pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);
        
        // Download the PDF
        pdf.save('return_sales_tax_report.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}

function exportTableToExcel3() {
    // Select the table element
    var  table = document.getElementById('u-tbl3'); // Replace with your table's ID

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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Expense Report");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "return_sales_tax_report.xlsx");
}

</script>
</body>
</html>
