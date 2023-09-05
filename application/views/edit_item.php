<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update Item</title>
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
              <h2><?php echo $single_item->item_name; ?></h2>
              <h5><?php echo $single_item->requisition_slip_id; ?></h5>
              <p>Update Item</p>
             
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Update Item</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>
    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_Item/update_item_id'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
              <div class="box-body" style="background-color: #ECF0F5;">
               <input type="hidden" name="id" value="<?php echo $single_item->item_id; ?>">
            
                 
               <div class="form-group col-md-12">

                        <label for="brand">Brand</label>
                        <select class="form-control" id="brand_id" name="brand_id" disabled>
                        <option value="<?php echo $single_item->brand_id; ?>" selected><?php 
                             foreach ($all_brand as $row_brand) { ?> 
                                
                                <?php 
                                if ($single_item->brand_id == $row_brand["brand_id"]) {
                                    echo $row_brand["brand_name"];
                                }
                                 ?>

                             <?php } ?></option>
                            
                    
                    <?php foreach ($all_brand as $row_brand) { ?>
                    <option value="<?php echo $row_brand["brand_id"]; ?>"><?php echo $row_brand["brand_name"]; ?></option>
                    <?php } ?>
                    </select>

                        <label for="category">Category</label>
                        <select class="form-control" id="category_id" name="category_id" disabled>
                        <option value="<?php echo $single_item->category_id; ?>" selected><?php 
                             foreach ($all_category as $row_category) { ?> 
                                
                                <?php 
                                if ($single_item->category_id == $row_category["category_id"]) {
                                    echo $row_category["category_name"];
                                }
                                 ?>

                             <?php } ?></option>
                            
                    
                    <?php foreach ($all_category as $row_category) { ?>
                    <option value="<?php echo $row_category["category_id"]; ?>"><?php echo $row_category["category_name"]; ?></option>
                    <?php } ?>
                    </select>

                        <label for="item_name"><b>Item Name</b>
                        <font color="red"><p style="font-size: 8px;"><b>
                        <?php echo form_error('item_name'); ?></b></p></font>
                        </label>
                        <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" disabled value="<?php echo $single_item->item_name ; ?>" class="form-control" name="item_name" required autofocus="">


                        

                        <label for="price"><b>Price</b>
                        <font color="red"><p style="font-size: 8px;"><b>
                        <?php echo form_error('price'); ?></b></p></font>
                        </label>
                        <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" disabled value="<?php echo $single_item->price; ?>" class="form-control" name="price" required autofocus="">

                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status">
                        <option value="1" <?php echo ($single_item->status == "1") ? 'selected' : ''; ?>>Registered</option>
                        <option value="2" <?php echo ($single_item->status == "2") ? 'selected' : ''; ?>>Alloted</option>
                        <option value="3" <?php echo ($single_item->status == "3") ? 'selected' : ''; ?>>Maintenance</option>
                        <option value="4" <?php echo ($single_item->status == "4") ? 'selected' : ''; ?>>Retired</option>
                        </select>
                        
                        <label for="type_id">Type</label>
                        <select class="form-control" id="type_id" name="type_id">
                        <option value="<?php echo $single_item->type_id; ?>" selected><?php 
                             foreach ($all_type as $row_type) { ?> 
                                
                                <?php 
                                if ($single_item->type_id == $row_type["type_id"]) {
                                    echo $row_type["type_name"];
                                }
                                 ?>

                             <?php } ?></option>
                            
                    
                    <?php foreach ($all_type as $row_type) { ?>
                    <option value="<?php echo $row_type["type_id"]; ?>"><?php echo $row_type["type_name"]; ?></option>
                    <?php } ?>
                    </select>

                        <br>
                        <div class="col-md-4">
                        <label for="purchase_date"><b>Purchase Date</b></label>

                        <input type="date" class="form-control" id="purchase_date" name="purchase_date" disabled value="<?php echo $single_item->purchase_date ; ?>" required autofocus>
                        </div>
                        <div class="col-md-4">
                        <label for="maintenance_due_date"><b>Maintenance Due Date</b></label>

                        <input type="date" class="form-control" data-mask id="maintenance_due_date" name="maintenance_due_date" value="<?php echo $single_item->maintenance_due_date ; ?>" required autofocus>
                        </div>
                    </div>
                        <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
                        <input type="hidden" value="<?php echo $single_item->requisition_slip_id; ?>" class="form-control" name="requisition_slip_id" required>
                </div>
            
 
     <button type="submit" style="width: 10%;float: left;" class="btn btn-success">Update</button>
     <a href="<?php echo base_url() . "Add_Item/show_item" ?>">
         <button type="button" style="width: 10%;float: left;margin-left: 5%;" class="btn btn-primary">Cancel</button></a>
           
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
