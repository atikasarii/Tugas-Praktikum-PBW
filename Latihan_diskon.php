<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['npm']) && !empty($_POST['nama']) && !empty($_POST['prodi']) && !empty($_POST['semester']) && !empty($_POST['ukt'])) {
        $npm      = htmlspecialchars($_POST['npm']);
        $nama     = htmlspecialchars($_POST['nama']);
        $prodi    = htmlspecialchars($_POST['prodi']);
        $semester = $_POST['semester'];
        $ukt      = $_POST['ukt'];

        if ($ukt >= 5000000 && $semester > 8) {
            $diskon = 15;
        } elseif ($ukt >= 5000000) {
            $diskon = 10;
        } else {
            $diskon = 0;
        }

        $potongan      = $ukt * ($diskon / 100);
        $yang_dibayar  = $ukt - $potongan;

        echo "NPM : " . $npm . "<br>";
        echo "NAMA : " . strtoupper($nama) . "<br>";
        echo "PRODI : " . strtoupper($prodi) . "<br>";
        echo "SEMESTER : " . $semester . "<br>";
        echo "BIAYA UKT : Rp. " . number_format($ukt, 0, ',', '.') . ",-<br>";
        echo "DISKON : " . $diskon . "% (otomatis ditentukan oleh if)<br>";
        echo "YANG HARUS DIBAYAR : Rp. " . number_format($yang_dibayar, 0, ',', '.') . ",- (otomatis ditentukan oleh if)<br>";
    } else {
        echo "Semua field tidak boleh kosong!<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Diskon UKT Mahasiswa</title>
</head>
<body>
    <h3>Input Data Mahasiswa</h3>
    <form method="post" action="">
        NPM      : <input type="text" name="npm"><br>
        Nama     : <input type="text" name="nama"><br>
        Prodi    : <input type="text" name="prodi"><br>
        Semester : <input type="number" name="semester"><br>
        Biaya UKT: <input type="number" name="ukt"><br>
        <input type="submit" value="Proses">
    </form>
</body>
</html>