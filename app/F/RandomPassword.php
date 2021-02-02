<?php
namespace App\F;

class RandomPassword
{
    private $initializeString = "abcdefghijklmnopqrstuvwxyz1234567890!@#$%^&ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    public function generate()
    {
        $string = $this->initializeString;
        $split  = str_split($string);
        $generated = '';
        for($i=0;$i<10;$i++):
            shuffle($split);
            $generated.=$split[0];
        endfor;
        return $generated;
    }
}

