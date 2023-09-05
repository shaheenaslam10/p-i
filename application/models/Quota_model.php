<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quota_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
      
function gender(){
$this->db->select('*');
$query = $this->db->get('quota_gender');
return $query->result_array();
}
   
 function show_gender_id($data){
$this->db->select('*');
$this->db->from('quota_gender');
$this->db->where('qgender_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_gender_id($id,$data){
$this->db->where('qgender_id', $id);
$this->db->update('quota_gender', $data);
}

function city(){
$this->db->select('*');
$query = $this->db->get('quota_city');
return $query->result_array();
}
    
 function show_city_id($data){
$this->db->select('*');
$this->db->from('quota_city');
$this->db->where('qcity_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_city_id($id,$data){
$this->db->where('qcity_id', $id);
$this->db->update('quota_city', $data);
}
function province(){
$this->db->select('*');
$query = $this->db->get('quota_province');
return $query->result_array();
}
    
 function show_province_id($data){
$this->db->select('*');
$this->db->from('quota_province');
$this->db->where('qprovince_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_province_id($id,$data){
$this->db->where('qprovince_id', $id);
$this->db->update('quota_province', $data);
}
function age(){
$this->db->select('*');
$query = $this->db->get('quota_age');
return $query->result_array();
}
    
 function show_age_id($data){
$this->db->select('*');
$this->db->from('quota_age');
$this->db->where('qage_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_age_id($id,$data){
$this->db->where('qage_id', $id);
$this->db->update('quota_age', $data);
}
function panel_type(){
$this->db->select('*');
$query = $this->db->get('quota_panel_type');
return $query->result_array();
}
    
 function show_panel_type_id($data){
$this->db->select('*');
$this->db->from('quota_panel_type');
$this->db->where('qpanel_type_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_panel_type_id($id,$data){
$this->db->where('qpanel_type_id', $id);
$this->db->update('quota_panel_type', $data);
}

function panel(){
$this->db->select('*');
$query = $this->db->get('quota_panel');
return $query->result_array();
}
    
 function show_panel_id($data){
$this->db->select('*');
$this->db->from('quota_panel');
$this->db->where('qpanel_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_panel_id($id,$data){
$this->db->where('qpanel_id', $id);
$this->db->update('quota_panel', $data);
}
function sec(){
$this->db->select('*');
$query = $this->db->get('quota_sec');
return $query->result_array();
}
    
 function show_sec_id($data){
$this->db->select('*');
$this->db->from('quota_sec');
$this->db->where('qsec_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_sec_id($id,$data){
$this->db->where('qsec_id', $id);
$this->db->update('quota_sec', $data);
}
function usership(){
$this->db->select('*');
$query = $this->db->get('quota_usership');
return $query->result_array();
}

 function show_usership_id($data){
$this->db->select('*');
$this->db->from('quota_usership');
$this->db->where('qusership_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_usership_id($id,$data){
$this->db->where('qusership_id', $id);
$this->db->update('quota_usership', $data);
}
function brand(){
$this->db->select('*');
$query = $this->db->get('quota_brand');
return $query->result_array();
}
    
 function show_brand_id($data){
$this->db->select('*');
$this->db->from('quota_brand');
$this->db->where('qbrand_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_brand_id($id,$data){
$this->db->where('qbrand_id', $id);
$this->db->update('quota_brand', $data);
}
function variant(){
$this->db->select('*');
$query = $this->db->get('quota_variant');
return $query->result_array();
}
    
 function show_variant_id($data){
$this->db->select('*');
$this->db->from('quota_variant');
$this->db->where('qvariant_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_variant_id($id,$data){
$this->db->where('qvariant_id', $id);
$this->db->update('quota_variant', $data);
}
}
