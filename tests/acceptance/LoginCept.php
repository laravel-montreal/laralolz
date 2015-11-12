<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('login in');
$I->amOnPage('/logged-in');
$I->seeCurrentUrlEquals('/auth/login');
