<?php
session_start();
require('db/db_config.php');
$sql = "SELECT * FROM customers";
$id = $_GET['id'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Top Navigation</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index3.html" class="navbar-brand">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Bank System</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Customers</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="allcustomers.php" class="dropdown-item">View all customers </a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
</br></br></br></br>
<div class="container">
<form method="POST" autocomplete="off" name="myform" action="save_transaction.php" onsubmit="return validateform()">
<div class="row">
        <div class="col-6">
          <div class="form-group">
                  <label>Transfer from</label>
                  <select id="from_user" name="from" class="form-control select2" style="width: 100%;">
                  <?php 
                  $result2 = $conn->query($sql);
                  while($row1 = $result2->fetch_assoc()) { 
                    if($id != $row1['id']){?>
                    <option id=<?php echo $row1['current_balance']; ?> value=<?php echo $row1['id'] ?>><?php echo $row1['name'];?></option>
                  <?php } } ?>
                  </select>
          </div> 
        </div>
  </div>
  <div class="row">
        <div class="col-6">
          <div class="form-group">
                  <label>Transfer to</label>
                  <select name="to" class="form-control select2" style="width: 100%;" readonly>
                  <?php 
                  $result1 = $conn->query($sql);
                  while($row = $result1->fetch_assoc()) {  
                    if($id==$row['id']) {
                      $_SESSION['cust_old_amt'] = $row['current_balance'];?>
                    <option value=<?php echo $row['id'] ?>><?php echo $row['name'];?></option>
                  <?php } } ?>
                  </select>
          </div> 
        </div>
  </div>
  <div class="row">
      <div class="col-sm-6">
        <!-- text input -->
        <div class="form-group">
          <label>Transfer Amt.</label>
          <input type="text" name="amt" class="form-control" placeholder="Enter Amout" onchange="return validateform()" required>
          <h6 style="display:none;color:red" class="alert">Amount Should be less than or equal of Transfer from</h6>
        </div>
      </div>
    </div>
    <input type="hidden" name="from_amt" id="from_amt">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  
</form>
</div>

</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script type="text/javascript">
$("#from_user").ready(function(){
  $('#from_amt').val($(this).find('option:selected').attr('id'));
  
});
$("#from_user").on('change',function(){
  $('#from_amt').val($(this).find('option:selected').attr('id'));
});
function validateform(){
  var from_amt = parseInt(document.myform.from_amt.value);
  var amt = parseInt(document.myform.amt.value);
  console.log("from amount"+from_amt);
  console.log("entered amount"+amt);
  if(amt > from_amt){
    console.log("enter in if");
    $(".alert").css("display",'');
    return false;
  }
  
}
</script>
</body>
</html>
