<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class UserModel extends CI_Model {

    function _construct() {
        parent::_construct();
        
        $this->load->database();
    }

    
   
function search_student($search)
    {
    
    $where = '(student_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('student');
$this->db->where($where);
$query = $this->db->get();
return $query->result_array();


    }
    function search_experience($search)
    {
    
    $where = '(student_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('experience');
$this->db->where($where);
$query = $this->db->get();
return $query->result_array();


    }
     function search_ipo($search)
    {
    
    $where = '(student_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('ipo');
$this->db->where($where);
$query = $this->db->get();
return $query->result_array();


    }
     function search_education($search)
    {
    
    $where = '(student_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('education');
$this->db->where($where);
$query = $this->db->get();
return $query->result_array();


    }

    function show_payment($search){
         $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('payment');
$this->db->where($where);
$this->db->where('date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
    function show_payment2($search){
         $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('payment');
$this->db->where($where);
$this->db->where('date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_collection($search){
    $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('collection');
$this->db->where($where);
$this->db->where('date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_collection2($search){
    $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('collection');
$this->db->where($where);
$this->db->where('date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
  
 function show_concent_data($search)
    {
    
    $where = '(patient_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('concent_data');
$this->db->where($where);
$this->db->where('date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();


    }
    function show_concent_data2($search)
    {
    
    $where = '(patient_id ="' . $search . '")';

$this->db->select('*');
$this->db->from('concent_data');
$this->db->where($where);
$this->db->where('date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();


    }
function show_drugs_data($search){
         $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('drugs_data');
$this->db->join('drugs','drugs.drugs_id=drugs_data.drugs_id','inner');
$this->db->where($where);
$this->db->where('drugs_date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
  function show_drugs_data2($search){
         $where = '(patient_id ="' . $search . '")';
$this->db->select('*');
$this->db->from('drugs_data');
$this->db->join('drugs','drugs.drugs_id=drugs_data.drugs_id','inner');
$this->db->where($where);
$this->db->where('drugs_date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
    function show_chief_complaint_data($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('chief_complaint_data');
$this->db->join('chief_complaint','chief_complaint.chief_complaint_id=chief_complaint_data.chief_complaint_id','inner');
$this->db->where($where);
$this->db->where('chief_complaint_date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_chief_complaint_data2($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('chief_complaint_data');
$this->db->join('chief_complaint','chief_complaint.chief_complaint_id=chief_complaint_data.chief_complaint_id','inner');
$this->db->where($where);
$this->db->where('chief_complaint_date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_medical_history_data2($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('medical_history_data');
$this->db->join('medical_history','medical_history.medical_history_id=medical_history_data.medical_history_id','inner');
$this->db->where($where);
$this->db->where('medical_history_date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_medical_history_data($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('medical_history_data');
$this->db->join('medical_history','medical_history.medical_history_id=medical_history_data.medical_history_id','inner');
$this->db->where($where);
$this->db->where('medical_history_date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}


 function show_chart_data($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('chart_data');
$this->db->join('chart','chart.chart_id=chart_data.chart_id','inner');
$this->db->where($where);
$this->db->where('chart_date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
 function show_chart_data2($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('chart_data');
$this->db->join('chart','chart.chart_id=chart_data.chart_id','inner');
$this->db->where($where);
$this->db->where('chart_date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
return $query->result_array();
}
function show_diseases_data($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('diseases_data');
$this->db->join('diseases','diseases.diseases_id=diseases_data.diseases_id','inner');
$this->db->where($where);
$this->db->where('diseases_date', 'CURDATE()', FALSE);
$query = $this->db->get();
return $query->result_array();
}
 function show_diseases_data2($search){

    $where = '(patient_id ="' . $search . '")';

        $this->db->select('*');
$this->db->from('diseases_data');
$this->db->join('diseases','diseases.diseases_id=diseases_data.diseases_id','inner');
$this->db->where($where);
$this->db->where('diseases_date', 'DATE_ADD(CURDATE(), INTERVAL -1 DAY)', FALSE);
$query = $this->db->get();
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
 function show_ipo_id($data){
$this->db->select('*');
$this->db->from('ipo');
$this->db->where('student_id', $data);
$query = $this->db->get();
$result = $query->result();
return $result;
}
function update_patients_id($id,$data){
$this->db->where('patient_id', $id);
$this->db->update('patient', $data);
}

function get_all_ipo(){
    
            $this->db->select('*');
            $query = $this->db->get('ipo');
            return $query->result_array();
    }
  
    


}