<?php
    session_start();
    $hasil=0;

    if (isset($_POST['angka'])) {
        $angka=$_POST['angka'];

        if ($angka=="C") {  //ketika tombol C diklik
            $_SESSION['isi']=""; //mengemnalikan session jadi kosong
        }elseif ($angka=="=") {
            $hitung=$_SESSION['isi'];
            eval("\$hasil = $hitung;");
            $_SESSION['isi']=$hasil;
        } else{
            $_SESSION['isi'].=$angka;
            $hasil=$_SESSION['isi'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>

    <!-- Ini terkoneksi dengan CSS milik sendiri -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- Ini terkoneksi dengan CSS dari Bootstrap -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

     <!-- Ini terkoneksi dengan JS dari Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    
   <div class="bg-img d-flex align-items-center justify-content-center">
    <div class="bg-glases py-5 px-3 col-lg-3">
    <div class='alert bg-glases mt-4 text-end fw-bold' role='alert'> 
        <h4><?= $hasil ?></h4>
    </div>
    <form action="" method="post">
    <div class="d-flex py-2">
        <div class="col-3 pe-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="7">7</button>
        </div>
          <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="8">8</button>
        </div>
        <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="9">9</button>
        </div>
         <div class="col-3 ps-1">
            <button class="btn btn-primary btn-outline-light col-12" type="number" name="angka" value="+">+</button>
        </div>
    </div>
    <div class="d-flex py-2">
        <div class="col-3 pe-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="4">4</button>
        </div>
          <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="5">5</button>
        </div>
        <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="6">6</button>
        </div>
         <div class="col-3 ps-1">
            <button class="btn btn-primary btn-outline-light col-12" type="number" name="angka" value="-">-</button>
        </div>
        </div>
        <div class="d-flex py-2">
        <div class="col-3 pe-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="1">1</button>
        </div>
          <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="2">2</button>
        </div>
        <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="3">3</button>
        </div>
         <div class="col-3 ps-1">
            <button class="btn btn-primary btn-outline-light col-12" type="number" name="angka" value="*">*</button>
        </div>
    </div>
    <div class="d-flex py-2">
        <div class="col-3 pe-1">
            <button class="btn btn-danger btn-outline-light col-12" type="number" name="angka" value="C">C</button>
        </div>
          <div class="col-3 px-1">
            <button class="btn btn-light col-12" type="number" name="angka" value="0">0</button>
        </div>
        <div class="col-3 px-1">
            <button class="btn btn-primary btn-outline-light col-12" type="number" name="angka" value="=">=</button>
        </div>
         <div class="col-3 ps-1">
            <button class="btn btn-primary btn-outline-light col-12" type="number" name="angka" value="/">/</button>
        </div>
    </div>
    </form>
    </div>
    </div>
   </div>
</body>
</html>