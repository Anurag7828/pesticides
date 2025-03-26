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
							<div class="content-title flex justify-between items-center py-4 sm:px-6 px-[1.2rem] card-toggle-btn">
								<div class="cpa text-dark dark:text-white text-base font-semibold">
									<i class="fa-sharp fa-solid fa-filter mr-2"></i>Filter
								</div>
								<div class="tools">
									<a href="javascript:void(0);" class="expand SlideToolHeader inline-block"><i class="fal fa-angle-down font-['Font_Awesome_6_Free'] font-semibold text-[#c2c2c2] text-xl arrow"></i></a>
								</div>
							</div>
							<div class="content form excerpt border-t border-b-color dark:border-[#ffffff1a]">
                            <form class="profile-form" action="<?= base_url('admin_Dashboard/profit/'.encryptId($user['0']['id'])) ?>" method="post" enctype="multipart/form-data">
								<div class="sm:p-5 p-4">
									<div class="row">
										
                                    <div class="sm:w-1/4 w-full ">
																		<label class="text-dark dark:text-white text-[13px] mb-2">From</label>
																		<input type="date" name="from" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $start?>"  >
																	</div>
                                                                    <div class="sm:w-1/4 w-full ">
																		<label class="text-dark dark:text-white text-[13px] mb-2">TO</label>
																		<input type="date" name="to" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" value="<?= $end?>"   >
																	</div>
                                                                    
										<div class="xl:w-1/4 sm:w-1/2 w-full self-end">
											<button class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-white bg-primary leading-5 inline-block border border-primary btn-primary light hover:bg-primary btn-primary" title="Click here to Search" type="submit"><i class="fa-sharp fa-solid fa-filter mr-1"></i>Filter</button>
											<a href="<?= base_url('Admin_Dashboard/profit/'.encryptId($user['0']['id'])) ?>" ><button class="btn sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 duration-300 sm:text-[15px] text-[13px] font-medium rounded-md text-danger bg-danger-light leading-5 inline-block border border-danger-light btn-danger light hover:text-white hover:bg-danger btn-danger light" title="Click here to remove filter" type="button">Remove Filter</button></a>
										</div>
									</div>
								</div>
                                </form>
							</div>
						</div>
                        <div class="row">
                      <div class="sm:w-1/2">
								<div class="card overflow-hidden">
									<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
										<h4 class="text-base">Gross Margin</h4>
									</div>
									<div class="flex-auto flex justify-between sm:pl-5 pl-4">
										<div>
											<?php 
											$gross_p = $gross_purchase['total_grand_total'] - $gross_purchase_return['total_grand_total'] ;
											$gross_s = $gross_sales['total_grand_total'] - $gross_sales_return['total_grand_total'] ;
											$gross =$gross_s -$gross_p;
											?>
											<h4 class="mb-2"> ₹ <?= $gross ?>/-</h4>
											<br>
										</div>
										<div id="NewCustomers"></div>
									</div>
								</div>
							</div>
							<div class="sm:w-1/2">
								<div class="card">
									<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
										<h4 class="text-base">Net Margin</h4>
									</div>
									<div class="flex-auto flex justify-between sm:pl-5 pl-4">
										<div><?php
										$gross_p = $gross_purchase['total_grand_total'] - $gross_purchase_return['total_grand_total'] ;
											$gross_s = $gross_sales['total_grand_total'] - $gross_sales_return['total_grand_total'] ;
											$gross =$gross_s -$gross_p;
											$net= $gross-$expense['total_grand_total']
											?>
											<h4 class="mb-2">₹ <?= $net ?> /-</h4>
											<br>
										</div>
										<div id="Active"></div>
									</div>
								</div>
							</div>
					</div>	

						<div class="row">
						<div class="xl:w-1/2 lg:w-5/12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Purchase </h4>
                                <a href="#" onclick="exportTableToExcel()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
							</div>
							<div class="sm:px-5 px-4" >
                            
								<div class="row">
									<div class="sm:w-1/2 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl" >
												<span class="mb-1 text-sm text-body-color block">Total Purchase Including Tax(Before Discount)</span>
                                             
												<h4 class="mb-0">₹ <?php echo isset($total['total_grand_total']) && $total['total_grand_total'] ? number_format($total['total_grand_total'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/2 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl" >
												<span class="mb-1 text-sm text-body-color block">Total Discount On Purchase</span>
												<h4 class="mb-0">
													₹ <?php echo isset($total['total_discount']) && $total['total_discount'] ? number_format($total['total_discount'], 2) : "0.00"; ?>
											
												</h4>
											</div>
										</div>
									</div>
									
									
								</div>
                                
                                <div class="row">
								<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl">
												<span class="mb-1 text-sm text-body-color block">Total Purchase</span>
												<h4 class="mb-0">₹ <?php echo isset($total['total_grand_total']) && $total['total_grand_total'] ? number_format($total['total_grand_total'] - $total['total_discount'], 2) : "0.00"; ?></h4>
											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl">
												<span class="mb-1 text-sm text-body-color block">Paid Amount</span>
											
                                                <h4 class="mb-0">₹ <?php echo isset($total_payment['grand_total_paid_amount']) && $total_payment['grand_total_paid_amount'] ? number_format($total_payment['grand_total_paid_amount'], 2) : "0.00"; ?></h4>
                                               
											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl">
												<span class="mb-1 text-sm text-body-color block">Due Amount</span>
												<h4 class="mb-0">₹  <?php echo isset($total_payment['total_tax']) && $total_payment['total_tax'] ? number_format($total_payment['total_tax'], 2) : "0.00"; ?></h4>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
                    <div class="xl:w-1/2 lg:w-5/12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Purchase Return</h4>
                                <a href="#" onclick="exportTableToExcel1()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
							</div>
							<div class="sm:px-5 px-4">
								<!-- <div id="redial"></div>
								<div class="text-center">
									<h5 class="mb-0">Total sales made week</h5>
									<h4 class="mb-2">$86</h4>
									<p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
								</div> -->
								<div class="row">
									<div class="sm:w-1/2 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl1">
												<span class="mb-1 text-sm text-body-color block">Total Purchase Return Including Tax(Before Discount)</span>
											
                                                <h4 class="mb-0">₹ <?php echo isset($total_return['total_grand_total']) && $total_return['total_grand_total'] ? number_format($total_return['total_grand_total'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
							
									<div class="sm:w-1/2 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl1">
												<span class="mb-1 text-sm text-body-color block">Total Discount On Purchase Return</span>
											
                                                <h4 class="mb-0">₹ <?php echo isset($total_return['total_discount']) && $total_return['total_discount'] ? number_format($total_return['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									
								</div>
                                <div class="row">
								<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl1">
												<span class="mb-1 text-sm text-body-color block">Total Purchase Return</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($total_return['total_grand_total']) && $total_return['total_grand_total'] ? number_format($total_return['total_grand_total'] - $total_return['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl1">
												<span class="mb-1 text-sm text-body-color block">Paid Amount</span>

                                                <h4 class="mb-0">₹ <?php echo isset($total_payment_return['grand_total_paid_amount'])  ? number_format($total_payment_return['grand_total_paid_amount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl1">
												<span class="mb-1 text-sm text-body-color block">Due Amount</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($total_payment_return['total_tax']) ? number_format($total_payment_return['total_tax'], 2) : "0.00"; ?></h4>


											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
                    </div>
                    <div class="row">
						<div class="xl:w-1/2 lg:w-5/12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Sales</h4>
                                <a href="#" onclick="exportTableToExcel2()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
							</div>
							<div class="sm:px-5 px-4" >
                            
								<div class="row">
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl2" >
												<span class="mb-1 text-sm text-body-color block">Total Sales(Before Tax And Discount)</span>

                                                <h4 class="mb-0">₹ <?php echo isset($sales_total['total_grand_total']) && $sales_total['total_grand_total'] ? number_format($sales_total['total_grand_total'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl2">
												<span class="mb-1 text-sm text-body-color block">Total Sales Tax</span>

                                                <h4 class="mb-0">₹ <?php echo isset($sales_total['total_tax']) && $sales_total['total_tax'] ? number_format($sales_total['total_tax'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl2" >
												<span class="mb-1 text-sm text-body-color block">Total Discount On Sales</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total['total_discount']) && $sales_total['total_discount'] ? number_format($sales_total['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
								</div>
                                
                                <div class="row">
								<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl2" >
												<span class="mb-1 text-sm text-body-color block">Total Sales</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total['total_grand_total']) && $sales_total['total_grand_total'] ? number_format($sales_total['total_grand_total'] + $sales_total['total_tax'] - $sales_total['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl">
												<span class="mb-1 text-sm text-body-color block">Paid Amount</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_payment['grand_total_paid_amount'])  ? number_format($sales_total_payment['grand_total_paid_amount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl">
												<span class="mb-1 text-sm text-body-color block">Due Amount</span>
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_payment['total_tax'])  ? number_format($sales_total_payment['total_tax'], 2) : "0.00"; ?></h4>


											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
                    <div class="xl:w-1/2 lg:w-5/12">
						<div class="card">
							<div class="card-header flex justify-between sm:pt-6 py-5 sm:p-5 px-4 items-center relative flex-wrap">
								<h4 class="text-base">Sales Return</h4>
                                <a href="#" onclick="exportTableToExcel3()" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
    Export to Excel
</a>
							</div>
							<div class="sm:px-5 px-4">
								<!-- <div id="redial"></div>
								<div class="text-center">
									<h5 class="mb-0">Total sales made week</h5>
									<h4 class="mb-2">$86</h4>
									<p class="mb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy.</p>
								</div> -->
								<div class="row">
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl3">
												<span class="mb-1 text-sm text-body-color block">Total Sales Return(Before Tax And Discount)</span>

                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_return['total_grand_total']) && $sales_total_return['total_grand_total'] ? number_format($sales_total_return['total_grand_total'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl3">
												<span class="mb-1 text-sm text-body-color block">Total Sales Tax Return</span>
							
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_return['total_tax']) && $sales_total_return['total_tax'] ? number_format($sales_total_return['total_tax'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl3">
												<span class="mb-1 text-sm text-body-color block">Total Discount On Sales Return</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_return['total_discount']) && $sales_total_return['total_discount'] ? number_format($sales_total_return['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
								</div>
                                <div class="row">
								<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl2" >
												<span class="mb-1 text-sm text-body-color block">Total Return Sales</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_return['total_grand_total']) && $sales_total_return['total_grand_total'] ? number_format($sales_total_return['total_grand_total'] + $sales_total_return['total_tax'] - $sales_total_return['total_discount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl3">
												<span class="mb-1 text-sm text-body-color block">Paid Amount</span>
												
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_payment_return['grand_total_paid_amount']) ? number_format($sales_total_payment_return['grand_total_paid_amount'], 2) : "0.00"; ?></h4>

											</div>
										</div>
									</div>
									<div class="sm:w-1/3 tg-base">
										<div class="card text-center">
											<div class="card-body p-2 tbl3">
												<span class="mb-1 text-sm text-body-color block">Due Amount</span>
											
                                                <h4 class="mb-0">₹ <?php echo isset($sales_total_payment_return['total_tax'])  ? number_format($sales_total_payment_return['total_tax'], 2) : "0.00"; ?></h4>

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
            </div>
		<?php include "includes2/footer-links.php" ?>
	
	<?php include "includes2/footer.php" ?>
    <script>
   

    function exportTableToExcel() {
        // Initialize an empty array to store data
        var data = [];

        // Add header row
        data.push(["Purchase", "Amount"]);

        // Select all the cards with the data
        document.querySelectorAll(".tbl").forEach((cardBody) => {
            const metric = cardBody.querySelector("span")?.innerText || "";
            const value = cardBody.querySelector("h4")?.innerText || "";
            data.push([metric, value]);
        });

        // Convert the data array to a worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(data);

        // Create a workbook and append the worksheet
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Purchase Product");

        // Generate Excel file and prompt download
        XLSX.writeFile(workbook, "purchase_product.xlsx");
    }
    function exportTableToExcel1() {
        // Initialize an empty array to store data
        var data = [];

        // Add header row
        data.push(["Purchase Return", "Amount"]);

        // Select all the cards with the data
        document.querySelectorAll(".tbl1").forEach((cardBody) => {
            const metric = cardBody.querySelector("span")?.innerText || "";
            const value = cardBody.querySelector("h4")?.innerText || "";
            data.push([metric, value]);
        });

        // Convert the data array to a worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(data);

        // Create a workbook and append the worksheet
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Purchase Product Return");

        // Generate Excel file and prompt download
        XLSX.writeFile(workbook, "purchase_product_return.xlsx");
    }
    function exportTableToExcel2() {
        // Initialize an empty array to store data
        var data = [];

        // Add header row
        data.push(["Sales", "Amount"]);

        // Select all the cards with the data
        document.querySelectorAll(".tbl2").forEach((cardBody) => {
            const metric = cardBody.querySelector("span")?.innerText || "";
            const value = cardBody.querySelector("h4")?.innerText || "";
            data.push([metric, value]);
        });

        // Convert the data array to a worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(data);

        // Create a workbook and append the worksheet
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "sale Product");

        // Generate Excel file and prompt download
        XLSX.writeFile(workbook, "sale_product.xlsx");
    }
    function exportTableToExcel3() {
        // Initialize an empty array to store data
        var data = [];

        // Add header row
        data.push(["Sales Return", "Amount"]);

        // Select all the cards with the data
        document.querySelectorAll(".tbl3").forEach((cardBody) => {
            const metric = cardBody.querySelector("span")?.innerText || "";
            const value = cardBody.querySelector("h4")?.innerText || "";
            data.push([metric, value]);
        });

        // Convert the data array to a worksheet
        var worksheet = XLSX.utils.aoa_to_sheet(data);

        // Create a workbook and append the worksheet
        var workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, "Sales Product Return");

        // Generate Excel file and prompt download
        XLSX.writeFile(workbook, "sales_product_return.xlsx");
    }


</script>
</body>
</html>
