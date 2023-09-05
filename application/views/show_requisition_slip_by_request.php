<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All Requisition Slips</title>
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
        <li><a href="<?php echo base_url() . "Add_Requisition_slip" ?>">
        <button class="btn btn-warning">Add New Requisition Slips</button></a></li>
     
        
      </ol>
    </section>
 <div class="col-md-3">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>Requisition Slips</h2>
              <h4>Request By : <?php $show_request_by_id->user_id ;?>
                    (<?php foreach($all_user as $row_user){ 
                        if($row_user["user_id"] == $show_request_by_id->user_id){
                            echo $row_user["u_name"];
                        }
                        }?>)

            </h5>
            </div>
          </div>
 </div>

 <div class="col-md-6">
          <div class="small-box" style="background-color: #F1F3F4;color: #000;">
            <div class="inner">
              <h4>Discription : "<?php echo $show_request_by_id->request_description ;?>"</h5>
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
       <th style="background-color: #E2E2E2;">Description</th>
       <th style="background-color: #E2E2E2;">Status</th>
       <th style="background-color: #E2E2E2;">Approved Comment</th>
       <th style="background-color: #E2E2E2;">Revised Comment</th>
   
       <th style="text-align: center;background-color: #E2E2E2;">Add RS Detail</th>
       <th style="text-align: center;background-color: #E2E2E2;">Add Item Detail</th>
       <th style="text-align: center;background-color: #E2E2E2;">Update</th>
       <th style="text-align: center;background-color: #E2E2E2;">Delete</th>
   
                </tr>
              
                    </thead>
                    <tbody>
        <?php
        $row_count = 1;
             foreach ($show_requisition_slip_by_request_id as $row) {
                $requisition_slip_id = $row['requisition_slip_id'];
                $requisition_slip_name = $row['requisition_slip_description'];
                $status = $row['status'];
                $approval_comment = $row['approval_comment'];
                $revise_comment = $row['revise_comment'];
    
                if ($status == 1) {
                  $status_name = "Approved";
                }
              elseif($status == 2) {
                $status_name = "Disapproved";
              }
              elseif($status == 3) {
                $status_name = "Revised";
              }
              elseif($status == 0) {
                $status_name = "Pending";
              }
                
           ?>
           
           <tr>
            
            <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
            <td style="border: 1px solid #F4F4F4;"><?php echo $requisition_slip_name; ?></td>
            <td style="border: 1px solid #F4F4F4;"><?php echo $status_name; ?></td>
            <td style="border: 1px solid #F4F4F4;"><?php echo $approval_comment; ?></td>
            <td style="border: 1px solid #F4F4F4;"><?php echo $revise_comment; ?></td>
            
            <td style="border: 1px solid #F4F4F4;" align="center"><a href="<?php echo base_url() . "Add_Rs_detail/insert/" . $requisition_slip_id; ?>"><i class="fa fa-plus-square" style="color: blue;font-size: 18px;"></i></a>
              </td>
            <td style="border: 1px solid #F4F4F4;" align="center">
            <?php if ( $status == 1 ) {?> 
            <a href="<?php echo base_url() . "Add_Item/insert_item/" . $requisition_slip_id; ?>"><i class="fa fa-plus-square" style="color: blue;font-size: 18px;"></i></a>
            <?php }?>
            
              </td>
              <td style="border: 1px solid #F4F4F4;" align="center">
              <?php if ( $status == 2 || $status == 3 || $status == 0 ) {?> 
              <a href="<?php echo base_url() . "Add_Requisition_slip/show_requisition_slip_id/" . $requisition_slip_id; ?>">
              <i class="fa fa-pencil" style="color: blue;font-size: 18px;"></i></a>
              <?php }?>
              </td>
               <td style="border: 1px solid #F4F4F4;" align="center">
               <?php if ( $status == 2 ||  $status == 0) {?> 
                <a href="<?php echo base_url() . "Add_Requisition_slip/delete_requisition_slip/" . $requisition_slip_id; ?>" onclick="return confirm('Are you sure?')">
               <i class="fa fa-remove" style="color: red;font-size: 18px;"></i></a>
              <?php }?>
               
              </td>
            </tr>
       <?php $row_count++; } ?>
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
