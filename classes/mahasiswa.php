<?php
require_once "User.php";
require_once "../interfaces/CetakLaporan.php";

class Mahasiswa extends User implements CetakLaporan {
    private $nim;

    public function __construct($nama, $nim){
        parent::__construct($nama);
        $this->nim = $nim;
    }

    public function cetak(){
        return "Laporan Mahasiswa: " . $this->nama;
    }

    public function role(){
        return "Mahasiswa";
    }
}