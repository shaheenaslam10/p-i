<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Add Requisition Slip Detail</title>
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
  <script>
    $(document).ready(function() {
        var totalQuantity = 0;
        var totalRate = 0;

        // Loop through each row in the table and calculate totals
        $('#example1 tbody tr').each(function() {
            var quantity = parseInt($(this).find('td:eq(2)').text().trim());
            var rate = parseFloat($(this).find('td:eq(3)').text().replace(/[^0-9.-]+/g, '')); // Remove non-numeric characters

            totalQuantity += isNaN(quantity) ? 0 : quantity;
            totalRate += isNaN(rate) ? 0 : rate;
        });

        // Display calculated totals in the last row of the table
        var totalRow = '<tr>' +
            '<td colspan="4"></td>' + // Empty cells for description, quantity, rate
            '<td></td>' + // Empty cell for update icon
            '<td></td>' + // Empty cell for delete icon
            '<td style="text-align: center;">' + totalQuantity + '</td>' +
            '<td style="text-align: center;">' + totalRate.toFixed(2) + '</td>' +
            '</tr>';

        $('#example1 tbody').append(totalRow);
    });
</script>

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
        <div class="col-md-4" style="margin-left: -15px;">
          <div class="small-box bg-blue-gradient">
            <div class="inner">
              
              <h2>Add Requisition Slip Detail</h2>
              <h5><?php echo $single_rs_detail_slip->requisition_slip_description; ?></h5>
              <?php //  echo $single_rs_detail_slip->status; ?>
              
              
            </div>
          </div>
 </div>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Add Requisition Slip Detail</a></li>
        
      </ol>
    </section>
      <div class="col-md-12"></div>

    
    <section class="content" style="color: #0000ff;">
           
    <?php echo form_open_multipart('Add_Rs_detail/savedata'); ?>
        <div class="row">
        
          
            <div class="col-md-12">
         
          <div class="box box-primary">
            <div class="box-header with-border" style="background-color: #ECF0F5;">
          
            </div>
            
         
            <div class="box-body" style="background-color: #ECF0F5;">
  <div class="form-group col-md-12">
    <div class="col-md-4">
      <label for="rs_description"><b>Description</b>
        <font color="red">
          <p style="font-size: 8px;"><b><?php echo form_error('rs_description'); ?></b></p>
        </font>
      </label>
      <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('rs_description'); ?>" class="form-control" name="rs_detail_description" required autofocus="">
    </div>



    <div class="col-md-4">
      <label for="quantity"><b>Quantity</b>
        <font color="red">
          <p style="font-size: 8px;"><b><?php echo form_error('quantity'); ?></b></p>
        </font>
      </label>
      <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('quantity'); ?>" class="form-control" name="quantity" required>
    </div>

    <div class="col-md-4">
      <label for="rate"><b>Rate</b>
        <font color="red">
          <p style="font-size: 8px;"><b><?php echo form_error('rate'); ?></b></p>
        </font>
      </label>
      <input onfocus="var temp_value=this.value; this.value=''; this.value=temp_value" type="text" value="<?php echo set_value('rate'); ?>" class="form-control" name="rate" required>
    </div>


    <br><br><br><br><br>
   
    <div class="box-footer mx-10" style="background-color: #ECF0F5;">
    <?php $status = $single_rs_detail_slip->status;  ?>
    <?php if ( $status == 2 || $status == 3 || $status == 0) {?> 
      <button type="submit" style="width: 10%;float: left;" class="btn btn-success">Add</button>
          <?php }?>
      
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
          <th style="background-color: #E2E2E2;">Quantity</th>
          <th style="background-color: #E2E2E2;">Rate</th>
          <th style="text-align: center;background-color: #E2E2E2;">Update</th>
          <th style="text-align: center;background-color: #E2E2E2;">Delete</th>
   
                </tr>
              
                    </thead>
                    <tbody>
        <?php
        $row_count = 1;
        $quantity_count = null;
        $rate_count = null;
             foreach ($rs_detail_by_id as $row) {
                $rs_detail_id = $row['rs_detail_id'];
                $rs_detail_description = $row['rs_detail_description'];
                $quantity = $row['quantity'];
                $rate = $row['rate'];

             ?>
           
                  <tr>
            
        <td style="text-align: center;border: 1px solid #F4F4F4;"><?php echo $row_count;?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $rs_detail_description; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo $quantity; ?></td>
        <td style="border: 1px solid #F4F4F4;"><?php echo number_format($rate); ?></td>

        
     
       
          
          
 
          <td style="border: 1px solid #F4F4F4;" align="center">
          <?php if ( $status == 2 || $status == 3 || $status == 0) {?> 
            <a href="<?php echo base_url() . "Add_Rs_detail/show_rs_detail_id/" . $rs_detail_id; ?>">
          <i class="fa fa-pencil" style="color: blue;font-size: 18px;"></i></a>
          <?php }?>
          </td>
           <td style="border: 1px solid #F4F4F4;" align="center">
           <?php if ( $status == 2 || $status == 3 || $status == 0) {?> 
            <a href="<?php echo base_url() . "Add_Rs_detail/delete_rs_detail/" . $rs_detail_id . "/" . $single_rs_detail_slip->requisition_slip_id; ?>" onclick="return confirm('Are you sure?')">
           <i class="fa fa-remove" style="color: red;font-size: 18px;"></i></a>
          <?php }?>
           
          </td>

        </tr>

       <?php $row_count++; $quantity_count = $quantity_count + $quantity; $rate_count = $rate_count + $rate;  } ?> 
       <tr>
            
        <td style="border: 1px solid #F4F4F4;color: black;" align="center" > -- </td>
        <td style="border: 1px solid #F4F4F4; color: black;" align="center" > <b>Total</b> </td>
        <td style="border: 1px solid #F4F4F4; color: black;"><b><?php echo $quantity_count; ?></b></td>
        <td style="border: 1px solid #F4F4F4; color: black;" ><b><?php echo number_format($rate_count); ?></b></td>

        
     
       
          
          
 
          <td style="border: 1px solid #F4F4F4; color: black;" align="center">
           --
          </td>
           <td style="border: 1px solid #F4F4F4; color: black;" align="center">
           --
           
          </td>

        </tr> 
                </tbody>
                
              </table>
              
            </div>
         
          </div>
          
        </div>
        
      </div>
     
    </section>



  </div>
  <input type="hidden" value="<?php echo $single_rs_detail_slip->requisition_slip_id; ?>" class="form-control" name="requisition_slip_id" required>
  <input type="hidden" value="<?php echo ($this->session->userdata['logged_in']['user_id']); ?>" class="form-control" name="by_user" required>
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
