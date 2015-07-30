<?php

/**
 * Class WarunkiDostepnosci
 */
class WarunkiDostepnosci
{

    /**
     * @var int
     */
    private $_id_klienta = 0;
    /**
     * @var int
     */
    private $_id_promocji = 0;
    /**
     * @var null
     */
    private $_db_promocja_warunki = null;
    /**
     * @var Warunki_Kreator
     */
    private $_warunki_kreator = null;

    /**
     * @param $idKlienta
     */
    public function __construct($idKlienta)
    {
        $this->_id_klienta = $idKlienta;
    }


    /**
     * @param $idPromocji
     *
     * @return bool
     */
    public function czySpelnioneWarunki($idPromocji)
    {
        $this->_id_promocji = $idPromocji;

        $aWarunki = $this->_db_promocja_warunki->pobierzWarunkiPromocji($idPromocji);
        if(!empty($aWarunki)){
            foreach($aWarunki as $oWarunek){
                $oWarunek = $this->_warunki_kreator->pobierz($oWarunek['id_typu_warunku'],$this->_id_klienta);
                if($oWarunek->pobierzWynik() < 0){
                   return false;
                }
            }
            return true;
        }
        return false;
    }

    /**
     * @param Db_PromocjaWarunki $dbPromocja
     */
    public function setDbPromocjaWarunki(Db_PromocjaWarunki $dbPromocja)
    {
        $this->_db_promocja_warunki = $dbPromocja;
    }

    /**
     * @param Warunki_Kreator $warunkiKreator
     */
    public function setKreator($warunkiKreator)
    {
        $this->_warunki_kreator = $warunkiKreator;
    }
}
