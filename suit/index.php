
<?php
    session_start();

    $random=rand(1,3);
    $player="🤠"; // yang muncul pertama kali di player
    $robot="🤖";  // yang muncul pertama kali di robot
    $hasil=""; // hasil pertama adalah kosong
    $lopePlayer="❤️❤️❤️"; // nyawa Player
    $lopeRobot="❤️❤️❤️"; // nyawa Robot

    if (isset($_POST['reset'])) {
        session_unset();
        session_destroy();
    }

    // ketika tombol yang di pilihan di klik
    if (isset($_POST["🖐️"]) || isset($_POST["✌️"]) || isset($_POST["✊"])) 
        {      
    // ketika player memilih
        if (isset($_POST['🖐️'])) {
            $player="🖐️";
        }elseif(isset($_POST['✌️'])) {
            $player="✌️";
        }elseif(isset($_POST['✊'])) {
            $player="✊";
        }

    // ketika robot memilih
    if ($random == 1) {
        $robot="🖐️";
    }elseif($random == 2){
        $robot="✌️";
    }elseif($random == 3){
        $robot="✊";
    }
    }

    // mencari hasil
    if ($player == $robot) 
    {
        $hasil="Hasil Seri😐";
    }elseif(
        // syarat ketika player menang
        ($player == "🖐️" && $robot=="✊") ||
        ($player == "✌️" && $robot=="🖐️") ||
        ($player == "✊" && $robot=="✌️") 

        )
    {
        
        $hasil="Kamu Menang🥳";
        
    }elseif(
        // syarat ketika player menang
        ($robot == "🖐️" && $player=="✊") ||
        ($robot == "✌️" && $player=="🖐️") ||
        ($robot == "✊" && $player=="✌️")
         
        )
    {
        
        $hasil="Kamu Kalah😨";
        
    }

    // Logika pengurangan nyawa robot dan player
    // 1. kita simpan dulu jumlah nyawa robot dan player (Session)
    // 2. kita tampilkan kembali nyawa robot dan player sesuai dengan jumlah saat selesai suit
    
    // proses menyimpan nyawa kedalam session
    if ($hasil=="Kamu Menang🥳") {
        // cek apakah session nyawa robot ada?
        if (!isset($_SESSION['nyawaRobot'])) {
            // membuat session nyawa robot dengan isi 2
            $_SESSION['nyawaRobot']=2;
        }elseif($_SESSION['nyawaRobot']==2){
             // membuat session nyawa robot dengan isi 1
            $_SESSION['nyawaRobot']=1;
        }elseif($_SESSION['nyawaRobot']==1){
             // membuat session nyawa robot dengan isi 0
            $_SESSION['nyawaRobot']=0;
        }
    }elseif ($hasil=="Kamu Kalah😨") {
        // cek apakah session nyawa robot ada?
        if (!isset($_SESSION['nyawaPlayer'])) {
            // membuat session nyawa player dengan isi 2
            $_SESSION['nyawaPlayer']=2;
        }elseif($_SESSION['nyawaPlayer']==2){
             // membuat session nyawa player dengan isi 1
            $_SESSION['nyawaPlayer']=1;
        }elseif($_SESSION['nyawaPlayer']==1){
             // membuat session nyawa player dengan isi 0
            $_SESSION['nyawaPlayer']=0;
        }
    }
    // menyimpan nyawa selesai

    if (isset($_SESSION['nyawaPlayer']) || isset($_SESSION['nyawaRobot'])) {
        //khusus untuk meneluusri nyawa robot
        if (isset($_SESSION['nyawaRobot'])) {
            $nyawaRobot=$_SESSION['nyawaRobot'];
            if ($nyawaRobot==2) {
                $lopeRobot="❤️❤️";
            }elseif ($nyawaRobot==1) {
                $lopeRobot="❤️";
            }elseif ($nyawaRobot==0) {
                $lopeRobot="";
        }
    }
        if (isset($_SESSION['nyawaPlayer'])) {
        $nyawaPlayer=$_SESSION['nyawaPlayer'];
        if ($nyawaPlayer==2) {
            $lopePlayer="❤️❤️";
        }elseif ($nyawaPlayer==1) {
            $lopePlayer="❤️";
        }elseif ($nyawaPlayer==0) {
            $lopePlayer="";
        }
    }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suit</title>

    <!-- koneksikan dengan bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <!-- koneksikan dengan CSS sendiri -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!-- koneksikan dengan JS bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

</head>
<body>
   <div class="bg-img">
        <div class="bg-atas d-flex text-light">
            <div class="kiri col-6 ps-4 d-flex align-items-center">
                <h1>🤠</h1>
                <h4><?= $lopePlayer ?></h4>
            </div>
            <div class="kanan col-6 pe-4 d-flex align-items-center justify-content-end">
                <h4><?= $lopeRobot ?></h4>
                <h1>🤖</h1>
            </div>

         <!-- yang di tengah -->
        </div>
        <div class="body d-flex align-items-center justify-content-center flex-column" style="min-height:85vh">


            <!-- tombol start -->
            <button type="submit" class="btn btn-outline-light mb-4" data-bs-toggle="modal" data-bs-target="#PilihEmoji">
            Start
            </button>

            <!-- tombol reset -->
            <form method="post" action="">
                <button type="submit" name="reset" class="btn btn-outline-light mb-4">Reset</button>
            </form>
            <!-- tombol start end -->

            <!-- ini area arena -->
            <div class="arena bg-glases p-3 col-lg-8 row text-light">
                <div class="col-4 kiri p-3">
                    <h5 class="">Player</h5>
                    <h1 style="font-size:80px" class="text-center"><?= $player ?></h1>
                </div>
                <div class="col-4 tengah p-3 text-center d-flex align-items-center justify-content-center flex-column">
                    <p class="fw-bold" style="font-size:60px">VS</p>
                </div>
                <div class="col-4 kanan p-3 text-end">
                    <h5 class="">Robot</h5>
                    <h1 style="font-size:80px" class="text-center"><?= $robot ?></h1>
                </div>
            </div>
            <!-- ini area arena end -->

            <!-- modal player -->
               <div class="modal fade" id="Player" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-glases text-light">

                 <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">masukan nama</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <form method="post">
                   <input type="text" name="nama" class="form-control" require>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                </div>
                </div>
            </div>
            </div>
                
            <!-- modal player end -->
           <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Player">cek</button>

            <!-- Modal pilih Emoji -->
            <div class="modal fade" id="PilihEmoji" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-glases text-light">

                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pilih Emoji</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body text-center">
                    <form method="post">
                    <!-- ketika pilih kertas -->
                    <button class="btn btn-outline-light" name="🖐️">
                        <h1>🖐️</h1>
                    </button>

                    <!-- ketika pilih gunting -->
                     <button class="btn btn-outline-light mx-5" name="✌️">
                        <h1>✌️</h1>
                    </button>

                    <!-- ketika pilih batu -->
                     <button class="btn btn-outline-light" name="✊">
                        <h1>✊</h1>
                    </button>
                </form>
                </div>
                </div>
            </div>
            </div>
            <!-- modal end -->

            <!-- Modal ketika pesan muncul -->
            <div class="modal fade" id="ModalPesan" tabindex="-1" aria-labelledby="modalPesan" aria-hidden="true">
                
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content bg-glases text-light">
                <div class="modal-body text-center">
                     <h1><?= $hasil ?></h1>
                </div>
                </div>
            </div>

            </div>
            <!-- Modal pesan end -->

        </div>
   </div>
</body>
</html>

<?php if (!empty($hasil)): ?>
<script>
    var hasilModal = new bootstrap.Modal(document.getElementById('ModalPesan'));
    hasilModal.show();
</script>
<?php endif ?>