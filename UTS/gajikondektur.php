<?php
require('function.php');

$kondektur = query("SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
                    FROM kondektur b
                    JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
                    GROUP BY b.id_kondektur, tanggal;");

if (isset($_POST["submitFilter"])) {
    $kondektur = query(filterGajiKondektur($_POST));
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
        <h3 style="text-align: center">DATA GAJI DRIVER</h3>

        <form action="" method="post" enctype="multipart/form-data" style="margin-top: 10px;">
            <div class="mb-3 d-flex" style="width: 200px;">
                <select class="form-select me-2" name="bulan" id="bulan">
                    <option selected>Plih</option>
                    <option value="0" selected>All</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <button type="submit" id="submitFilter" name="submitFilter" class="btn btn-secondary">Filter</button>
            </div>
        </form>
    </div>
    <!-- Akhir header -->

    <!-- Main content -->
    <div class="container scrollable d-flex justify-content-start" style="width: 1000px;">
        <table class="table table-bordered">
            <thead class="table-primary">
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Id Kondektur</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Km</th>
                    <th scope="col">Gaji</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($kondektur as $row) : ?>
                    <tr class="text-center">
                        <td scope=" col" class=""><?php echo $i; ?></td>
                        <td><?php echo $row["id_kondektur"]; ?></td>
                        <td><?php echo $row["nama"]; ?></td>
                        <td><?php echo $row["tanggal"]; ?></td>
                        <td><?php echo $row["jumlah_km"]; ?></td>
                        <td><?php echo $row["gaji"]; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <!-- Akhir main content -->

    <!-- Box icons -->
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>

</html>