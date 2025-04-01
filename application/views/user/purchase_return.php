<!DOCTYPE html>
<html lang="en">

<head>
    
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
                                    action="<?= base_url('admin_Dashboard/purchase_returnn_code/' . encryptId($user['0']['id'])) ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-5 p-4">
                                        <div class="row">
                                        
										<div class="sm:w-1/4 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Select vender</label>
											<select name="vender_name" id="vender-name"class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" required>
												<option value="">Select vender</option>
												<?php foreach ($vender_list as $vender_info) { ?>
													<option value="<?= $vender_info['id']; ?>" <?= ($vender_info['vender_name'] == $vender['0']['vender_name']) ? 'selected' : ''; ?>>
														<?= $vender_info['vender_name']; ?>-<?= $vender_info['mobile']; ?>
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
                                                    href="<?= base_url('Admin_Dashboard/purchase_returnn_code/' . encryptId($user['0']['id'])) ?>"><button
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
								<h4 class="text-base">Purchase Return Report</h4>
                              
							
                            <div class="flex justify-right items-right mb-5">
                     
                        <a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
  PDF
</a>
                    </div>
                    </div>
							<div class="sm:pt-6 pb-0 py-5 sm:px-5 px-4flex-auto dz-tab-area">
								
								      <div class="tabular-nums tab-content-area" id="pills-tabContent">
									  <div class="tab-content show active" id="pills-social">
    <div class="overflow-x-auto">
    <table class="table mb-4 w-full card-table border-no success-tbl" id="u-tbl">
    <thead>
        <tr>
            <th class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">S.No</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Stock place</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Code</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Return Date</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">vender name</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">No. of<br> Product</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Total Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Paid Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Due Amount</th>
            <th class="py-[0.7375rem] p-2.5 whitespace-nowrap uppercase text-[13px] font-medium text-primary border-b border-b-color text-left">Add by</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $serial = 1; 
            $totalAmount = 0; 
            $totalPaid = 0; 
            $totalDue = 0;

            foreach ($purchases as $product): 
                $totalAmount += $product['grand_total'];
                $place = $this->CommonModal->getRowByMultitpleId('stock_place', 'id', $product['stock_place_name'], 'user_id', $user[0]['id']);
                $vender = $this->CommonModal->getRowByMultitpleId('vender', 'id', $product['vender_name'], 'user_id', $user[0]['id']);
                $payment = $this->CommonModal->getRowByIdOrderByLimit('return_purchase_payment', 'return_code', $product['return_code'], 'user_id', $user[0]['id'], 'id', 'DESC', '1');
                $paymentsum = $this->CommonModal->getRowByIdSum('return_purchase_payment', 'return_code', $product['return_code'], 'user_id', $user[0]['id'], 'paid');
                $totalPaid += $paymentsum[0]['total_sum'];
                $totalDue += $payment[0]['due'];
        ?>

<tr onclick="console.log('<?= base_url('Admin_Dashboard/print_return_purchase/' . encryptId($user[0]['id']) . '/' . $product['return_code']); ?>'); 
        window.location='<?= base_url('Admin_Dashboard/print_return_purchase/' . encryptId($user[0]['id']) . '/' . $product['return_code']); ?>';" style="cursor: pointer;">
       
            <td class="sm:pl-[1.275rem] pl-[0.9375rem] py-[0.7375rem] pr-[0.625rem] whitespace-nowrap"><?= $serial++ ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $place[0]['place_name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-dark dark:text-white text-xs font-medium"><?= $user[0]['returne_code'] ?>-<?= $product['return_code'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap"><?= date('d-m-y', strtotime($product['date'])) ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $vender[0]['vender_name'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]"><?= $product['p_name_count'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $product['grand_total'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $paymentsum[0]['total_sum'] ?></td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap text-body-color dark:text-white text-[13px]">₹ <?= $payment[0]['due'] ?></td>
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
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalAmount ?> /-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalPaid ?>/-</td>
            <td class="py-[0.7375rem] p-2.5 whitespace-nowrap border-t border-t-color">₹ <?= $totalDue ?>/-</td>
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
        </div>
        <?php include "includes2/footer-links.php" ?>
        <?php include "includes2/footer.php" ?>
</body>
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