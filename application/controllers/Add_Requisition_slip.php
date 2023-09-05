<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_Requisition_slip extends CI_Controller {
    
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
        $this->load->view('insert_requisition_slip.php', $this->data);
	}

    public function insert_requisition_slip($user_id, $request_id)
	{

        $this->data['user'] = $user_id;
        $this->data['request_id'] = $request_id;
        $this->data['all_user'] = $this->user->show_user();
        $this->load->view('insert_requisition_slip_user.php', $this->data);
	}

    public function show_requisition_slip()
	{
        $this->data['requisition_slip'] = $this->Itnhs->show_requisition_slip();
		$this->load->view('show_requisition_slip.php', $this->data);
	}
    public function show_requisition_request()
	{
        $this->data['requisition_slip'] = $this->Itnhs->show_requisition_slip();
        $this->data['rs_detail'] = $this->Itnhs->show_rs_detail();
        $this->load->view('show_requisition_request.php', $this->data);
	}
//for modal
    function get_description_name()
    {
        $id  = $this->input->post('id');
        $this->db->select('*');
        $this->db->from('project_budget_profitability_analysis_description');
        $this->db->where('description_id',$id);
        $query=$this->db->get();

        $row=$query->result_array();

        echo json_encode($row);

    }

    function get_rsById()
    {
        $rs_id = $this->input->post('rs_id');
        $data  =  $this->Itnhs->get_rsById($rs_id);  
        echo json_encode($data);
    }
//for modal
        function action_on_rs_form(){

            $requisition_slip_id = $this->input->post("requisition_slip_id"); echo "<br>";
            $total_approved_amount = $this->input->post("total_amount"); echo "<br>";
            $requisition_slip_name = $this->input->post("requisition_slip_name");
            // exit();
            $status = null;
            if ($this->input->post('approve_rs')) {
                $status = 1;
            }
            elseif ($this->input->post('disapprove_rs')) {
                $status = 2;
            }
            elseif ($this->input->post('revise_rs')) {
                $status = 3;
            }

    $update = array(
      'status'  => $status, 
      'approval_comment' => $this->input->post('approval_comment'), 
      'revise_comment' => $this->input->post('revise_comment') 
    );  
    $this->db->where('requisition_slip_id', $this->input->post('requisition_slip_id'));
    $this->db->update('requisition_slip', $update);
    $receiver_name = "Murtaza";
    $body = null;
    $subject = null;
    if($status == 1){
        $body = "One of your Requisition Slip has been Approved";
        $subject = "Requisition Slip Approved - ITNHS";
    }
    // elseif($status == 2){
    //     $body = "One of your Requisition Slip has been Disapproved";
    //     $subject = "Requisition Slip Disapproved - ITNHS";
    // }elseif($status == 3){
    //     $body = "One of your Requisition Slip has been Revised";
    //     $subject = "Requisition Slip Revised - ITNHS";
    // }
    if($status == 1){
    $from_email = "itnhs@iriswebserver.com";
         $to_email = "farrukh@iriscommunications.com.pk";
         // $to_email = $this->input->post('email');
         //Load email library
         $this->load->library('email');
         $config = array();
$config['protocol'] = 'smtp';
$config['smtp_crypto'] = 'ssl';
$config['smtp_host'] = 'mail.iriswebserver.com';
$config['smtp_user'] = 'itnhs@iriswebserver.com';
$config['smtp_pass'] = 'Airforce*77';
$config['smtp_port'] = 465;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['priority'] = '1';
$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from($from_email, 'ITNHS');
         // $this->email->to(['ebrahim@iriscommunications.com.pk','ajmal@iriscommunications.com.pk']);
         $this->email->to($to_email);
         $this->email->subject($subject);
         $data_email = array(
          'userName'=> $receiver_name,
          'body'=> $body,
          'requisition_slip_name' => $requisition_slip_name,
          'total_approved_amount' => $total_approved_amount,
              );
         $message = $this->load->view('requisition_approved_email.php',$data_email,TRUE);         
         $this->email->message($message);
     //     $this->email->message('Dear Farrukh');
         if($this->email->send()){
          //    echo "Success";
          $this->session->set_flashdata('category_successs', 'Email Sent Successfully');
         }else{
             echo "Invalid";
         }
        }

    $this->session->set_flashdata('category_success', 'updated Successfully');
    redirect("Add_Requisition_slip/show_requisition_request");

}

    function savedata() 
    {

            $data = array(
            'user_id' => $this->input->post('user_id'),
            'requisition_slip_description' => $this->input->post('requisition_slip_description'),
            'project_code' => $this->input->post('project_code'),
            'request_id' => $this->input->post('request_id'),
            //'quantity' => $this->input->post('quantity'),
            //'price' => $this->input->post('price'),
            //'status' => $this->input->post('status'),
            //'approvel_comment' => $this->input->post('approvel_comment'),
            //'revise_comment' => $this->input->post('revise_comment'),
            'by_user' => $this->input->post('by_user'),
            );
            //var_dump($data);exit();
            $this->db->insert('requisition_slip', $data);
            $request_id = $this->input->post('request_id');
            $data2 = array(
                'request_status' => 6,
                );
            $this->db->where('request_id' , $request_id);
            $this->db->update('request', $data2);
            $this->session->set_flashdata('category_success', 'Requisition Slip Added Successfully');
            redirect("Add_Requisition_slip/show_requisition_slip");
    }

    function show_requisition_slip_by_request_id($id)
    {

        $this->data['show_requisition_slip_by_request_id'] = $this->Itnhs->show_requisition_slip_by_request_id($id);
        $this->data['show_request_by_id'] = $this->Itnhs->show_request_by_id($id);
        $this->data['all_user'] = $this->user->show_user();
        $this->load->view('show_requisition_slip_by_request.php', $this->data);
    }

    function show_requisition_slip_id($id)
    {

        $this->data['single_requisition_slip'] = $this->Itnhs->show_requisition_slip_id($id);
        $this->data['all_user'] = $this->user->show_user();
        $this->load->view('edit_requisition_slip.php', $this->data);
    }

    function update_requisition_slip_id() 
    
    {
        $id= $this->input->post('id'); 
            $data = array(

                //'user_id' => $this->input->post('user_id'),
                'requisition_slip_description' => $this->input->post('requisition_slip_description'),
                'project_code' => $this->input->post('project_code'),
               // 'quantity' => $this->input->post('quantity'),
               // 'price' => $this->input->post('price'),
               // 'status' => $this->input->post('status'),
               // 'approvel_comment' => $this->input->post('approvel_comment'),
               // 'revise_comment' => $this->input->post('revise_comment'),
                'by_user' => $this->input->post('by_user'),
            );
           
            
                $this->Itnhs->update_requisition_slip_id($id, $data);
                $this->session->set_flashdata('category_success', 'Requisition Slip Updated Successfully');
                redirect("Add_Requisition_slip/show_requisition_slip");
 
    }
    function delete_requisition_slip($requisition_slip_id) {

        $this->db->where('requisition_slip_id',$requisition_slip_id);
        if($this->db->delete('requisition_slip') == TRUE){ 
        $this->session->set_flashdata('category_success', 'Requisition Slip Deleted Successfully');
        }else{
            $this->session->set_flashdata('category_success', 'Can not delete due to bla bla');
        }
        redirect("Add_Requisition_slip/show_requisition_slip");
    }        
}
