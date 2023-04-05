<?php
// Koneksi database
$conn = mysqli_connect("localhost", "root", "", "transupn");

// Query
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Search data bus
function searchBus($keyword)
{
    $query =  "SELECT * FROM bus WHERE id_bus LIKE '%$keyword%' OR 
    plat LIKE '%$keyword%' OR status LIKE '%$keyword%'";

    return query($query);
}

// Search data driver
function searchDriver($keyword)
{
    $query =  "SELECT * FROM driver WHERE id_driver LIKE '%$keyword%' OR 
    nama LIKE '%$keyword%' OR no_sim LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";

    return query($query);
}

// Search data kondektur
function searchKondektur($keyword)
{
    $query =  "SELECT * FROM kondektur WHERE id_kondektur LIKE '%$keyword%' OR 
    nama LIKE '%$keyword%'";

    return query($query);
}

// Search data trans UPN
function searchTransUpn($keyword)
{
    $query =  "SELECT * FROM trans_upn WHERE id_trans_upn LIKE '%$keyword%' OR 
    id_kondektur LIKE '%$keyword%' OR id_bus LIKE '%$keyword%' OR id_driver LIKE '%$keyword%' OR 
    jumlah_km LIKE '%$keyword%' OR tanggal LIKE '%$keyword%'";

    return query($query);
}

// Insert data bus
function insertBus($data)
{
    global $conn;
    $plat = htmlspecialchars($data["plat"]);
    $status = htmlspecialchars($data["status"]);

    $query = "INSERT INTO bus (`id_bus`, `plat`, `status`) VALUES (' ', '$plat', '$status')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data driver
function insertDriver($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);
    $noSIM = htmlspecialchars($data["no_sim"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "INSERT INTO driver (`id_driver`, `nama`, `no_sim`, `alamat`) VALUES (' ', '$nama', '$noSIM','$alamat')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data driver
function insertKondektur($data)
{
    global $conn;
    $nama = htmlspecialchars($data["nama"]);

    $query = "INSERT INTO kondektur (`id_kondektur`, `nama`) VALUES (' ', '$nama')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Insert data trans upn
function insertTransUpn($data)
{
    global $conn;
    $idKondektur = htmlspecialchars($data["id_kondektur"]);
    $idBus = htmlspecialchars($data["id_bus"]);
    $idDriver = htmlspecialchars($data["id_driver"]);
    $jumlahKm = htmlspecialchars($data["jumlah_km"]);
    $tanggal = htmlspecialchars($data["tanggal"]);

    $query = "INSERT INTO trans_upn (`id_trans_upn`, `id_kondektur`, `id_bus`, `id_driver`, `jumlah_km`, `tanggal`) VALUES (' ', $idKondektur,$idBus,$idDriver,'$jumlahKm', '$tanggal')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Update data product
function updateBus($data)
{
    global $conn;
    // $idBus = htmlspecialchars($data["id_bus"]);
    $idBus = htmlspecialchars($data["id_bus"]);
    $plat = htmlspecialchars($data["plat"]);
    $status = htmlspecialchars($data["status"]);

    $query = "UPDATE bus
            SET plat = '$plat',
                status = '$status'
            WHERE id_bus = $idBus";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function updateDriver($data)
{
    global $conn;
    // $idDriver = htmlspecialchars($data["id_driver"]);
    $idDriver = htmlspecialchars($data["id_driver"]);
    $nama = htmlspecialchars($data["nama"]);
    $no_sim = htmlspecialchars($data["no_sim"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $query = "UPDATE driver
            SET nama = '$nama',
                no_sim = '$no_sim'
                alamat = '$alamat'
            WHERE id_bus = $idDriver";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// filter bus
function filterBus($data)
{
    if ($data["status"] == 0) {
        $query = "SELECT * FROM bus WHERE status = '0'";
    } elseif ($data["status"] == 1) {
        $query = "SELECT * FROM bus WHERE status = '1'";
    } elseif ($data["status"] == 2) {
        $query = "SELECT * FROM bus WHERE status = '2'";
    } elseif ($data["status"] == 3) {
        $query = "SELECT * FROM bus";
    }

    $bus = $query;
    return $bus;
}

// filter gaji driver
function filterGajiDriver($data)
{
    if ($data["bulan"] == 0) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        GROUP BY b.id_driver, t.tanggal;";
    } elseif ($data["bulan"] == 1) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-01%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 2) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-02%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 3) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-03%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 4) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-04%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 5) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-05%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 6) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-06%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 7) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-07%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 8) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-08%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 9) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-09%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 10) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-10%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 11) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-11%'
        GROUP BY b.id_driver, t.tanggal;";
    } else if ($data["bulan"] == 12) {
        $query = "SELECT b.id_driver, b.nama, b.no_sim, b.alamat, t.jumlah_km, t.tanggal, SUM(t.jumlah_km * 3000) AS gaji
        FROM driver b
        JOIN trans_upn t ON b.id_driver = t.id_driver
        WHERE t.tanggal LIKE '%2023-12%'
        GROUP BY b.id_driver, t.tanggal;";
    }

    $gajiDriver = $query;
    return $gajiDriver;
}

// filter gaji driver
function filterGajiKondektur($data)
{
    if ($data["bulan"] == 0) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        GROUP BY b.id_kondektur, tanggal;";
    } elseif ($data["bulan"] == 1) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-01%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 2) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-02%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 3) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-03%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 4) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-04%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 5) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-05%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 6) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-06%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 7) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-07%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 8) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-08%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 9) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-09%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 10) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-10%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 11) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-11%'
        GROUP BY b.id_kondektur, tanggal;";
    } else if ($data["bulan"] == 12) {
        $query = "SELECT b.id_kondektur, b.nama,t.`jumlah_km`, tanggal,SUM(t.jumlah_km * 1500) AS gaji
        FROM kondektur b
        JOIN trans_upn t ON b.id_kondektur = t.id_kondektur
        WHERE t.tanggal LIKE '%2023-12%'
        GROUP BY b.id_kondektur, tanggal;";
    }

    $gajiDriver = $query;
    return $gajiDriver;
}

// function jarakbus
function totalJarak()
{
    $query = "SELECT b.id_bus, b.plat, b.status,SUM(t.jumlah_km) AS total_jarak
    FROM bus b
    JOIN trans_upn t ON b.id_bus = t.id_bus
    GROUP BY b.id_bus;";

    $bus = $query;
    return $bus;
}

// Delete data product
function deleteProduct($productCode)
{
    global $conn;

    $query = "DELETE FROM products WHERE productCode = '$productCode'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Delete data customer
function deleteCustomer($customerNumber)
{
    global $conn;

    $query = "DELETE FROM customers WHERE customerNumber = $customerNumber";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
