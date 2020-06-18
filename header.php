<?php
include 'config.php';
include 'SAW/fungsi.php';

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];
    delete($id, $table);
}
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $table = $_POST['table'];
    edit($id, $nama, $table);
}
if (isset($_POST['editNilaiAlternatif'])) {
    $id = $_POST['id'];
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    editNilaiAlternatif($id, $table, $nama, $nilaiHargaSepatu, $nilaiKualitasSepatu, $nilaiJenisSepatu);
}
if (isset($_POST['add'])) {
    $nama = $_POST['nama'];
    $table = $_POST['table'];
    tambahAlternatif($nama, $table);
}
if (isset($_POST['addAcuan'])) {
    $table = $_POST['table'];
    $id_kriteria = $_POST['id_kriteria'];
    $nilai1 = $_POST['nilai1'];
    $nilai2 = $_POST['nilai2'];
    $nilai3 = $_POST['nilai3'];
    $nilai4 = $_POST['nilai4'];
    $nilai5 = $_POST['nilai5'];
    $atribut = $_POST['atribut'];
    $bobot = $_POST['bobot'];
    tambahAcuan($table, $id_kriteria, $nilaiHargaSepatu, $nilaiKualitasSepatu, $nilaiJenisSepatu, $nilai3, $nilai4, $nilai5, $bobot, $atribut);
}
if (isset($_POST['addNilaiAlternatif'])) {
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];
    tambahNilaiAlternatif($table, $nama, $nilaiHargaSepatu, $nilaiKualitasSepatu, $nilaiJenisSepatu);
}
if (isset($_POST['addNilaiNorm'])) {
    $table = $_POST['table'];
    $nama = $_POST['nama'];
    $nilaiHargaSepatu = $_POST['nilaiHargaSepatu'];
    $nilaiJenisSepatu = $_POST['nilaiJenisSepatu'];
    $nilaiKualitasSepatu = $_POST['nilaiKualitasSepatu'];
    tambahNilaiNorm($table, $nama, $nilaiHargaSepatu, $nilaiKualitasSepatu, $nilaiJenisSepatu);
}
