<?php

include_once ("models/DB.php");
include_once ("KontrakModelMobil.php");

class TabelMobil extends DB implements KontrakModelMobil
{
    // Konstruktor
    public function __construct($host, $db_name, $username, $password)
    {
        parent::__construct($host, $db_name, $username, $password);
    }

    // Ambil semua Mobil
    public function getAllMobil(): array
    {
        $query = "SELECT * FROM Mobil";
        $this->executeQuery($query);
        return $this->getAllResult();
    }

    // Ambil Mobil berdasarkan ID
    public function getMobilById($id): ?array
    {
        $query = "SELECT * FROM Mobil WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);

        $result = $this->getAllResult();
        return $result[0] ?? null;
    }

    // Tambah Mobil baru
    public function addMobil($namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void
    {
        $query = "INSERT INTO mobil 
                  (nama_mobil, pabrikan, tipe, cc, top_speed, pembalap_id)
                  VALUES 
                  (:nama_mobil, :pabrikan, :tipe, :cc, :top_speed, :pembalap_id)";

        $params = [
            'nama_mobil'  => $namaMobil,
            'pabrikan'    => $pabrikan,
            'tipe'        => $tipe,
            'cc'          => $cc,
            'top_speed'   => $topSpeed,
            'pembalap_id' => $pembalapId
        ];

        $this->executeQuery($query, $params);
    }

    // Update data Mobil
    public function updateMobil($id, $namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId): void
    {
        $query = "UPDATE mobil SET
                    nama_mobil  = :nama_mobil,
                    pabrikan    = :pabrikan,
                    tipe        = :tipe,
                    cc          = :cc,
                    top_speed   = :top_speed,
                    pembalap_id = :pembalap_id
                  WHERE id = :id";

        $params = [
            'id'          => $id,
            'nama_mobil'  => $namaMobil,
            'pabrikan'    => $pabrikan,
            'tipe'        => $tipe,
            'cc'          => $cc,
            'top_speed'   => $topSpeed,
            'pembalap_id' => $pembalapId
        ];

        $this->executeQuery($query, $params);
    }

    // Hapus Mobil berdasarkan ID
    public function deleteMobil($id): void
    {
        $query = "DELETE FROM mobil WHERE id = :id";
        $this->executeQuery($query, ['id' => $id]);
    }
}

?>