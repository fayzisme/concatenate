<?php
class Perulangan {
    private $arryBageConcat = [];
    private $counterBageConcat = 0;

    public function cetakHasilPerulangan($jumlahPerulangan) {
        for ($i = 1; $i <= $jumlahPerulangan; $i++) {
            if ($this->counterBageConcat >= 2) {
                if ($i % 3 == 0) {
                    if ($this->arryBageConcat[(count($this->arryBageConcat) - 1)] == "Bage") {
                        $this->counterBageConcat++;
                    }

                    array_push($this->arryBageConcat, "Concat");
                }

                if ($i % 5 == 0) {
                    array_push($this->arryBageConcat, "Bage");
                }
            }
            else{
                if ($i % 3 == 0) {
                    array_push($this->arryBageConcat, "Bage");
                }
                
                if ($i % 5 == 0) {
                    if ($this->arryBageConcat[(count($this->arryBageConcat) - 1)] == "Bage") {
                        $this->counterBageConcat++;
                    }
                    array_push($this->arryBageConcat, "Concat");
                }
            }


            if ($this->counterBageConcat >= 5) {
                break;
            }
            
        }

        return $this->arryBageConcat;
    }
}
