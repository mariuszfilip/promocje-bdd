<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PromocjaSpec extends ObjectBehavior
{
    function it_is_initizalizable(){
        $this->beConstructedWith(1);
        $this->shouldHaveType('Promocja');
    }

    function it_is_czy_promocja_aktywna(\Db_Promocja $db_Promocja){
        $this->beConstructedWith(1);
        $db_Promocja->pobierzPromocje(1)->willReturn(array('id'=>1))->withArguments([1]);
        $this->setDbPromocja($db_Promocja->getWrappedObject());
        $this->czyJestAktywna()->shouldReturn(true);
    }

    function it_is_czy_promocja_istnieje_w_bazie(\Db_Promocja $db_Promocja){
        $this->beConstructedWith(1);
        $this->setDbPromocja($db_Promocja->getWrappedObject());
    }
    function it_is_czy_spelione_warunki(\Db_Promocja $db_Promocja,\WarunkiDostepnosci $warunkiDostepnosci){
        $idPromocji = 1;
        $this->beConstructedWith($idPromocji);
        $db_Promocja->pobierzPromocje()->willReturn(array('id'=>1))->withArguments([$idPromocji]);
        $this->setDbPromocja($db_Promocja->getWrappedObject());
        $warunkiDostepnosci->czySpelnioneWarunki()->willReturn(true)->withArguments([$idPromocji]);
        $this->czyJestAktywna($warunkiDostepnosci->getWrappedObject())->shouldReturn(true);

    }



}
