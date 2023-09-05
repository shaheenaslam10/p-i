<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Category extends CI_Controller {
    
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
        $this->load->view('insert_category.php');
	}

    public function show_category()
	{
        $this->data['category'] = $this->Itnhs->show_category();
		$this->load->view('show_category.php', $this->data);
	}

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('category_name','category Name','unique[category.category_name]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_category');
        } 
        else 
        {
            $data = array(
            'category_name' => $this->input->post('category_name'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('category', $data);
            $this->session->set_flashdata('category_success', 'Category Added Successfully');
            redirect("Add_Category/show_category");
        }
    }

    function show_category_id($id)
    {

        $data['single_category'] = $this->Itnhs->show_category_id($id);
        $this->load->view('edit_category', $data);
    }

    function update_category_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('category_name','Category Name','unique[category.category_name]');

        if($this->form_validation->run()== FALSE){
        $this->show_category_id($id);
        }else
        {
            $data = array(

                'category_name' => $this->input->post('category_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_category_id($id,$data);
                $this->session->set_flashdata('category_success', 'Category Updated Successfully');
                redirect("Add_Category/show_category");
        }
    }
    function delete_category($category_id) {

        $this->db->where('category_id',$category_id);
        $this->db->delete('category'); 
        $this->session->set_flashdata('category_success', 'Category Deleted Successfully');
        redirect("Add_Category/show_category");
    }        
}
