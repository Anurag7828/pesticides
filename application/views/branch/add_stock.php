<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->
<head>	
    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignZone">
	<meta name="robots" content="index, follow">

	<meta name="keywords"
		content="YashAdmin, sales Admin Dashboard, Tailwind CSS Template, Web Application, sales Management, Responsive Design, User Experience, Customizable, Modern UI, Dashboard Template, Admin Panel, Tailwind CSS, HTML5, CSS3, JavaScript, Analytics, Products, Admin Template, UI Kit, CRM, Analytics, Responsive Dashboard, responsive admin dashboard, sales dashboard, ui kit, web app, Admin Dashboard, Template, Admin, CMS pages, Authentication, FrontEnd Integration, Web Application UI, Tailwind CSS Framework, User Interface Kit, Financial Dashboard, Customizable Template, Product Management, HTML5/CSS3, CRM Dashboard, Analytics Dashboard, Admin Dashboard UI, Mobile-Friendly Design, UI Components, Dashboard Widgets, Dashboard Framework, Data Visualization, User Experience (UX), Dashboard Widgets, Real-time Analytics, Cross-Browser Compatibility, Interactive Charts, Product Processing, Performance Optimization, Multi-Purpose Template, Efficient Admin Tools, Task Management, Modern Web Technologies, Product Tracking, Responsive Tables, Dashboard Widgets, Invoice Management, Access Control, Modular Design, Product History, Trend Analysis, User-Friendly Interface">

	<meta name="description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">

	<meta property="og:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
	<meta property="og:description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
	<meta property="og:image" content="../social-image.png">

	<meta name="format-detection" content="telephone=no">

	<meta name="twitter:title" content="YashAdmin -Sales Management System Tailwind CSS Admin Dashboard Template | DexignZone">
	<meta name="twitter:description"
		content="The Yash Admin Sales Management System is a robust and intuitive platform designed to streamline sales operations and enhance business productivity. This comprehensive admin dashboard offers a feature-rich environment tailored specifically for managing sales processes effectively.With its modern and responsive design, Yash Admin provides a seamless user experience across various devices and screen sizes. The user interface is highly customizable, allowing administrators to tailor the dashboard to their specific needs and branding requirements.">
	<meta name="twitter:image" content="../social-image.png">
	<meta name="twitter:card" content="summary_large_image">

	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <?php include "includes2/header-links.php" ?>
	
</head>
<body class="selection:text-white selection:bg-primary">

<!-- Main wrapper start -->
<div id="main-wrapper" class="relative">
<?php include "includes2/header.php" ?>
<?php include "includes2/sidebar.php" ?>	

<!-- Content body start -->
<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<!-- row -->
				<div class="row">
    <div class="xl:w-6/4 lg:w-4/3">
        <div class="card flex flex-col max-sm:mb-[30px] profile-card">
            <div class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                <h6 class="text-[15px] font-medium text-body-color title relative">Add Your Stocks</h6>
                <a href="<?= base_url('Branch_Dashboard/stock/' . encryptId($user[0]['id'])) ?>" 
                   class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block 
                   border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View stocks</a>
            </div>

            <form class="profile-form" action="<?= base_url('Branch_Dashboard/add_stock/' . encryptId($user['0']['id'])) ?>" 
                  method="post" enctype="multipart/form-data">
                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                    <div class="row">

                        <!-- Stock Place Name -->
                        <div class="sm:w-1/2 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Stock Place Name</label>
                            <select name="stock_place" class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                    border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
									<option value="">Select Stock Place</option>
									<?php foreach ($stock_place as $stock_place_info) { ?>	

                                    <option value="<?= $stock_place_info['id']; ?>">
                                        <?= $stock_place_info['place_name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
                                            <select name="product_name" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                <option value="">Select Product</option>
                                                <?php foreach ($product_list as $product_info) { ?>
                                                    <option value="<?= $product_info['id']; ?>" <?= ($product_info['name'] == $product['0']['name']) ? 'selected' : ''; ?>>
                                                        <?= $product_info['product_name']; ?>
                                                    </option>
                                                <?php } ?>
                                                <option value="">Select Product</option>
                                            </select>
                                        </div>
                                        <input type="hidden" name="user_id" value="<?= $user['0']['id']; ?>" />
                        <!-- Packing -->
                        <div class="sm:w-1/3 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Net Quantity</label>
                            <input type="text" name="packing" id="packing" 
                                   class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                     placeholder="Packing" >
                        </div>
                        <div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Total Quantity</label>
											<input type="number" name="total_quantity" id="total_quantity" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Quantity">
										</div>
                                        <div class="sm:w-1/3 w-full mb-[30px]">
											<label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
											<input type="number" name="unit_rate" id="unit_rate" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" placeholder="Quantity">
										</div>
                       
                        <div class="sm:w-1/2 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Available Quantity</label>
                            <input type="number" name="available_quantity" 
                                   class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                   placeholder="Available Quantity">
                        </div>
                     <!-- Total Quantity -->
                      <div class="sm:w-1/2 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Return Quantity</label>
                            <input type="number" name="return_quantity" id="quantity" 
                                   class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                   placeholder="Total Quantity" >
                       </div>
                       <div class="sm:w-1/2 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
                            <input type="text" name="purchase_price" id="purchase_price"
                                   class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                   placeholder="Expiry Date">
                        </div>
                    
                        <div class="sm:w-1/2 w-full mb-[30px]">
                            <label class="text-dark dark:text-white text-[13px] mb-2">Expiry Date</label>
                            <input type="date" name="exp_date" 
                                   class="form-control relative text-[13px] text-body-color h-[2.813rem] 
                                   border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" 
                                   placeholder="Expiry Date">
                        </div>
                    </div>
                </div>

                <div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                    <button class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] 
                            text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border 
                            border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">
                        Add Stock
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
  </div>
    </div>
<!-- Content body end -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    // Trigger when a product is selected
    $('select[name="product_name"]').change(function() {
        var product_id = $(this).val(); // Get the selected product id

        if (product_id) {
            $.ajax({
                url: '<?= base_url('Branch_Dashboard/get_product_data') ?>',
                type: 'POST',
                data: {product_id: product_id},
                success: function(response) {
                    var data = JSON.parse(response);

                    if (data) {
                        // Populate the fields
                        $('input[name="available_quantity"]').val(data.available_quantity);
                        $('input[name="return_quantity"]').val(data.return_quantity);
                        $('input[name="total_quantity"]').val(data.total_quantity);
                        $('input[name="unit_rate"]').val(data.unit_rate);
                        $('input[name="purchase_price"]').val(data.purchase_price);
                        $('input[name="packing"]').val(data.packing);
                    }
                },
                error: function() {
                    alert('Error fetching product data.');
                }
            });
        } else {
            // Clear the fields if no product is selected
            $('input[name="available_quantity"]').val('');
            $('input[name="return_quantity"]').val('');
            $('input[name="total_quantity"]').val('');
            $('input[name="unit_rate"]').val('');
            $('input[name="purchase_price"]').val('');
            $('input[name="packing"]').val('');
        }
    });

    // Update available quantity and purchase price when return quantity is changed
    $('input[name="return_quantity"], input[name="total_quantity"]').on('input', function() {
        var totalQuantity = parseInt($('input[name="total_quantity"]').val()) || 0;
        var returnQuantity = parseInt($('input[name="return_quantity"]').val()) || 0;
        var unitRate = parseFloat($('input[name="unit_rate"]').val()) || 0;

        // Calculate new available quantity
        var availableQuantity = totalQuantity - returnQuantity;
        $('input[name="available_quantity"]').val(availableQuantity);

        // Calculate purchase price based on available quantity and unit rate
        var purchasePrice = availableQuantity * unitRate;
        $('input[name="purchase_price"]').val(purchasePrice.toFixed(2));
    });

    // You may also want to update available quantity and purchase price when total quantity is changed
    $('input[name="total_quantity"]').on('input', function() {
        var totalQuantity = parseInt($(this).val()) || 0;
        var returnQuantity = parseInt($('input[name="return_quantity"]').val()) || 0;
        var unitRate = parseFloat($('input[name="unit_rate"]').val()) || 0;

        // Calculate new available quantity
        var availableQuantity = totalQuantity - returnQuantity;
        $('input[name="available_quantity"]').val(availableQuantity);

        // Calculate purchase price based on available quantity and unit rate
        var purchasePrice = availableQuantity * unitRate;
        $('input[name="purchase_price"]').val(purchasePrice.toFixed(2));
    });
});

</script>

<?php include "includes2/footer-links.php" ?>
</div>
<?php include "includes2/footer.php" ?>
</body>
</html>