<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="index.php">Metode SAW</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="kriteria.php">Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="alternatif.php">Alternatif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="nilai_kriteria.php">Nilai Kriteria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="hasil.php">Hasil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header style="height:200vh;" class="masthead">
        <div class="container">
            <div class="intro-text">
                <?php
                include 'header.php';
                ?>
                <h3>Hasil Perhitungan</h3>
                <div class="table-responsive-lg">
                    <br>
                    <table class=" table table-dark table-striped table-hover">
                        <tr>
                            <th>Data Alternatif</th>
                            <?php
                            $queryk = mysqli_query($koneksi, "SELECT * FROM kriteria");
                            while ($k = mysqli_fetch_array($queryk)) { ?>
                                <th><?php echo $k['nama']; ?></th>
                            <?php } ?>
                        </tr>
                        <?php
                        $no = 1;
                        $min = 10;
                        $maxjs = 0;
                        $maxks = 0;
                        $queryn = mysqli_query($koneksi, "SELECT * FROM nilai_normalisasi");
                        while ($d = mysqli_fetch_array($queryn)) {
                            if ($d['hargasepatu'] < $min) {
                                $min = $d['hargasepatu'];
                            }
                            if ($d['jenissepatu'] > $maxjs) {
                                $maxjs = $d['jenissepatu'];
                            }
                            if ($d['kualitassepatu'] > $maxks) {
                                $maxks = $d['kualitassepatu'];
                            }
                            $nama[] = $d['nama'];
                            $hargasepatu[] = $d['hargasepatu'];
                            $jenissepatu[] = $d['jenissepatu'];
                            $kualitassepatu[] = $d['kualitassepatu'];
                        }
                        ?>
                        <?php
                        for ($i = 0; $i < 3; $i++) { ?>
                            <tr>
                                <td><?php echo "A" . $no++; ?></td>
                                <td><?php echo $nilaihs[] = $min / $hargasepatu[$i]; ?></td>
                                <td><?php echo $nilaijs[] = $jenissepatu[$i] / $maxjs; ?></td>
                                <td><?php echo $nilaiks[] = $kualitassepatu[$i] / $maxks; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                    <br>
                    <h3>Peringkat Keputusan</h3>
                    <table class="table table-dark table-striped table-hover">
                        <tr>
                            <th>Data Alternatif</th>
                            <th>Nilai</th>
                        </tr>
                        <?php for ($i = 0; $i < 3; $i++) { ?>
                            <tr>
                                <td><?php echo $nama[$i]; ?></td>
                                <td><?php echo $nilaitotal[] = $nilaihs[$i] * 40 + $nilaijs[$i] * 20 + $nilaiks[$i] * 40; ?></td>
                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <br>
                <h3>Peringkat Terbaik</h3>
                <table class="table table-dark table-striped table-hover">
                    <tr>
                        <th>Data Alternatif</th>
                        <th>Nilai</th>
                    </tr>
                    <tr>
                        <?php
                        for ($i = 0; $i < count($nama); $i++) {
                            if ($nilaitotal[$i] == max($nilaitotal)) {
                                $namamax = $nama[$i];
                                $nilaimax = $nilaitotal[$i];
                            }
                        }
                        ?>
                        <td><?php echo $namamax; ?></td>
                        <td><?php echo $nilaimax; ?></td>
                    </tr>
                </table>

            </div>
    </header>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

</body>

</html>