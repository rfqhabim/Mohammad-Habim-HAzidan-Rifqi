<?php
$conn = mysqli_connect("localhost", "root", "", "classicmodels");



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


function insertProduct($data)
{
    global $conn;
    $productCode = htmlspecialchars($data["productCode"]);
    $productName = htmlspecialchars($data["productName"]);
    $productLine = htmlspecialchars($data["productLine"]);
    $productScale = htmlspecialchars($data["productScale"]);
    $productVendor = htmlspecialchars($data["productVendor"]);
    $productDescription = htmlspecialchars($data["productDescription"]);
    $quantityInStock = htmlspecialchars($data["quantityInStock"]);
    $buyPrice = htmlspecialchars($data["buyPrice"]);
    $MSRP = htmlspecialchars($data["MSRP"]);


    $query = "INSERT INTO products VALUES ('$productCode', '$productName', '$productLine','$productScale', '$productVendor','$productDescription',$quantityInStock,$buyPrice,$MSRP)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function insertCustomer($data)
{
    global $conn;
    $customerNumber = htmlspecialchars($data["customerNumber"]);
    $customerName = htmlspecialchars($data["customerName"]);
    $contactLastName = htmlspecialchars($data["contactLastName"]);
    $contactFirstName = htmlspecialchars($data["contactFirstName"]);
    $phone = htmlspecialchars($data["phone"]);
    $addresLine1 = htmlspecialchars($data["addresLine1"]);
    $addresLine2 = htmlspecialchars($data["addresLine2"]);
    $city = htmlspecialchars($data["city"]);
    $state = htmlspecialchars($data["state"]);
    $postalCode = htmlspecialchars($data["postalCode"]);
    $country = htmlspecialchars($data["country"]);
    $salesRepEmployeeNumber = htmlspecialchars($data["salesRepEmployeeNumber"]);
    $creditLimit = htmlspecialchars($data["creditLimit"]);



    $query = "INSERT INTO customers VALUES ($customerNumber, '$customerName', '$contactLastName','$contactFirstName', '$phone','$addresLine1','$addresLine2','$city','$state','$postalCode','$country', $salesRepEmployeeNumber,$creditLimit)";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}