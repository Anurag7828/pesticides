<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {

        parent::__construct();

        if (sessionId('admin_id') == "") {

            redirect(base_url('admin'));

        }

        date_default_timezone_set("Asia/Kolkata");

    }
	public function index()
	{
        $data['title'] = "Home";       
        $data['user'] = $this->CommonModal->getNumRow('users');
        $data['active'] = $this->CommonModal->getNumWhereRows('users','status',1);
        $data['deactive'] = $this->CommonModal->getNumWhereRows('users','status',0);
        $data['agent'] = $this->CommonModal->getNumRow('agent');
        $data['activeagent'] = $this->CommonModal->getNumWhereRows('agent','status',1);
        $data['deactiveagent'] = $this->CommonModal->getNumWhereRows('agent','status',0);

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');


		$this->load->view('index',$data);

	}

	public function profile(){
        $data['title'] = "Admin Profile";

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');

		// $data['testimonials'] = $this->CommonModal->getAllRows('testimonial');

		$this->load->view('admin_profile',$data);
	}
	public function update_profile($id)
    {

    $data['title'] = 'Update';
    $data['tag'] = 'admin';
      $tid = $id;
     $data['admin'] = $this->CommonModal->getRowById('admin', 'admin_id', $tid);

     	 if (count($_POST) > 0) {

            $post = $this->input->post();
            $image_url = $post['image'];
           if ($_FILES['image']['name'] != '') {

                $img = imageUpload('image', 'uploads/admin/');

                $post['image'] = $img;

                if ($image_url != "") {

                    unlink('uploads/admin/' . $image_url);

                }

            }

            $category_id = $this->CommonModal->updateRowById('admin', 'admin_id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('profile'));

        } else {

            $this->load->view('update_profile', $data);

        }

    }
	public function view_users(){
		$data['title'] = "View Users";
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
		
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('users', array('id' => $BdID));
            $this->CommonModal->deleteRowById('agent_customer', array('customer_id' => $BdID));
            $this->CommonModal->deleteRowById('sales_invoice', array('user_id' => $BdID));


            if ($img) {
                unlink('./uploads/users/' . $img);
            }
            redirect('view_users');
        }
		$data['users'] = $this->CommonModal->getRowById('users', 'status', '1');
        $this->load->view('view_users', $data);
	}
	public function add_users()
    {

        $data['title'] = "Add Member";
        $data['tag'] = "add";
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
        $data['agent'] = $this->CommonModal->getAllRows('agent'); 
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $post['image'] = imageUpload('image', 'uploads/users/');
            $savedata = $this->CommonModal->insertRowReturnId('users', $post);

$data =[
    'user_id' => $savedata,
];
$this->CommonModal->insertRowReturnId('sales_invoice', $data);

            if ($savedata) {
                $agent_customer_data = [
                    'customer_id' => $savedata,
                    'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
                ];
    
                // Insert into 'agent_customer' table
                $agent_customer_id = $this->CommonModal->insertRowReturnId('agent_customer', $agent_customer_data);
                if ($agent_customer_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Added Successfully</div>');

            // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($post['email']);  // Send to user's email
            $this->email->subject('Registration Successful');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
$message .= "We are pleased to inform you that your registration for our software has been successfully completed. Below are your login credentials:\n\n";
$message .= "Username: " . htmlspecialchars($post['username']) . "\n";
$message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
$message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
$message .= "You can log in to the software using the following link: " . base_url('Admin') . "\n\n";
$message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
$message .= "Thank you for choosing our software!\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $post['email']);
            }

        } } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
        }

            redirect(base_url('view_users'));

        } else {

            $this->load->view('add_users', $data);

        }

    }

	public function update_users($id)
    {
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
        $data['agent'] = $this->CommonModal->getAllRows('agent'); 
    $data['title'] = 'Update Member';
    $data['tag'] = 'user';
      $tid = $id;
     $data['users'] = $this->CommonModal->getRowById('users', 'id', $tid);

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
            $agent_customer_data = [
               
                'agent_id' => $post['agent_id'] // Ensure 'agent_id' is provided in the form
            ];
            $category_id = $this->CommonModal->updateRowById('users', 'id', $tid, $post);
            $category_id1 = $this->CommonModal->updateRowById('agent_customer', 'customer_id', $tid, $agent_customer_data);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('view_users'));

        } else {

            $this->load->view('update_users', $data);

        }

    }
	public function deactive_users(){
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');

		$data['title'] = "View Users";
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
        if ($BdID) {
            $this->CommonModal->deleteRowById('users', array('id' => $BdID));
            $this->CommonModal->deleteRowById('agent_customer', array('customer_id' => $BdID));

            if ($img) {
                unlink('./uploads/users/' . $img);
            }
            redirect('view_users');
        }
		$data['users'] = $this->CommonModal->getRowById('users', 'status', '0');
        $this->load->view('deactive_users', $data);
	}
	public function deactiveusers($id){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('users', 'id', $id, $data);
	$users = $this->CommonModal->getRowById('users', 'id', $id);
	 if ($status_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Deactive Successfully</div>');

            // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($users[0]['email']);  // Send to user's email
            $this->email->subject('Account Deactive');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($users[0]['name']) . ",\n\n";
$message .= "We would like to inform you that your account associated with our software has been deactivated. This action has been taken due to Payment Issue.\n\n";
$message .= "If you believe this action was taken in error or wish to reactivate your account, please contact our support team at info@namami.co.in .\n\n";
$message .= "We appreciate your understanding and are here to assist you with any concerns you may have.\n\n";
$message .= "Thank you for your time and cooperation.\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $users[0]['email']);
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
        }
		redirect(base_url('deactive_users'));
	
	}
	public function activeusers($id){
		$data['status'] = 1    ;
		$status_id = $this->CommonModal->updateRowById('users', 'id', $id, $data);
	$data['users'] = $this->CommonModal->getRowById('users', 'id', $id);
	$users = $this->CommonModal->getRowById('users', 'id', $id);

		if ($status_id) {
			$this->session->set_userdata('msg', '<div class="alert alert-success"> Active successfully</div>');
			 // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($users[0]['email']);  // Send to user's email
            $this->email->subject('Account Active');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($users[0]['name']) . ",\n\n";
$message .= "We are pleased to inform you that your account associated with our software has been successfully activated. You can now log in and start using our services.\n\n";
$message .= "Below are your login credentials:\n";
$message .= "Username: " . htmlspecialchars($users[0]['username']) . "\n";
$message .= "Password: " . htmlspecialchars($users[0]['password']) . "\n\n";
$message .= "Please keep your login details secure and do not share them with anyone.\n\n";
$message .= "You can access the software using the following link: " . base_url('Admin') . "\n\n";
$message .= "If you have any questions or need assistance, feel free to contact our support team at info@namami.co.in.\n\n";
$message .= "Thank you for choosing our services. We look forward to serving you!\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $users[0]['email']);
            }
		} else {
			$this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');
		}
		redirect(base_url('view_users'));
	
	}
    public function view_agent(){
		$data['title'] = "View agent";
		$data['tag'] = "active";

		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
		
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
		
        if ($BdID) {
            $this->CommonModal->deleteRowById('agent', array('id' => $BdID));
            $this->CommonModal->deleteRowById('agent_customer', array('agent_id' => $BdID));

            if ($img) {
                unlink('./uploads/users/' . $img);
            }
            redirect('view_agent',$data);
        }
		$data['Agent'] = $this->CommonModal->getRowById('agent', 'status', '0');
        $this->load->view('view_agent', $data);
	}
	public function add_agent()
    {

        $data['title'] = "Add Member";
        $data['tag'] = "add";
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
    
        if (count($_POST) > 0) {

            $post = $this->input->post();
            $post['image'] = imageUpload('image', 'uploads/users/');
            $savedata = $this->CommonModal->insertRowReturnId('agent', $post);

            if ($savedata) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Added Successfully</div>');

            // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($post['email']);  // Send to user's email
            $this->email->subject('Registration Successful');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($post['name']) . ",\n\n";
$message .= "We are pleased to inform you that your registration for our software has been successfully completed. Below are your login credentials:\n\n";
// $message .= "Username: " . htmlspecialchars($post['username']) . "\n";
// $message .= "Password: " . htmlspecialchars($post['password']) . "\n\n";
$message .= "Please keep your login credentials secure and do not share them with anyone.\n\n";
$message .= "You can log in to the software using the following link: " . base_url('Admin') . "\n\n";
$message .= "If you encounter any issues, please feel free to contact our support team.\n\n";
$message .= "Thank you for choosing our software!\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $post['email']);
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
        }

            redirect(base_url('view_agent'));

        } else {

            $this->load->view('add_agent', $data);

        }

    }

	public function update_agent($id)
    {
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
     
    $data['title'] = 'Update Agent';
    $data['tag'] = 'edit';
      $tid = $id;
     $data['agent'] = $this->CommonModal->getRowById('agent', 'id', $tid);

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

            $category_id = $this->CommonModal->updateRowById('agent', 'id', $tid, $post);

            if ($category_id) {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            } else {
                $this->session->set_userdata('msg', '<div class="alert alert-success">member Updated successfully</div>');
            }
            redirect(base_url('view_agent'));

        } else {

            $this->load->view('add_agent', $data);

        }

    }
	public function deactive_agent(){
		$data['admin'] = $this->CommonModal->getAllRows('admin', 'admin_id');
		$data['tag'] = "deactive";

		$data['title'] = "View agent";
        $BdID = $this->input->get('BdID');
        $img = $this->input->get('img');
        if ($BdID) {
            $this->CommonModal->deleteRowById('agent', array('id' => $BdID));
            $this->CommonModal->deleteRowById('agent_customer', array('agent_id' => $BdID));

            if ($img) {
                unlink('./uploads/users/' . $img);
            }
            redirect('view_agent',$data);
        }
		$data['Agent'] = $this->CommonModal->getRowById('agent', 'status', '1');
        $this->load->view('view_agent', $data);
	}
	public function deactiveagent($id){
		$data['status'] = 1    ;
		$status_id = $this->CommonModal->updateRowById('agent', 'id', $id, $data);
	$agent = $this->CommonModal->getRowById('agent', 'id', $id);
	 if ($status_id) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success">Deactive Successfully</div>');

            // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($agent[0]['email']);  // Send to user's email
            $this->email->subject('Account Deactive');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($agent[0]['name']) . ",\n\n";
$message .= "We would like to inform you that your account associated with our software has been deactivated. This action has been taken due to Payment Issue.\n\n";
$message .= "If you believe this action was taken in error or wish to reactivate your account, please contact our support team at info@namami.co.in .\n\n";
$message .= "We appreciate your understanding and are here to assist you with any concerns you may have.\n\n";
$message .= "Thank you for your time and cooperation.\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $agent[0]['email']);
            }

        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-danger">Error while saving data</div>');
        }
		redirect(base_url('view_deactive_agent'));
	
	}
	public function activeagent($id){
		$data['status'] = 0    ;
		$status_id = $this->CommonModal->updateRowById('agent', 'id', $id, $data);
	$data['agent'] = $this->CommonModal->getRowById('agent', 'id', $id);
	$agent = $this->CommonModal->getRowById('agent', 'id', $id);

		if ($status_id) {
			$this->session->set_userdata('msg', '<div class="alert alert-success"> Active successfully</div>');
			 // Send email to the user
            $this->load->library('email');

            // Email configuration
            $config['mailtype'] = 'text';  // Use plain text instead of HTML
            $this->email->initialize($config);

            $this->email->from('venusglamour@krishnawireandcables.com', 'Namami Software');
            $this->email->to($agent[0]['email']);  // Send to user's email
            $this->email->subject('Account Active');
            
            // Construct email message in plain text format
           $message = "Dear " . htmlspecialchars($agent[0]['name']) . ",\n\n";
$message .= "We are pleased to inform you that your account associated with our software has been successfully activated. You can now log in and start using our services.\n\n";
$message .= "Below are your login credentials:\n";
// $message .= "Username: " . htmlspecialchars($agent[0]['username']) . "\n";
// $message .= "Password: " . htmlspecialchars($agent[0]['password']) . "\n\n";
$message .= "Please keep your login details secure and do not share them with anyone.\n\n";
$message .= "You can access the software using the following link: " . base_url('Admin') . "\n\n";
$message .= "If you have any questions or need assistance, feel free to contact our support team at info@namami.co.in.\n\n";
$message .= "Thank you for choosing our services. We look forward to serving you!\n\n";
$message .= "Best regards,\n";
$message .= "The Namami Software Team";
            
            $this->email->message($message);  // Use plain text message

            // Check if email was sent successfully
            if (!$this->email->send()) {
                log_message('error', 'Email could not be sent to ' . $agent[0]['email']);
            }
		} else {
			$this->session->set_userdata('msg', '<div class="alert alert-success">Error</div>');
		}
		redirect(base_url('view_agent'));
	
	}
	
}