<?php
require_once "User.php";
require_once "../interfaces/CetakLaporan.php";

class Dosen extends User implements CetakLaporan {

    public function cetak(){
        return "Laporan Dosen: " . $this->nama;
    }

    public function role(){
        return "Dosen";
    }
}