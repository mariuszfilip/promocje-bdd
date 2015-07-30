<?php
/**
 * Date: 08.07.15
 * Time: 12:36
 *
 * @author Mariusz Filipkowski
 */


class Db_Pozyczki_Historia extends Zend_Db_Table_Abstract
{
    protected $_name = 'pozyczki_historia';
    protected $_primary = 'id';

    public function pobierzSrednieDpd($idKlienta){
        $select =  $this->select();
        $select->from($this->_name,array('avg(dpd) as srednia','count(id) as ile'));
        $select->where('id_klienta = ?',$idKlienta);
        $select->having('ile > 0');
        $row = $this->fetchRow($select);
        if(!$row instanceof Zend_Db_Table_Row){
            return Warunki_Sredniedpd::BRAK_KLIENTA;
        }
        return $row->toArray()['srednia'];
    }


}

