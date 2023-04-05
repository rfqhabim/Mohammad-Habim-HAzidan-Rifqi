<?php
require('function.php');

$kondektur = query("SELECT * FROM kondektur");

if (isset($_POST["search"])) {
  $kondektur = searchKondektur($_POST["keyword"]);
}

if (isset($_POST['submitClose'])) {
  header("Location: kondektur.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>

 <!-- Link CSS -->
 <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="reset.css" />

  <!-- Link Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <!-- Navbar -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a href="index.php" class="nav-item d-flex align-items-center" style="
                        text-decoration: none;
                        font-size: 23px;
                        color: rgb(36, 36, 32);
                        font-weight: 700;
                    ">
                    <img class="nav-link" src="logo.png" alt="" />
                    <span class="nav-link">TransUPN</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
                    <form class="d-flex" role="search" method="post">
                        <input class="form-control me-2" name="keyword" type="search" placeholder="Search ID Kondektur" aria-label="Search">
                        <button class="btn btn-outline-light" name="search" type="submit">Search</button>
                    </form>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Display
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="bus.php">Bus</a></li>
                            <li><a class="dropdown-item" href="driver.php">Driver</a></li>
                            <li><a class="dropdown-item" href="kondektur.php">Kondektur</a></li>
                            <li><a class="dropdown-item" href="transupn.php">TransUPN</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Gaji
                            </a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="gajidriver.php">Driver</a></li>
                            <li>
                                <a class="dropdown-item" href="gajikondektur.php">Kondektur</a>
                            </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

  <!-- Header -->
  <div class="container" style="margin-top: 70px;">
    <h3 style="text-align: center">DATA KONDEKTOR</h3>
  </div>
  <!-- Akhir header -->

 <!-- Button trigger modal insert -->
 <div class="container">
    <button type="button" class="btn btn-success insert-button text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Tambah Data
    </button>
  </div>
  <!-- Akhir button trigger modal insert -->

  <!-- Alert insert -->
  <div class="container">
    <?php
    if (isset($_POST["submitInsert"])) {
      if (insertKondektur($_POST) > 0) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Berhasil!</strong> Menyimpan data kondektur.
                      <form method="POST" action=""><button type="submit" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-top: 20px;">
                      <strong>Gagal!</strong> Menyimpan data kondektur.
                      <form method="POST" action=""><button type="button" name="submitClose" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></form>
                  </div>';
      }
    }
    ?>
  </div>
  <!-- Akhir alert insert -->

  <!-- Main content -->
  <div class="container scrollable d-flex justify-content-start" style="width: 700px;">
    <table class="table table-bordered">
      <thead class="table-primary">
        <tr class="text-center">
          <th scope="col">No</th>
          <th>Action</th>
          <th scope="col">Id Kondektur</th>
          <th scope="col">Nama</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1; ?>
        <?php foreach ($kondektur as $row) : ?>
          <tr class="text-center">
            <td scope=" col" class=""><?php echo $i; ?></td>
            <td class="d-flex justify-content-center">
              <a class="btn btn-warning btn-sm" style="margin-right: 5px;" data-bs-toggle="modal" data-bs-target="">Update</a>
              <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="">Delete</a>
            </td>
            <td><?php echo $row["id_kondektur"]; ?></td>
            <td><?php echo $row["nama"]; ?></td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- Akhir main content -->

  <!-- Modal insert -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <!-- Form input -->
          <form class="container" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" id="nama" placeholder="">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="submitInsert" class="btn btn-primary">Tambah</button>
        </div>
        </form>
        <!-- Akhir form input -->
      </div>
    </div>
  </div>
  <!-- Akhir modal insert -->

  <!-- Box icons -->
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>