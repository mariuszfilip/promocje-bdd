Feature: Generowanie harmonogramu
        Jako DK
        DK chce otrzymac harmonogram

 Scenario: otrzymanie harmonogramu dla rownych rat

    Given Jestesmy na stronie formularza
    When wybieramy ilosc rat "6", wpisujemy kapital "1000", wybieramy typ rat "stale", wybieramy oprocentowanie "20"
    Then powinienem zobaczyc poprawny harmonogram dla "6" rat po "200,00"zl

  Scenario: Otrzymanie informacji po blednym wypelnieniu formularza

   Given Jestesmy na stronie formularza
    Given W bazie mamy tresc komunikatu o bledzie

   When wybieramy ilosc rat "6", wpisujemy kapital "0", wybieramy typ rat "stale", wybieramy oprocentowanie "20"

  Then  Powinienem zobaczyc komunikat o blednej wartosci kapitalu

  Scenario: otrzymanie harmonogramu dla rat malejacych

      Given Jestesmy na stronie formularza
#      When wybieramy ilosc rat "3", wpisujemy kapital "1000", wybieramy typ rat "malejace", wybieramy oprocentowanie "20"
#      Then powinienem zobaczyc poprawny harmonogram: 1 rata: "350,00"zl, 2 rata: "344,45"zl, 3 rata: "338,89"zl


