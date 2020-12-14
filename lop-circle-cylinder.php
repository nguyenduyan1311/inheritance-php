<?php
class Circle {
    public $radius;
    public $color;
    public function __construct($color,$radius){
        $this->radius = $radius;
        $this->color = $color;
    }
    public function get($propertyName){
        return $this->$propertyName;
    }
    public function set($propertyName,$propertyValue){
        $this->$propertyName = $propertyValue;
    }
    public function calculatePerimeter(){
        return pi() * $this->radius * 2;
    }
    public function calculateArea(){
        return pi() * pow($this->radius, 2);
    }
    public function toString(){
        return "$this->radius,$this->color";
    }
}
class Cylinder extends Circle {
    public $height;
    public function __construct($radius,$color,$height){
        parent::__construct($radius,$color);
        $this->height = $height;
    }
    public function calculateArea(){
        return parent::calculateArea() * 2 + $this->height * parent::calculatePerimeter();
    }
    public function calculateVolume(){
        return parent::calculateArea() * $this->height;
    }
    public function toString(){
        return "$this->radius,$this->color,$this->height";
    }
}
$circle1 = new Circle('Đỏ', 2);
echo "Màu hình tròn: " . $circle1->get('color') . "<br>";
echo "Bán kính hình tròn: " . $circle1->get('radius') . "<br>";
echo "Diện tích hình tròn: " . $circle1->calculateArea() . "<br>";
echo "Chu vi hình tròn: " . $circle1->calculatePerimeter() . "<br>";
$cylinder1 = new Cylinder('Xanh', 4 , 6);
echo "Màu hình trụ: " . $cylinder1->get('color') . "<br>";
echo "Bán kính hình trụ: " . $cylinder1->get('radius') . "<br>";
echo "Chiều cao hình trụ: " . $cylinder1->get('height') . "<br>";
echo "Diện tích hình trụ: " . $cylinder1->calculateArea() . "<br>";
echo "Thể tích hình trụ: " . $cylinder1->calculateVolume();