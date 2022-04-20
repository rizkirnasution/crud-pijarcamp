<?php

$nama_produk    = "";
$keterangan     = "";
$harga          = "";
$jumlah         = "";
$sukses         = "";
$error          = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from produk where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Data telah terhapus";
    }else{
        $error  = "Data tidak terhapus";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from produk where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama_produk    = $r1['nama_produk'];
    $keterangan     = $r1['keterangan'];
    $harga          = $r1['harga'];
    $jumlah         = $r1['jumlah'];

}
 //untuk create
if (isset($_POST['simpan'])) {
    $nama_produk    = $_POST['nama_produk'];
    $keterangan     = $_POST['keterangan'];
    $harga          = $_POST['harga'];
    $jumlah         = $_POST['jumlah'];

    //untuk update/edit
if ($nama_produk && $keterangan && $harga && $jumlah) {
    if ($op == 'edit') { 
        $sql1       = "update produk set nama_produk = '$nama_produk',keterangan='$keterangan',harga = '$harga',jumlah='$jumlah' where id = '$id'";
        $q1         = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Data berhasil diupdate";
         } else {
            $error  = "Data tidak dapat diupdate";
         }
    } else { 
    //untuk insert data
        $sql1   = "insert into produk(nama_produk,keterangan,harga,jumlah) values ('$nama_produk','$keterangan','$harga','$jumlah')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
             $sukses     = "Data baru berhasil tersimpan";
        } else {
             $error      = "Data gagal dimasukkan";
         }
     }
} else {
     $error = "Silakan masukkan semua data";
    }
}
?>