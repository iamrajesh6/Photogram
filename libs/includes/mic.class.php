<?php

class mic
{
    public $brand;
    public $color;
    public $usb_port;
    public $model;
    public $light;
    public $price;

    public function __construct($brand)
    {
        printf("Constructing Object");
        $this->brand = ucwords($brand);
    }
    public function getbrand()
    {
        return $this->brand;
    }
    public function setlight($light)
    {
        $this->light = $light;
    }

    public function getmode()
    {
        return $this->model;
    }

    public function setmodel($model)
    {
        $this->model = ucwords($model);//inbuild functionm
    }
}
