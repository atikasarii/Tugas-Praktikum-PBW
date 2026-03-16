<!DOCTYPE html>
<html>
<head>
    <title>Perhitungan Total Pembelian</title>
    <style>
        body{
            font-family: Arial, sans-serif;
        }
        .box{
            width: 400px;
            border: 2px solid black;
            padding: 15px;
            margin: 40px auto;
        }
        h2{
            text-align: center;
        }
    </style>
</head>
<body>

<?php

define("PAJAK", 0.10);

$barang = [
    "nama" => "Keyboard",
    "harga" => 150000
];


$jumlah_beli = 2;
$total_sebelum_pajak = $barang["harga"] * $jumlah_beli;
$jumlah_pajak = $total_sebelum_pajak * PAJAK;
$total_bayar = $total_sebelum_pajak + $jumlah_pajak;
?>

<div class="box">
    <h2>Perhitungan Total Pembelian (Dengan Array)</h2>
    <hr>

    <p>Nama Barang: <?php echo $barang["nama"]; ?></p>
    <p>Harga Satuan: Rp <?php echo number_format($barang["harga"],0,",","."); ?></p>
    <p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
    <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total_sebelum_pajak,0,",","."); ?></p>
    <p>Pajak (10%): Rp <?php echo number_format($jumlah_pajak,0,",","."); ?></p>
    <p><b>Total Bayar: Rp <?php echo number_format($total_bayar,0,",","."); ?></b></p>
</div>

</body>
</html>