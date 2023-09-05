<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Show_detail extends CI_Controller {
    
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


    public function index()
	{
        $this->load->view('insert_detail.php');
	}

    public function show_detail()
	{
        $item_id = $this->input->post('barcode');
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['single_item'] = $this->Itnhs->show_item_by_id($item_id);
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['all_detail'] = $this->Itnhs->show_detail($item_id);
        $this->data['user'] = $this->user->show_user();
		$this->load->view('show_detail.php', $this->data);
	}
    public function show_user_item()
	{
        $user_id = $this->session->userdata['logged_in']['user_id']; 
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['user_item'] = $this->Itnhs->show_user_item($user_id);
        $this->data['user'] = $this->user->show_user();
		$this->load->view('show_user_item.php', $this->data);
	}


      
}
