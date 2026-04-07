<?php
class MataKuliah {
    private $kode, $nama, $sks;

    public function __construct($kode, $nama, $sks){
        $this->kode = $kode;
        $this->nama = $nama;
        $this->sks = $sks;
    }

    public function getKode(){ return $this->kode; }
    public function getNama(){ return $this->nama; }
    public function getSks(){ return $this->sks; }
}