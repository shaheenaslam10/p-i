<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Department extends CI_Controller {
    
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
        $this->load->view('insert_department.php');
	}

    public function show_department()
	{
        $this->data['department'] = $this->Itnhs->show_department();
		$this->load->view('show_department.php', $this->data);
	}

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('department_name','Department Name','unique[department.department_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_department');
        } 
        else 
        {
            $data = array(
            'department_name' => $this->input->post('department_name'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('department', $data);
            $this->session->set_flashdata('category_success', 'Department Added Successfully');
            redirect("Add_Department/show_department");
        }
    }

    function show_department_id($id)
    {

        $data['single_department'] = $this->Itnhs->show_department_id($id);
        $this->load->view('edit_department', $data);
    }

    function update_department_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('department_name','Department Name','unique[department.department_name]');

        if($this->form_validation->run()== FALSE){
        $this->show_department_id($id);
        }else
        {
            $data = array(

                'department_name' => $this->input->post('department_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_department_id($id,$data);
                $this->session->set_flashdata('category_success', 'Department Updated Successfully');
                redirect("Add_Department/show_department");
        }
    }
    function delete_department($department_id) {

        $this->db->where('department_id',$department_id);
        $this->db->delete('department'); 
        $this->session->set_flashdata('category_success', 'Department Deleted Successfully');
        redirect("Add_Department/show_department");
    }        
}
