Feature: search wikipedia
	In order to learn about BDD
	As a passionate developer
	In need to be able to search a general internet site

	@javascript
        Scenario: Search for BDD
		Given I am in wikipedia
		When I search for "Behavior driven development"
		Then The first heading should be "Behavior-driven development"
