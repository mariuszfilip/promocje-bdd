<?php
/**
 * Date: 01.07.15
 * Time: 22:38
 *
 * @author Mariusz Filipkowski
 */

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;



class SprawdzSpec extends ObjectBehavior{

    function it_is_intializable(\Sprawdz $sprawdz){
        $this->shouldHaveType('Sprawdz');
    }

    function it_is_czy_wartosc_jest_wieksza_od_innej_dla_wartosci1_wiekszej(){
        $wartosc1 = 3;
        $wartosc2 = 2;
        $this->wiekszeNiz($wartosc1,$wartosc2)->shouldReturn(true);
    }

    function it_is_czy_wartosc_jest_wieksza_od_innej_dla_wartosci1_mniejszej(){
        $wartosc1 = 1;
        $wartosc2 = 2;
        $this->wiekszeNiz($wartosc1,$wartosc2)->shouldReturn(false);
    }

    function it_is_czy_wartosc_jest_wieksza_od_innej_dla_wartosci_rownych(){
        $wartosc1 = 1;
        $wartosc2 = 1;
        $this->wiekszeNiz($wartosc1,$wartosc2)->shouldReturn(false);
    }

    function it_is_czy_wartosc_jest_mniejsza_od_innej_dla_wartosci1_mniejszej(){
        $wartosc1 = 1;
        $wartosc2 = 2;


        $this->mniejszeNiz($wartosc1,$wartosc2)->shouldReturn(true);
    }

    function it_is_czy_wartosc_jest_mniejsza_od_innej_dla_wartosci1_wiekszej(){
        $wartosc1 = 2;
        $wartosc2 = 1;

        $this->mniejszeNiz($wartosc1,$wartosc2)->shouldReturn(false);
    }

    function it_is_czy_przynajmniej_jednawartosc_zawiera_sie_wliscie(){
        $aListaDoWyszukania = array(1);
        $aListaDanych = array(1,2,3,4,5,6);

        $this->jednaz($aListaDoWyszukania,$aListaDanych)->shouldReturn(true);
    }

    function it_is_czy_zadna_niezawiera_sie_wliscie(){
        $aListaDoWyszukania = array(0);
        $aListaDanych = array(1,2,3,4,5,6);

        $this->jednaz($aListaDoWyszukania,$aListaDanych)->shouldReturn(false);
    }

    function it_is_czy_wszystkie_wartosci_zawieraja_sie_wliscie(){
        $aListaDoWyszukiania = array(1,9);
        $aListaDane = array(1,9);
        $this->wszystkiez($aListaDoWyszukiania,$aListaDane)->shouldReturn(true);

    }

    function it_is_czy_niewszystkiewartosci_zawieraja_sie_wliscie(){
        $aListaDoWyszukiania = array(0);
        $aListaDane = array(1,9);
        $this->wszystkiez($aListaDoWyszukiania,$aListaDane)->shouldReturn(false);
    }



}

