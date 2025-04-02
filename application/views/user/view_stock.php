<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>

	<?php include "includes2/header-links.php" ?>
<style>
    .address-wrap {
    word-break: break-word; 
    overflow-wrap: break-word;
 
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
			    	<div class="row dz-tab-area">
					<div class="flex justify-between items-center mb-5">
                   
                    	<a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>

<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
  PDF
</a></div>
                    <div class="flex items-center">
							<h3 style="font-size: 25px; margin: 10px;color: #454592;">View Stock list</h3>
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
				<div class="row dz-tab-area">
<!--					<div class="flex justify-between items-center mb-5">-->
                    <!--<a href="<?= base_url('admin_Dashboard/add_stock/'.encryptId($user['0']['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">+ add stock</a><br></div>-->
<!--                    <div class="flex items-center">-->
<!--							<h3 style="font-size: 25px; margin: 10px;color: #454592;">View stock list</h3>-->
<!--								<a href="<?= base_url('admin_Dashboard/add_branch/'.encryptId($user['0']['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">+ Add User</a>-->
						 <!-- New Export to Excel Button -->
<!--   <a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">-->
<!--    Export to Excel-->
<!--</a>-->
<!--	<a href="#" onclick="exportTableAsPDF()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">-->
<!--  PDF-->
<!--</a>-->
<!--						</div>-->
<!--					</div>-->
							<div class="row">
					
					<div class="xl:w-6/4 lg:w-4/3">
						<div class="card flex flex-col max-sm:mb-[30px] profile-card">
							<div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
	<!-- Product Dropdown in the Row -->			<div class="row product-row">
																	<div class="sm:w-1/2 w-full mb-[30px]">
																		<label class="text-dark dark:text-white text-[13px] mb-2">Search By Stock Place</label>
																		<select name="p_name[]" id="stock_place" name="stock_place" onchange="filterProducts()" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " >
																			<option selected>Search by Stock Place</option>
																		 <?php foreach ($stock_place as $stock_place_info) : ?>
            <option value="<?= $stock_place_info['id']; ?>"><?= $stock_place_info['place_name']; ?></option>
        <?php endforeach; ?>
																		</select>
								</div>

	<div class="sm:w-1/2 w-full mb-[30px]">
    <label for="product" class="text-dark dark:text-white text-[13px] mb-2">Search By Product</label>
    <select id="product" name="product" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " >
        <option value="all">Search by Products</option>
        						 <?php foreach ($product as $product_info) : ?>
            <option value="<?= $product_info['id']; ?>"><?= $product_info['product_name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>
							</div>
					</div>
					</div>
				</div>
					<div class="w-full active-p">
						<div class="tab-content-area">
							<div class="tab-content show active" id="pills-colm">
								<div class="card">
									<div class="sm:py-5 py-4">
										<div class="overflow-x-auto active-projects user-tbl ItemsCheckboxSec dt-filter">
										<?php if ($msg = $this->session->flashdata('msg')): ?>
                            <?php $msg_class = $this->session->flashdata('msg_class'); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert <?= $msg_class; ?>">
                                        <?= $msg; ?>
                                    </div>
                                </div>
                            </div>
                            <?php $this->session->unset_userdata('msg'); ?>
                        <?php endif; ?>

										<table id="user-tbl" class="table">
    <thead>
        <tr>
              <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">S No.</th>
       
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Stock Place Name</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">product_name</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Net Quantity</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Total<br> Quantity</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Return<br> Quantity</th>
              <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Selling <br> Quantity</th>
<th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Transfer <br> Quantity</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Available <br>Quantity</th>

            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Expired Date</th>
            <th class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">Action</th>

        </tr>
    </thead>
	<tbody>
    <?php $serial = 1; 
    if (!empty($stock)) : ?>
        <?php   $serial = 1;  foreach ($stock as $stock_info) : ?>
            <?php
            // Fetch the service name based on the category_id
            $stock_place_name = '';
            foreach ($stock_place as $stock_place_info) {
                if ($stock_place_info['id'] == $stock_info['stock_place_name']) {
                    $stock_place_name = $stock_place_info['place_name'];
                    break;
                }
            }
           // Fetch the product name based on the product_id
           $product_name = '';
           foreach ($product_list as $product_list_info) {
               if ($product_list_info['id'] == $stock_info['product_name']) {
                   $product_name = $product_list_info['product_name'];
                   $product_id = $product_list_info['product_id'];
                   $product_packing = $product_list_info['packing'];
                   $product_net_unit = $product_list_info['net_unit'];
                   $product_unit = $product_list_info['unit'];


                   break;
               }
           }
           ?>
            <tr>
            <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $serial++ ?></td>
            
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color  break-all"><?= $stock_place_name ?: 'Not Found'; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color address-wrap">
    <?= ($product_id && $product_name && $product_unit) 
        ? $product_id . ' - ' . $product_name 
        : 'Not Found'; 
    ?>
</td>

                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $product_packing  ?> <?=  $product_net_unit; ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
    <?= $stock_info['quantity']; ?>
    <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['box_product_quantity']; ?> - Single
    <?php } else { ?>
        - Single
    <?php } ?>
</td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['return_quantity']; ?>  <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_return_quantity']; ?> - Single
    
    <?php } ?></td>
                  <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['selling_quantity']; ?>
                  <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_selling_quantity']; ?> - Single

    <?php } ?></td>
               <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['transfer_quantity']; ?>
               <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_transfer_quantity']; ?> - Single
   
    <?php } ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= $stock_info['availabile_quantity']; ?>
                <?php if ($stock_info['box'] == '1') { ?>
        - Box  ,<br><?= $stock_info['per_product_available_quantity']; ?> - Single
  
    <?php } ?></td>

                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap"><?= date('d-m-y', strtotime($stock_info['exp_date'])) ?></td>
                <td class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                     <div class="button-container">
                    <!--<a class="button" href="<?= base_url('Admin_Dashboard/edit_stock?id=' . $stock_info['s_id'] . '&user_id=' . $user[0]['id']); ?>">Edit</a>-->
                    <a class="button" href="<?= base_url('Admin_Dashboard/edit_stock?id=' . $stock_info['p_id'] . '&user_id=' . $user[0]['id']); ?>" onclick="return confirm('Are you sure you want to replace stock place?')">Transfer stock</a>
                    </div>
                </td> 
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- <tr><td colspan="9">No data found</td></tr> -->
    <?php endif; ?>
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
	</div>
	<?php include "includes2/footer.php" ?>
</body>
</html>
<script>
function filterProducts() {
    var stockPlaceId = document.getElementById('stock_place').value;

    // Fetch products for the selected stock place
    if (stockPlaceId) {
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
            type: 'POST',
            data: { stock_place_id: stockPlaceId },
            dataType: 'json',
            success: function(products) {
                // Clear existing options before appending new ones
                $('#product').empty().append('<option value="all">Select Products</option>');

                // Loop through the products and add them as options
                products.forEach(function(product) {
                    $('#product').append('<option value="' + product.pro_id + '">' + product.product_name + '</option>');
                });
            }
        });
    }
}

function filterTable(stockPlaceId) {
    // Make AJAX call to fetch filtered stock data based on stockPlaceId
    $.ajax({
        url: '<?= base_url("Admin_Dashboard/stock/" . encryptId($user[0]['id'])) ?>', // Correct URL
        type: 'POST',
        data: { stock_place_id: stockPlaceId },
        success: function(response) {
            // Update the table body with the filtered stock data
            $('#user-tbl tbody').html(response);
        }
    });
}

function filterTablep(stockPlaceId, productId) {
    // Make AJAX call to fetch filtered stock data based on both stockPlaceId and productId
    $.ajax({
        url: '<?= base_url("Admin_Dashboard/stock/" . encryptId($user[0]['id'])) ?>', // Correct URL
        type: 'POST',
        data: { stock_place_id: stockPlaceId, product_id: productId },
        success: function(response) {
            // Update the table body with the filtered stock data
            $('#user-tbl tbody').html(response);
        }
    });
}

// Trigger filtering when the stock place is selected
$('#stock_place').on('change', function() {
    var stockPlaceId = $(this).val(); // Get the selected stock place ID
    filterProducts(); // Populate the product dropdown
    filterTable(stockPlaceId); // Filter the table based on selected stock place
});

// Trigger filtering when the product is selected
$('#product').on('change', function() {
    var stockPlaceId = $('#stock_place').val(); // Get the selected stock place ID
    var productId = $(this).val(); // Get the selected product ID

    if (stockPlaceId && productId) {
        filterTablep(stockPlaceId, productId); // Filter the table based on selected stock place and product
    }
});
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
    XLSX.utils.book_append_sheet(workbook, worksheet, "Stock List");

    // Generate Excel file and download
    XLSX.writeFile(workbook, "Stock_List.xlsx");
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
        pdf.save('Stock_List.pdf');
    }).catch((error) => {
        console.error("Error generating PDF:", error);
    });
}

	</script>
