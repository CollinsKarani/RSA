        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Profile</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Latest compiled and minified CSS -->
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" >
          <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/custom.css" >
        </head>
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
                                        <!-- Cart info -->
                    <a href="<?php echo base_url('user/cart'); ?>" class="cart-link" title="View Cart">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
                        <span>(<?php echo $this->cart->total_items(); ?>)</span>
                    </a>
                  <div class="row">
                          <?php if(!empty($products)){ foreach($products as $row){ ?>
                <div class="col-sm-6 col-md-6 col-lg-2" data-wow-duration="3.5s">
                <div class="thumbnail text-center">
                    <a href="<?php echo base_url('user/addToCart/'.$row['id']); ?>"><img src="<?php echo base_url('assets/images/products/'.$row['image']); ?>" class="img-fluid" alt="htc image"></a>
                    <br>
                    <h5 class="text-primary mt-4 mb-2"><?php echo $row['name']; ?></h5>
                    <ul>
                       <?php echo $row['description']; ?>
                    </ul>
                    <h4 class="text-primary">Ksh <?php echo $row['price']; ?>  </h4>
                    <a href="<?php echo base_url('user/addToCart/'.$row['id']); ?>" class="btn btn-primary btn-block text-white">Shop Now</a>
                </div>
            </div>
                   <?php } }else{ ?>
                <p>Product(s) not found...</p>
            <?php } ?>

                  </div>
                </div>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
              <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        </body>
        </html>