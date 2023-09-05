<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Maintenance</title>
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
              <h2>Add Maintenance</h2>
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add Maintenance</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>

    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_Maintenance/savedata'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
              <div class="box-body" style="background-color: #ECF0F5;">
              
            
                 <div class="form-group col-md-12">
                    <div class="form-group col-md-4">
                    <label for="item">Item Name</label>
                    <select class="form-control" id="item_id" name="item_id"  required autofocus="">
                    <option value="" disabled selected>Choose Item</option>
                    <?php foreach ($item as $row_item) { ?>
                    <option value="<?php echo $row_item["item_id"]; ?>"><?php echo $row_item["item_name"]; ?></option>
                    <?php } ?>
                    </select>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group col-md-4">
                    <label for="comment"><b>Comment</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('comment'); ?></b></p></font>
                    </label>
                    <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('comment'); ?>" class="form-control" name="comment">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="cost"><b>Sale Price</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('cost'); ?></b></p></font>
                    </label>
                    <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('cost'); ?>" class="form-control" name="cost" required autofocus="">
                    </div>
                   
                </div>
                    <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
                    <input type="hidden" value="0" class="form-control" name="requisition_slip_id" required>
           </div>
             <div class="box-footer" style="background-color: #ECF0F5;">
             <button type="submit" style="width: 20%;float: left;" class="btn btn-success">Submit </button>
             <a href="<?php echo base_url() . "Add_Maintenance/show_maintenance" ?>">
             <button type="button" style="width: 20%;float: left;margin-left: 5%;" class="btn btn-primary">Cancel</button></a>
              </div>
          </div>
       
          </div>
          
        </div>
       
            </form>
    </section>
  
  </div>

 <?php include 'footer.php'; ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script src="<?php echo base_url(). "bower_components/jquery/dist/jquery.min.js" ?>"></script>


<script src="<?php echo base_url(). "bower_components/bootstrap/dist/js/bootstrap.min.js" ?>"></script>



<script src="<?php echo base_url(). "dist/js/adminlte.min.js" ?>"></script>

<script src="<?php echo base_url(). "dist/js/demo.js" ?>"></script>
        </div>
</body>
</html>
