<?php
/**
 * Date: 03.07.15
 * Time: 15:26
 *
 * @author Mariusz Filipkowski
 */
namespace spec;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class Warunki_SredniedpdSpec extends ObjectBehavior{

    function it_is_initizalizable(){
        $this->beConstructedWith(1);
        $this->shouldHaveType('Warunki_SrednieDpd');
    }

    function it_is_czy_srednie_dpd_jest_prawidlowe_dla_braku_klienta(){
        $idKlienta = 0;
        $this->beConstructedWith($idKlienta);
        $this->pobierzWynik()->shouldReturn($this->BRAK_KLIENTA);
    }

    function it_is_czy_znalazl_rekordy_i_srednie_dpd_jest_poprawne(\Db_Pozyczki_Historia $pozyczki){
        $idKlienta = 1;
        $pozyczki->pobierzSrednieDpd($idKlienta)->willReturn(4);
        $this->beConstructedWith($idKlienta);
        $this->ustawDbPozyczkiHistoria($pozyczki->getWrappedObject());
        $this->pobierzWynik()->shouldReturn(4);
    }

}

