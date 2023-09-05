<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coder extends CI_Controller {
    
     public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];

      $this->load->model("staff");
        
    }
    else
    {
    redirect('login', 'refresh');
    }
    }

	public function index()
	{
               
                $this->data['code'] = $this->staff->show_code();
		$this->load->view('show_code.php', $this->data);
	}
         public function show_code()
	{
               
                $this->data['code'] = $this->staff->show_code();
		$this->load->view('show_code.php', $this->data);
	}
	
		function savedata(){
                    

        $data = array(
            
            'code_id' => $this->input->post('code_id'),
            'code1' => $this->input->post('code1'),
            'code2' => $this->input->post('code2'),
            'code3' => $this->input->post('code3'),
            'code4' => $this->input->post('code4'),
            'code5' => $this->input->post('code5'),
            'code6' => $this->input->post('code6'),
            'code7' => $this->input->post('code7'),
            'code8' => $this->input->post('code8'),
            'code9' => $this->input->post('code9'),
            'code10' => $this->input->post('code10'),
            'code11' => $this->input->post('code11'),
            'code12' => $this->input->post('code12'),
            'code13' => $this->input->post('code13'),
            'code14' => $this->input->post('code14'),
            'code15' => $this->input->post('code15')
            
            
		);
		$this->db->insert('code', $data);
		$this->session->set_flashdata('category_success', 'Device Added Successfully');
                redirect("Coder/show_code");
                
		
                
               


}

function show_code_id() {
$id = $this->uri->segment(3);
$data['single_code'] = $this->staff->show_code_id($id);
$this->load->view('edit_code', $data);
}
function update_code_id() {
$id= $this->input->post('id');
$data = array(
         
           
           'code1' => $this->input->post('code1'),
            'code2' => $this->input->post('code2'),
            'code3' => $this->input->post('code3'),
            'code4' => $this->input->post('code4'),
            'code5' => $this->input->post('code5'),
            'code6' => $this->input->post('code6'),
            'code7' => $this->input->post('code7'),
            'code8' => $this->input->post('code8'),
            'code9' => $this->input->post('code9'),
            'code10' => $this->input->post('code10'),
            'code11' => $this->input->post('code11'),
            'code12' => $this->input->post('code12'),
            'code13' => $this->input->post('code13'),
            'code14' => $this->input->post('code14'),
            'code15' => $this->input->post('code15')
            
        
);
$this->staff->update_code_id($id,$data);
$this->session->set_flashdata('category_success', 'Device Updated Successfully');
redirect("Coder/show_code");
}   
function delete_code($code_id) {

$this->db->where(code_id,$code_id);
$this->db->delete('code'); 
$this->session->set_flashdata('category_success', 'Device Deleted Successfully');
redirect("Coder/show_code");
}            
}
