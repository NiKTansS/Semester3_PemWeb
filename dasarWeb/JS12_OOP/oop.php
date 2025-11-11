<?php

//Interface
interface Shape
{
    public function calculateArea();
}

interface Color
{
    public function getColor();
}

class Circle implements Shape, Color
{
    private $radius;
    private $color;
    
    public function __construct($radius, $color)
    {
        $this->radius = $radius;
        $this->color = $color;
    }
    
    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
    
    public function getColor()
    {
        return $this->color;
    }
}

$circle = new Circle(5, "Blue");

echo "Area of Circle: " . $circle->calculateArea() . ".<br>";
echo "Color of Circle: " . $circle->getColor() . ".<br>";


//Constructors dan destructors
class Car
{
    private $brand;
    
    public function __construct($brand)
    {
        echo "A new car is created.<br>";
        $this->brand = $brand;
    }
    
    public function getBrand()
    {
        return $this->brand;
    }
    
    public function __destruct()
    {
        echo "The car is destroyed.<br>";
    }
}

$car = new Car("Toyota");

echo "Brand: " . $car->getBrand() . ".<br>";


//Encapsulation and Access Modifiers
class Animal
{
    public $name;
    protected $age;
    private $color;
    
    public function __construct($name, $age, $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->color = $color;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    protected function getAge()
    {
        return $this->age;
    }
    
    private function getColor()
    {
        return $this->color;
    }
}

$animal = new Animal("Dog", 3, "Brown");

echo "Name: " . $animal->name . ".<br>";
echo "Age: " . $animal->getAge() . ".<br>";
echo "Color: " . $animal->getColor() . ".<br>";
?>