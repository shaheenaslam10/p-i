<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add User</title>
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
     
      
      
   
     <?php include 'menu1.php'; ?>
    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
        <div class="col-md-3" style="margin-left: -15px;">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>Add User</h2>
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add User</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>

    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_User/savedata'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
              <div class="box-body" style="background-color: #ECF0F5;">
              <div class="form-group">
                <label for="fname"><b>Username</b>
                <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('username'); ?></b></p></font>
                </label>
                <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('username'); ?>" class="form-control" name="username" required autofocus="">

                <label for="password"><b>Password</b>
                <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('password'); ?></b></p></font>
                </label>
                <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="password" value="<?php echo set_value('password'); ?>" class="form-control" name="password" required autofocus="">

                <label for="uname"><b>Employee Name</b>
                <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('u_name'); ?></b></p></font>
                </label>
                <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('u_name'); ?>" class="form-control" name="u_name" required autofocus="">

                <label for="user_linemanager_id">Line Manager</label>
                <select class="form-control" id="user_linemanager_id" name="user_linemanager_id">
                <option value="1" disabled selected>Choose Line Manager</option>
                <?php foreach ($all_user as $row_user) { ?>
                <option value="<?php echo $row_user["user_id"]; ?>"><?php echo $row_user["u_name"]; ?></option>
                <?php } ?>
                </select>

                <label for="department">Department</label>
                <select class="form-control" id="department_id" name="department_id">
                <option value="1" disabled selected>Choose Department</option>
                <?php foreach ($all_department as $row_department) { ?>
                <option value="<?php echo $row_department["department_id"]; ?>"><?php echo $row_department["department_name"]; ?></option>
                <?php } ?>
                </select>

                <label for="allow">Active/Inactive</label>
                <select class="form-control" id="allow" name="allow">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
                </select>

                <label for="role">Selest Role</label>
                <select class="form-control" id="role" name="role">
                <option value="1">Employee</option>
                <option value="2">ITNHS Amintrator</option>
                <option value="3">Line Manager</option>
                <option value="4">ITNHS Line Manager</option>
                </select>

                
            </div>

            <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
        </div>
        <div class="box-footer" style="background-color: #ECF0F5;">
        <button type="submit" style="width: 20%;float: left;" class="btn btn-success">Add New User</button>
        <a href="<?php echo base_url() . "Add_User/show_user" ?>">
        <button type="button" style="width: 20%;float: left;margin-left: 5%;" class="btn btn-primary">Cancel</button></a>
    </div>
</div>
</div>
</div>
</form>
    </section>
  
  </div>

 <?php include 'footer.php'; ?>

  
  
<script src="<?php echo base_url(). "bower_components/jquery/dist/jquery.min.js" ?>"></script>


<script src="<?php echo base_url(). "bower_components/bootstrap/dist/js/bootstrap.min.js" ?>"></script>



<script src="<?php echo base_url(). "dist/js/adminlte.min.js" ?>"></script>

<script src="<?php echo base_url(). "dist/js/demo.js" ?>"></script>
        </div>
</body>
</html>
