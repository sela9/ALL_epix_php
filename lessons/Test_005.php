<?php
class Car
{
    public $color = 'Green';
    public $mark = 'Honda';
    public $model;
    public $packaging;
	public function move() {
		echo "I'm moving";
	}
	public function bre() {
		echo "boooooo";
	}
	public function beebee() {
		echo "beeebeee";
	}
	public function info() {
		echo $this->color.'</br>';
		echo $this->mark.'</br>';
		echo $this->model.'</br>';
		echo $this->packaging.'</br>';

	}
}

$kia = new Car;
var_dump($kia);
$kia->mark = 'KIA';
$kia->move();
$kia->info();
