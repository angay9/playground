<?php 
$I = new FunctionalTester($scenario);

// setup
$I->am('A network user');
// $I->haveAnAccount('johndoe', 'password');
$I->wantTo('Login to my account');

// actions
$I->amOnPage('/');
$I->click('Login');
$I->seeCurrentUrlEquals('/login');
$I->fillField('Username:', 'angay9');
$I->fillField('Password:', 'password');
$I->click('Login');



// expectations
$I->seeCurrentUrlEquals('/@angay9');
$I->assertTrue(Phalcon\DI::getDefault()->getShared('auth')->check());
$I->see('Welcome back!');

// assert true - Auth::check
