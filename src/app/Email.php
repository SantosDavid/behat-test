<?php

namespace App;

class Email
{
    public function send(Employee $employee): bool
    {
        if (!$employee->isActive()) {
            throw new \Exception('O e-mail é enviado apenas para empregados ativos');
        }

        return true;
    }
}