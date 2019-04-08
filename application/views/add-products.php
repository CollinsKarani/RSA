<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Add Products</title>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"> </script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/custom.css" >
</head>
<style>
.required.error{
    color: #FF0000;
}

</style>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="">RSA ENCRYPTION SYSTEM </a>
                </div>
                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i>Welcome:  <?php echo $user->fname.' '.$user->lname; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                           <li><a href="<?php echo site_url('user/create'); ?>"><i class="fa fa-gear fa-fw"></i> Create Products</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo site_url('auth/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->
            </nav>
<div class="container" style=" margin-top: 90px;">
 <div class="row">
     <div class="col-md-12">
         <div class="panel panel-info">
             <div class="panel-heading">Add Products</div>
             <div class="panel-body">
                    <?php echo $this->session->flashdata('error_renew'); ?>
                 <?php echo form_open_multipart('user/upload',array("automplete"=>"off")); ?>
                 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Product Image: <i class="required" style="color: #FF2929;">*</i></label>
                         <input type="file" name="filename" required="required" />
                        </div>
                      </div>

                       <div class="col-md-4">
                         <div class="form-group">
                             <label for="">Product Name: <i class="required" style="color: #FF2929;">*</i></label>
                         <input type="text" name="name" class="form-control" required="required" />
                         </div>
                      </div>
                       <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Product Description: <i class="required" style="color: #FF2929;">*</i></label>
                         <input type="text" name="description" class="form-control" required="required" />
                        </div>
                      </div>
                 </div>

                      <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                             <label for="">Product Price: <i class="required" style="color: #FF2929;">*</i></label>
                         <input type="number" name="price" class="form-control" required="required" />
                        </div>
                      </div>

                 </div>
                 <div class="row">
                     <div class="col-md-4">
                         <div class="form-group">
                              <button class="btn btn-primary" type="submit">Register Product</button>
                         </div>
                     </div>

                      <div class="col-md-4">
                         <div class="form-group">
                             <a href="<?php echo site_url('user/products'); ?>"> <button class="btn btn-success" type="button">Back to Store</button>    </a>
                         </div>
                     </div>
                 </div>
             <?php echo form_close(); ?>
             </div>
         </div>
     </div>
 </div>



</div>

</body>
</html>