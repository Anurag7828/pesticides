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
                                <h6 class="text-[15px] font-medium text-body-color title relative">Create Invoice</h6>
                                <button type="button"
                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn "
                                    data-dz-modal="exampleModalCenterstock">Add Stock Place</button>
                                <button type="button"
                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn "
                                    data-dz-modal="exampleModalCentercustomer">Add Customer</button>
                                <a href="<?= base_url('Admin_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn">
                                    Add product</a>
                            </div>
                            <form class="profile-form"
                                action="<?= base_url('Admin_Dashboard/add_invoice/' . encryptId($user['0']['id'])) ?>"
                                method="post" enctype="multipart/form-data">
                                <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                    <div class="row">
                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Select
                                                Stock</label>
                                            <select name="stock_place" id="stock_place" onchange="filterProducts()"
                                                class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                required>
                                                <option value="">Select Stock</option>
                                                <?php foreach ($stock_list as $stock_info) { ?>
                                                    <option value="<?= $stock_info['id']; ?>">
                                                        <?= $stock_info['place_name']; ?>
                                                    </option>
                                                <?php } ?>

                                            </select>
                                            <input type="hidden" id="uuid" name="user_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $user['0']['id'] ?>">
                                            <!--<input type="hidden" name="uid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['user_id'] ?>">-->
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
                                                        <?= ($customer_info['name'] == $customer['0']['name']) ? 'selected' : ''; ?>>
                                                        <?= $customer_info['name']; ?> - <?= $customer_info['contact']; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>


                                            <input type="hidden" name="user_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $user['0']['id'] ?>">

                                        </div>
                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                            <label class="text-dark dark:text-white text-[13px] mb-2">Date</label>
                                            <input type="date" name="date"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                required>
                                        </div>
                                        <hr>
                                        <div class="container-fluid">

                                            <div class="row">
                                                <div class="xl:w-6/4 lg:w-4/3">
                                                    <div class="card flex flex-col max-sm:mb-[30px] profile-card">

                                                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                                            <div id="product-container">
                                                                <!-- Product fields that will be cloned -->
                                                                <div class="row product-row">
                                                                    <!-- Product Dropdown in the Row -->
                                                                    <div class="sm:w-1/3 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Select
                                                                            Product</label>

                                                                        <select name="p_name[]" id="category-select"
                                                                            onchange="fetchProductDetails(this)"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full choices"
                                                                            required>
                                                                            <option value="">Select Product</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Expire
                                                                            date</label>
                                                                        <select name="packing[]"
                                                                            class=" choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                            id="sub-category-select" required>
                                                                            <option>Select Date</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>

                                                                        <input type="hidden" name="available_quantity[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                            id="available" required readonly>

                                                                        <input type="number" id="p" name="quantity[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            placeholder="Quantity"
                                                                            oninput="this.value = this.value.replace(/[^0-9.]/g, ''); calculateTotalPrice(this.closest('.row'));"
                                                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                            required>
                                                                    </div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Unit
                                                                            Rate</label>
                                                                        <input type="hidden" name="p_id[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            id="p_id" required readonly>
                                                                        <input type="number" name="unit_rate[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            placeholder="Unit Rate" id="unit-rate"
                                                                            oninput="calculateTotalPrice(this.closest('.row'))"
                                                                            required>
                                                                    </div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Total
                                                                            Price</label>
                                                                        <input type="number" name="total_price[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            placeholder="Total Price" required>
                                                                    </div>

                                                                </div>
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
                                                                    <input type="text" id="grand-total"
                                                                        name="grand_total[]"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="total price">
                                                                </div>
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Type</label>
                                                                    <select id="discount-type" name="discount_type"
                                                                        class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full"
                                                                        required>
                                                                        <option value="percent" Selected>Select Discount
                                                                            type
                                                                        </option>
                                                                        <option value="percent">Discount in Percentage
                                                                        </option>
                                                                        <option value="rupee">Discount in Rupee</option>
                                                                    </select>
                                                                </div>

                                                                <!-- Discount Value Field -->
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Discount
                                                                        Value</label>
                                                                    <input type="number" id="discount-value"
                                                                        name="discount"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="enter discount value"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        value="0" required>
                                                                </div>
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>
                                                                    Total Without Tax
                                                                    <input type="text" id="total-without"
                                                                        name="total_without_tax"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder=" Total Without Tax">
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
                                                                    <input type="text" id="tax-amount" name="tax_amount"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="total price">
                                                                </div>

                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>Final
                                                                    Total
                                                                    <input type="text" id="final-total"
                                                                        name="final_total"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="Final Total">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Payment
                                                                        Mode</label>
                                                                    <select name="mode"
                                                                        class=" form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                        id="paymentMode" required>
                                                                        <option value="">--SELECT--</option>
                                                                        <option value="Cash">CASH</option>
                                                                        <option value="Upi">UPI</option>
                                                                        <option value="Card">CREADIT/DEBIT CARD</option>
                                                                        <option value="Bank">Bank Transfer</option>
                                                                        <option value="Cheque">Cheque</option>
                                                                        <option value="None">None</option>

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
                                                                            <option value="<?= $account_info['id'] ?>">
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
                                                                        placeholder="Cheque Number" id="cheque">
                                                                </div>
                                                                <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2">Paid
                                                                        Amount</label>
                                                                    <input type="float" name="paid"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        oninput="this.value = this.value.replace(/[^0-9.]/g, '');"
                                                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"
                                                                        placeholder="paid amount">
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div
                                                            class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                                            <button type="submit" id="add-product-btn"
                                                                class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Sales</button>
                                                        </div>
                                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content body end -->

        <!-- Modal -->
        <div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close"
            id="exampleModalCenterstock">
            <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
                <div
                    class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
                    <div
                        class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                        <h5 class="modal-title">Add Stock </h5>
                        <button type="button" class="btn-close p-4 text-xs">
                        </button>
                    </div>
                    <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
                        <div class="xl:w-6/4 lg:w-4/3">
                            <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                                <div
                                    class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                    <h6 class="text-[15px] font-medium text-body-color title relative">Add Your stocks
                                    </h6>
                                    <a href="<?= base_url('Admin_Dashboard/stock_place/' . encryptId($user[0]['id'])) ?>"
                                        class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
                                        stocks Place</a><br>
                                </div>
                                <form class="profile-form"
                                    action="<?= base_url('Admin_Dashboard/add_stock_place/' . encryptId($user['0']['id']) . '/2') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                        <div class="row">
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label class="text-dark dark:text-white text-[13px] mb-2">Stock Place
                                                    Name</label>
                                                <input type="text" name="place_name"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="Stock Place Name">
                                                <input type="hidden" name="id"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    value="<?= $stock['0']['id'] ?>">
                                                <input type="hidden" name="user_id"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    value="<?= $user['0']['id'] ?>">

                                            </div>
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label class="text-dark dark:text-white text-[13px] mb-2"> Address
                                                </label>
                                                <input type="text" name="address"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="address">
                                            </div>
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label
                                                    class="text-dark dark:text-white text-[13px] mb-2">capacity</label>
                                                <input type="number" name="capacity"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="Capacity">
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                        <button
                                            class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
                                            stock</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap border-t border-b-color">
                        <button type="button"
                            class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:border-danger-light hover:text-white m-1 close-btn">Close</button>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade fixed top-0 right-0 overflow-y-auto overflow-x-hidden dz-scroll w-full h-full z-[1055]  dz-modal-box model-close"
            id="exampleModalCentercustomer">
            <div class="modal-dialog modal-dialog-centered h-full flex items-center py-5" role="document">
                <div
                    class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] w-full pointer-events-auto">
                    <div
                        class="modal-header flex justify-between items-center flex-wrap py-4 px-[1.875rem] relative z-[2] border-b border-b-color">
                        <h5 class="modal-title">Add Customer</h5>
                        <button type="button" class="btn-close p-4 text-xs">
                        </button>
                    </div>
                    <div class="modal-body relative p-[1.875rem] text-body-color sm:text-sm text-xs">
                        <div class="xl:w-6/4 lg:w-4/3">
                            <div class="card flex flex-col max-sm:mb-[30px] profile-card">
                                <div
                                    class="card-header flex justify-between items-center flex-wrap sm:p-[30px] p-5 relative z-[2] border-b border-b-color">
                                    <h6 class="text-[15px] font-medium text-body-color title relative">Add Your
                                        Customers</h6>
                                    <a href="<?= base_url('Admin_Dashboard/customer/' . encryptId($user[0]['id'])) ?>"
                                        class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
                                        Customers</a><br>
                                </div>
                                <form class="profile-form"
                                    action="<?= base_url('Admin_Dashboard/add_customer/' . encryptId($user['0']['id']) . '/1') ?>"
                                    method="post" enctype="multipart/form-data">
                                    <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                        <div class="row">
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label class="text-dark dark:text-white text-[13px] mb-2">Customer
                                                    Name</label>
                                                <input type="text" name="name"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="Name" value="">
                                                <input type="hidden" name="id"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    value="<?= $vender['0']['id'] ?>">
                                                <input type="hidden" name="user_id"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    value="<?= $user['0']['id'] ?>">

                                            </div>

                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label
                                                    class="text-dark dark:text-white text-[13px] mb-2">Address</label>
                                                <input type="text" name="address"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="address">
                                            </div>
                                            <hr>
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label
                                                    class="text-dark dark:text-white text-[13px] mb-2">Contact</label>
                                                <input type="text" name="contact"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="Contact Number">
                                            </div>
                                            <div class="sm:w-1/2 w-full mb-[30px]">
                                                <label class="text-dark dark:text-white text-[13px] mb-2">email</label>
                                                <input type="text" name="email"
                                                    class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                    placeholder="email">
                                            </div>

                                        </div>
                                    </div>
                                    <div
                                        class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">
                                        <button
                                            class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add
                                            Customer</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div
                        class="modal-footer py-4 px-[1.875rem] flex items-center justify-end flex-wrap border-t border-b-color">
                        <button type="button"
                            class="btn btn-danger sm:py-[0.719rem] px-4 sm:px-[1.563rem] py-2.5 sm:text-[15px] text-xs font-medium rounded text-danger bg-danger-light leading-5 inline-block border border-danger-light duration-500 hover:bg-danger hover:border-danger-light hover:text-white m-1 close-btn">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
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
                const productContainer = document.getElementById('product-container');
                const newProductRow = document.createElement('div');
                const rowIndex = document.querySelectorAll('.product-row').length; // Index to keep track of each row

                newProductRow.classList.add('row', 'product-row');

                newProductRow.innerHTML = `
        <div class="row product-row">
            <div class="sm:w-1/3 w-full mb-[40px]">
                   <label class="text-dark dark:text-white text-[13px] mb-2">Select Product</label>
          <select name="p_name[]"  class="choicees form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  category-select" data-index="${rowIndex}">
                     <option >Select Product</option>
                </select>
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Expire Date</label>
                <select name="packing[]" class="choices form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  sub-category-select" data-index="${rowIndex}">
                    <option selected>Select Date</option>
                </select>
                  <input type="hidden" name="unit[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  unit-select" data-index="${rowIndex}" placeholder="Unit " required >
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
                    
                    <input type="hidden"  name="available_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full available-quantity" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>
              
                <input type="number" id="pp" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.product-row'))">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Unit Rate</label>
                                <input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  p-id-select" data-index="${rowIndex}" required >
                <input type="number" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  unit-rate-select" data-index="${rowIndex}" placeholder="Unit Rate" required oninput="calculateTotalPrice(this.closest('.product-row'))">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]">
                <label class="text-dark dark:text-white text-[13px] mb-2">Total Price</label>
                <input type="number" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" readonly>
            </div>
            <div class="sm:w-1/6 w-full mb-[30px] d-flex align-items-center">
                <button type="button" class="btn btn-danger form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none " onclick="deleteProductForm(this)">
                    <i class="fas fa-trash-alt"></i>
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

                var stockPlaceId = document.querySelector('select[name="stock_place"]').value;

                if (stockPlaceId) {
                    $.ajax({
                        url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                        type: 'POST',
                        data: { stock_place_id: stockPlaceId },
                        dataType: 'json',
                        success: function (products) {



                            if (productSelect.choicesInstance) {
                                productSelect.choicesInstance.destroy();
                            }

                            productSelect.innerHTML = '<option value="">Select Product</option>';

                            products.forEach(function (product) {
                                let option = document.createElement('option');
                                option.value = product.pro_id;
                                option.textContent = product.product_id + ' - ' + product.product_name + ' - ' + product.unit + ' - ' + product.packing + product.net_unit;

                                productSelect.appendChild(option);
                            });

                            productSelect.choicesInstance = new Choices(productSelect, {
                                searchEnabled: true,
                                itemSelectText: "",
                                shouldSort: false,
                                removeItemButton: false
                            });
                        },
                        error: function () {
                            console.error('Failed to fetch products.');
                        }
                    });
                }

            }

            // Function to delete a product row
            function deleteProductForm(button) {
                const productRow = button.closest('.product-row');
                productRow.remove();
                updateGrandTotal();
            }

            // Function to calculate total price based on quantity and unit rate

            function calculateTotalPrice(row) {
                const quantity = row.querySelector('input[name="quantity[]"]').value || 0;
                const unitRate = row.querySelector('input[name="unit_rate[]"]').value || 0;
                const totalPriceInput = row.querySelector('input[name="total_price[]"]');

                const totalPrice = (quantity * unitRate).toFixed(2);
                totalPriceInput.value = totalPrice;
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
            // Use event delegation for dynamically added product rows
            $(document).on('change', '.category-select', function () {
                fetchProductDetails(this);
            });

            // AJAX function to fetch packing and unit rate data
            function fetchProductDetails(selectElement) {
                var selectedProductId = selectElement.value;
                var rowIndex = $(selectElement).data('index');
                var subCategorySelect = $(`.sub-category-select[data-index="${rowIndex}"]`);
                var unitRateField = $(`.unit-rate-select[data-index="${rowIndex}"]`);
                var pId = $(`.p-id-select[data-index="${rowIndex}"]`);
                var availableQuantity = $(`.available-quantity[data-index="${rowIndex}"]`);

                // Clear previous options and fields
                subCategorySelect.html('<option selected>Select Date</option>');
                unitRateField.val('');
                availableQuantity.val('');
                pId.val('');

                if (selectedProductId) {
                    // Fetch Subcategories
                    $.ajax({
                        url: '<?= base_url("Admin_Dashboard/get_subcategories/") ?>' + selectedProductId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (Array.isArray(data) && data.length > 0) {
                                $.each(data, function (index, subCategory) {
                                    if (subCategory.p_id) {
                                        subCategorySelect.append('<option value="' + subCategory.p_id + '">' + formatDate(subCategory.exp_date) + '</option>');
                                    }
                                });
                            } else {
                                alert("No subcategories available.");
                            }
                        },
                        error: function (xhr) {
                            console.error('Error fetching subcategories:', xhr.statusText);
                        }
                    });

                    // Fetch Product Details
                    $.ajax({
                        url: '<?= base_url("Admin_Dashboard/get_product_details/") ?>' + selectedProductId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data && !data.error) {
                                unitRateField.val(data.selling_price);
                            } else {
                                alert(data.error || 'Error fetching product details.');
                            }
                        },
                        error: function (xhr) {
                            console.error('Error fetching product details:', xhr.statusText);
                        }
                    });
                }

                // Handle Subcategory Change
                subCategorySelect.off('change').on('change', function () {
                    var selectedPacking = $(this).val();
                    fetchPackingDetails(selectedPacking, availableQuantity, pId, unitRateField);
                });
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
            function fetchPackingDetails(selectedPacking, availableQuantity, pId, unitRateField) {
                if (selectedPacking) {
                    $.ajax({
                        url: '<?= base_url("Admin_Dashboard/get_unit_rate/") ?>' + selectedPacking,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            // Ensure data contains the expected fields
                            if (data) {
                                availableQuantity.val(data.availabile_quantity);
                                pId.val(data.p_id);
                            } else {
                                console.error('Invalid data received:', data);
                                availableQuantity.val('');
                                pId.val('');
                            }
                        },
                        error: function (xhr) {
                            console.error('Error fetching unit rate:', xhr.statusText);
                        }
                    });
                } else {
                    unitRateField.val('');
                    availableQuantity.val('');
                    pId.val('');
                }
            }


            $(document).on('input', '#pp', function () {
                var row = $(this).closest('.product-row');
                var rowIndex = row.find('select.category-select').data('index'); // Get the row index to uniquely identify each row's data
                checkAvailablQuantity(row, rowIndex); // Pass the row and index to the function
            });



            function checkAvailablQuantity(row, rowIndex) {
                // Use the rowIndex to find the specific available quantity field in the current row
                var availableQuantity = parseFloat($(`.available-quantity[data-index="${rowIndex}"]`).val()) || 0;
                var enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

                // Check if the entered quantity exceeds the available quantity for the specific product
                if (enteredQuantity > availableQuantity) {
                    alert("Product quantity is not available. Maximum available: " + availableQuantity);
                    row.find('input[name="quantity[]"]').val(''); // Clear the entered quantity if it exceeds available
                }
            }



            // Add new product row on button click
            $('#add-product-btn').on('click', function () {
                addProductForm();
            });


        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                // Handle Category Change
                $('#category-select').change(function () {
                    var selectedCategory = $(this).val();
                    var subCategorySelect = $('#sub-category-select');
                    var availableQuantity = $('#available');
                    var seles_price = $('#unit-rate');
                    var pid = $('#p_id');

                    // Reset fields
                    subCategorySelect.empty().append('<option selected>Select Date</option>');
                    availableQuantity.val('');
                    pid.val('');

                    if (selectedCategory) {
                        // Fetch subcategories
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_subcategories/") ?>' + selectedCategory,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                if (data.length === 0) {
                                    alert("No subcategories available.");
                                } else {
                                    $.each(data, function (index, subCategory) {
                                        subCategorySelect.append(`<option value="${subCategory.p_id}">${formatDate(subCategory.exp_date)}</option>`);
                                    });
                                }
                            },
                            error: function () {
                                console.error('Failed to fetch Date options.');
                            }
                        });

                        // Fetch product details
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_product_details/") ?>' + selectedCategory,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                if (data && !data.error) {
                                    $('#unit-rate').val(data.selling_price);


 
                                } else {
                                    alert(data.error || 'Error fetching product details.');
                                }
                            },
                            error: function () {
                                alert('Error fetching product details.');
                            }
                        });
                    }
                });

                // Handle Subcategory Change
                $('#sub-category-select').change(function () {
                    var selectedPacking = $(this).val();
                    var availableQuantity = $('#available');
                    var pid = $('#p_id');

                    if (selectedPacking) {
                        $.ajax({
                            url: `<?= base_url("Admin_Dashboard/get_unit_rate/") ?>${selectedPacking}`,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                // Debugging

                                if (data) {
                                    availableQuantity.val(data.availabile_quantity || '0');
                                    pid.val(data.p_id || '');
                                } else {
                                    availableQuantity.val('0');
                                    pid.val('');
                                }
                            },
                            error: function () {
                                alert('Failed to fetch unit rate.');
                            }
                        });
                    } else {
                        availableQuantity.val('');
                        pid.val('');
                    }
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

            function calculateTotalPrice(row) {
                const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
                const unitRate = parseFloat(row.querySelector('input[name="unit_rate[]"]').value) || 0;
                const totalPriceInput = row.querySelector('input[name="total_price[]"]');

                const totalPrice = (quantity * unitRate).toFixed(2);
                totalPriceInput.value = totalPrice;

                // Update grand total after calculating each row's total price
                updateGrandTotal();
            }

            // Function to update the grand total and final total
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

            document.addEventListener("DOMContentLoaded", function () {
                const productSelect = new Choices("#category-select", {
                    searchEnabled: true,
                    itemSelectText: "",
                    shouldSort: false
                });

                function filterProducts() {
                    let stockPlaceId = document.getElementById('stock_place').value;

                    if (stockPlaceId) {
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                            type: 'POST',
                            data: { stock_place_id: stockPlaceId },
                            dataType: 'json',
                            success: function (products) {
                                productSelect.clearStore();
                                productSelect.setChoices(products.map(product => ({
                                    value: product.pro_id,
                                    label: `${product.product_id} - ${product.product_name} - ${product.unit} - ${product.packing}${product.net_unit}`
                                })), 'value', 'label', true);
                            },
                            error: function () {
                                console.error('Failed to fetch products.');
                            }
                        });
                    }
                }

                document.getElementById('stock_place').addEventListener('change', filterProducts);

                // Update products for all rows
                $(document).on('change', 'select[name="stock_place"]', function () {
                    const stockPlaceId = $(this).val();
                    updateProductOptionsForAllRows(stockPlaceId);
                });

                function updateProductOptionsForAllRows(stockPlaceId) {
                    if (stockPlaceId) {
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_products_by_stock_place") ?>',
                            type: 'POST',
                            data: { stock_place_id: stockPlaceId },
                            dataType: 'json',
                            success: function (products) {
                                $('.category-select').each(function () {
                                    const productSelect = $(this);
                                    productSelect.html('<option value="">Select Product</option>');
                                    products.forEach(function (product) {
                                        productSelect.append('<option value="' + product.pro_id + '">' + product.product_id + ' - ' + product.product_name + ' - ' + product.unit + ' - ' + product.packing + product.net_unit + '</option>');

                                    });
                                });
                            },
                            error: function () {
                                console.error('Failed to fetch products.');
                            }
                        });
                    }
                }

                // Quantity Check
                $(document).on('input', 'input[name="quantity[]"]', function () {
                    var row = $(this).closest('.product-row');
                    var p_id = row.find('input[name="p_id[]"]').val();
                    checkAvailableQuantity(row, p_id);
                });

                function checkAvailableQuantity(row, p_id) {
                    // Ensure p_id is present
                    if (!p_id) {
                        console.error('Product ID not found.');
                        return;
                    }

                    var availableQuantity = parseFloat(row.find('input[name="available_quantity[]"]').val()) || 0;
                    var enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;


                    if (enteredQuantity > availableQuantity) {
                        alert("Product quantity is not available. Maximum available: " + availableQuantity);
                        row.find('input[name="quantity[]"]').val('');
                    }
                }

            });

            $(document).on('input', 'input[name="paid"]', function () {
                checkAvailablePaid($(this));
            });

            function checkAvailablePaid(element) {
                var grandTotal = parseFloat($('#final-total').val()) || 0;
                var paid = parseFloat(element.val()) || 0;

                if (paid > grandTotal) {
                    alert("Paid amount exceeds the Grand Total of " + grandTotal);
                    element.val(''); // Reset the input field
                }
            }
        </script>




        <script>
            document.addEventListener("DOMContentLoaded", function () {
                document.querySelectorAll(".choices").forEach(select => {
                    new Choices(select, {
                        searchEnabled: true,
                        itemSelectText: "",
                        shouldSort: false,
                        removeItemButton: false
                    });
                });
            });
        </script>


        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
</body>

</html>