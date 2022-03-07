<?php
require "DB.php";
class PRODUCT extends DB
{
    public string $product_name;
    public string $product_price;
    public string $product_quantity;
    public string $product_category;
    public string $product_rating;

    public function __construct($product_name, $product_price, $product_quantity ,$product_category,$product_rating)
    {
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_quantity = $product_quantity;
        $this->product_category = $product_category;
        $this->product_rating = $product_rating;

    }

    public function addProduct()
    {
        $sql = "INSERT INTO `Products` (`id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_rating`) VALUES (NULL,'$this->product_name', '$this->product_price', '$this->product_quantity', '$this->product_category', '$this->product_rating')";
        try {
            DB::getInstance()->exec($sql);
            return true;
        } catch (PDOException $e) {
            echo $e;
            return false;
        }
    }
}
