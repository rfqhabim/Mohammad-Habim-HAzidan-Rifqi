<?php
require_once('product.php');

class CDRack extends Product
{
    private $capacity,
            $model;

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function getPrice()
    {
        return $this->price + ($this->price * 15 / 100);
    }
}