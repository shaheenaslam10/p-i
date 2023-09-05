<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Request extends CI_Controller {
    
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
        $this->data['all_user'] = $this->user->show_user();
        $this->load->view('insert_request.php', $this->data);
	}

    public function show_request()
	{
        $this->data['request'] = $this->Itnhs->show_request();
        $this->data['request_type'] = $this->Itnhs->show_request_type();
        $this->data['all_user'] = $this->user->show_user();
		$this->load->view('show_request.php', $this->data);
	}

    public function show_employee_request()
	{
        $this->data['employee_request'] = $this->Itnhs->show_employee_request();
        $this->data['all_user'] = $this->user->show_user();
		$this->load->view('show_employee_request.php', $this->data);
	}

    public function show_requestlm()
	{
        $this->data['requestlm'] = $this->Itnhs->show_requestlm();
        $this->data['all_user'] = $this->user->show_user();
		$this->load->view('show_requestlm.php', $this->data);
	}

    function savedata() 
    {
            
            $data = array(
            'request_description' => $this->input->post('request_description'),
            'user_id' => $this->input->post('user_id'),
            'request_status' => $this->input->post('request_status'),
            'department_id' => $this->input->post('department_id'),
            'user_linemanager_id' => $this->input->post('user_linemanager_id'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('request', $data);
            $this->session->set_flashdata('category_success', 'Request Added Successfully');
            redirect("Add_Request/show_employee_request");
        
    }
    function savetype() 
    {

            $request_id = $this->input->post('request_id');
            $data = array(
            'request_id' => $request_id,
            'request_type_id' => $this->input->post('request_type_id'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->where('request_id', $request_id);
            $this->db->update('request', $data);

            $request_id = $request_id;
            $data2 = array(
                'request_status' => 4,
                );
            $this->db->where('request_id' , $request_id);
            $this->db->update('request', $data2);
            $this->session->set_flashdata('category_success', 'Request Added Successfully');
            redirect("Add_Allotment/insert2/". $request_id);
        
    }
    function status_accept($request_id) 
    {
            
            $data = array(
            'request_status' => 1,
            );
            $this->db->where('request_id', $request_id);
            $this->db->update('request', $data);
            $this->session->set_flashdata('category_success', 'Request Added Successfully');
            redirect("Add_Request/show_requestlm");
    }

    function status_reject($request_id) 
    {
            
            $data = array(
            'request_status' => 3,
            );
            $this->db->where('request_id', $request_id);
            $this->db->update('request', $data);
            $this->session->set_flashdata('category_success', 'Request Added Successfully');
            redirect("Add_Request/show_requestlm");
        
    }

    function show_request_id($id)
    {

        $data['single_request'] = $this->Itnhs->show_request_id($id);
        $this->load->view('edit_request', $data);
    }

    function update_request_id() 
    {

        $id= $this->input->post('id');
            $data = array(

                'request_name' => $this->input->post('request_name'),
                'by_user' => $this->input->post('by_user'),
                );
            
        $this->Itnhs->update_request_id($id,$data);
        $this->session->set_flashdata('category_success', 'Request Updated Successfully');
        redirect("Add_Request/show_request");
        
    }
    function delete_request($request_id) {

        $this->db->where('request_id',$request_id);
        $this->db->delete('request'); 
        $this->session->set_flashdata('category_success', 'Request Deleted Successfully');
        redirect("Add_Request/show_request");
    }        
}
