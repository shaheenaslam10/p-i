<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Maintenance extends CI_Controller {
    
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
        $this->data['item'] = $this->Itnhs->show_item();
        $this->load->view('insert_maintenance.php', $this->data);
	}

    public function show_maintenance()
	{
        $this->data['maintenance'] = $this->Itnhs->show_maintenance();
        $this->data['item'] = $this->Itnhs->show_item();
		$this->load->view('show_maintenance.php', $this->data);
	}

    function savedata() 
    {
        
            $data = array(
            'item_id' => $this->input->post('item_id'),
            'comment' => $this->input->post('comment'),
            'cost' => $this->input->post('cost'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('maintenance', $data);
            $this->session->set_flashdata('category_success', 'Maintenance Added Successfully');
            redirect("Add_Maintenance/show_maintenance");
        
    }

    function show_maintenance_id($id)
    {

        $data['single_maintenance'] = $this->Itnhs->show_maintenance_id($id);
        $this->load->view('edit_maintenance', $data);
    }

    function update_maintenance_id() 
    {

        $id= $this->input->post('id');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('maintenance_name','Maintenance Name','unique[maintenance.maintenance_name]');

        if($this->form_validation->run()== FALSE){
        $this->show_maintenance_id($id);
        }else
        {
            $data = array(

                'maintenance_name' => $this->input->post('maintenance_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_maintenance_id($id,$data);
                $this->session->set_flashdata('category_success', 'Maintenance Updated Successfully');
                redirect("Add_Maintenance/show_maintenance");
        }
    }
    function delete_maintenance($maintenance_id) {

        $this->db->where('maintenance_id',$maintenance_id);
        $this->db->delete('maintenance'); 
        $this->session->set_flashdata('category_success', 'Maintenance Deleted Successfully');
        redirect("Add_Maintenance/show_maintenance");
    }        
}
