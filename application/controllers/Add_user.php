<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_User extends CI_Controller {
    
     public function __construct(){
        parent::__construct();
        if($this->session->userdata('logged_in'))
    {
      $session_data = $this->session->userdata('logged_in');
      $data['username'] = $session_data['username'];
      $this->load->library('form_validation');
      $this->load->model("user");
      $this->load->model("Itnhs");
        
    }
    else
    {
    redirect('login', 'refresh');
    }
    }

	  public function index()
	  {
      $this->data['user'] = $this->user->show_user();
      $this->data['all_user'] = $this->user->show_user();
      $this->data['all_department'] = $this->Itnhs->show_department();
      $this->load->view('insert_user.php', $this->data);
	  }
    
    public function show_user()
    {
      $this->data['user'] = $this->user->show_user();
      $this->data['department'] = $this->Itnhs->show_department();
      $this->load->view('show_user.php', $this->data);
    }

    function savedata() 
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        $this->form_validation->set_rules('username','User Name','unique[user.username]');

        if($this->form_validation->run()== FALSE)
        {
            $this->load->view('insert_user');
        } 
        else 
        {
            $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'u_name' => $this->input->post('u_name'),
            'user_linemanager_id' => $this->input->post('user_linemanager_id'),
            'department_id' => $this->input->post('department_id'),
            'allow' => $this->input->post('allow'),
            'role' => $this->input->post('role'),

            'by_user' => $this->input->post('by_user'),
            );
            $this->db->insert('user', $data);
            $this->session->set_flashdata('category_success', 'User Added Successfully');
            redirect("Add_user/show_user");
        }
    }
    
    function show_user_id($id) {
      $data['single_user'] = $this->user->show_user_id($id);
      $this->load->view('edit_user', $data);
    }
    
    function show_user_info($id) {
      $this->data['single_user'] = $this->user->show_user_id($id);
      $this->data['all_department'] = $this->Itnhs->show_department(); 
      $this->data['all_user'] = $this->user->show_user(); 
      $this->load->view('edit_user_info', $this->data);
    }
    function update_user_id() {
      $user_id = $this->input->post('user_id');
      $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
      
      if($this->form_validation->run()== FALSE){
        $this->show_user_id($user_id);
      }else {
        $data = array(
          'password' => $this->input->post('password'),
        );
        $this->user->update_user_id($user_id,$data);
        $this->session->set_flashdata('category_success', 'Password Updated Successfully');
        redirect("ITNHS");
      }   
    }
    function update_user_info() 
    {

        $id= $this->input->post('id'); 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>'); // Displaying Errors in Div
        //$this->form_validation->set_rules('username','User Name','unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');

        if($this->form_validation->run()== FALSE){
        $this->show_user_info($id);
        }else
        {
          $data = array(
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'u_name' => $this->input->post('u_name'),
            'user_linemanager_id' => $this->input->post('user_linemanager_id'),
            'department_id' => $this->input->post('department_id'),
            'allow' => $this->input->post('allow'),
            'role' => $this->input->post('role'),
            'by_user' => $this->input->post('by_user'),
            );
            $this->db->where('user_id', $id);
            $this->db->update('user', $data);
            $this->session->set_flashdata('category_success', 'User Update Successfully');
            redirect("Add_user/show_user");
        }
    }
    
    function delete_user($user_id) {
      $this->db->where(user_id,$user_id);
      $this->db->delete('user'); 
      $this->session->set_flashdata('category_success', 'User Deleted Successfully');
      redirect("Add_User/show_user");
      }            
}
