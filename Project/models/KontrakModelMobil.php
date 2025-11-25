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

interface KontrakModelMobil
{
    public function getAllMobil(): array;
    public function getMobilById($id): ?array;

    // CRUD Mobil
    public function addMobil($namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void;
    public function updateMobil($id, $namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void;
    public function deleteMobil($id): void;
}

?>
