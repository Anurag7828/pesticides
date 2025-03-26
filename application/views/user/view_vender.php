<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

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
  max-width: 720px;
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
                    <a href="<?= base_url('admin_Dashboard/add_vender/'.encryptId($user['0']['id']).'/0') ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">+ add Vender</a><br>
                    	<a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
  PDF
</a>  </div>
                    <div class="flex items-center">
							<h3 style="font-size: 25px; margin: 10px;color: #454592;">View Vender list</h3>
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
             <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">S No.</th>
       
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Vendor Name</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Contact</th>

            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">GST NO.</th>
            
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Contact <br> Person Name</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Person Contact</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Totoal<br> Amount</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total<br>Paid Amount</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total<br>Due Amount</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Add By</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php   $serial = 1; 
        if (!empty($vender)) {
            foreach ($vender as $vender_info) {
        ?>
            <tr>
                 <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $serial++ ?></td>
            
           
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color address-wrap"><?= $vender_info['vender_name'] ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $vender_info['mobile'] ?></td>
   
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $vender_info['gst_no'] ?></td>

                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $vender_info['contact_person'] ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $vender_info['person_contact'] ?></td>
                   <?php  $paymentpaid = $this->CommonModal->getRowByIdSum('purchase_payment', 'vender_id',  $vender_info['id'],'user_id',$user[0]['id'],'paid');
                                                           $paymenttotal = $this->CommonModal->getRowByIdSumDue('purchase_payment', 'vender_id',  $vender_info['id'],'user_id',$user[0]['id'],'total','purchase_code' );
                                                 $payment =  $this->CommonModal->getRowByIdSumDue(
    'purchase_payment',  
    'vender_id',               // Vender column
    $vender_info['id'],       // Vender ID
    'user_id',                // User column
    $user[0]['id'],           // User ID
    'due',                    // Column to sum (due)
    'purchase_code'           // Column to group by (purchase_code)
);  ?>
                                                            <?php if($paymenttotal){ ?>
                                                              <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= $paymenttotal?>/-</td>
                                                              <?php } else { ?>
                                                               <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ 0/-</td>
                                                               <?php } ?>
                                                                 <?php if( $paymentpaid[0]['total_sum']){ ?>
                                                            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ <?= $paymentpaid[0]['total_sum'] ?>/-</td>
                                                              <?php } else { ?>
                                                               <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">₹ 0/-</td>
                                                               <?php } ?>
                                                                <?php if ($payment ) { ?>
    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
        ₹ <?= $payment ?> /-
    </td>
<?php } else { ?>
    <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
        ₹ 0 /-
    </td>
<?php } 
 if( $vender_info['branch_id'] != 0){ 
                                                                        $branch = $this->CommonModal->getRowByMultitpleId('branch', 'id', $vender_info['branch_id'] ,'user_id',$user[0]['id']);?>
                                                                      <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"> <?= $branch[0]['name'] ?></td>
                                                                      <?php } else{
                                                                      ?>
                                                                           <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">Admin</td>
                                                                            <?php } 
                                                                      ?>
                                                         
                                                              
                                                             <td class="py-[0.9375rem] px-2.5 capitalize whitespace-nowrap sm:text-sm text-xs font-normal border-t border-[#E6E6E6] dark:border-[#ffffff1a] text-left text-body-color">
                <div class="dropdown">
                    <button type="button" class="btn min-w-[2.4rem] p-[0.4375rem] h-[2.4rem] leading-[1.7] min-h-[2.5rem] btn-primary rounded-md dz-dropdown bg-primary-light hover:bg-primary duration-300 light sharp" data-dz-dropdown="dropdown-<?= $vender_info['id']?>">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                <circle fill="#000000" cx="19" cy="12" r="2" />
                            </g>
                        </svg>
                    </button>
                    <div class="dz-dropdown-menu dropdown-menu-end border py-2 rounded-md min-w-[10rem] z-[9] translate-x-[-96px] translate-y-1 shadow-[0_0_3.125rem_0_rgba(82,63,105,0.15)] overflow-hidden border-b-color absolute bg-white dark:bg-[#182237] dark:shadow-[0rem_0rem_0rem_0.0625rem_rgba(255,255,255,0.1)] hidden" id="dropdown-<?= $vender_info['id']?>">
                        
                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Admin_Dashboard/edit_vender?id=' . $vender_info['id']. '&user_id='.$user['0']['id']); ?>">Edit</a>

<a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="javascript:void(0);" onclick="openModal('<?= $vender_info['id'] ?>')">Payment History</a>


                        <a class="dropdown-item py-2 px-5 text-body-color text-[13px] text-left block w-full whitespace-nowrap hover:bg-[#f8f9fa] hover:text-primary dark:hover:bg-[#151C2C]" href="<?= base_url('Admin_Dashboard/vender/' . encryptId($user[0]['id']).'
					?id='.$vender_info['id']); ?>" onclick="return confirm('Are you sure you want to delete this Account Detail?')">Delete</a>
                       
                    </div>
                </div>
            </td>
               
            </tr>
			
        <?php
            }
        } 
        ?>
    </tbody>
</table>
 <?php
        if (!empty($vender)) {
            foreach ($vender as $vender_info) {
        ?>
<div id="paymentModal<?= $vender_info['id'] ?>" class="custom-modal">
  <div class="custom-modal-content">
    <span class="custom-modal-close" onclick="closeModal('<?= $vender_info['id'] ?>')">&times;</span>
    <h2 id="paymentModalLabel">Payment Details</h2>
    <div class="modal-body">
       <div class="row mb-12">
                              
								
                                 
									     
                           
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">#</th>
                                                 <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Purchase</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Payment Date</th>
                                                  <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Total<br> Amount</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Paid <br>Amount</th>
                                                  <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Due <br>Amount</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left right text-dark">Payment<br> Mode</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">Bank<br> Name</th>
                                                <!--<th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-right text-dark">Action</th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                            $paymentall = $this->CommonModal->getRowById('purchase_payment', 'vender_id',  $vender_info['id']);
                            $i=0;
                            if (!empty($paymentall)) {  // Missing closing parenthesis fixed here
                                foreach ($paymentall as $row) { $i++;
                    ?>
                                            <tr>
                               
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $i ?></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"><?= $user[0]['purchase_code'] ?>-<?= $row['purchase_code']?></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"><?= $row['date']?></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left">₹<?= $row['total']?>/-</td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left">₹<?= $row['paid']?>/-</td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color right"><?= $row['due']?> </td>
                                                 <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color right"><?= $row['mode']?> </td>
                                              <?php  if($row['bank']) {
                                                  $bank = $this->CommonModal->getRowById('account', 'id',  $row['bank']);?>
                                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $bank[0]['bank_name']?></td>
                                             <?php }else{
                                              ?>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $row['mode']?></td>
                                                <?php } ?>
                                                <!--<td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">Delete</td>-->
                                            </tr>
                                           <?php } } ?>
                                        
                                        </tbody>
                                    </table>

    </div>
  </div>
</div>


</div>
 <?php
                                                    }
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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Active Branch Users");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "Active_Branch_Users.xlsx");
}


	</script>
		<script>
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
        pdf.save('Branch_Users.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}

	</script>
</html>