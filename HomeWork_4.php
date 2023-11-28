<?php
class User
{
    private $name;
    private $age;
    private $email;

    public function __construct($name, $age, $email)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setEmail($email);
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setAge($age)
    {
        $this->age = $age;
    }

    private function setEmail($email)
    {
        $this->email = $email;
    }

    public function getAll()
    {
        return [
            'name' => $this->name,
            'age' => $this->age,
            'email' => $this->email
        ];
    }

    public function __call($method, $arguments)
    {
        $prefix = substr($method, 0, 3);
        $propertyName = lcfirst(substr($method, 3));

        switch ($prefix) {
            case 'set':
                if (property_exists($this, $propertyName)) {
                    $this->$propertyName = $arguments[0];
                } else {
                    throw new CustomException("Method {$method} does not exist.");
                }
                break;
            default:
                throw new CustomException("Method {$method} does not exist.");
        }
    }
}

class CustomException extends Exception
{
}

// Використання
try {
    $user = new User('John Doe', 25, 'john@example.com');
    $user->setAge(30);
    $user->setEmail('newemail@example.com');

    // Невизначений метод, генерує CustomException
    // $user->setUsername('johndoe');

    $userData = $user->getAll();
    print_r($userData);
} catch (CustomException $e) {
    echo 'Caught exception: ', $e->getMessage(), "\n";
}
