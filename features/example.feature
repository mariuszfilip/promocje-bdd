Feature: Adding image
In order to add a image
As a API client
I want to add image

Scenario: User add image (general scenario)
  Given my account exist and is active
  When I send Add Image request with correct data
  #Then I get a successful response
#  When I send Get Standard Wall request
#  Then I should receive valid Get Standard Wall response that contains my image