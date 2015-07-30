<?php

use Behat\Behat\Tester\Exception\PendingException;

class PromocjaContext extends AbstractContext
{
    const wyganerowanoDokumenty = 'Dokumenty ok';
    const komunikatPromocja = 'Koszty zostały naliczone z uwzglednieniem promocji';
    private $_aPromocje = array('20% extra'=>1);
    private $_aDaneWniosek = array();
    private $_id_promocji = 0;
    /**
     * @Given /^Wypelnilem wniosek o pozyczke$/
     */
    public function wypelnilemWniosekOPozyczke()
    {
        $this->_aDaneWniosek = array(
            'pesel' => '88050206294',
            'kwota_wnioskowa' => 500,
            'id_klienta' => 1

        );

    }

    /**
     * @Given /^wybralem promocje "([^"]*)"$/
     */
    public function wybralemPromocje($sNazwaPromocji)
    {
        if(array_key_exists($sNazwaPromocji,$this->_aPromocje)){
            $this->_id_promocji = $this->_aPromocje[$sNazwaPromocji];
        }else{
            throw new Exception('Nie wybrano promocji '.$sNazwaPromocji);
        }

    }

    /**
     * @When /^wyslalem zgloszenie$/
     */
    public function wyslalemZgloszenie()
    {
        //$idKlienta = 1;
        $aPost = array();
        $aPost['id_promocji'] = $this->_id_promocji;
        $aPost['id_klienta'] = $this->_aDaneWniosek['id_klienta'];
        // czy tu ustawiac wszystkie dane ? jezeli testuje tylko promocje
        $this->response = $this->sendPost('index/promocjedokumenty', $aPost);
    }

    /**
     * @Then /^otrzymuje dokumenty z uwzglednieniem promocji$/
     */
    public function otrzymujeDokumentyZUwzglednieniemPromocji()
    {
        $body = $this->response->getBody(true);
        if (strpos($body, self::wyganerowanoDokumenty) === false) {
            throw new Exception("brak komunikatu na stronie o wygenerowanych dokumetach");
        }
    }



    /**
     * @When /^przechodze do nastepnego kroki i potwierdzam podpisanie$/
     */
    public function przechodzeDoNastepnegoKrokiIPotwierdzamPodpisanie()
    {
        //$idKlienta = 1;
        $aPost = array();
        $aPost['id_promocji'] = $this->_id_promocji;
        $aPost['id_klienta'] = $this->_aDaneWniosek['id_klienta'];
        // czy tu ustawiac wszystkie dane ? jezeli testuje tylko promocje
        $this->response = $this->sendPost('index/promocjapodpisanie', $aPost);
    }

    /**
     * @Then /^widze naliczone koszty z uwzgledniem promocji "([^"]*)"$/
     */
    public function widzeNaliczoneKosztyZUwzgledniemPromocji($sNazwaPromocji)
    {

        $body = $this->response->getBody(true);
        if (strpos($body, self::komunikatPromocja) === false) {
            throw new Exception("brak komunikatu na stronie");
        }
    }


}