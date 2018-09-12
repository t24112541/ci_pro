<!DOCTYPE html>
<html lang="en">
<head>  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
<body style="height:1500px">

<div class="container-fluid">
  <br>
  <img src="../assets/img/header.PNG" width="50%">
  <p>
</div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top" style="background-color:#6c9e37;">
  <a class="navbar-brand" href="#">Parking</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
  <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
          <i class='far fa-address-book fa-2x'></i>
        </a>
        <div class="dropdown-menu">
          <?=anchor("ctrl_admin/add_admin/","<i class='fas fa-user-plus fa-1x'></i> เพิ่ม admin",array("class"=>"dropdown-item", "data-toggle"=>"tooltip","data-placement"=>"bottom",))?>
          <a class="dropdown-item" href="#">Link 2</a>
          <a class="dropdown-item" href="#">Link 3</a>
        </div>
      </li>
<!-- "title"=>"จัดการข้อมูล admin", -->
      <li class="nav-item">
        <?=anchor("ctrl_admin/list_admin/","<i class='far fa-address-book fa-2x'></i>",array("class"=>"nav-link", "data-toggle"=>"tooltip","data-placement"=>"bottom","title"=>"จัดการข้อมูล admin",))?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>    
    </ul>
  </div>  
</nav>

<div class="container-fluid"><br>
   <?php if(isset($error)) { echo $error; }; ?>
  <?=form_open("login/add_admin_process",array("class"=>"form-horizontal")); ?>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_name">ชื่อ:<?php echo form_error('ad_name'); ?></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="ad_name" placeholder="กรอกชื่อที่นี่" name="ad_name" value="<?php echo set_value('ad_name'); ?>">
         
        </div>
        
      </div>
     
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_username">username:<?php echo form_error('ad_username'); ?></label>
        <div class="col-sm-8">          
          <input type="text" class="form-control" id="ad_username" placeholder="สร้าง username ที่นี่" name="ad_username" value="<?php echo set_value('ad_username'); ?>">
         
        </div>
        
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2" for="ad_password">password:<?php echo form_error('ad_password'); ?></label>
        <div class="col-sm-8">          
          <input type="password" class="form-control" id="ad_password" placeholder="สร้าง password ที่นี่" name="ad_password" value="<?php echo set_value('ad_password'); ?>">

        </div>
        
      </div>

      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="btn_add">บันทึก</button>
        </div>
      </div>
  <?=form_close();?>
</div>

</body>
</html>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>



