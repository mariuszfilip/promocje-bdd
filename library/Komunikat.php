<?php

class Komunikat
{

    private $_harmonogram;

    private $komunikat;

    /**
     * @return mixed
     */
    public function getKomunikat()
    {
        return $this->komunikat;
    }

    /**
     * @param mixed $komunikat
     */
    public function setKomunikat($komunikat)
    {
        $this->komunikat = $komunikat;
    }

    public function __construct(Harmonogram $oHarmo)
    {
        $this->_harmonogram = $oHarmo;

    }

    public function czyIstniejeKomunikatPrzyBlednymHarmonogramie()
    {
        if(!$this->_harmonogram->isValid()){
            return true;
        }
        return false;
    }

    public function drukuj(Drukarka $oDrukarka)
    {
        $oDrukarka->drukujPdf($this->komunikat);
    }
}
