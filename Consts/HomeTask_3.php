<?php
trait Trait1
{
    public function test()
    {
        return 1;
    }
}

trait Trait2
{
    public function test()
    {
        return 2;
    }
}

trait Trait3
{
    public function test()
    {
        return 3;
    }
}

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::test insteadof Trait2, Trait3;
        Trait2::test as testTrait2;
        Trait3::test as testTrait3;
    }

    public function getSum()
    {
        return $this->test() + $this->testTrait2() + $this->testTrait3();
    }
}

// Використання
$testObject = new Test();
echo $testObject->getSum();  // Результат буде 6
