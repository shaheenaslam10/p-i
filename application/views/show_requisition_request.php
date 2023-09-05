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
        <script type="text/javascript">
      
        base_url    = '<?php echo base_url(); ?>';
        baseurl     = '<?php echo base_url(); ?>';
    
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
        <!-- <li><a href="<?php //echo base_url() . "Add_Requisition_slip" ?>">
        <button class="btn btn-warning">Add New Requisition Slips</button></a></li> -->
     
        
      </ol>
    </section>
 <div class="col-md-3">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>All Requisition Slips</h2>
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
       <th style="text-align: center;background-color: #E2E2E2;">Check Rs Detail</th>

   
                </tr>
              
                    </thead>
                    <tbody>
        <?php
        $row_count = 1;
             foreach ($requisition_slip as $row) {
                $requisition_slip_id = $row['requisition_slip_id'];
                $requisition_slip_name = $row['requisition_slip_description'];
                $status = $row['status'];

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
          
        <td style="border: 1px solid #F4F4F4;" class="text-center"> 
                    <a href="#" class="rs_view" title="View Requisition Slip Detail" style="color: orange;" rs_id = "<?php echo $row['requisition_slip_id']; ?>"><i class="fa fa-wpforms fa-2x" aria-hidden="true"></i> </a>
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

 <div class="modal fade" id="view_rs_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div  class="row">
          <div class="box-body table-responsive">

            
              
              
            <table id="requisition_slip_tbl" class="table table-condensed table-hover table-responsive" style="">
       
                <thead>
               <tr style="color: #215D9B;">
               <th style="text-align: center;background-color: #E2E2E2;">Description</th>
               <th style="background-color: #E2E2E2; text-align: center;">Qty</th>
               <th style="background-color: #E2E2E2;text-align: center;">Rate</th>
               <th style="background-color: #E2E2E2;text-align: center;">Amount</th>
                </tr>
                    </thead>
                    <tbody >
                      
                </tbody>
                <tfoot>
                  <tr>
                  <th style="text-align: center;background-color: #E2E2E2;">-</th>
                  <th style="text-align: center;background-color: #E2E2E2;">-</th>
                  <th style="text-align: center;background-color: #E2E2E2;">-</th>
                  <th style="text-align: center;background-color: #E2E2E2;" id="amount_tot"></th>
                  </tr>
                </tfoot>
              </table>
              
              
              
   
            </div>
        </div>
          
<?php
// $user_feature_permitted = 998;
// $user_feature_permitted2 = 999;

// foreach ($show_user_own_allowed_features_for_viewfiles as $row){
// $user_wise_allowed_features = $row['system_features_id'];
// if (strpos($user_wise_allowed_features, 13) == TRUE) {
// $user_feature_permitted = 'OK';
// }elseif($user_wise_allowed_features == 13){
// $user_feature_permitted2 = 'OK2';  
// }
// }
// if($user_feature_permitted == 'OK' || $user_feature_permitted2 == 'OK2'){
?>            
          
          
        <form method="post" action="<?php echo site_url('Add_Requisition_slip/action_on_rs_form'); ?>" enctype="multipart/form-data">
        <div class="row box-body">
        <label for="">Approvel Comment</label>
           <textarea rows="5" class="form-control" name="approval_comment" placeholder="Enter Your Comment ..." ></textarea>
           <label for="">Revised Comment</label>
           <textarea rows="5" class="form-control" name="revise_comment" placeholder="Enter Your Comment ..." ></textarea>
         </div>
      <div class="modal-footer">
        <div class="row">
      
        <input type="hidden" name="requisition_slip_id" id="requisition_id" value="" />
        <input type="hidden" name="total_amount" id="req_total_amount" value="" />
        <input type="hidden" name="requisition_slip_name" value="<?php echo $requisition_slip_name; ?>" />

        <input type="submit" class="btn btn-success" name="approve_rs" value="Approve" onclick="return confirm('Are you sure?')" >
        <input type="submit" class="btn btn-danger"  name="disapprove_rs" value="Disapprove" onclick="return confirm('Are you sure?')" >
        <input type="submit" class="btn btn-warning" name="revise_rs" value="Revise" onclick="return confirm('Are you sure?')"  >
          
        </div>
      </div>
    </form>
<?php // } ?>          
          
          
    </div>
  </div>
</div>
</div>
    <!-- modal for RS view -->   

  
  

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

  
///////------- click on rs view icon
$(document).off('click', '.rs_view').on('click', '.rs_view', function(){

var $this = $(this);
var rs_id = $this.attr('rs_id');
var total = 0 ;
    $.ajax({
      type    : "POST",
      url     : baseurl+"Add_Requisition_slip/get_rsById",
      data    :{rs_id:rs_id},
      dataType: 'json',
      success: function(data) { 
        //  console.log(data);return false;
         
         
         var $rs_tbody = $('#requisition_slip_tbl > tbody');
         $rs_tbody.html("");
         $.each(data, function(index, element) {
          var desc_name = null;
          // $.ajax({
          //       type: 'POST',
          //       url: baseurl+'Add_Requisition_slip/get_description_name',
          //       data: {'id': element.description_id},
          //       dataType: 'json',
          //       success: function (data) {
                //  desc_name = data[0].description;
                var amount = parseFloat(element.rate) * parseFloat(element.quantity);
                 total = total + parseFloat(amount);
               //   
                  // console.log(total + "-----" + element.amount);
           $rs_tbody.append(' <tr><td style="text-align: center;border: 1px solid #F4F4F4;"><input class="form-control" type="text" value="'+element.rs_detail_description+'" style="width: fit-content;" readonly></td><td style="border: 1px solid #F4F4F4;"> <input type="text" class="form-control qty" value="'+element.quantity+'"  readonly></td> <td style="text-align: center;border: 1px solid #F4F4F4;"><input type="text" class="form-control rate" value="'+element.rate+'" readonly></td><td style="text-align: center;border: 1px solid #F4F4F4;"><input type="text" class="form-control amount" value="'+amount+'" readonly></td></tr>');
           $('#amount_tot').html(total);
           $('#req_total_amount').val(total);  

            //     }
            // });
         
            
        
          
        });

            
            $('#requisition_id').val(data[0].requisition_slip_id);
            $('#view_rs_modal').modal('toggle');
        
      }
    });

});

///////------- click on rs view icon

</script>
</body>
</html>
