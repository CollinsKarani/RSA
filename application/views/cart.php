<!DOCTYPE html>
<html>
<head>
  <title>Cart</title>
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery-3.2.1.min.js"> </script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/custom.css" >
</head>

<body>
    <script>
/* Update item quantity */
function updateCartItem(obj, rowid){
	$.get("<?php echo base_url('user/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
		if(resp == 'ok'){
			location.reload();
		}else{
			alert('Cart update failed, please try again.');
		}
	});
}
</script>
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
                            <li><a href=""><i class="fa fa-gear fa-fw"></i> Create Products</a>
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
       <div class="panel panel-primary">
           <div class="panel-heading">Cart</div>
             <div class="panel-body">
                 <div class="table-responsive">
                     <table class="table">
    <thead>
        <tr>
            <th width="10%"></th>
            <th width="30%">Product</th>
            <th width="15%">Price</th>
            <th width="13%">Quantity</th>
            <th width="20%">Subtotal</th>
            <th width="12%"></th>
        </tr>
    </thead>
    <tbody>
        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){    ?>
        <tr>
            <td>
                <?php $imageURL = !empty($item["image"])?base_url('assets/images/products/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                <img src="<?php echo $imageURL; ?>" width="50"/>
            </td>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Ksh '.$item["price"].' '; ?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
            <td><?php echo 'Ksh '.$item["subtotal"].' '; ?></td>
            <td>
                <a href="<?php echo base_url('user/removeItem/'.$item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="glyphicon glyphicon-trash"></i></a>
            </td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="6"><p>Your cart is empty.....</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td><a href="<?php echo base_url('user/products'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Shopping</a></td>
            <td colspan="3"></td>
            <?php if($this->cart->total_items() > 0){ ?>
            <td class="text-left">Grand Total: <b><?php echo 'Ksh '.$this->cart->total().' '; ?></b></td>
            <td><a href="<?php echo base_url('user/checkout'); ?>" class="btn btn-success btn-block">Checkout <i class="glyphicon glyphicon-menu-right"></i></a></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
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