<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('check that login works');
$I->amOnPage('/login');
$I->fillField('email','john@smith.com');
$I->fillField('password','password');
$I->click('Login');
$I->amOnPage('/login');
$I->click('Register');
$I->amOnPage('/register');
$I->fillField('firstName','John');
$I->fillField('lastName','Smith');
$I->fillField('email','john@smith.com');
$I->fillField('password','password');
$I->fillField('password_confirmation','password');
$I->click('Register');
$I->amOnPage('/home');
$I->canSee('welcome');