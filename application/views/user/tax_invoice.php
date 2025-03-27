<!DOCTYPE html>
<html lang="en">

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <?php include "includes2/header-links.php" ?>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .invoice-box {
            background: #fff;
            padding: 10px;
        }

        .right-btn {
            text-align: right;
        }

        .header-box {
            text-align: center;
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .company-info {
            border: 2px solid #000;
            padding: 10px;
            text-align: left;
            margin-bottom: 10px;
        }

        .customer-invoice-details {
            display: flex;
            width: 100%;
            border: 2px solid #000;
        }

        .customer-invoice-details div {
            width: 50%;
            border: 2px solid #000;
            padding: 10px;
        }

        .customer-invoice-details .left {
            border-right: 2px solid #000;

        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 0;
        }

        th,
        td {
            border: 2px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background: #f4f4f4;
        }

        .summary-container {
            display: flex;
            justify-content: space-around;

        }

        .tax-summary tr,
        td {
            width: 50%;
            margin-top: 0;
            height: 30px;
            border: 2px solid #000;
        }

        .total-summary {
            width: 50%;
            margin-top: 0;
            border: 2px solid #000;

        }

        .terms {
            padding-top: 10px;
        }
    </style>
    <style>
        @media print {

            /* Hide all elements except for the content body */
            body * {
                visibility: hidden;
            }

            @page {
                size: A3;
                margin: 0;
            }

            /* Make the content body visible and centered */
            .content-body,
            .content-body * {
                visibility: visible;
                /* Center the text */
            }

            .content-body {
                position: absolute;
                left: 0;
                top: -50px !important;
                right: 0px;
                width: 100% !important;
                /* Ensure full width for centering */
                margin: 0px;
            }

            table tr .blank-height {
                height: 182.5px !important;

            }

            /* Hide buttons and any other elements that should not appear in print */
            #generatePDF,
            #printBtn,
            #saveButton,
            #invoicen,
            #invoicen1 {
                display: none !important;
            }
        }
    </style>
    <!-- Include Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">-->
</head>


<body class="selection:text-white selection:bg-primary">

    <!-- Main wrapper start -->
    <div id="main-wrapper" class="relative">
        <?php include "includes2/header.php" ?>
        <?php include "includes2/sidebar.php" ?>

        <div class="content-body">
            <div class="right-btn mt-4 mr-4">

                <button id="invoicen" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Normal Invoice</button>
                <button id="invoicen1" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Basic Invoice</button>
            </div>
            <div class="container">
                <div class="row">
                    <div class="w-full">
                        <div class="mt-4 flex flex-col">

                            <div class="invoice-box">
                                <div class="header-box">Tax Invoice</div>
                                <div class="table-responsive">
                                    <table style="width: 100%; border-collapse: collapse; border: 2px solid black; font-family: Arial, sans-serif;">
                                        <tr>
                                            <td colspan="2" style="text-align:left; padding: 10px; border-bottom: 2px solid black;">
                                                <strong> <?= isset($user[0]['shop']) ? $user[0]['shop'] : '' ?></strong><br>
                                                <?= $user['0']['address'] ?> <?= $user['0']['city'] ?> <br><?= $user['0']['district'] ?> ,<?= $user['0']['state'] ?> <?= $user['0']['pincode'] ?><br>
                                                <b>Contact: </b> <?= isset($user[0]['contact']) ? $user[0]['contact'] : '' ?>,
                                                <b>Email: </b> <?= isset($user[0]['email']) ? $user[0]['email'] : '' ?><br>
                                                <b>Gst No.: </b> <?= isset($user[0]['gst_no']) ? $user[0]['gst_no'] : '' ?>,
                                                <?php if ($user['0']['lic_no']) { ?>
                                                    <b>Lic No.: </b> <?= $user['0']['lic_no'] ?><br>
                                                <?php }
                                                if ($user['0']['cin_no']) { ?>
                                                    <b>Cin No.: </b> <?= $user['0']['cin_no'] ?><br>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style="padding: 10px; border-right: 2px solid black;">
                                                <strong>Bill To:</strong><br>

                                            </td>
                                            <td style="padding: 10px;">
                                                <strong>Invoice Details:</strong><br>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 50%; padding: 10px; vertical-align: top; border-top: 2px solid black;border-right: 2px solid black;">

                                                <?php
                                                $customer = $this->CommonModal->getRowById(
                                                    'customer',
                                                    'id',
                                                    isset($invoice[0]['customer_name']) ? $invoice[0]['customer_name'] : '',
                                                    'user_id',
                                                    isset($user[0]['id']) ? $user[0]['id'] : ''
                                                );
                                                if (!empty($customer)) {
                                                    foreach ($customer as $row) {
                                                ?>
                                                        <strong>Name:</strong> <?= $row['name'] ?><br>
                                                        <input type="hidden" id="custommer" value="<?= $row['name'] ?>">
                                                        <strong>Contact:</strong> <?= $row['contact'] ?><br>
                                                        <strong>Address:</strong>
                                                        <span style="display: block; max-width: 400px; word-wrap: break-word; white-space: normal;">
                                                            <?= $row['address'] ?>
                                                        </span>

                                                <?php }
                                                } ?>
                                            </td>
                                            <td style="width: 50%; padding: 10px; vertical-align: top; border-top: 2px solid black;">

                                                <strong>Invoice No:</strong> <?= isset($user[0]['prefix']) ? $user[0]['prefix'] : '' ?>-<?= isset($invoice[0]['invoice_no']) ? $invoice[0]['invoice_no'] : '' ?><br>
                                                <strong>Date:</strong> <?= isset($invoice[0]['date']) ? date('d-m-Y', strtotime($invoice[0]['date'])) : '' ?>
                                            </td>
                                        </tr>

                                    </table>

                                    <table class=" table-striped w-auto text-nowrap table-bordered w-auto text-nowrap" style=" border-collapse: collapse; border: 2px solid black; ">
                                        <thead style="background-color: #f2f2f2;">
                                            <tr>
                                                <th>#</th>
                                                <th>Item Name</th>
                                                <th>HSN Code</th>
                                                <th>Net Qty</th>
                                                <th>Unit Rate (₹)</th>
                                                <th>Quantity</th>
                                                <th>Total (₹)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $invoice_no = $this->CommonModal->getRowByMultitpleId(
                                                'invoice',
                                                'invoice_no',
                                                isset($invoice[0]['invoice_no']) ? $invoice[0]['invoice_no'] : '',
                                                'user_id',
                                                isset($user[0]['id']) ? $user[0]['id'] : ''
                                            );

                                            $i = 0;
                                            $grand_total = 0;

                                            if (!empty($invoice_no)) {
                                                foreach ($invoice_no as $row) {
                                                    $i++;
                                                    $product = $this->CommonModal->getRowById('product', 'id', $row['p_name']);
                                                    $packing = $this->CommonModal->getRowById('purchase_product', 'P_id', $row['packing']);

                                                    $grand_total += $row['total_price'];
                                                    $quantity_total += $row['quantity'];
                                            ?>
                                                    <tr>
                                                        <td><?= $i ?></td>
                                                        <td class="text-wrap" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                            <?= isset($product[0]['product_name']) ? $product[0]['product_name'] . ' - ' . $product[0]['unit'] : '' ?>

                                                        </td>
                                                        <td><?= isset($product[0]['HSN']) ? $product[0]['HSN'] : '' ?></td>
                                                        <td><?= isset($product[0]['packing']) ? $product[0]['packing'] : '' ?> <?= isset($product[0]['net_unit']) ? $product[0]['net_unit'] : '' ?></td>
                                                        <td>₹<?= isset($row['unit_rate']) ? $row['unit_rate'] : '' ?> /-</td>
                                                        <td><?= isset($row['quantity']) ? $row['quantity'] : '' ?></td>
                                                        <td>₹ <?= isset($row['total_price']) ? $row['total_price'] : '' ?> /-</td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" style="   border: 1px solid #000;"><strong class="text-dark table-bordered">Total </strong></td>
                                                <td style=" border: 1px solid #000;"><?= $quantity_total ?> </td>
                                                <td style=" border: 1px solid #000;">₹<?= $grand_total ?> /-</td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="summary-container " style="display: flex; justify-content: space-between; width: 100%; ">
                                        <div class="tax-summary" style="width:50%">

                                            <table class="table-striped w-auto text-nowrap table-bordered" style="width: 100%; border-collapse: collapse; border: 2px solid black;  ">
                                                <tr>
                                                    <th colspan="3">Tax Summary </th>


                                                </tr>
                                                <tr>

                                                    <th>Taxable Amount (₹)</th>
                                                    <th>GST (CGST + SGST)</th>

                                                    <th>Total Tax (₹)</th>

                                                </tr>
                                                <tr>
                                                    <?php
                                                    $packing = $this->CommonModal->getRowById('purchase_product', 'P_id', $row['packing']);
                                                    ?>


                                                    <td>₹<?= $row['grand_total'] ?>/-</td>
                                                    <td><?= $user[0]['tax'] ?> %</td>


                                                    <td>₹<?= $row['tax_amount'] ?>/-</td>
                                                </tr>
                                                <tr style="border:none !important ;">
                                                    <td class="blank-height" colspan="3"></td> <!-- This cell spans 3 rows -->

                                                </tr>



                                            </table>
                                            <?php if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0): ?>

                                                <table id="interestSection" class="table-striped w-auto text-nowrap table-bordered" style="width: 100%; border-collapse: collapse; border: 2px solid black;  ">
                                                    <tr>
                                                        <th colspan="3">Interest Tax Summary </th>


                                                    </tr>
                                                    <tr>

                                                        <th>Taxable Amount <br>With Interest (₹)</th>
                                                        <th>Interest Rate</th>

                                                        <th>Total Interest <br>Amount (₹)</th>

                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        $packing = $this->CommonModal->getRowById('purchase_product', 'P_id', $row['packing']);
                                                        ?>


                                                        <td>₹<span id="interestAmount"><?= number_format($invoice[0]['final_total'] + $invoice[0]['interest_amount'], 2); ?>/-</td>
                                                        <td><?= number_format($invoice[0]['interest_rate'], 2); ?>%</td>


                                                        <td> ₹<?= number_format($invoice[0]['interest_amount'], 2); ?></td>
                                                    </tr>
                                                    <tr style="border:none !important ;">
                                                        <td class="blank-height" colspan="3"></td> <!-- This cell spans 3 rows -->

                                                    </tr>



                                                </table>
                                            <?php endif; ?>

                                        </div>
                                        <div class="total-summary table-bordered table-striped">
                                            <table class="table-bordered text-sm" style="width: 100%; border-collapse: collapse; border: 2px solid black; padding-right:30px">
                                                <tr>
                                                    <td>Sub Total:</td>
                                                    <td>₹<?= $row['grand_total'] ?> /-</td>
                                                </tr>
                                                <tr>
                                                    <td>Discount (In <?= $row['discount_type'] ?> ):</td>
                                                    <td><?= $row['discount'] ?> <?php if ($row['discount_type'] == 'percent') { ?>
                                                            <?= '%' ?>
                                                        <?php } else { ?>
                                                            <?= '' ?>
                                                        <?php } ?> /-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total:</strong></td>
                                                    <td><strong>₹<?= $row['total_without_tax'] ?> /-</strong></td>
                                                </tr>
                                                <tr>
                                                    <td>GST Tax (<?= $user[0]['tax'] ?> %):</td>
                                                    <td>₹<?= $row['tax_amount'] ?> /-</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Final Total:</strong></td>
                                                    <td><strong>₹<?= $row['final_total'] ?> /-</strong></td>
                                                </tr>
                                                <?php if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0): ?>

                                                <tr>
                                                    <td><strong>Interest Amount:</strong></td>
                                                    <td><strong>₹<?= number_format($invoice[0]['interest_amount'], 2); ?> /-</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total With Interest Amount:</strong></td>
                                                    <td><strong>₹<?= number_format($invoice[0]['final_total'] + $invoice[0]['interest_amount'], 2); ?>/-</strong></td>
                                                </tr>
                                                
                                                <?php endif; ?>

                                              <?php if ($invoice[0]['include_interest'] == 1 && $invoice[0]['days_late'] > 0): ?>
    <tr class="bg-light">
        <th colspan="2">Amount In Words : <?= convertNumberToWords($invoice[0]['final_total'] + $invoice[0]['interest_amount']) ?> only</th>
    </tr>
<?php else: ?>
    <tr class="bg-light">
        <th colspan="2">Amount In Words : <?= convertNumberToWords($invoice[0]['final_total']) ?> only</th>
    </tr>
<?php endif; ?>

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
                                                <tr>
                                                    <td><strong>Paid Amount:</strong></td>
                                                    <td><strong>₹ <?= number_format($paid_amount, 2) ?> /-</strong></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Due Amount:</strong></td>
                                                    <td><strong>₹ <?= number_format($due_amount, 2) ?> /-</strong></td>
                                                </tr>
                                            </table>
                                        </div>

                                    </div>


                                    <table class=" table-bordered" style="border: 2px solid black; ">
                                        <tr>

                                            <th>Terms & Condition</th>

                                        </tr>
                                        <tr>
                                            <td style="height: 20px;"> <?= html_entity_decode($user[0]['term']) ?></td>

                                        </tr>
                                    </table>


                                    <div class="right " style="width:100%; ">
                                        <table class=" table-bordered" style="border: 2px solid black; ">

                                            <tr>
                                                <td style="text-align: -webkit-right;">
                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['signimage'] ?>" width="100px" alt="" style="height:60px;">
                                                    <img src="<?= base_url() ?>uploads/users/<?= $user['0']['sealimage'] ?>" width="100px" alt="" style="height:60px;">
                                                </td>

                                            </tr>

                                        </table>
                                    </div>
                                    <div class="right mt-4">
                                        <button id="generatePDF" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Download</button>
                                        <button id="printBtn" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Print</button>
                                        <button id="saveButton" class="py-2 px-4 bg-secondary text-white rounded hover:bg-hover-secondary duration-300">Save</button>
                                        <button id="whatsappBtn" class="py-2 px-4 bg-secondary text-white rounded hover:bg-hover-green duration-300" style="background-color: green !important;">WhatsApp</button>



                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content body start -->
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
        <?php

        $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no',  $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'id', 'DESC', '1');

        $paymentsum = $this->CommonModal->getRowByIdSum('payment', 'invoice_no', $invoice['0']['invoice_no'], 'user_id', $user['0']['id'], 'paid');

        $customer = $this->CommonModal->getRowById('customer', 'id', $invoice['0']['customer_name'], 'user_id', $user['0']['id']);

        if (!empty($customer)) {
            foreach ($customer as $cus) {
                // Invoice URL Same as Button Link
                $invoiceUrl = base_url('Admin/tax_invoice/' . encryptId($user['0']['id']) . '/' . $invoice['0']['invoice_no']);
        ?>
                <script>
                    document.getElementById('whatsappBtn').addEventListener('click', function() {
                        let customerName = "<?= $cus['name'] ?>";
                        let contactNumber = "<?= $cus['contact'] ?>";
                        let totalAmount = "<?= $invoice['0']['final_total'] ?>";
                        let paidAmount = "<?= $paymentsum[0]['total_sum'] ?>";
                        let dueAmount = "<?= $payment[0]['due'] ?>";
                        let invoiceUrl = "<?= $invoiceUrl ?>";

                        // WhatsApp Message Format
                        let message = `*Bill Details*%0A
        *Customer Name:* ${customerName}%0A
        *Total Amount:* ₹${totalAmount}%0A
        *Paid Amount:* ₹${paidAmount}%0A
        *Due Amount:* ₹${dueAmount}%0A
        *Invoice Link:* ${invoiceUrl}%0A
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
                window.location.href = "<?= base_url('Admin_Dashboard/print_invoice/' . encryptId($user['0']['id']) . '/' . $invoice[0]['invoice_no']); ?>";
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






        <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>

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
            generateButton.style.display = 'none'; // Hide the button
            printButton.style.display = 'none'; // Hide the print button
            saveButton.style.display = 'none'; // Hide the button
            invoiceButton.style.display = 'none';
            invoiceButton1.style.display = 'none';
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