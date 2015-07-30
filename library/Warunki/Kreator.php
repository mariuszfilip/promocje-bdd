<?php

class Warunki_Kreator
{

    public function pobierz($typObiektu,$idKlienta){
        switch ($typObiektu) {
            case 1:
                return new Warunki_Sredniedpd($idKlienta);
            default:
                throw new Exception('Brak zdefiniowanego typu');
        }

    }
}
