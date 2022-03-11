
<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:dashboard.php");
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Dashboard Template · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">



  <!-- Bootstrap core CSS -->
  <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="./assets/css/dashboard.css" rel="stylesheet">
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="logout.php">Sign out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="products.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file"></span>
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="separate_products.php">
                <span data-feather="shopping-cart"></span>
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="users"></span>
                Customers
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Reports
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Integrations
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Add Product</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>

        <?php 
        require "./classes/DB.php";
        $fk = $_GET['id'];
       // echo "fk = ".$fk;
        $sql = "select * from Products where product_id = '$fk'";
        $data = DB::getInstance()->query($sql);
        $html = "";
        while ($row = $data->fetch(PDO::FETCH_OBJ)) {
  ?>

        <form class="row g-3" method = "POST" action="dummy.php" enctype="multipart/form-data">
        <div class="col-md-8">
            <!-- <label for="inputEmail4" class="form-label">Product ID</label> -->
            <input type="hidden" class="form-control" id="productId" name = "pid" value = "<?php echo $row->product_id ?>">
          </div>
        
          <div class="col-md-8">
            <label for="inputEmail4" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productName" name = "pname" value = "<?php echo $row->product_name ?>" required>
          </div>
          <div class="col-md-8">
            <label for="inputPassword4" class="form-label">Product Price</label>
            <input type="number" class="form-control" id="productPrice" name = "pprice" value = "<?php echo $row->product_price ?>" required>
          </div>
          <div class="col-8">
          <label for="inputPassword4" class="form-label">Discount</label>
            <input type="number" class="form-control" id="discountPrice" name = "dprice" value = "<?php echo $row->product_discount ?>" required>
          </div>
          <div class="col-8">
            <label for="inputAddress" class="form-label">Product Quantity</label>
            <input type="number" class="form-control" id="productQuantity" name = "pquantity" value = "<?php echo $row->product_quantity ?>" required >
          </div>
          <div class="col-8">
            <label for="inputAddress2" class="form-label">Product Category </label>
            <input type="text" class="form-control" id="ProductCategory" name = "pcategory" value = "<?php echo $row->product_category ?>" required>
          </div>
          <div class="col-8">
            <label for="inputAddress2" class="form-label">Product Tags </label>
            <input type="text" class="form-control" id="ProductTags" name = "ptags" value = "<?php echo $row->product_tags ?>" required>
          </div>
          <div class="col-md-8">
            <label for="inputCity" class="form-label">Product Description</label>
            <input type="text" class="form-control" id="productDescription" name = "pdescription" value = "<?php echo $row->product_description ?>" required>
          </div>
          <div class="col-md-8">
            <label for="inputCity" class="form-label">Product Image</label>
            <input type="file" class="form-control" id="productImage" name = "pimage" value = "<?php echo $row->product_image ?>" required>
          </div>


      <?php } ?>
      
          <div class="col-12">
            <button type="submit" class="btn btn-primary" name = "submit_button">Add Product</button>
          </div>
        </form>
      </main>
    </div>
  </div>

  <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>



<?php
// require "classes/PRODUCT.php";

// if(isset($_GET["submit_button"]))
// {
// $pname =  $_GET["pname"];
// $pprice =  $_GET["pprice"];
// $pquantity =  $_GET["pquantity"];
// $pcategory =  $_GET["pcategory"];
// $prating =  $_GET["prating"];

// $product_obj = new PRODUCT($pname, $pprice, $pquantity ,$pcategory,$prating);
// $product_obj->addProduct();



// echo $pname;
// echo $pprice;
// echo $pquantity;
// echo $pcategory;
// echo $prating;


// }

?>



