<?php

class ProductTableComponent
{
    private $productos;

    public function __construct($productos)
    {
        $this->productos = $productos;
    }

    public function render()
    {
        ob_start(); // Inicia el búfer de salida
        ?>
        <table class='table'>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Stock Mínimo</th>
                    <th>Precio </th>
                    <th>Venta Web</th>
                    <th>Monetario en Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($this->productos as $producto) : ?>
                    <tr>
                        <td><?php echo $producto["codigo"]; ?></td>
                        <td class="product-description">
                            <span class="product-name"><?php echo $producto["descripcion"]; ?></span>
                            <div class='progress' title='Stock Total: <?php echo $producto["stockActual"]; ?>'>
                             <!-- Dependiendo la cantidad de stock calculo y muestro el color de la progresive bar, por default coloque un aria-valuemax='50' -->
                             <div class='progress-bar 
                                <?php 
                                    if ($producto["stockActual"] - $producto["stockMinimo"] <= 10) {
                                        echo "bg-danger"; // Rojo para diferencia <= 10
                                    } elseif ($producto["stockActual"] - $producto["stockMinimo"] <= 30) {
                                        echo "bg-warning"; // Amarillo para 10 < diferencia <= 30
                                    } else {
                                        echo "bg-success"; // Verde para diferencia > 30
                                    }
                                ?>' 
                                role='progressbar' 
                                style='width: <?php echo ($producto["stockActual"] / 50) * 100; ?>%;' 
                                aria-valuenow='<?php echo $producto["stockActual"]; ?>' 
                                aria-valuemin='0' 
                                aria-valuemax='50'>
                            </div>
                             <!-- <div class='progress-bar <?php echo $producto["stockActual"] >= 40 ? "bg-success" : ($producto["stockActual"] >= 20 ? "bg-warning" : "bg-danger"); ?>' role='progressbar' style='width: <?php echo ($producto["stockActual"] / 50) * 100; ?>%;' aria-valuenow='<?php echo $producto["stockActual"]; ?>' aria-valuemin='0' aria-valuemax='50'></div> -->
                            </div>
                        </td>
                        <td><img src='<?php echo $producto["imagen"]["ubicacion"]; ?>' alt='<?php echo $producto["imagen"]["nombre"]; ?>' width='50' data-bs-toggle="tooltip" title="Código: <?php echo $producto["codigo"]; ?>"></td>
                        <td><?php echo $producto["stockMinimo"]; ?></td>

                        <td class="precio precio-usd" data-precio="<?php echo $producto["precio"]; ?>">
                            $<?php echo number_format($producto["precio"], 2); ?> 
                            </td>
                        <td>
                        <?php if ($producto["ventaWeb"]) : ?>
                        <?php if ($producto["stockActual"] - $producto["stockMinimo"] > 10) : ?>
                            <i class="bi bi-cart-check text-success" data-bs-toggle="tooltip" title="Venta web activa"></i>
                        <?php else : ?>
                            <i class="bi bi-cart-x text-danger" data-bs-toggle="tooltip" title="Venta web desactivada"></i>
                        <?php endif; ?>
                        <?php else : ?>
                        <i class="bi bi-cart-x text-muted" data-bs-toggle="tooltip" title="Venta web desactivada"></i>
                        <?php endif; ?>
                        </td>
                        <td class="precio precio-usd" data-precio="<?php echo $producto["monetarioEnStock"]; ?>">
                        $<?php echo number_format($producto["monetarioEnStock"], 2); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- tooltips -->
        <script src="tooltips.js"></script>
        
        <!-- script para switchear de USD  a ARS -->
        <script src="usdxars.js"></script>

        <?php
        return ob_get_clean();
    }
}
?>