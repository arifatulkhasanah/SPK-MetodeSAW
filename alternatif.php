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
    <header style="height:150vh;" class="masthead">
        <div class="container">
            <div class="intro-text">
                <?php
                include 'header.php';
                ?>
                <h3>Data Alternatif</h3>
                <br>
                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">
                    Tambah Sepatu
                </button>
                <br>
                <div class="table-responsive-lg">
                    <table class=" table table-dark table-striped table-hover">
                        <tr>
                            <th>Kode</th>
                            <th>Sepatu</th>
                            <th>Opsi</th>
                        </tr>
                        <?php

                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM alternatif");
                        while ($d = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo "A" . $no++; ?></td>
                                <td><?php echo $d['nama']; ?></td>
                                <td>
                                    <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal<?php echo $d['id']; ?>">Edit</a>
                                    <a href="#" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myDelete<?php echo $d['id']; ?>">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="myModal<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="alternatif.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="table" value="<?php echo "alternatif" ?>">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="edit" class="btn btn-success">Edit</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="myDelete<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="alternatif.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM alternatif WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="table" value="alternatif">
                                                    <p class="">Anda yakin ingin menghapus <?php echo $row['nama']; ?>?</p>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                                    </div>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </table>
                </div>
                <!-- Modal Add -->
                <div class="modal fade" id="myModalAdd" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data Alternatif</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="alternatif.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="table" value="alternatif">
                                    <div class="form-group">
                                        <label>Nama Sepatu</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="add" class="btn btn-success">Tambah Data</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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