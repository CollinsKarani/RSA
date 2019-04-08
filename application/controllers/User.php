<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
public function create(){
  if($this->session->userdata('is_logged_user')){
   $this->db->where('email',$this->session->userdata('email'));
     $qry=$this->db->get('user');
     $data['user']=$qry->row();
     $this->load->view('add-products',$data);
  }
   else{
        redirect('auth/');
    }
}


//load the products
public function products(){
    if($this->session->userdata('is_logged_user')){
     $all=$this->db->get('products');
     $data['products']=$all->result_array();
     //get details of the logged user
     $this->db->where('email',$this->session->userdata('email'));
     $qry=$this->db->get('user');
     $data['user']=$qry->row();
     $this->load->view('products',$data);
    }
    else{
        redirect('auth/');
    }

}

 public function cart()
	{
	     if($this->session->userdata('is_logged_user')){
         $data['cartItems'] = $this->cart->contents();
         //get details of the logged user
         $this->db->where('email',$this->session->userdata('email'));
         $qry=$this->db->get('user');
         $data['user']=$qry->row();
		 $this->load->view('cart',$data);
          }
         else{
        redirect('auth/');
    }
	}

    	public function checkout()
	   {
	       //get details of the logged user
         $this->db->where('email',$this->session->userdata('email'));
         $qry=$this->db->get('user');
         $data['user']=$qry->row();
	      $data['cartItems'] = $this->cart->contents();
		  $this->load->view('checkout',$data);
	   }
/* update the cart */
      function updateItemQty(){
        $update = 0;
        // Get cart item info
        $rowid = $this->input->get('rowid');
        $qty = $this->input->get('qty');

        // Update item in the cart
        if(!empty($rowid) && !empty($qty)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $qty
            );
            $update = $this->cart->update($data);
        }

        // Return response
        echo $update?'ok':'err';
    }

    /* remove cart */
    function removeItem($rowid){
        // Remove item from cart
        $remove = $this->cart->remove($rowid);
        // Redirect to the cart page
        redirect('user/cart');
    }

    public function upload(){
                 $config['upload_path']="assets/images/products/";
                 $config['allowed_types']='gif|jpg|png|JPEG|jpeg';
                 $config['encrypt_name'] = TRUE;
                 $this->load->library('upload',$config);
                 if($this->upload->do_upload("filename")){
                     $data = $this->upload->data();
                     $permit_name= $data['file_name'];
                     $this->resize_image($permit_name);
                     $params = array(
                         'image' => $permit_name,
                         'name'=>$this->input->post('name'),
                         'description'=>$this->input->post('description'),
                         'price'=>$this->input->post('price')
                     );
                     $result=$this->db->insert('products',$params);
                     if($result){
                         $this->session->set_flashdata('error_renew','<div class="alert alert-success">Success!!! The image is added successfully in the system. </div>');
                     redirect('user/create');
                     }
                     else{
                         //echo "error in processing";
                         $this->session->set_flashdata('error_renew','<div class="alert alert-danger">Error in processing the Request. Kindly check</div>');
                         redirect('user/create');
                     }
                 }
                  else{
                     $this->session->set_flashdata('error_renew','<div class="alert alert-danger">'.$this->upload->display_errors().'</div>');
                     redirect('user/create');
                 }
    }

 /* resize the image of the uploaded image */
   function resize_image($filename)
    {
        $img_source = 'assets/images/products/'. $filename;
        $img_target = 'assets/images/thumb/';

        // image lib settings
        $config = array(
            'image_library' => 'gd2',
            'source_image' => $img_source,
            'new_image' => $img_target,
            'maintain_ratio' => FALSE,
            'width' => 128,
            'height' => 128
        );
        // load image library
        $this->load->library('image_lib', $config);

        // resize image
        if(!$this->image_lib->resize())
            echo $this->image_lib->display_errors();
        $this->image_lib->clear();
    }

public function addToCart($id){
            $this->db->where('id', $id);
            $query = $this->db->get('products');
            $product = $query->row_array();
            //echo json_encode($result);
             $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['price'],
            'name'    => $product['name'],
            'image' => $product['image']
        );
        $this->cart->insert($data);
        //echo $this->cart->total_items();
        redirect('user/cart');
}

/* process the order placement and save into the database */
public function saveOrder(){
    if(isset($_POST['saveOrder'])){
           include APPPATH .'third_party/lib/Crypt/RSA.php';
         // Prepare customer data
           $rsa = new Crypt_RSA();
           extract($rsa->createKey());
           $rsa->loadKey($privatekey);

           $account = $rsa->encrypt($_POST['accountNumber']);
           $cardNumber=$rsa->encrypt($_POST['card_number']);
           $cvv= $rsa->encrypt($_POST['cvv']);
           $pin=$rsa->encrypt($_POST['pin']);

           $val1=base64_encode($account);
           $val2=base64_encode($cardNumber);
           $val3=base64_encode($cvv);
           $val4=base64_encode($pin);
           $rsa->loadKey($publickey);

  $custData = array(
                'email'=>$this->session->userdata('email'),
                'account_number'=> $val1,
                'card_number'=>$val2,
                'cvv'=>$val3,
                'pin'=>$val4,
                'created'=>date('Y-m-d H:m:i')
            );
    $insert = $this->insertCustomer($custData);
     if($insert){
         // Insert order
         $order = $this->placeOrder($insert);
         $this->session->set_userdata('order',$order);
           // If the order submission is successful
                    if($order){
                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect('user/orderSuccess/'.$order);
                        //redirect(base_url().'user/checkout');
                    }else{
                         $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Order submission failed, please try again.</div>');
                        redirect(base_url().'user/checkout');
                    }
      }
      else{
        $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">Some problems occured, please try again.</div>');
        redirect(base_url().'user/checkout');
      }
    }
}


    /*
     * Insert customer data in the database
     * @param data array
     */
    public function insertCustomer($data){
        // Insert customer data
        $insert = $this->db->insert('customers_data', $data);
        // Return the status
        return $insert?$this->db->insert_id():false;
    }
 function placeOrder($custID){
        // Insert order data
        $ordData = array(
            'customer_id' => $custID,
            'grand_total' => $this->cart->total()
        );
        $insertOrder = $this->insertOrder($ordData);
         $this->session->set_userdata('grandTotal',$this->cart->total());
        if($insertOrder){
            // Retrieve cart data from the session
            $cartItems = $this->cart->contents();

            // Cart items
            $ordItemData = array();
            $i=0;
            foreach($cartItems as $item){
                $ordItemData[$i]['order_id']     = $insertOrder;
                $ordItemData[$i]['product_id']     = $item['id'];
                $ordItemData[$i]['quantity']     = $item['qty'];
                $ordItemData[$i]['sub_total']     = $item["subtotal"];
                $i++;
            }

            if(!empty($ordItemData)){
                // Insert order items
                $insertOrderItems = $this->insertOrderItems($ordItemData);
                if($insertOrderItems){
                    // Remove items from the cart
                    $this->cart->destroy();
                    // Return order ID
                    return $insertOrder;
                }
            }
        }
        return false;
    }


 /*
     * Insert order data in the database
     * @param data array
     */
    public function insertOrder($data){
        // Insert order data
        $insert = $this->db->insert('orders',$data);
        // Return the status
        return $insert?$this->db->insert_id():false;
    }

 /*
     * Insert order items data in the database
     * @param data array
     */
    public function insertOrderItems($data = array()) {
        // Insert order items
        $insert = $this->db->insert_batch('order_items', $data);
        // Return the status
        return $insert?true:false;
    }

function orderSuccess($ordID){
        // Load order details view
        //get details of the logged user
         $this->db->where('email',$this->session->userdata('email'));
         $qry=$this->db->get('user');
         $data['user']=$qry->row();
        $this->load->view('order-success',$data);
    }
}
