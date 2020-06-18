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
    <header style="height:300vh;" class="masthead">
        <div class="container">
            <div class="intro-text">

                <?php
                include 'header.php';
                ?>

                <h3>Data Nilai Kriteria</h3>
                <br>
                <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModalAdd">
                    Tambah Kriteria
                </button>
                <div class="table-responsive-lg">
                    <table class=" table table-dark table-striped table-hover">
                        <tr>
                            <th>Data Kriteria</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                            <th>Atribut</th>
                            <th>Bobot</th>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM nilai_kriteria");
                        while ($d = mysqli_fetch_array($query)) { ?>
                            <tr>
                                <td><?php echo "C" . $no++; ?></td>
                                <td><?php echo $d['1']; ?></td>
                                <td><?php echo $d['2']; ?></td>
                                <td><?php echo $d['3']; ?></td>
                                <td><?php echo $d['4']; ?></td>
                                <td><?php echo $d['5']; ?></td>
                                <td><?php echo $d['atribut']; ?></td>
                                <td><?php echo $d['bobot'] . "%"; ?></td>
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
                                            <h4 class="modal-title">Edit Data kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id_kriteria'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_kriteria WHERE id_kriteria='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id_kriteria" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="table" value="<?php echo "kriteria" ?>">
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
                                            <h4 class="modal-title">Edit Data kriteria</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_kriteria WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="table" value="kriteria">
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
                    <br>
                    <h3>Input Data Perhitungan</h3>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModalAddNilai">
                        Tambah Nilai
                    </button>
                    <br>
                    <table class=" table table-dark table-striped table-hover">
                        <tr>
                            <th>Data Alternatif</th>
                            <?php
                            $queryk = mysqli_query($koneksi, "SELECT * FROM kriteria");
                            while ($k = mysqli_fetch_array($queryk)) { ?>
                                <th><?php echo $k['nama']; ?></th>
                            <?php } ?>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $queryn = mysqli_query($koneksi, "SELECT * FROM nilai_alternatif");
                        while ($d = mysqli_fetch_array($queryn)) { ?>
                            <tr>
                                <td><?php echo "A" . $no++; ?></td>
                                <td><?php echo "Rp." . $d['hargasepatu']; ?></td>
                                <td><?php echo $d['jenissepatu']; ?></td>
                                <td><?php echo $d['kualitassepatu']; ?></td>
                                <td>
                                    <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalInput<?php echo $d['id']; ?>">Edit</a>
                                    <a href="#" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myDeleteInput<?php echo $d['id']; ?>">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="myModalInput<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_alternatif WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="form-group">
                                                        <select class="form-control" name="nama" id="nama">
                                                            <option> <?= $row['nama']; ?> </option>
                                                            <?php
                                                            $query_add = mysqli_query($koneksi, "SELECT * FROM alternatif");
                                                            while ($d = mysqli_fetch_array($query_add)) {
                                                            ?>
                                                                <option value="<?= $d['nama'] ?>"><?= $d['nama'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="table" value="nilai_alternatif">
                                                    <div class="form-group">
                                                        <label>Harga Sepatu</label>
                                                        <input type="text" name="nilaiHargaSepatu" class="form-control" value="<?= $row['hargasepatu']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Sepatu</label>
                                                        <input type="text" name="nilaiJenisSepatu" class="form-control" value="<?= $row['jenissepatu']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kualitas Sepatu</label>
                                                        <input type="text" name="nilaiKualitasSepatu" class="form-control" value="<?= $row['kualitassepatu']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="editNilaiAlternatif" class="btn btn-success">Edit</button>
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
                            <div class="modal fade" id="myDeleteInput<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Perhitungan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_alternatif WHERE id='$id'");
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
                    <br>
                    <h3>Input Data Normalisasi</h3>
                    <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModalAddNorm">
                        Tambah Nilai Normalisasi
                    </button>
                    <br>
                    <table class=" table table-dark table-striped table-hover">
                        <tr>
                            <th>Data Alternatif</th>
                            <?php
                            $queryk = mysqli_query($koneksi, "SELECT * FROM kriteria");
                            while ($k = mysqli_fetch_array($queryk)) { ?>
                                <th><?php echo $k['nama']; ?></th>
                            <?php } ?>
                            <th>Opsi</th>
                        </tr>
                        <?php
                        $no = 1;
                        $queryn = mysqli_query($koneksi, "SELECT * FROM nilai_normalisasi");
                        while ($d = mysqli_fetch_array($queryn)) { ?>
                            <tr>
                                <td><?php echo "A" . $no++; ?></td>
                                <td><?php echo $d['hargasepatu']; ?></td>
                                <td><?php echo $d['jenissepatu']; ?></td>
                                <td><?php echo  $d['kualitassepatu']; ?></td>
                                <td>
                                    <a href="#" type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModalNorm<?php echo $d['id']; ?>">Edit</a>
                                    <a href="#" type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myDeleteNorm<?php echo $d['id']; ?>">Hapus</a>
                                </td>
                            </tr>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="myModalInput<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Data Alternatif</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_alternatif WHERE id='$id'");
                                                while ($row = mysqli_fetch_array($query_edit)) {
                                                ?>
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <div class="form-group">
                                                        <select class="form-control" name="nama" id="nama">
                                                            <option> <?= $row['nama']; ?> </option>
                                                            <?php
                                                            $query_add = mysqli_query($koneksi, "SELECT * FROM alternatif");
                                                            while ($d = mysqli_fetch_array($query_add)) {
                                                            ?>
                                                                <option value="<?= $d['nama'] ?>"><?= $d['nama'] ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="table" value="nilai_alternatif">
                                                    <div class="form-group">
                                                        <label>Harga Sepatu</label>
                                                        <input type="text" name="nilaiHargaSepatu" class="form-control" value="<?= $row['hargasepatu']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jenis Sepatu</label>
                                                        <input type="text" name="nilaiJenisSepatu" class="form-control" value="<?= $row['jenissepatu']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kualitas Sepatu</label>
                                                        <input type="text" name="nilaiKualitasSepatu class=" form-control" value="<?= $row['kualitassepatu']; ?>">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" name="editNilaiAlternatif" class="btn btn-success">Edit</button>
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
                            <div class="modal fade" id="myDeleteInput<?php echo $d['id']; ?>" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Hapus Data Perhitungan</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form" action="nilai_kriteria.php" method="POST">
                                                <?php
                                                $id = $d['id'];
                                                $query_edit = mysqli_query($koneksi, "SELECT * FROM nilai_alternatif WHERE id='$id'");
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
                <!-- Modal Add Nilai Norm -->
                <div class="modal fade" id="myModalAddNorm" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Nilai Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="nilai_kriteria.php" method="POST">
                                    <div class="form-group">
                                        <select class="form-control" name="nama" id="nama">
                                            <option disabled selected> Pilih Data </option>
                                            <?php
                                            $query_add = mysqli_query($koneksi, "SELECT * FROM alternatif");
                                            while ($d = mysqli_fetch_array($query_add)) {
                                            ?>
                                                <option value="<?= $d['nama'] ?>"><?= $d['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="table" value="nilai_normalisasi">
                                    <div class="form-group">
                                        <label>Harga Sepatu</label>
                                        <input type="number" name="nilaiHargaSepatu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Sepatu</label>
                                        <input type="number" name="nilaiJenisSepatu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Kualitas Sepatu</label>
                                        <input type="number" name="nilaiKualitasSepatu" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addNilaiNorm" class="btn btn-success">Tambah Data</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add Nilai -->
                <div class="modal fade" id="myModalAddNilai" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Nilai Data</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="nilai_kriteria.php" method="POST">
                                    <div class="form-group">
                                        <select class="form-control" name="nama" id="nama">
                                            <option disabled selected> Pilih Data </option>
                                            <?php
                                            $query_add = mysqli_query($koneksi, "SELECT * FROM alternatif");
                                            while ($d = mysqli_fetch_array($query_add)) {
                                            ?>
                                                <option value="<?= $d['nama'] ?>"><?= $d['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="table" value="nilai_alternatif">
                                    <div class="form-group">
                                        <label>Harga Sepatu</label>
                                        <input type="number" name="nilaiHargaSepatu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Sepatu</label>
                                        <input type="number" name="nilaiJenisSepatu" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Kualitas Sepatu</label>
                                        <input type="number" name="nilaiKualitasSepatu" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addNilaiAlternatif" class="btn btn-success">Tambah Data</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Add -->
                <div class="modal fade" id="myModalAdd" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data kriteria</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form role="form" action="nilai_kriteria.php" method="POST">
                                    <div class="form-group">
                                        <select class="form-control" name="id_kriteria" id="id_kriteria">
                                            <option disabled selected> Pilih Kriteria </option>
                                            <?php
                                            $query_add = mysqli_query($koneksi, "SELECT * FROM kriteria");
                                            while ($d = mysqli_fetch_array($query_add)) {
                                            ?>
                                                <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <input type="hidden" name="table" value="nilai_kriteria">
                                    <div class="form-group">
                                        <label>Nilai 1</label>
                                        <input type="text" name="nilai1" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai 2</label>
                                        <input type="text" name="nilai2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai 3</label>
                                        <input type="text" name="nilai3" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai 4</label>
                                        <input type="text" name="nilai4" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Nilai 5</label>
                                        <input type="text" name="nilai5" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Atribut</label>
                                        <input type="text" name="atribut" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="text" name="bobot" class="form-control">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="addAcuan" class="btn btn-success">Tambah Data</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
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