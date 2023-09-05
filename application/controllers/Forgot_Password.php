<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot_Password extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user");
        $this->load->library('form_validation');
        
    }
    function forgot_password() {
		$this->load->view('forgot_password');

}

function send_email() {
    $email = $this->input->post("username");
    $this->data["password"] = $this->user->show_password($email);
    $check = $this->data["password"];
    if(!empty($check)){
    $password = $this->data["password"]->password;
    $name = $this->data["password"]->u_name;
    $receiver_name = $name;
    $body = "Your Password is: ";
    $subject = "ITHNS - Forgot Password";
    
    $from_email = "ithns@iriswebserver.com";
         $to_email = $email;
         // $to_email = $this->input->post('email');
         //Load email library
         $this->load->library('email');
         $config = array();
$config['protocol'] = 'smtp';
$config['smtp_crypto'] = 'ssl';
$config['smtp_host'] = 'mail.iriswebserver.com';
$config['smtp_user'] = 'ithns@iriswebserver.com';
$config['smtp_pass'] = 'Airforce*77';
$config['smtp_port'] = 465;
$config['mailtype'] = 'html';
$config['charset'] = 'utf-8';
$config['priority'] = '1';
$this->email->initialize($config);
$this->email->set_newline("\r\n");
$this->email->from($from_email, 'ITHNS');
         // $this->email->to(['ebrahim@iriscommunications.com.pk','ajmal@iriscommunications.com.pk']);
         $this->email->to($to_email);
         $this->email->subject($subject);
         $data_email = array(
          'userName'=> $receiver_name,
          'body'=> $body,
          'password' => $password,
              );
         $message = $this->load->view('forgot_password_email.php',$data_email,TRUE);         
         $this->email->message($message);
     //     $this->email->message('Dear Farrukh');
         if($this->email->send()){
          //    echo "Success";
          $this->session->set_flashdata('category_successs', 'Email Sent Successfully');
         }else{
             echo "Invalid";
         }
         redirect("login");
}else{
    $this->data["error_email"] = "Email not found!";
    $this->load->view("forgot_password", $this->data);
}


}
    
}
