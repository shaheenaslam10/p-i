<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All Requests (Pending)</title>
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
        <li><a href="<?php echo base_url() . "Add_Request" ?>">
        <button class="btn btn-warning">Add New Requests</button></a></li>
     
        
      </ol>
    </section>
 <div class="col-md-3">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>All Requests (Pending)</h2>
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
        <th style="background-color: #E2E2E2;">Request Description</th>
        <th style="background-color: #E2E2E2;">Status</th>
        <th style="background-color: #E2E2E2;">Requisition Slips</th>
        <th style="background-color: #E2E2E2;">Assigne Job Type</th>
        <th style="text-align: center;background-color: #E2E2E2;">Action</th>
        
      </tr>
    </thead>
  <tbody>
        <?php
        $row_count = 1;
             foreach ($request as $row) {
                $request_id = $row['request_id'];
                $user_id = $row['user_id'];
                $request_description = $row['request_description'];
                $request_status = $row['request_status'];
                $request_type_id = $row['request_type_id'];
                foreach ($all_user as $row_user) {
                  if ($row_user['user_id'] == $user_id) {
                      $u_name = $row_user['u_name'];
                      break;}}

                

                if ($request_status == 1) {
                  $status = "Approved By Line Manager";
                }
                elseif($request_status == 2) {
                $status = "Pending By Line Manager";
                }
                elseif($request_status == 3) {
                $status = "Rejected By Line Manager";
                }    
                elseif($request_status == 4) {
                $status = "In Process";
                }    
                elseif($request_status == 5) {
                $status = "Completed";
                }    
                elseif($request_status == 6) {
                $status = "Requisition Slip Generated ";
                }    
                   
           ?>
           
                <?php if ($request_status == 1 || $request_status == 4 || $request_status == 6 ) {?>   
                
        <tr>    
        <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $u_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $request_description; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $status; ?></td>
        <td style="border: 1px solid #F4F4F4;">
        <?php if ( $request_status == 6 ) {?> 
        <a href="<?php echo base_url() . "Add_Requisition_slip/show_requisition_slip_by_request_id/" . $request_id; ?>"><button class="btn btn-warning">Show Relevant R.S</button></a>
        <?php }?>
        </td>

      

        <form action="<?php echo base_url('Add_Request/savetype') ?>" method="POST">
          <td style="border: 1px solid #F4F4F4;" >
          <select class="form-control" id="type_id" name="request_type_id" required="">
            <?php if(!empty($request_type_id)){ ?>
          <option selected value="<?php echo $request_type_id; ?>"><?php 
                             foreach ($request_type as $row_request_type) { ?> 
                                <?php 
                                if ($request_type_id == $row_request_type["request_type_id"]) {
                                    echo $row_request_type["request_type_name"];
                                }
                                 ?>

                             <?php } ?></option><?php } else{ ?>
                          <option value=""> Select Job Type </option> <?php } ?>
        <?php foreach($request_type as $row_request_type){?>
          
          <option value="<?php if(!empty($row_request_type["request_type_id"])){ echo $row_request_type["request_type_id"]; } ?>"><?php if(!empty($row_request_type["request_type_name"])){ echo $row_request_type["request_type_name"]; } ?></option>
        <?php } ?>
                      
        </td>
        
        <td style="border: 1px solid #F4F4F4;" align="center">
        <?php if ( $request_status == 6 ) {?> 
        <a href="<?php echo base_url() . "Add_Allotment/insert2/" . $request_id; ?>"><button type="button"><i class="fa fa-external-link" style="color: green;font-size: 18px;"></i></button></a>
        
        <?php }else{?>  

        <button type="submit"><i class="fa fa-external-link" style="color: green;font-size: 18px;"></i></button>
        <?php } ?>

        </td>
        
        
        
        <input type="hidden" name="request_id" value="<?php echo $request_id ?>"> 
        <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
      </form>


        </tr>
        <?php   $row_count++;  }else{ ?>
          <tr>    
        <!-- <td style="text-align: center;border: 1px solid #F4F4F4;"></td>
        <td style="border: 1px solid #F4F4F4;"></td>
        <td style="border: 1px solid #F4F4F4;"></td>
        <td style="border: 1px solid #F4F4F4;"></td>
        <td style="border: 1px solid #F4F4F4;" align="center"></td>
        <td style="border: 1px solid #F4F4F4;" align="center"></td>
        <td style="border: 1px solid #F4F4F4;" align="center"></td> -->
        </tr>
        <?php } ?>
       <?php  } ?>
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
