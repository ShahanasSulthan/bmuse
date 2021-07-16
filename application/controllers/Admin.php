<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['url']);
		$this->load->library(['session', 'form_validation']);
		$this->load->database();
		$this->load->model('AdminModel');
	}
	public function index()
	{
		$subscribers=$this->AdminModel->getAllSubscribers();
		$data=array('subscribers'=>$subscribers);	
		$this->load->view('admin',$data);
	}
	public function emailForm(){
		if($this->input->post('action') && $this->input->post('action')=='delete'){
			$ids=explode(",",$this->input->post('ids'));			
			if($this->AdminModel->deleteSubscribers($ids)){
				$this->session->set_flashdata('success_msg', 'Subscribers deleted Successfully');
			}else{
				$this->session->set_flashdata('failure_msg', 'Failure in deletion');
			}
			redirect('Admin');

		}else{
			$this->session->set_userdata('ids',$this->input->post('ids'));
			$this->load->view('email_form');
		}
		
	}
	public function emailTemplate(){
		$this->load->view('email_template');
	}
	public function sendNotification(){
		$editorData=htmlentities($this->input->post('editor1'));
		$ids=explode(",",$this->session->userdata('ids'));
		$recipients=$this->AdminModel->getSubscriberMailIds($ids);
		if(sizeof($recipients)>0 && $config['smtp_user']!='' && $config['smtp_pass']!=''){
			$emailIds='';
			foreach($recipients as $recipient){
				$emailIds.=$recipient['email'].',';
			}
			$this->load->library('email');
			$config = array();
			$config['protocol'] = $this->config->item('email_protocol');
			$config['smtp_host'] = $this->config->item('email_smtp_host');
			$config['smtp_user'] = $this->config->item('email_smtp_user');
			$config['smtp_pass'] = $this->config->item('email_smtp_pass');
			$config['smtp_port'] = $this->config->item('email_smtp_port');
			$config['mailtype'] = $this->config->item('email_mailtype');
			$config['charset'] = $this->config->item('email_charset');
			$config['priority'] = $this->config->item('email_priority');
			$config['wordwrap'] = TRUE;
			$config['newline'] = "\r\n";
			$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
			$this->email->set_header('Content-type', 'text/html');
			$this->email->initialize($config);
			$this->email->from($this->config->item('email_smtp_user'));
			$this->email->to($emailIds);
			$this->email->subject('Subscription Notification');
			$data=array('content'=>html_entity_decode($editorData));
			$emailContent = $this->load->view('email_template.php', $data, true);
			$this->email->message($emailContent);
			try {
				$this->email->send();
				$this->session->set_flashdata('success_msg', 'Notification Sent Successfully');
			} 
			catch (Exception $e) {
				$this->session->set_flashdata('failure_msg', 'Notification Sending Failed');	
			}
		}else{
			$this->session->set_flashdata('failure_msg', 'Notification Sending Failed [Configuration Failure.]');	
		}
		
		redirect('Admin');
	}
	
}
