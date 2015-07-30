<?php

use Behat\Behat\Tester\Exception\PendingException;

class ExampleContext extends AbstractContext
{
    protected $response;

    /**
     * @Given /^my account exist and is active$/
     */
    public function myAccountExistAndIsActive()
    {
    }

    /**
     * @When /^I send Add Image request with correct data$/
     */
    public function iSendAddImageRequestWithCorrectData()
    {
        $this->response = $this->sendGet('/');
    }
}