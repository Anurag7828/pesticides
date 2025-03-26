<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            margin-bottom: 20px;
            background-color: #fff;
            padding: 20px;
           
        }

        body .container  .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

       body .container .header img {
            width: 50px !important;
            vertical-align: top;
        }

        .header div {
            margin-left: 10px;
        }

        .customer-info {
            margin-top: 20px;
        }

        .invoice-table, .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .invoice-table th, .invoice-table td, .summary-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: right;
        }

        .invoice-table th {
            background-color: #f5f5f5;
            text-align: left;
        }

        .invoice-table td:nth-child(2),
        .invoice-table td:nth-child(3) {
            text-align: left;
        }

        .summary-table {
            width: 50%;
            margin-left: auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div>
                <strong>Invoice No.:</strong> <?= $invoice[0]['invoice_no'] ?><br>
                <strong>Date:</strong> <?= date('d-m-Y', strtotime($invoice[0]['date'])) ?>
            </div>
            <img src="<?= base_url() ?>uploads/users/<?= $user['0']['image'] ?>" alt="Company Logo">
        </div>
        <div>
            <strong>Company Name:</strong> <?= $user['0']['name'] ?><br>
            <strong>Contact No.:</strong> <?= $user['0']['contact'] ?><br>
            <strong>Email:</strong> <?= $user['0']['email'] ?><br>
            <strong>GST No.:</strong> <?= $user['0']['gst_no'] ?><br>
            <strong>LIC No.:</strong> <?= $user['0']['lic_no'] ?>
        </div>
        <div class="customer-info">
            <?php
            $customer = $this->CommonModal->getRowById('customer', 'id', $invoice['0']['customer_name']);
            if (!empty($customer)) {
                foreach ($customer as $row) { ?>
                    <div>
                        <strong>Customer Name:</strong> <?= $row['name'] ?><br>
                        <strong>Contact No.:</strong> <?= $row['contact'] ?><br>
                        <strong>Address:</strong> <?= $row['address'] ?>
                    </div>
            <?php }
            } ?>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Item</th>
                    <th>Net Quantity</th>
                    <th>Unit Cost</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $invoice_no = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice['0']['invoice_no']);
                $i = 0;
                if (!empty($invoice_no)) {
                    foreach ($invoice_no as $row) {
                        $i++;
                ?>
                        <tr>
                            <td style="text-align: center;"><?= $i ?></td>
                            <?php
                            $product = $this->CommonModal->getRowById('product', 'id', $row['p_name']);
                            ?>
                            <td><?= $product[0]['product_name'] ?></td>
                            <td><?= $row['packing'] ?> <?= $row['unit'] ?></td>
                            <td>₹<?= $row['unit_rate'] ?> /-</td>
                            <td style="text-align: center;"><?= $row['quantity'] ?></td>
                            <td>₹<?= $row['total_price'] ?> /-</td>
                        </tr>
                <?php }
                } ?>
                <tr>
                    <td colspan="2"><strong>Rupees (In Words)</strong></td>
                    <td colspan="3"><?= convertNumberToWords($row['grand_total']) ?></td>
                    <td><strong>Total: ₹<?= $row['grand_total'] ?> /-</strong></td>
                </tr>
            </tbody>
        </table>
        <table class="summary-table">
            <tr>
                <td><strong>Pay</strong></td>
                <td style="text-align: right;">₹</td>
            </tr>
            <tr>
                <td><strong>Due</strong></td>
                <td style="text-align: right;">₹</td>
            </tr>
        </table>
    </div>

    <?php
    function convertNumberToWords($number) {
        $words = array(
            '0' => '', '1' => 'one', '2' => 'two',
            '3' => 'three', '4' => 'four', '5' => 'five',
            '6' => 'six', '7' => 'seven', '8' => 'eight',
            '9' => 'nine', '10' => 'ten', '11' => 'eleven',
            '12' => 'twelve', '13' => 'thirteen', '14' => 'fourteen',
            '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
            '18' => 'eighteen', '19' => 'nineteen', '20' => 'twenty',
            '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
            '60' => 'sixty', '70' => 'seventy', '80' => 'eighty',
            '90' => 'ninety'
        );

        $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');

        if ($number == 0) {
            return 'zero';
        }

        $i = 0;
        $str = [];
        
        while ($number > 0) {
            $divider = ($i == 2) ? 10 : 100;
            $amount = $number % $divider;
            $number = (int)($number / $divider);

            if ($amount > 0) {
                $counter = (($amount < 21) ? $words[$amount] : $words[(int)($amount / 10) * 10] . ' ' . $words[$amount % 10]);
                $str[] = $counter . ' ' . $digits[$i];
            }
            $i++;
        }

        $result = array_reverse($str);
        return implode(' ', $result) . ' rupees';
    }
    ?>
</body>

</html>
