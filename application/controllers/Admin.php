<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Admin extends CI_Controller

{



    public function index()
{
    $data['title'] = " Login";
    $data['favicon'] = "assets/images/logo.png";

    // Check if the user is logged in by verifying session data
    if ($this->session->userdata('id')) {
        $role = $this->session->userdata('role');

        // Redirect based on the role
        if ($role === 'admin') {
            redirect(base_url('Home')); // Redirect admin to the admin dashboard
        } elseif ($role === 'user') {
            $user_id = $this->session->userdata('id');
            redirect(base_url('Admin_dashboard/index/' . encryptId($user_id))); // Redirect user to the user dashboard
        }
    } else {
        // If not logged in, show the login page
        $this->load->view('login', $data);
    }
}



public function download_invoice($id, $invoice_number)
{



    // Decrypt user ID securely
    $tid = decryptId($id);
    
    // Validate if user exists
    $data['user'] = $this->CommonModal->getRowById('users', 'id', $tid);
    if (empty($data['user'])) {
        show_error('Invalid User ID', 404);
        return;
    }

    // Fetch invoice based on invoice number and user ID
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'user_id', $tid);
    if (empty($data['invoice'])) {
        show_error('Invoice not found', 404);
        return;
    }

    // Load the invoice view
    $this->load->view('invoice/download_invoice', $data);
}
public function tax_invoice($id, $invoice_number)
{



    // Decrypt user ID securely
    $tid = decryptId($id);
    
    // Validate if user exists
    $data['user'] = $this->CommonModal->getRowById('users', 'id', $tid);
    if (empty($data['user'])) {
        show_error('Invalid User ID', 404);
        return;
    }

    // Fetch invoice based on invoice number and user ID
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'user_id', $tid);
    if (empty($data['invoice'])) {
        show_error('Invoice not found', 404);
        return;
    }

    // Load the invoice view
    $this->load->view('invoice/tax_invoice', $data);
}public function basic_invoice($id, $invoice_number)
{



    // Decrypt user ID securely
    $tid = decryptId($id);
    
    // Validate if user exists
    $data['user'] = $this->CommonModal->getRowById('users', 'id', $tid);
    if (empty($data['user'])) {
        show_error('Invalid User ID', 404);
        return;
    }

    // Fetch invoice based on invoice number and user ID
    $data['invoice'] = $this->CommonModal->getRowByMultitpleId('invoice', 'invoice_no', $invoice_number, 'user_id', $tid);
    if (empty($data['invoice'])) {
        show_error('Invoice not found', 404);
        return;
    }

    // Load the invoice view
    $this->load->view('invoice/basic_invoice', $data);
}

    public function adminlogin()
{
    // Set validation rules for login form fields
    $this->form_validation->set_rules('username', 'User Name', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_error_delimiters('<div style="color: red;">', '</div>');

    // Run form validation
    if ($this->form_validation->run()) {
        // Get username and password from the POST data
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Step 1: Check in the 'admin' table for admin login
        $admin_data = $this->CommonModal->getRowById('admin', 'username', $username);
 $user_data = $this->CommonModal->getRowById('users', 'username', $username);
        if ($admin_data) {
            // Fetch admin details from the database result
            $id = $admin_data[0]['admin_id'];
            $f_username = $admin_data[0]['username'];
            $f_password = $admin_data[0]['password'];
            $role = $admin_data[0]['role']; 

            // Verify password for admin
            if ($password == $f_password) {
                // Set session data for admin
                $this->session->set_userdata(array('admin_id' => $id, 'username' => $username, 'role' => 'admin'));

                // Redirect to the admin dashboard
                redirect('Home');
            } else {
                flashData('login_error', 'Enter a valid Password for Admin.');
            }
        } elseif($user_data) {
            // Step 2: Check in the 'users' table for user login if not found in the admin table
            // $user_data = $this->CommonModal->getRowById('users', 'username', $username);

            if ($user_data) {
                // Fetch user details from the database result
                $id = $user_data[0]['id'];
                $f_username = $user_data[0]['username'];
                $f_password = $user_data[0]['password'];
                $role = $user_data[0]['role']; 
                $status = $user_data[0]['status']; 

              if($status==1){
                // Verify password for user
                if ($password == $f_password) {
                    // Set session data for user
                    $this->session->set_userdata(array('id' => $id,'status' => 1, 'username' => $username, 'role' => 'user'));

                    // Redirect to the user dashboard
                    redirect('Admin_Dashboard/index/' . encryptId($id));
                } else {
                    flashData('login_error', 'Enter a valid Password for User.');
                }
            } else{
                flashData('login_error', 'Package Is Expire');
            }
            } else {
                // If no user found in either table
                flashData('login_error', 'Enter a valid Username.');
            }
        }else {
            // Step 2: Check in the 'users' table for user login if not found in the admin table
            $branch_data = $this->CommonModal->getRowById('branch', 'username', $username);

            if ($branch_data) {
                // Fetch user details from the database result
                $id = $branch_data[0]['id'];
                $f_username = $branch_data[0]['username'];
                $f_password = $branch_data[0]['password'];
                $role = $branch_data[0]['role']; 
                $status = $branch_data[0]['status']; 

              if($status==1){
                // Verify password for user
                if ($password == $f_password) {
                    // Set session data for user
                    $this->session->set_userdata(array('id' => $id,'status' => 1, 'username' => $username,'role' => 'branch'));

                    // Redirect to the user dashboard
                    redirect('Branch_Dashboard/index/' . encryptId($id));
                } else {
                    flashData('login_error', 'Enter a valid Password for User.');
                }
            } else{
                flashData('login_error', 'Package Is Expire');
            }
            } else {
                // If no user found in either table
                flashData('login_error', 'Enter a valid Username.');
            }
        }
    }

    // Load the login view if form validation fails or user needs to try again
    $this->load->view('login');
}







    public function logout()

    {

        //load session library

        $this->load->library('session');

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');

        redirect(base_url('admin'));

    }

}

