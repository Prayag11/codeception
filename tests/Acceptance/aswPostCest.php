<?php

namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;
use Codeception\Util\Locator;

class aswPostCest{
    public function SinglePost(AcceptanceTester $I){
        $I->amOnPage('https://americansongwriter.com/');
        $I->click('#page > section > div.g1-row-inner > div > div > div.g1-mosaic-item.g1-mosaic-item-1 > article > div.entry-body > header > h3 > a');

        $heading =$I->grabTextFrom('.entry-header');
    
        $author = $I->grabTextFrom('.entry-author');
        
        $date =$I->grabTextFrom('.entry-date');

        echo  $heading," ",$author," ",$date;
    }
}