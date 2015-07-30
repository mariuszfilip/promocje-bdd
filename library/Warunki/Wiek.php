<?php

class Warunki_Wiek
{
    private $_id_klienta = 0;

    private $_db_klient_ewidencja = null;

    public function __construct($idKlienta)
    {
        $this->_id_klienta = $idKlienta;
    }

    

    public function pobierzWynik()
    {
        // ustawic obiekt do bazy oraz sprawdzic czy sa wyniki
        //return My_Tools_Pesel::pobierzWiek($pesel);
        $aKLient = $this->_db_klient_ewidencja->getRow($this->_id_klienta);
        if(!empty($aKLient)){
            return $this->_pobierzWiek($aKLient['pesel']);
        }
    }

    public function ustawDbKlientEwidencja($dbKLientEwidencja)
    {
        $this->_db_klient_ewidencja = $dbKLientEwidencja;
    }

    private function _pobierzWiek($sPesel){
        $rok = substr($sPesel, 0, 2);
        $dzien = substr($sPesel, 4, 2);
        $miesiac = substr($sPesel, 2, 2);
        $liczba = substr($sPesel, 2, 2);
        $wiek = 0;
        if ($liczba < 33) {
            $wiek = 1900;
        } elseif ($liczba < 53) {
            $wiek = 2100;
        } elseif ($liczba < 73) {
            $wiek = 2200;
        } elseif ($liczba < 93) {
            $wiek = 1800;
        }
        $dataUrodzenia = new DateTime(($wiek + $rok) . '-' . $miesiac . '-' . $dzien);
        $dataUrodzenia->format("Y-m-d");
        $oData = new DateTime();
        $oWiek = new DateTime($oData->format('Y-m-d'));
        $wiek = $dataUrodzenia->diff($oWiek);
        return $wiek->y;
    }
}
