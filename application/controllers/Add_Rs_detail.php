<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Rs_detail extends CI_Controller {
    
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
       
	}
	
    public function insert($id)
	{
        
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        //$this->data['single_slip'] = $this->Itnhs->show_item_slip_id($id);
        $this->data['single_rs_detail_slip'] = $this->Itnhs->show_rs_detail_slip_id($id);
        $this->data['rs_detail_by_id'] = $this->Itnhs->show_rs_detail_by_id($id);
        $this->load->view('insert_rs_detail.php', $this->data);
	}

    public function show_rs_detail()
	{
        $this->data['rs_detail'] = $this->Itnhs->show_rs_detail();
		$this->load->view('show_rs_detail.php', $this->data);
	}

    function savedata() 
    {
        $rid = $this->input->post('requisition_slip_id');
       // $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        //$this->form_validation->set_rules('rs_detail_name','Rs Detail Name','unique[rs_detail.rs_detail_name]');

        
            $data = array(
            
            'rs_detail_description' => $this->input->post('rs_detail_description'),
            'quantity' => $this->input->post('quantity'),
            'rate' => $this->input->post('rate'),
            'requisition_slip_id' => $this->input->post('requisition_slip_id'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('rs_detail', $data);
            $this->session->set_flashdata('category_success', 'rs_detail Added Successfully');
            redirect("Add_Rs_detail/insert/".$rid);
        
    }

    function show_rs_detail_id($id)
    {

        $data['single_rs_detail'] = $this->Itnhs->show_rs_detail_id($id);
        $this->load->view('edit_rs_detail', $data);
    }

    function update_rs_detail_id() 
    {

        $id= $this->input->post('id');
        $rs_id = $this->input->post('requisition_slip_id');
            $data = array(
            
            'rs_detail_description' => $this->input->post('rs_detail_description'),
            'quantity' => $this->input->post('quantity'),
            'rate' => $this->input->post('rate'),
            'requisition_slip_id' => $this->input->post('requisition_slip_id'),
            'by_user' => $this->input->post('by_user'),
            );
               
                $this->Itnhs->update_rs_detail_id($id,$data);
                $this->session->set_flashdata('category_success', 'Updated Successfully');
                redirect("Add_Rs_detail/insert/" . $rs_id );
        
    }

    function delete_rs_detail($rs_detail_id,$id) {


        $this->db->where('rs_detail_id',$rs_detail_id);
        $this->db->delete('rs_detail'); 
        $this->session->set_flashdata('category_success', 'Deleted Successfully');
        redirect("Add_Rs_detail/insert/" . $id);
    }        
}
