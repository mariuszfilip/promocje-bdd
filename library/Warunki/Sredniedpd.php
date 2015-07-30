<?php
//ToDo ustawiac obiekt do bazy z zewnaatrz czy dziedziczyc . przez di w kreatorze bedzie ciezko ogranac
class Warunki_Sredniedpd
{
    private $_id_klienta = 0;

    private $_dbPozyczkiHistoria = null;

    const BRAK_KLIENTA = -99999;
    public function __construct($argument1)
    {
        $this->_id_klienta = $argument1;
    }


    public function pobierzWynik(){
        if($this->_id_klienta > 0){
            return $this->pobierzDbPozyczkiHistoria()->pobierzSrednieDpd($this->_id_klienta);
        }
        return self::BRAK_KLIENTA;
    }

    /**
     * @return null
     */
    public function pobierzDbPozyczkiHistoria()
    {
        if(is_null($this->_dbPozyczkiHistoria)){
            //throw new Exception('Brak ustawionego obiektu db Pozyczki Historia');
            $this->_dbPozyczkiHistoria = new Db_Pozyczki_Historia();
        }
        return $this->_dbPozyczkiHistoria;
    }

    /**
     * @param Db_Pozyczki_Historia $dbPozyczkiHistoria
     */
    public function ustawDbPozyczkiHistoria($dbPozyczkiHistoria)
    {
        $this->_dbPozyczkiHistoria = $dbPozyczkiHistoria;
    }

}
