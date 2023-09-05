<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Request_Type extends CI_Controller {
    
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
        $this->load->view('insert_request_type.php');
	}

    public function show_request_type()
	{
        $this->data['request_type'] = $this->Itnhs->show_request_type();    
		$this->load->view('show_request_type.php', $this->data);
	}

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('request_type_name','Type Name','unique[request_type.request_type_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_request_type');
        } 
        else 
        {
            $data = array(
            'request_type_name' => $this->input->post('request_type_name'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('request_type', $data);
            $this->session->set_flashdata('category_success', 'Type Added Successfully');
            redirect("Add_Request_Type/show_request_type");
        }
    }

    function show_request_type_id($id)
    {

        $data['single_request_type'] = $this->Itnhs->show_request_type_id($id);
        $this->load->view('edit_request_type', $data);
    }

    function update_request_type_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('request_type_name','Type Name','unique[request_type.request_type_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_request_type');
        } 
        else 
        {
            $data = array(

                'request_type_name' => $this->input->post('request_type_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_request_type_id($id,$data);
                $this->session->set_flashdata('category_success', 'Type Updated Successfully');
                redirect("Add_Request_Type/show_request_type");
        }
    }
    function delete_request_type($request_type_id) {

        $this->db->where('request_type_id',$request_type_id);
        $this->db->delete('request_type'); 
        $this->session->set_flashdata('category_success', 'Type Deleted Successfully');
        redirect("Add_Request_type/show_request_type");
    }        
}
