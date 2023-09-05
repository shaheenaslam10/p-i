<?php
class examination_model extends CI_Model{

    function allow(){
  $this->db->select("*"); 
  $this->db->from('user');
  $query = $this->db->get();
  return $query->result();
 }
    
    
function show_patients(){
$this->db->select('*');
$this->db->from('patient');

$this->db->join('user','user.user_id=patient.user_id','union');
$this->db->where('checked','0');
$query=$this->db->get();
return $query->result_array();
}

function show_patients2(){
$this->db->select('*');
$this->db->from('patient');

$this->db->join('user','user.user_id=patient.user_id','union');
$this->db->where('checked','1');
$query=$this->db->get();
return $query->result_array();
}

function show_medical_data($data){
$this->db->select('*');
$this->db->from('medical_history_data');
$this->db->join('medical_history','medical_history.medical_history_id=medical_history_data.medical_history_id','inner');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_registration_date_data($data){
$this->db->select('*');
$this->db->from('registration_date');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_education_data($data){
$this->db->select('*');
$this->db->from('education');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_source_data($data){
$this->db->select('*');
$this->db->from('source');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_ipo_data($data){
$this->db->select('*');
$this->db->from('ipo');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_experience_data($data){
$this->db->select('*');
$this->db->from('experience');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_attachment_data($data){
$this->db->select('*');
$this->db->from('attachment');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_preference_data($data){
$this->db->select('*');
$this->db->from('preference');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_diseases_data($data){
$this->db->select('*');
$this->db->from('diseases_data');
$this->db->join('diseases','diseases.diseases_id=diseases_data.diseases_id','inner');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

function show_chief_complaint_data($data){
$this->db->select('*');
$this->db->from('chief_complaint_data');
$this->db->join('chief_complaint','chief_complaint.chief_complaint_id=chief_complaint_data.chief_complaint_id','inner');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}

function show_chart_data($data){
$this->db->select('*');
$this->db->from('chart_data');
$this->db->join('chart','chart.chart_id=chart_data.chart_id','inner');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_concent_data($data){
$this->db->select('*');
$this->db->from('concent_data');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_drugs_data($data){
$this->db->select('*');
$this->db->from('drugs_data');
$this->db->join('drugs','drugs.drugs_id=drugs_data.drugs_id','inner');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_payment($data){
$this->db->select('*');
$this->db->from('payment');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_collection($data){
$this->db->select('*');
$this->db->from('collection');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function show_daily_collection(){
   
$this->db->select('*');
$this->db->from('collection');
$this->db->where('date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_total_collection(){
   
$this->db->select('*');
$this->db->from('collection');
$query = $this->db->get();
return $query->result_array();
}
function show_user_details(){
$CI = &get_instance();
$this->db2 = $CI->load->database('database2', TRUE);
$this->db2->select('*');
$this->db2->from('users');
$query = $this->db2->get();
return $query->result_array();
}
function show_questionnaire_details(){
$this->db->select('*');
$this->db->from('capi_results');
$query = $this->db->get();
return $query->result_array();
}
function show_split_details(){
$this->db->select('*');
$this->db->from('split');
$query = $this->db->get();
return $query->result_array();
}

function show_weekly_collection(){
   
$this->db->select('*');
$this->db->from('collection');
$this->db->or_where('YEARWEEK(date)', 'YEARWEEK(NOW())', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_yearly_collection(){
   
$this->db->select('*');
$this->db->from('collection');
 
$this->db->or_where('YEAR(date)', 'YEAR(CURDATE())', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_monthly_collection(){
   
$this->db->select('*');
$this->db->from('collection');
 
$this->db->or_where('MONTH(date)', 'MONTH(CURDATE())', FALSE);
$query = $this->db->get();
return $query->result_array();
}

function show_single_day($search)
    {
    
    $where = '(date ="' . $search . '")';

$this->db->select('*');
$this->db->from('collection');
$this->db->where($where);
$query = $this->db->get();
return $query->result_array();

    }
    
    function search($start_date , $end_date ){

$this->db->select('*');
$this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
$this->db->from('collection');
$query = $this->db->get();
return $query->result_array();
}
  
function show_patient_id($data){
$this->db->select('*');
$this->db->from('patient');
$this->db->where('patient_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
// Update Query For Selected Student

function update_device_no($id,$data2){
$this->db->where('device_no', $id);
$this->db->update('device', $data2);
}
      function get_all_medical_history(){
    
            $this->db->select('*');
            $query = $this->db->get('medical_history');
            return $query->result_array();
    }
  function get_all_drugs(){
    
            $this->db->select('*');
            $query = $this->db->get('drugs');
            return $query->result_array();
    }
    function get_all_diseases(){
    
            $this->db->select('*');
            $query = $this->db->get('diseases');
            return $query->result_array();
    }
    function get_all_chief_complaint(){
    
            $this->db->select('*');
            $query = $this->db->get('chief_complaint');
            return $query->result_array();
    }
    function get_all_chart(){
    
            $this->db->select('*');
            $query = $this->db->get('chart');
            return $query->result_array();
    }
    function get_all_staff(){
    
            $this->db->select('*');
            $query = $this->db->get('user');
            return $query->result_array();
    }

}
?>