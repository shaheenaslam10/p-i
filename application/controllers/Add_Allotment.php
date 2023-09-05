<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Allotment extends CI_Controller {
    
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
        
	}

    public function insert($id)
	{
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['all_user'] = $this->user->show_user();
        $this->data['item_id'] = $id;
        $this->load->view('insert_allotment.php', $this->data);
        
	}

    public function insert2($id)
	{
        $this->data['all_item'] = $this->Itnhs->show_alloted_item();
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['all_request'] = $this->Itnhs->show_request();
        $this->data['single_request'] = $this->Itnhs->show_request_by_id($id);
        // print_r($this->data['single_request']);
        // exit();
    //  $this->data['user'] = $user_id;
        $this->data['request_id'] = $id;
        $this->load->view('show_allotment.php', $this->data);
        
	}

    public function show_allotment()
	{
        $this->data['allotment'] = $this->Itnhs->show_allotment();
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['all_user'] = $this->user->show_user();
		$this->load->view('show_allotment.php', $this->data);
	}
    public function show_alloted_item()
	{
        $this->data['allotment'] = $this->Itnhs->show_alloted();
        $this->data['all_item'] = $this->Itnhs->show_item();
        $this->data['all_department'] = $this->Itnhs->show_department();
        $this->data['all_user'] = $this->user->show_user();
		$this->load->view('show_alloted_item.php', $this->data);
	}

    public function show_unallotment()
	{
        $this->data['item'] = $this->Itnhs->show_item();
        $this->data['all_brand'] = $this->Itnhs->show_brand();
        $this->data['all_category'] = $this->Itnhs->show_category();
        $this->data['all_requisition_slip_id'] = $this->Itnhs->show_requisition_slip();
        $this->data['all_type'] = $this->Itnhs->show_type();
        $this->data['unallotment'] = $this->Itnhs->show_unallotment();
		$this->load->view('show_unallotment.php', $this->data);
	}

    function savedata() 
    {
            
            $data = array(
            'user_id' => $this->input->post('user_id'),
            'item_id' => $this->input->post('item_id'),
            'type' => $this->input->post('type'),
            'request_id' => $this->input->post('request_id'),
            'by_user' => $this->input->post('by_user'),
       
            );
            $this->db->insert('allotment', $data);

            $item_id = $this->input->post('item_id');
            $data2 = array(
                'status' => 2,
                );
            $this->db->where('item_id' , $item_id);
            $this->db->update('item', $data2);

            $request_id = $this->input->post('request_id');
            $data2 = array(
                'request_status' => 5,
                );
            $this->db->where('request_id' , $request_id);
            $this->db->update('request', $data2);
            $this->session->set_flashdata('category_success', 'Allotment Added Successfully');
            redirect($_SERVER['HTTP_REFERER']);
           // redirect("Add_Request/show_request");
        
            }

    function show_allotment_id($id)
    {

        $data['single_allotment'] = $this->Itnhs->show_allotment_id($id);
        $this->load->view('edit_allotment', $data);
    }

    function update_allotment_id() 
    {

       
            $data = array(

                'allotment_name' => $this->input->post('allotment_name'),
                'by_user' => $this->input->post('by_user'),
                );
                
                $this->Itnhs->update_allotment_id($id,$data);
                $this->session->set_flashdata('category_success', 'Allotment Updated Successfully');
                redirect("Add_Allotment/show_allotment");
        
    }
    function delete_allotment($allotment_id) {

        $this->db->where('allotment_id',$allotment_id);
        $this->db->delete('allotment'); 
        $this->session->set_flashdata('category_success', 'Allotment Deleted Successfully');
        redirect("Add_Allotment/show_allotment");
    }        
}
