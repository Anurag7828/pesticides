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


        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                <!-- row -->
                <div class="row">
                    <div class="xl:w-6/4 lg:w-4/3">
                        <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                            <div
                                class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                <h6 class="text-[15px] font-medium text-body-color title relative">Update purchase Product</h6>
                                <a href="<?= base_url('Admin_Dashboard/product/' . encryptId($user[0]['id'])) ?>"
                                    class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
                                    Purchase Product List</a><br>
                            </div>
                            <form class="profile-form"
                                action="<?= base_url('Admin_Dashboard/edit_product?user_id=' . $user[0]['id'] . '&purchase_code=' . $product[0]['purchase_code']) ?>"
                                method="post" enctype="multipart/form-data">


                                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                    <div class="row">
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Vender
                                                Name</label>
                                            <select name="vender_name"
                                                class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                <option value="">Select Vendor</option>
                                                <?php foreach ($vender as $vender_info): ?>
                                                    <option value="<?= $vender_info['id']; ?>"
                                                        <?= (($product[0]['vender_name'] == $vender_info['id']) ? 'selected' : '') ?>>
                                                        <?= $vender_info['vender_name']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <input type="hidden" id="uuid" name="user_id"
                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                            value="<?= $user['0']['id'] ?>">
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2"
                                                for="stock_place_name">Stock Place Name</label>
                                            <select name="stock_place_name" id="stock_place_name"
                                                class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full">
                                                <option value="">Select Stock Place</option>
                                                <?php foreach ($stock as $stock_info) { ?>
                                                    <option value="<?= $stock_info['id']; ?>"
                                                        <?= ($product[0]['stock_place_name'] == $stock_info['id']) ? 'selected' : ''; ?>>
                                                        <?= htmlspecialchars($stock_info['place_name']); ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <input type="hidden" name="branch_id"
                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                            value="<?= $branchi ?>">
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Purchase
                                                code</label>
                                            <input type="text"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="Purchase Code"
                                                value="<?= $user[0]['purchase_code'] ?>-<?= $product[0]['purchase_code'] ?>"
                                                readonly>
                                                <input type="hidden" name="purchase_code"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                placeholder="Purchase Code"
                                                value="<?= $product[0]['purchase_code'] ?>"
                                                readonly>
                                        </div>
                                        <div class="sm:w-1/2 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                            <input type="date" name="date"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                placeholder="Purchase Date" value="<?= $product[0]['date'] ?>">
                                        </div>

                                        <hr>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="xl:w-6/4 lg:w-4/3">
                                                    <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                                                    <div id="product-container1">
                                                        <?php $p_produc = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $product[0]['purchase_code'], 'user_id', $user[0]['id']); ?>
                                                        <?php foreach ($p_produc as $p_info): ?>
                                                            <div class="pb-0">
                                                                <div id="product-container">
                                                                    <!-- Product fields that will be cloned -->
                                                                    <div class="row product-row">
                                                                        <!-- Product Dropdown in the Row -->

                                                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Select
                                                                                Product</label>
                                                                            <?php $product_name = $this->CommonModal->getRowByMultitpleId('product', 'id', $p_info['product_name'], 'user_id', $user[0]['id']); ?>
                                                                            <input type="text"
                                                                                value="<?= $product_name[0]['product_name'] ?>"
                                                                                class="product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Click to select product"
                                                                                readonly
                                                                                onclick="openProductModal(<?= $p_info['p_id'] ?>)">
                                                                            <input type="hidden" id="product-input-value"
                                                                                name="p_name[]"
                                                                                value="<?= $p_info['product_name'] ?>"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full ">
                                                                        </div>
                                                                        <div id="productModal<?= $p_info['p_id'] ?>"
                                                                            class="modal fade fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-[1055]">
                                                                            <div
                                                                                class="modal-dialog-centered w-full max-w-4xl">
                                                                                <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] pointer-events-auto"
                                                                                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;margin-left: 158px;margin-top: -469px;">

                                                                                    <!-- Modal Header -->
                                                                                    <div
                                                                                        class="modal-header flex justify-between items-center py-4 px-6 border-b border-gray-200 dark:border-gray-700">
                                                                                        <h5
                                                                                            class="text-lg font-bold text-gray-800 dark:text-white">
                                                                                            Select Product</h5>
                                                                                        <button type="button"
                                                                                            class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                                                                                            onclick="closeProductModal(<?= $p_info['p_id'] ?>)">&times;</button>
                                                                                    </div>

                                                                                    <!-- Modal Body -->
                                                                                    <div class="modal-body p-6">
                                                                                        <div class="row">
                                                                                            <div
                                                                                                class="sm:w-1/2 w-full mb-[30px]">
                                                                                                <input type="text"
                                                                                                    id="productSearch"
                                                                                                    class="form-control mb-4 p-2 border rounded-md w-full"
                                                                                                    placeholder="Search Product..."
                                                                                                    oninput="filterModalProducts()">
                                                                                            </div>
                                                                                            <div
                                                                                                class="sm:w-1/4 w-full mb-[30px]">
                                                                                                <a href="<?= base_url('Admin_Dashboard//add_product_name/' . encryptId($user['0']['id']) . '/0') ?>"
                                                                                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn">
                                                                                                    Add New product</a>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div
                                                                                            class="overflow-y-auto max-h-80 border rounded-md">
                                                                                            <table
                                                                                                class="w-full text-left border-collapse">
                                                                                                <thead
                                                                                                    class="bg-gray-100 dark:bg-gray-800">
                                                                                                    <tr>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            Product ID</th>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            Product Name
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            Company Name
                                                                                                        </th>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            HSN Code</th>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            Packing</th>
                                                                                                        <th
                                                                                                            class="py-2 px-4">
                                                                                                            Unit</th>



                                                                                                        <!-- <th class="py-2 px-4">Select</th> -->
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody id="productTableBody"
                                                                                                    class="bg-white dark:bg-gray-900">

                                                                                                    <?php foreach ($product_list as $product_info) { ?>

                                                                                                        <tr class="border-b">
                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <?= $product_info['product_id']; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <a href="javascript:void(0);"
                                                                                                                    onclick="selectProduct(event, '<?= $product_info['id']; ?>', '<?= $product_info['product_name']; ?>', '<?= $product_info['unit']; ?>', '<?= $product_info['packing']; ?>', '<?= $product_info['net_unit']; ?>', '<?= $p_info['p_id'] ?>')">
                                                                                                                    <?= $product_info['product_name']; ?>
                                                                                                                </a>
                                                                                                            </td>

                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <button
                                                                                                                    onclick="selectProduct('<?= $product_info['pro_id']; ?>', '<?= $product_info['product_name']; ?>', '<?= $product_info['unit']; ?>', '<?= $product_info['packing']; ?>', '<?= $product_info['net_unit']; ?>', '<?= $product_info['p_id']; ?>')"><?= $product_info['company_name']; ?></button>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <?= $product_info['HSN']; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <?= $product_info['packing'] . $product_info['net_unit']; ?>
                                                                                                            </td>
                                                                                                            <td
                                                                                                                class="py-2 px-4">
                                                                                                                <?= $product_info['unit']; ?>
                                                                                                            </td>

                                                                                                        </tr>
                                                                                                    <?php } ?>


                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Modal Footer -->
                                                                                    <div
                                                                                        class="modal-footer flex justify-end py-4 px-6 border-t border-gray-200 dark:border-gray-700">
                                                                                        <button
                                                                                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto"
                                                                                            onclick="closeProductModal(<?= $p_info['p_id'] ?>)">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <input type="hidden" name="packing[]"
                                                                            class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                            placeholder="Quantity"
                                                                            oninput="calculateTotalPrice(this.closest('.row'))"
                                                                            value="<?= $p_info['packing'] ?>"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">





                                                                        <input type="hidden" name="unit_box[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            placeholder="Quantity">
                                                                            <input type="hidden" name="unit_box_per_quantity[]"
																		class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
																		placeholder="undgit" required>
                                                                        <input type="hidden" name="p_id[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            id="ppp_id" value="<?= $p_info['p_id'] ?>">

                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
                                                                            <input type="number" name="quantity[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Quantity"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                value="<?= $p_info['quantity'] ?>"
                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">

                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Purchase
                                                                                Price</label>
                                                                            <input type="float" name="unit_rate[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Unit Rate" id="unit-rate"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                value="<?= $p_info['unit_rate'] ?>"
                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Tax(IN
                                                                                %)</label>
                                                                            <input type="float" name="tax[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Tax" id="tax"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                value="<?= $product[0]['gst_percent'] ?>"
                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                        </div>

                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Tax
                                                                                Amount</label>
                                                                            <input type="float" name="tax_amount[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Tax Amount" id="tax-amount"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                value="<?= $p_info['gst_tax'] ?>"
                                                                                oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                        </div>


                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Unit
                                                                                Price</label>
                                                                            <input type="float" name="p_price[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Total Price"
                                                                                value="<?= $p_info['total_price'] ?>">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">
                                                                                Discount Type</label>
                                                                            <select name="p_discount_type[]"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                                required>
                                                                                <option value="rupee" selected>₹</option>
                                                                                <option value="percent">%
                                                                                </option>

                                                                            </select>
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">
                                                                                Discount Value</label>
                                                                            <input type="number" name="p_discount[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Discount Value"
                                                                                id="total-unit-price"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Total
                                                                                Price</label>
                                                                            <input type="float" name="total_price[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Total Price"
                                                                                value="<?= $p_info['total_price'] ?>">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Expire
                                                                                date</label>
                                                                            <input type="date" name="exp_date[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                placeholder="Purchase Date"
                                                                                value="<?= $p_info['exp_date'] ?>" required>
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]    d-flex align-items-center "
                                                                            style="margin-top: 30px;">
                                                                            <a class="btn btn-danger border border-b-color block rounded-md py-1.5 px-3 outline-none"
   href="<?= base_url('Admin_Dashboard/delete_product' . '?BdID=' . $p_info['p_id'].'&UI='. $p_info['user_id'].'&pc='.$p_info['purchase_code'] ); ?>"
   onclick="deleteProductForrm(event, this);">
   <i class="fas fa-trash-alt" style="color:red;"></i>
</a>
                                                                           
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    </div>
                                                        <div
                                                            class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                                            <button type="button" id="add-product-btn"
                                                                class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
                                                                More Product</button>
                                                        </div>
                                                        <hr>
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <!-- Total Quantity Field -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Total
                                                                        Quantity</label>
                                                                    <input type="number" id="total-quantity"
                                                                        name="total_quantity"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                        placeholder="total quantity"
                                                                        value="<?= $product[0]['total_quantity'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                </div>

                                                                <!-- Subtotal Field -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Sub
                                                                        Total</label>
                                                                    <input type="float" id="sub-total" name="sub_total"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                        placeholder="subtotal"
                                                                        value="<?= $product[0]['sub_total'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                </div>

                                                                <!-- Discount Type Dropdown -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Type</label>
                                                                    <select id="discount-type" name="discount_type"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
                                                                        <option value="percent">Select Discount type
                                                                        </option>
                                                                        <option value="percent"
                                                                            <?= strpos($p_info['discount_type'], 'percent') !== false ? 'selected' : '' ?>>
                                                                            Discount in Percentage</option>
                                                                        <option value="rupee"
                                                                            <?= strpos($p_info['discount_type'], 'rupee') !== false ? 'selected' : '' ?>>Discount in
                                                                            Rupee</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Discount Value Field -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Value</label>
                                                                    <input type="float" id="discount-value"
                                                                        name="discount_value"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                        placeholder="enter discount value"
                                                                        value="<?= $product[0]['discount_value'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                </div>

                                                                <!-- Grand Total Field -->
                                                                <div class="sm:w-1 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Grand
                                                                        Total</label>
                                                                    <input type="float" id="grand-total"
                                                                        name="grand_total"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                        placeholder="grand total"
                                                                        value="<?= $product[0]['grand_total'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <?php
                                                                $purchase_payment = $this->CommonModal->getRowByIdOrderByLimit('purchase_payment', 'purchase_code', $product[0]['purchase_code'], 'user_id', $user[0]['id'], 'id', 'ASC', '1');
                                                                ?>

                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Payment
                                                                        Mode</label>
                                                                    <select name="mode"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                        id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                        <option value="Cash"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'Cash') !== false ? 'selected' : '' ?>>CASH
                                                                        </option>
                                                                        <option value="Upi"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'Upi') !== false ? 'selected' : '' ?>>UPI
                                                                        </option>
                                                                        <option value="Card"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'Card') !== false ? 'selected' : '' ?>>
                                                                            CREADIT/DEBIT</option>
                                                                        <option value="Bank"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'Bank') !== false ? 'selected' : '' ?>>Bank
                                                                            Transfer</option>
                                                                        <option value="Cheque"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'Cheque') !== false ? 'selected' : '' ?>>
                                                                            Cheque</option>
                                                                        <option value="None"
                                                                            <?= strpos($purchase_payment[0]['mode'], 'None') !== false ? 'selected' : '' ?>>None
                                                                        </option>
                                                                    </select>
                                                                </div>
                                                                <div class="sm:w-1/3 w-full mb-[30px]" id="bankDetails"
                                                                    style="display:none;">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Account</label>
                                                                    <select name="bank"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                        id="bankAccount">
                                                                        <option value="">--SELECT--</option>
                                                                        <?php

                                                                        foreach ($account as $account_info) { ?>
                                                                            <option value="<?= $account_info['id'] ?>"
                                                                                <?= strpos($purchase_payment[0]['bank'], $account_info['id']) !== false ? 'selected' : '' ?>>
                                                                                <?= $account_info['bank_name'] ?>-<?= $account_info['account_no'] ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="sm:w-1/3 w-full mb-[30px]"
                                                                    id="chequeDetails" style="display:none;">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Cheque
                                                                        Number</label>
                                                                    <input type="text" name="cheque_no"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="Cheque Number" id="cheque"
                                                                        value="<?= $purchase_payment[0]['cheque_no'] ?>">
                                                                </div>
                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Paid
                                                                        Amount</label>

                                                                    <input type="float" name="paid"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                        placeholder="paid amount"
                                                                        value="<?= $purchase_payment[0]['paid'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                    <input type="hidden" name="p_p_id"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                        placeholder="paid amount"
                                                                        value="<?= $purchase_payment[0]['id'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                </div>

                                                                <div
                                                                    class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                                                    <button type="submit" id="add-product-bt"
                                                                        class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update
                                                                        Product</button>
                                                                </div>
                                                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="productModal2"
            class="modal fade fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-[1055]">
            <div class="modal-dialog-centered w-full max-w-4xl">
                <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] pointer-events-auto"
                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;margin-left: 158px;">

                    <!-- Modal Header -->
                    <div
                        class="modal-header flex justify-between items-center py-4 px-6 border-b border-gray-200 dark:border-gray-700">
                        <h5 class="text-lg font-bold text-gray-800 dark:text-white">Select Product</h5>
                        <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                            onclick="closeProductModal()">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body p-6">
                        <div class="row">
                            <div class="sm:w-1/2 w-full mb-[30px]">
                                <input type="text" id="productSearch"
                                    class="form-control mb-4 p-2 border rounded-md w-full"
                                    placeholder="Search Product..." oninput="filterModalProducts()">
                            </div>
                            <div class="sm:w-1/4 w-full mb-[30px]">
                                <a href="<?= base_url('Admin_Dashboard//add_product_name/' . encryptId($user['0']['id']) . '/0') ?>"
                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn">
                                    Add New product</a>
                            </div>
                        </div>
                        <div class="overflow-y-auto max-h-80 border rounded-md">
                            <table class="w-full text-left border-collapse">
                                <thead class="bg-gray-100 dark:bg-gray-800">
                                    <tr>
                                        <th class="py-2 px-4">Product ID</th>
                                        <th class="py-2 px-4">Product Name</th>
                                        <th class="py-2 px-4">Company Name</th>
                                        <th class="py-2 px-4">HSN Code</th>
                                        <th class="py-2 px-4">Packing</th>
                                        <th class="py-2 px-4">Unit</th>



                                        <!-- <th class="py-2 px-4">Select</th> -->
                                    </tr>
                                </thead>
                                <tbody id="productTableBody" class="bg-white dark:bg-gray-900">

                                    <?php foreach ($product_list as $product_info) { ?>

                                        <tr class="border-b">
                                            <td class="py-2 px-4"><?= $product_info['product_id']; ?></td>
                                            <td class="py-2 px-4">
                                                <button
                                                    onclick="selectProduct2(currentRow, '<?= $product_info['id']; ?>', '<?= $product_info['product_name']; ?>', '<?= $product_info['unit']; ?>', '<?= $product_info['packing']; ?>', '<?= $product_info['net_unit']; ?>', '<?= $product_info['total_purchase_price']; ?>', '<?= $product_info['box_per_unit']; ?>')">
                                                    <?= $product_info['product_name']; ?>
                                                </button>
                                            </td>
                                            <td class="py-2 px-4"><button
                                                    onclick="selectProduct2('<?= $rowIndex ?>','<?= $product_info['pro_id']; ?>', '<?= $product_info['product_name']; ?>', '<?= $product_info['unit']; ?>', '<?= $product_info['packing']; ?>', '<?= $product_info['net_unit']; ?>', '<?= $product_info['p_id']; ?>')"><?= $product_info['company_name']; ?></button>
                                            </td>
                                            <td class="py-2 px-4"><?= $product_info['HSN']; ?></td>
                                            <td class="py-2 px-4">
                                                <?= $product_info['packing'] . $product_info['net_unit']; ?>
                                            </td>
                                            <td class="py-2 px-4"><?= $product_info['unit']; ?></td>

                                        </tr>
                                    <?php } ?>


                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer flex justify-end py-4 px-6 border-t border-gray-200 dark:border-gray-700">
                        <button
                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto"
                            onclick="closeProductModal2()">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->
        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            // Function to add a new product row

            function addProductForm() {
                const productContainer = document.getElementById('product-container1');

                const newProductRow = document.createElement('div');
                const rowIndex = document.querySelectorAll('.product-row').length; // Index to keep track of each row

                newProductRow.classList.add('row', 'product-row');

                newProductRow.innerHTML = `
<div class="row product-row">
     <div class="sm:w-1/3 w-full mb-[30px]">
                                    <label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
                    
                                                    
                                                <input type="text"
class="product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
placeholder="Click to select product"
readonly onclick="openProductModal2(this)">
                                                            <input type="hidden" id="product-input-value"
                                                                name="p_name[]"
                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full ">
                                                        </div>


        <input type="hidden" name="packing[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" oninput="calculateTotalPrice(this.closest('.row'))">
         <input type="hidden" name="p_id[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Quantity" value="-11">
    
                                                                <input type="hidden" name="unit_box[]"
                                                                    class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                    placeholder="unit"
                                                                    
                                                                    required>
                                                                    <input type="hidden" name="unit_box_per_quantity[]"
                                                                    class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                    placeholder="unit"
                                                                    
                                                                    required>
                                                    
<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
    <input type="number" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.product-row'))"
     
                                                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
</div>
<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Purchase Price</label>
    <input type="text" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Unit Rate" oninput="calculateTotalPrice(this.closest('.row'))">
</div>

<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Tax(IN %)</label>
    <input type="text" name="tax[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Tax" oninput="calculateTotalPrice(this.closest('.row'))">
</div>

<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Tax Amount</label>
    <input type="text" name="tax_amount[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Tax Amount" readonly>
</div>
<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">unit Price</label>
    <input type="text" name="p_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Unit Price" readonly>
</div>
    <div class="sm:w-1/6 w-full mb-[30px]">
                                                            <label
                                                                class="text-dark dark:text-white text-[13px] mb-2">
                                                                Discount Type</label>
                                                                <select name="p_discount_type[]" 
                                                            class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                            required>
                                                            <option value="rupee" selected>₹</option>
                                                            <option value="percent" >%
                                                            </option>
                                                            
                                                        </select>
                                                        </div>
                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                            <label
                                                                class="text-dark dark:text-white text-[13px] mb-2">
                                                                Discount Value</label>
                                                            <input type="number" name="p_discount[]"
                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                placeholder="Discount Value"
                                                            
                                                                >
                                                        </div>

<div class="sm:w-1/6 w-full mb-[30px]">
    <label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
    <input type="text" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="Total Price" readonly>
</div>

<div class="sm:w-1/6 w-full mb-[30px]">
<label class="text-dark dark:text-white text-[13px] mb-2">Expire Date</label>
<input type="date" name="exp_date[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" placeholder="expired date" required>
</div>



<div class="sm:w-1/6 w-full mb-[30px]    d-flex align-items-center "  style="margin-top: 30px;">
    <button type="button" class="btn btn-danger border border-b-color block rounded-md py-1.5 px-3 outline-none" onclick="deleteProductForm(this)">
        <i class="fas fa-trash-alt" style="color:red;"></i>
    </button>
</div>
</div>
`;

                productContainer.appendChild(newProductRow);

            }

            // Function to delete a product row
            function deleteProductForm(button) {
                const productRow = button.closest('.product-row');
                productRow.remove();
                updateSubTotal(); // Update subtotal after deleting a row
            }
            let currentRow = null;
            function openProductModal2(element) {
                const productModal = document.getElementById('productModal2');
                if (productModal) {
                    // Store the current row for later selection
                    currentRow = element.closest('.product-row');
                    productModal.classList.remove('hidden');
                } else {
                    console.error("Modal not found!");
                }
            }

            function closeProductModal2() {
                const productModal = document.getElementById('productModal2');
                if (productModal) {
                    productModal.classList.add('hidden');
                }
            }
            function selectProduct2(row, pro_id, product_name, unit, packing, net_unit, p_id, box_per_unit) {
                if (row) {
                    row.querySelector('[name="p_name[]"]').value = pro_id;
                    row.querySelector('.product-input').value = product_name;
                    row.querySelector('[name="unit_box[]"]').value = unit;
                    row.querySelector('[name="unit_box_per_quantity[]"]').value = box_per_unit || 0;
                    row.querySelector('[name="packing[]"]').value = `${packing} ${net_unit}`;
                    closeProductModal2();

                    // Fetch product details using AJAX
                    $.ajax({
                        url: `<?= base_url("Admin_Dashboard/get_product_details/") ?>/${pro_id}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data && !data.error) {
                                row.querySelector('[name="unit_rate[]"]').value = data.purchase_price;
                                row.querySelector('[name="tax[]"]').value = data.tax;
                                row.querySelector('[name="tax_amount[]"]').value = data.tax_amount;
                                row.querySelector('[name="p_price[]"]').value = data.total_purchase_price;
                                row.querySelector('[name="quantity[]"]').value = 1;

                                calculateTotalPrice(row);
                            } else {
                                alert(data.error || 'Error fetching product details.');
                            }
                        },
                        error: function () {
                            alert('Error fetching product details.');
                        }
                    });
                } else {
                    console.error('Row not found!');
                }
            }


            function calculateTotalPrice(row) {
                var quantity = parseFloat(row.querySelector('[name="quantity[]"]').value) || 0;
                var unitRate = parseFloat(row.querySelector('[name="unit_rate[]"]').value) || 0;
                var taxRate = parseFloat(row.querySelector('[name="tax[]"]').value) || 0;
                var discountType = row.querySelector('[name="p_discount_type[]"]').value;
                var discountValueInput = row.querySelector('[name="p_discount[]"]');

                // Ensure discount value is set to 0 if empty
                if (discountValueInput.value.trim() === "") {
                    discountValueInput.value = "0";
                }
                var discountValue = parseFloat(discountValueInput.value) || 0;

                var taxAmount = (unitRate * quantity * taxRate) / 100;
                var totalPrice = (unitRate * quantity) + taxAmount;

                if (discountType === 'percent') {
                    totalPrice -= (totalPrice * discountValue / 100);
                } else if (discountType === 'rupee') {
                    totalPrice -= discountValue;
                }

                row.querySelector('[name="tax_amount[]"]').value = taxAmount.toFixed(2);
                row.querySelector('[name="total_price[]"]').value = totalPrice.toFixed(2);
                updateSubTotal();
                updateGrandTotal();
            }

            document.getElementById('product-container').addEventListener('input', function (event) {
                const row = event.target.closest('.product-row');
                if (row) {
                    calculateTotalPrice(row);
                }
            });

            function updateSubTotal() {
                const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
                const quantityInputs = document.querySelectorAll('input[name="quantity[]"]');

                let subTotal = 0;
                let totalQuantity = 0;

                totalPriceInputs.forEach(input => {
                    subTotal += parseFloat(input.value) || 0;
                });

                quantityInputs.forEach(input => {
                    totalQuantity += parseFloat(input.value) || 0;
                });

                document.getElementById('sub-total').value = subTotal.toFixed(2);
                document.getElementById('total-quantity').value = totalQuantity; // Update the total quantity
            }

            function updateGrandTotal() {
                const subTotal = parseFloat(document.getElementById('sub-total').value) || 0;
                const discountType = document.getElementById('discount-type').value;
                const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;

                let grandTotal = subTotal;

                if (discountType === 'percent') {
                    grandTotal -= (subTotal * discountValue) / 100;
                } else if (discountType === 'rupee') {
                    grandTotal -= discountValue;
                }

                document.getElementById('grand-total').value = grandTotal.toFixed(2);
            }


            // Event listeners for changes in discount
            document.getElementById('discount-type').addEventListener('change', updateGrandTotal);
            document.getElementById('discount-value').addEventListener('input', updateGrandTotal);


            // Ensure jQuery is loaded and handle the button event
            $(document).ready(function () {
                $('#add-product-btn').on('click', function () {
                    addProductForm();
                });
            });

            document.getElementById('paymentMode').addEventListener('change', function () {
                var bankDetails = document.getElementById('bankDetails');
                var selectDetails = document.getElementById('bankAccount');
                if (this.value === 'Bank') {
                    bankDetails.style.display = 'block';
                    selectDetails.setAttribute('required', 'required')
                } else {
                    bankDetails.style.display = 'none';
                    selectDetails.removeAttribute('required');
                }
            });
            document.getElementById('paymentMode').addEventListener('change', function () {
                var chequeDetails = document.getElementById('chequeDetails');
                var selectDetails = document.getElementById('cheque');
                if (this.value === 'Cheque') {
                    chequeDetails.style.display = 'block';
                    selectDetails.setAttribute('required', 'required')
                } else {
                    chequeDetails.style.display = 'none';
                    selectDetails.removeAttribute('required');
                }
            });
            document.getElementById('paymentMode').addEventListener('change', function () {
                var paidInput = document.querySelector('input[name="paid"]');

                if (this.value === 'None') {
                    paidInput.value = '0';  // Set the value to 0 if 'None' is selected
                } else {
                    paidInput.value = '';   // Clear the value for other options
                }
            });
        </script>

        <script>
            $(document).on('click', '#add-product-bt', function (event) {
                var paidInput = $('input[name="paid"]'); // Corrected selector to target input with name "paid"
                if (!checkAvailablePaid(paidInput)) {
                    event.preventDefault(); // Prevent the button's default action
                }
            });

            function checkAvailablePaid(inputElement) {
                var grandTotal = parseFloat($('#grand-total').val()) || 0;
                var paid = parseFloat(inputElement.val()) || 0;

                if (paid > grandTotal) {
                    alert("Paid amount exceeds the Grand Total of " + grandTotal);
                    inputElement.val(''); // Reset the input field
                    return false; // Indicate that the check failed
                }

                return true; // Indicate that the check passed
            }
        </script>
        <script>
            function deleteProductForrm(event, button) {
    event.preventDefault(); // Prevent immediate redirection

    const productRow = button.closest('.product-row');
    productRow.remove(); // Remove the row from UI
    updateSubTotal(); // Update subtotal after deleting a row

    // Redirect after a short delay (optional, for smooth UI)
    setTimeout(() => {
        window.location.href = button.href;
    }, 300); // 300ms delay
}

            function openProductModal(productId) {
                const productModal = document.getElementById(`productModal${productId}`);
                if (productModal) {
                    productModal.classList.remove('hidden');
                    console.log("Product ID:", productId); // For debugging
                    // You can now use productId inside this function
                } else {
                    console.error("Modal not found!");
                }
            }

            function closeProductModal(productId) {
                const productModal = document.getElementById(`productModal${productId}`);
                if (productModal) {
                    productModal.classList.add('hidden');
                }
            }
            function selectProduct(event, pro_id, product_name, unit, packing, net_unit, p_id) {
                event.preventDefault(); // Form submit hone se roke

                console.log("Selected Product ID:", pro_id); // Debugging
                console.log("Selected P_ID:", p_id); // Debugging

                // Find the closest product row dynamically
                const row = event.target.closest('.row'); // Select the correct row
                if (!row) {
                    console.error("Product row not found!");
                    return;
                }

                // Set selected product name in input
                row.querySelector('.product-input').value = product_name;
                row.querySelector('#product-input-value').value = pro_id;

                closeProductModal(p_id);

                // Fetch product details
                $.ajax({
                    url: `<?= base_url("Admin_Dashboard/get_product_details/") ?>${pro_id}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        console.log("Product Details Response:", data); // Debugging

                        if (data && !data.error) {
                            row.querySelector('[name="p_name[]"]').value = data.id;
                            row.querySelector('[name="packing[]"]').value = `${data.packing} ${data.net_unit}`;
                            row.querySelector('[name="unit_box[]"]').value = data.unit;
                            row.querySelector('[name="unit_box_per_quantity[]"]').value = data.box_per_unit || 0;

                            row.querySelector('[name="quantity[]"]').value = 1;
                            row.querySelector('[name="unit_rate[]"]').value = data.purchase_price;
                            row.querySelector('[name="tax[]"]').value = data.tax;
                            row.querySelector('[name="tax_amount[]"]').value = data.tax_amount;
                            row.querySelector('[name="p_price[]"]').value = data.total_purchase_price;
                            row.querySelector('[name="exp_date[]"]').value = '';


                            // Make fields read-only
                            ['p_name[]', 'packing[]', 'unit_rate[]', 'tax[]', 'tax_amount[]', 'p_price[]'].forEach(field => {
                                row.querySelector(`[name="${field}"]`).readOnly = true;
                            });

                            // Calculate total price
                            calculateTotalPrice(row);
                        } else {
                            alert(data.error || 'Error fetching product details.');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("Error fetching product details:", error);
                        alert('Error fetching product details.');
                    }
                });
            }

            function filterModalProducts() {
                const searchValue = document.getElementById('productSearch').value.toLowerCase();
                const rows = document.querySelectorAll('#productTableBody tr');

                rows.forEach(row => {
                    const productName = row.children[1].textContent.toLowerCase();
                    row.style.display = productName.includes(searchValue) ? '' : 'none';
                });
            }
        </script>
        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
</body>

</html>