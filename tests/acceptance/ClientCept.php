<?php 
$I = new AcceptanceTester($scenario);
$I->wantTo('perform actions and see result');
$I->amOnPage('/login');
$I->fillField('email','jane@doe.com');
$I->fillField('password','password');
$I->click('Login');
$I->amOnPage('/home');
$I->canSee('view appointments');
