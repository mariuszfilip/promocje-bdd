<?php
/**
 * Date: 23.06.15
 * Time: 23:02
 *
 * @author Mariusz Filipkowski
 */

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WarunkiDostepnosciSpec extends ObjectBehavior
{
    function it_is_initizalizable(){
        $this->beConstructedWith(1);
        $this->shouldHaveType('WarunkiDostepnosci');
    }


    function it_is_czy_niespelnione_warunki_dla_brakow_zdefiniownych_warunkow(\Db_PromocjaWarunki $promocjaWarunki){
        $idKlienta = 1;
        $idPromocji = 1;
        $promocjaWarunki->pobierzWarunkiPromocji([$idPromocji])->willReturn(array());
        $this->beConstructedWith($idKlienta);
        $this->setDbPromocjaWarunki($promocjaWarunki->getWrappedObject());
        $this->czySpelnioneWarunki([$idPromocji])->shouldReturn(false);
    }


    function it_is_czy_spelnione_warunki_dla_poprawnego_sredniego_dpd(\Db_PromocjaWarunki $promocjaWarunki,\Warunki_Kreator $warunki,\Warunki_Sredniedpd $warunkiSrednieDpd){
        //ToDo czy dokladac kolejne obiekty jezeli dojda? mechanizm sprawdzania dziala wiece nie wydaje mi sie
        $idKlienta = 1;
        $idPromocji = 1;
        $idTypuWarunku = 1;
        $promocjaWarunki->pobierzWarunkiPromocji([$idPromocji])->willReturn(array(array('id'=>1,'id_typu_warunku'=>$idTypuWarunku)));
        $warunkiSrednieDpd->beConstructedWith([$idKlienta]);
        $warunkiSrednieDpd->pobierzWynik()->willReturn(12);
        $warunki->pobierz()->withArguments([$idTypuWarunku,$idKlienta])->willReturn($warunkiSrednieDpd->getWrappedObject());


        $this->beConstructedWith($idKlienta);
        $this->setDbPromocjaWarunki($promocjaWarunki->getWrappedObject());
        $this->setKreator($warunki->getWrappedObject());
        $this->czySpelnioneWarunki([$idPromocji])->shouldReturn(true);
    }

    function it_is_czy_spelnione_warunki_dla_niepoprawnego_sredniego_dpd(\Db_PromocjaWarunki $promocjaWarunki,\Warunki_Kreator $warunki,\Warunki_Sredniedpd $warunkiSrednieDpd){
        //ToDo czy dokladac kolejne obiekty jezeli dojda? mechanizm sprawdzania dziala wiece nie wydaje mi sie
        $idKlienta = 1;
        $idPromocji = 1;
        $idTypuWarunku = 1;
        $promocjaWarunki->pobierzWarunkiPromocji([$idPromocji])->willReturn(array(array('id'=>1,'id_typu_warunku'=>$idTypuWarunku)));
        $warunkiSrednieDpd->beConstructedWith([$idKlienta]);
        $warunkiSrednieDpd->pobierzWynik()->willReturn(-1);
        $warunki->pobierz()->withArguments([$idTypuWarunku,$idKlienta])->willReturn($warunkiSrednieDpd->getWrappedObject());


        $this->beConstructedWith($idKlienta);
        $this->setDbPromocjaWarunki($promocjaWarunki->getWrappedObject());
        $this->setKreator($warunki->getWrappedObject());
        $this->czySpelnioneWarunki([$idPromocji])->shouldReturn(false);
    }
}