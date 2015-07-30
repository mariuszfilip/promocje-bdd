<?php

class Db_Promocja extends Zend_Db_Table_Abstract
{
    protected $_name = 'promocje_ewidencja';
    protected $_primary = 'id';

    public function pobierzPromocje($idPromocji){
        $select =  $this->select();
        $select->where('id = ?',$idPromocji);
        $row = $this->fetchRow($select);
        if(!$row instanceof Zend_Db_Table_Row){
            throw new Exception('Nie odnaleziono w bazie promocji o id '.$idPromocji);
        }
        return $row->toArray();
    }


}
