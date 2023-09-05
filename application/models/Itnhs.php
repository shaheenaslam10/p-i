<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Itnhs extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }


//Show


    function show_department(){
        $this->db->select('*');
        $this->db->order_by('department_name', 'DESC');
        $query = $this->db->get('department');
        return $query->result_array();
        }

    function show_brand(){
        $this->db->select('*');
        $this->db->order_by('brand_name', 'DESC');
        $query = $this->db->get('brand');
        return $query->result_array();
        }
    
    function show_category(){
        $this->db->select('*');
        $this->db->order_by('category_name', 'DESC');
        $query = $this->db->get('category');
        return $query->result_array();
        }
    
    function show_type(){
        $this->db->select('*');
        $this->db->order_by('type_name', 'DESC');
        $query = $this->db->get('type');
        return $query->result_array();
        }

    function show_request_type(){
        $this->db->select('*');
        $this->db->order_by('request_type_name', 'DESC');
        $query = $this->db->get('request_type');
        return $query->result_array();
        }

    function show_item(){
        $this->db->select('*');
        $this->db->order_by('item_name', 'DESC');
        $query = $this->db->get('item');
        return $query->result_array();
        }

        function show_item_by_id($item_id){
            $this->db->select('*');
            $this->db->where('item_id', $item_id);
            $query = $this->db->get('item');
            return $query->row();
            }
 
    function show_requisition_slip(){
        $this->db->select('*');
        $this->db->order_by('requisition_slip_id', 'DESC');
        $query = $this->db->get('requisition_slip');
        return $query->result_array();
        }

    function show_rs_detail(){
        $this->db->select('*');
        $this->db->order_by('rs_detail_id', 'DESC');
        $query = $this->db->get('rs_detail');
        return $query->result_array();
        }
    
    function show_request(){
        $this->db->select('*');
        $this->db->order_by('request_id', 'DESC');
        $query = $this->db->get('request');
        return $query->result_array();
        }
    
    function show_request_by_id($request_id){
        $this->db->select('*');
        $this->db->order_by('request_id', 'DESC');
        $this->db->where('request_id', $request_id);
        $query = $this->db->get('request');
        return $query->row();
        }    
    function show_requisition_slip_by_request_id($id){
        $this->db->select('*');
        $this->db->order_by('request_id', 'DESC');
        $this->db->where('request_id', $id);
        $query = $this->db->get('requisition_slip');
        return $query->result_array();
        }    

    function show_requestlm(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->select('*');
        $this->db->order_by('request_id', 'DESC');
        $this->db->from('request');
        $this->db->where('user_linemanager_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
        }
    function show_employee_request(){
        $user_id = $this->session->userdata['logged_in']['user_id'];
        $this->db->select('*');
        $this->db->order_by('request_id', 'DESC');
        $this->db->from('request');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        return $query->result_array();
        }

    function show_maintenance(){
        $this->db->select('*');
        $this->db->order_by('maintenance_id', 'DESC');
        $query = $this->db->get('maintenance');
        return $query->result_array();
        }
    
    function show_allotment(){
        $this->db->select('*');
        $this->db->from('allotment');
        $this->db->where('type', '2');
        $query = $this->db->get();
        return $query->result_array();
        }

    function show_alloted(){
        $this->db->select('*');
        $this->db->from('allotment');
        $query = $this->db->get();
        return $query->result_array();
        }

    function show_unallotment(){
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->result_array();
        }
    
    function show_alloted_item(){
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('status', '1');
        $query = $this->db->get();
        return $query->result_array();
        }

    function show_detail($data){
        $this->db->select('*');
        $this->db->from('allotment');
        $this->db->where('item_id', $data);
        $query = $this->db->get();
        return $query->result_array();
        }

// Show_id
function get_rsById($id){
    $this->db->select('*');
    $this->db->from('requisition_slip');
    $this->db->join('rs_detail', 'rs_detail.requisition_slip_id = requisition_slip.requisition_slip_id');
    $this->db->where('requisition_slip.requisition_slip_id', $id);
    $query  = $this->db->get();
    $result = $query->result_array();
    return $result;
    } 

    function show_department_id($data){
        $this->db->select('*');
        $this->db->from('department');
        $this->db->where('department_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }

    function show_brand_id($data){
        $this->db->select('*');
        $this->db->from('brand');
        $this->db->where('brand_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }

    function show_category_id($data){
        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }

    function show_type_id($data){
        $this->db->select('*');
        $this->db->from('type');
        $this->db->where('type_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

        }
    function show_request_type_id($data){
        $this->db->select('*');
        $this->db->from('request_type');
        $this->db->where('request_type_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }

    function show_item_id($data){
        $this->db->select('*');
        $this->db->from('item');
        $this->db->where('item_id', $data);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
        }

    function show_requisition_slip_id($data){
        $this->db->select('*');
        $this->db->order_by('requisition_slip_id', 'DESC');
        $this->db->from('requisition_slip');
        $this->db->where('requisition_slip_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }
    
    function show_rs_detail_slip_id($data){
        $this->db->select('*');
        $this->db->from('requisition_slip');
        $this->db->where('requisition_slip_id', $data);
        $query = $this->db->get();
        $result = $query->row();
        return $result;
        }
    function show_user_item($user_id){
        $this->db->select('*');
        $this->db->from('allotment');
        $this->db->where('user_id', $user_id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
        }

    function show_rs_detail_id($data){
        $this->db->select('*');
        $this->db->from('rs_detail');
        $this->db->where('rs_detail_id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
        }
    function show_rs_detail_by_id($id){
        $this->db->select('*');
        $this->db->from('rs_detail');
        $this->db->where('requisition_slip_id', $id);
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
        }
    
    
   //Update_     
    function update_department_id($department_id,$data){

        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data);
        }

    function update_brand_id($brand_id,$data){

        $this->db->where('brand_id', $brand_id);
        $this->db->update('brand', $data);
        }

    function update_category_id($category_id,$data){

        $this->db->where('category_id', $category_id);
        $this->db->update('category', $data);
        }

    function update_type_id($type_id,$data){

        $this->db->where('type_id', $type_id);
        $this->db->update('type', $data);
        }
    function update_request_type_id($request_type_id,$data){

        $this->db->where('request_type_id', $request_type_id);
        $this->db->update('request_type', $data);
        }

    function update_item_id($item_id,$data){

        $this->db->where('item_id', $item_id);
        $this->db->update('item', $data);
        }

    function update_requisition_slip_id($requisition_slip_id,$data){

        $this->db->where('requisition_slip_id', $requisition_slip_id);
        $this->db->update('requisition_slip', $data);
        }

    function update_rs_detail_id($rs_detail_id,$data){

        $this->db->where('rs_detail_id', $rs_detail_id);
        $this->db->update('rs_detail', $data);
        }

    
	
}
?>