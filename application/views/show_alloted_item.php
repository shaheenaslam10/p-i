<?php $current_date = date('d/m/Y'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Alloted Items</title>
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
    link.download = "<?php echo"Alloted Inventry Report: ". $current_date; ?>";
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
        <!-- <li><a href="<?php //echo base_url() . "Add_Item" ?>">
        <button class="btn btn-warning">Add New Items</button></a></li>
      -->
        
      </ol>
    </section>
 <div class="col-md-3">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              <h2>Alloted Items (Inventory)</h2>
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
            <input type="button" class="btn btn-success" onclick="tableToExcel('example2', 'ITHNS Report')" value="Export to Excel">
          <table id="example2" class="table table-condensed table-hover table-responsive" style="background-color: #fff;">
       
       
        <thead>

                
          <tr style="color: #215D9B;">
          <th style="text-align: center;background-color: #E2E2E2;">Sr#</th>
          <th style="background-color: #E2E2E2;">Item Name</th>
          <th style="background-color: #E2E2E2;">User Name</th>
          <th style="background-color: #E2E2E2;">Department Name</th>
          
   
                </tr>
              
                    </thead>
                    <tbody>
        <?php
        $row_count = 1;
             foreach ($allotment as $row) {
                $allotment_id = $row['allotment_id'];
                $item_id = $row['item_id'];
                $user_id = $row['user_id'];

                foreach ($all_item as $row_item) {
                    if ($row_item['item_id'] == $item_id) {
                        $item_name = $row_item['item_name'];
                        break;}}
                     
                  
                foreach ($all_user as $row_user) {
                    if ($row_user['user_id'] == $user_id) {
                        $u_name = $row_user['u_name'];
                        $department_id = $row_user['department_id'];
                        foreach ($all_department as $row_department) {
                          if ($row_department['department_id'] == $department_id) {
                              $department_name = $row_department['department_name'];
                              break;}}

                        break;}}
                
                      
                      ?>
           
                  <tr>
            
        <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $item_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $u_name; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $department_name; ?></td>

     
       
          
          
 
          <!-- <td style="border: 1px solid #F4F4F4;" align="center"><a href="<?php //echo base_url() . "Add_Allotment/insert/" . $item_id; ?>"><i class="fa fa-external-link" style="color: green;font-size: 18px;"></i></i></a>
          </td> -->
          <!-- <td style="border: 1px solid #F4F4F4;" align="center"><a href="<?php //echo base_url() . "Add_Item/show_item_id/" . $item_id; ?>"><i class="fa fa-pencil" style="color: blue;font-size: 18px;"></i></a>
          </td> -->
           <!-- <td style="border: 1px solid #F4F4F4;" align="center"><a href="<?php //echo base_url() . "Add_Item/delete_item/" . $item_id; ?>" onclick="return confirm('Are you sure?')"><i class="fa fa-remove" style="color: red;font-size: 18px;"></i></a>
          </td> -->
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
</body>
</html>
