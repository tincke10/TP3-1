<?php
class TotalMonetaryValueComponent
{
    private $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function render()
    {
        $totalMonetaryValue = 0;
        foreach ($this->productos as $producto) {
            $totalMonetaryValue += $producto["monetarioEnStock"];
        }
        return "$" . number_format($totalMonetaryValue, 2);
    }
}
?>