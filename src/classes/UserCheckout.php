<?php

//require "utils.php";
class UserCheckout extends DB
{

    public string $billing_country;
    public string $billing_first_name;
    public string $billing_last_name;
    public string $billing_company;
    public string $billing_address_1;
    public string $billing_address_2;
    public string $billing_city;
    public string $billing_state;
    public string $billing_postcode;
    public string $billing_email;
    public string $billing_phone;
    public string $account_password;
    public string $ship_to_different_address;
    public string $shipping_country;
    public string $shipping_first_name;
    public string $shipping_last_name;
    public string $shipping_company;
    public string $shipping_address_1;
    public string $shipping_address_2;
    public string $shipping_city;
    public string $shipping_state;
    public string $shipping_postcode;
    public string $order_comments;
    public string $shipping_method;
    public string $payment_method;
    public string $user_id_from_session;
    

    public function __construct($billing_country, $billing_first_name, $billing_last_name, $billing_company, $billing_address_1, $billing_address_2, $billing_city, $billing_state, $billing_postcode, $billing_email, $billing_phone, $account_password, $ship_to_different_address, $shipping_country, $shipping_first_name, $shipping_last_name, $shipping_company, $shipping_address_1, $shipping_address_2, $shipping_city, $shipping_state, $shipping_postcode, $order_comments, $shipping_method ,$payment_method , $user_id_from_session) {

        $this->billing_country = $billing_country;
        $this->billing_first_name = $billing_first_name;
        $this->billing_last_name = $billing_last_name;
        $this->billing_company = $billing_company;
        $this->billing_address_1 = $billing_address_1;
        $this->billing_address_2 = $billing_address_2;
        $this->billing_city = $billing_city;
        $this->billing_state = $billing_state;
        $this->billing_postcode = $billing_postcode;
        $this->billing_email = $billing_email;
        $this->billing_phone = $billing_phone;
        $this->account_password = $account_password;
        $this->ship_to_different_address = isset($ship_to_different_address)?$ship_to_different_address:0;
        $this->shipping_country = $shipping_country;
        $this->shipping_first_name = $shipping_first_name;
        $this->shipping_last_name = $shipping_last_name;
        $this->shipping_company = $shipping_company;
        $this->shipping_address_1 = $shipping_address_1;
        $this->shipping_address_2 = $shipping_address_2;
        $this->shipping_city = $shipping_city;
        $this->shipping_state = $shipping_state;
        $this->shipping_postcode = $shipping_postcode;
        $this->order_comments = $order_comments;
        $this->shipping_method = $shipping_method;
        $this->payment_method = $payment_method;
        $this->user_id_from_session = $user_id_from_session;

    }

    public function addcheckoutDetail()
    {
        if($this->ship_to_different_address)
        {   
        $sql = "INSERT INTO `checkout` (`checkout_id`, `billing_country`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address_1`,`billing_address_2`,`billing_city`,`billing_state`,`billing_postcode`,`billing_email`,`billing_phone`,`account_password`,`ship_to_different_address`,`shipping_country`,`shipping_first_name`,`shipping_last_name`,`shipping_company`,`shipping_address_1`,`shipping_address_2`,`shipping_city`,`shipping_state`,`shipping_postcode`,`order_comments`,`shipping_method`,`payment_method`, `uid_session`) VALUES (NULL,'$this->billing_country', '$this->billing_first_name', '$this->billing_last_name', '$this->billing_company', '$this->billing_address_1', '$this->billing_address_2', '$this->billing_city', '$this->billing_state', '$this->billing_postcode', '$this->billing_email', '$this->billing_phone', '$this->account_password', '$this->ship_to_different_address', '$this->shipping_country', '$this->shipping_first_name', '$this->shipping_last_name', '$this->shipping_company', '$this->shipping_address_1', '$this->shipping_address_2', '$this->shipping_city', '$this->shipping_state', '$this->shipping_postcode', '$this->order_comments', '$this->shipping_method', '$this->payment_method','$this->user_id_from_session')";
        }
        else{
            $sql = "INSERT INTO `checkout` (`checkout_id`, `billing_country`, `billing_first_name`, `billing_last_name`, `billing_company`, `billing_address_1`,`billing_address_2`,`billing_city`,`billing_state`,`billing_postcode`,`billing_email`,`billing_phone`,`account_password`,`ship_to_different_address`,`shipping_country`,`shipping_first_name`,`shipping_last_name`,`shipping_company`,`shipping_address_1`,`shipping_address_2`,`shipping_city`,`shipping_state`,`shipping_postcode`,`order_comments`,`shipping_method`,`payment_method`, `uid_session`) VALUES (NULL,'$this->billing_country', '$this->billing_first_name', '$this->billing_last_name', '$this->billing_company', '$this->billing_address_1', '$this->billing_address_2', '$this->billing_city', '$this->billing_state', '$this->billing_postcode', '$this->billing_email', '$this->billing_phone', '$this->account_password', '$this->ship_to_different_address', '$this->billing_country', '$this->billing_first_name', '$this->billing_last_name', '$this->billing_company', '$this->billing_address_1', '$this->billing_address_2', '$this->billing_city', '$this->billing_state', '$this->billing_postcode', '$this->order_comments', '$this->shipping_method', '$this->payment_method','$this->user_id_from_session')";
        }

        // echo $sql;
        // die();
        try {
            DB::getInstance()->exec($sql);
            echo "<center>product added sucessfully</center>";
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }

}