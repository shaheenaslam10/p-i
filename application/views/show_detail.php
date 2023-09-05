<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All Items</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="<?php echo base_url(); ?>bower_components/bootstrap/dist/css/bootstrap.min.css" type="text/css" rel="stylesheet"/> 

  <link href="<?php echo base_url(); ?>bower_components/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet"/> 
  
  <link href="<?php echo base_url(); ?>bower_components/Ionicons/css/ionicons.min.css" type="text/css" rel="stylesheet"/> 
  
   
   <link href="<?php echo base_url(); ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet"/> 
  
  <link rel="shortcut icon" href="<?php echo base_url('images/title.png'); ?>" type="image/png">
  <link href="<?php echo base_url(); ?>dist/css/AdminLTE.min.css" type="text/css" rel="stylesheet"/> 
  
  
  <link href="<?php echo base_url(); ?>dist/css/skins/_all-skins.min.css" type="text/css" rel="stylesheet"/> 

  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
 
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
        <script>
        //When the page has loaded.
        $( document ).ready(function(){
            $('#message').fadeIn('slow', function(){
               $('#message').delay(5000).fadeOut(); 
            });
        });
        </script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

  <?php include 'top1.php'; ?>
   <aside class="main-sidebar">
  
    <section class="sidebar">
     
      
      
   
     <?php include 'menu1.php'; ?>
    </section>
  
  </aside>


  <div class="content-wrapper">

    <section class="content-header">
       
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() . "Show_Detail" ?>">
        <button class="btn btn-warning">Search New Items</button></a></li>
     
        
      </ol>
    </section>
 <div class="col-md-4">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>Item Name : <?php if(!empty($single_item->item_name)){ echo $single_item->item_name; }else{ echo ""; } ?></h2>
              <h2>Price : <?php if(!empty($single_item->price)){ echo $single_item->price; }else{ echo ""; } ?></h2>
            </div>
          </div>
 </div>
 <div class="col-md-4">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>Purchase Date :<?php if(!empty($single_item->purchase_date)){ echo $single_item->purchase_date; }else{ echo ""; } ?></h2>
              <h2>Maintenance Date : <?php if(!empty($single_item->maintenance_due_date)){ echo $single_item->maintenance_due_date; }else{ echo ""; } ?></h2>
            </div>
          </div>
 </div>
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
         

          <div class="box">
            <div class="box-header">
              <h4 class="box-title" align="center"><?php if ($this->session->flashdata('category_success')) { ?>
                  <div id="message" style="color: #EC722E;display:none;" align="center"> <i class="fa fa-check" style="font-size: 15px;color: green;"></i><b> <?= $this->session->flashdata('category_success') ?></b> </div>
    <?php } ?></h4>
               
               </div>
             
            <div class="box-body table-responsive">
                 <table id="example1" class="table table-condensed table-hover table-responsive">
       
        <thead>

                
        <tr style="color: #215D9B;">
          <th style="text-align: center;background-color: #E2E2E2;">Sr#</th>
          <th style="background-color: #E2E2E2;">Employee Name</th>
          <th style="background-color: #E2E2E2;">Allotment Date</th>
          <th style="background-color: #E2E2E2;">Barcode</th>
        </tr>
              
                    </thead>
                    <tbody>
        <?php
        if (!empty($all_detail)) {
          
        $row_count = 1;
             foreach ($all_detail as $row) {
                $allotment_id = $row['allotment_id'];
                $item_id = $row['item_id'];
                $user_id = $row['user_id'];
                $allotment_date = $row['created_at'];
            
              
                foreach ($all_item as $row_item) {
                    if ($row_item['item_id'] == $item_id) {
                        $item_name = $row_item['item_name'];
                        $price = $row_item['price'];
                        $purchase_date = $row_item['purchase_date'];
                        $maintenance_due_date = $row_item['maintenance_due_date'];
                        
                        break;}}
                     
                  
                foreach ($user as $row_user) {
                    if ($row_user['user_id'] == $user_id) {
                        $u_name = $row_user['u_name'];
                        break;}}                    
                      
                      ?>
           
                  <tr>
            
        <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $u_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $allotment_date; ?></td>
        <td style="border: 1px solid #F4F4F4;"><img src="<?php echo generate_barcode($item_id); ?>" alt="Barcode"></td>
        </tr>
       <?php $row_count++; } }else{ echo ""; } ?>
                </tbody>
                
              </table>
            </div>
         
          </div>
          
        </div>
        
      </div>
     
    </section>
 
  </div>
 
 

 <?php include 'footer.php'; ?>

  
  

        </div>
    <script src="<?php echo base_url(). "bower_components/jquery/dist/jquery.min.js" ?>"></script>

<script src="<?php echo base_url(). "bower_components/bootstrap/dist/js/bootstrap.min.js" ?>"></script>

<script src="<?php echo base_url(). "bower_components/datatables.net/js/jquery.dataTables.min.js" ?>"></script>

<script src="<?php echo base_url(). "bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" ?>"></script>

<script src="<?php echo base_url(). "bower_components/jquery-slimscroll/jquery.slimscroll.min.js" ?>"></script>


<script src="<?php echo base_url(). "bower_components/fastclick/lib/fastclick.js" ?>"></script>

<script src="<?php echo base_url(). "dist/js/adminlte.min.js" ?>"></script>

<script src="<?php echo base_url(). "dist/js/demo.js" ?>"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
