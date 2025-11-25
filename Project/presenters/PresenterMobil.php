<?php

include_once(__DIR__ . "/KontrakPresenterMobil.php");
include_once(__DIR__ . "/../models/TabelMobil.php");
include_once(__DIR__ . "/../models/Mobil.php");
include_once(__DIR__ . "/../views/ViewMobil.php");

class PresenterMobil implements KontrakPresenterMobil
{
    private $tabelMobil;
    private $viewMobil;

    private $listMobil = [];

    public function __construct($tabelMobil, $viewMobil)
    {
        // Inisialisasi model dan view
        $this->tabelMobil = $tabelMobil;
        $this->viewMobil = $viewMobil;

        // Load data awal
        $this->initListMobil();
    }

    // Ambil semua Mobil dan ubah ke objek Mobil
    public function initListMobil()
    {
        $data = $this->tabelMobil->getAllMobil();

        $this->listMobil = [];

        foreach ($data as $item) {
            $Mobil = new Mobil(
                $item['id'],
                $item['nama_mobil'],
                $item['pabrikan'],
                $item['tipe'],
                $item['cc'],
                $item['top_speed'],
                $item['pembalap_id']
            );

            $this->listMobil[] = $Mobil;
        }
    }

    // Menampilkan daftar Mobil
    public function tampilkanMobil(): string
    {
        return $this->viewMobil->tampilMobil($this->listMobil);
    }

    // Tampilkan form tambah / edit Mobil
    public function tampilkanFormMobil($id = null): string
    {
        $data = null;

        if ($id !== null) {
            $data = $this->tabelMobil->getMobilById($id);
        }

        return $this->viewMobil->tampilFormMobil($data);
    }

    // CRUD ======================================

    public function tambahMobil($namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void
    {
        $this->tabelMobil->addMobil($namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId);

        // Refresh list
        $this->initListMobil();
    }

    public function ubahMobil($id, $namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void
    {
        $this->tabelMobil->updateMobil($id, $namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId);

        // Refresh list
        $this->initListMobil();
    }

    public function hapusMobil($id): void
    {
        $this->tabelMobil->deleteMobil($id);

        // Refresh list
        $this->initListMobil();
    }
}

?>