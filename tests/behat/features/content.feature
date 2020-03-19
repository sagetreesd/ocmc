Feature: Content
  In order to test some basic Behat functionality
  As a website user
  I need to be able to see that the Drupal and Drush drivers are working

  @api
  Scenario: Create many nodes
    Given "page" content:
    | title    |
    | Page one |
    | Page two |
    And "article" content:
    | title          |
    | First article  |
    | Second article |
    And I am logged in as a user with the "administrator" role
    When I go to "admin/content"
    Then I should see "Page one"
    And I should see "Page two"
    And I should see "First article"
    And I should see "Second article"

  @api
  Scenario: Create many nodes as a site_administrator
    Given "page" content:
    | title    |
    | Page three |
    | Page four |
    And "article" content:
    | title          |
    | Third article  |
    | Fourth article |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/content"
    Then I should see "Page three"
    And I should see "Page four"
    And I should see "Third article"
    And I should see "Fourth article"

#  @api
#  Scenario: Create users
#    Given users:
#    | name     | mail            | status |
#    | Joe User | joe@example.com | 1      |
#    And I am logged in as a user with the "administrator" role
#    When I visit "admin/people"
#    Then I should see the link "Joe User"

    # The following is not a valid test scenario.
#  @api
#  Scenario: Login as a user created during this scenario
#    Given users:
#    | name      | status | mail             |
#    | Test user |      1 | test@example.com |
#    When I am logged in as "Test user"
#    Then I should see the link "Log out"

  @api
  Scenario: Create many terms as administrator
    Given "tags" terms:
    | name    |
    | Tag one |
    | Tag two |
    And I am logged in as a user with the "administrator" role
    When I go to "admin/structure/taxonomy/manage/tags/overview"
    Then I should see "Tag one"
    And I should see "Tag two"

  @api
  Scenario: Create many terms as site_administrator
    Given "tags" terms:
    | name    |
    | Tag three |
    | Tag four |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/tags/overview"
    Then I should see "Tag three"
    And I should see "Tag four"

  @api
  Scenario: Create many interests as administrator
    Given "interests" terms:
      | name    |
      | Interest one |
      | Interest two |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/interests/overview"
    Then I should see "Interest one"
    And I should see "Interest two"

  @api
  Scenario: Create many interests as site_administrator
    Given "interests" terms:
      | name    |
      | Interest three |
      | Interest four |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/interests/overview"
    Then I should see "Interest three"
    And I should see "Interest four"

  @api
  Scenario: Create many countries as administrator
    Given "country" terms:
      | name    |
      | Country one |
      | Country two |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/country/overview"
    Then I should see "Country one"
    And I should see "Country two"

  @api
  Scenario: Create many countries as site_administrator
    Given "country" terms:
      | name    |
      | Country three |
      | Country four |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/country/overview"
    Then I should see "Country three"
    And I should see "Country four"

  @api
  Scenario: Create many locations as administrator
    Given "locations" terms:
      | name    |
      | Location one |
      | Location two |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/locations/overview"
    Then I should see "Location one"
    And I should see "Location two"

  @api
  Scenario: Create many locations as site_administrator
    Given "locations" terms:
      | name    |
      | Location three |
      | Location four |
    And I am logged in as a user with the "site_administrator" role
    When I go to "admin/structure/taxonomy/manage/locations/overview"
    Then I should see "Location three"
    And I should see "Location four"

#  @api
#  Scenario: Create nodes with specific authorship
#    Given users:
#    | name     | mail            | status |
#    | Joe User | joe@example.com | 1      |
#    And "article" content:
#    | title          | author   | promote |
#    | Article by Joe | Joe User | 1       |
#    When I go to "news"
#    Then I should see the link "Article by Joe"
