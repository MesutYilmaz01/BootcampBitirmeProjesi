<?php

namespace Project\Helper;

class Maintenance{

    public static function maintenance(){
        $file = __DIR__."/../public/assets/maintance/maintance.txt";
        $dosya = fopen($file, "w");
        $sonuc = fwrite($dosya, "Bakım modu için oluşturulan dosya!");
        fclose($dosya);
    }

    public static function endMaintenance(){
        $file = __DIR__."/../public/assets/maintance/maintance.txt";
        $sonuc = unlink($file);
    }

}