<?php

$I = new AcceptanceTester($scenario);

$I->wantTo('perform actions and see result');
$I->amOnPage('/');
$I->see('Welcome to the Symfony Demo application');
$I->click('Browse application');
$I->see('Lorem ipsum dolor sit amet consectetur adipiscing elit');

$I->amOnPage('/');
$I->click('Browse backend');
$I->fillField('_username', 'anna_admin');
$I->fillField('_password', 'kitten');
$I->click('Sign in');
$I->see('Post List');

$I->click('Create a new post');
$I->fillField('post[title]', 'NFQ Akademija title');
$I->fillField('post[summary]', 'NFQ Akademija summary');
$I->fillField('post[content]', 'NFQ Akademija content');
$I->executeJS('window.scrollTo(0,document.body.scrollHeight);');
$I->click('Create post');
$I->see('NFQ Akademija title');
$I->executeJS('window.scrollTo(0,document.body.scrollHeight);');
$I->click('Show', '#main tbody tr:nth-last-child(1)');
$I->see('NFQ Akademija content');

$I->click('form input[value="Delete post"]');
$I->waitForElementVisible('#confirmationModal #btnYes', 2);
$I->click("#confirmationModal #btnYes");
$I->see('Post deleted successfully!');
