<?php 
$dpt = $this->session->userdata['logged_in']['department_id']; 
$role = $this->session->userdata['logged_in']['role']; 
$user_id = $this->session->userdata['logged_in']['user_id']; 
$persons = $this->session->userdata['logged_in']['persons_id'];
$u_name = $this->session->userdata['logged_in']['u_name'];
?> 





<div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/admin.png'); ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo ($this->session->userdata['logged_in']['u_name']); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <?php if($role == '2') {?>  
<ul class="sidebar-menu" data-widget="tree">

  
<li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>System Demographic </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . "Add_Type/show_type" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Inventory Types</a></li>
            <li><a href="<?php echo base_url() . "Add_Request_Type/show_request_type" ?>"><i class="fa fa-circle-o text-aqua"></i> 2) Request Types</a></li>

            <li><a href="<?php echo base_url() . "Add_Category/show_category" ?>"><i class="fa fa-circle-o text-aqua"></i> 3) Inventory Categories</a></li>
              
            <li><a href="<?php echo base_url() . "Add_Brand/show_brand" ?>"><i class="fa fa-circle-o text-aqua"></i> 4) Inventory Brands</a></li>
            
            <!-- <li><a href="<?php //echo base_url() . "Add_Maintenance/show_maintenance" ?>"><i class="fa fa-circle-o text-aqua"></i> 5) Maintenance</a></li> -->

            <li><a href="<?php echo base_url() . "Add_Department/show_department" ?>"><i class="fa fa-circle-o text-aqua"></i> 5) All Departments</a></li>
       
          </ul>
        </li>    
       
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Inventory</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . "Add_Item/show_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) All Item</a></li>

     
          </ul>
        </li>
        
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Operations</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url() . "Add_Request/show_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Requests</a></li>

            <li><a href="<?php echo base_url() . "Add_Requisition_slip/show_requisition_slip" ?>"><i class="fa fa-circle-o text-aqua"></i> 2) Requisition Slip</a></li>
            <li><a href="<?php echo base_url() . "Add_Request/show_requestlm" ?>"><i class="fa fa-circle-o text-aqua"></i> 3) My Employee Requests</a></li>
            <li><a href="<?php echo base_url() . "Add_Request/show_employee_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 4) My Requests</a>
          </li>
          </ul>
        </li>

         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Reports</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="<?php echo base_url() . "Reports/show_report" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) All Inventory Report</a></li>
            <li><a href="<?php echo base_url() . "Add_Allotment/show_alloted_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 2) Alloted Inventory Report</a></li>
            <li><a href="<?php echo base_url() . "Show_Detail/" ?>"><i class="fa fa-circle-o text-aqua"></i> 3) Barcode Search</a></li>

         
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>User Managment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
            <li><a href="<?php echo base_url() . "Add_user/show_user" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Users</a></li>
              
          </ul>
        </li>
        <li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Inventory Detail</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Show_Detail/show_user_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Alloted Inventory</a></li>

 </ul>
</li>
        
         <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              
            <li><a href="<?php echo base_url() . "Add_User/show_user_id/" . $user_id; ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Change Password</a></li>
          </ul>
        </li>
        
      </ul>
<?php } ?>
<?php if($role == '3') {?>
      <ul class="sidebar-menu" data-widget="tree">

              
              <li class="treeview">
               <a href="#">
                 <i class="fa fa-folder"></i> <span>Request</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                 <li><a href="<?php echo base_url() . "Add_Request/show_employee_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) My Requests</a></li>
                 <li><a href="<?php echo base_url() . "Add_Request/show_requestlm" ?>"><i class="fa fa-circle-o text-aqua"></i> 2) Employee Request</a></li>
              
               </ul>
             </li>
             <li class="treeview">
                <a href="#">
                <i class="fa fa-folder"></i> <span>Inventory Detail</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo base_url() . "Show_Detail/show_user_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Alloted Inventory</a></li>

                </ul>
                </li>
             
              <li class="treeview">
               <a href="#">
                 <i class="fa fa-folder"></i> <span>Settings</span>
                 <span class="pull-right-container">
                   <i class="fa fa-angle-left pull-right"></i>
                 </span>
               </a>
               <ul class="treeview-menu">
                   
                 <li><a href="<?php echo base_url() . "Add_User/show_user_id/" . $user_id; ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Change Password</a></li>
               </ul>
             </li>
             
           </ul>
<?php } ?>
<?php if($role == '1') {?>
<ul class="sidebar-menu" data-widget="tree">

              
<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Gernate Request</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Add_Request/show_employee_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Requests</a></li>

 </ul>
</li>
<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Inventory Detail</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Show_Detail/show_user_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Alloted Inventory</a></li>

 </ul>
</li>


<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Settings</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
     
   <li><a href="<?php echo base_url() . "Add_User/show_user_id/" . $user_id; ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Change Password</a></li>
 </ul>
</li>

</ul>
<?php } ?>

<?php if($role == '4') {?>
<ul class="sidebar-menu" data-widget="tree">

              
<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Request</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Add_Request/show_employee_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Show Requests</a></li>
   <li><a href="<?php echo base_url() . "Add_Request/show_requestlm" ?>"><i class="fa fa-circle-o text-aqua"></i> 2) My Employee Requests</a></li>

 </ul>
</li>

<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Requisition Slip</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Add_Requisition_slip/show_requisition_request" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Requisition Slips</a></li>

 </ul>
</li>

<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Inventory Detail</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
   <li><a href="<?php echo base_url() . "Show_Detail/show_user_item" ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Alloted Inventory</a></li>

 </ul>
</li>

<li class="treeview">
 <a href="#">
   <i class="fa fa-folder"></i> <span>Settings</span>
   <span class="pull-right-container">
     <i class="fa fa-angle-left pull-right"></i>
   </span>
 </a>
 <ul class="treeview-menu">
     
   <li><a href="<?php echo base_url() . "Add_User/show_user_id/" . $user_id; ?>"><i class="fa fa-circle-o text-aqua"></i> 1) Change Password</a></li>
 </ul>
</li>

</ul>
<?php }?>