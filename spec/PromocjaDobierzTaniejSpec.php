<?php
/**
 * Date: 14.07.15
 * Time: 22:25
 *
 * @author Mariusz Filipkowski
 */

namespace spec;

use PhpSpec\ObjectBehavior;

class PromocjaDobierzTaniejSpec extends ObjectBehavior{

    function it_is_initizalizable(){
        $this->beConstructedWith(1);
        $this->shouldHaveType('PromocjaDobierzTaniej');
    }

    function it_is_pobierz_warunki_promocji(){
        $this->beConstructedWith(1);


        $this->pobierzProcentKapitaluDoDobrania()->shouldReturn(12);
        $this->pobierzKwotaKapitaluDoDoDobrania()->shouldReturn(500);
    }


}

