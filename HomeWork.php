<?php
interface Formatter
{
    public function format($string);
}

class RawFormatter implements Formatter
{
    public function format($string)
    {
        return $string;
    }
}

class DateFormatter implements Formatter
{
    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string;
    }
}

class DateAndDetailsFormatter implements Formatter
{
    public function format($string)
    {
        return date('Y-m-d H:i:s') . $string . ' - With some details';
    }
}

interface DeliveryMethod
{
    public function deliver($format);
}

class EmailDelivery implements DeliveryMethod
{
    public function deliver($format)
    {
        echo "Вивід формату ({$format}) по електронній пошті";
    }
}

class SmsDelivery implements DeliveryMethod
{
    public function deliver($format)
    {
        echo "Вивід формату ({$format}) в смс";
    }
}

class ConsoleDelivery implements DeliveryMethod
{
    public function deliver($format)
    {
        echo "Вивід формату ({$format}) в консоль";
    }
}

class Logger
{
    private $formatter;
    private $deliveryMethod;

    public function __construct(Formatter $formatter, DeliveryMethod $deliveryMethod)
    {
        $this->formatter = $formatter;
        $this->deliveryMethod = $deliveryMethod;
    }

    public function log($string)
    {
        $formattedString = $this->formatter->format($string);
        $this->deliveryMethod->deliver($formattedString);
    }
}

// Використання
$logger = new Logger(new RawFormatter(), new SmsDelivery());
$logger->log('Emergency error! Please fix me!');
