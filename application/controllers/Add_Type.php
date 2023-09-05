<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Type extends CI_Controller {
    
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
        $this->load->view('insert_type.php');
	}

    public function show_type()
	{
        $this->data['type'] = $this->Itnhs->show_type();
		$this->load->view('show_type.php', $this->data);
	}

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('type_name','Type Name','unique[type.type_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_type');
        } 
        else 
        {
            $data = array(
            'type_name' => $this->input->post('type_name'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('type', $data);
            $this->session->set_flashdata('category_success', 'Type Added Successfully');
            redirect("Add_Type/show_type");
        }
    }

    function show_type_id($id)
    {

        $data['single_type'] = $this->Itnhs->show_type_id($id);
        $this->load->view('edit_type', $data);
    }

    function update_type_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('type_name','Type Name','unique[type.type_name]');

        if($this->form_validation->run()== FALSE){
        $this->show_type_id($id);
        }else
        {
            $data = array(

                'type_name' => $this->input->post('type_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_type_id($id,$data);
                $this->session->set_flashdata('category_success', 'Type Updated Successfully');
                redirect("Add_Type/show_type");
        }
    }
    function delete_type($type_id) {

        $this->db->where('type_id',$type_id);
        $this->db->delete('type'); 
        $this->session->set_flashdata('category_success', 'Type Deleted Successfully');
        redirect("Add_type/show_type");
    }        
}
