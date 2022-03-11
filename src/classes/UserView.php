<?php

require "utils.php";
class UserViewCLASS extends DB
{
    //public string $product_name;
    public static function productDisplayFromUserView()
    {
        $sql = "select * from Products";
        $data = DB::getInstance()->query($sql);
        $html = "<br>";
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $html .= '<div class="col-md-3 col-sm-6">
            <div class="single-shop-product">
                <div class="product-upper">
                <input type ="hidden" name="pid" value="' . $row->product_id . '">
                    <img class = "img1"width="200" height="200" src=./uploads/' . $row->product_image . ' alt="">
                </div>
                <h2><a href="single-product.php?pid=' . $row->product_id . '&pquantity=1">' . $row->product_name . '</a></h2>
                <div class="product-carousel-price">
                <p>Discount:' . $row->product_discount . '%</p>
                    <ins>$' . ($row->product_price - ($row->product_price * ($row->product_discount / 100))) . '</ins> <del>$' . $row->product_price . '</del>
                </div>  
                
                <div class="product-option-shop">
                    <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="cart.php?pid=' . $row->product_id . '">Add to cart</a>
                </div>                       
            </div>
        </div>';
        }

        echo $html;
    }


    public static function cartDisplay($pid)
    {

        $sql = "select * from Products where product_id='$pid'";

        $data = DB::getInstance()->query($sql);
        
        print_r($_POST);
        
      //  echo "--------------";
      //  print_r($_GET);

      
      $default_quantity =1;
    //   if(isset($_POST['submitMinus']))
    //   {
         
    //   }
    //   else if(isset($_POST['submitPlus']))
    //   {
    //     $default_quantity += 1;
    //   }

     
      if(isset($_POST['box']))
      {
        if(isset($_POST['submitMinus']))
        {
            $default_quantity = $_POST['box'] - 1;
        }
        else if(isset($_POST['submitPlus']))
        {
          $default_quantity += $_POST['box'];
        }
      }


        $html1 = "<br>";
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $html1 .= '<td class="product-remove">
            <a title="Remove this item" class="remove" href="#">×</a> 
        </td>

        <td class="product-thumbnail">
            <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src=./uploads/' . $row->product_image . '></a>
        </td>

        <td class="product-name">
            <a href="single-product.html">' . $row->product_name . '</a> 
        </td>

        <td class="product-price">
            <span class="amount">£' . ($row->product_price - ($row->product_price * ($row->product_discount / 100))) . '</span> 
        </td>
       
        <td class="product-quantity">
            <div class="quantity buttons_added">
            <form  method = "get">
                <input type="submit" name="submitMinus" class="minus" value="-">
                <input type="number" size="4" class="input-text qty text" title="Qty" name = "box" value="'.$default_quantity.'" min="0" step="1" readonly>
                
                <input type="submit" name="submitPlus" class="plus" value="+">
            </form>
            </div>
        </td>

        <td class="product-subtotal">
            <span class="amount">£' . ($row->product_price - ($row->product_price * ($row->product_discount / 100))) * $default_quantity . '</span> 
        </td>';
        }
        echo $html1;
    }


    public static function cartDisplaySubtotal($pid)
    {
      
        $html3 = "";
        $sql = "select * from Products where product_id='$pid'";

        $data = DB::getInstance()->query($sql);
        while ($row = $data->fetch(PDO::FETCH_OBJ)) 
        {
        $html3 .= '  <tr class="cart-subtotal">
        <th>Cart Subtotal</th>
        <td><span class="amount">£'.$row->product_price.'</span></td>
    </tr>

    <tr class="shipping">
        <th>Shipping and Handling</th>
        <td>0</td>
    </tr>

    <tr class="order-total">
        <th>Order Total</th>
        <td><strong><span class="amount">£'.$row->product_price.'</span></strong> </td>
    </tr>';
        }
        echo $html3;
    }


}
