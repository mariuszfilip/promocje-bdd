<?php
/**
 * Date: 14.07.15
 * Time: 22:41
 *
 * @author Mariusz Filipkowski
 */

namespace spec;


use PhpSpec\ObjectBehavior;

class Warunki_WiekSpec extends ObjectBehavior{

        function it_is_initizalizable(){
            $this->beConstructedWith(1);
            $this->shouldHaveType('Warunki_Wiek');
        }

        function it_is_poprawnywiek(\Db_KlientEwidencja $dbKlientEwidencja){
            $idKlienta = 1;
            $dbKlientEwidencja->getRow()->willReturn(array('id'=>$idKlienta,'pesel'=>'88050206294'))->withArguments(array($idKlienta));

            $this->beConstructedWith($idKlienta);
            $this->ustawDbKlientEwidencja($dbKlientEwidencja->getWrappedObject());
            $this->pobierzWynik()->shouldReturn(27);
        }

}

