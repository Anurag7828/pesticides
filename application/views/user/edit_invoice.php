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

                                                        <div class="sm:p-10 sm:pb-2.5 p-[25px] pb-0">
                                                            <?php
                                                            $i=0;
                                                             $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'], 'user_id', $user[0]['id']); ?>
                                                            <?php foreach ($p_produc as $p_info): $i++;?>
                                                                <div id="product-container"> 
                                                                    <!-- Product fields that will be cloned -->
                                                                    <div class="row product-row">
                                                                        <!-- Product Dropdown in the Row -->
                                                                        <div class="sm:w-1/3 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Select
                                                                                Product</label>
        <select name="p_name[]" class="category-select choices form-control"
        id="category-select<?= $i ?>" data-index="<?= $i ?>"
        data-selected="<?= $p_info['p_name'] ?>" required>
    <option value="">Select Product</option>
    <?php foreach ($product_list as $product_info) { ?>
        <option value="<?= $product_info['id']; ?>"
            <?= ($p_info['p_name'] == $product_info['id']) ? 'selected' : ''; ?>>
            <?= $product_info['product_id']; ?>-<?= $product_info['product_name']; ?>-<?= $product_info['unit']; ?>-<?= $product_info['packing']; ?><?= $product_info['net_unit']; ?>
        </option>
    <?php } ?>
</select>

                                                                        </div>

                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Expire Date</label>
                                                                            <select name="packing[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "
                                                         id="sub-category-select<?=$i?>" required>
                                                                                <option selected>Select Date</option>
                                                                                <!-- Options will be populated dynamically -->
                                                                                <?php $pp_produc = $this->CommonModal->getRowById('purchase_product', 'p_id', $p_info['packing']); ?>
                                                                                <option value="<?= $p_info['packing']; ?>"
                                                                                    <?= ($p_info['packing'] == $pp_produc[0]['p_id']) ? 'selected' : ''; ?>>
                                                                                    <?= $pp_produc[0]['exp_date']; ?> 
                                                                                </option>
                                                                            </select>
                                                                         
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Quantity</label>
                                                                            <input type="text" name="available_quantity[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
                                     onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                                                                id="available<?=$i?>" required readonly
                                                                                value="<?= $pp_produc[0]['availabile_quantity'] ?> ">
                                                                                <?php $newava=$pp_produc[0]['availabile_quantity'] + $p_info['quantity'] ?>
                                                                            <input type="text"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                id="availablee<?=$i?>" required readonly
                                                                                value="<?= $newava ?>">

                                                                            <input type="text" name="quantity[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full "oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               
                                                                                placeholder="Quantity" id="blankquantity<?=$i?>" required
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                value="<?= $p_info['quantity'] ?> ">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Unit
                                                                                Rate</label>
                                                                            <input type="hidden" name="invoice_id[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                id="p_id<?=$i?>" value=" <?= $p_info['id'] ?> "
                                                                                required readonly>
                                                                            <input type="hidden" name="p_id[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"
                                                                                id="p_id<?=$i?>" value=" <?= $p_info['packing'] ?> "
                                                                                required readonly>
                                                                            <input type="float" name="unit_rate[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"  oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"    
                                                                                placeholder="Unit Rate" id="unit-rate<?=$i?>"
                                                                                oninput="calculateTotalPrice(this.closest('.row'))"
                                                                                required
                                                                                value="<?= $p_info['unit_rate'] ?> ">
                                                                        </div>
                                                                        <div class="sm:w-1/6 w-full mb-[30px]">
                                                                            <label
                                                                                class="text-dark dark:text-white text-[13px] mb-2">Total
                                                                                Price</label>
                                                                            <input type="float" name="total_price[]"
                                                                                class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full"oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               
                                                                                placeholder="Total Price" required
                                                                                value="<?= $p_info['total_price'] ?> ">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php endforeach; ?>
                                                            <!--<div class="sm:py-5 sm:px-10 p-[25px] flex items-center justify-between border-t border-b-color">-->
                                                            <!--	<button type="button" id="add-product-btn" class="btn btn-primary sm:py-[0.719rem] py-2.5 sm:px-[1.563rem] px-4 sm:text-[15px] text-[13px] font-medium rounded text-white bg-primary leading-5 inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary">Add Product</button>-->
                                                            <!--</div>-->
                                                            <hr>
                                                            <div class="row">
                                                                <div class="sm:w-1/4 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>
                                                                    Sub Total
                                                                    <input type="float" id="grand-total"
                                                                        name="grand_total[]"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
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
                                                                        <option value="percent" <?= ($invoice[0]['discount_type'] == 'percent') ? 'selected' : ''; ?>>Discount in Percentage
                                                                        </option>
                                                                        <option value="rupee" <?= ($invoice[0]['discount_type'] == 'rupee') ? 'selected' : ''; ?>>Discount in Rupee
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
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
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
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full" oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
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
                                                                    <input type="float" id="tax-amount" name="tax_amount"
                                                                        value="<?= $invoice[0]['tax_amount'] ?>"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"  oninput="this.value = this.value.replace(/[^0-9.]/g, '');" 
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
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46"              placeholder="Final Total"
                                                                        value="<?= $invoice[0]['final_total'] ?>">
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
                                                                            <?= strpos($invoice_payment[0]['mode'], 'Cheque') !== false ? 'selected' : '' ?>>Cheque</option>
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
                                                                                    id="chequeDetails"
                                                                                    style="display:none;">
                                                                                    <label
                                                                                        class="text-dark dark:text-white text-[13px] mb-2">Cheque Number</label>
                                                            <input type="text" name="cheque_no"
                                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                                        placeholder="Cheque Number"
                                                                                       id="cheque" value="<?= $invoice_payment[0]['cheque_no']?>" >
                                                                                </div>
                                                                                 <div class="sm:w-1/3 w-full mb-[30px]">
                                                                    <label
                                                                        class="text-dark dark:text-white text-[13px] mb-2"></label>Paid
                                                                    Amount
                                                                    <input type="float" name="paid"
                                                                        class="form-control relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500 outline-none w-full relative text-[13px] text-body-color h-[2.813rem] border border-b-color block rounded-md py-1.5 px-3 duration-500  outline-none w-full"
                                                                        placeholder="paid amount"
                                                                        value="<?= $invoice_payment[0]['paid'] ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); " 
       onkeypress="return event.charCode >= 48 && event.charCode <= 57 || event.charCode === 46" 
                                               >
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
 
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
             <?php  
             $i=0;
            $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'], 'user_id', $user[0]['id']); ?>
            <?php foreach ($p_produc as $p_info): $i++;?>
            $(document).ready(function () {
                $('#category-select<?=$i?>').change(function () {
                    var selectedCategory = $(this).val();
                    var subCategorySelect = $('#sub-category-select<?=$i?>');
                    var unitRateField = $('#unit-rate<?=$i?>');
                    var availableQuantity = $('#available<?=$i?>');
                    var pid = $('#p_id<?=$i?>');
                    // Clear previous options
                    subCategorySelect.empty();
                    subCategorySelect.append('<option selected>Select Date</option>');

                    // Reset unit rate field
                    unitRateField.val(''); // Reset the unit rate field
                    availableQuantity.val('');
                    pid.val('');
                    // Fetch subcategories and unit rates via AJAX
                    if (selectedCategory) {
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_subcategories/") ?>' + selectedCategory, // Update with your actual route
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                $.each(data, function (index, subCategory) {
                                    // Append packing options to the dropdown
                                    subCategorySelect.append('<option value="' + subCategory.p_id + '">' + subCategory.exp_date + ' </option>');
                                });
                            },
                            error: function () {
                                console.error('Failed to fetch packing options.');
                            }
                        });
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_product_details/") ?>' + selectedCategory,
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                if (data && !data.error) {
                                    $('#unit-rate<?=$i?>').val(data.selling_price);



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

                // Handle change event on sub-category-select to update unit rate
                $('#sub-category-select<?=$i?>').change(function () {
                    var selectedPacking = $(this).val();
                   
                    var availableQuantity = $('#available<?=$i?>');
                    var pid = $('#p_id<?=$i?>');
                    var quantityField = $('#blankquantity<?=$i?>');
                    // Fetch the unit rate based on the selected packing
                    if (selectedPacking) {
                        $.ajax({
                            url: '<?= base_url("Admin_Dashboard/get_unit_rate/") ?>' + selectedPacking, // Update with your actual route for unit rate
                            type: 'GET',
                            dataType: 'json',
                            success: function (data) {
                                // console.log('Subcategory:', data);

                                // Assuming the response contains the unit rate
                                if (data) {
                                  // Set the unit rate
                                    availableQuantity.val(data.availabile_quantity);
                                    pid.val(data.p_id);
                                    quantityField.val(''); 
                                    calculateTotalPrice(row);
                                   
                                } else {
                                // Clear if no unit rate found
                                    availableQuantity.val(' ');
                                    quantityField.val(''); 
                                    pid.val('');
                                }
                            },
                            error: function () {
                                console.error('Failed to fetch unit rate.');
                            }
                        });
                    } else {
                        // Reset if no packing is selected
                        availableQuantity.val('');
                        pid.val('');
                    }
                });
               
            });
            <?php endforeach; ?>
           

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



            function calculateTotalPrice(row) {
    const quantity = parseFloat(row.querySelector('input[name="quantity[]"]').value) || 0;
    const unitRate = parseFloat(row.querySelector('input[name="unit_rate[]"]').value) || 0;
    const totalPriceInput = row.querySelector('input[name="total_price[]"]');

    const totalPrice = (quantity * unitRate).toFixed(2);
    totalPriceInput.value = totalPrice;

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
</script>
  <script>
             <?php
             $i=0;
        $p_produc = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice[0]['invoice_no'], 'user_id', $user[0]['id']); ?>
      <?php foreach ($p_produc as $p_info): $i++;?>
document.addEventListener("DOMContentLoaded", function () {
    let productSelects = {}; // Store Choices.js instances for each dropdown

    function initializeChoices() {
        document.querySelectorAll(".category-select").forEach((select) => {
            const index = select.dataset.index;
            if (!productSelects[index]) { 
                productSelects[index] = new Choices(select, {
                    searchEnabled: true,
                    itemSelectText: "",
                    shouldSort: false
                });
            }
        });

     
    }
    // Set default stock place products on load
    const defaultStockPlaceId = document.getElementById('stock_place').value;
    if (defaultStockPlaceId) {
        updateProductOptionsForAllRows(defaultStockPlaceId);
    }

    // Stock place change event
    document.getElementById('stock_place').addEventListener('change', function () {
        updateProductOptionsForAllRows(this.value);
    });

    initializeChoices();
});

//

$(document).on('input', 'input[name="quantity[]"]', function () {
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
                
            <?php endforeach; ?>
            function filterProducts() {
    var stockPlaceId = document.getElementById('stock_place').value;

    // Clear existing product selections
    document.querySelectorAll('.category-select').forEach(function(select) {
        select.innerHTML = '<option value="">Select Product</option>'; // Reset options
    });

    if (stockPlaceId) {
        $.ajax({
            url: '<?= base_url("Admin_Dashboard/get_products_by_stock/") ?>' + stockPlaceId,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data && data.length > 0) {
                    data.forEach(function(product) {
                        // Append product options to each product select
                        document.querySelectorAll('.category-select').forEach(function(select) {
                            select.innerHTML += '<option value="' + product.id + '">' + product.product_name + '</option>';
                        });
                    });
                    // Re-initialize Choices.js for the updated selects
                    initializeChoices();
                }
            },
            error: function() {
                console.error('Failed to fetch products.');
            }
        });
    }
}
        </script>
        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
</body>

</html>