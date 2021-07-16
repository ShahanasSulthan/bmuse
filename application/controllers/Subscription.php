<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url']);
		$this->load->library(['session', 'form_validation']);
		$this->load->database();
		$this->load->model('SubscriptionModel');
	}
	public function index()
	{
		$this->load->view('subscription');
	}
	public function subscribe(){		
		$this->load->helper('email');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('name','Name','trim|required');
		if($this->form_validation->run() == false){		
			$this->index();
		}else{
			if($this->SubscriptionModel->checkEmailIsAlreadyRegistered($this->input->post('email'))){
				$this->session->set_flashdata('failure_msg', 'Email already registered !');
				redirect('Subscription');		
			}
			$data=array(
				'name'=>$this->input->post('name'),
				'email'=>$this->input->post('email')
			);
			if($this->SubscriptionModel->subscribe($data)){
				$this->session->set_flashdata('success_msg', 'Subscribed Successfully');
			}else{
				$this->session->set_flashdata('failure_msg', 'Subscription Failed');				
			}
			redirect('Subscription');
		}
	}
}
