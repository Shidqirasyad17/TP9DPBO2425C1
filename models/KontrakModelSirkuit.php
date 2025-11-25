<?php

/*

    Interface ini mendefinisikan struktur dasar yang harus dimiliki oleh setiap Model 
    dalam arsitektur MVP (Model–View–Presenter).

    Interface ini berfungsi sebagai kontrak antara Presenter dan Model, 
    yang menentukan metode-metode CRUD (Create, Read, Update, Delete) 
    yang wajib diimplementasikan oleh Model.

    Dengan adanya kontrak ini, setiap anggota tim dapat 
    bekerja dengan pola yang sama, menjaga konsistensi struktur kode,  
    dan memungkinkan dikerjakan secara paralel 
    tanpa saling mengganggu bagian kode lainnya.

*/

interface KontrakModelSirkuit
{
    public function getAllSirkuit(): array;
    public function getSirkuitById($id): ?array;

    
    // method crud sirkuit
    public function addSirkuit($nama, $negara, $panjangKm, $jumlahTikungan): void;
    public function updateSirkuit($id, $nama, $negara, $panjangKm, $jumlahTikungan): void;
    public function deleteSirkuit($id): void;
}

?>
