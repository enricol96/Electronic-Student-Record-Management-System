<?php 

class Story30Cest
{
    // tests
    public function testInsertAccountAutocompletion(AcceptanceTester $I)
    {
        $I->wait(1);
        // login as sys_admin
        $I->amOnPage('/login.php');
        $I->fillField('username', 'mamma@mia.it');
        $I->fillField('password', 'Mamma');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/user_admin.php');
        $I->see('Setup accounts');
        $I->waitForElementClickable('#setupAccountDash', 10);
        $I->click('Setup accounts');
        
        // insert new account
        $I->waitForElementClickable('#inputSSN', 10);
        $I->fillField('#inputSSN', 'PNCMSM75D20L219X');

        $I->wait(3);
        $I->click('input[id="input-type-teacher"]');
        $I->wait(2);
        $I->waitForElementClickable('#confirmInsertAccount', 10);
        $I->wait(2);

        $I->click('Submit');
        $I->wait(3);

        // check if database updated
        $I->seeInDatabase('USER_TYPE', [
            'SSN' => 'PNCMSM75D20L219X',
            'UserType' => 'TEACHER'
        ]);
    }

    public function testInsertAccountSuccess(AcceptanceTester $I)
    {
        $I->wait(1);

        // login as sys_admin
        $I->amOnPage('/login.php');
        $I->fillField('username', 'mamma@mia.it');
        $I->fillField('password', 'Mamma');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/user_admin.php');
        $I->see('Setup accounts');
        $I->waitForElementClickable('#setupAccountDash', 10);
        $I->click('Setup accounts');
        
        // insert new account
        $I->waitForElementClickable('#inputSSN', 10);
        $I->fillField('#inputSSN', 'FLCRRT77B43L219Q');

        $I->wait(3);
        $I->click('input[id="input-type-teacher"]');
        $I->wait(2);
        $I->waitForElementClickable('#confirmInsertAccount', 10);
        $I->wait(2);

        $I->click('Submit');
        $I->wait(3);

        // check if database updated
        $I->seeInDatabase('USER_TYPE', [
            'SSN' => 'FLCRRT77B43L219Q',
            'UserType' => 'TEACHER'
        ]);
    }

    public function testInsertAccountFailure(AcceptanceTester $I)
    {
        $I->wait(1);

        // login as sys_admin
        $I->amOnPage('/login.php');
        $I->fillField('username', 'mamma@mia.it');
        $I->fillField('password', 'Mamma');
        $I->click('Sign in');
        $I->seeInCurrentUrl('/user_admin.php');
        $I->see('Setup accounts');
        $I->waitForElementClickable('#setupAccountDash', 10);
        $I->click('Setup accounts');
        
        // insert new account
        $I->waitForElementClickable('#inputSSN', 10);
        $I->fillField('#inputSSN', 'FLCRRT77B43L219Q');

        $I->wait(3);
        $I->click('input[id="input-type-teacher"]');
        $I->wait(2);
        $I->waitForElementClickable('#confirmInsertAccount', 10);
        $I->wait(2);

        $I->click('Submit');
        $I->wait(3);

        // insert new account
        $I->waitForElementClickable('#inputSSN', 10);
        $I->fillField('#inputSSN', 'FLCRRT77B43L219Q');

        $I->wait(3);
        $I->click('input[id="input-type-teacher"]');
        $I->wait(2);
        $I->waitForElementClickable('#confirmInsertAccount', 10);
        $I->wait(2);

        $I->click('Submit');
        $I->wait(3);
        
        // check if database updated
        $I->see('The account has already this role.');
    }

}
