<?php
include 'config.php';

function tambahNilaiAlternatif($table, $nama, $nilaiHargaSepatu, $nilaiJenisSepatu, $nilaiKualitasSepatu)
{
    include 'config.php';
    // menangkap data yang di kirim dari form
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];

    // menginput data ke database
    mysqli_query($koneksi, "INSERT INTO $table VALUES('','$nama','$nilaiHargaSepatu','$nilaiJenisSepatu','$nilaiKualitasSepatu')");

    // mengalihkan halaman kembali ke index.php
    header("location:nilai_kriteria.php");
}

function tambahAcuan($table, $id_kriteria, $nilai1, $nilai2, $nilai3, $nilai4, $nilai5, $bobot, $atribut)
{
    include 'config.php';
    // menangkap data yang di kirim dari form
    $table = $_POST['table'];
    $id_kriteria = $_POST['id_kriteria'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $atribut = $_POST['atribut'];
    $bobot = $_POST['bobot'];

    // menginput data ke database
    mysqli_query($koneksi, "INSERT INTO $table VALUES('$id_kriteria','$nilai1','$nilai2','$nilai3','$nilai4','$nilai5','$atribut','$bobot')");

    // mengalihkan halaman kembali ke index.php
    header("location:" . $table . ".php");
}

function tambahAlternatif($nama, $table)
{
    include 'config.php';
    // menangkap data yang di kirim dari form
    $nama = $_POST['nama'];

    // menginput data ke database
    mysqli_query($koneksi, "INSERT INTO $table VALUES('','$nama')");

    // mengalihkan halaman kembali ke index.php
    header("location:" . $table . ".php");
}

function editNilaiAlternatif($id, $table, $nama, $nilaiHargaSepatu, $nilaiJenisSepatu, $nilaiKualitasSepatu)
{
    include('config.php');
    $id = $_POST['id'];
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];
    //query update
    $query = "UPDATE $table SET nama='$nama', hargasepatu='$nilaiHargaSepatu', jenissepatu='$nilaiJenisSepatu', kualitas='$nilaiKualitasSepatu' WHERE id='$id' ";
    if (mysqli_query($koneksi, $query)) {
        # credirect ke page index
        header("location:nilai_kriteria.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($query);
    }
}

function edit($id, $nama, $table)
{
    include('config.php');
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $table = $_POST['table'];
    //query update
    $query = "UPDATE $table SET nama='$nama' WHERE id='$id' ";
    if (mysqli_query($koneksi, $query)) {
        # credirect ke page index
        header("location:" . $table . ".php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($query);
    }
}

function delete($id, $table)
{
    include 'config.php';
    $id = $_POST['id'];
    $table = $_POST['table'];
    //query update
    $query = "DELETE FROM $table WHERE id='$id' ";
    if (mysqli_query($koneksi, $query)) {
        # credirect ke page index
        header("location:" . $table . ".php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($query);
    }
}
function tambahNilaiNorm($table, $nama, $nilaiHargaSepatu, $nilaiJenisSepatu, $nilaiKualitasSepatu)
{
    include 'config.php';
    // menangkap data yang di kirim dari form
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];

    // menginput data ke database
    mysqli_query($koneksi, "INSERT INTO $table VALUES('','$nama','$nilaiHargaSepatu','$nilaiJenisSepatu','$nilaiKualitasSepatu')");

    // mengalihkan halaman kembali ke index.php
    header("location:nilai_kriteria.php");
}
