<?php
/**
 * Date: 20.07.15
 * Time: 15:57
 *
 * @author Mariusz Filipkowski
 */
namespace spec;

class Warunki_PlecSpec extends \PhpSpec\ObjectBehavior
{

    function it_is_initizable()
    {
        $this->beConstructedWith(1);
        $this->shouldHaveType('Warunki_Plec');
    }

    function it_is_poprawna_plec_m(\Db_KlientEwidencja $dbKlientEwidencja)
    {
        $idKLienta = 1;
        $dbKlientEwidencja->getRow()->willReturn(array('id' => 1, 'pesel' => '88050206294'))->withArguments(
            array($idKLienta)
        );
        $this->beConstructedWith($idKLienta);
        $this->ustawDbEwidencja($dbKlientEwidencja->getWrappedObject());
        $this->pobierzWynik()->shouldReturn('m');
    }

    function it_is_poprawna_plec_k(\Db_KlientEwidencja $dbKlientEwidencja){
        $idKLienta = 2;
        $dbKlientEwidencja->getRow()->willReturn(array('id'=>2,'88050206294'))->wirhArguments([array($idKLienta)]);
    }

}

