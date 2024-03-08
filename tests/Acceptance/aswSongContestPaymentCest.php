<?php

namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;
use Codeception\Util\Locator;

class aswSongContestPaymentCest
{
    public function _before(AcceptanceTester $I){
        $I->amOnPage('https://savageventures-develop.go-vip.net/song-contest-checkout-2024/');
    }
      // tests
    
    public function SongContestPayment(AcceptanceTester $I){
        $I->wantTo('Verify that the user redirected to the payment page and verify the Error message for street address text field.');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        $I->click('Continue to Checkout');

        $I->fillField('billing_address_1','');
        $I->fillField('billing_city','hollywood');
        $I->fillField('billing_postcode','54323');
        $I->selectOption('.input-radio','cod');
        $I->checkOption('//*[@id="terms"]');
        $I->click('#place_order');

        $I->see('Billing Street address is a required field.','.g1-message-inner');
    }
 
    public function SongContestPaymentBilingCity(AcceptanceTester $I){
        $I->wantTo('Verify that the user redirected to the payment page and verify the Error message for billing city text field.');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        $I->click('Continue to Checkout');

        $I->fillField('billing_address_1','new town');
        $I->fillField('billing_city','');
        $I->fillField('billing_postcode','54323');
        $I->selectOption('.input-radio','cod');
        $I->checkOption('//*[@id="terms"]');
        $I->click('#place_order');

        $I->see('Billing Town / City is a required field.','.g1-message-inner');
    }

   
    public function SongContestPaymentPostCode(AcceptanceTester $I){
        $I->wantTo('Verify that the user redirected to the payment page and verify the Error message for billing post code text field.');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        $I->click('Continue to Checkout');

        $I->fillField('billing_address_1','new town');
        $I->fillField('billing_city','hollywood');
        $I->fillField('billing_postcode','');
        $I->selectOption('.input-radio','cod');
        $I->checkOption('//*[@id="terms"]');
        $I->click('#place_order');

        $I->see('Billing ZIP','.g1-message-inner');
        $I->see('is a required field.','.g1-message-inner');
    }

    public function SongContestPaymentTerms(AcceptanceTester $I){
        $I->wantTo('Verify that the user redirected to the payment page and verify the Error message if the terms n condition checkbox is not checked.');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        $I->click('Continue to Checkout');

        $I->fillField('billing_address_1','new town');
        $I->fillField('billing_city','hollywood');
        $I->fillField('billing_postcode','12452');
        $I->selectOption('.input-radio','cod');
       // $I->checkOption('//*[@id="terms"]');
        $I->click('#place_order');

        $I->see('Please read and accept the terms and conditions to proceed with your order.','.g1-message-inner');
    }
}
