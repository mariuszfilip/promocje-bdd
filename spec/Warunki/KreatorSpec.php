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

class Warunki_KreatorSpec extends ObjectBehavior{

    function it_is_initizalizable(){
        $this->shouldHaveType('Warunki_Kreator');
    }

    function it_is_return_srednie_dpd_spec_dla_typu_1(){
        $idTypyWarunkiSrednie = 1;
        $idKlienta = 1;
        $this->pobierz($idTypyWarunkiSrednie,$idKlienta)->shouldReturnAnInstanceOf("Warunki_Sredniedpd");
    }

    function it_is_throw_exception_dla_nieznalezionego_typu(){
        $iNieZdefiniowanyTyp = 0;
        $iIdKlienta = 1;
        $this->shouldThrow('Exception')->during('pobierz', array($iNieZdefiniowanyTyp,$iIdKlienta));
    }

}