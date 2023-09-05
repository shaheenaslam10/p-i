<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Item</title>
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
              <h2>Add Item</h2>
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add Item</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>

    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_Item/savedata'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
              <div class="box-body" style="background-color: #ECF0F5;">
              
            
                 <div class="form-group col-md-12">

                    <label for="brand">Brand</label>
                    <select class="form-control" id="brand_id" name="brand_id"  required autofocus="">
                    <option value="" disabled selected>Choose Brand</option>
                    <?php foreach ($all_brand as $row_brand) { ?>
                    <option value="<?php echo $row_brand["brand_id"]; ?>"><?php echo $row_brand["brand_name"]; ?></option>
                    <?php } ?>
                    </select>

                    <label for="category">Category</label>
                    <select class="form-control" id="category_id" name="category_id" required="">
                    <option value="1" disabled selected>Choose category</option>
                    <?php foreach ($all_category as $row_category) { ?>
                    <option value="<?php echo $row_category["category_id"]; ?>"><?php echo $row_category["category_name"]; ?></option>
                    <?php } ?>
                    </select>

                    <label for="item_name"><b>Item Name</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('item_name'); ?></b></p></font>
                    </label>
                    <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('item_name'); ?>" class="form-control" name="item_name">


                   

                    

                    <label for="price"><b>Price</b>
                    <font color="red"><p style="font-size: 8px;"><b>
                    <?php echo form_error('price'); ?></b></p></font>
                    </label>
                    <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('price'); ?>" class="form-control" name="price" required autofocus="">

                    
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                    <option value="1">Registered</option>
                    <option value="2">Alloted</option>
                    <option value="3">Maintenance</option>
                    <option value="4">Retired</option>
                    </select>

                    <label for="type">Type</label>
                    <select class="form-control" id="type_id" name="type_id">
                    <option value="1" disabled selected>Choose Type</option>
                    <?php foreach ($all_type as $row_type) { ?>
                    <option value="<?php echo $row_type["type_id"]; ?>"><?php echo $row_type["type_name"]; ?></option>
                    <?php } ?>
                    </select>

                    <br>
                    <div class="col-md-4">
                    <label for="purchase_date"><b>Purchase Date</b></label>
                    
                    <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="" required autofocus>
                    </div>
                    <div class="col-md-4">
                    <label for="maintenance_due_date"><b>Maintenance Due Date</b></label>
                    
                    <input type="date" class="form-control" data-mask id="maintenance_due_date" name="maintenance_due_date" value="" required autofocus>
                    </div>
                </div>
                    <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
                    <input type="hidden" value="0" class="form-control" name="requisition_slip_id" required>
           </div>
             <div class="box-footer" style="background-color: #ECF0F5;">
             <button type="submit" style="width: 20%;float: left;" class="btn btn-success">Add New Item</button>
             <a href="<?php echo base_url() . "Add_Item/show_item" ?>">
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
