<?php
// Абстрактний клас для типу таксі
abstract class TaxiType
{
    protected $model;
    protected $price;

    public function getModel()
    {
        return $this->model;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

// Клас для типу Економ
class EconomyTaxi extends TaxiType
{
    public function __construct()
    {
        $this->model = 'Economy Car';
        $this->price = 20.0;
    }
}

// Клас для типу Стандарт
class StandardTaxi extends TaxiType
{
    public function __construct()
    {
        $this->model = 'Standard Car';
        $this->price = 30.0;
    }
}

// Клас для типу Люкс
class LuxuryTaxi extends TaxiType
{
    public function __construct()
    {
        $this->model = 'Luxury Car';
        $this->price = 50.0;
    }
}

// Клас для доставки машини відповідного типу
class TaxiDelivery
{
    public function deliverTaxi(TaxiType $taxiType)
    {
        echo "Delivering a {$taxiType->getModel()} for {$taxiType->getPrice()} dollars.\n";
    }
}

// Клієнтський код
$taxiDelivery = new TaxiDelivery();

// Виклики з різними типами таксі
$economyTaxi = new EconomyTaxi();
$taxiDelivery->deliverTaxi($economyTaxi);

$standardTaxi = new StandardTaxi();
$taxiDelivery->deliverTaxi($standardTaxi);

$luxuryTaxi = new LuxuryTaxi();
$taxiDelivery->deliverTaxi($luxuryTaxi);
