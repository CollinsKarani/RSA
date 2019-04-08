        <!DOCTYPE html>
        <html lang="en">
        <head>
            <title>RSA System Login</title>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" >
            <style type="text/css">
                .form-box{
                    max-width: 500px;
                    position: relative;
                    margin: 5% auto;
                }
            </style>
        </head>
        <body>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="form-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading text-center">
                                    <h3>RSA System Login</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                            <div class="col-sm-12">
                                                    <?php echo $this->session->flashdata('msg'); ?>
                                            </div>
                                    </div>
                                    <form action="<?php echo base_url() ;?>auth/check_login" method="post" autocomplete="off">

                                        <div class="form-group">
                                                                        <label class="control-label" for="pswd">Email</label>
                                                                <div>
                                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required="">

                                                                </div>
                                                                </div>

                                                                <div class="form-group">
                                                                        <label class="control-label" for="pswd">Password</label>
                                                                <div>
                                                                        <input type="password" class="form-control" id="pswd" name="password" placeholder="Password" required="">
                                                                </div>
                                                                </div>
                                                                <div class="form-group">
                                                                        <div class="row">
                                                                                <div class="col-sm-offset-5 col-sm-3  btn-submit">
                                                                                        <button type="submit" class="btn btn-success" name="login">Login</button>
                                                                                </div>
                                                                        </div>
                                                                </div>

                                    </form>
                                </div>
                                <div class="panel-footer text-center">
                                    <p><a href="<?php echo base_url('auth/registration'); ?>"> Don't Have an Account? REGISTER</a></p>
                                    <h5><a href="<?php echo base_url(); ?>">Recover Password</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
                <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        </body>
        </html>