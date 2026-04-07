<?php
class Nilai {
    private $data = [];

    public function tambah($mk, $nilai){
        $this->data[] = [
            "mk" => $mk,
            "nilai" => $nilai
        ];
    }

    public function getData(){
        return $this->data;
    }

    public function hitungIPK(){
        $total = 0;
        $jumlah = count($this->data);

        foreach($this->data as $d){
            $total += $d['nilai'];
        }

        return $jumlah ? round($total/$jumlah,2) : 0;
    }
}