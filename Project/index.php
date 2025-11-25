<?php

// ===========================
// INCLUDE MODEL & PRESENTER PEMBALAP
// ===========================
include_once("models/DB.php");
include_once("models/TabelPembalap.php");
include_once("views/ViewPembalap.php");
include_once("presenters/PresenterPembalap.php");

$tabelPembalap = new TabelPembalap('localhost', 'mvp_db', 'root', '');
$viewPembalap  = new ViewPembalap();
$presenterPembalap = new PresenterPembalap($tabelPembalap, $viewPembalap);


// ===========================
// INCLUDE MODEL & PRESENTER Mobil
// ===========================
include_once("models/TabelMobil.php");
include_once("views/ViewMobil.php");
include_once("presenters/PresenterMobil.php");

$tabelMobil = new TabelMobil('localhost', 'mvp_db', 'root', '');
$viewMobil  = new ViewMobil();
$presenterMobil = new PresenterMobil($tabelMobil, $viewMobil);


// ===============================================================
//                      ROUTING PEMBALAP
// ===============================================================

if (isset($_GET['screen'])) 
{
    // FORM TAMBAH
    if ($_GET['screen'] === 'add') {
        echo $presenterPembalap->tampilkanFormPembalap();
        exit();
    }

    // FORM EDIT
    if ($_GET['screen'] === 'edit' && isset($_GET['id'])) {
        echo $presenterPembalap->tampilkanFormPembalap($_GET['id']);
        exit();
    }
}

// HANDLE POST pembalap
if (isset($_POST['action'])) 
{
    $action = $_POST['action'];

    if ($action === 'add') {
        $presenterPembalap->tambahPembalap(
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    if ($action === 'edit') {
        $presenterPembalap->ubahPembalap(
            $_POST['id'],
            $_POST['nama'],
            $_POST['tim'],
            $_POST['negara'],
            $_POST['poinMusim'],
            $_POST['jumlahMenang']
        );
    }

    if ($action === 'delete') {
        $presenterPembalap->hapusPembalap($_POST['id']);
    }

    header("Location: index.php");
    exit();
}



// ===============================================================
//                        ROUTING Mobil
// ===============================================================

if (isset($_GET['screen_mobil'])) 
{
    // FORM TAMBAH Mobil
    if ($_GET['screen_mobil'] === 'add') {
        echo $presenterMobil->tampilkanFormMobil();
        exit();
    }

    // FORM EDIT Mobil
    if ($_GET['screen_mobil'] === 'edit' && isset($_GET['id'])) {
        echo $presenterMobil->tampilkanFormMobil($_GET['id']);
        exit();
    }
}


// HANDLE POST Mobil
if (isset($_POST['action_mobil'])) 
{
    $action = $_POST['action_mobil'];

    if ($action === 'add') {
        $presenterMobil->tambahMobil(
            $_POST['namaMobil'],
            $_POST['pabrikan'],
            $_POST['tipe'],
            $_POST['cc'],
            $_POST['topSpeed'],
            $_POST['pembalapId']
        );
    }

    if ($action === 'edit') {
        $presenterMobil->ubahMobil(
            $_POST['id'],
            $_POST['namaMobil'],
            $_POST['pabrikan'],
            $_POST['tipe'],
            $_POST['cc'],
            $_POST['topSpeed'],
            $_POST['pembalapId']
        );
    }

    if ($action === 'delete') {
        $presenterMobil->hapusMobil($_POST['id']);
    }

    header("Location: index.php");
    exit();
}



// ===============================================================
//              DEFAULT — TAMPILKAN 2 LIST (PEMBALAP + Mobil)
// ===============================================================

echo $presenterPembalap->tampilkanPembalap();
echo $presenterMobil->tampilkanMobil();

?>