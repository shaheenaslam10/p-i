<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff extends CI_Model {
    public function __construct() {
        parent::__construct();
        
        $this->load->database();
    }
    
    
    
    function interview_results(){
$this->db->select('*');
$this->db->order_by('HINT_NAME','asc');
$query = $this->db->get('it_interview_core');
return $query->result_array();
}

 function show_department(){
$this->db->select('*');
$this->db->order_by('department_name', 'asc');
$query = $this->db->get('department');
return $query->result_array();
}

function interview_details($id){
$this->db->select('*');
$this->db->from('it_interview_core');
$this->db->where('_URI', $id);
$query = $this->db->get();
$result = $query->result();
return $result;
}
    
    function show_tables_data(){
    $this->db->select('*');
$this->db->from('distributions'); 
$this->db->join('sequence', 'sequence.id = distributions.sequence_id', 'left');
$this->db->join('products', 'sequence.product_id=products.product_no');
$this->db->join('regions', 'sequence.region_id=regions.id');
$this->db->order_by('distributions.id','asc');         
$query = $this->db->get(); 
if($query->num_rows() != 0){
   return $query->result_array();
} else {    
   return false;
}
    
    
    
    
    function show_project(){
$this->db->select('*');
$this->db->order_by('projects_id','desc');
$this->db->where('project_code_its >','0');
$query = $this->db->get('projects');
return $query->result_array();
}
   function show_project_with_status_open(){
$this->db->select('*');
$this->db->order_by('projects_id','desc');
$this->db->where('project_code_its !=','0');
$this->db->where('status_master','0');
$query = $this->db->get('projects');
return $query->result_array();
}
   function show_project_with_status(){

       $this->db->select('*');
$this->db->where('status_master', '0');
$this->db->where('project_code_its >','0');
$this->db->order_by('projects_id','desc');
$query = $this->db->get('projects');
return $query->result_array();
}

function show_project_id($data){
$this->db->select('*');
$this->db->from('projects');
$this->db->where('project_code_its', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_equipment_request_id($data){
$this->db->select('*');
$this->db->from('equipment_request');
$this->db->where('equipment_request_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_project_join_it(){
$this->db->select('*');
$this->db->from('projects');
$this->db->join('it_requests','it_requests.project_code_its=projects.project_code_its','inner');
$query=$this->db->get();
return $query->result_array();
}
function show_dis_ordered(){
$this->db->select('*');
$this->db->from('projects');
$this->db->join('it_requests','it_requests.project_code_its=projects.project_code_its','inner');
$this->db->order_by('status','asc');
$query=$this->db->get();
return $query->result_array();
}
function show_dis_ordered_status_wise(){
$this->db->select('*');
$this->db->from('projects');
$this->db->join('it_requests','it_requests.project_code_its=projects.project_code_its','inner');
$this->db->where('status', 0);
$this->db->order_by('status','asc');
$query=$this->db->get();
return $query->result_array();
}
function show_project_code_its($data){
$this->db->select('*');
$this->db->from('projects');
$this->db->where('project_code_its', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_project_id($id,$data){
$this->db->where('projects_id', $id);
$this->db->update('projects', $data);
}
function show_project_equipment(){
$this->db->select('*');
$this->db->order_by('equipment_request_id','desc');
$query = $this->db->get('equipment_request');
return $query->result_array();
}
function show_equipment_id($data){
$this->db->select('*');
$this->db->from('equipment_request');
$this->db->where('equipment_request_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_equipment_id($id,$data){
$this->db->where('equipment_request_id', $id);
$this->db->update('equipment_request', $data);
}
function show_project_it(){
$this->db->select('*');
$query = $this->db->get('it_requests');
return $query->result_array();
}
function show_it_requests_comments(){
$this->db->select('*');
$query = $this->db->get('it_requests_comments');
return $query->result_array();
}
function show_it_request_id($data){
$this->db->select('*');
$this->db->from('it_requests');
$this->db->where('it_requests_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_it_request_id($id,$data2){
$this->db->where('it_requests_id', $id);
$this->db->update('it_requests', $data2);
}
function show_project_documents(){
$this->db->select('*');
$this->db->order_by('project_documents_id','desc');
$query = $this->db->get('project_documents');
return $query->result_array();
}
function show_project_documents_id($data){
$this->db->select('*');
$this->db->from('project_documents');
$this->db->where('project_documents_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_project_documents_id($id,$data){
$this->db->where('project_documents_id', $id);
$this->db->update('project_documents', $data);
}






function show_project_cities(){
$this->db->select('*');
$query = $this->db->get('project_cities');
return $query->result_array();
}
function show_project_cities_id($data){
$this->db->select('*');
$this->db->from('project_cities');
$this->db->where('project_cities_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_project_cities_id($id,$data){
$this->db->where('project_cities_id', $id);
$this->db->update('project_cities', $data);
}



function show_department_id($id){
   $this->db->select('*');
   $this->db->from('department');
   $this->db->where('department_id', $id);
   $query = $this->db->get();
   $result = $query->result();
   return $result;
   }

function update_department_id($id,$data){
$this->db->where('department_id', $id);
$this->db->update('department', $data);
}  
function show_ms_data(){
$this->db->select('*');
$query = $this->db->get('videos_mcb');
return $query->result_array();
}
    
function show_client(){
$this->db->select('*');
$this->db->order_by('client_name','asc');
$query = $this->db->get('clients');
return $query->result_array();
}
  function show_client_id($data){
$this->db->select('*');
$this->db->from('clients');
$this->db->where('clients_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_client_id($id,$data){
$this->db->where('clients_id', $id);
$this->db->update('clients', $data);
}  

function update_equipment_request_id($id,$data2){
$this->db->where('equipment_request_id', $id);
$this->db->update('equipment_request', $data2);
}  
 function show_person(){
$this->db->select('*');
$this->db->order_by('person_name','asc');
$query = $this->db->get('persons');
return $query->result_array();
}
  function show_person_id($data){
$this->db->select('*');
$this->db->from('persons');
$this->db->where('persons_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_person_id($id,$data){
$this->db->where('persons_id', $id);
$this->db->update('persons', $data);
}     







    
        function get_all_designation(){
    
            $this->db->select('*');
            $query = $this->db->get('staff_designation');
            return $query->result_array();
    }
    
    
        function get_all_reference(){
    
            $this->db->select('*');
            $query = $this->db->get('staff_reference');
            return $query->result_array();
    }
    
        function get_all_staff(){
    
            $this->db->select('*');
            $query = $this->db->get('user');
            return $query->result_array();
    
        }
         function get_all_staff_doctors(){
    
            $this->db->select('*');
            $this->db->where('allow', 2);
            $query = $this->db->get('user');
            return $query->result_array();
    
        }
        
         function get_all_designation2(){
    
            $this->db->select('*');
            $query = $this->db->get('staff_designation');
            return $query->result_array();
    
        }
        
        function show_drugs(){
$this->db->select('*');
$this->db->order_by('name', 'ASC');
$query = $this->db->get('drugs');

return $query->result_array();
}
  function show_used(){
$this->db->select('*');
$this->db->select_sum('quantity');
$this->db->group_by("drugs_id");
$this->db->where('ifelse', 1);
$query = $this->db->get('drugs_data');
return $query->result_array();
}
function show_drugs_id($data){
$this->db->select('*');
$this->db->from('drugs');
$this->db->where('drugs_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_drugs_id($id,$data){
$this->db->where('drugs_id', $id);
$this->db->update('drugs', $data);
}





function show_chief_complaint(){
$this->db->select('*');
$query = $this->db->get('chief_complaint');
return $query->result_array();
}
function show_chief_complaint_id($data){
$this->db->select('*');
$this->db->from('chief_complaint');
$this->db->where('chief_complaint_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_chief_complaint_id($id,$data){
$this->db->where('chief_complaint_id', $id);
$this->db->update('chief_complaint', $data);
}



function show_staff_designation(){
$this->db->select('*');
$query = $this->db->get('staff_designation');
return $query->result_array();
}
function show_employee(){
$this->db->select('*');
$query = $this->db->get('employee');
return $query->result_array();
}
function show_staff_designation_id($data){
$this->db->select('*');
$this->db->from('staff_designation');
$this->db->where('designation_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_staff_designation_id($id,$data){
$this->db->where('designation_id', $id);
$this->db->update('staff_designation', $data);
}



function show_diseases(){
$this->db->select('*');
$query = $this->db->get('diseases');
return $query->result_array();
}
function show_diseases_id($data){
$this->db->select('*');
$this->db->from('diseases');
$this->db->where('diseases_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_diseases_id($id,$data){
$this->db->where('diseases_id', $id);
$this->db->update('diseases', $data);
}


function show_drugs_category(){
$this->db->select('*');
$query = $this->db->get('drugs_category');
return $query->result_array();
}
function show_drugs_category_id($data){
$this->db->select('*');
$this->db->from('drugs_category');
$this->db->where('drugs_category_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_drugs_category_id($id,$data){
$this->db->where('drugs_category_id', $id);
$this->db->update('drugs_category', $data);
}



function show_medical_history(){
$this->db->select('*');
$query = $this->db->get('medical_history');
return $query->result_array();
}
function show_medical_history_id($data){
$this->db->select('*');
$this->db->from('medical_history');
$this->db->where('medical_history_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_medical_history_id($id,$data){
$this->db->where('medical_history_id', $id);
$this->db->update('medical_history', $data);
}
function show_company(){
$this->db->select('*');
$query = $this->db->get('company');
return $query->result_array();
}
function show_company_id($data){
$this->db->select('*');
$this->db->from('company');
$this->db->where('c_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_company_id($id,$data){
$this->db->where('c_id', $id);
$this->db->update('company', $data);
}

function show_device_id2($data){
$this->db->select('*');
$this->db->from('device');
$this->db->where('device_no', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_device(){
  $this->db->select("*"); 
  $this->db->from('device');
  $query = $this->db->get();
  return $query->result();
 }
 function show_device_options(){
    $this->db->select('*');
     $this->db->order_by('device_no','asc');
     $this->db->where('assigned !=','1');
    $query = $this->db->get('device');
    return $query->result_array();
 }
 function show_device_data(){
    $this->db->select('*');
    $query = $this->db->get('device_data');
    return $query->result_array();
 }
 function show_dispatch_data(){
    $this->db->distinct();
    $this->db->group_by("dispatch_no");
    $query = $this->db->get('device_data');
    return $query->result_array();
 }
 function show_adapter_data(){
    $this->db->distinct();
     $this->db->select('*');
    $this->db->select_sum('adapter_no');
    $this->db->group_by("persons_id");
    $query = $this->db->get('adapter_data');
    return $query->result_array();
 }
   function show_adapter_data_project_wise(){
    $this->db->distinct();
     $this->db->select('*');
    $this->db->select_sum('adapter_no');
    $this->db->group_by("project_code_its");
    $query = $this->db->get('adapter_data');
    return $query->result_array();
 }
  function show_cable_data(){
    $this->db->distinct();
     $this->db->select('*');
    $this->db->select_sum('cable_no');
    $this->db->group_by("person_id");
    $query = $this->db->get('cable_data');
    return $query->result_array();
 }
  function show_dispatch_data_details($dispatch_no){
    $this->db->select('*');
    $this->db->where('dispatch_no', $dispatch_no);
    $this->db->order_by('device_no', 'ASC');
    $query = $this->db->get('device_data');
    return $query->result_array();
 }
 function show_dispatch_data_details2($dispatch_no){
$this->db->select('*');
$this->db->from('device_data');
$this->db->where('dispatch_no', $dispatch_no);
$this->db->where('assigned', '1');
$query=$this->db->get();
return $query->result_array();
}
 function show_dispatch_data_details2_adapters($dispatch_no){
$this->db->select('*');
$this->db->from('adapter_data');
$this->db->where('dispatch_no', $dispatch_no);
$this->db->group_by('dispatch_no');
$query=$this->db->get();
return $query->result_array();
}
function show_device_id($data){
$this->db->select('*');
$this->db->from('user');
$this->db->where('user_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_device_id($id,$data){
$this->db->where('user_id', $id);
$this->db->update('user', $data);
}





function show_code(){
$this->db->select('*');
$query = $this->db->get('code');
return $query->result_array();
}
function show_code_id($data){
$this->db->select('*');
$this->db->from('code');
$this->db->where('code_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_code_id($id,$data){
$this->db->where('code_id', $id);
$this->db->update('code', $data);
}
function show_uni(){
$this->db->select('*');
$query = $this->db->get('uni');
return $query->result_array();
}
function show_uni_id($data){
$this->db->select('*');
$this->db->from('uni');
$this->db->where('uni_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_uni_id($id,$data){
$this->db->where('uni_id', $id);
$this->db->update('uni', $data);
}
function show_panel(){
$this->db->select('*');
$query = $this->db->get('quota_panel');
return $query->result_array();
}
function show_panel_type(){
$this->db->select('*');
$query = $this->db->get('quota_panel_type');
return $query->result_array();
}
function show_province(){
$this->db->select('*');
$query = $this->db->get('quota_province');
return $query->result_array();
}
function show_city(){
$this->db->select('*');
$query = $this->db->get('quota_city');
return $query->result_array();
}
function show_age(){
$this->db->select('*');
$query = $this->db->get('quota_age');
return $query->result_array();
}
function show_sec(){
$this->db->select('*');
$query = $this->db->get('quota_sec');
return $query->result_array();
}
function show_variant(){
$this->db->select('*');
$query = $this->db->get('quota_variant');
return $query->result_array();
}
function show_gender(){
$this->db->select('*');
$query = $this->db->get('quota_gender');
return $query->result_array();
}

function show_sql_2(){
$this->db2 = $this->load->database('db2',TRUE);
$this->db2->select('*');
$query = $this->db2->get('connection');
return $query->result_array();
}
function show_sql_1(){

$this->db->select('*');
$query = $this->db->get('user');
return $query->result_array();
}
function show_usership(){
$this->db->select('*');
$query = $this->db->get('quota_usership');
return $query->result_array();
}
function show_brand(){
$this->db->select('*');
$query = $this->db->get('quota_brand');
return $query->result_array();
}

  function show_quota_project(){
$this->db->select('*');
$query = $this->db->get('quota_projects');
return $query->result_array();
}  
  
function show_quota_project_id($data){
$this->db->select('*');
$this->db->from('quota_projects');
$this->db->where('qprojects_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_quota_project_id($id,$data){
$this->db->where('qprojects_id', $id);
$this->db->update('quota_projects', $data);
}

function show_person_id_details($dispatch_no){
$this->db->select('*');
$this->db->from('device_data');
$this->db->where('dispatch_no', $dispatch_no);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_project_id_details($dispatch_no){
$this->db->select('*');
$this->db->from('device_data');
$this->db->where('dispatch_no', $dispatch_no);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_project_id_details_limit($dispatch_no){
$this->db->select('*');
$this->db->from('device_data');
$this->db->where('dispatch_no', $dispatch_no);
$this->db->limit(1);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_course(){
$this->db->select('*');
$query = $this->db->get('course');
return $query->result_array();
}
function show_interview(){
$this->db->select('*');
$query = $this->db->get('interview');
return $query->result_array();
}
function show_course_id($data){
$this->db->select('*');
$this->db->from('course');
$this->db->where('course_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_course_id($id,$data){
$this->db->where('course_id', $id);
$this->db->update('course', $data);
}
function show_student(){
$this->db->select('*');
$query = $this->db->get('student');
return $query->result_array();
}
function show_student_id($data){
$this->db->select('*');
$this->db->from('student');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_student_id($id,$data){
$this->db->where('student_id', $id);
$this->db->update('student', $data);
}
function show_staff_ref(){
$this->db->select('*');
$query = $this->db->get('staff_reference');
return $query->result_array();
}
function show_staff_ref_id($data){
$this->db->select('*');
$this->db->from('staff_reference');
$this->db->where('ref_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_staff_ref_id($id,$data){
$this->db->where('ref_id', $id);
$this->db->update('staff_reference', $data);
}
function show_quota_panel(){
$this->db->select('*');
$query = $this->db->get('quota_panel');
return $query->result_array();
} 
  
  function show_device_1(){
$this->db->select('*');
$this->db->where('assigned', '1');
$query = $this->db->get('device_data');
return $query->result_array();
}

     function show_adapters_1(){
$this->db->select('*');
$query = $this->db->get('adapter_data');
return $query->result_array();
}

}}
