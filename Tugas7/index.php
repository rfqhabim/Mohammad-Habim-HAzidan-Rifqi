<?php
require_once('product.php');
require_once('cdmusic.php');
require_once('cdrack.php');

echo "<hr>";
echo "PRODUCT";
echo "<br><br>";

//product1
$product1 = new product();
$product1->setName("Feast.");
$product1->setPrice("300000");
$product1->setDiscount("15");

echo "Nama Produk : " . $product1->getName() . "<br>";
echo "Harga Produk : " . $product1->getPrice() . "<br>";
echo "Diskon : " . $product1->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 2
$product2 = new product();
$product2->setName("Hindia");
$product2->setPrice("350000");
$product2->setDiscount("10");

echo "Nama Produk : " . $product2->getName() . "<br>";
echo "Harga Produk : " . $product2->getPrice() . "<br>";
echo "Diskon : " . $product2->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 3
$product3 = new product();
$product3->setName("Fourtwenty");
$product3->setPrice("250000");
$product3->setDiscount("10");

echo "Nama Produk : " . $product3->getName() . "<br>";
echo "Harga Produk : " . $product3->getPrice() . "<br>";
echo "Diskon : " . $product3->getDiscount() . "%" . "<br>";

echo "<br>";

// Product 4
$product4 = new product();
$product4->setName("d'Masiv");
$product4->setPrice("500000");
$product4->setDiscount("12");

echo "Nama Produk : " . $product4->getName() . "<br>";
echo "Harga Produk : " . $product4->getPrice() . "<br>";
echo "Diskon : " . $product4->getDiscount() . "%" . "<br>";

echo "<br>";

echo "<hr>";
echo "CD MUSIC";
echo "<br><br>";

// Music 1
$music1 = new CDMusic();
$music1->setName($product1->getName());
$music1->setPrice($product1->getPrice());
$music1->setDiscount($product1->getDiscount());
$music1->setArtist("Daniel Bhaskara Putra");
$music1->setGenre("rock");

echo "Nama Produk : " . $music1->getName() . "<br>";
echo "Harga Produk : " . $music1->getPrice() . "<br>";
echo "Diskon : " . $music1->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music1->getArtist() . "<br>";
echo "Genre Musik : " . $music1->getGenre() . "<br>";

echo "<br>";

// Music 2
$music2 = new CDMusic();
$music2->setName($product2->getName());
$music2->setPrice($product2->getPrice());
$music2->setDiscount($product2->getDiscount());
$music2->setArtist("Daniel Baskara Putra");
$music2->setGenre("Rock");

echo "Nama Produk : " . $music2->getName() . "<br>";
echo "Harga Produk : " . $music2->getPrice() . "<br>";
echo "Diskon : " . $music2->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music2->getArtist() . "<br>";
echo "Genre Musik : " . $music2->getGenre() . "<br>";


echo "<br>";

// Music 3
$music3 = new CDMusic();
$music3->setName($product3->getName());
$music3->setPrice($product3->getPrice());
$music3->setDiscount($product3->getDiscount());
$music3->setArtist("Ari Lesmana");
$music3->setGenre("Folk Pop");

echo "Nama Produk : " . $music3->getName() . "<br>";
echo "Harga Produk : " . $music3->getPrice() . "<br>";
echo "Diskon : " . $music3->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music3->getArtist() . "<br>";
echo "Genre Musik : " . $music3->getGenre() . "<br>";

echo "<br>";

// Music 4
$music4 = new CDMusic();
$music4->setName($product4->getName());
$music4->setPrice($product4->getPrice());
$music4->setDiscount($product4->getDiscount());
$music4->setArtist("Rian Eky Pradipta");
$music4->setGenre("Rock Alternatif, Pop Rock");

echo "Nama Produk : " . $music4->getName() . "<br>";
echo "Harga Produk : " . $music4->getPrice() . "<br>";
echo "Diskon : " . $music4->getDiscount() . "%" . "<br>";
echo "Nama Artis : " . $music4->getArtist() . "<br>";
echo "Genre Musik : " . $music4->getGenre() . "<br>";

echo "<br>";
echo "<hr>";
echo "CD RACK";
echo "<br><br>";

// Rack 1
$rack1 = new CDRack();
$rack1->setName($product3->getName());
$rack1->setPrice($product3->getPrice());
$rack1->setDiscount($product3->getDiscount());
$rack1->setCapacity("200");
$rack1->setModel("Tumpuk");

echo "Nama Produk : " . $rack1->getName() . "<br>";
echo "Harga Produk : " . $rack1->getPrice() . "<br>";
echo "Diskon : " . $rack1->getDiscount() . "%" . "<br>";
echo "Kapsitas : " . $rack1->getCapacity() . "<br>";
echo "Model : " . $rack1->getModel() . "<br>";

echo "<br>";

// Rack 2
$rack2 = new CDRack();
$rack2->setName($product4->getName());
$rack2->setPrice($product4->getPrice());
$rack2->setDiscount($product4->getDiscount());
$rack2->setCapacity("1000");
$rack2->setModel("Susun");

echo "Nama Produk : " . $rack2->getName() . "<br>";
echo "Harga Produk : " . $rack2->getPrice() . "<br>";
echo "Diskon : " . $rack2->getDiscount() . "%" . "<br>";
echo "Kapasitas: " . $rack2->getCapacity() . "<br>";
echo "Model : " . $rack2->getModel() . "<br>";

echo"<br>";

// Rack 3
$rack3 = new CDRack();
$rack3->setName($product2->getName());
$rack3->setPrice($product2->getPrice());
$rack3->setDiscount($product2->getDiscount());
$rack3->setCapacity("900");
$rack3->setModel("Susun");

echo "Nama Produk : " . $rack3->getName() . "<br>";
echo "Harga Produk : " . $rack3->getPrice() . "<br>";
echo "Diskon : " . $rack3->getDiscount() . "%" . "<br>";
echo "Kapsitas : " . $rack3->getCapacity() . "<br>";
echo "Model : " . $rack3->getModel() . "<br>";

echo "<br>";

// Rack 2
$rack4 = new CDRack();
$rack4->setName($product1->getName());
$rack4->setPrice($product1->getPrice());
$rack4->setDiscount($product1->getDiscount());
$rack4->setCapacity("1000");
$rack4->setModel("Susun");

echo "Nama Produk : " . $rack4->getName() . "<br>";
echo "Harga Produk : " . $rack4->getPrice() . "<br>";
echo "Diskon : " . $rack4->getDiscount() . "%" . "<br>";
echo "Kapasitas: " . $rack4->getCapacity() . "<br>";
echo "Model : " . $rack4->getModel() . "<br>";
echo "<hr>";