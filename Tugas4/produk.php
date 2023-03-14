<?php 
  require ('conn.php');
  $i=1;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
      integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
      crossorigin="anonymous"
    ></script>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container">
        <h2 class="navbar-brand">Information</h2>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
            <a class="nav-link active" aria-current="produk" href="produk.php">Product</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="index.php">Customer</a>
            </li>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
        <h1 class= "mb-5 mt-5">DATA PRODUCTS</h1>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
             <th scope="col">No</th>
            <th scope="col">Product Code</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Line</th>
            <th scope="col">Product Scale</th>
            <th scope="col">Product Vendor</th>
            <th scope="col">Product Description</th>
            <th scope="col">Quantity In Stock</th>
            <th scope="col">Buy Price</th>
            <th scope="col">MRSP</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            //proses menampilkan data dari database:
            //siapkan query SQL
            $query = "SELECT * FROM products";
            $result = mysqli_query(connection(),$query);
          ?>
          <?php while($data = mysqli_fetch_array($result)): ?>
                  

          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["productCode"]; ?></td>
            <td><?php echo $data["productName"]; ?></td>
            <td><?php echo $data["productLine"]; ?></td>
            <td><?php echo $data["productScale"]; ?></td>
            <td><?php echo $data["productVendor"]; ?></td>
            <td><?php echo $data["productDescription"]; ?></td>
            <td><?php echo $data["quantityInStock"]; ?></td>
            <td><?php echo $data["buyPrice"]; ?></td>
            <td><?php echo $data["MSRP"]; ?></td>
          </tr>
          <?php $i++; ?>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
