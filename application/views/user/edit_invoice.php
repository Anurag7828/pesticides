<!DOCTYPE html>
<html lang="en">

<head>

    <?php include "includes2/header-links.php" ?>
    <!-- Choices.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
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
                            <div
                                class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                <h6 class="text-[15px] font-medium text-body-color title relative">Update Invoice</h6>
                                <!--<a href="<?= base_url('Admin_Dashboard/vender/' . encryptId($user[0]['id'])) ?>" class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View Venders</a><br>-->
                            </div>
                            <form class="profile-form"
                                action="<?= base_url('Admin_Dashboard/edit_invoice?user_id=' . $user[0]['id'] . '&invoice_no=' . $invoice[0]['invoice_no']) ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                    <div class="row">
                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Select
                                                Stock</label>
                                            <select name="stock_place" id="stock_place" onchange="filterProducts()"
                                                class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                required>
                                                <option value="">Select Stock</option>
                                                <?php foreach ($stock_list as $stock_info) { ?>
                                                    <option value="<?= $stock_info['id']; ?>"
                                                        <?= ($invoice[0]['stock_place'] == $stock_info['id']) ? 'selected' : ''; ?>>
                                                        <?= $stock_info['place_name']; ?>
                                                    </option>
                                                <?php } ?>

                                            </select>

                                            <input type="hidden" name="user_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $user['0']['id'] ?>">
                                            <input type="hidden" name="branch_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $branchi ?>">

                                        </div>

                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Select
                                                Customer</label>
                                            <select name="customer_name" id="customer-name"
                                                class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                required>
                                                <option value="">Select Customer</option>
                                                <?php foreach ($customer_list as $customer_info) { ?>
                                                    <option value="<?= $customer_info['id']; ?>"
                                                        <?= ($customer_info['name'] == $customer['0']['name'] || $customer_info['id'] == $invoice[0]['customer_name']) ? 'selected' : ''; ?>>
                                                        <?= $customer_info['name']; ?>- <?= $customer_info['contact']; ?>
                                                    </option>
                                                <?php } ?>

                                            </select>

                                            <input type="hidden" id="uuid" name="user_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $user['0']['id'] ?>">

                                        </div>
                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                            <input type="date" name="date"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                value="<?= $invoice[0]['date'] ?>">
                                        </div>
                                        <hr>
                                        <div class="container-fluid">
                                            <!-- Other HTML code -->
                                            <div class="row">
                                                <div class="xl:w-6/4 lg:w-4/3">
                                                    <div class="card flex flex-col max-sm:mb-[30px] profile-card">

                                                        <div class="pb-0">
                                                            <div id="product-container1">
                                                                <?php
                                                                $i = 0;
                                                                $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'], 'user_id', $user[0]['id']); ?>
                                                                <?php foreach ($p_produc as $p_info):
                                                                    $i++; ?>
                                                                    <div id="product-container">
                                                                        <!-- Product fields that will be cloned -->
                                                                        <div class="row product-row"
                                                                            data-row="<?= $p_info['id'] ?>">
                                                                            <!-- Product Dropdown in the Row -->
                                                                            <div class="sm:w-1/4 w-full mb-[30px]">
                                                                                <?php if ($i == '1') { ?>
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Select
                                                                                        Product</label>
                                                                                <?php } ?>

                                                                                <?php $product_name = $this->CommonModal->getRowByMultitpleId('product', 'id', $p_info['p_name'], 'user_id', $user[0]['id']); ?>
                                                                                <input type="text"
                                                                                    id="product-input<?= $p_info['id'] ?>"
                                                                                    value="<?= $product_name[0]['product_name'] ?>"
                                                                                    class=" product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                    placeholder="Click to select product"
                                                                                    readonly
                                                                                    onclick="openProductModal(<?= $p_info['id'] ?>)">
                                                                                <input type="hidden"
                                                                                    id="product-input-value<?= $p_info['id'] ?>"
                                                                                    name="p_name[]"
                                                                                    value="<?= $p_info['p_name']; ?>"
                                                                                    class="product-input-value-pro form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full ">
                                                                            </div>
                                                                            <div id="productModal<?= $p_info['id'] ?>"
                                                                                class="modal fade fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-[1055]">
                                                                                <div
                                                                                    class="modal-dialog-centered w-full max-w-4xl">
                                                                                    <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] pointer-events-auto"
                                                                                        style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;margin-left: 158px;margin-top: -258px">

                                                                                        <!-- Modal Header -->
                                                                                        <div
                                                                                            class="modal-header flex justify-between items-center py-4 px-6 border-b border-gray-200 dark:border-gray-700">
                                                                                            <h5
                                                                                                class="text-lg font-bold text-gray-800 dark:text-white">
                                                                                                Select Product</h5>
                                                                                            <button type="button"
                                                                                                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                                                                                                onclick="closeProductModal(<?= $p_info['id'] ?>)">&times;</button>
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
                                                                                                    <a href="<?= base_url('Admin_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
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
                                                                                                                Product ID
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Product Name
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Unit</th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Packing</th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Expire Date
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Available
                                                                                                                Quantity
                                                                                                            </th>
                                                                                                            <th
                                                                                                                class="py-2 px-4">
                                                                                                                Total
                                                                                                                Product<br>
                                                                                                                Available
                                                                                                                Quantity
                                                                                                            </th>
                                                                                                            <!-- <th class="py-2 px-4">Select</th> -->
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                    <tbody
                                                                                                        id="productTableBody<?= $p_info['id'] ?>"
                                                                                                        class="bg-white dark:bg-gray-900">
                                                                                                    </tbody>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>

                                                                                        <!-- Modal Footer -->
                                                                                        <div
                                                                                            class="modal-footer flex justify-end py-4 px-6 border-t border-gray-200 dark:border-gray-700">
                                                                                            <a href="javascript:void(0);"
                                                                                                class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto"
                                                                                                onclick="closeProductModal(<?= $p_info['id'] ?>)">Close</a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="sm:w-1/6 w-full mb-[30px]">
                                                                                <?php if ($i == '1') { ?>
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Packing</label>
                                                                                <?php } ?>
                                                                                <input type="text"
                                                                                    value="<?= $product_name[0]['packing'] ?> <?= $product_name[0]['net_unit'] ?>"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    placeholder="packing"
                                                                                    id="packing-unit<?= $p_info['id'] ?>"
                                                                                    readonly required>


                                                                            </div>
                                                                            <?php if ($p_info['box_product'] == '1') { ?>
                                                                                <div id="us<?= $p_info['id'] ?>" class="unit-selection sm:w-1/6 w-full mb-[30px]"
                                                                                    data-index="<?= $p_info['id'] ?>" style="display: block;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                                                                                    <select name="box[]"
                                                                                        data-index="<?= $p_info['id'] ?>"
                                                                                        class="unit-single-pro form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                                        required>
                                                                                        <option value="Box"
                                                                                            <?= ($p_info['box'] == 'Box') ? 'selected' : '' ?>>Box</option>
                                                                                        <option value="Single"
                                                                                            <?= ($p_info['box'] == 'Single') ? 'selected' : '' ?>>Single</option>
                                                                                    </select>
                                                                                </div>
                                                                            <?php } ?>
                                                                            

                                                                            <div class="sm:w-1/6 mb-[30px]">
                                                                                <?php if ($i == '1') { ?>
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
                                                                                <?php } ?>
                                                                                <?php $pp_produc = $this->CommonModal->getRowById('purchase_product', 'p_id', $p_info['packing']); ?>
                                                                                <input type="hidden"
                                                                                    name="available_quantity[]" class="available-quantity-pro form-control text-[13px] text-body-color h-[2.813rem] 
           border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                                    data-index="<?= $p_info['id'] ?>"
                                                                                    required readonly value="<?= ($p_info['box_product'] == '1')
                                                                                        ? (($p_info['box'] == 'Box')
                                                                                            ? $pp_produc[0]['availabile_quantity']
                                                                                            : $pp_produc[0]['per_product_available_quantity'])
                                                                                        : $pp_produc[0]['availabile_quantity']; ?>" id="available<?= $p_info['id'] ?>">



                                                                                <?php
                                                                                $newava = ($p_info['box_product'] == '1')
                                                                                    ? (($p_info['box'] == 'Box')
                                                                                        ? $pp_produc[0]['availabile_quantity'] + $p_info['quantity']
                                                                                        : $pp_produc[0]['per_product_available_quantity'] + $p_info['quantity'])
                                                                                    : $pp_produc[0]['availabile_quantity'] + $p_info['quantity'];
                                                                                ?>

                                                                                <input type="hidden"
                                                                                    class="new-available-quantity-pro form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    id="availablee<?= $p_info['id'] ?>"
                                                                                    required readonly
                                                                                    value="<?= $newava ?>">
                                                                                <input type="hidden" name="per_box[]"
                                                                                    class="per-box-pro form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                    id="per_box<?= $p_info['id'] ?>"
                                                                                    required readonly
                                                                                    value="<?= $p_info['per_box'] ?> ">
                                                                                <input type="text" name="quantity[]"
                                                                                    class="quantity-pro qty form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                                    placeholder="Quantity"
                                                                                    id="blankquantity<?= $p_info['id'] ?>"
                                                                                    required
                                                                                    oninput=" calculateTotalPrice(this.closest('.row'))"
                                                                                    value="<?= $p_info['quantity'] ?> ">

                                                                            </div>
                                                                            <div class="sm:w-1/6 w-full mb-[30px]">
                                                                                <?php if ($i == '1') { ?>
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Unit
                                                                                        Rate</label>
                                                                                <?php } ?>
                                                                                <input type="hidden" name="invoice_id[]"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    id="inv_id<?= $p_info['id'] ?>"
                                                                                    value=" <?= $p_info['id'] ?> " required
                                                                                    readonly>
                                                                                <input type="hidden" name="p_id[]"
                                                                                    class="p_id-pro form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    id="p_id<?= $p_info['id'] ?>"
                                                                                    value="<?= $p_info['packing'] ?>"
                                                                                    required readonly>
                                                                                <input type="hidden" name="packing[]"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    id="packing<?= $p_info['id'] ?>"
                                                                                    value=" <?= $p_info['packing'] ?> "
                                                                                    required readonly>
                                                                                <input type="float" name="unit_rate[]"
                                                                                    class="unit-rate-pro form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                                    placeholder="Unit Rate"
                                                                                    id="unit-rate<?= $p_info['id'] ?>"
                                                                                    oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                    required
                                                                                    value="<?= $p_info['unit_rate'] ?> ">
                                                                            </div>
                                                                            <div class="sm:w-1/6 w-full mb-[30px]">
                                                                                <?php if ($i == '1') { ?>
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Total
                                                                                        Price</label>
                                                                                <?php } ?>
                                                                                <input type="float" name="total_price[]"
                                                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                    oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                                    placeholder="Total Price" required
                                                                                    value="<?= $p_info['total_price'] ?> ">
                                                                            </div>
                                                                            <div class="mb-[30px] d-flex align-items-center"
                                                                                style="width: 60px; <?php if ($i == '1') {
                                                                                    echo 'margin-top: 25px;';
                                                                                } ?>">

                                                                                <a class="btn btn-danger border border-b-color block rounded-md py-1.5 px-3 outline-none"
                                                                                    href="<?= base_url('Admin_Dashboard/delete_invoice' . '?BdID=' . $p_info['id'] . '&UI=' . $p_info['user_id'] . '&inv=' . $p_info['invoice_no'] . '&p_id=' . $p_info['packing']); ?>"
                                                                                    onclick="deleteProductForrm(event, this);">
                                                                                    <i class="fas fa-trash-alt"
                                                                                        style="color:red;"></i>
                                                                                </a>

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
                                                            <div class="row">
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>
                                                                    Sub Total
                                                                    <input type="float" id="grand-total"
                                                                        name="grand_total[]"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder="total price"
                                                                        value="<?= $invoice[0]['grand_total'] ?> ">
                                                                </div>
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Type</label>
                                                                    <select id="discount-type" name="discount_type"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full">
                                                                        <option value="percent">Select Discount type
                                                                        </option>
                                                                        <option value="percent"
                                                                            <?= ($invoice[0]['discount_type'] == 'percent') ? 'selected' : ''; ?>>Discount in Percentage
                                                                        </option>
                                                                        <option value="rupee"
                                                                            <?= ($invoice[0]['discount_type'] == 'rupee') ? 'selected' : ''; ?>>Discount in Rupee
                                                                        </option>
                                                                    </select>
                                                                </div>

                                                                <!-- Discount Value Field -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Value</label>
                                                                    <input type="float" id="discount-value"
                                                                        name="discount"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder="enter discount value"
                                                                        value="<?= $invoice[0]['discount'] ?> ">
                                                                </div>
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>
                                                                    Total Without Tax
                                                                    <input type="float" id="total-without"
                                                                        name="total_without_tax"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder=" Total Without Tax"
                                                                        value="<?= $invoice[0]['total_without_tax'] ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>
                                                                    Tax Amount (GST <?= $user[0]['tax'] ?>%)
                                                                    <input type="hidden" id="tax"
                                                                        value="<?= $user[0]['tax'] ?>"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="total price">
                                                                    <input type="float" id="tax-amount"
                                                                        name="tax_amount"
                                                                        value="<?= $invoice[0]['tax_amount'] ?>"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder="total price">
                                                                </div>

                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>Final
                                                                    Total
                                                                    <input type="float" id="final-total"
                                                                        name="final_total"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder="Final Total"
                                                                        value="<?= $invoice[0]['final_total'] ?>">
                                                                </div>
                                                                <?php
                                                                $selected_interest = isset($invoice[0]['include_interest']) ? $invoice[0]['include_interest'] : 0;
                                                                ?>


                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[14px] font-semibold mb-2 block">
                                                                        Do you want to include interest?
                                                                    </label>

                                                                    <div class="flex items-center">
                                                                        <input type="radio" id="interest-yes"
                                                                            name="include_interest" value="1"
                                                                            class="mr-2" <?= ($selected_interest == 1) ? 'checked' : '' ?>>
                                                                        <label for="interest-yes"
                                                                            class="text-dark dark:text-white text-[13px] mr-4">Yes</label>

                                                                        <input type="radio" id="interest-no"
                                                                            name="include_interest" value="0"
                                                                            class="mr-2" <?= ($selected_interest == 0) ? 'checked' : '' ?>>
                                                                        <label for="interest-no"
                                                                            class="text-dark dark:text-white text-[13px]">No</label>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <hr>
                                                            <?php
                                                            $invoice_payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $invoice[0]['invoice_no'], 'user_id', $user_id[0]['id'], 'id', 'ASC', '1');
                                                            ?>
                                                            <div class="row">

                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Payment
                                                                        Mode</label>
                                                                    <select name="mode"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                        id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                        <option value="Cash"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Cash') !== false ? 'selected' : '' ?>>CASH
                                                                        </option>
                                                                        <option value="Upi"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Upi') !== false ? 'selected' : '' ?>>UPI
                                                                        </option>
                                                                        <option value="Card"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Card') !== false ? 'selected' : '' ?>>
                                                                            CREADIT/DEBIT</option>
                                                                        <option value="Bank"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Bank') !== false ? 'selected' : '' ?>>Bank
                                                                            Transfer</option>
                                                                        <option value="Cheque"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Cheque') !== false ? 'selected' : '' ?>>
                                                                            Cheque</option>
                                                                        <option value="None"
                                                                            <?= strpos($invoice_payment[0]['mode'], 'None') !== false ? 'selected' : '' ?>>None
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
                                                                                <?= strpos($invoice_payment[0]['bank'], $account_info['id']) !== false ? 'selected' : '' ?>>
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
                                                                        value="<?= $invoice_payment[0]['cheque_no'] ?>">
                                                                </div>
                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>Paid
                                                                    Amount
                                                                    <input type="float" name="paid"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="paid amount"
                                                                        value="<?= $invoice_payment[0]['paid'] ?>"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, ''); "
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46">
                                                                    <input type="hidden" name="p_p_id"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                        placeholder="paid amount"
                                                                        value="<?= $invoice_payment[0]['id'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div
                                                            class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                                            <button type="submit" id="add-product-btn"
                                                                class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Update
                                                                Sales</button>
                                                        </div>
                                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="productModalll"
            class="modal fade fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-[1055]">
            <div class="modal-dialog-centered w-full max-w-4xl">
                <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] pointer-events-auto"
                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;margin-left: 158px;margin-top: 158px">

                    <!-- Modal Header -->
                    <div
                        class="modal-header flex justify-between items-center py-4 px-6 border-b border-gray-200 dark:border-gray-700">
                        <h5 class="text-lg font-bold text-gray-800 dark:text-white">Select Product</h5>
                        <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                            onclick="closeProductModalll()">&times;</button>
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
                                <a href="<?= base_url('Admin_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
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
                                        <th class="py-2 px-4">Unit</th>
                                        <th class="py-2 px-4">Packing</th>
                                        <th class="py-2 px-4">Expire Date</th>
                                        <th class="py-2 px-4">Available Quantity</th>
                                        <th class="py-2 px-4">Total Product<br> Available Quantity</th>
                                        <!-- <th class="py-2 px-4">Select</th> -->
                                    </tr>
                                </thead>
                                <tbody id="productTableBody" class="bg-white dark:bg-gray-900"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer flex justify-end py-4 px-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="javascript:void(0);"
                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto"
                            onclick="closeProductModalll()">Close</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            // Function to add a new product row
            document.addEventListener("DOMContentLoaded", function () {
                initializeChoices();
            });

            function initializeChoices() {
                document.querySelectorAll("select.choicees").forEach(select => {
                    if (!select.classList.contains("choices-initialized")) { // Prevent duplicate initialization
                        new Choices(select, {
                            searchEnabled: true,
                            itemSelectText: "",
                            shouldSort: false,
                            removeItemButton: false
                        });
                        select.classList.add("choices-initialized");
                    }
                });
            }
            function addProductForm() {
                const productContainer = document.getElementById('product-container1');
                const newProductRow = document.createElement('div');
                const rowIndex = document.querySelectorAll('.product-row').length; // Index to keep track of each row

                newProductRow.classList.add('row', 'product-row');

                newProductRow.innerHTML = `
        <div class="row product-row" data-index="${rowIndex}">
            <div class="sm:w-1/4 w-full mb-[40px]" style="width: 298px !important;">
                  
<input type="text" class="product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " 
       placeholder="Click to select product" 
       readonly onclick="openProductClassModall(${rowIndex})"
       data-index="${rowIndex}">
         <input type="hidden" id="product-input-value"name="p_name[]" 
                                                                            class="product-input-value form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " data-index="${rowIndex}" 
                                                                           >
            </div>
             
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 203px !important;">
              
                    
                    <input type="hidden" name="packing[]" class="form-control b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full packing" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>
              
                <input type="text"  class="packing-unit form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " placeholder="Packing" required data-index="${rowIndex}" readonly >
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 202px !important;">
               
                    
                    <input type="hidden"  name="available_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full available-quantity" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>

               <input type="hidden"  name="per_box[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full per_box" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>
                <input type="number" id="pp" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full quantityy" placeholder="Quantity" required        oninput="calculateTotalPrice(this.closest('.product-row')); checkAvailableQuantityy1(this.closest('.product-row'))" data-index="${rowIndex}">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 200px !important;">
                  <input type="hidden"  name="invoice_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " data-index="${rowIndex}" value="-11" required >
                                <input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  p-id-select" data-index="${rowIndex}" required >
                <input type="number" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  unit-rate-select" data-index="${rowIndex}" placeholder="Unit Rate" required oninput="calculateTotalPrice(this.closest('.product-row'))">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 200px !important;">
             
                <input type="number" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" readonly>
            </div>
                                          <div class=" mb-[30px] d-flex align-items-center" style="width: 20px;">
                <button type="button" class="btn btn-danger form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none " onclick="deleteProductForm(this)">
                    <i class="fas fa-trash-alt" style="color:red;"></i>
                </button>
            </div>
        </div>
    `;

                productContainer.appendChild(newProductRow);
                var productSelect = newProductRow.querySelector(`.category-select[data-index="${rowIndex}"]`);
                if (productSelect.choicesInstance) {
                    productSelect.choicesInstance.destroy();
                }


                productSelect.choicesInstance = new Choices(productSelect, {
                    searchEnabled: true,
                    itemSelectText: "",
                    shouldSort: false,
                    removeItemButton: false
                });

            }


            // Open Product Modal
            function openProductClassModall(rowIndex) {
                const stockPlaceId = document.getElementById('stock_place').value;

                if (!stockPlaceId) {
                    alert('Please select a stock place first.');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                    type: 'POST',
                    data: { stock_place_id: stockPlaceId },
                    dataType: 'json',
                    success: function (products) {
                        const tableBody = document.getElementById('productTableBody');
                        tableBody.innerHTML = '';

                        if (products.length === 0) {
                            tableBody.innerHTML = `<tr><td colspan='7' class='text-center text-gray-500'>No products available</td></tr>`;
                        } else {
                            products.forEach(product => {
                                const row = `<tr class='border-b'>
                        <td class="py-2 px-4">${product.product_id}</td>
                        <td class="py-2 px-4"><a href="javascript:void(0);"onclick="selectaddProducttt('${product.pro_id}', '${product.product_name}', '${product.unit}', '${product.packing}', '${product.net_unit}', '${product.p_id}','${product.box}', '${rowIndex}')">${product.product_name}</a></td>
                        <td class="py-2 px-4">${product.unit}</td>
                        <td class="py-2 px-4">${product.packing}${product.net_unit}</td>
                        <td class="py-2 px-4">${product.exp_date}</td>
                        <td class="py-2 px-4">${product.availabile_quantity}${product.box === '1' ? ' (Box)' : ''}</td>
                            <td class="py-2 px-4">${product.box === '1' ? product.per_product_available_quantity : 'Single'}</td>
                    </tr>`;
                                tableBody.innerHTML += row;
                            });
                        }

                        document.getElementById('productModalll').classList.remove('hidden');
                    },
                    error: function () {
                        console.error('Failed to fetch products.');
                    }
                });
            }

            // Select Product from Modal
            function selectaddProducttt(proId, productName, unit, packing, netUnit, pId, box, rowIndex) {
                const productInput = document.querySelector(`input.product-input[data-index="${rowIndex}"]`);
                const productInputvalue = document.querySelector(`input.product-input-value[data-index="${rowIndex}"]`);
                const unitRateField = document.querySelector(`input.unit-rate-select[data-index="${rowIndex}"]`);
                const availableQuantity = document.querySelector(`input.available-quantity[data-index="${rowIndex}"]`);
                const perBox = document.querySelector(`input.per_box[data-index="${rowIndex}"]`);

                const packingInput = document.querySelector(`input.packing[data-index="${rowIndex}"]`);
                const row = document.querySelector(`.product-row[data-index="${rowIndex}"]`);
                const packingunit = document.querySelector(`input.packing-unit[data-index="${rowIndex}"]`);
                const pIdField = document.querySelector(`input.p-id-select[data-index="${rowIndex}"]`);
                const quantity = document.querySelector(`input.quantityy[data-index="${rowIndex}"]`);
                const customerSelect = document.getElementById('customer-name');
                const selectedCustomerID = customerSelect.value; // Get selected customer ID

                if (!selectedCustomerID) {
                    alert('Please select a customer first!');
                    return;
                }
                // Set product values
                productInput.value = productName;
                packingInput.value = pId;
                unitRateField.value = ''; // Clear previous rate
                availableQuantity.value = ''; // Clear previous quantity
                perBox.value = ''; // Clear previous quantity

                pIdField.value = pId; // Store product ID

                closeProductModalll();

                // Add Unit Selection if box is enabled
                if (box == 1) {
                    let packingUnit = document.querySelector(`input.packing-unit[data-index="${rowIndex}"]`); // Get the Packing input field
                    let existingUnitSelection = document.querySelector(`.unit-selection[data-index="${rowIndex}"]`);

                    if (!existingUnitSelection) {
                        let unitSelectHTML = `
                <div class="unit-selection sm:w-1/6 w-full mb-[30px]" data-index="${rowIndex}">
         
                    <select name="box[]" data-index="${rowIndex}" class="unit-single form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
                 <option value="" selected>Select Unit</option>

                        <option value="Box">Box</option>
                        <option value="Single">Single</option>
                    </select>
                </div>`;

                        // Insert the new unit selection field AFTER the Packing input field
                        packingUnit.parentNode.insertAdjacentHTML('afterend', unitSelectHTML);
                    }
                } else {
                    // Remove the unit selection if box is not 1
                    let unitSelection = document.querySelector(`.unit-selection[data-index="${rowIndex}"]`);
                    if (unitSelection) {
                        unitSelection.remove();
                    }
                }

                // Function to update product details (unit rate & available quantity)
                function updateProductDetails() {
                    let selectedUnit = document.querySelector(`select.unit-single[data-index="${rowIndex}"]`)?.value || 'Box'; // Get selected unit

                    // Fetch product details (selling price, unit rate)
                    $.ajax({
                        url: `<?= base_url("Admin_Dashboard/get_product_details_with_customer/") ?>${proId}/${selectedCustomerID}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data) {
                                unitRateField.value = (selectedUnit === 'Box') ? data.final_price : data.per_product_final_price;
                                packingunit.value = data.packing + data.net_unit;
                                perBox.value = data.box_per_unit || 0;

                                productInput.value = productName;
                                productInputvalue.value = data.id;
                                quantity.value = '1';
                                calculateTotalPrice(row);
                            }
                        },
                        error: function () {
                            alert('Error fetching product details.');
                        }
                    });

                    // Fetch available quantity
                    $.ajax({
                        url: `<?= base_url("Admin_Dashboard/get_unit_rate/") ?>${pId}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data) {
                                availableQuantity.value = (selectedUnit === 'Box') ? (data.availabile_quantity || '0') : (data.per_product_available_quantity || '0');
                            } else {
                                availableQuantity.value = '0';
                            }
                        },
                        error: function () {
                            alert('Failed to fetch unit rate.');
                        }
                    });
                }

                // **Call function on page load** to fetch default values
                updateProductDetails();

                // **Bind change event dynamically for unit selection**
                $(document).off('change', `.unit-single[data-index="${rowIndex}"]`).on('change', `.unit-single[data-index="${rowIndex}"]`, function () {
                    updateProductDetails();
                });
            }

            function closeProductModalll() {
                document.getElementById('productModalll').classList.add('hidden');
            }



            // Function to delete a product row
            function deleteProductForm(button) {
                const productRow = button.closest('.product-row');
                productRow.remove();
                updateGrandTotal();
            }

            // Function to calculate total price based on quantity and unit rate
            function calculateTotalPrice(row) {
                const quantityInput = row.querySelector('input[name="quantity[]"]');
                const unitRate = parseFloat(row.querySelector('input[name="unit_rate[]"]').value) || 0;
                const totalPriceInput = row.querySelector('input[name="total_price[]"]');

                // Set default quantity to 1 if empty
                if (!quantityInput.value) {
                    quantityInput.value = 1;
                }

                const quantity = parseFloat(quantityInput.value) || 1;
                const totalPrice = (quantity * unitRate).toFixed(2);
                totalPriceInput.value = totalPrice;

                // Update grand total after calculating each row's total price
                updateGrandTotal();
            }

            // Function to update the grand total
            function updateGrandTotal() {
                const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
                let grandTotal = 0;

                // Calculate the grand total
                totalPriceInputs.forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });

                // Get discount details
                const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;
                const discountType = document.getElementById('discount-type').value;
                let discountAmount = 0;

                // Calculate discount amount
                if (discountType === 'percent') {
                    discountAmount = (grandTotal * discountValue) / 100;
                } else if (discountType === 'rupee') {
                    discountAmount = discountValue;
                }

                // Calculate final total after discount
                const finalTotalWithoutTax = grandTotal - discountAmount;

                // Ensure final total does not go negative
                const adjustedFinalTotal = Math.max(finalTotalWithoutTax, 0);

                // Calculate tax
                const taxRate = parseFloat(document.getElementById('tax').value) || 0;
                const taxAmount = (adjustedFinalTotal * taxRate) / 100;

                // Calculate final total including tax
                const finalTotalWithTax = adjustedFinalTotal + taxAmount;

                // Update UI
                document.getElementById('grand-total').value = grandTotal.toFixed(2);
                document.getElementById('total-without').value = adjustedFinalTotal.toFixed(2);
                document.getElementById('tax-amount').value = taxAmount.toFixed(2);
                document.getElementById('final-total').value = finalTotalWithTax.toFixed(2);
            }

            function formatDate(dateString) {
                const date = new Date(dateString);
                if (isNaN(date.getTime())) {
                    return "Invalid Date";
                }
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Month is 0-based
                const year = date.getFullYear();
                return `${day}-${month}-${year}`;
            }
            // Fetch Unit Rate and Quantity
            function checkAvailableQuantityy1(row) {
                var p_id = $(row).find('input[name="p_id[]"]').val();  // ✅ wrapped in $()
                checkAvailableQuantity2(row, p_id);
            }

            function checkAvailableQuantity2(row, p_id) {
                if (!p_id) {
                    console.error('Product ID not found.');
                    return;
                }

                var availableQuantity = parseFloat($(row).find('input[name="available_quantity[]"]').val()) || 0;
                var enteredQuantity = parseFloat($(row).find('input[name="quantity[]"]').val()) || 0;

                if (enteredQuantity > availableQuantity) {
                    alert("Product quantity is not available. Maximum available: " + availableQuantity);
                    $(row).find('input[name="quantity[]"]').val('');
                }
            }







            // Add new product row on button click
            $('#add-product-btn').on('click', function () {
                addProductForm();
            });


        </script>
        <script>

            function toggleBankDetails() {
                const paymentMode = document.getElementById('paymentMode').value;

                // References to the details sections and fields
                const bankDetails = document.getElementById('bankDetails');
                const chequeDetails = document.getElementById('chequeDetails');
                const bankAccount = document.getElementById('bankAccount');
                const chequeField = document.getElementById('cheque');

                // Hide all details by default
                bankDetails.style.display = 'none';
                chequeDetails.style.display = 'none';
                bankAccount.removeAttribute('required');
                chequeField.removeAttribute('required');

                // Display relevant fields based on the selected option
                if (paymentMode === 'Bank') {
                    bankDetails.style.display = 'block';
                    bankAccount.setAttribute('required', 'required');
                } else if (paymentMode === 'Cheque') {
                    chequeDetails.style.display = 'block';
                    chequeField.setAttribute('required', 'required');
                }
            }

            // Attach the event listener to `paymentMode`
            document.getElementById('paymentMode').addEventListener('change', toggleBankDetails);

            // Call the function on page load to handle pre-selected values
            window.onload = toggleBankDetails;


        </script>
        <script>
            function openProductModal(productId) {
                const stockPlaceId = document.getElementById('stock_place').value;

                if (!stockPlaceId) {
                    alert('Please select a stock place first.');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                    type: 'POST',
                    data: { stock_place_id: stockPlaceId },
                    dataType: 'json',
                    success: function (products) {
                        const tableBody = document.getElementById(`productTableBody${productId}`);
                        tableBody.innerHTML = '';

                        if (products.length === 0) {
                            tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-gray-500">No products available</td></tr>`;
                        } else {
                            products.forEach(product => {
                                const row = `<tr class="border-b">
            <td class="py-2 px-4">${product.product_id}</td>
            <td class="py-2 px-4"><a href="javascript:void(0);" onclick="selectProduct('${product.pro_id}', '${product.product_name}', '${product.unit}', '${product.packing}', '${product.net_unit}', '${product.p_id}', '${product.box}', '${productId}')">${product.product_name}</a></td>
            <td class="py-2 px-4">${product.unit}</td>
          
            <td class="py-2 px-4">${product.packing}${product.net_unit}</td>
            <td class="py-2 px-4">${product.exp_date}</td>
            <td class="py-2 px-4">${product.availabile_quantity}${product.box === '1' ? ' (Box)' : ''}</td>
                 <td class="py-2 px-4">${product.box === '1' ? product.per_product_available_quantity : 'Single'}</td>
         
          </tr>`;
                                tableBody.innerHTML += row;
                            });
                        }

                        document.getElementById(`productModal${productId}`).classList.remove('hidden');
                    },
                    error: function () {
                        console.error('Failed to fetch products.');
                    }
                });
            }



            // Product Selection Logic

            function selectProduct(pro_id, product_name, unit, packing, net_unit, p_id, box, in_id) {
                const customerSelect = document.getElementById('customer-name');
       

                const selectedCustomerID = customerSelect ? customerSelect.value : null;

                if (!selectedCustomerID) {
                    alert('Please select a customer first!');
                    return;
                }

                closeProductModal(in_id);

                // Find the specific row where the product is being selected
                let currentRow = document.querySelector(`.product-row[data-row="${in_id}"]`);

                if (!currentRow) {
                    console.warn(`No row found for ID: ${in_id}`);
                    return;
                }

                // Update only the selected row
                const productInput = currentRow.querySelector(`#product-input${in_id}`);
                const productInputValue = currentRow.querySelector(`#product-input-value${in_id}`);

                if (productInputValue) {
                    productInputValue.value = pro_id;
                } else {
                    console.warn(`product-input-value${in_id} not found!`);
                }
                if (productInput) {
                    productInput.value = product_name;
                } else {
                    console.warn(`product-input${in_id} not found!`);
                }

                currentRow.querySelector(`#p_id${in_id}`).value = p_id;
                currentRow.querySelector(`#packing${in_id}`).value = packing;
       let dus = currentRow.querySelector(`#us${in_id}`);

                let packingUnit = currentRow.querySelector(`#packing-unit${in_id}`);
                if (!packingUnit) return;

                if (box == 1 && !document.getElementById(`unit-selection${in_id}`)) {
                    dus.style.display = 'none';
                    dus.value='';
                    let unitSelectHTML = `
            <div id="unit-selection${in_id}" class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                <select id="unit-single${in_id}" name="box[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" required>
                 <option value="" selected>Select Unit</option>
                    <option value="Box">Box</option>
                    <option value="Single">Single</option>
                </select>
            </div>`;
                    packingUnit.parentNode.insertAdjacentHTML('afterend', unitSelectHTML);
                } else {
                    dus.style.display = 'none';
dus.value='';
                    let unitSelection = document.getElementById(`unit-selection${in_id}`);
                    if (unitSelection) {
                        unitSelection.remove();
                    }
                }

                function updateProductDetails() {
                    let selectedUnit = document.querySelector(`#unit-single${in_id}`)?.value || 'Box';

                    $.ajax({
                        url: `<?= base_url("Admin_Dashboard/get_product_details_with_customer/") ?>${pro_id}/${selectedCustomerID}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data) {
                                currentRow.querySelector(`#unit-rate${in_id}`).value = data.final_price;
                                currentRow.querySelector(`#packing-unit${in_id}`).value = `${data.packing} ${data.net_unit}`;
                                currentRow.querySelector(`#per_box${in_id}`).value = data.box_per_unit || 0;

                                currentRow.querySelector(`#blankquantity${in_id}`).value = 1;
                                calculateTotalPrice(currentRow);
                            }
                        },
                        error: function () {
                            alert('Error fetching product details.');
                        }
                    });

                    $.ajax({
                        url: `<?= base_url("Admin_Dashboard/get_unit_rate/") ?>${p_id}`,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data) {
                                currentRow.querySelector(`#available${in_id}`).value = selectedUnit === 'Box' ? data.availabile_quantity : data.per_product_available_quantity;
                                currentRow.querySelector(`#availablee${in_id}`).value = selectedUnit === 'Box' ? data.availabile_quantity : data.per_product_available_quantity;
                                console.log(" Available Quantity Found in Response:", data);
                            } else {
                                currentRow.querySelector(`#available${in_id}`).value = '0';
                                console.log("No Available Quantity Found in Response:", data);
                            }
                        },
                        error: function () {
                            alert('Failed to fetch unit rate.');
                        }
                    });
                }

                updateProductDetails();

                $(document).on('change', `#unit-single${in_id}`, function () {
                    updateProductDetails();
                });
            }

            function closeProductModal(productId) {
                document.getElementById(`productModal${productId}`).classList.add('hidden');
            }



            function filterModalProducts() {
                const searchValue = document.getElementById('productSearch').value.toLowerCase();
                const rows = document.querySelectorAll('#productTableBody tr');

                rows.forEach(row => {
                    const productName = row.children[1].textContent.toLowerCase();
                    row.style.display = productName.includes(searchValue) ? '' : 'none';
                });
            }
            function deleteProductForm(button) {
                const productRow = button.closest('.product-row');
                productRow.remove();
                updateGrandTotal();
            }
            $(document).on('change', '.unit-single-pro', function () {
                let rowIndex = $(this).data('index'); // Get row index
                let selectedUnit = $(this).val(); // Get selected unit (Box/Single)
                let row = $(`.product-row[data-row="${rowIndex}"]`); // Find the correct row

                let proId = row.find('.product-input-value-pro').val(); // Product ID
                let pId = row.find('.p_id-pro').val(); // Packing ID
                const customerSelect = document.getElementById('customer-name');
                const selectedCustomerID = customerSelect ? customerSelect.value : null;

                if (!selectedCustomerID) {
                    alert('Please select a customer first!');
                    return;
                }

                let unitRateField = row.find('.unit-rate-pro');
                let packingUnit = row.find('.packing-unit-pro');
                let perBox = row.find('.per-box-pro');
                let availableQuantity = row.find('.available-quantity-pro'); // ✅ Correct selection
                let NewavailableQuantity = row.find('.new-available-quantity-pro'); // ✅ Correct selection

                let quantity = row.find('.quantity-pro');

                // Fetch product details (selling price, unit rate)
                $.ajax({
                    url: `<?= base_url("Admin_Dashboard/get_product_details_with_customer/") ?>${proId}/${selectedCustomerID}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data) {
                            unitRateField.val(selectedUnit === 'Box' ? data.final_price : data.per_product_final_price);
                            packingUnit.val(data.packing + ' ' + data.net_unit);
                            perBox.val(data.box_per_unit || 0);
                            quantity.val('1');
                            calculateTotalPrice(row[0]); // Calculate price
                        }
                    },
                    error: function () {
                        alert('Error fetching product details.');
                    }
                });

                $.ajax({
                    url: `<?= base_url("Admin_Dashboard/get_unit_rate/") ?>${pId}`,
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {


                        if (data && (data.availabile_quantity || data.per_product_available_quantity)) {
                            let availQty = selectedUnit === 'Box'
                                ? (data.availabile_quantity || '0')
                                : (data.per_product_available_quantity || '0');
                            let newavailQty = selectedUnit === 'Box'
                                ? (data.availabile_quantity || '0')
                                : (data.per_product_available_quantity || '0');
                            availableQuantity.val(availQty);
                            NewavailableQuantity.val(newavailQty);

                            // ✅ Debugging
                        } else {
                            availableQuantity.val('0');
                            NewavailableQuantity.val('0');
                            console.log("No Available Quantity Found in Response:", data); // ✅ Debugging
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("AJAX Error:", status, error); // ✅ Log AJAX errors
                        alert('Failed to fetch unit rate.');
                    }
                });

            });


            function calculateTotalPrice(row) {
                if (!row) {
                    console.error('Row not found!');
                    return;
                }

                const quantityInput = row.querySelector('input[name="quantity[]"]');
                const unitRateInput = row.querySelector('input[name="unit_rate[]"]');
                const totalPriceInput = row.querySelector('input[name="total_price[]"]');

                if (!quantityInput || !unitRateInput || !totalPriceInput) {
                    console.error('Missing input fields');
                    return;
                }

                const quantity = parseFloat(quantityInput.value) || 0;
                const unitRate = parseFloat(unitRateInput.value) || 0;

                // Calculate total price
                const totalPrice = (quantity * unitRate).toFixed(2);
                totalPriceInput.value = totalPrice;

                console.log(`Quantity: ${quantity}, Unit Rate: ${unitRate}, Total Price: ${totalPrice}`);
                updateGrandTotal();
            }




            // Function to update the grand total and final total
            function updateGrandTotal() {
                const totalPriceInputs = document.querySelectorAll('input[name="total_price[]"]');
                let grandTotal = 0;

                // Sum up all total prices
                totalPriceInputs.forEach(input => {
                    grandTotal += parseFloat(input.value) || 0;
                });

                // Get discount value and type
                const discountValue = parseFloat(document.getElementById('discount-value').value) || 0;
                const discountType = document.getElementById('discount-type').value;

                let discountAmount = 0; // Declare discountAmount here to ensure it's accessible

                // Apply the discount based on the selected discount type
                if (discountType === 'percent') {
                    discountAmount = (grandTotal * discountValue) / 100;
                } else if (discountType === 'rupee') {
                    discountAmount = discountValue;
                }

                // Ensure grand total does not become negative after applying discount
                const finalTotalWithoutTax = Math.max(grandTotal - discountAmount, 0);

                // Calculate tax
                const tax = parseFloat(document.getElementById('tax').value) || 0;
                const taxAmount = (finalTotalWithoutTax * tax) / 100;

                // Calculate final total including tax
                const finalTotalWithTax = finalTotalWithoutTax + taxAmount;

                // Update the input fields
                document.getElementById('grand-total').value = grandTotal.toFixed(2);
                document.getElementById('total-without').value = finalTotalWithoutTax.toFixed(2);
                document.getElementById('tax-amount').value = taxAmount.toFixed(2);
                document.getElementById('final-total').value = finalTotalWithTax.toFixed(2);
            }

            // Add event listener to the discount input to update totals when changed
            document.getElementById('discount-value').addEventListener('input', updateGrandTotal);
            document.getElementById('discount-type').addEventListener('change', updateGrandTotal);

            $(document).on('input', '.qty', function () {
                var row = $(this).closest('.product-row');
                var rowIndex = row.find('input[name="quantity[]"]').attr('id').replace('blankquantity', '');
                var availableQuantity = parseFloat($('#availablee' + rowIndex).val()) || 0;
                var enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

                if (enteredQuantity > availableQuantity) {
                    alert("Product quantity is not available. Maximum available: " + availableQuantity);
                    row.find('input[name="quantity[]"]').val('');
                }
            });
        </script>

        <script>


            $(document).on('click', '#add-product-btn', function (event) {
                var paidInput = $('input[name="paid"]'); // Corrected selector to target input with name "paid"
                if (!checkAvailablePaid(paidInput)) {
                    event.preventDefault(); // Prevent the button's default action
                }
            });

            function checkAvailablePaid(inputElement) {
                var grandTotal = parseFloat($('#final-total').val()) || 0;
                var paid = parseFloat(inputElement.val()) || 0;

                if (paid > grandTotal) {
                    alert("Paid amount exceeds the Grand Total of " + grandTotal);
                    inputElement.val(''); // Reset the input field
                    return false; // Indicate that the check failed
                }

                return true; // Indicate that the check passed
            }



        </script>
        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
</body>

</html>