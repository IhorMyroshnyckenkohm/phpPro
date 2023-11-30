<?php

class User
{
    public $name;
    public $age;
    public $email;

    public function __construct($name, $age, $email)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setEmail($email);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAll(): array
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        ];
    }

    /**
     * @throws CustomException
     */
    public function __call($method, $arguments)
    {
        $propertyName = lcfirst(substr($method, 3));

        if (method_exists($this, $method) && property_exists($this, $propertyName)) {
            $this->$propertyName = $arguments[0];
        } else {
            throw new CustomException("Method {$method} does not exist.");
        }
    }
}

class CustomException extends Exception
{
}

try {
    $user = new User('John Doe', 25, 'john@example.com');
    $user->setAge(30);
    $user->setEmail('newemail@example.com');

    $userData = $user->getAll();
    print_r($userData);
} catch (CustomException $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
