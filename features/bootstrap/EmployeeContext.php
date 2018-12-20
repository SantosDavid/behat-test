<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use App\Employee;
use App\Email;
use PHPUnit\Framework\Assert;
/**
 * Defines application features from the specific context.
 */
class EmployeeContext implements Context
{
    private $employee;

    private $employeeData = [];

    private $email;

    public function __construct()
    {
        $this->email = new Email();
    }

    /**
     * @Given :arg1 is new employee with cellphone :arg2 and is :arg3
     */
    public function isNewEmployeeWithCellphoneAndIs($name, $cellPhone, $status)
    {
        $this->employeeData = [
            'name' => $name,
            'cell_phone' => $cellPhone,
            'status' => $status,
        ];
    }

    /**
     * @When i created user
     */
    public function iCreatedUser()
    {
        $this->employee = new Employee(
            $this->employeeData['name'], 
            $this->employeeData['cell_phone'], 
            $this->employeeData['status']
        );

        Assert::assertInstanceOf(Employee::class, $this->employee);
    }

    /**
     * @Then send email
     */
    public function sendEmail()
    {
        $this->email->send($this->employee);
    }

    /**
     * @Then not send email
     */
    public function notSendEmail()
    {
        try {

            $this->email->send($this->employee);
        
        } catch (\Exception $e) {
            
            Assert::assertInstanceOf(\Exception::class, $e);
        }
    }
}
