<?php

use Behat\Behat\Tester\Exception\PendingException;

class KalContext extends AbstractContext
{
    protected $response;
    const komunikatOBledzie = 'ala ma kota';

    /**
     * @Given /^Jestesmy na stronie formularza$/
     */
    public function jestesmyNaStronieFormularza()
    {

        $this->response = $this->sendGet("/");

        if ($this->response->getStatusCode() != 200) {
            throw new Exception("nie mo¿na odnaleŸæ strony");
        }

        $body = $this->response->getBody(true);
        if (strpos($body, 'form') === false) {
            throw new Exception("brak elementu formularza");
        }


    }

    /**
     * @When /^wybieramy ilosc rat "([^"]*)", wpisujemy kapital "([^"]*)", wybieramy typ rat "([^"]*)", wybieramy oprocentowanie "([^"]*)"$/
     */
    public function wybieramyIloscRatWpisujemyKapitalWybieramyTypRatWybieramyOprocentowanie($iloscRat, $kapital, $typRaty, $oprocentowanie)
    {
        $aPost = array();
        $aPost['ilosc_rat'] = $iloscRat;
        $aPost['kapital'] = $kapital;
        $aPost['typ_rat'] = $typRaty;
        $aPost['oprocentowanie'] = $oprocentowanie;
        $this->response = $this->sendPost('/', $aPost);

    }

    /**
     * @Then /^powinienem zobaczyc poprawny harmonogram dla "([^"]*)" rat po "([^"]*)"zl$/
     */
    public function powinienemZobaczycPoprawnyHarmonogramDlaRatPoZl($iloscRat, $kwotaRaty)
    {

        if ($this->response->getStatusCode() != 200) {
            throw new Exception("nie mo¿na odnaleŸæ strony");
        }
        $oczekiwana_liczba_wierszy = $iloscRat;
        $body = $this->weryfikacja_czy_jest_tabelka();
        $znaleziony = $this->sprawdz_liczbe_wierszy($body,$oczekiwana_liczba_wierszy);


        $this->sprawdz_czy_istnieja_komorki($body,$oczekiwana_liczba_wierszy);

        //sprawdzamy czy <td> istnieje wartoœæ -> $kwotaraty

    }

    /**
     * @return mixed
     * @throws Exception
     */
    private function weryfikacja_czy_jest_tabelka()
    {
        $body = $this->response->getBody(true);
        if (strpos($body, 'table') === false) {
            throw new Exception("brak elementu tabeli");
        }
        return $body;
    }

    /**
     * @param $body
     * @return mixed
     */
    private function sprawdz_liczbe_wierszy($body,$oczekiwana_liczba_wierszy)
    {
        $znaleziony = $this->pobierz_wiersze($body);
        $ilosc_znalezionych = count($znaleziony[0]);
        if ($ilosc_znalezionych != $oczekiwana_liczba_wierszy) {
                   throw new Exception("Nieprawiodlowa ilosc wierszy, oczekiwano ".$oczekiwana_liczba_wierszy." znaleziono ".$ilosc_znalezionych);
        }
        return $znaleziony;
    }

    /**
     * @param $znaleziony
     * @param $komorki
     * @throws Exception
     */
    private function sprawdz_czy_istnieja_komorki($body,$oczekiwana_liczba_wierszy)
    {
        $znaleziony = $this->pobierz_wiersze($body);
        foreach ($znaleziony[0] as $wiersz) {
            preg_match_all('/<td>/', $wiersz, $komorki);
            if (count($komorki[0]) !== 1) {
                throw new Exception('Brak komorki');
            }
        }
    }

    /**
     * @param $body
     * @return mixed
     */
    private function pobierz_wiersze($body)
    {
        preg_match_all('/<tr>.*?<\/tr>/', $body, $znaleziony);
        return $znaleziony;
    }

    /**
     * @Given /^W bazie mamy tresc komunikatu o bledzie$/
     */
    public function wBazieMamyTrescKomunikatuOBledzie()
    {
        $tekst= self::komunikatOBledzie;
        $this->db->query("insert into komunikaty values(1,'$tekst')");

    }

    /**
     * @Then /^Powinienem zobaczyc komunikat o blednej wartosci kapitalu$/
     */
    public function powinienemZobaczycKomunikatOBlednejWartosciKapitalu()
    {
        $body = $this->response->getBody(true);
              if (strpos($body, self::komunikatOBledzie) === false) {
                  throw new Exception("brak komunikatu na stronie");
              }

    }


}