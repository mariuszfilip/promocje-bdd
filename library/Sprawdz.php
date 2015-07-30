<?php

/**
 * Class Sprawdz
 * ToDo czy to powinny byc odzielne klasy ???
 * jak debogowac?
 */
class Sprawdz
{
    public function wiekszeNiz($wartosc1, $wartosc2)
    {
        if($wartosc1 > $wartosc2){
            return true;
        }
        return false;
    }

    public function mniejszeNiz($argument1, $argument2)
    {
        if($argument1 < $argument2){
            return true;
        }
        return false;
    }

    public function jednaz($aWartosci, $aDane)
    {
        $aWynik = array_intersect($aWartosci,$aDane);
        if(!empty($aWynik)){
            return true;
        }
        return false;
    }

    public function wszystkiez($aWartosci, $aDane)
    {
        $aWynik = array_intersect($aWartosci,$aDane);
        if(count($aWynik) == count($aDane)){
            return true;
        }else{
            return  false;
        }
    }
}
