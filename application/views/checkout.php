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

<h2>Order Preview</h2>
<div class="row checkout">
    <!-- Order items -->
    <table class="table">
    <thead>
        <tr>
            <th width="13%"></th>
            <th width="34%">Product</th>
            <th width="18%">Price</th>
            <th width="13%">Quantity</th>
            <th width="22%">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        <?php if($this->cart->total_items() > 0){ foreach($cartItems as $item){ ?>
        <tr>
            <td>
                <?php $imageURL = !empty($item["image"])?base_url('assets/images/products/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                <img src="<?php echo $imageURL; ?>" width="75"/>
            </td>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'Ksh '.$item["price"].''; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'Ksh '.$item["subtotal"].' '; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr>
            <td colspan="5"><p>No items in your cart...</p></td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="4"></td>
            <?php if($this->cart->total_items() > 0){ ?>
            <td class="text-center">
                <strong>Total <?php echo 'Ksh '.$this->cart->total().''; ?></strong>
            </td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>

    <!-- Shipping address -->
    <h4>Check the following card Numbers: <br>
        <ol>
            <li>5569755825672968</li>
            <li>371449635398431</li>
            <li><b>ANY VALID CARD/MASTER/VISA Number, ELSE, It will not WORK.</b></li>
        </ol>
    </h4>
    <form class="" method="post" id="paymentForm" action="<?php echo site_url('user/saveOrder'); ?>" autocomplete="off">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Card Number: </label>
                    <input type="text" name="card_number" id="card_number" class="form-control" placeholder="Card Number" required="required" />
                     <div id="cnumber" class="error"></div>
                </div>
            </div>
          <div class="col-md-6">
                <div class="form-group">
                    <label for="">Account Number: </label>
                    <input type="text" name="accountNumber" class="form-control" placeholder="Account Number" required="required" />

                </div>
            </div>

        </div>
        <div class="row">
             <div class="col-md-3">
                <div class="form-group">
                    <label for="">PIN: </label>
                    <input type="number" name="pin" id="pin" class="form-control" placeholder="Personal Number" required="required" />
                </div>
            </div>
             <div class="col-md-4">
                <div class="form-group">
                    <label for="">CVV: </label>
                    <input type="text" name="cvv" maxlength="3" id="cvv" class="form-control" placeholder="CVV" required="required" />
                </div>
            </div>
        </div>

        <div class="row">
           <div class="col-md-6">
                <div class="form-group">
                    <label for="">Card Holder Details: </label>
                    <input type="text" name="fname" class="form-control" value=" <?php echo $user->fname; ?>" readonly="readonly" placeholder="First Name" required="required" />
                </div>
            </div>
             <div class="col-md-6">
                <div class="form-group">
                     <label for="">Last Name: </label>
                    <input type="text" name="lname" class="form-control" value=" <?php echo $user->lname; ?>" readonly="readonly" placeholder="Last Name" required="required" />
                </div>
            </div>
        </div>
    <div class="footBtn">
        <a href="<?php echo base_url('user/cart'); ?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Back to Cart</a>
        <button type="submit" name="saveOrder" class="btn btn-success orderBtn">Place Order <i class="glyphicon glyphicon-menu-right"></i></button>
    </div>
    </form>
</div>
</div>
   <script>
function cardFormValidate(){
    var cardValid = 0;

    //card number validation
    $('#card_number').validateCreditCard(function(result){
        if(result.valid){
            $("#card_number").removeClass('required');
            cardValid = 1;
            $("#cnumber").hide();
        }else{
            $("#card_number").addClass('required');
            cardValid = 0;

            $("#cnumber").html('<p class="help-block error">Invalid Card Number </p>');
        }
    });

    //card details validation
    var cardName = $("#name_on_card").val();
    var expMonth = $("#expiry_month").val();
    var expYear = $("#expiry_year").val();
    var cvv = $("#cvv").val();
    var regName = /^[a-z ,.'-]+$/i;
    var regMonth = /^01|02|03|04|05|06|07|08|09|10|11|12$/;
    var regYear = /^2017|2018|2019|2020|2021|2022|2023|2024|2025|2026|2027|2028|2029|2030|2031$/;
    var regCVV = /^[0-9]{3,3}$/;
    if (cardValid == 0) {
        $("#card_number").addClass('required');
        $("#card_number").focus();
        return false;
    }else if (!regMonth.test(expMonth)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").addClass('required');
        $("#expiry_month").focus();
        return false;
    }else if (!regYear.test(expYear)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").addClass('required');
        $("#expiry_year").focus();
        return false;
    }else if (!regCVV.test(cvv)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").addClass('required');
        $("#cvv").focus();
        return false;
    }else if (!regName.test(cardName)) {
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").addClass('required');
        $("#name_on_card").focus();
        return false;
    }else{
        $("#card_number").removeClass('required');
        $("#expiry_month").removeClass('required');
        $("#expiry_year").removeClass('required');
        $("#cvv").removeClass('required');
        $("#name_on_card").removeClass('required');
        return true;
    }
}
$(document).ready(function() {
    //card validation on input fields
    $('#paymentForm input[type=text]').on('keyup',function(){
        cardFormValidate();
    });
});
</script>
</body>
</html>