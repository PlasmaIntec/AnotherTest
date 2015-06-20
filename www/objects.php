<?php

class Car {
  private $speed;
  public $model;
  private $direction;
  private $driver;
  private $door_color;
  private $hood_color;
  private $trunk_color;
  
  public function __construct ($init_model, $init_color)
  {
      $model = $init_model;
      $color = $init_color;
      $speed = 0;
  }
  
  public function Accelerate($amount)
  {
      $speed = $speed + $amount;
  }
  
  public function Gas()
  {
      Car::Accelerate(10);
  }
  
  public function Brake()
  {
      $speed = 0;
  }
  public function TurnRight()
  {
      $direction = $direction + 90;
  }
  
  public function TurnLeft()
  {
     $direction = $direction - 90;  
  }
  
  public function Reverse()
  {
     $speed = -10;  
  }
  
  public function GetColor()
  {
    return $hood_color;
  }
  
  public function GetModel()
  {
    return $model;  
  }

  public function Crash($other_car)
  {
      echo "You hit a $other_car->GetColor() $other_car->GetModel()";
    echo $other_car->GetModel();
  }
}

$car1 = new Car("Ford","White");
$car1->Gas();

$car2 = new Car("Honda","Red");
$car2->Reverse();
$car2->TurnRight();
$car2->Crash($car1);


?>