<?php

class Promocja
{

    private $_idPromocji = 0;
    private $_dbPromocji = null;

    public function __construct($idPromocji)
    {
        $this->_idPromocji = $idPromocji;
    }

    public function czySpelnioneWarunki(WarunkiDostepnosci $warunkiDostepnosci)
    {
        if($warunkiDostepnosci->czySpelnioneWarunki($this->_idPromocji)){
            return true;
        }
        return false;
    }

    public function setDbPromocja($dbPromocja)
    {
        $this->_dbPromocji = $dbPromocja;
    }

    public function czyJestAktywna()
    {
        if($this->_dbPromocji->pobierzPromocje($this->_idPromocji)){
            return true;
        }
        return false;
    }
}
