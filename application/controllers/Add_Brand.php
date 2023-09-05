<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Brand extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->library('form_validation');
            $this->load->model("Itnhs");
        }

        else
        {
        redirect('login', 'refresh');
        }
    }

	public function index()
	{
        $this->load->view('insert_brand.php');
	}

    public function show_brand()
	{
        $this->data['brand'] = $this->Itnhs->show_brand();
		$this->load->view('show_brand.php', $this->data);
	}

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('brand_name','brand Name','unique[brand.brand_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_brand');
        } 
        else 
        {
            $data = array(
            'brand_name' => $this->input->post('brand_name'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('brand', $data);
            $this->session->set_flashdata('category_success', 'Brand Added Successfully');
            redirect("Add_Brand/show_brand");
        }
    }

    function show_brand_id($id)
    {

        $data['single_brand'] = $this->Itnhs->show_brand_id($id);
        $this->load->view('edit_brand', $data);
    }

    function update_brand_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('brand_name','Brand Name','unique[brand.brand_name]');

        if($this->form_validation->run()== FALSE){
        $this->show_brand_id($id);
        }else
        {
            $data = array(

                'brand_name' => $this->input->post('brand_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_brand_id($id,$data);
                $this->session->set_flashdata('category_success', 'Brand Updated Successfully');
                redirect("Add_Brand/show_brand");
        }
    }
    function delete_brand($brand_id) {

        $this->db->where('brand_id',$brand_id);
        $this->db->delete('brand'); 
        $this->session->set_flashdata('category_success', 'Brand Deleted Successfully');
        redirect("Add_Brand/show_brand");
    }        
}
