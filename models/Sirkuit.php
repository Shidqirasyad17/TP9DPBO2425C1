<?php

class Sirkuit{

    private $id;
    private $namaSirkuit;
    private $negara;
    private $panjangKm;
    private $jumlahTikungan;


    public function __construct($id, $namaSirkuit, $negara, $panjangKm, $jumlahTikungan){
        $this->id = $id;
        $this->namaSirkuit = $namaSirkuit;
        $this->negara = $negara;
        $this->panjangKm = $panjangKm;
        $this->jumlahTikungan = $jumlahTikungan;
    }

    public function getId(){
        return $this->id;
    }
    public function getNamaSirkuit(){
        return $this->namaSirkuit;
    }
    public function getNegara(){
        return $this->negara;
    }
    public function getPanjangKm(){
        return $this->panjangKm;
    }
    public function getJumlahTikungan(){
        return $this->jumlahTikungan;
    }

    public function setNamaSirkuit($namaSirkuit){
        $this->namaSirkuit = $namaSirkuit;
    }
    public function setNegara($negara){
        $this->negara = $negara;
    }
    public function setPanjangKm($panjangKm){
        $this->panjangKm = $panjangKm;
    }
    public function setJumlahTikungan($jumlahTikungan){
        $this->jumlahTikungan = $jumlahTikungan;
    }
}
?>