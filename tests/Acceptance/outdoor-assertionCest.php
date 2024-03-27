<?php

namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;

class outdoorAssertionCest
{
      // tests
      
      public function TestSeeAssertion(AcceptanceTester $I)
      {
          $I->wantTo('Verify that user is redirected to outdoor- equip page and check that Equip heading is visible on page');
          $I->amOnPage('https://outdoors.com');
          $I->click('Equip');
          $I->amOnPage('/category/equip');
          $I->see('Equip');
          
      }

    public function TestSeeElementAssertion(AcceptanceTester $I)
    {
        $I->wantTo('Verify that user is redirected to the explore page and verify the heading element on explore page.');
        $I->amOnPage('https://outdoors.com');
        $I->click('Explore');
        $I->amOnPage('/category/explore');
        $I->seeElement('h1');

    }

    public function TestSeeInCurrentUrlAssertion(AcceptanceTester $I)
    {
        $I->wantTo('verify that user redirect to empower page and verify the url of page');
        $I->amOnPage('https://outdoors.com');
        $I->click('Empower');
        $I->seeInCurrentUrl('/category/empower');

    }

    public function TestSeeInTitleAssertion(AcceptanceTester $I)
    {
        $I->wantTo('verify that user redirect to equip page and verify the title of page');
        $I->amOnPage('https://outdoors.com');
        $I->click('Equip');
        $I->seeInTitle('Equip Archives - Outdoors with Bear Grylls');

    }

    public function TestLinkAssertion(AcceptanceTester $I)
    {
        $I->wantTo('verify that equip link on page');
        $I->amOnPage('https://outdoors.com');
        $I->seeLink('Equip');

    }

    public function TestDontSeeAssertion(AcceptanceTester $I)
    {
        $I->wantTo('verify that the text is not visible on page. ');
        $I->amOnPage('https://outdoors.com');
        $I->dontSee('bear book');

    }

    public function TestExpectAssertion(AcceptanceTester $I)
    {
        $I->wantTo('verify that the user redirects to the outdoor+ page. ');
        $I->amOnPage('https://outdoors.com');
        $I->click('//*[@id="content"]/div/div/div[1]/header/div/div[1]/div/div/div[1]/ul/li[3]/a/img');
        $I->expect('the user is redirected to the outdoor+ page');
    
    }

}
