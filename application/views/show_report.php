<?php $current_date = date('d/m/Y'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>All Item Report</title>
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
       
       <script type="text/javascript">

var tableToExcel = (function() {

var uri = 'data:application/vnd.ms-excel;base64,'

    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'

    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }

    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }

  return function(table, name) {

    if (!table.nodeType) table = document.getElementById(table)

    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}

    var link = document.createElement("a");
    link.download = "<?php echo"Inventry Report: ". $current_date; ?>";
                    link.href = uri + base64(format(template, ctx));
                    link.click();


  }

})()

</script>

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
      </ol>
    </section>
 <div class="col-md-3">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>All Items</h2>
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
    <form method="post" action="javascript:;" id="get_all_attByDate"> <div class="form-group col-md-3"><span>start : </span><input type="date" class="form-control select2 required" id="filter_FromDate" name="filter_FromDate" min="2018-12-01" value=""></div><div class="form-group col-md-3"><span>End : </span><input type="date" class="form-control select2 required" id="filter_ToDate" name="filter_ToDate" min="2018-12-01" value=""></div> </form>
               
               </div>
               
            <div class="box-body table-responsive">
            <input type="button" class="btn btn-success" onclick="tableToExcel('example2', 'ITHNS Report')" value="Export to Excel">
          <table id="example2" class="table table-condensed table-hover table-responsive" style="background-color: #fff;">
       
        <thead>

                
          <tr style="color: #215D9B;">
          <th style="text-align: center;background-color: #E2E2E2;">Sr#</th>

          <th style="background-color: #E2E2E2;">Brand</th>
          <th style="background-color: #E2E2E2;">Category</th>
          <th style="background-color: #E2E2E2;">Item Name</th>
          <th style="background-color: #E2E2E2;">Price</th>
          <th style="background-color: #E2E2E2;">Status</th>
          <th style="background-color: #E2E2E2;">Type</th>
          <th style="background-color: #E2E2E2;">Purchase Date</th>
          <th style="background-color: #E2E2E2;">Maintenance Due Date</th>

   
                </tr>
              
                    </thead>
                    <tbody>
        <?php
        $row_count = 1;
             foreach ($all_item as $row) {
                $item_id = $row['item_id'];
                $brand_id = $row['brand_id'];
                $category_id = $row['category_id'];
                $item_name = $row['item_name'];
                $price = $row['price'];
                $status = $row['status'];
                $type_id = $row['type_id'];
                $purchase_date = $row['purchase_date'];
                $maintenance_due_date = $row['maintenance_due_date'];
            
              
                foreach ($all_brand as $row_brand) {
                    if ($row_brand['brand_id'] == $brand_id) {
                        $brand_name = $row_brand['brand_name'];
                        break;}}
                     
                  
                foreach ($all_category as $row_category) {
                    if ($row_category['category_id'] == $category_id) {
                        $category_name = $row_category['category_name'];
                        break;}}
                
                foreach ($all_type as $row_type) {
                    if ($row_type['type_id'] == $type_id) {
                        $type_name = $row_type['type_name'];
                        break;}}
                
                
                    if ($status == 1) {
                        $status_name = "Registered";
                      }
                    elseif($status == 2) {
                      $status_name = "Alloted";
                    }
                    elseif($status == 3) {
                      $status_name = "Maintenance";
                    }
                    elseif($status == 4) {
                      $status_name = "Retired";
                    }

                    
                      
                      ?>
           
                  <tr>
            
        <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $brand_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $category_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $item_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo number_format($price); ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $status_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $type_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $purchase_date; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $maintenance_due_date; ?></td>
     
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
      'paging'      : false,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  
  ///////------- get attendance between two dates over all attendance

$(document).on('change','#filter_ToDate',function(e){
       // e.preventDefault();
       var start_date = $('#filter_FromDate').val();
       var end_date   = $('#filter_ToDate').val();
       if (start_date == '') 
       {
                               swal("Error", "Select start date :)", "error");
       }
       else if (end_date == '') 
       {
                  swal("Error", "Select end date :)", "error");
       }
       else
       {
                      var data = $("#get_all_attByDate").serialize();
                        //console.log(data);return false;att_by_dateOverAll
                      // $(".modal-backdrop.in").hide();
                       $.ajax
                      ({  
                        type:"POST",
                        url: baseurl+"att_by_dateOverAll",
                        data:data,
                        //dataType:"json",
                        beforeSend: function(){
                               console.log('here');

                             $('.loader').show();
                          },

                                                complete: function(){

                                                 $('.loader').hide();
             },

                        success: function(data)
                        {

                          swal("Success!","Done!", "success");
                          $("#main_content").html(data);
                          $('#att_FromDate').val(start_date);
              $('#att_ToDate').val(end_date);
                       }
                      });
     }
  });  

  </script>
</body>
</html>
