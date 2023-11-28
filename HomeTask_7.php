<?php
interface Eater
{
    public function eat();
}

interface Flyer
{
    public function fly();
}

class Swallow implements Eater, Flyer
{
    public function eat() { /* реалізація для ластівки */ }
    public function fly() { /* реалізація для ластівки */ }
}

class Ostrich implements Eater
{
    public function eat() { /* реалізація для страуса */ }
}
