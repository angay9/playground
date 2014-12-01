<?php 
$I = new FunctionalTester($scenario);

// setup
$I->am('Guest');
$I->wantTo('perform actions and see result');


// actions
$I->amOnPage('/');
$I->click('Sign Up!');
$I->seeCurrentUrlEquals('/register');

$I->fillField('name', 'John Doe');
$I->fillField('username', 'johndoe');
$I->fillField('email', 'johndoe@example.com');
$I->fillField('password', 'secret');
$I->fillField('passwordConfirmation', 'secret');
$I->click('Sign Up!');

// expectations
$I->seeCurrentUrlEquals('/@johndoe');
$I->seeInDatabase('users', ['username' => 'johndoe']);
$I->see('Your account has been created. Welcome!');
