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



    public static function cartDisplaySubtotal($pid)
    {

        $html3 = "";
        $sql = "select * from Products where product_id='$pid'";

        $data = DB::getInstance()->query($sql);
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $html3 .= '  <tr class="cart-subtotal">
        <th>Cart Subtotal</th>
        <td><span class="amount">£' . $row->product_price . '</span></td>
    </tr>

    <tr class="shipping">
        <th>Shipping and Handling</th>
        <td>0</td>
    </tr>

    <tr class="order-total">
        <th>Order Total</th>
        <td><strong><span class="amount">£' . $row->product_price . '</span></strong> </td>
    </tr>';
        }
        echo $html3;
    }




    public static function itemAddedToCart($cart_total)
    {
        
        // echo "<pre>inside item addto cart functoin";
        // print_r($_SESSION);
        // echo "</pre>";

        foreach ($_SESSION['cart'] as $key => $value) {

            echo $_SESSION['cart'][$key]['pid'];
            $p = $_SESSION['cart'][$key]['pid'];
            $q = $_SESSION['cart'][$key]['quantity'];
           
            $html3 = "";
            $sql = "select * from Products where product_id='$p'";

            $data = DB::getInstance()->query($sql);
            while ($row = $data->fetch(PDO::FETCH_OBJ)) {

                $html3 .= '<tr>   <td class="product-remove">
                <a title="Remove this item" class="remove" href="cart.php?action='.$row->product_id.'">×</a> 
            </td>

            <td class="product-thumbnail">
                <a href="single-product.html"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src=./uploads/' . $row->product_image . '></a>
            </td>

            <td class="product-name">
                <a href="single-product.php">' . $row->product_name . '</a> 
            </td>

            <td class="product-price">
                <span class="amount">£' . $row->product_price . '</span> 
            </td>

            <td class="product-quantity">
                <div class="quantity buttons_added">
                <a href="cart.php?id='.$row->product_id.'&button=minus">[-]</a>
                  
                    <input type="number" size="4" class="input-text qty text" title="Qty" value="'.$q.'" min="0" step="1">
                   
                    <a href="cart.php?id='.$row->product_id.'&button=plus">[+]</a>
                </div>
            </td>

            <td class="product-subtotal">
                <span class="amount">£' . $q * ($row->product_price - ($row->product_price * ($row->product_discount / 100))) . '</span> 
            </td>';
                $cart_total += $q*($row->product_price - ($row->product_price * ($row->product_discount / 100)));
            }
           // $html3 .= '<h1>' . $cart_total . '</h1>';
            $html3 .= '</tr>';
            echo $html3;
        }
        return $cart_total;
    }
}
