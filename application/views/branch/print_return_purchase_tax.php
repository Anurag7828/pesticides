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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include "includes2/header-links.php" ?>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
       
        
.invoice-box{
    background:#fff;
    padding:10px;
}
.right-btn{
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
            margin:0;
        }

        /* Make the content body visible and centered */
        .content-body, .content-body * {
            visibility: visible;
            /* Center the text */
        }

        .content-body {
            position: absolute;
            left: 0;
            top: -50px !important; 
            right:0px;
            width: 100% !important; /* Ensure full width for centering */
            margin: 0px ;
        }

  table tr .blank-height {
        height: 182.5px !important;
       
    }/* Hide buttons and any other elements that should not appear in print */
        #generatePDF,
        #printBtn, #saveButton, #invoicen {
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
                       
<button  id="invoicen" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Normal Invoice</button>
                      
<button  id="invoicen1" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Basic Invoice</button>
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
            <strong> <?= isset($user_main[0]['shop']) ? $user_main[0]['shop'] : '' ?></strong><br>
       <?=$user_main['0']['address']?> <?= $user_main['0']['city']?> <br><?= $user_main['0']['district']?> ,<?= $user_main['0']['state']?> <?= $user_main['0']['pincode']?><br>
           <b>Contact: </b> <?= isset($user_main[0]['contact']) ? $user_main[0]['contact'] : '' ?>,
           <b>Email: </b>  <?= isset($user_main[0]['email']) ? $user_main[0]['email'] : '' ?><br>
           <b>Gst No.: </b>  <?= isset($user_main[0]['gst_no']) ?$user_main[0]['gst_no'] : '' ?>,
           <?php if($user_main['0']['lic_no'] ){ ?>
                                               <b>Lic No.: </b>   <?= $user_main['0']['lic_no'] ?><br>
                                                <?php } if($user_main['0']['cin_no']){?>
                                     <b>Cin No.: </b>   <?= $user_main['0']['cin_no'] ?><br>
                                            <?php } ?>
        </td>
        
    </tr>
    <tr>
        <td  style="padding: 10px; border-right: 2px solid black;">
            <strong >Bill To:</strong><br>
            
        </td>
        <td style="padding: 10px;">
            <strong >Purchase Details:</strong><br>
         
        </td>
    </tr>
    <tr>
        <td style="width: 50%; padding: 10px; vertical-align: top; border-top: 2px solid black;border-right: 2px solid black;">
           
              <?php
                            $vender = $this->CommonModal->getRowByMultitpleId('vender', 'id', $purchase_product['0']['vender_name'],'user_id',$user['0']['user_id']);
                         
                    ?>
                <strong>Vender Name:</strong><?= $vender[0]['vender_name'] ?><br>
                <input type="hidden" id="custommer" value="<?= $vender[0]['vender_name'] ?>">
                <strong>Contact:</strong><?= $vender[0]['mobile'] ?><br>
                <strong>Address:</strong> 
                <span style="display: block; max-width: 400px; word-wrap: break-word; white-space: normal;">
                    <?= $vender[0]['address'] ?>
                </span>
                
         
        </td>
        <td style="width: 50%; padding: 10px; vertical-align: top; border-top: 2px solid black;">
          
            <strong>Return Code:</strong><?= $user['0']['return_code'] ?>-<?= $purchase_product[0]['return_code']?><br>
            <strong>Date:</strong> <?= date('d-m-Y', strtotime($purchase_product[0]['date']))?>
        </td>
    </tr>
   
</table>

                <table class=" table-striped w-auto text-nowrap table-bordered w-auto text-nowrap"style=" border-collapse: collapse; border: 2px solid black; ">
                    <thead style="background-color: #f2f2f2;">
                        <tr>
                            <th>#</th>
                            <th>Item Name</th>
                            <th>HSN Code</th>
                            <th>Net Qty</th>
                             <th>GST in(%)</th>
                            <th>Unit Rate (₹)</th>
                            <th>Quantity</th>
                            <th>Total (₹)</th>
                        </tr>
                    </thead>
                    <tbody>
                          <?php
                            $purchase_code = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'user_id',$user['0']['user_id']);
                            $i=0;
                            if (!empty($purchase_code)) { 
                                foreach ($purchase_code as $row)
                                         { $quantity_total +=$row['quantity'];
                                             $i++;
                    ?> 
                                <tr>
                                    <td><?= $i ?>.</td>
                                     <?php  $product = $this->CommonModal->getRowById('product', 'id',  $row['product_name']); ?>
                                    <td class="text-wrap" style="max-width: 150px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <?=  $product[0]['product_name'] ?> 
                                    </td>
                                    <td><?= $row['HSN_code']?></td>
                                    <td><?= $row['packing']?><?= $row['unit']?></td>
                                    <td><?= $row['gst_tax']?></td>
                                    <td>₹<?= isset($row['p_price']) ? $row['p_price'] : '' ?> /-</td>
                                    <td><?= isset($row['quantity']) ? $row['quantity'] : '' ?></td>
                                    <td>₹ <?= isset($row['total_price']) ? $row['total_price'] : '' ?> /-</td>
                                </tr>
                            <?php } } ?>
                    </tbody>
                    <tfoot>
                        <tr>
   
                            <td colspan="6" style="   border: 1px solid #000;"><strong class="text-dark table-bordered">Total </strong></td>
                               <td style=" border: 1px solid #000;" ><?= $quantity_total ?> </td>
                            <td style=" border: 1px solid #000;" >₹<?= $row['sub_total']?>/-</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="summary-container " style="display: flex; justify-content: space-between; width: 100%; ">
                    <div class="tax-summary" style="width:50%" >

                        <table class="table-striped w-auto text-nowrap table-bordered" style="width: 100%; border-collapse: collapse; border: 2px solid black;  ">
                              <tr>
                                <th colspan="3">Tax Summary </th>
                               

                            </tr>
                            <tr>
                             
                                <th >Taxable Amount (₹)</th>
                                <th>GST (CGST + SGST)</th>

                                <th >Total Tax (₹)</th>

                            </tr>
                              <?php
                             $purchase_code = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'user_id',$user['0']['user_id']);
                            $i=0;
                            if (!empty($purchase_code)) { 
                                foreach ($purchase_code as $row)
                                         { $i++;
                    ?>

                            <tr>
                               
                                <td >₹<?= isset($row['total_price']) ? $row['total_price'] : '' ?>/-</td>
                                <td ><?= $user_main[0]['tax'] ?> %</td>


                                <td>₹<?= $row['gst_tax']?>/-</td>
                             
</tr>
   <?php } }?>
     <tr style="border:none !important ;">
        <td class="blank-height" colspan="3"   style="height: 168.5px; !important"></td> <!-- This cell spans 3 rows -->
        
    </tr>
      
    

                        </table>
                    </div>
                    <div class="total-summary table-bordered table-striped"  >
                        <table class="table-bordered text-sm" style="width: 100%; border-collapse: collapse; border: 2px solid black; padding-right:30px">
                            <tr>
                                <td>Sub Total:</td>
                                <td>₹<?= $row['sub_total']?>/-</td>
                            </tr>
                            <tr>
                                <td>Discount (In <?= $row['discount_type'] ?> ):</td>
                                <td><?= $row['discount_amount'] ?> <?php if ($row['discount_type'] == 'percent') { ?>
                                        <?= '%' ?>
                                    <?php } else { ?>
                                        <?= '' ?>
                                    <?php } ?> /-</td>
                            </tr>


<tr>
    <td><strong>Final Total:</strong></td>

    <td><strong>₹<?= $row['grand_total']?> /-</strong></td>
</tr>

                            <tr class="bg-light">
                                <th colspan="2">Amount In Words : <?= convertNumberToWords($row['grand_total'])?> only</th>
                                </tr>
                 
    <?php
                              $payment = $this->CommonModal->getRowByIdOrderByLimit('return_purchase_payment', 'return_code',  $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'id','DESC','1');
                                                          $paymentsum = $this->CommonModal->getRowByIdSum('return_purchase_payment', 'return_code', $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'paid');?>
                                                                                  
<tr>
    <td><strong>Paid Amount:</strong></td>
                                <td><strong>₹ <?= $paymentsum[0]['total_sum'] ?> /-</strong></td>
                            </tr>
<tr>
    <td><strong>Due Amount:</strong></td>
                                <td><strong>₹ <?= $payment[0]['due'] ?> /-</strong></td>
                            </tr>
                        </table>
                    </div>

                </div>
           
                
                        <table class=" table-bordered" style="border: 2px solid black; ">
                            <tr>

                                <th>Terms & Condition</th>

                            </tr>
                            <tr>
                                <td style="height: 20px;"> <?= html_entity_decode($user_main[0]['term']) ?></td>

                            </tr>
                        </table>


                        <div class="right " style="width:100%; ">
                            <table  class=" table-bordered"style="border: 2px solid black; " >
                               
                                <tr>
                             <td style="text-align: -webkit-right;">
                                        <img src="<?= base_url() ?>uploads/users/<?= $user_main['0']['signimage'] ?>" width="100px" alt="" style="height:60px;">
                                        <img src="<?= base_url() ?>uploads/users/<?= $user_main['0']['sealimage'] ?>" width="100px" alt="" style="height:60px;">
                                    </td>
                                    
                                </tr>

                            </table>
                        </div>
                        <div class="right mt-4">
                             <button id="generatePDF" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Download</button>
<button id="printBtn" class="py-2 px-4 bg-primary text-white rounded hover:bg-hover-primary duration-300">Print</button>
<button id="saveButton" class="py-2 px-4 bg-secondary text-white rounded hover:bg-hover-secondary duration-300">Save</button>
 <button id="whatsappBtn" class="py-2 px-2 bg-secondary text-white rounded hover:bg-hover-green duration-300" style="background-color: green !important;">WhatsApp</button>



                        </div>
                  </div>
        </div>

    </div>
               </div>
        </div> 
            </div>
        </div>

    <!-- Content body start -->

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
           window.location.href = "<?= base_url('Branch_Dashboard/print_return_purchase/' . encryptId($user['0']['id']) . '/' .$purchase_product[0]['return_code']); ?>";
        });
        
        document.getElementById('invoicen1').addEventListener('click', function() {
            // Show the alert
            alert("Change Invoice Formate");

            // Redirect to the desired page after the alert
           window.location.href = "<?= base_url('Branch_Dashboard/print_return_purchase_normal/' . encryptId($user['0']['id']) . '/' .$purchase_product[0]['return_code']); ?>";
        });

        document.getElementById('printBtn').addEventListener('click', function() {
            document.body.classList.add('print-mode'); // Extra class add karega jo print CSS ko trigger karega
            window.print();
            document.body.classList.remove('print-mode'); // Print ke baad wapas normal mode aayega
        });
    </script>


	<?php 
    $payment = $this->CommonModal->getRowByIdOrderByLimit('return_purchase_payment', 'return_code',  $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'id','DESC','1');
 $paymentsum = $this->CommonModal->getRowByIdSum('return_purchase_payment', 'return_code', $purchase_product['0']['return_code'],'branch_id',$user['0']['id'],'paid');
    $customer = $this->CommonModal->getRowByMultitpleId('vender', 'id', $purchase_product['0']['vender_name'],'user_id',$user['0']['user_id']);

    if (!empty($customer)) {  
        foreach ($customer as $cus) {
            // Invoice URL updated to match the "View Purchase" button
            $invoiceUrl = base_url('Branch_Dashboard/print_return_purchase_tax/' . encryptId($user[0]['id']) . '/' . $purchase_product[0]['return_code']);
?>
<script>
    document.getElementById('whatsappBtn').addEventListener('click', function () {
        let customerName = "<?= $cus['vender_name'] ?>"; // Fixed variable
        let contactNumber = "<?= $cus['mobile'] ?>"; 
        let totalAmount = "<?= $invoice['0']['final_total'] ?>";
        let paidAmount = "<?= $paymentsum[0]['total_sum'] ?>"; 
        let dueAmount = "<?= $payment[0]['due'] ?>"; 
        let invoiceUrl = "<?= $invoiceUrl ?>"; // Updated Invoice URL

        // WhatsApp Message Format
        let message = `*Return Purchase Bill Details*%0A
        *Vendor Name:* ${customerName}%0A
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



  <?php include "includes2/footer-links.php" ?>
	</div>
	<?php include "includes2/footer.php" ?>
	
  <script>
    document.getElementById('generatePDF').addEventListener('click', function () {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('p', 'pt', 'a4');  // Portrait mode, points unit, A4 size

        // Select the HTML element (the invoice content)
        const invoiceElement = document.querySelector('.content-body');

        const generateButton = document.getElementById('generatePDF');
            const printButton = document.getElementById('printBtn');
            const saveButton = document.getElementById('saveButton');
                 const invoiceButton = document.getElementById('invoicen');
                      const invoiceButton1 = document.getElementById('invoicen1');
            generateButton.style.display = 'none';  // Hide the button
            printButton.style.display = 'none';    // Hide the print button
            saveButton.style.display = 'none';      // Hide the button
invoiceButton.style.display = 'none';      
invoiceButton1.style.display = 'none';     
        // Use html2canvas to convert the HTML to canvas and then use jsPDF to create a PDF
        html2canvas(invoiceElement, {
            scale: 2,  // Increase scale for better resolution in the PDF
            useCORS: true  // Enable cross-origin resource sharing for images
        }).then(function (canvas) {
            // Show the generate button again after PDF is generated
            generateButton.style.display = 'inline-block';  // Show the button again
            printButton.style.display = 'inline-block';    // Show the print button again
            saveButton.style.display = 'inline-block';
            invoiceButton.style.display = 'inline-block';
            invoiceButton1.style.display = 'inline-block';
            // Get image data from canvas
            const imgData = canvas.toDataURL('image/png');
            const imgWidth = 595.28;  // A4 page width in points (JS uses points for size)
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