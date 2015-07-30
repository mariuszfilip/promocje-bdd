<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    public function initDB(){
        $this->bootstrap('db');
        $resource = $this->getPluginResource('db');
        $db = $resource->getDbAdapter();

        $db->query('SET CHARACTER SET \'UTF8\'');
        Zend_Db_Table::setDefaultAdapter($db);


    }

}

