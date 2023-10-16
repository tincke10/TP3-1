<?php
class TotalProductsComponent
{
    private $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function render()
    {
        return count($this->productos);
    }
}
?>