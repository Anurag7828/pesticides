<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from yashadmin.dexignzone.com/tailwind/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 09 Sep 2024 07:42:52 GMT -->

<head>

    <?php include "includes2/header-links.php" ?>
    <style>
        .address-wrap {
            word-break: break-word;
            overflow-wrap: break-word;

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
            <div class="container-fluid">
                <div class="row dz-tab-area">
                    <div class="flex justify-between items-center mb-5">
                        <a href="<?= base_url('admin_Dashboard/add_stock_place/' . encryptId($user['0']['id']) . '/0') ?>"
                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-auto">+
                            add stock Place</a><br>
                        <a href="#" onclick="exportTableToExcel()"
                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
                            Export to Excel
                        </a>
                        <a href="#" onclick="exportTableAsPDF()"
                            class="py-[5px] px-3 text-[13px] rounded text-white bg-primary leading-[18px] inline-block border border-primary duration-500 hover:bg-hover-primary hover:border-hover-primary ml-2">
                            PDF
                        </a>
                    </div>
                    <div class="flex items-center">
                        <h3 style="font-size: 25px; margin: 10px;color: #454592;">View stock Place list</h3>
                        <ul class="nav nav-pills mix-chart-tab user-m-tabe flex flex-wrap">
                            <li class="nav-item">
                                <button class="nav-link py-[3px] px-2 mx-1 rounded text-[13px] block tab-btn active"
                                    data-tab="pills-colm">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24  24" version="1.1"
                                        class="svg-main-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24" />
                                            <path
                                                d="M10.5,5 L19.5,5 C20.3284271,5 21,5.67157288 21,6.5 C21,7.32842712 20.3284271,8 19.5,8 L10.5,8 C9.67157288,8 9,7.32842712 9,6.5 C9,5.67157288 9.67157288,5 10.5,5 Z M10.5,10 L19.5,10 C20.3284271,10 21,10.6715729 21,11.5 C21,12.3284271 20.3284271,13 19.5,13 L10.5,13 C9.67157288,13 9,12.3284271 9,11.5 C9,10.6715729 9.67157288,10 10.5,10 Z M10.5,15 L19.5,15 C20.3284271,15 21,15.6715729 21,16.5 C21,17.3284271 20.3284271,18 19.5,18 L10.5,18 C9.67157288,18 9,17.3284271 9,16.5 C9,15.6715729 9.67157288,15 10.5,15 Z"
                                                fill="var(--dark)" />
                                            <path
                                                d="M5.5,8 C4.67157288,8 4,7.32842712 4,6.5 C4,5.67157288 4.67157288,5 5.5,5 C6.32842712,5 7,5.67157288 7,6.5 C7,7.32842712 6.32842712,8 5.5,8 Z M5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 C6.32842712,10 7,10.6715729 7,11.5 C7,12.3284271 6.32842712,13 5.5,13 Z M5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 C6.32842712,15 7,15.6715729 7,16.5 C7,17.3284271 6.32842712,18 5.5,18 Z"
                                                fill="var(--dark)" opacity="0.3" />
                                        </g>
                                    </svg>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full active-p">
                    <div class="tab-content-area">
                        <div class="tab-content show active" id="pills-colm">
                            <div class="card">
                                <div class="sm:py-5 py-4">
                                    <div class="overflow-x-auto active-projects user-tbl ItemsCheckboxSec dt-filter">
                                        <table id="user-tbl" class="table">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        S No.</th>

                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left ">
                                                        Stock Place Name</th>
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        address </th>
                                                  
                                                    <th
                                                        class="border-b border-b-color text-[13px] py-2.5 px-4 bg-primary-light text-primary capitalize font-medium bg-none whitespace-nowrap text-left">
                                                        Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $serial = 1;
                                                if (!empty($stock_place)) {
                                                    foreach ($stock_place as $stock_place_info) {
                                                        ?>
                                                        <tr>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <?= $serial++ ?></td>


                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color break-words">
                                                                <?= $stock_place_info['place_name'] ?><?php if( $stock_place_info['default'] =='1'){?>
                                                                 (Default) <?php }?>  </td>
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color address-wrap">
                                                                <?= $stock_place_info['address'] ?></td>
                                                         
                                                            <td
                                                                class="border-b border-b-color py-2.5 px-4 text-[13px] font-normal text-body-color whitespace-nowrap">
                                                                <div class="button-container">
                                                                    <a class="button"
                                                                        href="<?= base_url('Admin_Dashboard/edit_stock_place?id=' . $stock_place_info['id'] . '&user_id=' . $user['0']['id']); ?>">Edit</a>
                                                                    <a class="button" href="<?= base_url('Admin_Dashboard/stock_place/' . encryptId($user[0]['id']) . '
					?id=' . $stock_place_info['id']); ?>" onclick="return confirm('Are you sure you want to delete this vendor?')">Delete</a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "includes2/footer-links.php" ?>
    </div>
    <?php include "includes2/footer.php" ?>
    <script>
        function exportTableToExcel() {
            // Select the table element
            var table = document.querySelector("#user-tbl"); // Replace with your table's ID

            // Initialize an empty array to hold table data
            var data = [];

            // Loop through each row of the table
            for (var i = 0, row; row = table.rows[i]; i++) {
                var rowData = [];
                // Loop through each cell in the row
                for (var j = 0, cell; cell = row.cells[j]; j++) {
                    rowData.push(cell.innerText);
                }
                data.push(rowData);
            }

            // Convert array to worksheet
            var worksheet = XLSX.utils.aoa_to_sheet(data);

            // Create a new workbook and append the worksheet
            var workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Stock PLaces List");

            // Generate Excel file and download
            XLSX.writeFile(workbook, "stock_place_list.xlsx");
        }

        function exportTableAsPDF() {
            // Check if jsPDF is available
            const { jsPDF } = window.jspdf;
            if (!jsPDF) {
                console.error("jsPDF not loaded");
                return;
            }

            const pdf = new jsPDF('p', 'mm', 'a4');
            const table = document.getElementById('user-tbl');

            // Capture the table as an image
            html2canvas(table, { scale: 2 }).then((canvas) => {
                const imgData = canvas.toDataURL('image/png');
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (canvas.height * pdfWidth) / canvas.width;

                // Add the image to PDF and adjust size
                pdf.addImage(imgData, 'PNG', 0, 10, pdfWidth, pdfHeight);

                // Download the PDF
                pdf.save('stock_places.pdf');
            }).catch((error) => {
                console.error("Error generating PDF:", error);
            });
        }


    </script>
</body>

</html>