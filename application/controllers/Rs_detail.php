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
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->data['all_type'] = $this->Itnhs->show_type();
      //  $this->data['all_item_slip_id'] = $this->Itnhs->show_item_slip_id();
        $this->load->view('insert_rs_detail.php', $this->data);
	}

    public function rs_detail_slip($id)
	{
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['single_slip'] = $this->Itnhs->show_item_slip_id($id);
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->data['all_type'] = $this->Itnhs->show_type();
      //  $this->data['all_item_slip_id'] = $this->Itnhs->show_item_slip_id();
        $this->load->view('insert_rs_detail_slip.php', $this->data);
	}

    public function show_rs_detail()
	{
        $this->data['item'] = $this->Itnhs->show_item();
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->data['all_type'] = $this->Itnhs->show_type();
		$this->load->view('show_rs_detail.php', $this->data);
	}

    function savedata() 
    {

            $data = array(
            'brand_id' => $this->input->post('brand_id'),
            'category_id' => $this->input->post('category_id'),
            'item_name' => $this->input->post('item_name'),
            'requisition_slip_id' => $this->input->post('requisition_slip_id'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'type_id' => $this->input->post('type_id'),
            'purchase_date' => $this->input->post('purchase_date'),
            'maintenance_due_date' => $this->input->post('maintenance_due_date'),
            'by_user' => $this->input->post('by_user'),
            );

            $this->db->insert('Rs_detail', $data);
            $this->session->set_flashdata('category_success', 'Requisition Slip Detail Added Successfully');
            redirect("Add_Rs_detail/show_rs_detail");
    }

    function show_rs_detail_id($id)
    {

        $this->data['single_item'] = $this->Itnhs->show_item_id($id);
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->load->view('edit_rs_detail.php', $this->data);
    }


    function update_rs_detail_id() 
    
    {
        $id= $this->input->post('id'); 
            $data = array(

            'brand_id' => $this->input->post('brand_id'),
            'category_id' => $this->input->post('category_id'),
            'item_name' => $this->input->post('item_name'),
            'requisition_slip_id' => $this->input->post('requisition_slip_id'),
            'price' => $this->input->post('price'),
            'status' => $this->input->post('status'),
            'type_id' => $this->input->post('type_id'),
            'purchase_date' => $this->input->post('purchase_date'),
            'maintenance_due_date' => $this->input->post('maintenance_due_date'),
            'by_user' => $this->input->post('by_user'),
            );
            
                $this->Itnhs->update_rs_detail_id($id, $data);
                $this->session->set_flashdata('category_success', 'Requisition Slip Deatil Updated Successfully');
                redirect("Add_Rs_detail/show_rs_detail");
 
    }
    function delete_rs_detail($rs_detail_id) {

        $this->db->where('rs_detail_id',$rs_detail_id);
        $this->db->delete('rs_detail'); 
        $this->session->set_flashdata('category_success', 'Requisition Slip Deatil Deleted Successfully');
        redirect("Add_Rs_detail/show_rs_detail");
    }        
}
