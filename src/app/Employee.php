<?php

namespace App;

class Employee
{
    private $name;

    private $cellPhone;

    private $status;

    public function __construct($name, $cellPhone, $status)
    {
        $this->name = $name;

        $this->cellPhone = $cellPhone;

        $this->status = $status;
    }

    public function isActive()
    {
        return $this->status === 'active' ? true : false;
    }
}