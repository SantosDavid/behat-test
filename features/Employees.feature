Feature: Save informations about employees

    As an RH manager
    I want create employees
    So that what facilitate management

    Scenario: Is Active
        Given "David Santos" is new employee with cellphone "99999-9999" and is "active"
        When i created user
        Then send email

    Scenario: Is inative
        Given "David Santos" is new employee with cellphone "99999-9999" and is "inative"
        When i created user
        Then not send email
