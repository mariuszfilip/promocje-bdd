Feature: wniosek o pozyczke z uwzgledniem promocji
  jako DK chce sprzedac produkt poprzez udzielenie pozyczki promocyjnej

  Scenario:
    Given Wypelnilem wniosek o pozyczke
    And wybralem promocje "20% extra"
    When wyslalem zgloszenie
    Then otrzymuje dokumenty z uwzglednieniem promocji
    When przechodze do nastepnego kroki i potwierdzam podpisanie
    Then widze naliczone koszty z uwzgledniem promocji "20% extra"


  #Scenario:
    #Given Wypelnilem wniosek o pozyczke
    #And dany klient powinien otrzymac promocje poniewaz spelnia warunki promocji "20% extra"
    #When wyslalem zgloszenie
    #Then otrzymuje dokumenty z uwzglednieniem promocji
    #When przechodze do nastepnego kroki i potwierdzam podpisanie
    #Then widze naliczone koszty z uwzgledniem promocji "20% extra"


  #Scenario:
    #Given Wypelnilem wniosek o pozyczke
    #And dany klient nie powinien otrzymac promocje poniewaz nie spelnia warunkow promocji "20% extra"
    #When wyslalem zgloszenie
    #Then otrzymuje dokumenty z uwzglednieniem promocji
    #When przechodze do nastepnego kroki i potwierdzam podpisanie
    #Then widze naliczone koszty bez uwzglednienia promocji