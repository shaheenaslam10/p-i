<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet"/> 
<style> 

input[type=text]:focus {
    background-color: yellow;
   
}
</style>
  
 <link rel="shortcut icon" href="<?php echo base_url('images/title.png'); ?>" type="image/png">
  
  <!-- Font Awesome -->
   <link href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"/> 


  <!-- Ionicons -->
   <link href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css" type="text/css" rel="stylesheet"/> 

  
  <!-- Theme style -->
  <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" type="text/css" rel="stylesheet"/> 

 
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css" type="text/css" rel="stylesheet"/> 
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" style="font-family: calibri;">
    <div class="wrapper">

  <?php include 'top1.php'; ?>
   <aside class="main-sidebar">
  
    <section class="sidebar">
     
      <?php foreach ($single_user as $p): ?>
      
   
     <?php include 'menu1.php'; ?>
    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
       <div class="col-md-3" style="margin-left: -15px;">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2><?php echo $p->u_name; ?></h2>
              <p>Update User</p>
             
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update User</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>
    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_User/update_user_info'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
              <div class="box-body" style="background-color: #ECF0F5;">
               <input type="hidden" name="id" value="<?php echo $p->user_id; ?>">
            
                 <div class="form-group">
                    <label for="fname"><b>User Name</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('username'); ?></b></p></font>
                    </label>
                     <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo $p->username; ?>" class="form-control" name="username" required autofocus="">
                

                     <label for="password"><b>Password</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('password'); ?></b></p></font>
                    </label>
                     <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="password" value="<?php echo $p->password; ?>" class="form-control" name="password" required autofocus="">
                
                     <label for="conform_password"><b>Confirm Password</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('password'); ?></b></p></font>
                    </label>
                     <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="password" value="<?php echo $p->password; ?>" class="form-control" name="confirm_password" required autofocus="">
                


                     <label for="u_name"><b>Employee Name</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('u_name'); ?></b></p></font>
                    </label>
                     <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo $p->u_name; ?>" class="form-control" name="u_name" required autofocus="">
                     
                     <label for="user_linemanager_id">Line Manager</label>
                    <select class="form-control" id="user_linemanager_id" name="user_linemanager_id">
                    
                        <option value="<?php echo $p->user_linemanager_id; ?>" selected><?php 
                             foreach ($all_user as $row_user) { ?> 
                                
                                <?php 
                                if ($p->user_linemanager_id == $row_user["user_id"]) {
                                    echo $row_user["u_name"];
                                }
                                 ?>

                             <?php } ?></option>
                            
                    
                    <?php foreach ($all_user as $row_user) { ?>
                    <option value="<?php echo $row_user["user_id"]; ?>"><?php echo $row_user["u_name"]; ?></option>
                    <?php } ?>
                    </select>

                    <label for="department">Department</label>
                    <select class="form-control" id="department_id" name="department_id">
                    
                        <option value="<?php echo $p->department_id; ?>" selected><?php 
                             foreach ($all_department as $row_department) { ?> 
                                
                                <?php 
                                if ($p->department_id == $row_department["department_id"]) {
                                    echo $row_department["department_name"];
                                }
                                 ?>

                             <?php } ?></option>
                            
                    
                    <?php foreach ($all_department as $row_department) { ?>
                    <option value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["department_name"]; ?></option>
                    <?php } ?>
                    </select>

                    <label for="allow">Active/Inactive</label>
                    <select class="form-control" id="allow" name="allow">
                    <option value="1" <?php echo ($p->allow == "1") ? 'selected' : ''; ?>>Active</option>
                    <option value="0" <?php echo ($p->allow == "0") ? 'selected' : ''; ?>>Inactive</option>
                    </select>

                    <label for="role">Select Role</label>
                    <select class="form-control" id="role" name="role">
                    <option value="1" <?php echo ($p->role == "1") ? 'selected' : ''; ?>>Employee</option>
                    <option value="2" <?php echo ($p->role == "2") ? 'selected' : ''; ?>>ITNHS Administrator</option>
                    <option value="3" <?php echo ($p->role == "3") ? 'selected' : ''; ?>>Line Manager</option>
                    <option value="3" <?php echo ($p->role == "4") ? 'selected' : ''; ?>>ITNHS Line Manager</option>
                    </select>

                    
                    </div>
   
  
            <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
              
                   
              </div>
            

     <button type="submit" style="width: 10%;float: left;" class="btn btn-success">Update</button>
     <a href="<?php echo base_url() . "Add_User/show_user" ?>">
         <button type="button" style="width: 10%;float: left;margin-left: 5%;" class="btn btn-primary">Cancel</button></a>
           
              </div>
       
          </div>
          
        </div>
       
            </form>
    </section>
  
  </div>

 <?php include 'footer.php'; ?>

  <?php endforeach; ?>
  
<script src="<?php echo base_url(). "bower_components/jquery/dist/jquery.min.js" ?>"></script>


<script src="<?php echo base_url(). "bower_components/bootstrap/dist/js/bootstrap.min.js" ?>"></script>



<script src="<?php echo base_url(). "dist/js/adminlte.min.js" ?>"></script>

<script src="<?php echo base_url(). "dist/js/demo.js" ?>"></script>
        </div>
</body>
</html>
