<?php

namespace App\Helpers;

class HitungNilai
{
    
    //$nilaiLs : nilai latihan soal
    protected $nilaiLs = array();

    //nilaiUh : nilai ulangan harian    
    protected $nilaiUh = array();
    //$nilaiUts : nilai ulangan tengah semester    
    protected float $nilaiUts;
    //$nilaiUs : nilai ulangan semester    
    protected float $nilaiUs;

    public function __construct($nilaiLs, $nilaiUh, $nilaiUts, $nilaiUs)
    {
        $this->nilaiLs = $nilaiLs;
        $this->nilaiUh = $nilaiUh;
        $this->nilaiUts = $nilaiUts;
        $this->nilaiUs = $nilaiUs;
    }

    public function hitungnilaiLs(){
        $total_nilaiLs = 0;
        foreach ($this->nilaiLs as $nilaiLs){
            $total_nilaiLs += $nilaiLs;
        }
        return 0.15 * ($total_nilaiLs / 4);
    }

    public function hitungnilaiUh(){
        $total_nilaiUh = 0;
        foreach ($this->nilaiUh as $nilaiUh){
            $total_nilaiUh += $nilaiUh;
        }
        return 0.2 * ($total_nilaiUh / 2);
    }

    public function hitungnilaiUts(){
        return 0.25 * $this->nilaiUts;
    }

    public function hitungnilaiUs(){
        return 0.4 * $this->nilaiUs;
    }

    public function hitung(){
        return $this->hitungnilaiLs() + $this->hitungnilaiUh() + $this->hitungnilaiUts() + $this->hitungnilaiUs();
    }
}