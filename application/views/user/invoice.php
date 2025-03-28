<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <?php include "includes2/header-links.php" ?>
    <style>
        @media print {

            /* Hide all elements except for the content body */
            body * {
                visibility: hidden;
            }

            @page {
                size: A3;
            }

            /* Make the content body visible and centered */
            .content-body,
            .content-body * {
                visibility: visible;
                /* Center the text */


                padding-left: 0px;
            }

            .content-body {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;

                /* Ensure full width for centering */
                margin: 0;
            }

            .detail {
                width: 30% !important;
            }

            /* Hide buttons and any other elements that should not appear in print */
            #generatePDF,
            #printBtn,
            #saveButton,
            #invoicen,
            #whatsappBtn {
                display: none;
            }
        }

        .address-wrap {
            word-break: break-word;
            overflow-wrap: break-word;

        }

        .address-wrap ul,
        .address-wrap ol {
            padding-left: 20px;
            margin: 0;
        }

        .address-wrap ul {
            list-style-type: disc;
        }

        .address-wrap ol {
            list-style-type: decimal;
        }

        .right-btn {
            text-align: right;
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
            <div class="right-btn mt-4 mr-4">

                <button id="invoicen" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Tally Invoice</button>
                <button id="invoicen1" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Basic Invoice</button>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="w-full">
                        <div class="card mt-4 flex flex-col">
                            <div class="card-header flex justify-between sm:p-5 sm:pt-6 py-5 px-4 items-center relative flex-wrap border-b border-[#E6E6E6] dark:border-[#ffffff1a] sm:text-sm text-xs text-body-color"><span class="float-end"> <strong>Invoice No. </strong> <?= $user['0']['prefix'] ?>-<?= $invoice[0]['invoice_no'] ?></span><strong>श्री गणेशाय नमः</strong> <span class="float-end">
                                    <strong>Date:</strong> <?= date('d-m-Y', strtotime($invoice[0]['date'])) ?></span> </div>
                            <div class="sm:p-5 p-4 flex-auto">
                                <div class="row mb-12">
                                    <div class="mt-6 lg:w-1/4 md:w-1/2 w-full detail">
                                        <div class="2xl:w-7/12 w-full row items-center">
                                            <div class="sm:w-3/4">

                                                <?php if ($user['0']['image']) { ?>
                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" style="height:100px;" alt="">

                                                <?php } else { ?>
                                                    <div class="text-body-color sm:text-sm text-xs break-words"><strong style="font-size: 36px;line-height: 47px;"> <?= $user['0']['shop'] ?></strong></div>
                                                <?php } ?>



                                            </div>

                                        </div>
                                    </div>
                                    <div class="mt-6 lg:w-1/3 md:w-1/2 w-full detail">

                                        <div class="text-body-color sm:text-sm text-xs break-words"><strong>Shop Name.:</strong> <?= $user['0']['shop'] ?></div>

                                        <div class="text-body-color sm:text-sm text-xs"><strong>Contact No.:</strong> <?= $user['0']['contact'] ?></div>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Address:</strong> <?= $user['0']['address'] ?> <?= $user['0']['city'] ?> <br><?= $user['0']['district'] ?> ,<?= $user['0']['state'] ?> <?= $user['0']['pincode'] ?></div>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>Email Id:</strong> <?= $user['0']['email'] ?></div>
                                        <div class="text-body-color sm:text-sm text-xs"><strong>GST NO.:</strong> <?= $user['0']['gst_no'] ?></div>
                                        <?php if ($user['0']['lic_no']) { ?>
                                            <div class="text-body-color sm:text-sm text-xs"><strong>LIC No.:</strong> <?= $user['0']['lic_no'] ?></div>
                                        <?php }
                                        if ($user['0']['cin_no']) { ?>
                                            <div class="text-body-color sm:text-sm text-xs"><strong>CIN No.:</strong> <?= $user['0']['cin_no'] ?></div>
                                        <?php } ?>
                                    </div>
                                    <div class="mt-6 lg:w-1/3 md:w-1/2 w-full detail">
                                        <!-- <h6 class="mb-2">Customer Detail:</h6> -->
                                        <?php
                                        $customer = $this->CommonModal->getRowById('customer', 'id', $invoice['0']['customer_name'], 'user_id', $user['0']['id']);
                                        if (!empty($customer)) {  // Missing closing parenthesis fixed here
                                            foreach ($customer as $row) {
                                        ?>
                                                <div class="text-body-color sm:text-sm text-xs break-words"><strong>Customer Name:</strong> <?= $row['name'] ?></div>
                                                <input type="hidden" id="custommer" value="<?= $row['name'] ?>">
                                                <div class="text-body-color sm:text-sm text-xs"><strong>Contact No.:</strong> <?= $row['contact'] ?></div>
                                                <div class="text-body-color sm:text-sm text-xs break-words"><strong>Address:</strong> <?= $row['address'] ?></div>
                                        <?php }
                                        } ?>
                                    </div>

                                </div>
                                <div class="overflow-x-auto table-scroll">
                                    <table class="table w-full mb-4 table-border">
                                        <thead>
                                            <tr>
                                                <th class="py-[0.9375rem] border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark" style="width:1%;">#</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Item</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">HSN</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left text-dark">Net Quantity</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left right text-dark">Unit Rate</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-left center text-dark">Qty</th>
                                                <th class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap  sm:text-base text-sm font-medium text-right text-dark">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $invoice_no = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice['0']['invoice_no'], 'user_id', $user['0']['id']);
                                            $i = 0;
                                            if (!empty($invoice_no)) {  // Missing closing parenthesis fixed here
                                                foreach ($invoice_no as $row) {
                                                    $i++;
                                            ?>
                                                    <tr>

                                                        <td class="py-[0.9375rem]  border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $i ?></td>
                                                        <?php
                                                        $product = $this->CommonModal->getRowById('product', 'id',  $row['p_name']);
                                                        ?>
                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a]  sm:text-sm text-xs text-body-color left strong address-wrap"><?= $product[0]['product_name'] ?>-<?= $product[0]['unit'] ?></td>
                                                        <?php
                                                        $packing = $this->CommonModal->getRowById('purchase_product', 'P_id', $row['packing']);
                                                        ?>
                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"><?= $product[0]['HSN'] ?></td>
                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"><?= $product[0]['packing'] ?> <?= $product[0]['net_unit'] ?></td>
                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color right">₹<?= $row['unit_rate'] ?> /-</td>
                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><?= $row['quantity'] ?></td>

                                                        <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹<?= $row['total_price'] ?> /-</td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                            <tr>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Total Amount Without Discount</strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark"></strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹<?= $row['grand_total'] ?> /-</td>
                                            </tr>
                                            <tr>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Discount (In <?= $row['discount_type'] ?> )</strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark"></strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right"><?= $row['discount'] ?> <?php if ($row['discount_type'] == 'percent') { ?>
                                                        <?= '%' ?>
                                                    <?php } else { ?>
                                                        <?= '' ?>
                                                    <?php } ?> /-</td>
                                            </tr>
                                            <tr>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Total Amount Without Tax</strong></td>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark"></strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹<?= $row['total_without_tax'] ?> /-</td>
                                            </tr>
                                            <tr>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Tax Amount (GST <?= $user[0]['tax'] ?>%)</strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark"></strong></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹<?= $row['tax_amount'] ?> /-</td>
                                            </tr>
                                            <tr>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Total Amount In Rupees (In Words)</strong></td>

                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left strong"><?= convertNumberToWords($row['final_total']) ?> only</td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color left"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"></td>
                                                <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹<?= $row['final_total'] ?> /-</td>
                                            </tr>


                                        </tbody>


                                    </table>

                                    <!-- Include Interest Checkbox -->

                                    <?php if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0): ?>
                                        <!-- Interest Details Section -->
                                        <div id="interestSection" style="padding: 10px; margin-top: 10px; border: 1px solid #ccc; border-radius: 5px;">
                                            <h4>Interest Details</h4>

                                            <table class="w-full border-collapse">
                                                <tr>
                                                    <td class="py-2 px-2 border-b border-gray-300"><strong>Interest Rate:</strong></td>
                                                    <td class="py-2 px-2 border-b border-gray-300 text-right">
                                                        <span id="interestRate"><?= number_format($invoice[0]['interest_rate'], 2); ?>%</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="py-2 px-2 border-b border-gray-300"><strong>Days Passed After Due Date:</strong></td>
                                                    <td class="py-2 px-2 border-b border-gray-300 text-right">
                                                        <span id="daysLate"><?= $invoice[0]['days_late']; ?> days</span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="py-2 px-2 border-b border-gray-300"><strong>Interest Amount:</strong></td>
                                                    <td class="py-2 px-2 border-b border-gray-300 text-right">
                                                        ₹<span id="interestAmount"><?= number_format($invoice[0]['interest_amount'], 2); ?></span>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="py-2 px-2 border-b border-gray-300"><strong>Grand Total (Including Interest):</strong></td>
                                                    <td class="py-2 px-2 border-b border-gray-300 text-right">
                                                        ₹<span id="grandTotal"><?= number_format($invoice[0]['final_total'] + $invoice[0]['interest_amount'], 2); ?></span>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    <?php endif; ?>


                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var interestSection = document.getElementById("interestSection");

                                            // PHP variable ko JavaScript me pass karna
                                            var includeInterest = <?= $include_interest; ?>;

                                            // Agar include_interest = 1 hai toh interest section dikhao
                                            if (includeInterest == 1) {
                                                interestSection.style.display = "block";
                                            } else {
                                                interestSection.style.display = "none";
                                            }
                                        });
                                    </script>




                                </div>


                                <div class="row">
                                    <div class="lg:w-1/2 sm:w-5/12 w-full ml-auto">

                                        <table class="table w-full mb-4 table-clear">

                                            <tbody>

                                                <tr>


                                                    <td class="py-[0.9375rem] px-2.5  whitespace-nowrap sm:text-sm text-xs text-body-color text-right"> <img src="<?= base_url() ?>uploads/users/<?= $user['0']['sealimage'] ?>" width="100px" alt="" style="margin-top:-25px; height:100px; "><img src="<?= base_url() ?>uploads/users/<?= $user['0']['signimage'] ?>" width="100px" alt="" style="margin-top:-32px ; height:100px;"></td>
                                                    <td class="py-[0.9375rem] px-2.5 whitespace-nowrap sm:text-sm text-xs text-body-color text-right"> </td>
                                                </tr>


                                            </tbody>

                                        </table>
                                    </div>
                                    <?php
                                    $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
                                    $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'paid');

                                    // Final total calculation (Including Interest if applicable)
                                    $final_total = $invoice[0]['final_total'];
                                    if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0) {
                                        $final_total += $invoice[0]['interest_amount'];
                                    }

                                    // Updated due amount calculation
                                    $paid_amount = floatval($paymentsum[0]['total_sum']);
                                    $due_amount = $final_total - $paid_amount;
                                    ?>

                                    <div class="lg:w-1/3 sm:w-5/12 w-full ml-auto">
                                        <table class="table w-full mb-4 table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs left"><strong class="text-dark">Paid Amount</strong></td>
                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹ <?= number_format($paid_amount, 2) ?> /-</td>
                                                </tr>
                                                <tr>
                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs left"><strong class="text-dark">Due Amount</strong></td>
                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color text-right">₹ <?= number_format($due_amount, 2) ?> /-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="lg:w-1  w-full  ">

                                        <table class="table w-full mb-4 table-clear">

                                            <tbody>

                                                <tr>

                                                    <td class=" px-2.5 border-a border-[#E6E6E6] dark:border-[#ffffff1a] whitespace-nowrap sm:text-sm text-xs text-body-color center"><strong class="text-dark">Term And Condition :-</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="py-[0.9375rem] px-2.5 border-b border-[#E6E6E6] dark:border-[#ffffff1a] address-wrap sm:text-sm text-xs text-body-color left strong">
                                                        <div class="text-left"><?= html_entity_decode($user[0]['term']) ?></div>
                                                    </td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>
                                </div>
                                <button id="generatePDF" class="py-2 px-2 bg-primary text-white rounded hover:bg-hover-primary duration-300">Download</button>
                                <button id="printBtn" class="py-2 px-2 bg-primary text-white rounded hover:bg-hover-primary duration-300">Print</button>
                                <button id="saveButton" class="py-2 px-2 bg-secondary text-white rounded hover:bg-hover-secondary duration-300">Save</button>
                                <button id="whatsappBtn" class="py-2 px-2 bg-secondary text-white rounded hover:bg-hover-green duration-300" style="background-color: green !important;">WhatsApp</button>




                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <!-- Content body end -->
        <?php
        function convertNumberToWords($number)
        {
            $words = array(
                0 => '',
                1 => 'one',
                2 => 'two',
                3 => 'three',
                4 => 'four',
                5 => 'five',
                6 => 'six',
                7 => 'seven',
                8 => 'eight',
                9 => 'nine',
                10 => 'ten',
                11 => 'eleven',
                12 => 'twelve',
                13 => 'thirteen',
                14 => 'fourteen',
                15 => 'fifteen',
                16 => 'sixteen',
                17 => 'seventeen',
                18 => 'eighteen',
                19 => 'nineteen',
                20 => 'twenty',
                30 => 'thirty',
                40 => 'forty',
                50 => 'fifty',
                60 => 'sixty',
                70 => 'seventy',
                80 => 'eighty',
                90 => 'ninety'
            );

            $digits = ['', 'hundred', 'thousand', 'lakh', 'crore'];

            if ($number == 0) {
                return 'zero rupees';
            }

            $num_str = (string) $number;
            $length = strlen($num_str);
            $output = '';

            // Indian numbering system grouping
            $num_groups = [
                10000000 => 'crore',
                100000 => 'lakh',
                1000 => 'thousand',
                100 => 'hundred',
                1 => ''
            ];

            foreach ($num_groups as $value => $label) {
                if ($number >= $value) {
                    $num_part = (int) ($number / $value);
                    $number %= $value;

                    if ($num_part < 20) {
                        $output .= $words[$num_part] . ' ';
                    } else {
                        $output .= $words[($num_part - ($num_part % 10))] . ' ' . $words[$num_part % 10] . ' ';
                    }

                    $output .= $label . ' ';
                }
            }

            return trim($output) . ' rupees';
        }


        ?>

        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
    <?php

$payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');
$paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'paid');
$customer = $this->CommonModal->getRowById('customer', 'id', $invoice['0']['customer_name'], 'user_id', $user['0']['id']);

if (!empty($customer)) {
    foreach ($customer as $cus) {
        // Invoice Download URL
        $invoiceUrl = base_url('Admin/download_invoice/' . encryptId($user['0']['id']) . '/' . $invoice['0']['invoice_no']);

        // Check if interest is applied
        $final_total = floatval($invoice[0]['final_total']);
        if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0) {
            $final_total += floatval($invoice[0]['interest_amount']);
        }

        $paid_amount = floatval($paymentsum[0]['total_sum']);
        $due_amount = $final_total - $paid_amount;
?>
  <script>
    document.getElementById('whatsappBtn').addEventListener('click', function() {
        let customerName = "<?= $cus['name'] ?>";
        let contactNumber = "<?= $cus['contact'] ?>";
        let shopName = "<?= $user['0']['shop'] ?>";
        let invoiceDate = "<?= date('d M Y', strtotime($invoice['0']['date'])) ?>"; // Format Date
        let invoice_no = "<?= $user['0']['prefix'] ?>-<?= $invoice[0]['invoice_no'] ?>";
        
        // Default Total, Paid, and Due Amounts
        let totalAmount = parseFloat("<?= $invoice['0']['final_total'] ?>");
        let paidAmount = parseFloat("<?= $paymentsum[0]['total_sum'] ?>");
        let dueAmount = parseFloat("<?= $payment[0]['due'] ?>");

        // Check if interest is applied
        let includeInterest = "<?= $invoice[0]['include_interest'] ?>";
        let interestAmount = parseFloat("<?= $invoice[0]['interest_amount'] ?>");

        if (includeInterest == "1" && interestAmount > 0) {
            totalAmount += interestAmount; // Add interest to total amount
            dueAmount = totalAmount - paidAmount; // Adjust due amount
        }

        let invoiceUrl = "<?= $invoiceUrl ?>";

        // WhatsApp Message Format (Fixes the link issue)
        let message = `Hey ${customerName},%0A%0A
Thank you for choosing *${shopName}*!%0A%0A
Details of Your Sales Invoice,%0A
 *Invoice Number:* ${invoice_no}%0A
 *Invoice Date:* ${invoiceDate}%0A%0A
 *Total Amount:* ₹ ${totalAmount.toFixed(2)}%0A
 *Paid Amount:* ₹ ${paidAmount.toFixed(2)}%0A
 *Due Amount:* ₹ ${dueAmount.toFixed(2)}%0A%0A
View your invoice here:%0A${invoiceUrl}%0A%0A
Thank you for your purchase!`;

        let whatsappUrl = `https://wa.me/${contactNumber}?text=${message}`;
        window.open(whatsappUrl, '_blank');
  });
</script>



<?php
    }
}
?>



    <script>
        document.getElementById('saveButton').addEventListener('click', function() {
            // Show the alert
            alert("Invoice saved");

            // Redirect to the desired page after the alert
            window.location.href = "<?php echo base_url('Admin_Dashboard/invoice/' . encryptId($user['0']['id'])); ?>";
        });
        document.getElementById('invoicen').addEventListener('click', function() {
            // Show the alert
            alert("Change Invoice Formate");

            // Redirect to the desired page after the alert
            window.location.href = "<?= base_url('Admin_Dashboard/tax_invoice/' . encryptId($user['0']['id']) . '/' . $invoice[0]['invoice_no']); ?>";
        });

        document.getElementById('printBtn').addEventListener('click', function() {
            document.body.classList.add('print-mode'); // Extra class add karega jo print CSS ko trigger karega
            window.print();
            document.body.classList.remove('print-mode'); // Print ke baad wapas normal mode aayega
        });

        document.getElementById('invoicen1').addEventListener('click', function() {
            // Show the alert
            alert("Change Invoice Formate");

            // Redirect to the desired page after the alert
            window.location.href = "<?= base_url('Admin_Dashboard/normal_invoice/' . encryptId($user['0']['id']) . '/' . $invoice[0]['invoice_no']); ?>";
        });
    </script>
    <script>
        document.getElementById('generatePDF').addEventListener('click', function() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF('p', 'pt', 'a4'); // Portrait mode, points unit, A4 size

            // Select the HTML element (the invoice content)
            const invoiceElement = document.querySelector('.content-body');

            const generateButton = document.getElementById('generatePDF');
            const printButton = document.getElementById('printBtn');
            const saveButton = document.getElementById('saveButton');
            const invoiceButton = document.getElementById('invoicen');
            const invoiceButton1 = document.getElementById('invoicen1');
            const whatsappBtn = document.getElementById('whatsappBtn');
            generateButton.style.display = 'none'; // Hide the button
            printButton.style.display = 'none'; // Hide the print button
            saveButton.style.display = 'none'; // Hide the button
            invoiceButton.style.display = 'none';
            invoiceButton1.style.display = 'none';
            whatsappBtn.style.display = 'none';
            // Use html2canvas to convert the HTML to canvas and then use jsPDF to create a PDF
            html2canvas(invoiceElement, {
                scale: 2, // Increase scale for better resolution in the PDF
                useCORS: true // Enable cross-origin resource sharing for images
            }).then(function(canvas) {
                // Show the generate button again after PDF is generated
                generateButton.style.display = 'inline-block'; // Show the button again
                printButton.style.display = 'inline-block'; // Show the print button again
                saveButton.style.display = 'inline-block';
                invoiceButton.style.display = 'inline-block';
                invoiceButton1.style.display = 'inline-block';
                whatsappBtn.style.display = 'inline-block';
                // Get image data from canvas
                const imgData = canvas.toDataURL('image/png');
                const imgWidth = 595.28; // A4 page width in points (JS uses points for size)
                const pageHeight = 841.89; // A4 page height in points
                const imgHeight = canvas.height * imgWidth / canvas.width;
                let heightLeft = imgHeight;

                let position = 0;

                // Add the image to the PDF
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;

                // If content exceeds one page, add more pages
                while (heightLeft >= 0) {
                    position = heightLeft - imgHeight;
                    doc.addPage();
                    doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                    heightLeft -= pageHeight;
                }

                // Save the PDF
                // Assuming you have the invoice array in PHP
                let customerName = document.getElementById('custommer').value;

                // Create a filename
                let filename = `Invoice_${customerName}.pdf`;

                // Save the document with the new filename
                doc.save(filename);


            });
        });
    </script>

</body>

</html>