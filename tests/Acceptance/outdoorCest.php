<?php

namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;

class outdoorHomeCest
{
      // tests
    public function TestHome(AcceptanceTester $I)
    {
        $I->wantTo('Verify that user is redirected to outdoor home page');
        $I->amOnPage('https://outdoors.com');
        
        
    }
    
    public function TestEquip(AcceptanceTester $I)
    {
        $I->wantTo('Verify that user is redirected to outdoor- equip page');
        $I->amOnPage('https://outdoors.com');
        $I->click('Equip');
        $I->amOnPage('/category/equip');
        
    }
}
