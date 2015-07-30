<?php

class Warunki_Plec
{
    private $_id_klienta = 0;

    private $_db_klient_ewidencja = null;

    public function __construct($idKlienta)
    {
        $this->_id_klienta = $idKlienta;
    }

    public function pobierzWynik()
    {
        $aKlient = $this->_db_klient_ewidencja->getRow($this->_id_klienta);
        if(!empty($aKlient)){
            return $this->peselNaPlec($aKlient['pesel']);
        }
    }

    public function ustawDbEwidencja($dbKlientEwidencja)
    {
        $this->_db_klient_ewidencja = $dbKlientEwidencja;
    }


    private function peselNaPlec($pesel){

            if (intval(substr($pesel, 9,1)) % 2 == 0){
                return 'k';
            } else {
                return 'm';
            }
    }
}
