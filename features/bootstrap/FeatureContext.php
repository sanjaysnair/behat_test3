<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context, SnippetAcceptingContext
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am in wikipedia
     */
    public function iAmInWikipedia()
    {
        //throw new PendingException();
        $this->visitPath('/');
    }

    /**
     * @When I search for :searchString
     */
    public function iSearchFor($searchString)
    {
        //throw new PendingException();
        $this->getSession()->getPage()->fillField('searchInput', $searchString);
        $this->getSession()->getPage()->find('css', '.searchButton')->click();
    }

    /**
     * @Then The first heading should be :heading
     */
    public function theFirstHeadingShouldBe($heading)
    {
        //throw new PendingException();
        $pageHeading = $this->getSession()->getPage()->find('css', '.firstHeading');
        expect($pageHeading->getText())->tobe($heading);
    }
}
