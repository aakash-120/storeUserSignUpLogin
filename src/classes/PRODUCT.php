<?php
require "DB.php";
class PRODUCT extends DB
{
    public string $product_name;
    public string $product_price;
    public string $product_quantity;
    public string $product_category;
    public string $product_rating;

    public function __construct($product_name, $product_price, $product_quantity ,$product_category,$product_image,$product_discount,$product_tags,$product_description)
    {
        $this->product_name = $product_name;
        $this->product_price = $product_price;
        $this->product_quantity = $product_quantity;
        $this->product_category = $product_category;
        $this->product_image = $product_image;
        $this->product_discount = $product_discount;
        $this->product_tags = $product_tags;
        $this->product_description = $product_description;

    }

   
   
    public function addProduct()
    {
          //  echo "add product fucnoin is called";
        $sql = "INSERT INTO `Products` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_category`, `product_image`,`product_discount`,`product_tags`,`product_description`) VALUES (NULL,'$this->product_name', '$this->product_price', '$this->product_quantity', '$this->product_category', '$this->product_image', '$this->product_discount', '$this->product_tags', '$this->product_description')";

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


  /*
  display product and apply pagination in dashboard page   
  */
    public static function product_display()
    {

        $sql1 = "select count(*) from Products";
        $total_records = DB::getInstance()->query($sql1)->fetchColumn();
        $limit = 3;
        $total_page = ceil($total_records / $limit);

        if(isset($_GET["page"]))
        {
        $current_page = $_GET["page"];
        }
        else{
            $current_page = 1;
        }
        $offset= ($current_page - 1) * $limit;


        $sql = "select * from Products order by product_id desc limit $offset , $limit";
        $data = DB::getInstance()->query($sql);
        $html = "<br>";
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $html.= '<tr><td>'.$row->product_id.'</td><td>'.$row->product_name.'</td><td>'.$row->product_price.'</td><td>'.$row->product_quantity.'</td><td>'.$row->product_category.'</td><td><img width="100" height="100" src=./uploads/'.$row->product_image.'></td><td>'.$row->product_discount.'</td><td>'.$row->product_tags.'</td><td>'.$row->product_description.'</td><td><a href = "../edit.php?id='.$row->product_id.'">EDIT</a>&nbsp;&nbsp;<a href = "../delete.php?id='.$row->product_id.'">DELETE</a></td>
            </tr>';
        }

        $html .= '<nav aria-label="Page navigation example"><ul class="pagination">';
        if($current_page > 1)
        {
            $html .= '<li class="page-item"><a class="page-link" href="products.php?page='.($current_page-1).'">Previous</a></li>';
        }
        for($i=1 ; $i<= $total_page; $i++)
        {
            if($i == $current_page)
            {
                $active = "active";
            }
            else
            {
                $active = "";
            }
          $html .='<li class="page-item '.$active.'"><a class="page-link" href="products.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($current_page < $total_page)
        {
            $html .= '<li class="page-item"><a class="page-link" href="products.php?page='.($current_page+1).'">Next</a></li>';
        }
        $html .= '</ul> </nav>';

        echo $html;
    }




 //   display product and apply pagination in products category  
    public static function separate_product_display()
    {


        $sql1 = "select count(*) from Products";
        $total_records = DB::getInstance()->query($sql1)->fetchColumn();
        $limit = 3;
        $total_page = ceil($total_records / $limit);

        if(isset($_GET["page"]))
        {
        $current_page = $_GET["page"];
        }
        else{
            $current_page = 1;
        }
        $offset= ($current_page - 1) * $limit;


    
        $sql = "select * from Products";
        $data = DB::getInstance()->query($sql);
        $html = "<br>";
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
            $html.= '<tr><td>'.$row->product_id.'</td><td>'.$row->product_name.'</td><td>'.$row->product_price.'</td><td>'.$row->product_quantity.'</td><td>'.$row->product_category.'</td><td><img width="100" height="100" src=./uploads/'.$row->product_image.'></td><td>'.$row->product_discount.'</td><td>'.$row->product_tags.'</td><td>'.$row->product_description.'</td><td><a href = "../edit.php?id='.$row->product_id.'">EDIT</a>&nbsp;&nbsp;<a href = "../delete.php?id='.$row->product_id.'">DELETE</a></td>
            </tr>';
        }

        $html .= '<nav aria-label="Page navigation example"><ul class="pagination">';
        if($current_page > 1)
        {
            $html .= '<li class="page-item"><a class="page-link" href="separate_products.php?page='.($current_page-1).'">Previous</a></li>';
        }
        for($i=1 ; $i<= $total_page; $i++)
        {
            if($i == $current_page)
            {
                $active = "active";
            }
            else
            {
                $active = "";
            }
          $html .='<li class="page-item '.$active.'"><a class="page-link" href="separate_products.php?page='.$i.'">'.$i.'</a></li>';
        }
        if($current_page < $total_page)
        {
            $html .= '<li class="page-item"><a class="page-link" href="separate_products.php?page='.($current_page+1).'">Next</a></li>';
        }
        $html .= '</ul> </nav>';


        echo $html;
    }


    public static function delete($id)
    {
      $sql = "DELETE FROM Products WHERE product_id=$id";
      echo $sql;
      DB::getInstance()->query($sql);
      header("location:products.php");

    }

    public static function updateProduct($pid ,$pname, $pprice, $pquantity ,$pcategory, $file_name, $dprice, $ptags, $pdescription)
    {
       $sql = "UPDATE Products SET product_name = '$pname', product_price= '$pprice', product_quantity= '$pquantity', product_category= '$pcategory', product_image= '$file_name' , product_discount= '$dprice', product_tags= '$ptags', product_description= '$pdescription' WHERE product_id = '$pid'";
       $data = DB::getInstance()->query($sql);
       header("location:products.php");
  
    }
}
