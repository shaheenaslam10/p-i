<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->library('form_validation');
            $this->load->model("Itnhs");
            $this->load->model("user");
        }

        else
        {
        redirect('login', 'refresh');
        }
    }


    public function show_report()
	{
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['user'] = $this->user->show_user();
		$this->load->view('show_report.php', $this->data);
	}


      
}
