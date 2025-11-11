<?php

//Encapsulation
class Car
{
    private $model;
    private $color;
    
    public function __construct($model, $color)
    {
        $this->model = $model;
        $this->color = $color;
    }
    
    public function getModel()
    {
        return $this->model;
    }
    
    public function setColor($color)
    {
        $this->color = $color;
    }
    
    public function getColor()
    {
        return $this->color;
    }
}

$car = new Car("Toyota", "Blue");

echo "Model: " . $car->getModel() . "<br>";
echo "Color: " . $car->getColor() . "<br>";

$car->setColor("Red");

echo "Updated Color: " . $car->getColor() . "<br>";


//Abstraction
abstract class Shape
{
    abstract public function calculateArea();
}

class Circle extends Shape
{
    private $radius;
    
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    
    public function calculateArea()
    {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape
{
    private $width;
    private $height;
    
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
    
    public function calculateArea()
    {
        return $this->width * $this->height;
    }
}

$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

echo "Area of Circle: " . $circle->calculateArea() . "<br>";
echo "Area of Rectangle: " . $rectangle->calculateArea() . "<br>";
?>