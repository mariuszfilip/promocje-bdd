<?php

class Db_PromocjaWarunki extends Zend_Db_Table_Abstract
{

    protected $_name = 'promocje_warunki';
    protected $_primary = 'id';

    public function pobierzWarunkiPromocji($idPromocji){
        $select =  $this->select();
        $select->where('id_promocji = ?',$idPromocji);
        $rows = $this->fetchAll($select);
        if($rows instanceof Zend_Db_Table_Rowset){
            return $rows->toArray();
        }
        return array();

    }
}
