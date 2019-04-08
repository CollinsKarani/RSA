<!DOCTYPE html>
<html>
<head>
  <title>Checkout Page</title>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"> </script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/custom.css" >
      <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/style.css" >
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/creditCardValidator.js"></script>
<script src="<?php echo base_url(); ?>assets/js/platform.js"></script>
<style>
.error{
    color: #CC0000;
}

</style>
</head>
    <!--  -->
<body>
     <!-- Navigation -->
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
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
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
<h2>Order Status</h2>
<p class="ord-succ">Your order has been placed successfully.</p>
<!-- Order status & shipping info -->
<div class="row col-lg-12 ord-addr-info">
    <div class="col-sm-6 info">
        <div class="hdr">Order Info</div>
        <p><b>Reference ID</b> # <?php echo $this->session->userdata('order'); ?></p>
        <p><b>Total</b> <?php echo 'Ksh '.$this->session->userdata('grandTotal'); ?></p>
        <p><a href="<?php echo site_url('user/products'); ?>"><button class="btn btn-primary">Get Back to Shop</button></a> </p>
    </div>
</div>

</div>
</body>
</html>