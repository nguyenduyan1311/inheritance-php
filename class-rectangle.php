<form method="post">
    <input type="number" name="a" placeholder="Cạnh thứ 1">
    <input type="number" name="b" placeholder="Cạnh thứ 2">
    <input type="number" name="c" placeholder="Cạnh thứ 3">
    <input type="text" name="col" placeholder="Màu">
    <button>Calculate</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];
    $col = $_POST["col"];
    $rectangle = new Triangle($a,$b,$c,$col);
    echo "Cạnh 1 của tam giác là: ". $rectangle->getSide('side1');
    echo "<br>Cạnh 2 của tam giác là: ". $rectangle->getSide('side2');
    echo "<br>Cạnh 3 của tam giác là: ". $rectangle->getSide('side3');
    echo "<br>Chu vi tam giác là: ". $rectangle->getPerimeter();
    echo "<br>Diện tích tam giác là: ". $rectangle->getArea();
    echo "<br>Màu tam giác là: " . $rectangle->getColor();
}
class Shape
{
    public $side1;
    public $side2;
    public $side3;
    public $color;
}
class Triangle extends Shape
{
    public function __construct($side1 = 1.0, $side2 = 1.0, $side3 = 1.0,$color)
    {
        $this->side1 = $side1;
        $this->side2 = $side2;
        $this->side3 = $side3;
        $this->color = $color;
    }
    public function getSide($side)
    {
        return $this->$side;
    }
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function getPerimeter()
    {
        return $this->side1 + $this->side2 + $this->side3;
    }
    public function getArea(){
        $p = ($this->getPerimeter())/2;
        return sqrt($p * ($p - $this->side1) * ($p - $this->side2) * ($p - $this->side3));
    }
}
