<?php

class Mobil
{
    private $id;
    private $namaMobil;
    private $pabrikan;
    private $tipe;
    private $cc;
    private $topSpeed;
    private $pembalapId;

    public function __construct($id, $namaMobil, $pabrikan, $tipe, $cc, $topSpeed, $pembalapId)
    {
        $this->id = $id;
        $this->namaMobil = $namaMobil;
        $this->pabrikan = $pabrikan;
        $this->tipe = $tipe;
        $this->cc = $cc;
        $this->topSpeed = $topSpeed;
        $this->pembalapId = $pembalapId;
    }

    // Getter
    public function getId()
    {
        return $this->id;
    }

    public function getNamaMobil()
    {
        return $this->namaMobil;
    }

    public function getPabrikan()
    {
        return $this->pabrikan;
    }

    public function getTipe()
    {
        return $this->tipe;
    }

    public function getCc()
    {
        return $this->cc;
    }

    public function getTopSpeed()
    {
        return $this->topSpeed;
    }

    public function getPembalapId()
    {
        return $this->pembalapId;
    }

    // Setter
    public function setNamaMobil($namaMobil)
    {
        $this->namaMobil = $namaMobil;
    }

    public function setPabrikan($pabrikan)
    {
        $this->pabrikan = $pabrikan;
    }

    public function setTipe($tipe)
    {
        $this->tipe = $tipe;
    }

    public function setCc($cc)
    {
        $this->cc = $cc;
    }

    public function setTopSpeed($topSpeed)
    {
        $this->topSpeed = $topSpeed;
    }

    public function setPembalapId($pembalapId)
    {
        $this->pembalapId = $pembalapId;
    }
}

?>