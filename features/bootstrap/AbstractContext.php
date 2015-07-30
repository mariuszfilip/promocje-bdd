<?php

use Behat\GuzzleExtension\Context\GuzzleContext;
use Guzzle\Http\Exception\BadResponseException;

class AbstractContext extends GuzzleContext
{
    protected $db=null;
    /**
     * @param string $url
     * @return \Guzzle\Http\Message\Response
     */
    protected function sendGet($url)
    {
        try {
            $headers = [];
            $options = ['allow_redirects' => true];
            $request = $this->getGuzzleClient()->get($url, $headers, $options);
            $response = $request->send();
            return $response;
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }

    /**
     * @param $url
     * @param array $data
     * @return \Guzzle\Http\Message\Response
     */
    protected function sendPost($url, $data)
    {
        try {
            $headers = [];
            $request = $this->getGuzzleClient()->post($url, $headers, $data);
            $response = $request->send();
            return $response;
        } catch (BadResponseException $e) {
            return $e->getResponse();
        }
    }
    /** @BeforeScenario */
    public function przygotowanieBazy()
    {

        $this->db= new Zend_Db_Adapter_Pdo_Mysql(array(
            'host'     => 'localhost',
            'username' => 'root',
            'password' => 'qweqwe',
            'dbname'   => 'nauka'
        ));


        Zend_Db_Table::setDefaultAdapter($this->db);
        $this->db->query("truncate komunikaty");


    }
}