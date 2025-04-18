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
                                <a href="<?= base_url('Branch_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
                                    class="btn btn-primary sm:py-[0.719rem] px-2 sm:px-[1.563rem] py-2 sm:text-[15px] text-xs font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary dz-modal-btn">
                                    Add product</a>
                            </div>
                            <form class="profile-form"
                                action="<?= base_url('Branch_Dashboard/add_invoice/' . encryptId($user['0']['id'])) ?>"
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
                                                    <option value="<?= $stock_info['id']; ?>"
                                                        <?= (($stock_info['default'] == '1') ? 'selected' : '') ?>>
                                                        <?= $stock_info['place_name']; ?>
                                                    </option>
                                                <?php } ?>

                                            </select>
                                            <input type="hidden" id="uuid" name="user_id"
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                value="<?= $user['0']['id'] ?>">
                                              
                                                <input type="hidden" name="uid" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" value="<?= $user['0']['user_id'] ?>">
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
                                                        <?= $customer_info['name']; ?> - <?= $customer_info['contact']; ?>- <?= $customer_info['address']; ?>
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
                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                value="<?= date('Y-m-d'); ?>" required>
                                        </div>
                                        <hr>
                                        <div class="container-fluid">

                                            <div class="row">
                                                <div class="xl:w-6/4 lg:w-4/3">
                                                    <div class="card flex flex-col max-sm:mb-[30px] profile-card">

                                                        <div class=" pb-0">
                                                            <div id="product-container">
                                                                <!-- Product fields that will be cloned -->
                                                                <div class="row product-row">
                                                                    <!-- Product Dropdown in the Row -->
                                                                    <div class="sm:w-1/4 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Select
                                                                            Product</label>
                                                                        <input type="text"
                                                                            class=" product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                            placeholder="Click to select product"
                                                                            readonly onclick="openProductModal()">
                                                                        <input type="hidden" id="product-input-value"
                                                                            name="p_name[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full ">
                                                                    </div>
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Packing</label>
                                                                        <input type="text"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            placeholder="packing" id="packing-unit"
                                                                            readonly required>


                                                                    </div>
                                                                    <div id="unit-selection" class="sm:w-1/6 w-full mb-[30px]" style="display:none">
                <label class="text-dark dark:text-white text-[13px] mb-2">Unit</label>
                <select id="unit-single" name="box[]" class="form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" >
                <option value="">Select Unit</option>
                    
                    <option value="Box">Box</option>
                    <option value="Single">Single</option>
                </select>
            </div>
                                                                  
                                                                    <div class="sm:w-1/6 w-full mb-[30px]">
                                                                        <label
                                                                            class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>

                                                                        <input type="hidden" name="available_quantity[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                            id="available" required readonly>

                                                                            <input type="hidden" name="per_box[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                                            id="per_box" required readonly>

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
                                                                        <input type="hidden" name="packing[]"
                                                                            class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                            id="packing" required readonly>
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
                                                                    <div class=" mb-[30px] d-flex align-items-center" style="width: 20px; margin-top:25px">
                <button type="button" class="btn btn-danger form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none " onclick="deleteProductForm(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
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
                                                                    Tax Amount (GST <?= $u[0]['tax'] ?>%)
                                                                    <input type="hidden" id="tax"
                                                                        value="<?= $u[0]['tax'] ?>"
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
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[14px] font-semibold mb-2 block">Do
                                                                        you want to include interest?</label>

                                                                    <div class="flex items-center">
                                                                        <input type="radio" id="interest-yes"
                                                                            name="include_interest" value="1"
                                                                            class="mr-2">
                                                                        <label for="interest-yes"
                                                                            class="text-dark dark:text-white text-[13px] mr-4">Yes</label>

                                                                        <input type="radio" id="interest-no"
                                                                            name="include_interest" value="0"
                                                                            class="mr-2" checked>
                                                                        <label for="interest-no"
                                                                            class="text-dark dark:text-white text-[13px]">No</label>
                                                                    </div>
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
        <div id="productModal"
            class="modal fade fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden z-[1055]">
            <div class="modal-dialog-centered w-full max-w-4xl">
                <div class="modal-content flex flex-col relative rounded-md bg-white dark:bg-[#182237] pointer-events-auto"
                    style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;margin-left: 158px;margin-top: 158px">

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
                        <input type="text" id="productSearch" class="form-control mb-4 p-2 border rounded-md w-full"
                            placeholder="Search Product..." oninput="filterModalProducts()">
                            </div>
                            <div class="sm:w-1/2 w-full mb-[30px]">
                            <a href="<?= base_url('Branch_Dashboard/add_product/' . encryptId($user['0']['id'])) ?>"
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
                                        
                                        <!-- <th class="py-2 px-4">Select</th> -->
                                    </tr>
                                </thead>
                                <tbody id="productTableBody" class="bg-white dark:bg-gray-900"></tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer flex justify-end py-4 px-6 border-t border-gray-200 dark:border-gray-700">
                        <button class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto"
                            onclick="closeProductModal()">Close</button>
                    </div>
                </div>
            </div>
        </div>


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
                                    <a href="<?= base_url('Branch_Dashboard/stock_place/' . encryptId($user[0]['id'])) ?>"
                                        class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
                                        stocks Place</a><br>
                                </div>
                                <form class="profile-form"
                                    action="<?= base_url('Branch_Dashboard/add_stock_place/' . encryptId($user['0']['id']) . '/2') ?>"
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
                                    <a href="<?= base_url('Branch_Dashboard/customer/' . encryptId($user[0]['id'])) ?>"
                                        class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">View
                                        Customers</a><br>
                                </div>
                                <form class="profile-form"
                                    action="<?= base_url('Branch_Dashboard/add_customer/' . encryptId($user['0']['id']) . '/1') ?>"
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
        <div class="row product-row" data-index="${rowIndex}">
            <div class="sm:w-1/4 w-full mb-[40px]" style="width: 298px !important;">
                  
<input type="text" class="product-input form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full " 
       placeholder="Click to select product" 
       readonly onclick="openProductClassModal(${rowIndex})"
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
            <div class="unit-selection sm:w-1/6 w-full mb-[30px]" data-index="${rowIndex}" style="display:none;">
         
                    <select name="box[]" data-index="${rowIndex}" class="unit-single form-control text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 outline-none w-full" >
                <option value="">Select Unit</option>

                        <option value="Box">Box</option>
                        <option value="Single">Single</option>
                    </select>
                </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 202px !important;">
               
                    
                    <input type="hidden"  name="available_quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full available-quantity" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>

               <input type="hidden"  name="per_box[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full per_box" data-index="${rowIndex}" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"   required readonly>
                <input type="number" id="pp" name="quantity[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full quantityy" placeholder="Quantity" required oninput="calculateTotalPrice(this.closest('.product-row'))" data-index="${rowIndex}">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 200px !important;">
              
                                <input type="hidden" name="p_id[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  p-id-select" data-index="${rowIndex}" required >
                <input type="number" name="unit_rate[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  unit-rate-select" data-index="${rowIndex}" placeholder="Unit Rate" required oninput="calculateTotalPrice(this.closest('.product-row'))">
            </div>
            <div class="sm:w-1/6 w-full mb-[30px]" style="width: 200px !important;">
             
                <input type="number" name="total_price[]" class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full  relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" placeholder="Total Price" readonly>
            </div>
                                          <div class=" mb-[30px] d-flex align-items-center" style="width: 20px;">
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

            }


            // Open Product Modal
            function openProductClassModal(rowIndex) {
                const stockPlaceId = document.getElementById('stock_place').value;

                if (!stockPlaceId) {
                    alert('Please select a stock place first.');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("Branch_Dashboard/get_products_by_stock_place") ?>',
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
                        <td class="py-2 px-4"><button onclick="selectaddProduct('${product.pro_id}', '${product.product_name}', '${product.unit}', '${product.packing}', '${product.net_unit}', '${product.p_id}','${product.box}', '${rowIndex}')">${product.product_name}</button></td>
                        <td class="py-2 px-4">${product.unit}</td>
                        <td class="py-2 px-4">${product.packing}${product.net_unit}</td>
                        <td class="py-2 px-4">${product.exp_date}</td>
         <td class="py-2 px-4">
  ${product.availabile_quantity}${product.box === '1' ? ' (Box)' : ''}
  <br>
  ${product.box === '1' ? `${product.per_product_available_quantity} (Single)` : ''}
</td>

                          
                    </tr>`;
                                tableBody.innerHTML += row;
                            });
                        }

                        document.getElementById('productModal').classList.remove('hidden');
                    },
                    error: function () {
                        console.error('Failed to fetch products.');
                    }
                });
            }

       // Select Product from Modal
function selectaddProduct(proId, productName, unit, packing, netUnit, pId, box, rowIndex) {
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

    closeProductModal();

    // Add Unit Selection if box is enabled
    if (box == 1) {
    let packingUnit = document.querySelector(`input.packing-unit[data-index="${rowIndex}"]`);
    let existingUnitSelection = document.querySelector(`.unit-selection[data-index="${rowIndex}"]`);

    if (existingUnitSelection) {
        existingUnitSelection.style.display = 'block';

        let selectInput = existingUnitSelection.querySelector('select');
        if (selectInput) {
            selectInput.disabled = false;
            selectInput.required = true;
        }
    }
} else {
    let unitSelection = document.querySelector(`.unit-selection[data-index="${rowIndex}"]`);
    if (unitSelection) {
        unitSelection.style.display = 'none';

        let selectInput = unitSelection.querySelector('select');
        if (selectInput) {
               // Disable input
            selectInput.required = false;    // Not required anymore
        }
    }
}



    // Function to update product details (unit rate & available quantity)
    function updateProductDetails() {
        let selectedUnit = document.querySelector(`select.unit-single[data-index="${rowIndex}"]`)?.value || 'Box'; // Get selected unit

        // Fetch product details (selling price, unit rate)
        $.ajax({
            url: `<?= base_url("Branch_Dashboard/get_product_details_with_customer/") ?>${proId}/${selectedCustomerID}`,
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
            url: `<?= base_url("Branch_Dashboard/get_unit_rate/") ?>${pId}`,
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

            function closeProductModal() {
                document.getElementById('productModal').classList.add('hidden');
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

            $(document).on('input', '.quantity-input', function () {
                var row = $(this).closest('.product-row');
                var rowIndex = row.find('select.category-select').data('index');
                checkAvailablQuantity(row, rowIndex);
            });

            function checkAvailablQuantity(row, rowIndex) {
                var availableQuantity = parseFloat($(`.available-quantity[data-index="${rowIndex}"]`).val()) || 0;
                var enteredQuantity = parseFloat(row.find('input[name="quantity[]"]').val()) || 0;

                if (enteredQuantity > availableQuantity) {
                    alert(`Product quantity is not available. Maximum available: ${availableQuantity.toFixed(2)}`);
                    row.find('input[name="quantity[]"]').val(''); // Clear the input field
                }
            }




            // Add new product row on button click
            $('#add-product-btn').on('click', function () {
                addProductForm();
            });


        </script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>
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
        <script>
            function openProductModal() {
                const stockPlaceId = document.getElementById('stock_place').value;

                if (!stockPlaceId) {
                    alert('Please select a stock place first.');
                    return;
                }

                $.ajax({
                    url: '<?= base_url("Branch_Dashboard/get_products_by_stock_place") ?>',
                    type: 'POST',
                    data: { stock_place_id: stockPlaceId },
                    dataType: 'json',
                    success: function (products) {
                        const tableBody = document.getElementById('productTableBody');
                        tableBody.innerHTML = '';

                        if (products.length === 0) {
                            tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-gray-500">No products available</td></tr>`;
                        } else {
                            products.forEach(product => {
                                const row = `<tr class="border-b">
            <td class="py-2 px-4">${product.product_id}</td>
            <td class="py-2 px-4"><button onclick="selectProduct('${product.pro_id}', '${product.product_name}', '${product.unit}', '${product.packing}', '${product.net_unit}', '${product.p_id}', '${product.box}')">${product.product_name}</button></td>
            <td class="py-2 px-4">${product.unit}</td>
          
            <td class="py-2 px-4">${product.packing}${product.net_unit}</td>
            <td class="py-2 px-4">${product.exp_date}</td>
            <td class="py-2 px-4">
  ${product.availabile_quantity}${product.box === '1' ? ' (Box)' : ''}
  <br>
  ${product.box === '1' ? `${product.per_product_available_quantity} (Single)` : ''}
</td>

                 
         
          </tr>`;
                                tableBody.innerHTML += row;
                            });
                        }

                        document.getElementById('productModal').classList.remove('hidden');
                    },
                    error: function () {
                        console.error('Failed to fetch products.');
                    }
                });
            }

            function closeProductModal() {
                document.getElementById('productModal').classList.add('hidden');
            }

            // Product Selection Logic
         
        
            function selectProduct(pro_id, product_name, unit, packing, net_unit, p_id, box) {
    const productInputs = document.getElementsByClassName('product-input');
    const productInputValue = document.getElementById('product-input-value');
    const productContainer = document.getElementById('product-container'); // Parent container for dynamic fields
    const customerSelect = document.getElementById('customer-name');
    const selectedCustomerID = customerSelect.value; // Get selected customer ID

    if (!selectedCustomerID) {
        alert('Please select a customer first!');
        return;
    }
    if (productInputs.length > 0) {
        productInputs[0].value = `${product_name}`; // Set product name in the input
        productInputValue.value = `${pro_id}`; // Set product ID in hidden input
        closeProductModal();

        // Set the selected product ID
        $('#p_id').val(p_id);
        $('#packing').val(p_id);
       
        // Show the unit selection field if box == 1
        if (box == 1) {
    let packingUnit = document.getElementById('packing-unit');
    let unitSelection = document.getElementById('unit-selection');
    
    if (unitSelection) {
        let selectInput = unitSelection.querySelector('select');
        unitSelection.style.display = 'block';
        
        if (selectInput) {
            selectInput.disabled = false;
            selectInput.required = true;
        }
    }

} else {
    let unitSelection = document.getElementById('unit-selection');
    
    if (unitSelection) {
        let selectInput = unitSelection.querySelector('select');
        unitSelection.style.display = 'none';
        
        if (selectInput) {
               // ✅ Disable input
            selectInput.required = false;     // ✅ Not required
        }
    }
}


// Function to update unit rate and available quantity based on unit selection
function updateProductDetails() {
    let selectedUnit = $('#unit-single').val() || 'Box'; // Get selected unit

    // Fetch product details (selling price, unit rate)
    $.ajax({
        url: `<?= base_url("Branch_Dashboard/get_product_details_with_customer/") ?>${pro_id}/${selectedCustomerID}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
                
                $('#unit-rate').val(selectedUnit === 'Box' ? data.final_price : data.per_product_final_price); 
                $('#packing-unit').val(data.packing + data.net_unit);
                $('#per_box').val(data.box_per_unit ? data.box_per_unit : 0);


                $('#p').val(1);
                calculateTotalPrice($('#p').closest('.product-row')[0]);
            }
        },
        error: function () {
            alert('Error fetching product details.');
        }
    });

    // Fetch available quantity
    $.ajax({
        url: `<?= base_url("Branch_Dashboard/get_unit_rate/") ?>${p_id}`,
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            if (data) {
             
                $('#available').val(selectedUnit === 'Box' ? data.availabile_quantity : data.per_product_available_quantity);
            } else {
                $('#available').val('0');
            }
        },
        error: function () {
            alert('Failed to fetch unit rate.');
        }
    });
}

// **Call function on page load** to fetch default values
updateProductDetails();

// **Bind change event to unit selection dropdown**
$(document).on('change', '#unit-single', function () {
    updateProductDetails();
});
    }
}
//
            function closeProductModal() {
                document.getElementById('productModal').classList.add('hidden');
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
      
        <script>

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

        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
</body>

</html>