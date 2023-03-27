<?php 
  require ('conn.php');
  $i=1;

  require('function.php');

  $customer = query("SELECT * FROM customers")
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer</title>
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
              <a class="nav-link active" aria-current="product" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="customer.php">Customer</a>
            </li>
            </li>
          </ul>
        </div>

        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            More
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="index.php">Home</a></li>
            <li><a class="dropdown-item" href="insertcustomer.php">Insert</a></li>
            <li><a class="dropdown-item" href="#">Delete</a></li>
            <li><a class="dropdown-item" href="#">Update</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <h1 class= "mb-5 mt-5">DATA CUSTOMERS</h1>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Customer Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Contact L.Name</th>
            <th scope="col">Contact F.Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Addres Line 1</th>
            <th scope="col">Address Line 2</th>
            <th scope="col">City</th>
            <th scope="col">State</th>
            <th scope="col">Postal Code</th>
            <th scope="col">Country</th>
            <th scope="col">Sales Rep Employee Number</th>
            <th scope="col">Credit Limit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            //proses menampilkan data dari database:
            //siapkan query SQL
            $query = "SELECT * FROM customers";
            $result = mysqli_query(connection(),$query);
          ?>
          <?php while($data = mysqli_fetch_array($result)): ?>
                  

          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['customerNumber'];  ?></td>
            <td><?php echo $data['customerName'];  ?></td>
            <td><?php echo $data['contactLastName'];  ?></td>
            <td><?php echo $data['contactFirstName'];  ?></td>
            <td><?php echo $data['phone'];  ?></td>
            <td><?php echo $data['addressLine1'];  ?></td>
            <td><?php echo $data['addressLine2'];  ?></td>
            <td><?php echo $data['city'];  ?></td>
            <td><?php echo $data['state'];  ?></td>
            <td><?php echo $data['postalCode'];  ?></td>
            <td><?php echo $data['country'];  ?></td>
            <td><?php echo $data['salesRepEmployeeNumber'];  ?></td>
            <td><?php echo $data['creditLimit'];  ?></td>
          </tr>
          <?php $i++; ?>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>

  </body>
</html>
