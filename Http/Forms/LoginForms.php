<?php

namespace Http\Forms;

use Core\Validator;

class LoginForms
{
    protected array $errors = [];

    public function validate($email, $password)
    {
        if(! Validator::email($email)){
            $this->errors['email'] = 'Please Provide a Valid email address';
        }

        if(! Validator::string($password)){
            $this->errors['password'] = 'Please Provide a Valid Password';
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;
    }
}