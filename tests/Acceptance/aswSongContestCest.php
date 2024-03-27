<?php

namespace Tests\Acceptance;
use Tests\Support\AcceptanceTester;
use Codeception\Util\Locator;

class aswSongContestCest
{
    public function _before(AcceptanceTester $I){
        $I->amOnPage('https://savageventures-develop.go-vip.net/song-contest-checkout-2024/');
    }
      // tests
    public function songContestMandatoryField(AcceptanceTester $I){
        $I->wantTo('Verify all mandatory fields on song contest form page.');
        $I->click('Continue to Checkout');
        Locator::contains('//*[@id="error_msg_1"]','Please select at least one category for song entry 1');
        
    }

    public function SongContestEmail(AcceptanceTester $I){
        $I->wantTo('Verify that the email text field shows error if the e-mail text field is empty');
        
        //song contest form
        $I->fillField('billing_email','');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');


        //assertion
        $I->seeElement('#billing_email');

        $I->click('Continue to Checkout');

        $I->canSee('Billing details');
        $I->seeElement('#billing_address_1');
        
        
    }
    
    public function SongContestBillingFirstName(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the first name text field shows error if the first name text field is empty');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', '');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        //assertion
        $I->seeElement('#billing_first_name');
        

        $I->click('Continue to Checkout');

        $I->expect('the user is not able to redirect payment page of song contest');
        
    }

    public function SongContestBillingLastName(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the last name text field shows error if the last name text field is empty');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        //assertion
        $I->seeElement('#billing_last_name');
        

        $I->click('Continue to Checkout');
        $I->expect('the user is not able to redirect payment page of song contest');

        
    }  
    
    public function SongContestPhoneNo(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the phone text field shows error if the phone text field is empty');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','');
        $I->fillField('billing_song_title','testSong1');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        //assertion
        $I->seeElement('#billing_phone');
        

        $I->click('Continue to Checkout');
        $I->expect('the user is not able to redirect payment page of song contest');
        
    } 

    public function SongContestSongTitle(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the songTitle text field shows error if the song title text field is empty');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','');
        $I->fillField('billing_link_to_your_song','www.songppk.com');
        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        //assertion
        $I->seeElement('#billing_song_title');
        

        $I->click('Continue to Checkout');
        $I->expect('the user is not able to redirect payment page of song contest');

        
    } 

    public function SongContestSongUrl(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the error message for song url text field if the song url text field not have valid url');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','test1');
        $I->fillField('billing_link_to_your_song','song3');
        $I->see( Locator::isClass('.url-warning',('Please enter a valid URL')));

        $I->checkOption('#billing_song_1_-_americana');
        $I->checkOption('#billing_song_1_-_indie');

        $I->click('Continue to Checkout');

         //assertion
         //Locator::contains('//*[@id="billing_link_to_your_song_field"]/span/p','Please enter a valid URL');
       
        
    } 
    
    public function SongContestSongCategory(AcceptanceTester $I)
    {
        $I->wantTo('Verify that the error message for song category checkbox if song category is not selected.');
        
        //song contest form
        $I->fillField('billing_email','prayag@gmail.com');
        $I->fillField('billing_first_name', 'prayag');
        $I->fillField('billing_last_name','mankar');
        $I->fillField('billing_phone','7030880039');
        $I->fillField('billing_song_title','test1');
        $I->fillField('billing_link_to_your_song','www.ganaa.com');
        
        $I->click('Continue to Checkout');

        //assertion
       $I->see(Locator::isID('#error_msg_1','Please select at least one category for song entry 1'));
        
    }
    
    
}
