<?php

defined('BASEPATH') or exit('no direct access allowed');

require FCPATH . 'vendor/autoload.php';

class Branch_Dashboard extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        if (sessionId('id') == "") {

            redirect(base_url('admin'));
        }

        date_default_timezone_set("Asia/Kolkata");
    }

    public function index($id)
    {
        $data['title'] = "Home";
        $tid = decryptId($id);

        // Fetch user and entity counts
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['stock_place'] = $this->CommonModal->getNumWhereRows('stock_place', 'user_id', $uid[0]['user_id']);
        $data['product'] = $this->CommonModal->getNumWhereRows('product', 'user_id', $uid[0]['user_id']);
        $data['return_purchase'] = $this->CommonModal->getNumWhereRows('return_purchase', 'user_id', $uid[0]['user_id']);
        $data['invoice'] = $this->CommonModal->getNumWhereRows('invoice', 'user_id', $uid[0]['user_id']);
        $data['customer'] = $this->CommonModal->getNumWhereRows('customer', 'user_id', $uid[0]['user_id']);
        $data['vender'] = $this->CommonModal->getNumWhereRows('vender', 'user_id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getNumWhereRows('account', 'user_id', $uid[0]['user_id']);


        // Fetch data using the model methods
        $data['stock'] = $this->CommonModal->getLowStockItems(40, $uid[0]['user_id']);

        $data['purchase_payment'] = $this->CommonModal->getPurchasePaymentsdatedash('purchase_payment', 'purchase_code', 'user_id', $uid[0]['user_id']);
        $data['return_purchase'] = $this->CommonModal->getPurchasePaymentsdatedash('return_purchase_payment', 'return_code', 'user_id', $uid[0]['user_id']);
        $data['invoice_payment'] = $this->CommonModal->getPurchasePaymentsdatedash('payment', 'invoice_no', 'user_id', $uid[0]['user_id']);
        $data['return_invoice_payment'] = $this->CommonModal->getPurchasePaymentsdatedash('return_invoice_payment', 'return_invoice_no', 'user_id', $uid[0]['user_id']);
        $data['view_invoice'] = $this->CommonModal->getInvoices($uid[0]['user_id']);
        $data['s_place'] = $this->CommonModal->getStockPlaces($uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getProductList($uid[0]['user_id']);

        $data['top_selling_products'] = $this->CommonModal->getTopSellingProducts($uid[0]['user_id']);

        $data['expired_products'] = $this->CommonModal->getExpiredProducts($uid[0]['user_id']);

        $this->load->view('branch/dashboard', $data);
    }



    public function sub_admin($id)
    {

        $data['title'] = "Your Profile";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $userr = $this->CommonModal->getRowById('branch', 'id', $tid);

        $data['u'] = $this->CommonModal->getRowById('users', 'id', $userr[0]['user_id']);



        $this->load->view('branch/sub_admin_profile', $data);
    }

    public function update_sub_admin($id)
    {
        $data['title'] = 'Update';
        $data['tag'] = 'sub_admin';
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['image'];
            if ($_FILES['image']['name'] != '') {

                $img = imageUpload('image', 'uploads/users/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/users/' . $image_url);
                }
            }

            $category_id = $this->CommonModal->updateRowById('branch', 'id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/sub_admin/' . encryptId($tid)));
        } else {

            $this->load->view('branch/sub_admin_profile', $data);
        }
    }


    public function vender($id)
    {
        $data['title'] = "Our Vendors";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        // $data['vender'] = $this->CommonModal->getAllRowsInOrder('vender', 'id', 'DESC');
        $data['vender'] = $this->CommonModal->getRowByIdDesc('vender', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('vender', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/vender/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/view_vender', $data);
    }


    public function add_vender($id, $add)
    {

        $data['title'] = "Add Vender ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('vender', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            }
            if ($add) {
                redirect(base_url('Branch_Dashboard/add_product/' . $id));
            } else {
                redirect(base_url('Branch_Dashboard/vender/' . $id));
            }
        } else {

            $this->load->view('branch/add_vender', $data);
        }
    }
    public function edit_vender()
    {
        $data['title'] = 'Update Vender';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['vender'] = $this->CommonModal->getRowById('vender', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('vender', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/vender/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_vender', $data);
        }
    }

    public function product($id)
    {
        $data['title'] = "Our Product";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        $purchaseCode = $this->input->get('purchase_code');

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        $data['product'] = $this->CommonModal->getRowsWithStatusesOrderedbyId(
            'purchase_product',   // Table name
            'status',             // Column to filter on
            ['0', '1'],           // Status values
            'p_id',               // Order by column
            'DESC',               // Order direction
            'branch_id',          // Branch column
            $tid,                 // Branch ID
            'user_id',            // User column
            $uid[0]['user_id']    // User ID
        );



        if ($purchaseCode) {
            $deleteResult = $this->CommonModal->deleteRowByuserId('purchase_product', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));
            $this->CommonModal->deleteRowByuserId('purchase_payment', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));
            $this->CommonModal->deleteRowByuserId('return_purchase', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));

            $this->CommonModal->deleteRowByuserId('return_purchase_payment', array('purchase_code' => $purchaseCode), array('user_id' => $uid[0]['user_id']));

            if ($deleteResult) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Product deleted successfully.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error deleting the product.</div>');
            }
            redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));  // Redirect after deletion
        }

        // Load the view
        $this->db->select('id, vender_name');
        $this->db->from('vender');
        $this->db->where('user_id', $uid[0]['user_id']);
        $data['vender'] = $this->db->get()->result_array();

        $this->db->select('id, product_name');
        $this->db->from('product');
        $this->db->where('user_id', $uid[0]['user_id']);
        $data['product_list'] = $this->db->get()->result_array();
        $data['purchase_payment'] = $this->CommonModal->getAllRowsInOrder('purchase_payment', 'id', 'DESC');

        $this->load->view('branch/view_product', $data);

    }
    public function generate_purchase_code($uid)
    {
        $last_invoice = $this->CommonModal->getLastRow('purchase_product', 'purchase_code', 'user_id', $uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['purchase_code'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
    public function generate_return_code($uid)
    {
        $last_invoice = $this->CommonModal->getLastRow('return_purchase', 'return_code', 'user_id', $uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['return_code'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
    public function add_product($id)
    {
        $data['title'] = "Add Product";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['product'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['vender'] = $this->CommonModal->getRowByIdDesc('vender', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['stock'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        if ($this->input->post()) {
            $post = $this->input->post();

            // Gather form data
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
            $date = $post['purchase_date'];
            $discount_type = $post['discount_type'];

            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
            $sub_total = floatval($post['sub_total']);
            $grand_total = floatval($post['grand_total']);
            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount_value'];
            } else {
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am / 100;
            }
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $bank = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $due = $grand_total - $paid;
            $purchase_code = $this->generate_purchase_code($uid[0]['user_id']);
            // Prepare product arrays
            $product_names = $post['p_name'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
            $unit_box = $post['unit_box'] ?? [];

            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $HSN_code = $post['HSN_code'];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
            $tax_type = $post['tax_type'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $p_discount_type = $post['p_discount_type'] ?? [];
            $p_discount_amounts = $post['p_discount'] ?? [];
            $total_prices = $post['total_price'] ?? [];

            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                $box = ($unit_box[$index] === 'Box') ? '1' : '0';
                $p_b_q = ($box === '1') ? (($quantities[$index] ?? 0) * ($post['unit_box_per_quantity'][$index] ?? 0)) : '0';
                // Prepare data for each row
                $data_to_insert = [
                    'vender_name' => $vender_id,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'purchase_code' => $purchase_code,
                    'stock_place_name' => $stock_place_name,
                    'product_name' => $product_name,
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'unit_box' => $unit_box[$index],
                    'box' => $box,
                    'box_product_quantity' => $p_b_q,
                    'per_product_available_quantity' => $p_b_q,
                    'availabile_quantity' => $quantities[$index],
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'gst_percent' => $gst_percentages[$index],
                    'gst_tax' => $gst_amounts[$index],
                    'tax_type' => $tax_type[$index],
                    'p_discount' => $p_discount_amounts[$index],

                    'p_discount_type' => $p_discount_type[$index],
                    'exp_date' => $exp_dates[$index],
                    'HSN_code' => $HSN_code[$index],
                    'p_price' => $p_prices[$index],
                    'mrp' => $mrps[$index],
                    'selling_price' => $selling_prices[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_value' => $discount_value,
                    'discount_type' => $discount_type,
                    'discount_amount' => $discount_amountt,
                    'total_quantity' => $total_quantity,
                    'sub_total' => $sub_total,
                ];

                // Insert data into the purchase_product table
                $savedata = $this->CommonModal->insertRowReturnId('purchase_product', $data_to_insert);

                if (!$savedata) {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . $id));
                    return;
                }
            }

            // Insert payment data if paid amount is provided
            if ($paid >= 0) {
                $pay_to_insert = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'purchase_code' => $purchase_code,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $grand_total,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];

                $savedata1 = $this->CommonModal->insertRowReturnId('purchase_payment', $pay_to_insert);

                if (!$savedata1) {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . $id));
                    return;
                }
            }

            // Success message and redirection
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_purchase/' . $id . '/' . $purchase_code));
        } else {

            $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $this->load->view('branch/add_product', $data);
        }
    }

    public function print_purchase($id, $purchase_code)
    {
        $data['title'] = "Purchase Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);


        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        // Load the view
        $this->load->view('branch/purchase_invoice', $data);
    }
    public function print_purchase_normal($id, $purchase_code)
    {
        $data['title'] = "Purchase Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);


        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        // Load the view
        $this->load->view('branch/print_purchase_normal', $data);
    }


    public function print_purchase_tax($id, $purchase_code)
    {
        $data['title'] = "Purchase Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);


        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        // Load the view
        $this->load->view('branch/purchase_tax_invoice', $data);
    }
    public function edit_product()
    {
        $data['title'] = "Edit Product";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID

        $purchase_code = $this->input->get('purchase_code');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['vender'] = $this->CommonModal->getRowByIdDesc('vender', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['stock'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code, 'branch_id', $uid[0]['id']);
        if (count($_POST) > 0) {
            $post = $this->input->post();

            // Gather form data
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
            $date = $post['date'];
            $purchase_code = $post['purchase_code'];

            $discount_type = $post['discount_type'];

            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
            $sub_total = floatval($post['sub_total']);
            $grand_total = floatval($post['grand_total']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $due = $grand_total - $paid;

            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount_value'];
            } else {
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am / 100;
            }
            // Prepare product arrays
            $product_names = $post['p_name'] ?? [];
            $product_ids = $post['p_id'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $unit_box = $post['unit_box'] ?? [];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $tax_type = $post['tax_type'] ?? [];

            $p_discount_type = $post['p_discount_type'] ?? [];
            $p_discount_amounts = $post['p_discount'] ?? [];
            $total_prices = $post['total_price'] ?? [];

            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                // Prepare data for each row
                if ($product_ids[$index] == "-111") {
                    $box = ($unit_box[$index] === 'Box') ? '1' : '0';
                    $p_b_q = ($box === '1') ? (($quantities[$index] ?? 0) * ($post['unit_box_per_quantity'][$index] ?? 0)) : '0';

                    $add_data_to_insert = [
                        'vender_name' => $vender_id,
                        'date' => $date,
                        'user_id' => $user_id,
                        'branch_id' => $tid,

                        'purchase_code' => $purchase_code,
                        'stock_place_name' => $stock_place_name,
                        'product_name' => $product_name,
                        'packing' => $packings[$index],
                        'quantity' => $quantities[$index],
                        'unit_box' => $unit_box[$index],
                        'box' => $box,
                        'box_product_quantity' => $p_b_q,
                        'per_product_available_quantity' => $p_b_q,
                        'availabile_quantity' => $quantities[$index],
                        'unit_rate' => $unit_rates[$index],
                        'unit' => $units[$index],
                        'gst_percent' => $gst_percentages[$index],
                        'gst_tax' => $gst_amounts[$index],
                        'tax_type' => $tax_type[$index],
                        'p_discount' => $p_discount_amounts[$index],

                        'p_discount_type' => $p_discount_type[$index],

                        'exp_date' => $exp_dates[$index],

                        'p_price' => $p_prices[$index],
                        'mrp' => $mrps[$index],
                        'selling_price' => $selling_prices[$index],
                        'total_price' => $total_prices[$index],
                        'grand_total' => $grand_total,
                        'discount_value' => $discount_value,
                        'discount_type' => $discount_type,
                        'discount_amount' => $discount_amountt,
                        'total_quantity' => $total_quantity,
                        'sub_total' => $sub_total,
                    ];

                    // Insert data into the purchase_product table
                    $this->CommonModal->insertRowReturnId('purchase_product', $add_data_to_insert);

                } else {
                    $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);

                    if (!empty($select)) {
                        $sellingquantity = $select[0]['selling_quantity'];
                        $returnquantity = $select[0]['return_quantity'];
                        $transferquantity = $select[0]['transfer_quantity'];
                        $totalsr = $sellingquantity + $returnquantity + $transferquantity;
                        // $new_available_quantity = $quantities[$index] 
                        // Adjust available and selling quantities based on the new quantity
                        if ($quantities[$index] > $totalsr) {

                            $new_available_quantity = $quantities[$index] - $totalsr;
                        } elseif ($quantities[$index] < $totalsr) {
                            $new_available_quantity = $totalsr - $quantities[$index];
                        } else {
                            $new_available_quantity = $quantities[$index];
                        }



                    } else {
                        // Handle case where product data is missing
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Product data missing.</div>');
                        redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));
                        return;
                    }
                    $box = ($unit_box[$index] === 'Box') ? '1' : '0';
                    $p_b_q = ($box === '1') ? (($quantities[$index] ?? 0) * ($post['unit_box_per_quantity'][$index] ?? 0)) : '0';

                    $data_to_insert = [
                        'vender_name' => $vender_id,
                        'date' => $date,
                        'user_id' => $user_id,
                        'branch_id' => $tid,
                        'stock_place_name' => $stock_place_name,
                        'product_name' => $product_name,

                        'packing' => $packings[$index],
                        'quantity' => $quantities[$index],
                        'unit_box' => $unit_box[$index],
                        'box' => $box,
                        'box_product_quantity' => $p_b_q,
                        'per_product_available_quantity' => $p_b_q,
                        'availabile_quantity' => $new_available_quantity,
                        'unit_rate' => $unit_rates[$index],
                        'unit' => $units[$index],
                        'gst_percent' => $gst_percentages[$index],
                        'gst_tax' => $gst_amounts[$index],
                        'tax_type' => $tax_type[$index],

                        'exp_date' => $exp_dates[$index],
                        'p_discount' => $p_discount_amounts[$index],

                        'p_discount_type' => $p_discount_type[$index],
                        'p_price' => $p_prices[$index],
                        'mrp' => $mrps[$index],
                        'selling_price' => $selling_prices[$index],
                        'total_price' => $total_prices[$index],
                        'grand_total' => $grand_total,
                        'discount_value' => $discount_value,
                        'discount_type' => $discount_type,
                        'discount_amount' => $discount_amountt,
                        'total_quantity' => $total_quantity,

                        'sub_total' => $sub_total,
                    ];

                    // Insert data into the purchase_product table
                    $savedata = $this->CommonModal->updateRowById('purchase_product', 'p_id', $product_ids[$index], $data_to_insert);

                    // if (!$savedata) {
                    //     // Handle insert error
                    //     $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    //     redirect(base_url('admin_Dashboard/product/' . encryptId($tid)));
                    //     return;
                    // }

                }
                // Insert payment data if paid amount is provided
                if ($ppid) {
                    $pay_to_insert = [
                        'vender_id' => $vender_id,
                        'user_id' => $user_id,
                        'branch_id' => $tid,
                        'paid' => $paid,
                        'mode' => $mode,
                        'total' => $grand_total,
                        'due' => $due,
                        'date' => $date,
                        'bank' => $bank,
                        'cheque_no' => $cheque_no
                    ];

                    $savedata1 = $this->CommonModal->updateRowById('purchase_payment', 'id', $ppid, $pay_to_insert);
                    if ($savedata1) {
                        // Get all rows after the given ID for the same invoice
                        $rows_after_id = $this->CommonModal->getRowsAfterId('purchase_payment', 'id', $ppid, 'purchase_code', $purchase_code);

                        if ($rows_after_id) {
                            foreach ($rows_after_id as $row) {
                                // Fetch the row just before the current row for recalculating due

                                $rows_before_id = $this->CommonModal->getRowsBeforeId('purchase_payment', 'id', $row['id'], 'purchase_code', $purchase_code);

                                // Ensure that there is a previous row to calculate the due amount
                                $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $grand_total;

                                // Calculate the new due amount
                                $due2 = $previous_due - $row['paid'];

                                $latest_data = [
                                    'vender_id' => $vender_id,
                                    'user_id' => $user_id,

                                    'branch_id' => $tid,
                                    'paid' => $row['paid'],
                                    'mode' => $row['mode'],
                                    'total' => $grand_total,
                                    'due' => $due2,
                                    'bank' => $row['bank'],
                                    'cheque_no' => $cheque_no
                                ];

                                // Update each row with the recalculated due
                                $this->CommonModal->updateRowById('purchase_payment', 'id', $row['id'], $latest_data);
                            }
                        }
                    }
                }
            }
            // Success message and redirection
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_purchase/' . encryptId($tid) . '/' . $purchase_code));
        } else {

            $this->load->view('branch/edit_product', $data);
        }
    }



    public function product_name($id)
    {
        $data['title'] = "Our Products Name";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        // $data['product_name'] = $this->CommonModal->getAllRowsInOrder('product', 'id', 'DESC');
        $data['product_name'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('product', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/product_name/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/product_name', $data);
    }
    public function generate_product_id($uid)
    {
        // Get the last product ID for the given user
        $last_invoice = $this->CommonModal->getLastRow('product', 'product_id', 'user_id', $uid);

        if ($last_invoice && is_numeric($last_invoice['product_id'])) {
            // Convert last product ID to integer and increment it
            $new_number = intval($last_invoice['product_id']) + 1;
        } else {
            // Start from 30001 if no products exist
            $new_number = 30001;
        }

        return (string) $new_number; // Convert to string if needed
    }
    public function add_product_name($id, $add)
    {
        $data['title'] = "Add Product Name";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $post['product_id'] = $this->generate_product_id($post['user_id']);
            $savedata = $this->CommonModal->insertRowReturnId('product', $post);

            if ($savedata) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Product Added Successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Failed to Add Product</div>');
            }

            // Redirect based on $add flag
            if ($add) {
                redirect(base_url('Branch_Dashboard/add_product/' . $id));
            } else {
                redirect(base_url('Branch_Dashboard/product_name/' . $id));
            }

        } else {
            $this->load->view('branch/add_product_name', $data);
        }
    }
    public function view1_product_name()
    {
        $data['title'] = 'View Product ';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['product_name'] = $this->CommonModal->getRowById('product', 'id', $ID);

        $this->load->view('branch/view_product_name', $data);

    }
    public function bulk_upload($id)
    {
        $data['title'] = "Bulk";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        $this->load->view('branch/bulk_upload', $data);
    }
    public function upload_product_csv($id, $uuid)
    {
        $tid = decryptId($id);
        $uid = decryptId($uuid);


        if (isset($_FILES['csv_file']['name']) && !empty($_FILES['csv_file']['name'])) {
            if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
                $this->session->set_flashdata('error', 'File upload failed. Error: ' . $_FILES['csv_file']['error']);
                redirect(base_url('Branch_Dashboard/product_name/' . $id));
                return;
            }

            $fileExt = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);
            if (strtolower($fileExt) !== 'csv') {
                $this->session->set_flashdata('error', 'Invalid file format. Please upload a CSV file.');
                redirect(base_url('Branch_Dashboard/product_name/' . $id));
                return;
            }

            if (($handle = fopen($_FILES['csv_file']['tmp_name'], 'r')) === FALSE) {
                log_message('error', 'CSV File Open Failed');
                $this->session->set_flashdata('error', 'Failed to open the file.');
                redirect(base_url('Branch_Dashboard/product_name/' . $id));
                return;
            }



            fgetcsv($handle); // Skip header
            $successCount = 0;
            $errorCount = 0;

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($row) != 32) {
                    log_message('error', 'Invalid column count: ' . count($row));
                    $errorCount++;
                    continue;
                }
                if ($row[6] == "Box" || $row[6] == "box") {
                    $box = 1;
                }



                // Prepare data for insertion
                $data = [
                    'product_id' => $this->generate_product_id($uid),
                    'user_id' => $uid,
                    'branch_id' => $tid,
                    'product_name' => $row[0],
                    'teach_name' => $row[1],
                    'company_name' => $row[2],
                    'HSN' => $row[3],
                    'packing' => (float) $row[4],
                    'net_unit' => $row[5],
                    'unit' => $row[6],
                    'box_per_unit' => (float) $row[7],
                    'box_per_unit_price' => (float) $row[8],
                    'per_tax' => (float) $row[9],
                    'per_tax_type' => $row[10],
                    'per_tax_amount' => (float) $row[11],
                    'per_total_purchase_price' => (float) $row[12],
                    'per_profit_margin' => (float) $row[13],
                    'box_per_unit_sales_price' => (float) $row[14],
                    'box_per_unit_sales_priceB' => (float) $row[15],
                    'box_per_unit_sales_priceC' => (float) $row[16],
                    'per_discount_type' => $row[17],
                    'per_discount' => (float) $row[18],
                    'per_discount_amount' => (float) $row[19],
                    'per_total' => (float) $row[20],
                    'per_mrp' => (float) $row[21],
                    'box' => $box,
                    'purchase_price' => (float) $row[22],
                    'tax' => (float) $row[23],
                    'tax_type' => $row[24],
                    'tax_amount' => (float) $row[25],
                    'total_purchase_price' => (float) $row[26],
                    'mrp' => (float) $row[27],
                    'profit_margin' => (float) $row[28],
                    'selling_price' => (float) $row[29],
                    'selling_priceB' => (float) $row[30],
                    'selling_priceC' => (float) $row[31],
                ];

                if ($this->CommonModal->insertRowReturnId('product', $data)) {
                    $successCount++;

                } else {
                    $errorCount++;
                    log_message('error', 'Product Insert Failed: ' . $this->db->error()['message']);

                }

            }
            fclose($handle);

            $this->session->set_flashdata('message', "Upload Completed: $successCount Success, $errorCount Failed");

        } else {
            $this->session->set_flashdata('error', 'Please select a valid CSV file.');
        }
        redirect(base_url('Branch_Dashboard/product_name/' . $id));
    }



    public function download_sample_csv()
    {
        // Define sample data
        $header = [
            'Product Name',
            'Teach Name',
            'Company Name',
            'HSN',
            'Packing',
            'Net Unit',
            'Unit',
            'Box Per Unit',
            'Box Per Unit Price',
            'Per Tax',
            'Per Tax Type',
            'Per Tax Amount',
            'Per Total Purchase Price',
            'Per Profit Margin',
            'Box Per Unit Sales Price',
            'Box Per Unit Sales PriceB',
            'Box Per Unit Sales PriceC',
            'Per Discount Type',
            'Per Discount',
            'Per Discount Amount',
            'Per Total',
            'Per MRP',
            'Purchase Price',
            'Tax',
            'Tax Type',
            'Tax Amount',
            'Total Purchase Price',
            'MRP',
            'Profit Margin',
            'Selling Price',
            'Selling PriceB',
            'Selling PriceC'
        ];

        $sampleData = [
            [
                'Sample Product',
                'Sample Tech Name',
                'Sample Company',
                '123456',
                '100',
                'Gram',
                'Single',
                '10',
                '50',
                '5',
                'Inclusive',
                '10',
                '250',
                '5',
                '260',
                '265',
                '270',
                'Rs',
                '5',
                '10',
                '230',
                '500',
                '500',
                '5',
                'Inclusive',
                '25',
                '525',
                '600',
                '10',
                '580',
                '585',
                '590'
            ],

            [
                'Example Product',
                'Example Tech Name',
                'Example Company',
                '654321',
                '200',
                'Kg',
                'Box',
                '20',
                '100',
                '10',
                'Exclusive',
                '20',
                '500',
                '10',
                '550',
                '560',
                '570',
                'Rs',
                '10',
                '20',
                '460',
                '900',
                '700',
                '10',
                'Exclusive',
                '70',
                '770',
                '900',
                '12',
                '880',
                '890',
                '900'
            ]
        ];


        // Open the output stream
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample_product_upload.csv"');
        $output = fopen('php://output', 'w');

        // Write header and sample data to CSV
        fputcsv($output, $header);
        foreach ($sampleData as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
    public function bulk_upload_customer($id)
    {
        $data['title'] = "Bulk Customer Upload";
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        $this->load->view('branch/bulk_upload_customer', $data);
    }

    public function upload_customer_csv($id, $uuid)
    {
        $tid = decryptId($id);
        $uid = decryptId($uuid);


        if (isset($_FILES['csv_file']['name']) && !empty($_FILES['csv_file']['name'])) {
            if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
                $this->session->set_flashdata('error', 'File upload failed. Error: ' . $_FILES['csv_file']['error']);
                redirect(base_url('Branch_Dashboard/customer/' . $id));
                return;
            }

            $fileExt = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);
            if (strtolower($fileExt) !== 'csv') {
                $this->session->set_flashdata('error', 'Invalid file format. Please upload a CSV file.');
                redirect(base_url('Branch_Dashboard/customer/' . $id));
                return;
            }

            if (($handle = fopen($_FILES['csv_file']['tmp_name'], 'r')) === FALSE) {
                $this->session->set_flashdata('error', 'Failed to open the file.');
                redirect(base_url('Branch_Dashboard/customer/' . $id));
                return;
            }

            fgetcsv($handle); // Skip header row
            $successCount = 0;
            $errorCount = 0;

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($row) != 6) { // Ensure correct number of fields
                    $errorCount++;
                    continue;
                }

                // Validate required fields
                if (
                    empty($row[0]) || empty($row[1]) || empty($row[2]) || empty($row[3]) ||
                    !is_numeric($row[4]) || !is_numeric($row[5])
                ) {
                    $errorCount++;
                    continue;
                }

                // Prepare data for insertion
                $data = [
                    'user_id' => $uid,
                    'branch_id' => $tid,
                    'name' => $row[0],
                    'contact' => $row[1],
                    'address' => $row[2],
                    'email' => $row[3],
                    'interest_days' => (int) $row[4],
                    'interest_rate' => (float) $row[5]
                ];

                if ($this->CommonModal->insertRow('customer', $data)) {
                    $successCount++;
                } else {
                    $errorCount++;
                    log_message('error', 'Customer Insert Failed: ' . $this->db->error()['message']);
                }
            }
            fclose($handle);

            $this->session->set_flashdata('message', "Upload Completed: $successCount Success, $errorCount Failed");
        } else {
            $this->session->set_flashdata('error', 'Please select a valid CSV file.');
        }
        redirect(base_url('Branch_Dashboard/customer/' . $id));
    }

    public function download_sample_customer_csv()
    {
        // Define sample data
        $header = ['Name', 'Contact', 'Address', 'Email', 'Interest Days', 'Interest Rate'];
        $sampleData = [
            ['John Doe', '9876543210', '123 Street, City', 'john@example.com', '30', '5.5'],
            ['Jane Smith', '9123456789', '456 Avenue, Town', 'jane@example.com', '45', '7.0']
        ];

        // Open the output stream
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample_customer_upload.csv"');
        $output = fopen('php://output', 'w');

        // Write header and sample data to CSV
        fputcsv($output, $header);
        foreach ($sampleData as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }
    public function bulk_upload_vendor($id)
    {
        $data['title'] = "Bulk Vendor Upload";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        $this->load->view('user/bulk_upload_vendor', $data);
    }

    public function upload_vendor_csv($id, $uuid)
    {
        $tid = decryptId($id);
        $uid = decryptId($uuid);


        if (isset($_FILES['csv_file']['name']) && !empty($_FILES['csv_file']['name'])) {
            if ($_FILES['csv_file']['error'] !== UPLOAD_ERR_OK) {
                $this->session->set_flashdata('error', 'File upload failed. Error: ' . $_FILES['csv_file']['error']);
                redirect(base_url('Branch_Dashboard/vender/' . $id));
                return;
            }

            $fileExt = pathinfo($_FILES['csv_file']['name'], PATHINFO_EXTENSION);
            if (strtolower($fileExt) !== 'csv') {
                $this->session->set_flashdata('error', 'Invalid file format. Please upload a CSV file.');
                redirect(base_url('Branch_Dashboard/vender/' . $id));
                return;
            }

            if (($handle = fopen($_FILES['csv_file']['tmp_name'], 'r')) === FALSE) {
                $this->session->set_flashdata('error', 'Failed to open the file.');
                redirect(base_url('Branch_Dashboard/vender/' . $id));
                return;
            }

            fgetcsv($handle); // Skip header
            $successCount = 0;
            $errorCount = 0;

            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if (count($row) != 7) { // Ensure correct column count
                    $errorCount++;
                    continue;
                }

                // Validate data
                if (
                    empty($row[0]) || empty($row[1]) || empty($row[2]) || empty($row[3]) ||
                    empty($row[4]) || empty($row[5]) || empty($row[6])
                ) {
                    $errorCount++;
                    continue;
                }

                // Prepare data for insertion
                $data = [
                    'user_id' => $uid,
                    'branch_id' => $tid,
                    'vender_name' => $row[0],
                    'address' => $row[1],
                    'mobile' => $row[2],
                    'email' => $row[3],
                    'gst_no' => $row[4],
                    'contact_person' => $row[5],
                    'person_contact' => $row[6],
                ];

                if ($this->CommonModal->insertRow('vender', $data)) {
                    $successCount++;
                } else {
                    $errorCount++;
                    log_message('error', 'Vendor Insert Failed: ' . $this->db->error()['message']);
                }
            }
            fclose($handle);

            $this->session->set_flashdata('message', "Upload Completed: $successCount Success, $errorCount Failed");
        } else {
            $this->session->set_flashdata('error', 'Please select a valid CSV file.');
        }
        redirect(base_url('Branch_Dashboard/vender/' . $id));
    }

    public function download_sample_vendor_csv()
    {
        // Define sample data
        $header = ['Vendor Name', 'Address', 'Mobile', 'Email', 'GST No', 'Contact Person', 'Person Contact'];
        $sampleData = [
            ['ABC Suppliers', '123 Market Street, City', '9876543210', 'abc@example.com', '22AAAAA0000A1Z5', 'Megha', '9876543211'],
            ['XYZ Traders', '456 Business Road, City', '9123456789', 'xyz@example.com', '27BBBBB1111B2Z6', 'Rahul', '9123456788']
        ];

        // Open the output stream
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="sample_vendor_upload.csv"');
        $output = fopen('php://output', 'w');

        // Write header and sample data to CSV
        fputcsv($output, $header);
        foreach ($sampleData as $row) {
            fputcsv($output, $row);
        }
        fclose($output);
    }

    public function check_product_name()
    {
        // Get the JSON data from the request body
        $input = json_decode(file_get_contents('php://input'), true);

        // Get the product name
        $productName = $input['product_name'];

        // Check if the product name already exists in the database
        $existingProduct = $this->CommonModal->getRowByCondition('product', ['product_name' => $productName]);

        // Return response as JSON
        if ($existingProduct) {
            echo json_encode(['exists' => true]);
        } else {
            echo json_encode(['exists' => false]);
        }
    }

    public function edit_product_name()
    {
        $data['title'] = 'Update Product Name';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['product_name'] = $this->CommonModal->getRowById('product', 'id', $ID);

        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];

            $bid = $post['branch_id'];

            if ($post['unit'] == "Single") {
                $post['box'] = "0";
                $post['box_per_unit'] = "0";
                $post['box_per_unit_price'] = "0";
                $post['per_tax'] = "0";
                $post['per_tax_type'] = "0";
                $post['per_tax_amount'] = "0";
                $post['per_total_purchase_price'] = "0";
                $post['per_mrp'] = "0";
                $post['per_profit_margin'] = "0";
                $post['box_per_unit_sales_price'] = "0";

            } else {
                $post['box'] = "1";
            }
            $category_id = $this->CommonModal->updateRowById('product', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/product_name/' . encryptId($bid)));

        } else {

            $this->load->view('branch/edit_product_name', $data);
        }
    }
    public function stock($id)
    {
        $data['title'] = "Our Stock";
        $tid = decryptId($id);
        $ID = $this->input->get('id');

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        // Fetch all products
        $data['product'] = $this->CommonModal->getAllRowsInOrder('product', 'id', 'DESC');

        // Get POST data for filtering
        $stock_place_id = $this->input->post('stock_place_id');
        $product_id = $this->input->post('product_id');

        // Handle deletion if ID is provided
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('stock', ['s_id' => $ID]);
            redirect(base_url('Branch_Dashboard/stock/' . encryptId($id)));
        }

        // Initialize stock data
        if ($stock_place_id && $product_id) {
            // Fetch stock data based on both stock place and product
            $data['stock'] = $this->CommonModal->getStockByPlaceAndProduct($stock_place_id, $product_id);
        } elseif ($stock_place_id) {
            // Fetch stock data based on stock place only
            $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'stock_place_name', $stock_place_id);
        } elseif ($product_id) {
            // Fetch stock data based on product only
            $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'product_name', $product_id);
        } else {
            // Fetch all stock data if no filters are applied
            $data['stock'] = $this->CommonModal->getAllRowsInOrder('purchase_product', 'p_id', 'DESC');
        }

        // Fetch stock places and product lists
        $this->db->select('id, place_name');
        $this->db->from('stock_place');
        $data['stock_place'] = $this->db->get()->result_array();

        $this->db->select('id, product_name');
        $this->db->from('product');
        $data['product_list'] = $this->db->get()->result_array();

        // Load the appropriate view
        if ($stock_place_id || $product_id) {
            $this->load->view('branch/view_stock_product', $data);
        } else {
            $this->load->view('branch/view_stock', $data);
        }
    }

    public function get_products_by_stock_place()
    {
        $stock_place_id = $this->input->post('stock_place_id');

        // Load the model

        if ($stock_place_id) {
            // Fetch products for the selected stock place by joining tables
            $products = $this->CommonModal->get_products_by_stock_place($stock_place_id);
        } else {
            // Fetch all products
            $products = $this->CommonModal->get_all_products();
        }

        // Return the result as JSON
        echo json_encode($products);
    }
    public function add_stock($id)
    {
        $data['title'] = "Add Stock";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if ($this->input->post()) {
            $post = $this->input->post();

            // If a product is selected, fetch its details
            if (!empty($post['product_name'])) {
                $data['selected_product'] = $this->CommonModal->getRowById('purchase_product', 'product_name', $post['product_name']);
            }

            // If form is submitted for adding stock
            if (isset($post['return_quantity']) && isset($post['packing'])) {
                // Insert data into 'stock' table
                $savedata = $this->CommonModal->insertRowReturnId('stock', $post);

                if ($savedata) {
                    // Update purchase_product table with new quantities and other fields
                    $purchase_update_data = [
                        'quantity' => $post['available_quantity'],
                        'return_quantity' => $post['return_quantity'],
                        'total_quantity' => $post['total_quantity'],
                        'unit_rate' => $post['unit_rate'],
                        'purchase_price' => $post['purchase_price'],
                        'packing' => $post['packing']
                    ];

                    // Update the purchase_product table
                    $this->CommonModal->updateRowById('purchase_product', 'product_name', $post['product_name'], $purchase_update_data);

                    // Set success message
                    $this->session->set_userdata('msg', '<div class="alert alert-success">Stock Added and Product Updated Successfully</div>');
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error Adding Stock</div>');
                }

                // Redirect to the stock page after adding
                redirect(base_url('Branch_Dashboard/stock/' . $id));
            }
        }

        // Fetch stock places and product list
        $data['stock_place'] = $this->CommonModal->getAllRows('stock_place');
        $data['product_list'] = $this->CommonModal->getAllRows('product');

        // Load the add_stock view with necessary data
        $this->load->view('branch/add_stock', $data);
    }


    public function edit_stock()
    {
        $data['title'] = 'Update Stock';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'p_id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $post['availabile_quantity'] = $_POST['quantity'];
            $post['status'] = 2;
            $uid = $_POST['user_id'];
            $category_id = $this->CommonModal->insertRowReturnId('purchase_product', $post);

            if ($category_id) {

                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $_POST['product']);
                $new_available_quantity = $select[0]['availabile_quantity'] - $_POST['quantity'];
                $transfer = $select[0]['transfer_quantity'] + $_POST['quantity'];
                $updatedata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $_POST['product'],
                    'availabile_quantity',
                    $new_available_quantity
                );
                $updatetransferdata = $this->CommonModal->updateColumnValue(
                    'purchase_product',
                    'p_id',
                    $_POST['product'],
                    'transfer_quantity',
                    $transfer
                );
                if ($updatedata && $updatetransferdata) {
                    redirect(base_url('Branch_Dashboard/stock/' . encryptId($uid)));
                } else {
                    redirect(base_url('Branch_Dashboard/stoc'));
                }
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/stock/' . encryptId($uid)));
        } else {
            $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            $data['stock'] = $this->CommonModal->getRowById('purchase_product', 'p_id', $ID);
            $data['product_list'] = $this->CommonModal->getAllRows('product');
            $this->db->select('*');
            $this->db->from('stock_place');
            $this->db->where("id NOT IN (SELECT stock_place_name FROM purchase_product WHERE p_id = $ID)", NULL, FALSE);
            $query = $this->db->get();
            $data['stock_place'] = $query->result_array();

            $data['vender'] = $this->CommonModal->getAllRows('vender');
            $this->load->view('branch/edit_stock', $data);
        }
    }
    public function stock_place($id)
    {
        $data['title'] = "Our Stock";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        $data['stock_place'] = $this->CommonModal->getAllRowsInOrder('stock_place', 'id', 'DESC');
        if ($ID) {
            $id = decryptId($id);
            $this->CommonModal->deleteRowById('stock_place', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/stock_place/' . encryptId($id)));
        }
        // Load the view
        $this->load->view('branch/view_stock_place', $data);
    }
    public function get_product_data()
    {
        // Get the selected product ID from the AJAX request
        $product_id = $this->input->post('product_id');

        // Fetch product details from the purchase_product table
        $product_data = $this->CommonModal->getRowById('purchase_product', 'product_name', $product_id);

        // Return product details as a JSON response
        if (!empty($product_data)) {
            $response = [
                'available_quantity' => $product_data[0]['quantity'],
                'packing' => $product_data[0]['packing'],
                'total_quantity' => $product_data[0]['total_quantity'],
                'unit_rate' => $product_data[0]['unit_rate'],
                'purchase_price' => $product_data[0]['purchase_price'],
                'return_quantity' => $product_data[0]['return_quantity']
            ];
        } else {
            $response = [
                'available_quantity' => 0,
                'packing' => 0,
                'total_quantity' => 0,
                'unit_rate' => 0,
                'purchase_price' => 0,
                'return_quantity' => 0
            ];
        }

        echo json_encode($response);
    }

    public function add_stock_place($id, $add)
    {

        $data['title'] = "Add Stock Place";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('stock_place', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">branch Add Successfully</div>');
            }
            if ($add == 1) {
                redirect(base_url('Branch_Dashboard/add_product/' . $id));
            } elseif ($add == 2) {
                redirect(base_url('Branch_Dashboard/add_invoice/' . $id));
            } else {
                redirect(base_url('Branch_Dashboard/stock_place/' . $id));
            }
        } else {

            $this->load->view('branch/add_stock_place', $data);
        }
    }
    public function edit_stock_place()
    {
        $data['title'] = 'Update Stock Places';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['stock_place'] = $this->CommonModal->getRowById('stock_place', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('stock_place', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Stock Place Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/stock_place/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_stock_place', $data);
        }
    }

    public function customer($id)
    {
        $data['title'] = "Our Customers";

        // Decrypt Vendor ID from the passed URL segment
        $tid = decryptId($id);
        $ID = $this->input->get('id');

        // Fetch the user data for the decrypted vendor ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all customers in descending order by ID
        // $data['customer'] = $this->CommonModal->getAllRowsInOrder('customer', 'id', 'DESC');
        $data['customer'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Check if there's a customer ID for deletion
        if ($ID) {
            $this->CommonModal->deleteRowById('customer', array('id' => $ID));

            // Redirect to the same page without query parameters
            redirect("Branch_Dashboard/customer/$id", 'refresh');
        }

        // Load the view
        $this->load->view('branch/view_customer', $data);
    }



    public function add_customer($id, $add)
    {

        $data['title'] = "Add Customers ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('customer', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">error</div>');
            }
            if ($add) {
                redirect(base_url('Branch_Dashboard/add_invoice/' . $id));
            } else {
                redirect(base_url('Branch_Dashboard/customer/' . $id));
            }
        } else {

            $this->load->view('branch/add_customer', $data);
        }
    }
    public function edit_customer()
    {
        $data['title'] = 'Update Customers';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['customer'] = $this->CommonModal->getRowById('customer', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['branch_id'];
            $category_id = $this->CommonModal->updateRowById('customer', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/customer/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_customer', $data);
        }
    }

    public function account($id)
    {
        $data['title'] = "Account List";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        // Fetch all vendors
        $data['account'] = $this->CommonModal->getAllRowsInOrder('account', 'id', 'DESC');
        if ($ID) {
            // $aid = decryptId($id);
            $this->CommonModal->deleteRowById('account', array('id' => $ID));
            redirect(base_url('Branch_Dashboard/account/' . $id));
        }
        // Load the view
        $this->load->view('branch/view_account', $data);
    }

    public function add_account($id)
    {

        $data['title'] = "Add Account ";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        if (count($_POST) > 0) {

            $post = $this->input->post();

            // $post['image'] = imageUpload('image', 'uploads/users/');

            $savedata = $this->CommonModal->insertRowReturnId('account', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');
            }

            redirect(base_url('Branch_Dashboard/account/' . $id));
        } else {

            $this->load->view('branch/add_account', $data);
        }
    }
    public function edit_account()
    {
        $data['title'] = 'Update Account';
        $data['tag'] = 'edit';
        $ID = $this->input->get('id');
        $tid = $this->input->get('user_id');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['account'] = $this->CommonModal->getRowById('account', 'id', $ID);
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $id = $post['id'];
            $uid = $post['user_id'];
            $category_id = $this->CommonModal->updateRowById('account', 'id', $id, $post);

            if ($category_id) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Updated successfully</div>');
            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error Updated successfully</div>');
            }
            redirect(base_url('Branch_Dashboard/account/' . encryptId($uid)));
        } else {

            $this->load->view('branch/edit_account', $data);
        }
    }

    public function invoice($id)
    {
        $data['title'] = "Invoice List";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Modify the query to join the customer table and get customer names
        $this->db->select('invoice.invoice_no, invoice.status as stat, invoice.branch_id as branch, invoice.customer_name as c_id, invoice.date as bill_date, customer.name as customer_name, COUNT(*) as product_count, final_total, include_interest'); // Count of products and sum of grand totals
        $this->db->from('invoice');
        $this->db->join('customer', 'customer.id = invoice.customer_name', 'left');
        $this->db->where('invoice.user_id', $uid[0]['user_id']); // Add condition for user_id
        $this->db->where('invoice.branch_id', $tid); // Add condition for branch_id
        $this->db->group_by(array('invoice.invoice_no', 'customer.name'));
        $this->db->order_by('invoice.id', 'DESC');
        $invoices = $this->db->get()->result_array();

        // Delete functionality
        foreach ($invoices as &$invoice) {
            $payment = $this->CommonModal->getRowByIdOrderByLimit('payment', 'invoice_no', $invoice['invoice_no'], 'user_id', $invoice['user_id'],  'id', 'DESC', '1');

            $customer_id = $invoice['c_id'];
            $customer = $this->CommonModal->getRowById('customer', 'id', $customer_id);

            $interest_rate = !empty($customer) ? floatval($customer[0]['interest_rate']) : 0;
            $interest_days = !empty($customer) ? intval($customer[0]['interest_days']) : 0;

            $bill_date = strtotime($invoice['bill_date']);
            $current_date = strtotime(date('Y-m-d'));
            $due_date = strtotime("+$interest_days days", $bill_date);

            $interest_amount = 0;
            $days_late = 0;

            if (!empty($payment) && $payment[0]['due'] > 0) {
                $bill_due_date = strtotime($payment[0]['date']);

                $start_interest_date = ($bill_date == $bill_due_date) ? $due_date : $bill_due_date;

                if ($current_date > $due_date) {
                    $days_late = ceil(($current_date - $start_interest_date) / (60 * 60 * 24));
                    $daily_interest = ($payment[0]['due'] * ($interest_rate / 100)) / 365;
                    $interest_amount = $daily_interest * $days_late;
                } else {
                    $days_late = 0;
                    $interest_amount = 0;
                }
            }

            $invoice['interest_amount'] = round($interest_amount, 2);
            $invoice['interest_rate'] = $interest_rate;
            $invoice['interest_days'] = $interest_days;
            $invoice['days_late'] = $days_late;
            $invoice['grand_total_with_interest'] = $payment[0]['due'] + $invoice['interest_amount'];
            $invoice['last_due_date'] = date('d-m-Y', $due_date); // Store Last Due Date

        }

        $data['invoice'] = $invoices; // Pass updated invoice data with interest

        if ($ID) {

            $iid = decryptId($id);
            $this->CommonModal->deleteRowByuserId('invoice', array('invoice_no' => $ID), array('user_id' => $iid));

            $this->CommonModal->deleteRowByuserId('payment', array('invoice_no' => $ID), array('user_id' => $iid));

            redirect(base_url('Branch_Dashboard/invoice/' . encryptId($id)));
        }

        // Load the view
        $this->load->view('branch/view_invoice', $data);
    }
    public function print_invoice($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['formate'] = $this->CommonModal->getRowById('sales_invoice', 'user_id', $uid[0]['user_id']);

        // Fetch all vendors
        // $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);
        $this->load->view('branch/invoice', $data);
    }

    public function normal_invoice($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        // $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);
        $this->load->view('branch/normal_invoice', $data);
    }
    public function tax_invoice($id, $invoice_number)
    {
        $data['title'] = "Tax Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        // $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);
        $this->load->view('branch/tax_invoice', $data);
    }
    public function generate_invoice_number($uid)
    {
        $last_invoice = $this->CommonModal->getLastRow('invoice', 'invoice_no', 'user_id', $uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['invoice_no'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
    public function generate_return_invoice_number($uid)
    {
        $last_invoice = $this->CommonModal->getLastRow('return_invoice', 'return_invoice_no', 'user_id', $uid); // Replace with your actual method to get the last invoice number
        if ($last_invoice) {
            // Increment the last invoice number
            return $last_invoice['return_invoice_no'] + 1;
        } else {
            // Start from 1 if no invoices exist
            return 1;
        }
    }
    public function get_available_quantity($product_id)
    {
        // Query to get the available quantity for the product
        $this->db->select('quantity');
        $this->db->from('purchase_product');
        $this->db->where('p_id', $product_id);
        $query = $this->db->get();

        // Return the available quantity as JSON
        if ($query->num_rows() > 0) {
            $result = $query->row();
            echo json_encode(['available_quantity' => $result->quantity]);
        } else {
            echo json_encode(['available_quantity' => 0]);
        }
    }
    public function download($id, $invoice_number)
    {

        // Set title for the invoice
        $data['title'] = "Invoice";

        // Decrypt or use the provided ID (if necessary)
        $tid = $id;

        // Fetch user data
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);

        // Fetch invoice data based on the provided invoice number
        $data['invoice'] = $this->CommonModal->getRowById('invoice', 'invoice_no', $invoice_number);

        // Initialize mPDF
        $mpdf = new \Mpdf\Mpdf(['format' => 'A3']);

        // Load the invoice view as a string (HTML)
        $html = $this->load->view('branch/invoice_pdf', $data, TRUE);  // 'TRUE' to return as string

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        // Output the PDF file
        $mpdf->Output("invoice_$invoice_number.pdf", 'D');  // 'D' forces download, 'I' to display inline
    }
    public function add_invoice($id)
    {
        $data['title'] = "Add Invoice";
        $data['tag'] = "add";
        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');

        if ($_POST) {
            $post = $this->input->post();
            $c_names = $post['customer_name'];
            $stock_place = $post['stock_place'];
            $d_type = $post['discount_type'];
            $date = $post['date'];
            $user_id = $post['uid'];
            $discount = floatval($post['discount']);
            $final = floatval($post['final_total']);
            $total_without_tax = floatval($post['total_without_tax']);
            $tax = floatval($post['tax_amount']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $bank = floatval($post['bank']);
            $include_interest = $post['include_interest'];

            $cheque_no = $post['cheque_no'];
            $due = $final - $paid;

            // Generate invoice number
            $invoice_number = $this->generate_invoice_number($uid[0]['user_id']);

            // Assuming 'product_name', 'packing', 'quantity', 'unit_rate', 'total_price' are array inputs
            $product_names = $post['p_name'];
            $product_ids = $post['p_id'];
            $packings = $post['packing'];
            $quantities = $post['quantity'];
            $available_quantities = $post['available_quantity'];
            $box = $post['box'];

            $per_box = $post['per_box'];
            if ($per_box != '0') {

                $box1 = $box;



            } else {
                $box1 = "";

            }
            $unit_rates = $post['unit_rate'];
            $unit = $post['unit'];
            $total_prices = $post['total_price'];

            $grand_total = array_sum($total_prices);
            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount'];
            } else {
                $discount_am = $grand_total * $post['discount'];
                $discount_amountt = $discount_am / 100;
            }
            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                $new_available_quantity = $available_quantities[$index] - $quantities[$index];
                if ($box1[$index] != '') {
                    $box_product1 = '1';
                }
                // Prepare data for each row
                $data_to_insert = [
                    'customer_name' => $c_names,
                    'stock_place' => $stock_place,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'invoice_no' => $invoice_number,
                    'p_name' => $product_name,
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $unit[$index],
                    'box' => $box1[$index],
                    'box_product' => $box_product1,
                    'per_box' => $per_box[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_type' => $d_type,
                    'discount' => $discount,
                    'discount_amount' => $discount_amountt,
                    'total_without_tax' => $total_without_tax,
                    'include_interest' => $include_interest,

                    'tax_amount' => $tax,
                    'final_total' => $final
                ];

                $savedata = $this->CommonModal->insertRowReturnId('invoice', $data_to_insert);

                if ($savedata) {
                    $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                    $selling = $select[0]['selling_quantity'] + $quantities[$index];
                    $sellingg = $select[0]['per_product_selling_quantity'] + $quantities[$index];

                    // Update available_quantity and selling_quantity
                    if ($box[$index] == "Box") {
                        // Update available_quantity and selling_quantity
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );

                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $selling
                        );
                        $per_selling = $quantities[$index] * $per_box[$index];
                        $per_avail = $select[0]['per_product_available_quantity'] - $per_selling;
                        $per_sellingg = $select[0]['per_product_selling_quantity'] + $per_selling;

                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_available_quantity',
                            $per_avail
                        );
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_selling_quantity',
                            $per_sellingg
                        );

                    } elseif ($box[$index] == "Single" && $per_box[$index]) {

                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_available_quantity',
                            $new_available_quantity
                        );

                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_selling_quantity',
                            $sellingg
                        );
                        $box_avail = intval($new_available_quantity / $per_box[$index]);

                        $new_box_avail1 = $select[0]['availabile_quantity'] - $box_avail;
                        $sellinggg = $select[0]['selling_quantity'] + $new_box_avail1;
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $box_avail
                        );
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $sellinggg
                        );




                    } else {
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );

                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $selling
                        );
                    }
                    if (!$updatedata || !$updatesellingdata) {
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                        redirect(base_url('Branch_Dashboard/invoice/' . $id));
                        return;
                    }
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . $id));
                    return;
                }
            }

            // Insert payment data if paid amount is provided
            if ($paid >= 0) {
                $pay_to_insert = [
                    'customer_id' => $c_names,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'invoice_no' => $invoice_number,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $final,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];

                $savedata1 = $this->CommonModal->insertRowReturnId('payment', $pay_to_insert);

                if (!$savedata1) {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . $id));
                    return;
                }
            }

            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_invoice/' . $id . '/' . $invoice_number));
        } else {
            $data['customer_list'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $data['stock_list'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $data['product_list'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $this->load->view('branch/add_invoice', $data);
        }
    }
    public function updateInterest()
    {
        $query = $this->db->get('invoice');
        $results = $query->result();

        $current_date = strtotime(date('Y-m-d'));

        foreach ($results as $row) {
            // Date Conversion
            $bill_date = DateTime::createFromFormat('d-m-Y', $row->date);
            if (!$bill_date) {
                echo "Invalid date format for ID: " . $row->id . "<br>";
                continue;
            }
            $bill_date = $bill_date->getTimestamp();
            $due_date = strtotime("+$row->intrest_days days", $bill_date);



            $final_total = (float) $row->final_total;
            $intrest_rate = (float) $row->intrest_rate;

            // Interest Calculation
            if ($current_date >= $due_date) {
                $days_late = ceil(($current_date - $due_date) / (60 * 60 * 24));
                $daily_interest = ($final_total * $intrest_rate / 100) / 365;
                $interest_amount = $daily_interest * $days_late;
            } else {
                $days_late = 0;
                $interest_amount = 0;
            }

            // Update Database
            $this->db->where('id', $row->id);
            $this->db->update('invoice', [
                'total_with_intrest' => $final_total + $interest_amount,
                'late_days' => $days_late
            ]);

            echo "Updated ID: " . $row->id . " | Days Late: " . $days_late . " | Interest: " . $interest_amount . "<br>";
        }

        echo "Interest Updated Successfully!";
    }
    public function edit_invoice()
    {
        $data['title'] = "Edit Invoice";
        $data['tag'] = "edit";

        $tid = $this->input->get('user_id'); // User ID
        $invoice_no = $this->input->get('invoice_no');

        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowByIdDesc('account', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_no, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);

        if ($_POST) {
            $post = $this->input->post();

            // Extract common invoice data
            $c_names = $post['customer_name'];
            $user_id = $post['uid'];
            $stock_place = $post['stock_place'];
            $d_type = $post['discount_type'];
            $date = $post['date'];
            $discount = floatval($post['discount']);
            $final = floatval($post['final_total']);
            $total_without_tax = floatval($post['total_without_tax']);
            $tax = floatval($post['tax_amount']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $include_interest = $post['include_interest'];

            $cheque_no = $post['cheque_no'];
            $due = $final - $paid;

            // Extract product details
            $product_names = $post['p_name'];
            $product_ids = $post['p_id'];
            $invoice_ids = $post['invoice_id'];
            $packings = $post['packing'];
            $box = $post['box'];

            $per_box = $post['per_box'];
            if ($per_box != '0') {

                $box1 = $box;



            } else {
                $box1 = "";

            }
            $quantities = $post['quantity'];
            $available_quantities = $post['available_quantity'];
            $unit_rates = $post['unit_rate'];
            $units = $post['unit'];
            $total_prices = $post['total_price'];

            $grand_total = array_sum($total_prices);
            $discount_amountt = '';
            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount'];
            } else {
                $discount_am = $grand_total * $post['discount'];
                $discount_amountt = $discount_am / 100;
            }
            foreach ($product_names as $index => $product_name) {
                if ($box[$index] != '') {
                    $box_product = '1';
                }
                if ($invoice_ids[$index] == '-11') {
                    $new_available_quantity = $available_quantities[$index] - $quantities[$index];

                    // Prepare data for each row
                    $data_to_insert = [
                        'customer_name' => $c_names,
                        'stock_place' => $stock_place,
                        'date' => $date,
                        'user_id' => $user_id,
                        'branch_id' => $tid,
                        'invoice_no' => $invoice_no,
                        'p_name' => $product_name,
                        'packing' => $packings[$index],
                        'quantity' => $quantities[$index],
                        'unit_rate' => $unit_rates[$index],
                        'unit' => $units[$index],
                        'box' => $box1[$index],
                        'box_product' => $box_product,
                        'per_box' => $per_box[$index],
                        'total_price' => $total_prices[$index],
                        'grand_total' => $grand_total,
                        'discount_type' => $d_type,
                        'discount' => $discount,
                        'discount_amount' => $discount_amountt,
                        'total_without_tax' => $total_without_tax,
                        'include_interest' => $include_interest,

                        'tax_amount' => $tax,
                        'final_total' => $final

                    ];

                    $savedata = $this->CommonModal->insertRowReturnId('invoice', $data_to_insert);

                    if ($savedata) {
                        $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                        $selling = $select[0]['selling_quantity'] + $quantities[$index];
                        $sellingg = $select[0]['per_product_selling_quantity'] + $quantities[$index];

                        if ($box[$index] == "Box") {
                            // Update available_quantity and selling_quantity
                            $updatedata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'availabile_quantity',
                                $new_available_quantity
                            );

                            $updatesellingdata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'selling_quantity',
                                $selling
                            );
                            $per_selling = $quantities[$index] * $per_box[$index];
                            $per_avail = $select[0]['per_product_available_quantity'] - $per_selling;
                            $per_sellingg = $select[0]['per_product_selling_quantity'] + $per_selling;

                            $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'per_product_available_quantity',
                                $per_avail
                            );
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'per_product_selling_quantity',
                                $per_sellingg
                            );


                        } elseif ($box[$index] == "Single" && $per_box[$index]) {

                            $updatedata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'per_product_available_quantity',
                                $new_available_quantity
                            );

                            $updatesellingdata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'per_product_selling_quantity',
                                $sellingg
                            );
                            $box_avail = intval($new_available_quantity / $per_box[$index]);

                            $new_box_avail1 = $select[0]['availabile_quantity'] - $box_avail;
                            $sellinggg = $select[0]['selling_quantity'] + $new_box_avail1;
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'availabile_quantity',
                                $box_avail
                            );
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'selling_quantity',
                                $sellinggg
                            );



                        } else {
                            $updatedata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'availabile_quantity',
                                $new_available_quantity
                            );

                            $updatesellingdata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'selling_quantity',
                                $selling
                            );
                        }

                        if (!$updatedata || !$updatesellingdata) {
                            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                            redirect($this->input->server('HTTP_REFERER'));
                            return;
                        }
                    } else {
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                        redirect($this->input->server('HTTP_REFERER'));
                        return;
                    }
                }
                // Fetch the product data from purchase_product table
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);

                if ($box[$index] == "Box") {
                    $sellingquantity = $select[0]['selling_quantity'];
                    $per_selling = $quantities[$index] * $per_box[$index];
                    // Adjust available and selling quantities based on the new quantity
                    if ($quantities[$index] > $sellingquantity) {
                        $quantityDiff = $quantities[$index] - $sellingquantity;
                        $new_available_quantity = $available_quantities[$index] - $quantityDiff;
                        $per_avail = $select[0]['per_product_available_quantity'] - $per_selling;

                    } elseif ($quantities[$index] < $sellingquantity) {
                        $quantityDiff = $sellingquantity - $quantities[$index];
                        $new_available_quantity = $available_quantities[$index] + $quantityDiff;
                        $per_avail = $select[0]['per_product_available_quantity'] + $per_selling;
                    } else {
                        $new_available_quantity = $available_quantities[$index];
                    }

                    // Update the available quantity in the purchase_product table
                    $updatedata = $this->CommonModal->updateColumnValue(
                        'purchase_product',
                        'p_id',
                        $product_ids[$index],
                        'availabile_quantity',
                        $new_available_quantity
                    );
                    $this->CommonModal->updateColumnValue(
                        'return_invoice',
                        'p_name',
                        $product_ids[$index],
                        'available_quantity',
                        $quantities[$index]
                    );



                    $this->CommonModal->updateColumnValue(
                        'purchase_product',
                        'p_id',
                        $product_ids[$index],
                        'per_product_available_quantity',
                        $per_avail
                    );

                    // Update selling quantity if needed
                    if ($quantities[$index] > $sellingquantity) {
                        $selling = $sellingquantity + $quantityDiff;
                        $per_sellingg = $select[0]['per_product_selling_quantity'] + $per_selling;
                    } elseif ($quantities[$index] < $sellingquantity) {
                        $selling = $sellingquantity - $quantityDiff;
                        $per_sellingg = $select[0]['per_product_selling_quantity'] - $per_selling;
                    } else {
                        $selling = $sellingquantity;
                        $per_sellingg = $select[0]['per_product_selling_quantity'];
                    }

                    // Update the selling quantity in the purchase_product table
                    if (isset($selling)) {
                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $selling
                        );
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_selling_quantity',
                            $per_sellingg
                        );
                    }
                } elseif ($box[$index] == "Single") {
                    $sellingquantityy = $select[0]['per_product_selling_quantity'];

                    if ($quantities[$index] > $sellingquantityy) {
                        $quantityDiff = $quantities[$index] - $sellingquantityy;
                        $new_available_quantityy = $available_quantities[$index] - $quantityDiff;
                    } elseif ($quantities[$index] < $sellingquantityy) {
                        $quantityDiff = $sellingquantityy - $quantities[$index];
                        $new_available_quantityy = $available_quantities[$index] + $quantityDiff;
                    } else {
                        $new_available_quantityy = $available_quantities[$index];
                    }
                    $box_avail = intval($new_available_quantityy / $per_box[$index]);
                    $updatedata = $this->CommonModal->updateColumnValue(
                        'purchase_product',
                        'p_id',
                        $product_ids[$index],
                        'per_product_available_quantity',
                        $new_available_quantityy
                    );
                    $this->CommonModal->updateColumnValue(
                        'return_invoice',
                        'p_name',
                        $product_ids[$index],
                        'available_quantity',
                        $quantities[$index]
                    );




                    $this->CommonModal->updateColumnValue(
                        'purchase_product',
                        'p_id',
                        $product_ids[$index],
                        'availabile_quantity',
                        $box_avail
                    );

                    // Update selling quantity if needed


                    if ($quantities[$index] > $sellingquantity) {
                        $selling = $sellingquantity + $quantityDiff;
                        $new_box_avail1 = $select[0]['availabile_quantity'] - $box_avail;
                        $sellinggg = $select[0]['selling_quantity'] + $new_box_avail1;
                    } elseif ($quantities[$index] < $sellingquantity) {
                        $selling = $sellingquantity - $quantityDiff;
                        $new_box_avail1 = $box_avail - $select[0]['availabile_quantity'];
                        $sellinggg = $select[0]['selling_quantity'] - $new_box_avail1;
                    } else {
                        $selling = $sellingquantity;
                        $sellinggg = $select[0]['selling_quantity'];
                    }

                    // Update the selling quantity in the purchase_product table
                    if (isset($selling)) {
                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_selling_quantity',
                            $selling
                        );
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $sellinggg
                        );
                    }
                } else {
                    if (!empty($select)) {
                        $sellingquantity = $select[0]['selling_quantity'];

                        // Adjust available and selling quantities based on the new quantity
                        if ($quantities[$index] > $sellingquantity) {
                            $quantityDiff = $quantities[$index] - $sellingquantity;
                            $new_available_quantity = $available_quantities[$index] - $quantityDiff;
                        } elseif ($quantities[$index] < $sellingquantity) {
                            $quantityDiff = $sellingquantity - $quantities[$index];
                            $new_available_quantity = $available_quantities[$index] + $quantityDiff;
                        } else {
                            $new_available_quantity = $available_quantities[$index];
                        }

                        // Update the available quantity in the purchase_product table
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );
                        $this->CommonModal->updateColumnValue(
                            'return_invoice',
                            'p_name',
                            $product_ids[$index],
                            'available_quantity',
                            $quantities[$index]
                        );

                        // Update selling quantity if needed
                        if ($quantities[$index] > $sellingquantity) {
                            $selling = $sellingquantity + $quantityDiff;
                        } elseif ($quantities[$index] < $sellingquantity) {
                            $selling = $sellingquantity - $quantityDiff;
                        } else {
                            $selling = $sellingquantity;
                        }

                        // Update the selling quantity in the purchase_product table
                        if (isset($selling)) {
                            $updatesellingdata = $this->CommonModal->updateColumnValue(
                                'purchase_product',
                                'p_id',
                                $product_ids[$index],
                                'selling_quantity',
                                $selling
                            );
                        }
                    } else {
                        // Handle case where product data is missing
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Product data missing.</div>');
                        redirect(base_url('admin_Dashboard/invoice/' . encryptId($tid)));
                        return;
                    }
                }
                // Prepare data to update the invoice record
                $data_to_update = [
                    'customer_name' => $c_names,
                    'stock_place' => $stock_place,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'invoice_no' => $invoice_no,
                    'include_interest' => $include_interest,

                    'p_name' => $product_name,
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'box' => $box1[$index],
                    'box_product' => $box_product,
                    'per_box' => $per_box[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_type' => $d_type,
                    'discount' => $discount,
                    'discount_amount' => $discount_amountt,
                    'total_without_tax' => $total_without_tax,
                    'tax_amount' => $tax,
                    'final_total' => $final
                ];

                // Update the invoice record
                $savedata = $this->CommonModal->updateRowById('invoice', 'id', $invoice_ids[$index], $data_to_update);
                if (!$savedata) {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/print_invoice/' . encryptId($tid) . '/' . $invoice_no));
                    return;
                }
            }

            // Update the payment information if any payment is made
            if ($paid >= 0) {
                $payment_data = [
                    'customer_id' => $c_names,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'invoice_no' => $invoice_no,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $final,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];

                // Update the payment record
                $payment_update = $this->CommonModal->updateRowById('payment', 'id', $ppid, $payment_data);

                if ($payment_update) {
                    // Get all rows after the given ID for the same invoice
                    $rows_after_id = $this->CommonModal->getRowsAfterId('payment', 'id', $ppid, 'invoice_no', $invoice_no);

                    if ($rows_after_id) {
                        foreach ($rows_after_id as $row) {
                            // Fetch the row just before the current row for recalculating due

                            $rows_before_id = $this->CommonModal->getRowsBeforeId('payment', 'id', $row['id'], 'invoice_no', $invoice_no);

                            // Ensure that there is a previous row to calculate the due amount
                            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $final;

                            // Calculate the new due amount
                            $due2 = $previous_due - $row['paid'];

                            $latest_data = [
                                'customer_id' => $c_names,
                                'user_id' => $user_id,
                                'branch_id' => $tid,
                                'invoice_no' => $row['invoice_no'],
                                'paid' => $row['paid'],
                                'mode' => $row['mode'],
                                'total' => $final,
                                'due' => $due2,
                                'bank' => $row['bank'],
                                'cheque_no' => $cheque_no
                            ];

                            // Update each row with the recalculated due
                            $this->CommonModal->updateRowById('payment', 'id', $row['id'], $latest_data);
                        }
                    }
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                    return;
                }
            }


            // Success message and redirect
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_invoice/' . encryptId($tid) . '/' . $invoice_no));
        } else {
            // Load data for the edit form
            $data['customer_list'] = $this->CommonModal->getRowByIdDesc('customer', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $data['stock_list'] = $this->CommonModal->getRowByIdDesc('stock_place', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $data['product_list'] = $this->CommonModal->getRowByIdDesc('product', 'user_id', $uid[0]['user_id'], 'id', 'DESC');
            $this->load->view('branch/edit_invoice', $data);
        }
    }


    public function view_return_invoice($id)
    { {
            $data['title'] = "Return Invoice Product";
            // Get Vendor ID from the URL query string
            $tid = decryptId($id);
            $ID = $this->input->get('id');
            $rID = $this->input->get('r_id');

            // Decrypt user ID
            $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
            $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
            $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
            // Fetch all vendors
            $this->db->select('*,return_invoice.date as datte,COUNT(*) as product_count,sum(quantity) as total_quantity'); // Count of products and sum of grand totals
            $this->db->from('return_invoice');
            $this->db->join('customer', 'customer.id = return_invoice.customer_name', 'left');
            $this->db->where('return_invoice.user_id', $uid[0]['user_id']);
            $this->db->where('return_invoice.branch_id', $tid); // Join with customer table
            $this->db->group_by(array('return_invoice.return_invoice_no', 'customer.name')); // Group by invoice_no and customer name
            $this->db->order_by('return_invoice.id', 'DESC');
            $data['return'] = $this->db->get()->result_array();
            // $data['return'] = $this->CommonModal->getAllRowsInOrder('return_invoice', 'id', 'DESC');
            if ($ID) {
                $iid = decryptId($id);
                $this->CommonModal->deleteRowByuserId('return_invoice', array('return_invoice_no' => $rID), array('user_id' => $iid));
                $this->CommonModal->deleteRowByuserId('return_invoice_payment', array('return_invoice_no' => $rID), array('user_id' => $iid));
                redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($id)));
            }
            // Load the view
            $this->db->select('id, name');
            $this->db->from('customer');
            $data['vender'] = $this->db->get()->result_array();

            $this->db->select('id, product_name');
            $this->db->from('product');
            $data['product_list'] = $this->db->get()->result_array();

            $this->load->view('branch/view_return_invoice', $data);
        }
    }
    public function return_invoice()
    {
        $data['title'] = "Return Invoice";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID
        $invoice_no = $this->input->get('invoice_no');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowById('account', 'user_id', $uid[0]['user_id']);
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_no, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);

        if ($_POST) {
            $post = $this->input->post();
            $c_names = $post['customer_name'];
            $stock_place = $post['stock_place'];
            $d_type = $post['discount_type'];
            $date = $post['date'];
            $user_id = $post['uid'];
            $discount = floatval($post['discount']);
            $final = floatval($post['final_total']);
            $total_without_tax = floatval($post['total_without_tax']);
            $tax = floatval($post['tax_amount']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $due = $final - $paid;
            $return_invoice_number = $this->generate_return_invoice_number($uid[0]['user_id']);
            // Collect product-related data
            $product_names = $post['p_name'];
            $product_ids = $post['p_id'];
            $box = $post['box'];

            $per_box = $post['per_box'];
            if ($per_box != '0') {

                $box1 = $box;



            } else {
                $box1 = "";

            }
            $invoice_ids = $post['invoice_id'];
            $packings = $post['packing'];
            $quantities = $post['quantity'];
            $available_quantities = $post['available_quantity'];
            $ava_quantities = $post['ava_quantity'];
            $unit_rates = $post['unit_rate'];
            $unit = $post['unit'];
            $total_prices = $post['total_price'];

            $grand_total = array_sum($total_prices);
            $discount_amountt = '';
            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount'];
            } else {
                $discount_am = $grand_total * $post['discount'];
                $discount_amountt = $discount_am / 100;
            }
            foreach ($product_names as $index => $product_name) {
                $new_available_quantity = $available_quantities[$index] + $quantities[$index];
                $new_per_p_avail_qty = $per_box[$index] * $quantities[$index];
                if ($box1[$index] != '') {
                    $box_product1 = '1';
                } else {
                    $box_product1 = '';
                }
                $data_to_insert = [
                    'customer_name' => $c_names,
                    'stock_place' => $stock_place,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'return_invoice_no' => $return_invoice_number,
                    'invoice_no' => $invoice_no,
                    'invoice_id' => $invoice_ids[$index],
                    'p_name' => $product_name,
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $unit[$index],
                    'box' => $box1[$index],
                    'box_product' => $box_product1[$index],
                    'per_box' => $per_box[$index],
                    'available_quantity' => $ava_quantities[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_type' => $d_type,
                    'discount' => $discount,
                    'discount_amount' => $discount_amountt,
                    'total_without_tax' => $total_without_tax,
                    'tax_amount' => $tax,
                    'final_total' => $final
                ];

                $savedata = $this->CommonModal->insertRowReturnId('return_invoice', $data_to_insert);

                if ($savedata) {
                    if ($box1[$index] == "Box") {

                        $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                        $selling = $select[0]['selling_quantity'] - $quantities[$index];
                        $selectinvoice = $this->CommonModal->getRowById('invoice', 'id', $invoice_ids[$index]);
                        $ava = $selectinvoice[0]['return_quantity'] + $quantities[$index];
                        $per_selling = $select[0]['per_product_selling_quantity'] - $new_per_p_avail_qty;
                        $per_avail = $select[0]['per_product_available_quantity'] + $new_per_p_avail_qty;



                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );

                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_available_quantity',
                            $per_avail
                        );
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_selling_quantity',
                            $per_selling
                        );
                        $this->CommonModal->updateColumnValue(
                            'return_purchase',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );
                        $updatestatusdata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'status',         // Column to update (available_quantity)
                            1       // New available quantity
                        );
                        $updatereturndata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'return_quantity',         // Column to update (available_quantity)
                            $ava // New available quantity
                        );
                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $selling
                        );

                        if (!$updatedata || !$updatesellingdata) {
                            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                            redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                            return;
                        }
                    } elseif ($box1[$index] == "Single") {

                        $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                        $selling = $select[0]['per_product_selling_quantity'] - $quantities[$index];
                        $selectinvoice = $this->CommonModal->getRowById('invoice', 'id', $invoice_ids[$index]);
                        $ava = $selectinvoice[0]['return_quantity'] + $quantities[$index];
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_product_availabile_quantity',
                            $new_available_quantity
                        );

                        $updatestatusdata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'status',         // Column to update (available_quantity)
                            1       // New available quantity
                        );
                        $updatereturndata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'return_quantity',         // Column to update (available_quantity)
                            $ava // New available quantity
                        );
                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'per_selling_quantity',
                            $selling
                        );
                        $box_avail = intval($new_available_quantity / $per_box[$index]);

                        $new_box_avail1 = $box_avail - $select[0]['availabile_quantity'];
                        $sellinggg = $new_box_avail1 - $select[0]['selling_quantity'];
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $box_avail
                        );
                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $sellinggg
                        );
                        if (!$updatedata || !$updatesellingdata) {
                            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                            redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                            return;
                        }
                    } else {


                        $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                        $selling = $select[0]['selling_quantity'] - $quantities[$index];
                        $selectinvoice = $this->CommonModal->getRowById('invoice', 'id', $invoice_ids[$index]);
                        $ava = $selectinvoice[0]['return_quantity'] + $quantities[$index];
                        $updatedata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );
                        $this->CommonModal->updateColumnValue(
                            'return_purchase',
                            'p_id',
                            $product_ids[$index],
                            'availabile_quantity',
                            $new_available_quantity
                        );
                        $updatestatusdata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'status',         // Column to update (available_quantity)
                            1       // New available quantity
                        );
                        $updatereturndata = $this->CommonModal->updateColumnValue(
                            'invoice',            // Table name
                            'id',                        // Column to match (product ID)
                            $invoice_ids[$index],          // Product ID to update
                            'return_quantity',         // Column to update (available_quantity)
                            $ava // New available quantity
                        );
                        $updatesellingdata = $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $product_ids[$index],
                            'selling_quantity',
                            $selling
                        );

                        if (!$updatedata || !$updatesellingdata) {
                            $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                            redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                            return;
                        }
                    }
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                    return;
                }
            }

            if ($paid >= 0) {
                $pay_to_insert = [
                    'customer_id' => $c_names,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'return_invoice_no' => $return_invoice_number,
                    'invoice_no' => $invoice_no,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $final,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];

                $savedata1 = $this->CommonModal->insertRowReturnId('return_invoice_payment', $pay_to_insert);

                if (!$savedata1) {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
                    redirect(base_url('Branch_Dashboard/invoice/' . encryptId($tid)));
                    return;
                }
            }

            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($tid) . '/' . $return_invoice_number));
        } else {
            $data['customer_list'] = $this->CommonModal->getRowById('customer', 'user_id', $uid[0]['user_id']);
            $data['stock_list'] = $this->CommonModal->getRowById('stock_place', 'user_id', $uid[0]['user_id']);
            $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
            $this->load->view('branch/return_invoice', $data);
        }
    }

    public function print_return_invoice($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        $this->load->view('branch/print_return_invoice', $data);
    }

    public function print_return_invoice_normal($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        $this->load->view('branch/print_return_invoice_normal', $data);
    }

    public function print_return_invoice_tax($id, $invoice_number)
    {
        $data['title'] = "Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);

        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Fetch all vendors
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $invoice_number, 'branch_id', $tid, 'user_id', $uid[0]['user_id']);

        $this->load->view('branch/print_return_tax', $data);
    }
    public function edit_return_invoice()
    {
        $data['title'] = "Edit Return Invoice";
        $data['tag'] = "edit";
        $userId = $this->input->get('user_id'); // User ID
        $returnInvoiceNo = $this->input->get('return_invoice_no');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $userId);
        $uid = $this->CommonModal->getRowById('branch', 'id', $userId);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowById('account', 'user_id', $uid[0]['user_id']);
        $data['invoice'] = $this->CommonModal->getRowByMultitpleId('return_invoice', 'return_invoice_no', $returnInvoiceNo, 'branch_id', $userId, 'user_id', $uid[0]['user_id']);

        if ($_POST) {
            $post = $this->input->post();
            $customerName = $post['customer_name'];
            $stockPlace = $post['stock_place'];
            $discountType = $post['discount_type'];
            $date = $post['date'];
            $user_id = $post['uid'];
            $discount = floatval($post['discount']);
            $finalTotal = floatval($post['final_total']);
            $total_without_tax = floatval($post['total_without_tax']);
            $tax = floatval($post['tax_amount']);
            $paidAmount = floatval($post['paid']);
            $paymentMode = $post['mode'];
            $paymentId = $post['p_p_id'];
            $bankAmount = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $dueAmount = $finalTotal - $paidAmount;

            // Collect product-related data
            $productNames = $post['p_name'];
            $invoiceIds = $post['invoice_id'];
            $productIds = $post['p_id'];
            $box = $post['box'];

            $per_box = $post['per_box'];
            if ($per_box != '0') {

                $box1 = $box;



            } else {
                $box1 = "";

            }
            $invoiceNo = $post['invoice_no'];
            $packings = $post['packing'];
            $quantities = $post['quantity'];
            $availableQuantities = $post['available_quantity'];
            $availableQuantitiesArray = $post['ava_quantity'];
            $unitRates = $post['unit_rate'];
            $units = $post['unit'];
            $totalPrices = $post['total_price'];

            $grandTotal = array_sum($totalPrices);
            $discount_amountt = '';
            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount'];
            } else {
                $discount_am = $grandTotal * $post['discount'];
                $discount_amountt = $discount_am / 100;
            }
            foreach ($productNames as $index => $productName) {
                if ($box1[$index] != '') {
                    $box_product1 = '1';
                } else {
                    $box_product1 = '';
                }
                $returnInvoice = $this->CommonModal->getRowById('return_invoice', 'id', $post['id'][$index]);
                $previousQuantity = isset($returnInvoice[0]['quantity']) ? $returnInvoice[0]['quantity'] : 0;
                $newQuantity = $quantities[$index];
                $quantityDifference = $newQuantity - $previousQuantity;
                $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $productIds[$index]);


                // Update available quantities based on the difference
                if ($newQuantity > $previousQuantity) {
                    $quantityDifference = $newQuantity - $previousQuantity;
                    $newAvailableQuantity = $availableQuantities[$index] + $quantityDifference;
                    $new_per_p_avail_qtyy = $per_box[$index] * $quantityDifference;

                    if ($box1[$index] == "Box") {
                        $per_avail = $select[0]['per_product_available_quantity'] + $new_per_p_avail_qtyy;
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'per_product_available_quantity', $per_avail);

                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);

                    } elseif ($box1[$index] == "Single") {
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'per_product_available_quantity', $newAvailableQuantity);
                        $box_avail = intval($quantityDifference / $per_box[$index]);


                        $new_box_avail1 = $box_avail - $select[0]['availabile_quantity'];

                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $productIds[$index],
                            'availabile_quantity',
                            $new_box_avail1
                        );

                    } else {
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);
                    }
                    $this->CommonModal->updateColumnValue('return_purchase', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);
                } elseif ($newQuantity < $previousQuantity) {
                    $quantityDifference = $newQuantity - $previousQuantity;
                    $newAvailableQuantity = $availableQuantities[$index] - $quantityDifference;
                    $new_per_p_avail_qty = $per_box[$index] * $quantityDifference;


                    if ($box1[$index] == "Box") {
                        $per_avail = $select[0]['per_product_available_quantity'] - $new_per_p_avail_qty;
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'per_product_available_quantity', $per_avail);

                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);

                    } elseif ($box1[$index] == "Single") {
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'per_product_available_quantity', $newAvailableQuantity);
                        $box_avail = intval($quantityDifference / $per_box[$index]);


                        $new_box_avail1 = $box_avail - $select[0]['availabile_quantity'];

                        $this->CommonModal->updateColumnValue(
                            'purchase_product',
                            'p_id',
                            $productIds[$index],
                            'availabile_quantity',
                            $new_box_avail1
                        );

                    } else {
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);
                    }
                    $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'availabile_quantity', $newAvailableQuantity);
                }

                $dataToInsert = [
                    'customer_name' => $customerName,
                    'stock_place' => $stockPlace,
                    'date' => $date,
                    'branch_id' => $userId,
                    'user_id' => $user_id,

                    'return_invoice_no' => $returnInvoiceNo,
                    'invoice_no' => $invoiceNo,
                    'p_name' => $productName,
                    'packing' => $packings[$index],
                    'quantity' => $newQuantity,
                    'available_quantity' => $newAvailableQuantity,
                    'unit_rate' => $unitRates[$index],
                    'unit' => $units[$index],
                    'box' => $box1[$index],
                    'box_product' => $box_product1[$index],
                    'per_box' => $per_box[$index],
                    'total_price' => $totalPrices[$index],
                    'grand_total' => $grandTotal,
                    'discount_type' => $discountType,
                    'discount' => $discount,
                    'discount_amount' => $discount_amountt,
                    'total_without_tax' => $total_without_tax,
                    'tax_amount' => $tax,
                    'final_total' => $finalTotal
                ];

                $savedata = $this->CommonModal->updateRowById('return_invoice', 'id', $post['id'][$index], $dataToInsert);

                if ($savedata) {
                    // Update product quantities in purchase_product table
                    $productData = $this->CommonModal->getRowById('purchase_product', 'p_id', $productIds[$index]);
                    $invoiceData = $this->CommonModal->getRowById('invoice', 'id', $invoiceIds[$index]);

                    if (!empty($productData) && !empty($invoiceData)) {
                        $sellingQuantity = $productData[0]['selling_quantity'];
                        $returnQuantity = $invoiceData[0]['return_quantity'];

                        if ($newQuantity > $previousQuantity) {
                            if ($box1[$index] == "Box") {
                                // Increase in quantity
                                $quantityDiff = $newQuantity - $previousQuantity;
                                $sellingQuantity -= $quantityDiff;
                                // $returnQuantity += $quantityDiff;
                                $new_per_p_qty = $per_box[$index] * $quantityDiff;
                                $per_avail = $productData[0]['per_product_selling_quantity'] - $new_per_p_qty;
                                $returnQuantity = $invoiceData['return_quantity'] + $new_per_p_qty;
                            } elseif ($box1[$index] == "Single") {
                                $quantityDiff = $newQuantity - $previousQuantity;
                                $returnQuantity += $quantityDiff;
                                $per_avail = $productData[0]['per_product_selling_quantity'] - $quantityDiff;

                                $box_avail = intval($quantityDiff / $per_box[$index]);


                                $sellinggg = $box_avail - $productData[0]['selling_quantity'];

                                $this->CommonModal->updateColumnValue(
                                    'purchase_product',
                                    'p_id',
                                    $productIds[$index],
                                    'selling_quantity',
                                    $sellinggg
                                );
                            } else {
                                $quantityDiff = $newQuantity - $previousQuantity;
                                $sellingQuantity -= $quantityDiff;
                                $returnQuantity += $quantityDiff;
                            }
                        } elseif ($newQuantity < $previousQuantity) {
                            if ($box1[$index] == "Box") {
                                // Increase in quantity
                                $quantityDiff = $newQuantity - $previousQuantity;
                                $sellingQuantity += $quantityDiff;
                                // $returnQuantity += $quantityDiff;
                                $new_per_p_qty = $per_box[$index] * $quantityDiff;
                                $per_avail = $productData[0]['per_product_selling_quantity'] + $new_per_p_qty;
                                $returnQuantity = $invoiceData['return_quantity'] - $new_per_p_qty;
                            } elseif ($box1[$index] == "Single") {
                                $quantityDiff = $newQuantity - $previousQuantity;
                                $returnQuantity -= $quantityDiff;
                                $per_avail = $productData[0]['per_product_selling_quantity'] + $quantityDiff;
                                $box_avail = intval($quantityDiff / $per_box[$index]);


                                $sellinggg = $box_avail + $productData[0]['selling_quantity'];

                                $this->CommonModal->updateColumnValue(
                                    'purchase_product',
                                    'p_id',
                                    $productIds[$index],
                                    'selling_quantity',
                                    $sellinggg
                                );

                            } else {
                                // Decrease in quantity
                                $quantityDiff = $previousQuantity - $newQuantity;
                                $sellingQuantity += $quantityDiff;
                                $returnQuantity -= $quantityDiff;
                            }
                        }

                        // Update selling quantity and return quantity
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'selling_quantity', $sellingQuantity);
                        $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $productIds[$index], 'per_product_selling_quantity', $per_avail);
                        $this->CommonModal->updateColumnValue('invoice', 'id', $invoiceIds[$index], 'return_quantity', $returnQuantity);

                    } else {
                        // Handle case where product or invoice data is missing
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Product or invoice data missing.</div>');
                        redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($userId)));
                        return;
                    }
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/view_return_invoice/' . encryptId($userId)));
                    return;
                }
            }

            if ($paidAmount >= 0) {
                $paymentData = [
                    'customer_id' => $customerName,
                    'branch_id' => $userId,
                    'user_id' => $user_id,
                    'return_invoice_no' => $returnInvoiceNo,
                    'invoice_no' => $invoiceNo,
                    'paid' => $paidAmount,
                    'mode' => $paymentMode,
                    'total' => $finalTotal,
                    'due' => $dueAmount,
                    'bank' => $bankAmount,
                    'cheque_no' => $cheque_no
                ];

                $savedata1 = $this->CommonModal->updateRowById('return_invoice_payment', 'id', $paymentId, $paymentData);
                if ($savedata1) {
                    // Get all rows after the given ID for the same invoice
                    $rows_after_id = $this->CommonModal->getRowsAfterId('return_invoice_payment', 'id', $paymentId, 'return_invoice_no', $returnInvoiceNo);

                    if ($rows_after_id) {
                        foreach ($rows_after_id as $row) {
                            // Fetch the row just before the current row for recalculating due

                            $rows_before_id = $this->CommonModal->getRowsBeforeId('return_invoice_payment', 'id', $row['id'], 'return_invoice_no', $returnInvoiceNo);

                            // Ensure that there is a previous row to calculate the due amount
                            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $finalTotal;

                            // Calculate the new due amount
                            $due2 = $previous_due - $row['paid'];

                            $latest_data = [
                                'customer_id' => $customerName,
                                'branch_id' => $userId,
                                'user_id' => $user_id,
                                'return_invoice_no' => $row['return_invoice_no'],
                                'invoice_no' => $row['invoice_no'],
                                'invoice_no' => $row['invoice_no'],
                                'paid' => $row['paid'],
                                'mode' => $row['mode'],
                                'total' => $finalTotal,
                                'due' => $due2,
                                'bank' => $row['bank'],
                                'cheque_no' => $cheque_no
                            ];

                            // Update each row with the recalculated due
                            $this->CommonModal->updateRowById('return_invoice_payment', 'id', $row['id'], $latest_data);
                        }
                    }
                } else {
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating payment information.</div>');
                    redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($userId) . '/' . $returnInvoiceNo));
                    return;
                }
            }

            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice updated successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_return_invoice/' . encryptId($userId) . '/' . $returnInvoiceNo));
        } else {
            $data['customer_list'] = $this->CommonModal->getRowById('customer', 'user_id', $uid[0]['user_id']);
            $data['stock_list'] = $this->CommonModal->getRowById('stock_place', 'user_id', $uid[0]['user_id']);
            $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
            $this->load->view('branch/edit_return_invoice', $data);
        }
    }
    public function get_subcategories($category_id)
    {
        $subcategories = $this->CommonModal->getRowById('purchase_product', 'product_name', $category_id);

        // Send the subcategories as a JSON response
        echo json_encode($subcategories);
    }
    public function get_name($contact = null)
    {
        if ($contact === 'all') {
            // Fetch all customers if no specific contact number is provided
            $customer_data = $this->CommonModal->getAllRows('customer');
        } else {
            // Fetch customers by the provided contact number
            $customer_data = $this->CommonModal->getRowById('customer', 'contact', $contact);
        }

        // Send the customer data as a JSON response
        echo json_encode($customer_data);
    }

    // public function get_products_by_stock_place()
// {
//     // Get the selected stock place ID from the AJAX request
//     $stock_place_id = $this->input->post('stock_place_id');

    //     if ($stock_place_id) {
//         // Directly query the database without using a model
//         $this->db->select('id, product_name');
//         $this->db->from('purchase_product');
//         $this->db->where('stock_place_name', $stock_place_id);
//         $query = $this->db->get();

    //         // Fetch the results as an array
//         $products = $query->result_array();

    //         // Return the products in JSON format
//         echo json_encode($products);
//     } else {
//         echo json_encode([]);
//     }
// }



    public function get_unit_rate($packing)
    {
        // Fetch the unit_rate based on the packing
        $unitRateData = $this->CommonModal->getRowById('purchase_product', 'p_id', $packing);

        // Check if the data is found
        if (!empty($unitRateData)) {
            // Send unit rate as a JSON response

            echo json_encode([

                'total_quantity' => $unitRateData[0]['total_quantity'],
                'availabile_quantity' => $unitRateData[0]['availabile_quantity'],
                'per_product_available_quantity' => $unitRateData[0]['per_product_available_quantity'],

                'p_id' => $unitRateData[0]['p_id']

            ]);
        } else {
            // Return empty or default value if not found
            echo json_encode([

                'availabile_quantity' => '',
                'per_product_available_quantity' => '',

                'p_id' => ''
            ]);
        }
    }
    public function get_product_details($product_id)
    {
        $product = $this->CommonModal->getRowById('product', 'id', $product_id);
        if ($product) {
            echo json_encode($product[0]);
        } else {
            echo json_encode(['error' => 'Product not found']);
        }
    }

    public function get_product_details_with_customer($product_id, $customer_id)
    {
        // Fetch product details
        $product = $this->CommonModal->getRowById('product', 'id', $product_id);
        // Fetch customer details
        $customer = $this->CommonModal->getRowById('customer', 'id', $customer_id);

        if (!$product || !$customer) {
            echo json_encode(['error' => 'Product or Customer not found']);
            return;
        }

        // Get customer price column (1, 2, or 3)
        $price_column = $customer[0]['price'];

        // Select correct selling price
        $selected_price = ($price_column == 1) ? $product[0]['selling_price'] :
            (($price_column == 2) ? $product[0]['selling_priceB'] : $product[0]['selling_priceC']);

        $selected_per_price = ($price_column == 1) ? $product[0]['box_per_unit_sales_price'] :
            (($price_column == 2) ? $product[0]['box_per_unit_sales_priceB'] : $product[0]['box_per_unit_sales_priceC']);

        // Add the correct selling price to response
        $product[0]['final_price'] = $selected_price;
        $product[0]['per_product_final_price'] = $selected_per_price;


        echo json_encode($product[0]);
    }
    public function delete_product()
    {
        // $tid = decryptId($id);
        // $data['user'] = $this->CommonModal->getRowById('users','id',$tid);
        $BdID = $this->input->get('BdID');
        $uID = $this->input->get('UI');
        $purchase_code = $this->input->get('pc');

        $product = $this->CommonModal->getRowById('purchase_product', 'p_id', $BdID);

        $left_quantity = $product[0]['total_quantity'] - $product[0]['quantity'];

        $sub = $product[0]['sub_total'] - $product[0]['total_price'];
        $grand = $product[0]['grand_total'] - $product[0]['total_price'];



        if ($purchase_code) {
            $latest_data = [
                'total_quantity' => $left_quantity,
                'sub_total' => $sub,
                'grand_total' => $grand


            ];
            $this->CommonModal->updateRowByIduser('purchase_product', 'purchase_code', $purchase_code, 'branch_id', $uID, $latest_data);
        }
        if ($this->CommonModal->deleteRowById('purchase_product', array('p_id' => $BdID))) {

            $this->session->set_flashdata('msg', 'Deleted successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Deletion failed. Please try again!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }

        $referrer = $this->input->server('HTTP_REFERER');
        redirect($referrer);
    }
    public function delete_invoice()
    {
        $BdID = $this->input->get('BdID', true);
        $uID = $this->input->get('UI', true);
        $invoice_code = $this->input->get('inv', true);
        $p_id = $this->input->get('p_id', true);

        if (!$BdID || !$uID || !$invoice_code || !$p_id) {
            $this->session->set_flashdata('msg', 'Invalid request parameters.');
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect($this->input->server('HTTP_REFERER'));
        }

        $product = $this->CommonModal->getRowById('invoice', 'id', $BdID);
        $p_product = $this->CommonModal->getRowById('purchase_product', 'p_id', $p_id);

        if (!$product || !$p_product) {
            $this->session->set_flashdata('msg', 'Product or Invoice not found.');
            $this->session->set_flashdata('msg_class', 'alert-danger');
            redirect($this->input->server('HTTP_REFERER'));
        }

        $this->db->trans_start(); // Start transaction

        $quantity = $product[0]['quantity'];

        if ($product[0]['box'] == 'Single') {
            $avail = $p_product[0]['per_product_available_quantity'] + $quantity;
            $sales = $p_product[0]['per_product_selling_quantity'] - $quantity;

            $latest_data1 = [
                'per_product_available_quantity' => $avail,
                'per_product_selling_quantity' => $sales,
            ];
            $this->CommonModal->updateRowByIduser('purchase_product', 'p_id', $p_id, 'user_id', $uID, $latest_data1);
        } else {
            $availl = $p_product[0]['availabile_quantity'] + $quantity;
            $saless = $p_product[0]['selling_quantity'] - $quantity;

            $latest_data2 = [
                'availabile_quantity' => $availl,
                'selling_quantity' => $saless,
            ];
            $this->CommonModal->updateRowByIduser('purchase_product', 'p_id', $p_id, 'user_id', $uID, $latest_data2);
        }

        $sub = $product[0]['grand_total'] - $product[0]['total_price'];
        $wot = $product[0]['total_without_tax'] - $product[0]['total_price'];
        $final = $product[0]['final_total'] - $product[0]['total_price'];

        if ($invoice_code) {
            $latest_data = [
                'grand_total' => $sub,
                'final_total' => $final,
                'total_without_tax' => $wot,
            ];
            $this->CommonModal->updateRowByIduser('invoice', 'invoice_no', $invoice_code, 'user_id', $uID, $latest_data);
        }

        $delete_success = $this->CommonModal->deleteRowById('invoice', ['id' => $BdID]);

        if ($delete_success) {
            $this->session->set_flashdata('msg', 'Deleted successfully');
            $this->session->set_flashdata('msg_class', 'alert-success');
        } else {
            $this->session->set_flashdata('msg', 'Deletion failed. Please try again!');
            $this->session->set_flashdata('msg_class', 'alert-danger');
        }

        $this->db->trans_complete(); // Complete transaction

        redirect($this->input->server('HTTP_REFERER'));
    }
    public function get_unit($packing)
    {
        // Fetch the unit_rate based on the packing
        $unitRateDataq = $this->CommonModal->getRowById('purchase_product', 'p_id', $packing);

        // Check if the data is found
        if (!empty($unitRateDataq)) {
            // Send unit rate as a JSON response
            echo json_encode(['unit' => $unitRateDataq[0]['unit']]);
        } else {
            // Return empty or default value if not found
            echo json_encode(['unit' => '']);
        }
    }
    public function get_product_details_by_product()
    {
        $product_id = $this->input->post('product_id');

        // Fetch the total_quantity, p_peice, and possible packings from the database
        $this->db->select('total_quantity, p_price, packing');
        $this->db->where('p_id', $product_id);
        $query = $this->db->get('purchase_product');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();

            // Prepare the packing options
            $packing_options = array_column($query->result_array(), 'packing');
            $result['packing_options'] = $packing_options;

            echo json_encode($result); // Return data as JSON
        } else {
            echo json_encode(['total_quantity' => 0, 'p_price' => 0, 'packing_options' => []]);
        }
    }


    public function return($id)
    {
        $data['title'] = "Return Product";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);
        $ID = $this->input->get('id');
        $returnCode = $this->input->get('return_code');
        // Decrypt user ID
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        // Check if the 'id' parameter is present, and perform the delete if needed
        if ($returnCode) {


            $deleteResult = $this->CommonModal->deleteRowByuserId('return_purchase', array('return_code' => $returnCode), array('user_id' => $tid));
            $this->CommonModal->deleteRowByuserId('return_purchase_payment', array('return_code' => $returnCode), array('user_id' => $tid));
            if ($deleteResult) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">Return product deleted successfully.</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error deleting the return product.</div>');
            }
            redirect(base_url('Branch_Dashboard/return/' . encryptId($id)));  // Redirect after deletion
        }


        // Fetch return purchases with a join on the vendor table
        $this->db->select('*,COUNT(*) as product_count');
        $this->db->from('return_purchase');
        $this->db->join('vender', 'vender.id = return_purchase.vender_name', 'left');
        $this->db->where('return_purchase.user_id', $uid[0]['user_id']);
        $this->db->where('return_purchase.branch_id', $tid);
        $this->db->group_by(array('return_purchase.return_code', 'vender.vender_name'));
        $this->db->order_by('return_purchase.id', 'DESC');
        $data['return'] = $this->db->get()->result_array();

        // Fetch all vendors for the return page
        $this->db->select('id, vender_name');
        $this->db->from('vender');
        $data['vender'] = $this->db->get()->result_array();

        // Fetch all products for the return page
        $this->db->select('id, product_name');
        $this->db->from('product');
        $data['product_list'] = $this->db->get()->result_array();

        // Load the view for the return page
        $this->load->view('branch/view_return', $data);
    }

    public function return_product()
    {
        $data['title'] = "Return Product";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID
        $purchase_code = $this->input->get('purchase_code');
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);
        $data['vender'] = $this->CommonModal->getRowById('vender', 'user_id', $uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
        $data['stock'] = $this->CommonModal->getRowById('stock_place', 'user_id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowById('account', 'user_id', $uid[0]['user_id']);

        $data['product'] = $this->CommonModal->getRowByMultitpleId('purchase_product', 'purchase_code', $purchase_code, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);
        if ($this->input->post()) {
            $post = $this->input->post();

            // Gather form data
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
            $purchase_code = $post['purchase_code'];
            $date = $post['purchase_date'];
            $discount_type = $post['discount_type'];

            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
            $sub_total = floatval($post['sub_total']);
            $grand_total = floatval($post['grand_total']);
            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount_value'];
            } else {
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am / 100;
            }
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            //  $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount_value'];
            } else {
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am / 100;
            }
            $due = $grand_total - $paid;
            $return_code = $this->generate_return_code($uid[0]['user_id']);
            // Prepare product arrays
            $available_quantities = $post['available_quantity'];
            $product_names = $post['p_name'] ?? [];
            $product_ids = $post['p_id'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
            $t_quantity = $post['t_quantity'] ?? [];
            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];

            $p_discount_type = $post['p_discount_type'] ?? [];
            $p_discount = $post['p_discount'] ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $HSN_code = $post['HSN_code'];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
            $gst_type = $post['tax_type'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $total_prices = $post['total_price'] ?? [];

            // Insert invoice items
            foreach ($product_names as $index => $product_name) {
                $new_available_quantity = $available_quantities[$index] - $quantities[$index];
                // Prepare data for each row
                $data_to_insert = [
                    'vender_name' => $vender_id,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'return_code' => $return_code,
                    'purchase_code' => $purchase_code,
                    'stock_place_name' => $stock_place_name,
                    'product_name' => $product_name,
                    'p_id' => $product_ids[$index],
                    'packing' => $packings[$index],
                    'quantity' => $quantities[$index],
                    'availabile_quantity' => $new_available_quantity,
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'p_discount_type' => $p_discount_type[$index],
                    'p_discount' => $p_discount[$index],
                    'gst_percent' => $gst_percentages[$index],
                    'tax_type' => $gst_type[$index],
                    'gst_tax' => $gst_amounts[$index],
                    'exp_date' => $exp_dates[$index],
                    'HSN_code' => $HSN_code[$index],
                    'p_price' => $p_prices[$index],
                    'mrp' => $mrps[$index],
                    'selling_price' => $selling_prices[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_value' => $discount_value,
                    'discount_type' => $discount_type,
                    'discount_amount' => $discount_amountt,
                    'total_quantity' => $total_quantity,
                    't_q' => $t_quantity[$index],
                    'sub_total' => $sub_total,
                ];

                // Insert data into the purchase_product table
                $savedata = $this->CommonModal->insertRowReturnId('return_purchase', $data_to_insert);
                if ($savedata) {
                    // Fetch the current selling_quantity for the product
                    $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                    $select_product = $this->CommonModal->getRowById('product', 'id', $product_name);

                    $return = $select[0]['return_quantity'] + $quantities[$index];
                    $box = ($select_product[0]['unit'] == 'Box') ? '1' : '0';
                    $p_b_q = ($box === '1') ? (($quantities[$index] ?? 0) * ($select_product[0]['box_per_unit'] ?? 0)) : '0';
                    $p_a_q = $select[0]['per_product_available_quantity'] - $p_b_q;
                    $p_r_q = $select[0]['per_product_return_quantity'] + $p_b_q;


                    // Update available_quantity in the purchase_product table for the current product
                    $updatedata = $this->CommonModal->updateColumnValue(
                        'purchase_product',            // Table name
                        'p_id',                        // Column to match (product ID)
                        $product_ids[$index],          // Product ID to update
                        'availabile_quantity',         // Column to update (available_quantity)
                        $new_available_quantity        // New available quantity
                    );
                    $updatestatusdata = $this->CommonModal->updateColumnValue(
                        'purchase_product',            // Table name
                        'p_id',                        // Column to match (product ID)
                        $product_ids[$index],          // Product ID to update
                        'status',         // Column to update (available_quantity)
                        1       // New available quantity
                    );
                    // Update selling_quantity in the purchase_product table for the current product
                    $updatesellingdata = $this->CommonModal->updateColumnValue(
                        'purchase_product',            // Table name
                        'p_id',                        // Column to match (product ID)
                        $product_ids[$index],          // Product ID to update
                        'return_quantity',            // Column to update (selling_quantity)
                        $return                       // New selling quantity
                    );
                    $this->CommonModal->updateColumnValue(
                        'purchase_product',            // Table name
                        'p_id',                        // Column to match (product ID)
                        $product_ids[$index],          // Product ID to update
                        'per_product_return_quantity',            // Column to update (selling_quantity)
                        $p_r_q                      // New selling quantity
                    );
                    $this->CommonModal->updateColumnValue(
                        'purchase_product',            // Table name
                        'p_id',                        // Column to match (product ID)
                        $product_ids[$index],          // Product ID to update
                        'per_product_available_quantity',            // Column to update (selling_quantity)
                        $p_a_q                      // New selling quantity
                    );

                    // Error handling for update failure
                    if (!$updatedata || !$updatesellingdata) {
                        // Handle update error
                        $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                        redirect(base_url('Branch_Dashboard/invoie/' . $tid));
                        return;
                    }
                } else {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding invoice item.</div>');
                    redirect(base_url('Branch_Dashboard/prodct/' . encryptId($tid)));
                    return;
                }
            }

            // Insert payment data if paid amount is provided
            if ($paid >= 0) {
                $pay_to_insert = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'purchase_code' => $purchase_code,
                    'return_code' => $return_code,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $grand_total,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];

                $savedata1 = $this->CommonModal->insertRowReturnId('return_purchase_payment', $pay_to_insert);

                if (!$savedata1) {
                    // Handle insert error
                    $this->session->set_userdata('msg', '<div class="alert alert-danger">Error adding payment information.</div>');
                    redirect(base_url('Branch_Dashboard/product/' . encryptId($tid)));
                    return;
                }
            }

            // Success message and redirection
            $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
            redirect(base_url('Branch_Dashboard/print_return_purchase/' . encryptId($tid) . '/' . $return_code));
        } else {

            $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
            $this->load->view('branch/return_product', $data);
        }
    }

    public function edit_return()
    {
        $data['title'] = "Edit Return Product";
        $data['tag'] = "edit";
        $tid = $this->input->get('user_id'); // User ID
        $return_code = $this->input->get('return_code');

        // Fetch necessary data
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['u'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        $data['vender'] = $this->CommonModal->getRowById('vender', 'user_id', $uid[0]['user_id']);
        $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
        $data['stock'] = $this->CommonModal->getRowById('stock_place', 'user_id', $uid[0]['user_id']);
        $data['account'] = $this->CommonModal->getRowById('account', 'user_id', $uid[0]['user_id']);
        $data['product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);

        if ($this->input->post()) {
            $post = $this->input->post();

            // Extract necessary fields
            $vender_id = $post['vender_name'];
            $stock_place_name = $post['stock_place_name'];
            $user_id = $post['uid'];
            $purchase_code = $post['purchase_code'];
            $date = $post['purchase_date'];
            $discount_type = $post['discount_type'];
            $discount_value = floatval($post['discount_value']);
            $total_quantity = floatval($post['total_quantity']);
            $sub_total = floatval($post['sub_total']);
            $grand_total = floatval($post['grand_total']);
            $paid = floatval($post['paid']);
            $mode = $post['mode'];
            $ppid = $post['p_p_id'];
            $bank = floatval($post['bank']);
            $cheque_no = $post['cheque_no'];
            $due = $grand_total - $paid;
            $discount_amountt = "";

            if ($post['discount_type'] == 'rupee') {
                $discount_amountt = $post['discount_value'];
            } else {
                $discount_am = $post['sub_total'] * $post['discount_value'];
                $discount_amountt = $discount_am / 100;
            }
            // Product arrays
            $available_quantities = $post['available_quantity'];
            $product_names = $post['p_name'] ?? [];
            $product_ids = $post['p_id'] ?? [];
            $packings = $post['packing'] ?? [];
            $quantities = $post['quantity'] ?? [];
            $t_quantity = $post['t_quantity'] ?? [];
            $ids = $post['id'] ?? [];
            $unit_rates = $post['unit_rate'] ?? [];
            $units = $post['unit'] ?? [];
            $p_discount_type = $post['p_discount_type'] ?? [];
            $P_discount = floatval($post['p_discount']) ?? [];
            $exp_dates = $post['exp_date'] ?? [];
            $HSN_code = $post['HSN_code'];
            $p_prices = $post['p_price'] ?? [];
            $mrps = $post['mrp'] ?? [];
            $selling_prices = $post['selling_price'] ?? [];
            $gst_percentages = $post['tax'] ?? [];
            $gst_type = $post['tax_type'] ?? [];
            $gst_amounts = $post['tax_amount'] ?? [];
            $total_prices = $post['total_price'] ?? [];

            // Start transaction
            $this->db->trans_start();

            // Insert or update each product
            foreach ($product_names as $index => $product_name) {
                // Fetch existing quantity data
                $rp = $this->CommonModal->getRowById('return_purchase', 'id', $ids[$index]);

                // Check if the retrieved data is valid
                if (!empty($rp) && isset($rp[0]['quantity'])) {
                    // Calculate the difference between the current and previous quantities
                    if ($quantities[$index] > $rp[0]['quantity']) {
                        // If the new quantity is greater, subtract the difference from available quantity
                        $quantity_diff = $quantities[$index] - $rp[0]['quantity'];
                        $new_available_quantity = $available_quantities[$index] - $quantity_diff;
                    } elseif ($rp[0]['quantity'] > $quantities[$index]) {
                        // If the new quantity is less, add the difference to available quantity
                        $quantity_diff = $rp[0]['quantity'] - $quantities[$index];
                        $new_available_quantity = $available_quantities[$index] + $quantity_diff;
                    } else {
                        // If the quantities are equal, keep the available quantity the same
                        $new_available_quantity = $available_quantities[$index];
                    }
                } else {
                    // Handle case where no data is found or quantity is not set
                    $new_available_quantity = $available_quantities[$index]; // Keep it unchanged or handle as needed
                }
                // Calculate new available quantity


                // Prepare data to update
                $data_to_insert = [
                    'vender_name' => $vender_id,
                    'date' => $date,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'purchase_code' => $purchase_code,
                    'stock_place_name' => $stock_place_name,
                    'product_name' => $product_name,
                    'packing' => $packings[$index],
                    'p_id' => $product_ids[$index],
                    'quantity' => $quantities[$index],
                    'availabile_quantity' => $new_available_quantity,
                    'unit_rate' => $unit_rates[$index],
                    'unit' => $units[$index],
                    'p_discount_type' => $p_discount_type[$index],
                    'p_discount' => $P_discount[$index],
                    'gst_percent' => $gst_percentages[$index],
                    'tax_type' => $gst_type[$index],
                    'gst_tax' => $gst_amounts[$index],
                    'exp_date' => $exp_dates[$index],
                    'HSN_code' => $HSN_code[$index],
                    'p_price' => $p_prices[$index],
                    'mrp' => $mrps[$index],
                    'selling_price' => $selling_prices[$index],
                    'total_price' => $total_prices[$index],
                    'grand_total' => $grand_total,
                    'discount_value' => $discount_value,
                    'discount_type' => $discount_type,
                    'discount_amount' => $discount_amountt,
                    'total_quantity' => $total_quantity,
                    't_q' => $t_quantity[$index],
                    'sub_total' => $sub_total,
                ];
                $savedata = $this->CommonModal->updateRowById('return_purchase', 'id', $ids[$index], $data_to_insert);
                if ($savedata) {



                    $updatedata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'availabile_quantity', $new_available_quantity);
                    // Update selling_quantity in the purchase_product table for the current product
                    //   $rp = $this->CommonModal->getRowById('return_purchase', 'id', $ids[$index]);
                    // Fetch the current selling_quantity for the product
                    $select = $this->CommonModal->getRowById('purchase_product', 'p_id', $product_ids[$index]);
                    $select_product = $this->CommonModal->getRowById('product', 'id', $product_name);

                    $box = ($select_product[0]['unit'] == 'Box') ? '1' : '0';

                    if (!empty($rp) && isset($rp[0]['quantity']) && !empty($select) && isset($select[0]['return_quantity'])) {
                        // Calculate the difference between the new and previous quantities
                        if ($quantities[$index] > $rp[0]['quantity']) {
                            // Increase in quantity - add the difference to return_quantity
                            $quantity_diff = $quantities[$index] - $rp[0]['quantity'];
                            $updated_return_quantity = $select[0]['return_quantity'] + $quantity_diff;
                            $p_b_q = ($box === '1') ? (($quantity_diff ?? 0) * ($select_product[0]['box_per_unit'] ?? 0)) : '0';
                            $p_a_q = $select[0]['per_product_available_quantity'] - $p_b_q;
                            $p_r_q = $select[0]['per_product_return_quantity'] + $p_b_q;
                            $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',            // Table name
                                'p_id',                        // Column to match (product ID)
                                $product_ids[$index],          // Product ID to update
                                'per_product_return_quantity',            // Column to update (selling_quantity)
                                $p_r_q                      // New selling quantity
                            );
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',            // Table name
                                'p_id',                        // Column to match (product ID)
                                $product_ids[$index],          // Product ID to update
                                'per_product_available_quantity',            // Column to update (selling_quantity)
                                $p_a_q                      // New selling quantity
                            );
                        } elseif ($rp[0]['quantity'] > $quantities[$index]) {
                            // Decrease in quantity - subtract the difference from return_quantity
                            $quantity_diff = $rp[0]['quantity'] - $quantities[$index];
                            $updated_return_quantity = $select[0]['return_quantity'] - $quantity_diff;
                            $p_b_q = ($box === '1') ? (($quantity_diff ?? 0) * ($select_product[0]['box_per_unit'] ?? 0)) : '0';
                            $p_a_q = $select[0]['per_product_available_quantity'] + $p_b_q;
                            $p_r_q = $select[0]['per_product_return_quantity'] - $p_b_q;
                            $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',            // Table name
                                'p_id',                        // Column to match (product ID)
                                $product_ids[$index],          // Product ID to update
                                'per_product_return_quantity',            // Column to update (selling_quantity)
                                $p_r_q                      // New selling quantity
                            );
                            $this->CommonModal->updateColumnValue(
                                'purchase_product',            // Table name
                                'p_id',                        // Column to match (product ID)
                                $product_ids[$index],          // Product ID to update
                                'per_product_available_quantity',            // Column to update (selling_quantity)
                                $p_a_q                      // New selling quantity
                            );
                        } else {
                            // No change in quantity - keep return_quantity as it is
                            $updated_return_quantity = $select[0]['return_quantity'];
                            $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);
                        }
                    } else {
                        // Handle case where data is missing or undefined
                        $updated_return_quantity = $select[0]['return_quantity'] ?? 0;
                        $updatesellingdata = $this->CommonModal->updateColumnValue('purchase_product', 'p_id', $product_ids[$index], 'return_quantity', $updated_return_quantity);// Keep it unchanged or set to default
                    }





                }




            }

            // Insert payment if any amount is paid
            if ($paid >= 0) {
                $pay_to_insert = [
                    'vender_id' => $vender_id,
                    'user_id' => $user_id,
                    'branch_id' => $tid,
                    'paid' => $paid,
                    'mode' => $mode,
                    'total' => $grand_total,
                    'due' => $due,
                    'bank' => $bank,
                    'cheque_no' => $cheque_no
                ];
                $savedata1 = $this->CommonModal->updateRowById('return_purchase_payment', 'id', $ppid, $pay_to_insert);
                if ($savedata1) {
                    // Get all rows after the given ID for the same invoice
                    $rows_after_id = $this->CommonModal->getRowsAfterId('return_purchase_payment', 'id', $ppid, 'return_code', $return_code);

                    if ($rows_after_id) {
                        foreach ($rows_after_id as $row) {
                            // Fetch the row just before the current row for recalculating due

                            $rows_before_id = $this->CommonModal->getRowsBeforeId('return_purchase_payment', 'id', $row['id'], 'return_code', $return_code);

                            // Ensure that there is a previous row to calculate the due amount
                            $previous_due = $rows_before_id ? $rows_before_id[0]['due'] : $due;

                            // Calculate the new due amount
                            $due2 = $previous_due - $row['paid'];

                            $latest_data = [
                                'vender_id' => $vender_id,
                                'user_id' => $user_id,
                                'branch_id' => $tid,


                                'paid' => $row['paid'],
                                'mode' => $row['mode'],
                                'total' => $grand_total,
                                'due' => $due2,
                                'bank' => $row['bank'],
                                'cheque_no' => $cheque_no
                            ];

                            // Update each row with the recalculated due
                            $this->CommonModal->updateRowById('return_purchase_payment', 'id', $row['id'], $latest_data);
                        }
                    }
                }
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                $this->session->set_userdata('msg', '<div class="alert alert-danger">Error updating product quantities.</div>');
                redirect(base_url('Branch_Dashboard/invoice/' . $tid));
                return;
            } else {
                $this->db->trans_commit();
                $this->session->set_userdata('msg', '<div class="alert alert-success">Invoice added successfully.</div>');
                redirect(base_url('Branch_Dashboard/print_return_purchase/' . encryptId($tid) . '/' . $return_code));
            }
        } else {
            $data['product_list'] = $this->CommonModal->getRowById('product', 'user_id', $uid[0]['user_id']);
            $this->load->view('branch/edit_return', $data);
        }
    }


    public function print_return_purchase($id, $return_code)
    {
        $data['title'] = "Return Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        $data['purchase_product'] = $this->CommonModal->getRowById('return_purchase', 'return_code', $return_code);
        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);
        // Load the view
        $this->load->view('branch/return_purchase_invoice', $data);
    }
    public function print_return_purchase_normal($id, $return_code)
    {
        $data['title'] = "Return normal Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        $data['purchase_product'] = $this->CommonModal->getRowById('return_purchase', 'return_code', $return_code);
        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);
        // Load the view
        $this->load->view('branch/print_return_purchase_normal', $data);
    }
    public function print_return_purchase_tax($id, $return_code)
    {
        $data['title'] = "Return Tax Invoice";
        // Get Vendor ID from the URL query string
        $tid = decryptId($id);


        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        $uid = $this->CommonModal->getRowById('branch', 'id', $tid);
        $data['user_main'] = $this->CommonModal->getRowById('users', 'id', $uid[0]['user_id']);

        $data['purchase_product'] = $this->CommonModal->getRowById('return_purchase', 'return_code', $return_code);
        $data['purchase_product'] = $this->CommonModal->getRowByMultitpleId('return_purchase', 'return_code', $return_code, 'user_id', $uid[0]['user_id'], 'branch_id', $tid);
        // Load the view
        $this->load->view('branch/print_return_purchase_tax', $data);
    }
    public function add_payment($id)
    {

        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        if (count($_POST) > 0) {

            $post = $this->input->post();

            $post['due'] = $post['due'] - $post['paid'];





            $savedata = $this->CommonModal->insertRowReturnId('payment', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

            }

            redirect(base_url('Branch_Dashboard/invoice/' . $id));

        } else {

            redirect(base_url('Branch_Dashboard/invoice/' . $id));

        }

    }
    public function add_purchase_payment($id)
    {

        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        if (count($_POST) > 0) {

            $post = $this->input->post();

            $post['due'] = $post['due'] - $post['paid'];





            $savedata = $this->CommonModal->insertRowReturnId('purchase_payment', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

            }

            redirect(base_url('Branch_Dashboard/product/' . $id));

        } else {

            redirect(base_url('Branch_Dashboard/product/' . $id));

        }

    }
    public function add_return_purchase_payment($id)
    {

        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        if (count($_POST) > 0) {

            $post = $this->input->post();

            $post['due'] = $post['due'] - $post['paid'];





            $savedata = $this->CommonModal->insertRowReturnId('return_purchase_payment', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

            }

            redirect(base_url('Branch_Dashboard/return/' . $id));

        } else {

            redirect(base_url('Branch_Dashboard/return/' . $id));

        }

    }

    public function add_return_payment($id)
    {

        $tid = decryptId($id);
        $data['user'] = $this->CommonModal->getRowById('branch', 'id', $tid);
        if (count($_POST) > 0) {

            $post = $this->input->post();

            $post['due'] = $post['due'] - $post['paid'];





            $savedata = $this->CommonModal->insertRowReturnId('return_invoice_payment', $post);

            if ($savedata) {

                $this->session->set_userdata('msg', '<div class="alert alert-success"> Add Successfully</div>');

            } else {

                $this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');

            }

            redirect(base_url('Branch_Dashboard/view_return_invoice/' . $id));

        } else {

            redirect(base_url('Branch_Dashboard/view_return_invoice/' . $id));

        }

    }

    public function get_product($query = 'all')
    {
        $this->load->model('CommonModal');

        // Retrieve user ID from GET request
        $uid = $this->input->get('id', true);

        // Validate input
        if (empty($uid)) {
            echo json_encode(['error' => 'User ID is required.']);
            return;
        }

        try {
            // Fetch products based on the query
            if ($query === 'all') {
                // Fetch all products for the given user ID
                $products = $this->CommonModal->getRowById('product', 'user_id', $uid);
            } else {
                // Fetch products matching the search query and user ID
                $products = $this->CommonModal->searchProductsByName($query, $uid);
            }

            // Return products as JSON
            echo json_encode(!empty($products) ? $products : []);
        } catch (Exception $e) {
            // Log the error
            log_message('error', 'Error in get_product: ' . $e->getMessage());
            echo json_encode(['error' => 'An unexpected error occurred.']);
        }
    }



    public function logout()
    {

        $this->session->unset_userdata('admin_id');

        redirect('Admin');
    }
}
