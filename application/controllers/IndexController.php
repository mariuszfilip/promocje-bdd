<?php

class IndexController extends Zend_Controller_Action
{
    public function indexAction(){

        $iloscRat = $this->getParam('ilosc_rat',0);
        $oHarmonogram = new Harmonogram($iloscRat);
        $this->view->harmonogram = $oHarmonogram->pobierzHarmonogram();
    }


    public function promocjedokumentyAction(){
        if($this->getRequest()->isPost()){
            $aPost = $this->getRequest()->getPost();
            echo 'Dokumenty ok';
        }
    }

    public function promocjapodpisanieAction(){

        if($this->getRequest()->isPost()){
            $aPost = $this->getRequest()->getPost();
            $idPromocji = $aPost['id_promocji'];
            $idKlienta = $aPost['id_klienta'];

            $oPromocjaDb = new Db_Promocja();

            $oPromocja = new Promocja($idPromocji);
            $oPromocja->setDbPromocja($oPromocjaDb);
            echo PHP_EOL;
            echo 'id_promocji '.$idPromocji.PHP_EOL;
            echo 'id_klienta '.$idKlienta.PHP_EOL;

            if($oPromocja->czyJestAktywna()){
                $oPromocjaWarunkiDb = new Db_PromocjaWarunki();
                $oWarunkiDostepnosci = new WarunkiDostepnosci($idKlienta);
                $oWarunkiDostepnosci->setDbPromocjaWarunki($oPromocjaWarunkiDb);
                $oWarunkiKreator = new Warunki_Kreator();
                $oWarunkiDostepnosci->setKreator($oWarunkiKreator);
                if($oPromocja->czySpelnioneWarunki($oWarunkiDostepnosci)){
                    $wynik = 'Koszty zostały naliczone z uwzglednieniem promocji';
                }else{
                    $wynik = 'Warunki nie zostaly spelnione';
                }
            }else{
                $wynik = 'Koszty nie zostały naliczone z uwzglednieniem promocji';
            }
            $this->view->wynik = $wynik;
        }
    }

}
